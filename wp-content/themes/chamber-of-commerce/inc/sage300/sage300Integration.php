<?php

class FullyPaid
{
    const NO = 0;
    const YES = 1;
}

class Sage300Integration
{
    private function getContents($get_string)
    {
        $endpoint_url = sage300APIUrl;
        $endpoint_user = sage300APIUsername;
        $endpoint_pass = sage300APIPassword;

        $auth = base64_encode($endpoint_user . ":" . $endpoint_pass);
        $context = stream_context_create([
            "http" => [
                "header" => "Authorization: Basic $auth"
            ],
            "ssl"=>[
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ]
        ]);

        $endpoint_url.=$get_string;

        $contents_json = @file_get_contents($endpoint_url, false, $context );

        if ($contents_json === FALSE)
            return null;

        $contents_array = json_decode($contents_json, true);

        return $contents_array;
    }


    public function getAllInvoicesByCustomerNumber($customerNumber, $paid, $limitCount = null, $pageNumber = null)
    {
		$get_string = 'ARPostedDocuments?';

        $get_string.='$filter=CustomerNumber%20eq%20'."'".$customerNumber."'".'%20and%20FullyPaid%20eq%20'."'".$paid."'%20and%20DocumentType%20eq%20'1'";

        $get_string.= isset($limitCount) && is_int($limitCount)?'&$top='.$limitCount:'';

        $get_string.= isset($pageNumber) && is_int($pageNumber)?'&$skip='.($pageNumber - 1)*$limitCount:'';

        $get_string.='&$count=true';

       // $get_string.='&$select=CustomerNumber%2CDocumentNumber%2C20FullyPaid';

        $documents_data = $this->getContents($get_string);

        if($documents_data === null)
            return null;

        $elements = array();

        foreach ($documents_data['value'] as $document)
        {
            $element = new stdClass();

            $element->CustomerNumber = $document['CustomerNumber'];
            $element->CheckReceiptNumber = $document['CheckReceiptNumber'];
            $element->DocumentNumber = $document['DocumentNumber'];
            $element->DueDate = $document['DueDate'];
            $element->DatePaid = $document['DatePaid'];
            $element->BatchNumber = $document['BatchNumber'];
            $element->EntryNumber = $document['EntryNumber'];

            //$element->OrderNumber = $document['OrderNumber'];
            //$element->PONumber = $document['PONumber'];
            //$element->DocumentType = $document['DocumentType'];
            //$element->FullyPaid = $document['FullyPaid'];
            //$element->InvoiceType = $document['InvoiceType'];
            //$element->BatchType = $document['BatchType'];
            //$element->DocumentDescription = $document['DocumentDescription'];

            $get_string = '';

            $get_string .= "ARInvoiceBatches($element->BatchNumber)?";

            $get_string .= '$select=Invoices';

            $invoiceBatches_data = $this->getContents($get_string);

            if($invoiceBatches_data !== null)
            {
                //$element->BatchBatchNumber = $invoiceBatches_data['BatchNumber'];
                //$element->BatchBatchType = $invoiceBatches_data['BatchType'];
                //$element->BatchBatchStatus = $invoiceBatches_data['BatchStatus'];
                //$element->BatchDefaultInvoiceType = $invoiceBatches_data['DefaultInvoiceType'];

                $key = array_search($element->EntryNumber, array_column($invoiceBatches_data['Invoices'], 'EntryNumber'));

                if($key !== false)
                {
                    $invoice = $invoiceBatches_data['Invoices'][$key];
                    $element->InvoiceDescription = $invoice['InvoiceDescription'];
                    $element->DocumentTotalBeforeTax = $invoice['DocumentTotalBeforeTax'];
                    $element->TaxTotal = $invoice['TaxTotal'];
                    $element->DocumentTotalIncludingTax = $invoice['DocumentTotalIncludingTax'];
                    //$element->InvoiceCustomerNumber = $invoice['CustomerNumber'];
                    //$element->InvoiceDocumentNumber = $invoice['DocumentNumber'];
                    //$element->InvoiceDocumentType = $invoice['DocumentType'];
                    //$element->InvoiceOrderNumber = $invoice['OrderNumber'];
                    //$element->InvoicePONumber = $invoice['PONumber'];
                    //$element->InvoiceDueDate = $invoice['DueDate'];
                }

            }

            $elements[] = $element;
        }

        $data = new stdClass();
        $data->total_count = $documents_data['@odata.count'];
        $data->elements = $elements;

        return $data;
    }


    public function addReceiptToInvoicePaid($bank_code, $customerNumber, $documentNumber, $customerReceiptAmount, $bankReceiptAmount, $checkReceiptNumber, $description_batch = "", $description_receipt = "")
    {
        $response = new stdClass();
        $response->success = false;
        $response->code = '';
        $response->message = '';

        $receiptsAdjustmentsAll = [];
        $appliedReceiptsAdjustmentsAll = [];

        $appliedReceiptsAdjustments = array(
            'TransactionType' => 'ReceiptPosted',
            'CustomerNumber' => $customerNumber,
            'DocumentAmountDue' => floatval($customerReceiptAmount),
            'DocumentNumber' => $documentNumber,
        );

        $appliedReceiptsAdjustmentsAll[] = $appliedReceiptsAdjustments;

        $receiptsAdjustments = array(
            'CustomerNumber' => $customerNumber,
            'EntryDescription' => $description_receipt,
            'BankReceiptAmount' => floatval($bankReceiptAmount),
            'ReceiptTransactionType' => 'Receipt',
            'CheckReceiptNumber' => $checkReceiptNumber,
            'PaymentCode' => 'Master',
            'AppliedReceiptsAdjustments' => $appliedReceiptsAdjustmentsAll
        );

        $receiptsAdjustmentsAll[] = $receiptsAdjustments;

        $receiptAndAdjustmentBatch = array(
            'BatchRecordType' => 'CA',
            'Description' => $description_batch,
            'BankCode' => '1',
            'ReceiptsAdjustments' => $receiptsAdjustmentsAll
        );

        $receiptAndAdjustmentBatch_json = json_encode($receiptAndAdjustmentBatch);

        $endpoint_url = sage300APIUrl;
        $endpoint_user = sage300APIUsername;
        $endpoint_pass = sage300APIPassword;

        $endpoint_url .= 'ARReceiptAndAdjustmentBatches';

        $curlHeader = curl_init($endpoint_url);
        curl_setopt($curlHeader, CURLOPT_USERPWD, $endpoint_user . ":" . $endpoint_pass); //Your credentials goes here
        curl_setopt($curlHeader, CURLOPT_POSTFIELDS, $receiptAndAdjustmentBatch_json);
        curl_setopt($curlHeader, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curlHeader, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHeader, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curlHeader, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response_curl = curl_exec($curlHeader);
        $code = curl_getinfo($curlHeader, CURLINFO_HTTP_CODE );
        $error = curl_error($curlHeader);
        curl_close($curlHeader);

        if($code == 0)
        {
            $response->success = false;
            $response->code = '';
            $response->message = $error;
        }
        else if ($code < 200 || $code >= 300)
        {
            $response->success = false;

            if($response_curl)
            {
                $response_array = json_decode($response_curl);
                $response->code = $response_array->error->code;
                $response->message = $response_array->error->message->value;
            }
        }
        else
        {
            //code 201
            $response_array = json_decode($response_curl);

            $response->success = true;
            $response->code = $code;
            $response->batchNumber = $response_array->BatchNumber;
            $response->message = 'Successful operation';
        }

        return $response;
    }


    public static function addInvoiceSentToMoneris($customerNumber, $documentNumber, $moneris_response)
    {
        $user_id = get_current_user_id();

        global $wpdb;

        $result =  $wpdb->query( $wpdb->prepare( "INSERT INTO `{$wpdb->prefix}invoices_paid`( `user_id` , `customer_number` , `document_number`,  `created_at`, `moneris_response`) VALUES ( %d, %s, %s, NOW(), %s);", $user_id, $customerNumber, $documentNumber, $moneris_response) );

        return $result;
    }


    public static function markInvoiceSentToSage($customerNumber, $documentNumber, $success_response_sage, $sage_response)
    {
        global $wpdb;

        $result = $wpdb->query( $wpdb->prepare( "UPDATE `{$wpdb->prefix}invoices_paid` SET `send_sage_at` = NOW(), `success_response_sage` = %d, `sage_response` = %s WHERE `customer_number` = %s and `document_number` = %s", $success_response_sage, $sage_response, $customerNumber, $documentNumber) );

        return $result;
    }


    public static function checkInvoiceWasPaid($customerNumber, $documentNumber)
    {
        global $wpdb;

        $result = $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}invoices_paid` WHERE `customer_number` = '$customerNumber' and `document_number` = '$documentNumber'");

        return $result ? true: false;

    }


    public static function addInvoiceSentToMonerisAndDenied($customerNumber, $documentNumber, $moneris_response)
    {
        $user_id = get_current_user_id();

        global $wpdb;

        $result =  $wpdb->query( $wpdb->prepare( "INSERT INTO `{$wpdb->prefix}invoices_denied`( `user_id` , `customer_number` , `document_number`,  `created_at`, `moneris_response`) VALUES ( %d, %s, %s, NOW(), %s);", $user_id, $customerNumber, $documentNumber, $moneris_response) );

        return $result;
    }
}
