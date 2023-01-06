<?php
include_once dirname(__FILE__) . '/../dynamics/dynamicsIntegration.php';
include_once dirname(__FILE__) . '/../sage300/sage300Integration.php';
include_once 'MockDataService.php';

class ServiceType {
    const Events = 0;
    const Users = 1;
    const Sage300 = 2;
}

class DataServiceCCC
{
    var $is_localhost;

    var $force_server;

    function __construct($force_server = false)
    {
        $this->is_localhost = get_option('siteurl');
        $this->force_server = $force_server;
        return true;
    }

    private function getClient($serviceType)
    {
        if ($serviceType == ServiceType::Users){
            $dynamicIntegration = new DynamicsIntegration(ServerNameCRM::ACCOUNT);
            if (!$dynamicIntegration || !$dynamicIntegration->client)
                return null;
            else return $dynamicIntegration;
        }
        else return new Sage300Integration();
    }

    public function getAllAccountsByMembershipType($type, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client){
            return $client->getAllAccountsByMembershipType($type, $filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    public function getAllContactByAccount($account_id, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        return null;
    }

    public function getContactById($contact_id)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client) {
            return $client->getContactById($contact_id);
        }
        return false;
    }

	/**
	 * @param $contact_id
	 * @return array|false|null
	 */
	public function fetchContactMarketingList($contact_id)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client) {
            return $client->fetchContactMarketingList($contact_id);
        }
        return false;
    }

	/**
	 * Gets the contact interests by client id
	 *
	 * @param $contact_id
	 * @return false|stdClass|null
	 */
	public function getContactInterestsByContactId($contact_id)
	{
		$client = $this->getClient(ServiceType::Users);
		if ($client)
			return $client->getContactInterestsByContactId($contact_id);

		return false;
	}

	/**
	 * @param null $ids
	 * @return array|false|null
	 */
	public function getMarketingListsByIDs($ids = null)
	{
		$client = $this->getClient(ServiceType::Users);
		if ($client) {
			return $client->getMarketingListsByIDs($ids);
		}

		return false;
	}

	/**
	 * @param $contact_id
	 * @param $data
	 * @return bool|null
	 * @throws Exception
	 */
	public function updateContactSubscription($contact_id, $data): ?bool
	{
		$client = $this->getClient(ServiceType::Users);
		if ($client){
			return $client->updateContactSubscription($contact_id, $data);
		}
		return false;
	}

    public function updateContact($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $age_range,
                                  $address1_line1, $address1_city, $address1_stateorprovince, $address1_postalcode, $address1_line2)
    {
	    $client = $this->getClient(ServiceType::Users);
	    if ($client){
            return $client->updateContact($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $age_range,
                $address1_line1, $address1_city, $address1_stateorprovince, $address1_postalcode, $address1_line2);
        }
	    return false;
    }

    public function getAllArbitrators($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client){
            return $client->getAllArbitrators($filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    public function getArbitratorBioByContactId($contact_id)
    {
        $client = $this->getClient(ServiceType::Users);
        $bio = false;
        if ($client){
            $bio =  $client->getArbitratorBioByContactId($contact_id);
        }
        return $bio;
    }

    public function updateArbitrator($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $website, $specializations, $expertise, $languages, $provinces, $city)
    {
	    $client = $this->getClient(ServiceType::Users);
	    if ($client){
            return $client->updateArbitrator($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $website, $specializations, $expertise, $languages, $provinces, $city);
        }
	    return false;
    }

	/**
	 * @param array $attributes
	 * @return bool|null
	 */
	public function updateMembershipAccount(array $attributes): ?bool
	{
		$client = $this->getClient(ServiceType::Users);
		if ($client) {
			return $client->updateMembershipAccount($attributes);
		}
		return false;
	}

    public function updateArbitratorBio($arbitratorbio_id, $ccc_bio, $ccc_website)
    {
	    $client = $this->getClient(ServiceType::Users);
	    if ($client){
            return $client->updateArbitratorBio($arbitratorbio_id, $ccc_bio, $ccc_website);
        }
	    return false;
    }

	/**
	 * @param null $filters
	 * @param false $allPages
	 * @param null $pagingCookie
	 * @param null $limitCount
	 * @param null $pageNumber
	 * @return false|stdClass|null
	 */
	public function getBoardDirectory($filters = null, bool $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client){
            return $client->getBoardDirectory($filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    public function getOfficersMembers(){
        $client = $this->getClient(ServiceType::Users);
        if ($client) {
            return $client->getOfficersMembers();
        }
        return $this->emptyArrayResult();
    }

    public function getStaffDirectory($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client) {
            return $client->getStaffDirectory($filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    private function emptyArrayResult(){
        $result = new stdClass();
        $result->total_count = 0;
        $result->elements = array();
        return $result;
    }

    /**
     * Pulls in all events from the service with the most recent events firsts
     *
     * @param null $filters
     * @param false $allPages
     * @param null $pagingCookie
     * @param null $limitCount
     * @param null $pageNumber
     * @return false|stdClass|null
     */
    public function getAllEvents($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
	    $client = $this->getClient(ServiceType::Events);
	    if ($client){
            return $client->getAllEvents($filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    public function getEventById($event_id)
    {
        $client = $this->getClient(ServiceType::Events);
        if ($client) {
            return $client->getEventById($event_id);
        }
        return new stdClass();
    }

    public function getFeaturedEvent()
    {
        $client = $this->getClient(ServiceType::Events);
        if ($client){
            return $client->getFeaturedEvent();
        }
        return new stdClass();
    }

    public function getAllEventsById($event_ids)
    {
        $client = $this->getClient(ServiceType::Events);
        if ($client){
            return $client->getEventsByIds($event_ids);
        }
        return $this->emptyArrayResult();
    }

    public function insertRequestOfMember($memberData, $contactData, $areasOfInterestData = null, $industryTypesData = null, $chamberMemberTypes = null, $chamberOthersStaff = null)
    {
        $client = $this->getClient(ServiceType::Users);
        return $client ? $client->insertRequestOfMember($memberData, $contactData, $areasOfInterestData, $industryTypesData, $chamberMemberTypes, $chamberOthersStaff) : -1;
    }

    public function insertRequestOfArbitrator($memberData)
    {
        $client = $this->getClient(ServiceType::Users);
        return $client ? $client->insertRequestOfArbitrator($memberData) : -1;
    }

    public function insertLead($name, $companyname, $description, $emailaddress1, $gdrp = false){
        $client = $this->getClient(ServiceType::Users);
        return $client ? $client->insertLead($name, $companyname, $description, $emailaddress1, $gdrp) : -1;
    }

    static function ageRangeOptions()
    {
        return DynamicsIntegration::ageRangeOptions();
    }

    static function getProvinces()
    {
        return DynamicsIntegration::provinceCRMOptions();
    }

    static function getMarketingProvinces()
    {
        return DynamicsIntegration::provinceMarketingCRMOptions();
    }

    public function getAllInvoicesByCustomerNumber($customerNumber, $paid){
        $client = $this->getClient(ServiceType::Sage300);
        $http_result = $client->getAllInvoicesByCustomerNumber($customerNumber, $paid);
        return $http_result ? $http_result : false;
    }

    public function getCountByMembershipType()
    {
        $result = new stdClass();
        $result->corporate_count = 0;
        $result->association_count = 0;
        $result->chamber_count = 0;
        $client = $this->getClient(ServiceType::Users);
        if ($client) {
            $counts = $client->getCountByMembershipType();
            if($counts)
            {
                $result->corporate_count = $counts->corporate_count;
                $result->association_count = $counts->association_count;
                $result->chamber_count = $counts->chamber_count;
            }
        }
        return $result;
    }

    public function getFeaturedMembersByMembershipType($type)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client){
            return $client->getFeaturedMembersByMembershipType($type);
        }
        return new stdClass();
    }

	/**
	 * @param $type
	 * @param $accountId
	 * @return stdClass|null
	 */
	public function getCurrentlyLoggedInMembership($type, $accountId): ?stdClass
	{
		$client = $this->getClient(ServiceType::Users);
		if ($client) {
			$member = $client->getMemberByMembershipTypeAndAccountId($type, $accountId);
			return $member->elements[0];
		}
		return new stdClass();
	}

    public function getAllMembersByMembershipType($type, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
    {
        $client = $this->getClient(ServiceType::Users);
        if ($client){
            return $client->getAllMembersByMembershipType($type, $filters, $allPages, $pagingCookie, $limitCount, $pageNumber);
        }
        return false;
    }

    static function getIndustryTypes()
    {
        return DynamicsIntegration::industryTypeCRMOptions();
    }

    static function getServices()
    {
        return DynamicsIntegration::serviceCRMOptions();
    }

    static function getServicesWithoutKeys()
    {
        return [
			'new_advertisingmediadigitalservices' => 'Advertising, Media & Digital Services',
			'new_artsculturetourism' => 'Arts, Culture & Tourism',
			'new_associationnotforprofit' => 'Association & Not-for-Profit',
			'new_energyenvironment' => 'Energy & Environment',
			'new_financialservices' => 'Financial Services',
			'new_foodbeverages' => 'Food & Beverages',
			'new_healthwellness' => 'Health & Wellness',
			'new_manufacturingexports' => 'Manufacturing & Exports',
			'new_miscellaneous' => 'Miscellaneous',
			'new_professionalservices' => 'Professional Services',
			'new_publicsecmunicipalityedufacilityhospital' => 'Public Sector, Municipalities, Universities, Schools & Hospitals',
			'new_realestateconstructiondevelopment' => 'Real Estate, Construction & Development',
			'new_retail' => 'Retail',
			'new_technology' => 'Technology',
			'new_transportationlogistics' => 'Transportation & Logistics',
		];
    }
}
