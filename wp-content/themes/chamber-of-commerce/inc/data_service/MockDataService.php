<?php

class MockDataService
{
    function __construct()
    {
        return true;
    }

    public function getAllAccountsByMembershipType($type, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        switch ($type)
        {
            case MembershipTypeCRM::ASSOCIATION_MEMBERSHIP:{
                return (object)array("total_count" => 20,
                    "elements" => [(object)
                    [
                        "address1_line1" => "110 Eglinton Avenue East, Suite 604",
                        "accountid" => "6c71ab85-30fd-e211-aaf9-000c29c04ade",
                        "address1_city" => "Toronto",
                        "emailaddress1" => "info@abclifeliteracy.ca",
                        "address1_stateorprovince" => "ON",
                        "websiteurl" => "http://abclifeliteracy.ca/",
                        "name" => "ABC Life Literacy Canada",
                        "address1_postalcode" => "M4P 2Y1",
                        "telephone1" => "(416) 218-0010",
                        "address1_country" => "Canada",
                        "address1_composite" => "110 Eglinton Avenue East, Suite 604
Toronto ON M4P 2Y1
Canada",
                    ],

                        (object)
                        [
                            "address1_line2" => "Suite 303",
                            "address1_line1" => "33 Bloor Street East",
                            "accountid" => "ce71ab85-30fd-e211-aaf9-000c29c04ade",
                            "address1_city" => "Toronto",
                            "address1_stateorprovince" => "ON",
                            "websiteurl" => "http://www.adstandards.com",
                            "name" => "Advertising Standards Canada",
                            "address1_postalcode" => "M4W 3H1",
                            "telephone1" => "(416) 961-6311",
                            "address1_country" => "Canada",
                            "address1_composite" => "33 Bloor Street East
Suite 303
Toronto ON M4W 3H1
Canada",
                        ],

                        (object)
                        [
                            "address1_line1" => "600-10 Lower Spadina Avenue",
                            "accountid" => "d071ab85-30fd-e211-aaf9-000c29c04ade",
                            "address1_city" => "Toronto",
                            "address1_stateorprovince" => "ON",
                            "websiteurl" => "http://www.advocis.ca",
                            "name" => "Advocis - The Financial Advisors Association of Canada",
                            "address1_postalcode" => "M5V 2Z2",
                            "telephone1" => "(416) 342-9813",
                            "address1_country" => "Canada",
                            "address1_composite" => "600-10 Lower Spadina Avenue
Toronto ON M5V 2Z2
Canada"
                        ],

                        (object)
                        [
                            "address1_line1" => "121 North Henry Street",
                            "accountid" => "da71ab85-30fd-e211-aaf9-000c29c04ade",
                            "address1_city" => "Alexandria",
                            "address1_stateorprovince" => "VA",
                            "websiteurl" => "http://www.arsa.org",
                            "name" => "Aeronautical Repair Station Association",
                            "address1_postalcode" => "22314-",
                            "telephone1" => "(703) 739-9543",
                            "address1_country" => "Canada",
                            "address1_composite" => "121 North Henry Street
Alexandria VA 22314-
            Canada"
                        ],

                        (object)
                        [
                            "address1_line2" => "Suite 703",
                            "address1_line1" => "255 Albert Street",
                            "accountid" => "e071ab85-30fd-e211-aaf9-000c29c04ade",
                            "address1_city" => "Ottawa",
                            "address1_stateorprovince" => "ON",
                            "websiteurl" => "http://aiac.ca/",
                            "name" => "Aerospace Industries Association of Canada",
                            "address1_postalcode" => "K1P 6A9",
                            "telephone1" => "(613) 232-4297",
                            "address1_country" => "Canada",
                            "address1_composite" => "255 Albert Street
Suite 703
Ottawa ON K1P 6A9
Canada"
                        ]]);
            }
            default:
                return null;
                break;

        }
    }


    public function getAllContactByAccount($account_id)
    {
        return null;
    }


    public function getContactById($contact_id)
    {
        return (object)[
            "contactid" => "6093d8e6-a6fe-e211-aaf9-000c29c04ade",
            "fullname" => "Aaron Rubinoff",
            "firstname" => "Aaron",
            "lastname" => "Rubinoff",
            "emailaddress1" => "arubinoff@perlaw.ca",
            "telephone1" => "613 566-2837",
            "websiteurl" => null,
            "jobtitle" => "Co-chair/Partner",
            "address1_line1" => "1400-340 Albert Street",
            "address2_line1" => null,
            "city" => "Ottawa",
            "province_id" => 803330009,
            "province" => "ON",
            "country" => null,
            "languagepreference" => "ENGLISH",
            "languages" => null,
            "agerange" => null,
            "companyname" => "Perley-Robertson, Hill & McDougall LLP",
            "companywebsiteurl" => null,
            "accountid" => "8360b8fd-31fd-e211-aaf9-000c29c04ade",
            "address1_postalcode" => "K1P 6A9",
            "specializations" => ""];
    }


    public function updateContact($contact_id, $firstname, $lastname, $emailaddress1, $telephone1, $mobilephone, $jobtitle, $age_range = null,
                                  $address1_line1, $address1_city, $address1_stateorprovince, $address1_postalcode, $address2_line1)
    {
        return false;
    }


    public function getAllArbitrators($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        return (object)array(
            "total_count" => 15,
            "elements" => array(
                (object)["contactid" => "6093d8e6-a6fe-e211-aaf9-000c29c04ade",
                "fullname" => "Aaron Rubinoff",
                "city" => "Ottawa",
                "province" => "ON",
                "country" => "Canada",
                "languagepreference" => "English",
                "companyname" => "Perley-Robertson, Hill & McDougall LLP"],
                (object)["contactid" => "f0a6fcc6-a0fe-e211-aaf9-000c29c04ade",
                    "fullname" => "Alain Prujiner",
                    "city" => "Levis",
                    "province" => "QC",
                    "country" => "Canada",
                    "languagepreference" => "French",
                    "companyname" => "Université Laval"],
                (object)["contactid" => "b3ee047e-8800-e511-bafe-000c29c04ade",
                    "fullname" => "Alexandra Mitretodis",
                    "city" => "Vancouver",
                    "province" => "BC",
                    "country" => "Canada",
                    "languagepreference" => "English",
                    "companyname" => "Fasken Martineau DuMoulin LLP",
                ],
                (object)["contactid" => "b3d478e6-abc5-e811-814c-005056a00b05",
                    "fullname" => "Alison FitzGerald",
                    "city" => "Ottawa",
                    "province" => "ON",
                    "country" => "Canada",
                    "languagepreference" => "English",
                    "companyname" => "Norton Rose Fulbright Canada LLP"],
                (object)["contactid" => "ab3cb104-0489-e811-abef-005056a00b05",
                    "fullname" => "Anastasia Davis Bondarenko",
                    "city" => "Paris",
                    "province" => null,
                    "country" => "France",
                    "languagepreference" => "English",
                    "companyname" => "Vannin Capital PCC"]));
    }

    public function getArbitratorBioByContactId($contact_id)
    {
        $arbitrator = (object)array(
                "arbitratorbioid"=>"d49b7bc6-8216-e511-be5d-000c29c04ade",
                "bio"=>"<p>Aaron Rubinoff is a Partner in the International Arbitration Group at Perley-Robertson, Hill & McDougall LLP/s.r.l., a leading international arbitration firm (Global Arbitration Review, GAR 100). He has over 20 years experience providing client advocacy in the areas of international arbitration, commercial and intellectual property litigation. Aaron represents clients in complex commercial disputes before tribunal courts, and in domestic and international arbitration. In addition, he has appeared before the Ontario Superior Court of Justice, the Federal Court - Trial Division, the Federal Court of Appeal and the Supreme Court of Canada.</p>

<p>Aaron is also a member of the ICC Arbitration Committee.</p>");
        return $arbitrator;
    }

    public function updateArbitratorProfile($arbitratorbio_id, $ccc_name, $ccc_title, $ccc_companyname, $ccc_companywebsitelink, $ccc_emailaddress, $ccc_phonenumber)
    {
        return false;
    }


    public function updateArbitratorBio($arbitratorbio_id, $ccc_bio)
    {
        return false;
    }

	public function getEventById($event_id)
	{
		$event1 = new stdClass();
		$event1->eventid = $event_id;
		$event1->name = 'International Business Leader Lifetime Achievement Award';
		$event1->eventtype = 'Conference';
		$event1->eventformat = 'On site';
		$event1->startdate = '2020-09-17 7:00 AM';
		$event1->enddate = '2020-09-17 10:00 PM';
		$event1->publiceventurl = 'http://eventbrite.ca';
		$event1->createdon = '2020-03-10 10:33 AM';
		$event1->eventimage = '';
		$event1->description = 'International Business Leader Awards';
		$event1->expectedoutcome = 'Our International Business Leader Awards (Leader of the Year and Lifetime Achievement) were established in 1992 to recognize business executives from Canadian companies whose visionary corporate leadership has allowed their company to develop a strong, competitive Canadian presence in global markets. In addition to the honorees’ professional achievements, all recipients have demonstrated generous philanthropic endeavors.';
		$event1->room = 'Room 1';
		$event1->building = 'Westin Hotel';
		$event1->totalregistrationfee = '700';
        $event1->province = "ON";
        $event1->private = false;
        $event1->eventpageurl = null;

		$speaker1 = new stdClass();
        $speaker1->speakerid = 1;
        $speaker1->name = "Blaine Higgs";
        $speaker1->title = "Premier of New Brunswick";
        $speaker1->salutation = "Hon.";
        $speaker1->image = "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";

        $speaker2 = new stdClass();
        $speaker2->speakerid = 2;
        $speaker2->name = "Jason Kenney";
        $speaker2->title = "Premier of Alberta";
        $speaker2->salutation = "Hon.";

        $event1->speakers = [$speaker1, $speaker2];


		return $event1;
	}

    public function getFeaturedEvent()
    {
        $event1 = new stdClass();
        $event1->eventid = 'e7b7c1a2-c77d-495a-aae1-0847640edfa1';
        $event1->name = 'International Business Leader Lifetime Achievement Award';
        $event1->eventtype = 'Conference';
        $event1->eventformat = 'On site';
        $event1->startdate = '2020-09-17 7:00 AM';
        $event1->enddate = '2020-09-17 10:00 PM';
        $event1->publiceventurl = '';
        $event1->createdon = '2020-03-10 10:33 AM';
        $event1->eventimage = '';
        $event1->description = '';
        $event1->expectedoutcome = 'Our International Business Leader Awards (Leader of the Year and Lifetime Achievement) were established in 1992 to recognize business executives from Canadian companies whose visionary corporate leadership has allowed their company to develop a strong, competitive Canadian presence in global markets. In addition to the honorees’ professional achievements, all recipients have demonstrated generous philanthropic endeavors.';
        $event1->room = 'Room 1';
        $event1->building = 'Westin Hotel';
        $event1->province = "ON";
        $event1->featured = true;
        $event1->eventpageurl = null;

        return $event1;
    }

    public function getAllEvents($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
	    $event0 = new stdClass();
	    $event0->eventid = 'e7b7c1a2-c77d-495a-aae1-0847640edfa1';
	    $event0->name = '2020 AGM & Convention';
	    $event0->eventtype = 'Conference';
	    $event0->eventformat = 'On site';
	    $event0->startdate = '2020-09-26 8:00 AM';
	    $event0->enddate = '2020-09-28 6:00 PM';
	    $event0->publiceventurl = 'http://www.chamber.ca/events/2020-agm/';
	    $event0->createdon = '2020-03-10 10:37 AM';
	    $event0->eventimage = '';
	    $event0->description = '';
        $event0->building = 'Westin Hotel';
	    $event0->expectedoutcome = 'Our AGM & Convention brings together over 320 chamber of commerce executives and community business leaders to discuss the economic 
        and political issues that affect the prosperity of Canadian business. This event enables our member chambers to become more relevant and successful advocates 
        for their communities. It is also THE opportunity for chambers of commerce to present their member businesses’ key concerns to our cross-country network.
         The resolutions adopted pave the way to foster a stronger economic environment for business and will be presented to the federal government and shape our public 
         policy objectives for the upcoming year.';
        $event0->eventpageurl = null;

	    $event1 = new stdClass();
	    $event1->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1a';
	    $event1->name = 'International Business Leader Lifetime Achievement Award';
	    $event1->eventtype = 'Conference';
	    $event1->eventformat = 'On site';
	    $event1->startdate = '2020-09-17 7:00 AM';
	    $event1->enddate = '2020-09-17 10:00 PM';
	    $event1->publiceventurl = '';
	    $event1->createdon = '2020-03-10 10:33 AM';
	    $event1->eventimage = '';
	    $event1->description = '';
        $event1->building = 'Westin Hotel';
	    $event1->expectedoutcome = 'Our International Business Leader Awards (Leader of the Year and Lifetime Achievement) were established in 1992 to recognize business executives from Canadian companies whose visionary corporate leadership has allowed their company to develop a strong, competitive Canadian presence in global markets. In addition to the honorees’ professional achievements, all recipients have demonstrated generous philanthropic endeavors.';
        $event1->eventpageurl = null;

	    $event2 = new stdClass();
	    $event2->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1b';
	    $event2->name = 'Reduce Customs Dalays';
	    $event2->eventtype = 'Webcast';
	    $event2->eventformat = 'On site';
	    $event2->startdate = '2020-04-29 1:00 PM';
	    $event2->enddate = '2020-04-29 1:00 PM';
	    $event2->publiceventurl = 'https://www.eventbrite.ca/e/ata-carnet-webinar-tickets-90203068807';
	    $event2->createdon = '2020-03-10 10:33 AM';
	    $event2->eventimage = '';
	    $event2->description = '';
        $event2->building = 'Westin Hotel';
	    $event2->expectedoutcome = 'Take advantage of FREE online webinars to better understand the rules to follow when importing goods under cover of ATA carnets.';
        $event2->eventpageurl = 'https://www.chamber.ca/event/2020-agm-convention/';

	    $event3 = new stdClass();
	    $event3->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1c';
	    $event3->name = 'Reduce Customs Dalays';
	    $event3->eventtype = 'Webcast';
	    $event3->eventformat = 'On site';
	    $event3->startdate = '2020-05-20 1:00 PM';
	    $event3->enddate = '2020-05-20 2:30 PM';
	    $event3->publiceventurl = 'https://www.eventbrite.ca/e/ata-carnet-webinar-tickets-90205054747';
	    $event3->createdon = '2020-03-10 10:33 AM';
	    $event3->eventimage = '';
	    $event3->description = '';
        $event3->building = 'Westin Hotel';
	    $event3->expectedoutcome = 'Take advantage of FREE online webinars to better understand the rules to follow when importing goods under cover of ATA carnets.';
        $event3->eventpageurl = null;

	    $result = new stdClass();
	    $result->elements = array($event0, $event1, $event2, $event3);
	    $result->total_count = 4;
	    return $result;
    }

    public function getEventsByIds($event_ids)
    {
        $event0 = new stdClass();
        $event0->eventid = 'e7b7c1a2-c77d-495a-aae1-0847640edfa1';
        $event0->name = '2020 AGM & Convention';
        $event0->eventtype = 'Conference';
        $event0->eventformat = 'On site';
        $event0->startdate = '2020-09-26 8:00 AM';
        $event0->enddate = '2020-09-28 6:00 PM';
        $event0->publiceventurl = 'http://www.chamber.ca/events/2020-agm/';
        $event0->createdon = '2020-03-10 10:37 AM';
        $event0->eventimage = '';
        $event0->description = '';
        $event0->building = 'Westin Hotel';
        $event0->expectedoutcome = 'Our AGM & Convention brings together over 320 chamber of commerce executives and community business leaders to discuss the economic 
        and political issues that affect the prosperity of Canadian business. This event enables our member chambers to become more relevant and successful advocates 
        for their communities. It is also THE opportunity for chambers of commerce to present their member businesses’ key concerns to our cross-country network.
         The resolutions adopted pave the way to foster a stronger economic environment for business and will be presented to the federal government and shape our public 
         policy objectives for the upcoming year.';
        $event0->eventpageurl = null;

        $event1 = new stdClass();
        $event1->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1a';
        $event1->name = 'International Business Leader Lifetime Achievement Award';
        $event1->eventtype = 'Conference';
        $event1->eventformat = 'On site';
        $event1->startdate = '2020-09-17 7:00 AM';
        $event1->enddate = '2020-09-17 10:00 PM';
        $event1->publiceventurl = '';
        $event1->createdon = '2020-03-10 10:33 AM';
        $event1->eventimage = '';
        $event1->description = '';
        $event1->building = 'Westin Hotel';
        $event1->eventpageurl = null;
        $event1->expectedoutcome = 'Our International Business Leader Awards (Leader of the Year and Lifetime Achievement) were established in 1992 to recognize business executives from Canadian companies whose visionary corporate leadership has allowed their company to develop a strong, competitive Canadian presence in global markets. In addition to the honorees’ professional achievements, all recipients have demonstrated generous philanthropic endeavors.';

        $event2 = new stdClass();
        $event2->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1b';
        $event2->name = 'Reduce Customs Dalays';
        $event2->eventtype = 'Webcast';
        $event2->eventformat = 'On site';
        $event2->startdate = '2020-04-29 1:00 PM';
        $event2->enddate = '2020-04-29 1:00 PM';
        $event2->publiceventurl = 'https://www.eventbrite.ca/e/ata-carnet-webinar-tickets-90203068807';
        $event2->createdon = '2020-03-10 10:33 AM';
        $event2->eventimage = '';
        $event2->description = '';
        $event2->building = 'Westin Hotel';
        $event2->eventpageurl = null;
        $event2->expectedoutcome = 'Take advantage of FREE online webinars to better understand the rules to follow when importing goods under cover of ATA carnets.';

        $event3 = new stdClass();
        $event3->eventid = '868b50f1-8fc0-405f-b09b-8d6fa7baea1c';
        $event3->name = 'Reduce Customs Dalays';
        $event3->eventtype = 'Webcast';
        $event3->eventformat = 'On site';
        $event3->startdate = '2020-05-20 1:00 PM';
        $event3->enddate = '2020-05-20 2:30 PM';
        $event3->publiceventurl = 'https://www.eventbrite.ca/e/ata-carnet-webinar-tickets-90205054747';
        $event3->createdon = '2020-03-10 10:33 AM';
        $event3->eventimage = '';
        $event3->description = '';
        $event3->building = 'Westin Hotel';
        $event3->eventpageurl = null;
        $event3->expectedoutcome = 'Take advantage of FREE online webinars to better understand the rules to follow when importing goods under cover of ATA carnets.';

        $events = array('e7b7c1a2-c77d-495a-aae1-0847640edfa1'=>$event0,'868b50f1-8fc0-405f-b09b-8d6fa7baea1a'=>$event1,'868b50f1-8fc0-405f-b09b-8d6fa7baea1b'=>$event2,
            '868b50f1-8fc0-405f-b09b-8d6fa7baea1c'=>$event3);

        $result = new stdClass();
        $result->elements = array();

        foreach ($event_ids as $id)
        {
            if(array_key_exists($id,$events))
                array_push($result->elements, $events[$id]);
        }

        $result->total_count = count($result->elements);
        return $result;
    }

    public function getAllInvoicesByCustomerNumber($customerNumber, $paid){
        $result = new stdClass();
        if ($paid === 0) {
            $result->total_count = 2;
            //element 1
            $element1 = new stdClass();
            $element1->InvoiceDescription = 'Name of Invoice';
            $element1->DueDate = 'Dec 31, 2019';
            $element1->DocumentTotalIncludingTax = 1000;

            //element 2
            $element2 = new stdClass();
            $element2->InvoiceDescription = 'Name of Invoice';
            $element2->DueDate = 'Dec 2, 2019';
            $element2->DocumentTotalIncludingTax = 2000;
            
            $result->elements = array($element1, $element2);
        } else {
            $result->total_count = 1;
            //element 1
            $element1 = new stdClass();
            $element1->InvoiceDescription = 'Name of Invoice';
            $element1->DatePaid = 'Oct 31, 2019';
            $element1->DocumentTotalIncludingTax = 1000;

            $result->elements = array($element1);
        }

        return $result;
    }

    public function getBoardDirectory($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $boardmember = new stdClass();
        $boardmember->contactid = "6093d8e6-a6fe-e211-aaf9-000c29c04ade";
        $boardmember->fullname = "Aaron Rubinoff";
        $boardmember->jobtitle = null;
        $boardmember->city = "Ottawa";
        $boardmember->province = "ON";
        $boardmember->boardofdirectorsrole = null;
        $boardmember->companyname = "Perley-Robertson, Hill & McDougall LLP";
        $boardmember->telephone = "76489188";

        $boardmember1 = new stdClass();
        $boardmember1->contactid = "b3ee047e-8800-e511-bafe-000c29c04ade";
        $boardmember1->fullname = "Alexandra Mitretodis";
        $boardmember1->jobtitle = null;
        $boardmember1->city = "Vancouver";
        $boardmember1->province = "BC";
        $boardmember1->boardofdirectorsrole = null;
        $boardmember1->companyname = "Fasken Martineau DuMoulin LLP";

        $result = new stdClass();
        $result->elements = array($boardmember,$boardmember1);
        $result->total_count = 2;

        return $result;
    }

    public function getOfficersMembers()
    {
        $officers_boardmember = new stdClass();
        $officers_boardmember->contactid = "";
        $officers_boardmember->fullname = "Perrin Beatty";
        $officers_boardmember->jobtitle = "Canadian Chamber of Commerce";
        $officers_boardmember->city = "Ottawa";
        $officers_boardmember->province = "ON";
        $officers_boardmember->boardofdirectorsrole = "PRESIDENT";
        $officers_boardmember->companyname = "PC,OC";
        $officers_boardmember->image = null;
        $officers_boardmember->telephone = "76489188";
        $officers_boardmember->email = "myemail@chamber.ca";

        $officers_boardmember1 = new stdClass();
        $officers_boardmember1->contactid = "";
        $officers_boardmember1->fullname = "Ginny Flood";
        $officers_boardmember1->jobtitle = "Vice President, Government Relations";
        $officers_boardmember1->city = "Calagary";
        $officers_boardmember1->province = "AB";
        $officers_boardmember1->boardofdirectorsrole = "IMMEDIATE PAST CHAIR";
        $officers_boardmember1->companyname = "Suncor Energy Inc";
        $officers_boardmember1->image = null;
        $officers_boardmember1->telephone = "76489189";
        $officers_boardmember1->email = null;

        $officers_boardmember2 = new stdClass();
        $officers_boardmember2->contactid = "";
        $officers_boardmember2->fullname = "Phil Noble";
        $officers_boardmember2->jobtitle = "Former CEO (Retired)";
        $officers_boardmember2->city = "Toronto";
        $officers_boardmember2->province = "ON";
        $officers_boardmember2->boardofdirectorsrole = "CHAIR";
        $officers_boardmember2->companyname = "Grant Thornton LLP";
        $officers_boardmember2->image = null;
        $officers_boardmember2->telephone = "76489190";
        $officers_boardmember2->email = null;

        $officers_boardmember3 = new stdClass();
        $officers_boardmember3->contactid = "";
        $officers_boardmember3->fullname = "Mario Thériault";
        $officers_boardmember3->jobtitle = "LAC Group";
        $officers_boardmember3->city = "Moncton";
        $officers_boardmember3->province = "NB";
        $officers_boardmember3->boardofdirectorsrole = "SUBSTITUTE";
        $officers_boardmember3->companyname = "Chief Business Development Officer";
        $officers_boardmember3->image = null;
        $officers_boardmember3->telephone = "76489191";
        $officers_boardmember3->email = null;

        $officers_boardmember4 = new stdClass();
        $officers_boardmember4->contactid = "";
        $officers_boardmember4->fullname = "Victor Pang";
        $officers_boardmember4->jobtitle = "Chief Financial Officer";
        $officers_boardmember4->city = "Vancouver";
        $officers_boardmember4->province = "BC";
        $officers_boardmember4->boardofdirectorsrole = "TREASURER";
        $officers_boardmember4->companyname = "Vancouver Fraser Port Authority";
        $officers_boardmember4->image = null;
        $officers_boardmember4->telephone = null;
        $officers_boardmember4->email = null;

        $result = new stdClass();
        $result->elements = array($officers_boardmember,$officers_boardmember1,$officers_boardmember2,$officers_boardmember3,$officers_boardmember4);
        $result->total_count = 5;

        return $result;
    }

    public function getCountByMembershipType()
    {
        $data = new stdClass();
        $data->corporate_count = 2345;
        $data->association_count = 478;
        $data->chamber_count = 234;

        return $data;
    }

    public function insertRequestOfMember($memberData, $contactData, $areasOfInterestData = null, $industryTypesData = null, $chamberMemberTypes = null, $chamberOthersStaff = null){
        return 1;
    }

    public function insertRequestOfArbitrator($memberData){
        return 1;
    }

    public function insertLead($name, $companyname, $description, $emailaddress1, $gdrp = false){
        return 1;
    }
}
