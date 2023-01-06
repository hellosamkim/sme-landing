<?php

use AlexaCRM\CRMToolkit\Client;
use AlexaCRM\CRMToolkit\Entity\MetadataCollection;
use AlexaCRM\CRMToolkit\Settings;
use AlexaCRM\CRMToolkit\Entity\EntityReference;

class ServerNameCRM
{
	const MARKETING = 'Marketing';
	const ACCOUNT = 'Account';
}

class BecomeMemberType
{
	const BUSINESS = 'Business';
	const ASSOCIATION = 'Association';
	const CHAMBER = 'Chamber';
}

class AssociationType
{
	const ASSOCIATION_PARTNER = '100000000';
	const ENGAGEMENT_PARTNER = '100000001';
	const POLICY_PARTNER = '100000002';
}

class ArbitratorType
{
	const SOLE_ARBITRATOR_OR_LAWYER_MEMBER_OF_CHAMBER = '100000003';
	const SOLE_ARBITRATOR_OR_LAWYER_NOT_MEMBER_OF_CHAMBER = '100000004';
	const ACADEMIC_GOVERNMENT_OR_NON_PROFIT_ORGANIZATION_LAWYER = '100000005';
	const YOUNG_PRACTITIONER = '100000006';
	const IN_HOUSE_LAWYER = '100000007';
}

class YesOrNo
{
	const YES = '100000000';
	const NO = '100000001';
}

class SubjectAreaCRM
{
	const CHAMBER = '803330001';
	const CORPORATE_ASSOCIATION = '803330002';
	const ICC_PUBLICATIONS = '803330006';
}

class SubjectAreaFrCRM
{
	const CHAMBER = '803330000';
	const CORPORATE_ASSOCIATION = '803330001';
	const ICC_PUBLICATIONS = '803330008';
}

class LanguagesCRM
{
	const ENGLISH = '803330000';
	const FRENCH = '803330001';
}

class MembershipTypeCRM
{
	const CORPORATE_MEMBERSHIP = '803330000';
	const ASSOCIATION_MEMBERSHIP = '803330001';
	const CHAMBER_MEMBERSHIP = '803330002';
	const ONLY_SECONDARY_MEMERSHIP_TYPES = '803330003';
	const CANADIAN_CHAMBER_OF_COMMERCE = '100000000';
	const NON_MEMBER = '803330004';
}

class AgeRangeCRM
{
	const RANGE_35_AND_UNDER = '803330000';
	const RANGE_36_TO_45 = '803330001';
	const RANGE_46_TO_55 = '803330002';
	const RANGE_56_TO_65 = '803330003';
	const RANGE_66_AND_ABOVE = '803330004';
}

class AgeRangeArbitratorCRM
{
	const RANGE_35_AND_UNDER = '100000000';
	const RANGE_36_TO_45 = '100000001';
	const RANGE_46_TO_55 = '100000002';
	const RANGE_56_TO_65 = '100000003';
	const RANGE_66_AND_ABOVE = '100000004';
}

class SalutationCRM
{
	const MR = '803330019';
	const MRS = '803330020';
	const MS = '803330021';
	const DR = '803330006';
}

class EventTypeCRM
{
	const CONFERENCE = '100000002';
	const CONVENTION = '803330002';
	const DEMONSTRATION = '100000003';
	const EXECUTIVE_BRIEFING = '100000001';
	const MEETING_OR_NETWORKING = '803330000';
	const SEMINAR_OR_TALK = '803330001';
	const TRAINING = '100000004';
	const WEBCAST = '100000005';
}

class EventFormatCRM
{
	const ON_SITE = '100000001';
	const WEBINAR = '100000002';
	const HYBRID = '100000003';
}

class BoardOfDirectorsRoleCRM
{
	const CHAIR = '803330000';
	const VICECHAIR = '100000006';
	const IMMEDIATE_PAST_CHAIR = '100000000';
	const PRESIDENT = '100000001';
	const SECRETARY = '100000002';
	const DIRECTORY = '100000003';
	const SUBSTITUTE = '100000004';
	const TREASURER = '100000005';

}

class ProvinceCRM
{
	const NOT_APPLICABLE = '803330000';
	const AB = '803330001';
	const BC = '803330002';
	const MB = '803330003';
	const NB = '803330004';
	const NL = '803330005';
	const NT = '803330006';
	const NS = '803330007';
	const NU = '803330008';
	const ON = '803330009';
	const QC = '803330010';
	const SK = '803330011';
	const YT = '803330012';
	const AL = '803330014';
	const AK = '803330015';
	const AZ = '803330016';
	const AR = '803330017';
	const CA = '803330018';
	const CO = '803330019';
	const CT = '803330020';
	const DE = '803330021';
	const DC = '803330022';
	const FL = '803330023';
	const GA = '803330024';
	const HI = '803330025';
	const ID = '803330026';
	const IL = '803330027';
	const IN = '803330028';
	const IA = '803330029';
	const KS = '803330030';
	const KY = '803330031';
	const LA = '803330032';
	const ME = '803330033';
	const MD = '803330034';
	const MA = '803330035';
	const MI = '803330036';
	const MN = '803330037';
	const MS = '803330038';
	const MO = '803330039';
	const MT = '803330040';
	const NE = '803330041';
	const NV = '803330042';
	const NH = '803330043';
	const NJ = '803330044';
	const NM = '803330045';
	const NY = '803330046';
	const NC = '803330047';
	const ND = '803330048';
	const OH = '803330049';
	const OK = '803330050';
	const OR_ = '803330051';
	const PA = '803330052';
	const RI = '803330053';
	const SC = '803330054';
	const SD = '803330055';
	const TN = '803330056';
	const TX = '803330057';
	const UT = '803330058';
	const VT = '803330059';
	const VA = '803330060';
	const WA = '803330061';
	const WV = '803330062';
	const WI = '803330063';
	const WY = '803330064';
	const INTERNATIONAL = '803330065';
	const PE = '803330066';
}

class CityCRM
{
	const NOT_APPLICABLE = '803330000';
	const CA = '803330001';
	const EA = '803330002';
	const HO = '803330003';
	const KO = '803330004';
	const MQ = '803330005';
	const OO = '803330006';
	const QQ = '803330007';
	const TO = '803330008';
	const VB = '803330009';
	const WM = '803330010';
	const OR = '803330011';
}

class ServiceBusinessMemberCRM
{
	const AMD = '100000000';
	const ACT = '100000001';
	const AN = '100000002';
	const EE = '100000003';
	const FS = '100000004';
	const FB = '100000005';
	const HW = '100000006';
	const ME = '100000007';
	const MI = '100000008';
	const PS = '100000009';
	const PSM = '100000010';
	const RECD = '100000011';
	const RE = '100000012';
	const TE = '100000013';
	const TR = '100000014';
}

class IndustryTypeCRM
{
	const ACC = '803330000';
	const AMC = '803330001';
	const AGR = '803330002';
	const AER = '803330003';
	const BPS = '803330004';
	const CE = '803330005';
	const ES = '803330006';
	const FI = '803330007';
	const FBS = '803330008';
	const GO = '803330009';
	const HCSS = '803330010';
	const HT = '803330011';
	const HPS = '803330012';
	const IE = '803330013';
	const LS = '803330014';
	const LF = '803330015';
	const MAN = '803330016';
	const ME = '803330017';
	const MOG = '803330018';
	const OTHER = '803330019';
	const PP = '803330020';
	const RED = '803330021';
	const RT = '803330022';
	const ST = '803330023';
	const TW = '803330024';
	const UT = '803330025';
	const WT = '803330026';
}

class ProvinceMarketingCRM
{
	const PEI = '803330000';
	const NB = '803330001';
	const NS = '803330002';
	const NF = '803330003';
	const ON = '803330004';
	const QC = '803330005';
	const MB = '803330006';
	const AB = '803330007';
	const BC = '803330008';
	const NU = '803330009';
	const YT = '803330010';
	const NT = '803330011';
}

class SalutationMarketingCRM
{
	const MR = '803330000';
	const MISS = '803330001';
	const MRS = '803330002';
	const DR = '803330003';
	const MS = '803330004';
}


class DynamicsIntegration
{
	var $setting;

	var $client;

	var $metadata;

	function __construct($crm_server_name = '')
	{

		if (empty($crm_server_name) || $crm_server_name == ServerNameCRM::ACCOUNT) {
			error_log(accountCRMServerUrl);
			$options = [
				'serverUrl' => accountCRMServerUrl,
				'username' => accountCRMUsername,
				'password' => accountCRMPassword,
				'authMode' => accountCRMAuthMode,
				'ignoreSslErrors' => true
			];
		} else if ($crm_server_name == ServerNameCRM::MARKETING) {
			$options = [
				'serverUrl' => marketingCRMServerUrl,
				'username' => marketingCRMUsername,
				'password' => marketingCRMPassword,
				'authMode' => marketingCRMAuthMode,
				'ignoreSslErrors' => true
			];
		}

		try {

			$this->setting = new Settings($options);

			$this->client = new Client($this->setting);

			$this->metadata = MetadataCollection::instance($this->client);

			if (!$this->setting->hasOrganizationData()) {
				return false;
			}

		} catch (Exception $exception) {
			return false;
		}

		return true;
	}


	private function getAllByFetchXML($fetchXML, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
	{
		$result = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

		return $result->Entities;
	}


	private function getFirstByFetchXML($fetchXML)
	{
		if ($this->client == null)
			return null;

		$result = $this->client->retrieveMultiple($fetchXML, false, null, 1, null, true);

		return ($result->Count) ? $result->Entities[0] : null;
	}


	public function getAllAccountsByMembershipType($type, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
	{
		if ($this->client == null)
			return null;

		$or_conditions_1 = '';
		$or_conditions_2 = '';
		if ($filters != null) {
			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions_1 .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions_1 .= '<condition attribute="ccc_address1provincestate" operator="eq" value="' . $province . '" />';
				}
				$or_conditions_1 .= '</filter>';
			}

			if (isset($filters->starts_with) && $filters->starts_with != null && sizeof($filters->starts_with)) {
				$or_conditions_1 .= '<filter type="or">';
				$or_conditions_1 .= '<condition attribute="name" operator="like" value="' . trim($filters->starts_with) . '%" />';
				$or_conditions_1 .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions_2 .= '<filter type="or">';
				$or_conditions_2 .= '<condition attribute="name" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="telephone1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="emailaddress1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="websiteurl" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '</filter>';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                        <entity name="account" >
                            <attribute name="accountid" />
                            <attribute name="name" />
                            <attribute name="telephone1" />
                            <attribute name="emailaddress1" />
                            <attribute name="websiteurl" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="address1_country" />
                            <order attribute="name" descending="false" />
                            <filter type="and" >
                                <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                            </filter>
                            ' . $or_conditions_1 . $or_conditions_2 . '
                        </entity>
                     </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="account" >  
                             <attribute name="accountid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                  	<condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                  </filter>   
                                  ' . $or_conditions_1 . $or_conditions_2 . '                               
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Entities[0]->count->Value->accountid);

		if ($count > 0) {
			$elementsCRM = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($elementsCRM->Entities as $accountCRM) {
				$account = new stdClass();
				$account->accountid = $accountCRM->accountid;
				$account->name = $accountCRM->name;
				$account->telephone1 = isset($accountCRM->telephone1) ? $accountCRM->telephone1 : null;
				$account->emailaddress1 = isset($accountCRM->emailaddress1) ? $accountCRM->emailaddress1 : null;
				$account->address1_city = isset($accountCRM->address1_city) ? $accountCRM->address1_city : null;
				$account->address1_stateorprovince = isset($accountCRM->ccc_address1provincestate) ? $accountCRM->ccc_address1provincestate->FormattedValue : null;
				$account->address1_country = isset($accountCRM->address1_country) ? $accountCRM->address1_country : null;

				$elements[] = $account;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	/**
	 * @return stdClass|null
	 */
	public function getCountByMembershipType(): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXMLCorporateCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="account" >  
                             <attribute name="accountid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . MembershipTypeCRM::CORPORATE_MEMBERSHIP . '" />
                                    <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                  </filter>   
                            </entity>
                        </fetch>';

		$fetchXMLAssociationCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="account" >  
                             <attribute name="accountid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . MembershipTypeCRM::ASSOCIATION_MEMBERSHIP . '" />
                                    <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                  </filter>   
                            </entity>
                        </fetch>';

		$fetchXMLChamberCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="account" >  
                             <attribute name="accountid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . MembershipTypeCRM::CHAMBER_MEMBERSHIP . '" />
                                    <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                  </filter>   
                            </entity>
                        </fetch>';

		$elementsCRMCorporateCount = $this->client->retrieveMultiple($fetchXMLCorporateCount, true, null, null, null, true);
		$corporate_count = intval($elementsCRMCorporateCount->Entities[0]->count->Value->accountid);

		$elementsCRMAssociationCount = $this->client->retrieveMultiple($fetchXMLAssociationCount, true, null, null, null, true);
		$association_count = intval($elementsCRMAssociationCount->Entities[0]->count->Value->accountid);

		$elementsCRMChamberCount = $this->client->retrieveMultiple($fetchXMLChamberCount, true, null, null, null, true);
		$chamber_count = intval($elementsCRMChamberCount->Entities[0]->count->Value->accountid);

		$data = new stdClass();
		$data->corporate_count = $corporate_count;
		$data->association_count = $association_count;
		$data->chamber_count = $chamber_count;

		return $data;
	}


	public function getAllContactByAccount($account_id, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
                        <entity name="contact" >
                            <attribute name="contactid" />
                            <attribute name="fullname" />
                            <attribute name="firstname" />
                            <attribute name="lastname" />
                            <attribute name="emailaddress1" />
                            <attribute name="telephone1" />
                            <attribute name="mobilephone" />
                            <attribute name="jobtitle" />       
                            <attribute name="address1_composite" />
                            <attribute name="address1_line1" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="address1_postalcode" />
                            <attribute name="address2_line1" />
                            <attribute name="ccc_agerange" />
                            <order attribute="fullname" descending="false" />
                            <filter type="and" >
                                  <condition attribute="statecode" operator="eq" value="0" />
                                  <condition attribute="statuscode" operator="eq" value="1" />
                            </filter>
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" >
                                <filter type="and" >
                                    <condition attribute="accountid" operator="eq" value="{' . $account_id . '}" />
                                    <condition attribute="accountid" operator="not-null" />
                                </filter>
                            </link-entity>
                        </entity>
                    </fetch>';

		return $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);
	}


	/**
	 * Get's a singular contact's Interest
	 *
	 * @param $contact_id
	 * @return stdClass|null
	 */
	public function getContactInterestsByContactId($contact_id): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
                        <entity name="contact" >
                            <attribute name="contactid" />
                            <attribute name="new_artificialintelligence" />
                            <attribute name="new_canadaus" />
                            <attribute name="new_cannabis" />
                            <attribute name="new_circulareconomy" />
                            <attribute name="new_competitionpolicy" />
                            <!--<attribute name="new_diversityandinclusion" />-->
                            <attribute name="new_environment" />
                            <attribute name="new_fintech" />
                            <attribute name="new_fiscalpolicy" />
                            <attribute name="new_indigenousbusinessrelations" />
                            <attribute name="new_infrastructure" />
                            <attribute name="new_innovation" />
                            <attribute name="new_intellectualproperty" />
                            <attribute name="new_internaltrade" />
                            <attribute name="new_internationalaffairs" />
                            <attribute name="new_labourrelations" />
                            <!--<attribute name="new_naturalresourcesandenergy" />-->
                            <attribute name="new_scienceandtechnology" />
                            <attribute name="new_skillsandimmigration" />
                            <attribute name="new_smallandmediumsizedbusiness" />
                            <attribute name="new_transportation" />
                            <!--<attribute name="new_otherareaofpolicyinterest" />-->
                            <order attribute="fullname" descending="false" />
                            <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="contactid" operator="eq" value="{' . $contact_id . '}" />
                                <condition entityname="contact_account" attribute="statecode" operator="eq" value="0" />
                            </filter>
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account">
                                <attribute name="ccc_membershiptype" alias="ccc_membershiptype" />
                                <attribute name="name"/>
                                <attribute name="websiteurl" />
                                <attribute name="accountid" alias="accountid"/>
                                <filter type="and" >
                                    <condition attribute="accountid" operator="not-null" />
                                </filter>
                            </link-entity>
                         </entity>
                    </fetch>';

		$contactCRMInterests = $this->getFirstByFetchXML($fetchXML);
		$interests = new stdClass();

		if ($contactCRMInterests) {
			$interests->new_artificialintelligence = $contactCRMInterests->new_artificialintelligence->Value ?? false;
			$interests->new_canadaus = $contactCRMInterests->new_canadaus->Value ?? false;
			$interests->new_cannabis = $contactCRMInterests->new_cannabis->Value ?? false;
			$interests->new_circulareconomy = $contactCRMInterests->new_circulareconomy->Value ?? false;
			$interests->new_competitionpolicy = $contactCRMInterests->new_competitionpolicy->Value ?? false;
			//$interests->new_diversityandinclusion = $contactCRMInterests->new_diversityandinclusion->Value ?? false;
			$interests->new_environment = $contactCRMInterests->new_environment->Value ?? false;
			$interests->new_fintech = $contactCRMInterests->new_fintech->Value ?? false;
			$interests->new_fiscalpolicy = $contactCRMInterests->new_fiscalpolicy->Value ?? false;
			$interests->new_indigenousbusinessrelations = $contactCRMInterests->new_indigenousbusinessrelations->Value ?? false;
			$interests->new_infrastructure = $contactCRMInterests->new_infrastructure->Value ?? false;
			$interests->new_innovation = $contactCRMInterests->new_innovation->Value ?? false;
			$interests->new_intellectualproperty = $contactCRMInterests->new_intellectualproperty->Value ?? false;
			$interests->new_internaltrade = $contactCRMInterests->new_internaltrade->Value ?? false;
			$interests->new_internationalaffairs = $contactCRMInterests->new_internationalaffairs->Value ?? false;
			$interests->new_labourrelations = $contactCRMInterests->new_labourrelations->Value ?? false;
			//$interests->new_naturalresourcesandenergy = $contactCRMInterests->new_naturalresourcesandenergy ?? false;
			$interests->new_scienceandtechnology = $contactCRMInterests->new_scienceandtechnology->Value ?? false;
			$interests->new_skillsandimmigration = $contactCRMInterests->new_skillsandimmigration->Value ?? false;
			$interests->new_smallandmediumsizedbusiness = $contactCRMInterests->new_smallandmediumsizedbusiness->Value ?? false;
			$interests->new_transportation = $contactCRMInterests->new_transportation->Value ?? false;
			//$interests->new_otherareaofpolicyinterest = $contactCRMInterests->new_otherareaofpolicyinterest->Value ?? false;
		}

		return $interests;
	}


	/**
	 * Gets contact by $contact_id
	 *
	 * @param $contact_id
	 * @return stdClass|null
	 */
	public function getContactById($contact_id): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
                        <entity name="contact" >
                            <attribute name="contactid" />
                            <attribute name="fullname" />
                            <attribute name="firstname" />
                            <attribute name="lastname" />
                            <attribute name="emailaddress1" />
                            <attribute name="telephone1" />
                            <attribute name="websiteurl" />
                            <attribute name="jobtitle" />       
                            <attribute name="address1_line1" />
                            <attribute name="address1_line2" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="address1_postalcode" />
                            <attribute name="address1_country" />
                            <attribute name="ccc_agerange" />
                            <attribute name="ccc_languages" />
                            <attribute name="ccc_languagepreference" />
                            <attribute name="entityimageid" />
                            <attribute name="ccc_caslconsent" />
                            <attribute name="ccc_specializations" />
                            <order attribute="fullname" descending="false" />
                            <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="contactid" operator="eq" value="{' . $contact_id . '}" />
                                <condition entityname="contact_account" attribute="statecode" operator="eq" value="0" />
                            </filter>
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account">
                                <attribute name="ccc_membershiptype" alias="ccc_membershiptype" />
                                <attribute name="name"/>
                                <attribute name="websiteurl" />
                                <attribute name="accountid" alias="accountid"/>
                                <filter type="and" >
                                    <condition attribute="accountid" operator="not-null" />
                                </filter>
                            </link-entity>
                         </entity>
                    </fetch>';

		$contactCRM = $this->getFirstByFetchXML($fetchXML);

		$contact = new stdClass();

		if ($contactCRM) {
			/*print('<pre>');
			print_r($contactCRM);
			print('</pre>');
			exit;*/
			$contact->contactid = $contactCRM->contactid;
			$contact->fullname = $contactCRM->fullname;
			$contact->firstname = $contactCRM->firstname;
			$contact->lastname = $contactCRM->lastname;
			$contact->emailaddress1 = $contactCRM->emailaddress1 ?? null;
			$contact->telephone1 = $contactCRM->telephone1 ?? null;
			$contact->websiteurl = $contactCRM->websiteurl ?? null;
			$contact->jobtitle = $contactCRM->jobtitle ?? null;
			$contact->address1_line1 = $contactCRM->address1_line1 ?? null;
			$contact->address1_line2 = $contactCRM->address1_line2 ?? null;
			$contact->address1_postalcode = $contactCRM->address1_postalcode ?? null;
			$contact->city = $contactCRM->address1_city ?? null;
			$contact->province_id = isset($contactCRM->ccc_address1provincestate) ? $contactCRM->ccc_address1provincestate->Value : null;
			$contact->province = isset($contactCRM->ccc_address1provincestate) ? $contactCRM->ccc_address1provincestate->FormattedValue : null;
			$contact->country = $contactCRM->address1_country ?? null;
			$contact->languagepreference = isset($contactCRM->ccc_languagepreference) ? $contactCRM->ccc_languagepreference->FormattedValue : null;
			$contact->languages = $contactCRM->ccc_languages ?? null;
			$contact->agerange = isset($contactCRM->ccc_agerange) ? $contactCRM->ccc_agerange->FormattedValue : null;
			$contact->companyname = $contactCRM->contact_account->name ?? null;
			$contact->companywebsiteurl = $contactCRM->contact_account->websiteurl ?? null;
			$contact->accountid = $contactCRM->accountid;
			$contact->caslconsent = $contactCRM->ccc_caslconsent->FormattedValue ?? 'No';
			//$contact->MarketingLists = $contactCRM->MarketingLists ?? null;

			//image
			if (isset($contactCRM->entityimageid)) {
				$fetch = '<fetch mapping="logical">
                                <entity name="contact">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="contactid" operator="eq" value="{' . $contact_id . '}" />
                                        </filter>
                                </entity>
                          </fetch>';

				$entityImage = $this->client->retrieveSingle($fetch);

				if ($entityImage && isset($entityImage->entityimage)) {
					$contact->image = $entityImage->entityimage;
				}
			} else {
				$contact->image = null;
			}

		}

		return $contact;
	}

	/**
	 * @param $contact_id
	 * @return array|null
	 */
	public function fetchContactMarketingList($contact_id): ?array
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
                        <entity name="listmember" >
                            <attribute name="entityid" />
                            <attribute name="importsequencenumber" />
                            <attribute name="listid" />
                            <attribute name="name" />
                            <attribute name="listmemberid" />
                            <link-entity name="contact" from="contactid" to="entityid" link-type="inner" alias="contact">
                            	<attribute name="contactid" alias="contactid" />
                            	<attribute name="fullname" />
                            	<filter type="and" >
                                    <condition attribute="contactid" operator="eq" value="{' . $contact_id . '}" />
                                </filter>
							</link-entity>
                         </entity>
                    </fetch>';

		$listCRM = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);

		$elements = [];
		foreach ($listCRM->Entities as $entity) {
			$marketing_list = new stdClass();
			$marketing_list->contactid = $entity->contactid ?? null;
			$marketing_list->listmemberid = $entity->listmemberid ?? null;
			$marketing_list->listid = $entity->listid->Id ?? null;
			$marketing_list->name = $entity->name ?? null;
			$marketing_list->importsequencenumber = $entity->importsequencenumber ?? null;

			$elements[] = $marketing_list;
		}

		return $elements;
	}

	public function fetchMarketingList(): ?array
	{
		if ($this->client == null)
			return null;

		error_log('BEGIN (Sync FETCH MARKETING LIST)');

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
                        <entity name="list" >
							<attribute name="listid" />
                            <attribute name="listname" />
                         </entity>
                    </fetch>';

		$listCRM = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);

		$elements = [];
		foreach ($listCRM->Entities as $entity) {
			if ( substr($entity->listname, 0, 11) === "Committee -") {
				$marketing_list = new stdClass();
				$marketing_list->listid = $entity->listid ?? null;
				$marketing_list->name = $entity->listname ?? null;
				$elements[] = $marketing_list;
			}
		}

		foreach ($elements as $key => $value) {

			$fetchXML = '<fetch distinct="true" mapping="logical" output-format="xml-platform" version="1.0">
				<entity name="contact">
					<attribute name="fullname"/>
					<attribute name="emailaddress1" />
					<attribute name="contactid"/>
					<order descending="false" attribute="fullname"/>
					<link-entity name="listmember" intersect="true" visible="false" to="contactid" from="entityid">
						<link-entity name="list" to="listid" from="listid" alias="ag">
							<filter type="and">
								<condition attribute="listid" value="{' . $value->listid . '}" operator="eq"/>
							</filter>
						</link-entity>
					</link-entity>
				</entity>
			</fetch>';

			$listCRM = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);
			$contacts = [];
			foreach ($listCRM->Entities as $entity) {
				$contact = new stdClass();
				$contact->contactid = $entity->contactid ?? null;
				$contact->email = $entity->emailaddress1 ?? null;
				$contacts[] = $contact;
			}

			
            $args = array (
                'posts_per_page'    => 1,
                'post_type'         => 'marketinglist',
                'post_status'       => 'publish',
                'meta_query'        => array (
                    array (
                        'key' => 'crm_id' ,
                        'value' => $value->listid,
                        'compare' => 'LIKE'
                    )
                )
            );

            $match = get_posts($args);

            if ( !$match ) {
				$postarr = array(
                    'post_title'    => $value->name,
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_type'     => 'marketinglist'
                );

                $post = wp_insert_post( $postarr );

				$field_key = "field_633da075e22a9";
				$value = $value->listid;
				update_field( $field_key, $value, $post);

				$field_key = "field_633da089e22aa";
				$value = [];
				foreach ($contacts as $key => $c) {
					$value[] = get_user_by( 'email', $c->email );
				}
				update_field( $field_key, $value, $post);
			}


			error_log( print_r($contacts, true));
		}
		error_log('END (Sync FETCH MARKETING LIST)');

		return $elements;
	}


	/**
	 * @param $contact_id
	 * @param $account_id
	 * @param $firstname
	 * @param $lastname
	 * @param $emailaddress1
	 * @param $telephone1
	 * @param $jobtitle
	 * @param $age_range
	 * @param $address1_line1
	 * @param $address1_city
	 * @param $address1_stateorprovince
	 * @param $address1_postalcode
	 * @param $address1_line2
	 * @return bool|null
	 */
	public function updateContact($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $age_range,
								  $address1_line1, $address1_city, $address1_stateorprovince, $address1_postalcode, $address1_line2): ?bool
	{
		if ($this->client == null)
			return null;

		$contact = $this->client->entity('contact', $contact_id);

		if ($contact->exists) {
			if ($firstname)
				$contact->firstname = $firstname;

			if ($lastname)
				$contact->lastname = $lastname;

			if ($emailaddress1)
				$contact->emailaddress1 = $emailaddress1;

			if ($telephone1)
				$contact->telephone1 = $telephone1;

			if ($jobtitle)
				$contact->jobtitle = $jobtitle;

			if ($age_range)
				$contact->ccc_agerange = $age_range;

			if ($address1_line1)
				$contact->address1_line1 = $address1_line1;

			if ($address1_city)
				$contact->address1_city = $address1_city;

			if ($address1_stateorprovince) {
				$contact->address1_stateorprovince = $address1_stateorprovince;
				$contact->ccc_address1provincestate = $address1_stateorprovince;
			}

			if ($address1_postalcode)
				$contact->address1_postalcode = $address1_postalcode;

			if ($address1_line2)
				$contact->address1_line2 = $address1_line2;

			if ($account_id)
				$contact->parentcustomerid = new EntityReference('account', $account_id);

			$contact->update();

			return true;
		}
		return false;
	}

	/**
	 * @param $contact_id
	 * @param array $data
	 * @return bool|null
	 * @throws Exception
	 */
	public function updateContactSubscription($contact_id, $data = array()): ?bool
	{
		if ($this->client == null)
			return null;

		$contact = $this->client->entity('contact', $contact_id);

		if ($contact->exists) {
			if (isset($data['caslconsent'])) {
				$contact->ccc_caslconsent = $data['caslconsent'];
			}

			if (isset($data['interests'])) {
				$data['interests'] = array_map(function ($i) {
					return 'new_' . $i;
				}, $data['interests']);

				$contact->new_artificialintelligence = in_array('new_artificialintelligence', $data['interests']) ? 1 : 0;
				$contact->new_canadaus = in_array('new_canadaus', $data['interests']) ? 1 : 0;
				$contact->new_cannabis = in_array('new_cannabis', $data['interests']) ? 1 : 0;
				$contact->new_circulareconomy = in_array('new_circulareconomy', $data['interests']) ? 1 : 0;
				$contact->new_competitionpolicy = in_array('new_competitionpolicy', $data['interests']) ? 1 : 0;
				$contact->new_diversityandinclusion = in_array('new_diversityandinclusion', $data['interests']) ? 1 : 0;
				$contact->new_environment = in_array('new_environment', $data['interests']) ? 1 : 0;
				$contact->fintech = in_array('new_fintech', $data['interests']) ? 1 : 0;
				$contact->new_fiscalpolicy = in_array('new_fiscalpolicy', $data['interests']) ? 1 : 0;
				$contact->new_indigenousbusinessrelations = in_array('new_indigenousbusinessrelations', $data['interests']) ? 1 : 0;
				$contact->new_infrastructure = in_array('new_infrastructure', $data['interests']) ? 1 : 0;
				$contact->new_innovation = in_array('new_innovation', $data['interests']) ? 1 : 0;
				$contact->new_intellectualproperty = in_array('new_intellectualproperty', $data['interests']) ? 1 : 0;
				$contact->new_internaltrade = in_array('new_internaltrade', $data['interests']) ? 1 : 0;
				$contact->new_internationalaffairs = in_array('new_internationalaffairs', $data['interests']) ? 1 : 0;
				$contact->new_labourrelations = in_array('new_labourrelations', $data['interests']) ? 1 : 0;
				$contact->new_naturalresourcesandenergy = in_array('new_naturalresourcesandenergy', $data['interests']) ? 1 : 0;
				$contact->new_regulatorycompetitiveness = in_array('new_regulatorycompetitiveness', $data['interests']) ? 1 : 0;
				$contact->new_scienceandtechnology = in_array('new_scienceandtechnology', $data['interests']) ? 1 : 0;
				$contact->new_skillsandimmigration = in_array('new_skillsandimmigration', $data['interests']) ? 1 : 0;
				$contact->new_smallandmediumsizedbusiness = in_array('new_smallandmediumsizedbusiness', $data['interests']) ? 1 : 0;
				$contact->new_transportation = in_array('new_transportation', $data['interests']) ? 1 : 0;
			}

			if (isset($data['marketinglist'])) {
				$old = $this->fetchContactMarketingList($contact_id);
				$oldMapped = array_map(function ($ml) {
					return $ml->listid;
				}, $old);
				$current = $data['marketinglist'];

				$diff = $this->arrayDifference($oldMapped, $current);
				$insert = $diff['insertions'];
				$delete = $diff['deletions'];

				$memberIds = array(
					$contact_id
				);

				foreach ($delete as $listGuid) {
					$this->client->executeAction(
						'RemoveMemberList',
						array(
							array('key' => 'ListId', 'value' => $listGuid, 'type' => 'guid'),
							array('key' => 'EntityId', 'value' => $contact_id, 'type' => 'guid')
						),
						'RemoveMemberListRequest'
					);
				}

				foreach ($insert as $listGuid) {
					$this->client->executeAction(
						'AddListMembersList',
						array(
							array('key' => 'ListId', 'value' => $listGuid, 'type' => 'guid'),
							array('key' => 'MemberIds', 'value' => $memberIds, 'type' => 'arrayofguid')
						),
						'AddListMembersListRequest'
					);
				}
			}

			$contact->update();

			return true;
		}
		return false;
	}

	/**
	 * @param array $attributes
	 * @return bool|null
	 */
	public function updateMembershipAccount(array $attributes): ?bool
	{
		if ($this->client == null)
			return null;

		$membershipAccount = $this->client->entity('account', $attributes['account_id']);

		if ($membershipAccount->exists) {
			//$membershipAccount->business_name = $attributes['business_name'];
			$membershipAccount->name = $attributes['business_name'];
			$membershipAccount->telephone1 = $attributes['telephone1'];
			$membershipAccount->emailaddress1 = $attributes['emailaddress1'];
			$membershipAccount->address1_city = $attributes['address1_city'];
			$membershipAccount->address1_stateorprovince = $attributes['address1_stateorprovince'];
			$membershipAccount->ccc_address1provincestate = $attributes['address1_stateorprovince'];
			$membershipAccount->websiteurl = $attributes['websiteurl'];
			$membershipAccount->description = $attributes['business_description'];
			$membershipAccount->entityimage = $attributes['image'];

			$membershipAccount->new_advertisingmediadigitalservices = array_key_exists('new_advertisingmediadigitalservices', $attributes['services']);
			$membershipAccount->new_artsculturetourism = array_key_exists('new_artsculturetourism', $attributes['services']);
			$membershipAccount->new_associationnotforprofit = array_key_exists('new_associationnotforprofit', $attributes['services']);
			$membershipAccount->new_energyenvironment = array_key_exists('new_energyenvironment', $attributes['services']);
			$membershipAccount->new_financialservices = array_key_exists('new_financialservices', $attributes['services']);
			$membershipAccount->new_foodbeverages = array_key_exists('new_foodbeverages', $attributes['services']);
			$membershipAccount->new_healthwellness = array_key_exists('new_healthwellness', $attributes['services']);
			$membershipAccount->new_manufacturingexports = array_key_exists('new_manufacturingexports', $attributes['services']);
			$membershipAccount->new_miscellaneous = array_key_exists('new_miscellaneous', $attributes['services']);
			$membershipAccount->new_professionalservices = array_key_exists('new_professionalservices', $attributes['services']);
			$membershipAccount->new_publicsecmunicipalityedufacilityhospital = array_key_exists('new_publicsecmunicipalityedufacilityhospital', $attributes['services']);
			$membershipAccount->new_realestateconstructiondevelopment = array_key_exists('new_realestateconstructiondevelopment', $attributes['services']);
			$membershipAccount->new_retail = array_key_exists('new_retail', $attributes['services']);
			$membershipAccount->new_technology = array_key_exists('new_technology', $attributes['services']);
			$membershipAccount->new_transportationlogistics = array_key_exists('new_transportationlogistics', $attributes['services']);

			$membershipAccount->update();

			return true;
		}
		return false;
	}

	/**
	 * @param null $ids
	 * @return array|null
	 */
	public function getMarketingListsByIDs($ids = null): ?array
	{
		if ($this->client == null)
			return null;

		$buildFilter = '';

		if ($ids) {
			$buildFilter .= '<filter type="or" >';
			foreach ($ids as $id) {
				$buildFilter .= '<condition attribute="listid" operator="eq" value="{' . $id . '}" />';
			}
			$buildFilter .= '</filter>';
		}

		$fetchXML = '<fetch version="1.0" mapping="logical" distinct="true">
				<entity name="list" >
					<attribute name="listid" />
					<attribute name="listname" />
					<attribute name="description" />
					<attribute name="lockstatus" />
					<attribute name="purpose" />
					<attribute name="source" />
					<attribute name="statecode" />
					<attribute name="type" />
					' . $buildFilter . '
				</entity>
		  </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true">
				<entity name="list">
					<attribute name="listid" aggregate="count" alias="count"/>
					' . $buildFilter . '
				</entity>
		  </fetch>';

		$element = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);
		$count = intval($elementsCRMCount->Entities[0]->count->Value->listid);
		if ($count > 0) {
			$listsCRM = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);

			foreach ($listsCRM->Entities as $list) {
				$marketingList = new stdClass();
				$marketingList->listid = $list->listid;
				$marketingList->listname = $list->listname;
				$marketingList->cmsname = array_search($list->listid, $ids);

				$element[] = $marketingList;
			}
		}

		return $element;
	}


	/**
	 * @param null $filters
	 * @param false $allPages
	 * @param null $pagingCookie
	 * @param null $limitCount
	 * @param null $pageNumber
	 * @return stdClass|null
	 */
	public function getAllArbitrators($filters = null, bool $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null): ?stdClass
	{
		if ($this->client == null)
			return null;

		$conditions = '';
		$or_conditions_1 = '';
		$or_conditions_2 = '';

		if ($filters != null) {
			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions_1 .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions_1 .= '<condition attribute="ccc_address1provincestate" operator="eq" value="' . $province . '" />';
				}
				$or_conditions_1 .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions_2 .= '<filter type="or">';
				$or_conditions_2 .= '<condition attribute="fullname" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->search) . '%" />';
				//$or_conditions_2.='<condition attribute="ccc_specializations" operator="like" value="%'.trim($filters->search).'%" />';
				$or_conditions_2 .= '</filter>';
			}

			if (isset($filters->language) && $filters->language != null) {
				$conditions .= '<condition attribute="ccc_languages" operator="like" value="%' . trim($filters->language) . '%" />';
			}

			if (isset($filters->specializations) && $filters->specializations != null) {
				$conditions .= '<condition attribute="ccc_specializations" operator="like" value="%' . trim($filters->specializations) . '%" />';
			}

			if (isset($filters->last_name_starts_with) && $filters->last_name_starts_with != null) {
				$conditions .= '<condition attribute="lastname" operator="like" value="' . trim($filters->last_name_starts_with) . '%" />';
			}

			if (isset($filters->city) && $filters->city != null) {
				$conditions .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->city) . '%" />';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="contact" >
                            <attribute name="contactid" />
                            <attribute name="fullname" />
                            <attribute name="ccc_languages" />
                            <attribute name="ccc_languagepreference" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="address1_country" />
                            <attribute name="parentcustomerid" />
                            <attribute name="ccc_arbitratorbio" />
                            <attribute name="ccc_specializations" />
                            <order attribute="fullname" descending="false" />
                            <filter type="and" >
                              <condition attribute="ccc_arbitratorbio" operator="not-null" />
                              <condition attribute="statecode" operator="eq" value="0" />
                              <condition attribute="statuscode" operator="eq" value="1" />
                              ' . $conditions . '
                            </filter>
                            ' . $or_conditions_1 . $or_conditions_2 . '
                            <link-entity name="ccc_arbitratorbio" from="ccc_arbitratorbioid" to="ccc_arbitratorbio" link-type="inner" alias="contact_arbitrator" >
                              <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                              </filter>
                            </link-entity>
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account" >
                              <attribute name="name" />
                              <filter type="and" >
                                <condition attribute="accountid" operator="not-null" />
                              </filter>
                            </link-entity>
                          </entity>
                    </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="contact" >  
                                 <attribute name="contactid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                      <condition attribute="ccc_arbitratorbio" operator="not-null" />
                                      <condition attribute="statecode" operator="eq" value="0" />
                                      <condition attribute="statuscode" operator="eq" value="1" />
                                      ' . $conditions . '
                                  </filter>
                                  ' . $or_conditions_1 . $or_conditions_2 . '
                                  <link-entity name="ccc_arbitratorbio" from="ccc_arbitratorbioid" to="ccc_arbitratorbio" link-type="inner" alias="contact_arbitrator" >
                                      <filter type="and" >
                                        <condition attribute="statecode" operator="eq" value="0" />
                                        <condition attribute="statuscode" operator="eq" value="1" />
                                      </filter>
                                 </link-entity>
                                 <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account" >
									  <filter type="and" >
										<condition attribute="accountid" operator="not-null" />
									  </filter>
								 </link-entity>
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Entities[0]->count->Value->contactid);

		if ($count > 0) {
			$arbitratorsCRM = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($arbitratorsCRM->Entities as $arbitratorCRM) {

				$arbitrator = new stdClass();
				$arbitrator->contactid = $arbitratorCRM->contactid;
				$arbitrator->fullname = $arbitratorCRM->fullname ?? null;
				$arbitrator->city = $arbitratorCRM->address1_city ?? null;
				$arbitrator->province = isset($arbitratorCRM->ccc_address1provincestate) ? $arbitratorCRM->ccc_address1provincestate->FormattedValue : null;
				$arbitrator->country = $arbitratorCRM->address1_country ?? null;
				$arbitrator->languagepreference = isset($arbitratorCRM->ccc_languagepreference) ? $arbitratorCRM->ccc_languagepreference->FormattedValue : null;
				$arbitrator->languages = $arbitratorCRM->ccc_languages ?? null;
				$arbitrator->companyname = isset($arbitratorCRM->contact_account) ? $arbitratorCRM->contact_account->name : null;
				$arbitrator->specializations = $arbitratorCRM->ccc_specializations ?? null;
				$arbitrator->expertise = $arbitratorCRM->ccc_expertise ?? null;

				$elements[] = $arbitrator;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	/**
	 * Get Arbitrator Bio from contact ID
	 *
	 * @param $contact_id
	 * @return stdClass|null
	 */
	public function getArbitratorBioByContactId($contact_id): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="contact" >   
                            <attribute name="ccc_arbitratorbio" />
                            <attribute name="ccc_fieldsoflegalexpertise" />
                            <attribute name="ccc_specializations" />
                            <filter type="and" >
                              <condition attribute="ccc_arbitratorbio" operator="not-null" />
                              <condition attribute="statecode" operator="eq" value="0" />
                              <condition attribute="statuscode" operator="eq" value="1" />
                              <condition attribute="contactid" operator="eq" value="{' . $contact_id . '}" />
                            </filter>
                            <link-entity name="ccc_arbitratorbio" from="ccc_arbitratorbioid" to="ccc_arbitratorbio" link-type="inner" alias="contact_arbitrator" >
                              <attribute name="ccc_bio" />
                              <attribute name="ccc_companyname" />
                              <attribute name="ccc_companywebsitelink" />
                              <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                              </filter>
                            </link-entity>                           
                          </entity>
                    </fetch>';

		$contactCRM = $this->getFirstByFetchXML($fetchXML);

		$contact = new stdClass();

		if ($contactCRM) {
			$contact->arbitratorbioid = $contactCRM->ccc_arbitratorbio->Value->Id ?? null;
			$contact->bio = $contactCRM->contact_arbitrator->ccc_bio ?? null;
			$contact->arbitrator_company_name = $contactCRM->contact_arbitrator->ccc_companyname ?? null;
			$contact->arbitrator_company_website = $contactCRM->contact_arbitrator->ccc_companywebsitelink ?? null;
			$contact->expertise = $contactCRM->ccc_fieldsoflegalexpertise ?? null;
			$contact->specializations = $contactCRM->ccc_specializations ?? null;
		}

		return $contact;
	}


	/**
	 * Horrible way of writing code. Met code like this and will leave like this till I have some time to refactor this rubbish from hitzels team.
	 * @param $contact_id
	 * @param $account_id
	 * @param $firstname
	 * @param $lastname
	 * @param $emailaddress1
	 * @param $telephone1
	 * @param $jobtitle
	 * @param $website
	 * @param $specializations
	 * @param $expertise
	 * @param $languages
	 * @param $provinces
	 * @param $city
	 * @return bool|null
	 */
	public function updateArbitrator($contact_id, $account_id, $firstname, $lastname, $emailaddress1, $telephone1, $jobtitle, $website, $specializations, $expertise, $languages, $provinces, $city): ?bool
	{
		if ($this->client == null)
			return null;

		$contact = $this->client->entity('contact', $contact_id);

		if ($contact->exists) {
			if ($firstname)
				$contact->firstname = $firstname;

			if ($lastname)
				$contact->lastname = $lastname;

			if ($emailaddress1)
				$contact->emailaddress1 = $emailaddress1;

			if ($telephone1)
				$contact->telephone1 = $telephone1;

			if ($jobtitle)
				$contact->jobtitle = $jobtitle;

			if ($website)
				$contact->websiteurl = $website;

			if ($account_id)
				$contact->parentcustomerid = new EntityReference('account', $account_id);

			if ($specializations)
				$contact->ccc_specializations = $specializations;

			if ($expertise)
				$contact->ccc_fieldsoflegalexpertise = $expertise;

			if ($languages)
				$contact->ccc_languages = $languages;

			if ($provinces) {
				$contact->address1_stateorprovince = $provinces;
				$contact->ccc_address1provincestate = $provinces;
			}

			if ($city)
				$contact->address1_city = $city;

			$contact->update();

			return true;
		}
		return false;
	}


	public function updateArbitratorBio($arbitratorbio_id, $ccc_bio, $ccc_website): ?bool
	{
		if ($this->client == null)
			return null;

		$arbitrator = $this->client->entity('ccc_arbitratorbio', $arbitratorbio_id);

		if ($arbitrator->exists) {
			$arbitrator->ccc_bio = $ccc_bio;
			$arbitrator->ccc_companywebsitelink = $ccc_website;

			$arbitrator->update();

			return true;
		}
		return false;
	}


	public function getStaffDirectory($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null): ?stdClass
	{
		if ($this->client == null)
			return null;

		$or_conditions_1 = '';
		$or_conditions_2 = '';

		if ($filters != null) {
			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions_1 .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions_1 .= '<condition attribute="ccc_address1provincestate" operator="eq" value="' . $province . '" />';
				}
				$or_conditions_1 .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions_2 .= '<filter type="or">';
				$or_conditions_2 .= '<condition attribute="fullname" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="jobtitle" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="telephone1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '</filter>';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                      <entity name="contact" >
                        <attribute name="contactid" />
                        <attribute name="fullname" />
                        <attribute name="jobtitle" />
                        <attribute name="telephone1" />
                        <attribute name="address1_city" />
                        <attribute name="ccc_address1provincestate" />                        
                        <order attribute="ccc_websitecccstaffdisplayorder" />
                        <filter type="and" >
                          <condition attribute="statecode" operator="eq" value="0" />
                          <condition attribute="statuscode" operator="eq" value="1" />
                          <condition attribute="ccc_cccstaffdisplayonwebsite" operator="eq" value="1" />
                        </filter>
                        ' . $or_conditions_1 . $or_conditions_2 . '
                      </entity>
                    </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="contact" >  
                                 <attribute name="contactid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                      <condition attribute="statecode" operator="eq" value="0" />
                                      <condition attribute="statuscode" operator="eq" value="1" />
                                      <condition attribute="ccc_cccstaffdisplayonwebsite" operator="eq" value="1" />
                                  </filter>
                                  ' . $or_conditions_1 . $or_conditions_2 . '
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Entities[0]->count->Value->contactid);

		if ($count > 0) {
			$staffCRM = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($staffCRM->Entities as $staff) {

				$element = new stdClass();
				$element->contactid = $staff->contactid;
				$element->fullname = isset($staff->fullname) ? $staff->fullname : null;
				$element->jobtitle = isset($staff->jobtitle) ? $staff->jobtitle : null;
				$element->telephone = isset($staff->telephone1) ? $staff->telephone1 : null;
				$element->city = isset($staff->address1_city) ? $staff->address1_city : null;
				$element->province = isset($staff->ccc_address1provincestate) ? $staff->ccc_address1provincestate->FormattedValue : null;

				$elements[] = $element;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	/**
	 * @param null $filters
	 * @param false $allPages
	 * @param null $pagingCookie
	 * @param null $limitCount
	 * @param null $pageNumber
	 * @return stdClass|null
	 */
	public function getBoardDirectory($filters = null, bool $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null): ?stdClass
	{
		if ($this->client == null)
			return null;

		$or_conditions_1 = '';
		$or_conditions_2 = '';

		if ($filters != null) {
			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions_1 .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions_1 .= '<condition attribute="ccc_address1provincestate" operator="eq" value="' . $province . '" />';
				}
				$or_conditions_1 .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions_2 .= '<filter type="or">';
				$or_conditions_2 .= '<condition attribute="fullname" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="jobtitle" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '<condition attribute="telephone1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions_2 .= '</filter>';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="contact" >
                                <attribute name="contactid" />
                                <attribute name="fullname" />
                                <attribute name="jobtitle" />
                                <attribute name="telephone1" />
                                <attribute name="ccc_address1provincestate" />
                                <attribute name="address1_city" />
                                <attribute name="ccc_boardofdirectorsrole" />
                                <attribute name="ccc_boardofdirectorsdisplayonwebsite" />
                            <order attribute="fullname" descending="false" />
                            <filter type="and" >
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::DIRECTORY . '"/>
                              <condition attribute="statecode" operator="eq" value="0" />
                              <condition attribute="statuscode" operator="eq" value="1" />
                            </filter>
                            ' . $or_conditions_1 . $or_conditions_2 . '      
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account" >
                              <attribute name="name" />
                              <filter type="and" >
                                <condition attribute="accountid" operator="not-null" />
                              </filter>
                            </link-entity>                    
                          </entity>
                    </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="contact" >  
                                 <attribute name="contactid" aggregate="count" alias="count" />                         
                                  <filter type="and" >
                                      <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::DIRECTORY . '"/>
                                      <condition attribute="statecode" operator="eq" value="0" />
                                      <condition attribute="statuscode" operator="eq" value="1" />
                                  </filter>
                                  ' . $or_conditions_1 . $or_conditions_2 . ' 
                                  <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account" >
                                      <filter type="and" >
                                        <condition attribute="accountid" operator="not-null" />
                                      </filter>
                                  </link-entity>                                 
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Entities[0]->count->Value->contactid);

		if ($count > 0) {
			$boardOfDirectorsCRM = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($boardOfDirectorsCRM->Entities as $elementCRM) {

				$element = new stdClass();
				$element->contactid = $elementCRM->contactid;
				$element->fullname = isset($elementCRM->fullname) ? $elementCRM->fullname : null;
				$element->jobtitle = isset($elementCRM->jobtitle) ? $elementCRM->jobtitle : null;
				$element->telephone = isset($elementCRM->telephone1) ? $elementCRM->telephone1 : null;
				$element->city = isset($elementCRM->address1_city) ? $elementCRM->address1_city : null;
				$element->province = isset($elementCRM->ccc_address1provincestate) ? $elementCRM->ccc_address1provincestate->FormattedValue : null;
				$element->boardofdirectorsrole = isset($elementCRM->ccc_boardofdirectorsrole) ? $elementCRM->ccc_boardofdirectorsrole->FormattedValue : null;
				$element->companyname = isset($elementCRM->contact_account) ? $elementCRM->contact_account->name : null;

				$elements[] = $element;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	public function getOfficersMembers(): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="contact" >
                                <attribute name="contactid" />
                                <attribute name="fullname" />
                                <attribute name="jobtitle" />
                                <attribute name="telephone1" />
                                <attribute name="ccc_address1provincestate" />
                                <attribute name="address1_city" />
                                <attribute name="ccc_boardofdirectorsrole" />
                                <attribute name="ccc_boardofdirectorsdisplayonwebsite" />
                                <attribute name="entityimageid" />
                                <attribute name="ccc_boardofdirectorsdiplayorder" />
                            <order attribute="ccc_boardofdirectorsdiplayorder" descending="false"/>
                            <filter type="and" >
                              <condition attribute="ccc_boardofdirectorsrole" operator="not-null" />
                              <condition attribute="statecode" operator="eq" value="0" />
                              <condition attribute="statuscode" operator="eq" value="1" />
                            </filter>
                            <filter type="or" >
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::CHAIR . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::VICECHAIR . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::TREASURER . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::IMMEDIATE_PAST_CHAIR . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::SECRETARY . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::SUBSTITUTE . '"/>
                              <condition attribute="ccc_boardofdirectorsrole" operator="eq" value="' . BoardOfDirectorsRoleCRM::PRESIDENT . '"/>
                            </filter>
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="contact_account" >
                              <attribute name="name" />
                              <filter type="and" >
                                <condition attribute="accountid" operator="not-null" />
                              </filter>
                            </link-entity>
                          </entity>
                    </fetch>';

		$elements = array();

		$boardOfDirectorsCRM = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);

		foreach ($boardOfDirectorsCRM->Entities as $elementCRM) {

			$element = new stdClass();
			$element->contactid = $elementCRM->contactid;
			$element->fullname = $elementCRM->fullname ?? null;
			$element->jobtitle = $elementCRM->jobtitle ?? null;
			$element->telephone = $elementCRM->telephone1 ?? null;
			$element->city = $elementCRM->address1_city ?? null;
			$element->province = isset($elementCRM->ccc_address1provincestate) ? $elementCRM->ccc_address1provincestate->FormattedValue : null;
			$element->boardofdirectorsrole = isset($elementCRM->ccc_boardofdirectorsrole) ? $elementCRM->ccc_boardofdirectorsrole->FormattedValue : null;
			$element->companyname = isset($elementCRM->contact_account) ? $elementCRM->contact_account->name : null;

			//picture
			if (isset($contactCRM->entityimageid)) {
				$fetch = '<fetch mapping="logical">
                                <entity name="contact">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="contactid" operator="eq" value="{' . $element->contactid . '}" />
                                        </filter>
                                </entity>
                          </fetch>';

				$entityImage = $this->client->retrieveSingle($fetch);

				if ($entityImage && isset($entityImage->entityimage)) {
					$element->image = $entityImage->entityimage;
				}
			} else {
				$element->image = null;
			}

			$elements[] = $element;
		}

		$data = new stdClass();
		$data->total_count = sizeof($elements);
		$data->elements = $elements;

		return $data;
	}

	
	public function syncUsers($membership_type = '803330000')
	{
		if ($this->client == null)
			return null;

		error_log('INIT (Sync Users) - ' . $this->membershipTypeOptions()[$membership_type]);

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="contact" >  
                                 <attribute name="contactid" aggregate="count" alias="count" />                     
                                <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="ca" >
                                  <filter>
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . $membership_type . '" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                  </filter>
                                </link-entity>
                            </entity>
                        </fetch>';

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$amount = intval($elementsCRMCount->Entities[0]->count->Value->contactid);

		$limitCount = 500;

		error_log("Amount to sync: {$amount}");

		$count = ceil($amount / $limitCount);

		$total = 0;

		for ($i = 1; $i <= $count; $i++) {
			//<condition attribute="statecode" operator="eq" value="0" />
			$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                         <entity name="contact" >
							<attribute name="contactid" />
							<attribute name="fullname" />
							<attribute name="firstname" />
							<attribute name="lastname" />
							<attribute name="emailaddress1" />
							<attribute name="telephone1" />
							<attribute name="jobtitle" />
							<attribute name="statecode" />
							<attribute name="statuscode" />
							<attribute name="ccc_prefix" />
							<attribute name="ccc_employername" />
							<attribute name="ccc_languagepreference" />
							<attribute name="ccc_arbitratorbio" />
							<attribute name="ccc_designatedpublicofficeholder" />
							<attribute name="ccc_employernameincontactspreferredlanguage" />
                            <attribute name="ccc_boardofdirectorsrole" />
                            <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="ca" >
                              <attribute name="ccc_membershiptype" alias="ccc_membershiptype" />
                              <attribute name="name" alias="accountname"/>
                              <attribute name="accountnumber" alias="accountnumber"/>
                              <attribute name="accountid" alias="accountid"/>
                              <filter>
                                <condition attribute="ccc_membershiptype" operator="eq" value="' . $membership_type . '" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="statecode" operator="eq" value="0" />
                              </filter>
                            </link-entity>
							<attribute name="new_businessaccesspass" />
							<attribute name="address1_line1" />
							<attribute name="address1_line2" />
							<attribute name="address1_line3" />
							<attribute name="ccc_address1countryregion" />
							<attribute name="address1_city" />
							<attribute name="address1_addresstypecode" />
							<attribute name="address1_postalcode" />
							<attribute name="address1_country" />
							<attribute name="address1_telephone1" />
                          </entity>
                        </fetch>';

			$contacts = $this->getAllByFetchXML($fetchXML, false, null, $limitCount, $i);

			foreach ($contacts as $contact) {
				set_time_limit(0);
				$this->createUpdateUser($contact);
			}
		}

		error_log('END (Sync Users) - ' . $this->membershipTypeOptions()[$membership_type]);
	}


	public function syncUser($contact_id)
	{
		if ($this->client == null)
			return null;

		error_log("INIT (Sync User) - $contact_id");

		//<condition attribute="statecode" operator="eq" value="0" />
		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                     <entity name="contact" >
                        <attribute name="contactid" />
                        <attribute name="fullname" />
                        <attribute name="firstname" />
                        <attribute name="lastname" />                          
                        <attribute name="emailaddress1" />
                        <attribute name="jobtitle" />
                        <attribute name="statecode" />
                        <attribute name="statuscode" />
                        <attribute name="ccc_languagepreference" />
						<attribute name="ccc_arbitratorbio" />
                        <link-entity name="account" from="accountid" to="parentcustomerid" link-type="inner" alias="ca" >
                          <attribute name="ccc_membershiptype" alias="ccc_membershiptype" />
                          <attribute name="name" alias="accountname"/>
                          <attribute name="accountnumber" alias="accountnumber"/>
                          <attribute name="accountid" alias="accountid"/>
                          <filter>
                            <condition attribute="statuscode" operator="eq" value="1" />
                            <condition attribute="statecode" operator="eq" value="0" />
                          </filter>
                        </link-entity>
                        <filter>
                            <condition attribute="contactid" operator="eq" value="' . $contact_id . '" />
                        </filter>
                      </entity>
                    </fetch>';

		$contact = $this->getFirstByFetchXML($fetchXML);

		$this->createUpdateUser($contact);

		error_log('END (Sync Users)');
	}

	/**
	 * @param $contact
	 */
	private function createUpdateUser($contact): void
	{
		set_time_limit(0);

		//error_log( print_r ( $contact, true) );

		if (!isset($contact) || !$contact->contactid) {
			return;
		}

		$is_arbitrator = isset($contact->ccc_arbitratorbio) && $contact->ccc_arbitratorbio->Value->Id;

		$meta = get_users(
			array(
				'meta_query' => array(
					array(
						'key' => 'contactid',
						'value' => $contact->contactid,
						'compare' => '==',
						'number' => 1,
						'count_total' => false
					)
				)
			)
		);

		$user = reset($meta);

		$role = '';

		switch ($contact->ccc_membershiptype->Value) {
			case '803330000':
				$role = 'business_member';
				break;
			case '803330001':
				$role = 'association_member';
				break;
			case '803330002':
				$role = 'chamber_member';
				break;
			case '803330003':
				$role = 'secondary_member';
				break;
			case '100000000':
				$role = 'staff_member';
				break;
			/*case '803330004':
                $role = 'guest';
                break;*/
		}

		if (!$user && $contact->statecode->Value == '0' && $contact->statuscode->Value == '1')//insert user
		{
			$email_address = $contact->emailaddress1 ?? '';
			$first_name = $contact->firstname ?? '';
			$last_name = $contact->lastname ?? '';
			$full_name = $contact->fullname ?? '';
			$crm_username = $contact->ccc_username ?? '';
			$language = isset($contact->ccc_languagepreference) ? $contact->ccc_languagepreference->Value : null;

			$user_login = $this->getUserName($email_address, $crm_username, $first_name, $last_name);

			$user_pass = wp_generate_password(24, false);

			if ($user_login) {
				$userdata = array(
					'ID' => 0,    //(int) User ID. If supplied, the user will be updated.
					'user_pass' => $user_pass,   //(string) The plain-text user password.
					'user_login' => $user_login,   //(string) The user's login username.
					'user_nicename' => $user_login,   //(string) The URL-friendly user name.
					'user_url' => '',   //(string) The user URL.
					'user_email' => $email_address,   //(string) The user email address.
					'display_name' => $full_name,   //(string) The user's display name. Default is the user's username.
					'first_name' => $first_name,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
					'last_name' => $last_name,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
					'description' => '',   //(string) The user's biographical description.
					'role' => $role,   //(string) User's role.
				);

				$user_id = wp_insert_user($userdata);

				$is_error = is_wp_error($user_id);

				if (!$is_error) {
					// check if the user is a board of director
					if (isset($contact->ccc_boardofdirectorsrole->Value) && !empty($contact->ccc_boardofdirectorsrole->Value)) {
						$user_updated = get_userdata($user_id);
						$user_updated->add_role('board_of_directors');
					}

					if ($is_arbitrator) {
						$user_updated = get_userdata($user_id);
						$user_updated->add_role('arbitrator_member');
						error_log("User ID: " . $user_updated->ID . " is an arbitrator!");
					}

					//add metadata
					update_user_meta($user_id, 'contactid', $contact->contactid);
					update_user_meta($user_id, 'accountid', $contact->accountid);
					update_user_meta($user_id, 'accountnumber', $contact->accountnumber);
					update_user_meta($user_id, 'membershiptype', $contact->ccc_membershiptype->Value);
					update_user_meta($user_id, 'jobtitle', $contact->jobtitle);
					update_user_meta($user_id, 'ccc_employername', $contact->ccc_employername);
					update_user_meta($user_id, 'ccc_prefix', $contact->ccc_prefix->FormattedValue ?? '');
					update_user_meta($user_id, 'telephone1', $contact->telephone1);

					if (isset($contact->new_businessaccesspass)) {
						update_user_meta($user_id, 'new_businessaccesspass', $contact->new_businessaccesspass->Value ?? '');
						update_user_meta($user_id, 'membershipstatus', $contact->new_businessaccesspass->FormattedValue ?? '');
					}

					update_user_meta($user_id, 'primary_address_information', 
					array (
						"line1" => $contact->address1_line1 ?? '',
						"line2" => $contact->address1_line2 ?? '',
						"line3" => $contact->address1_line3 ?? '',
						"country_region" => $contact->ccc_address1countryregion ?? '',
						"city" => $contact->address1_city ?? '',
						"addresstype" => $contact->address1_addresstypecode ?? '',
						"postalcode" => $contact->address1_postalcode ?? '',
						"country" => $contact->address1_country ?? '',
						"telephone" => $contact->address1_telephone1 ?? ''
					));

					error_log("User created - ID: " . $user_id);

					// $this->sendCreatedUserEmail($user_login, $email_address, $first_name, $last_name, $language);

				} else {
					error_log("Wp error (Insert user): " . $user_id->get_error_message() . "User login: $user_login");
				}
			}
		} else if ($user) {
			if ($contact->statecode->Value == '1' || $contact->statuscode->Value == '2') {
				$role = ''; //inactive user
			}

			$email_address = $contact->emailaddress1 ?? '';
			$first_name = $contact->firstname ?? '';
			$last_name = $contact->lastname ?? '';
			$full_name = $contact->fullname ?? '';

			$userdata = array(
				'ID' => $user->ID,    //(int) User ID. If supplied, the user will be updated.
				'user_login' => $user->user_login,
				'user_url' => '',   //(string) The user URL.
				'user_email' => $email_address,   //(string) The user email address.
				'display_name' => $full_name,   //(string) The user's display name. Default is the user's username.
				'first_name' => $first_name,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
				'last_name' => $last_name,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
				'description' => '',   //(string) The user's biographical description.
				'role' => $role
			);

			$user_id = wp_insert_user($userdata);

			$is_error = is_wp_error($user_id);

			if (!$is_error) {
				$user_updated = get_userdata($user_id);

				if (sizeof((array)$user->roles)) {
					foreach ((array)$user->roles as $role) {
						if (!in_array($role, (array)$user_updated->roles)) {
							$user_updated->add_role($role);
						}
					}
				}

				if ($is_arbitrator) {
					error_log("User ID: " . $user_updated->ID . " is an arbitrator!");
					$user_updated->add_role('arbitrator_member');
				}

				// check if the user is a board of director
				if (isset($contact->ccc_boardofdirectorsrole->Value) && !empty($contact->ccc_boardofdirectorsrole->Value)) {
					$user_updated->add_role('board_of_directors');
				}

				//update metadata
				update_user_meta($user_id, 'contactid', $contact->contactid);
				update_user_meta($user_id, 'accountid', $contact->accountid);
				update_user_meta($user_id, 'accountnumber', $contact->accountnumber);
				update_user_meta($user_id, 'membershiptype', $contact->ccc_membershiptype->Value);
				update_user_meta($user_id, 'jobtitle', $contact->jobtitle);
				update_user_meta($user_id, 'ccc_employername', $contact->ccc_employername);
				update_user_meta($user_id, 'ccc_prefix', $contact->ccc_prefix->FormattedValue ?? '');
				update_user_meta($user_id, 'telephone1', $contact->telephone1);
				if (isset($contact->new_businessaccesspass)) {
					update_user_meta($user_id, 'new_businessaccesspass', $contact->new_businessaccesspass->Value ?? '');
					update_user_meta($user_id, 'membershipstatus', $contact->new_businessaccesspass->FormattedValue ?? '');
				}
				

				update_user_meta($user_id, 'primary_address_information', 
					array (
						"line1" => $contact->address1_line1 ?? '',
						"line2" => $contact->address1_line2 ?? '',
						"line3" => $contact->address1_line3 ?? '',
						"country_region" => $contact->ccc_address1countryregion ?? '',
						"city" => $contact->address1_city ?? '',
						"addresstype" => $contact->address1_addresstypecode ?? '',
						"postalcode" => $contact->address1_postalcode ?? '',
						"country" => $contact->address1_country ?? '',
						"telephone" => $contact->address1_telephone1 ?? ''
					));

				//error_log("User updated - ID: " . $user_id);
			} else {
				error_log("Wp error(Update user): " . $user_id->get_error_message() . "User login: $user->user_login");
			}
		}
	}

	private function getUserName($emailAddress, $crm_username, $firstName, $lastName)
	{
		$user_login = null;
		if (strlen($emailAddress)) {
			$user_login = get_user_by('login', $emailAddress) === false ? $emailAddress : null;
		} else if (!$user_login && strlen($crm_username)) {
			$user_login = get_user_by('login', $crm_username) === false ? $crm_username : null;
			$user_login = sanitize_user($user_login);
			$user_login = str_replace("'", "", $user_login);
		} else if (!$user_login && strlen($firstName)) {
			$found = false;
			$pos = 1;
			$last_name_array = explode(',', strtolower(str_replace(' ', '', $lastName)));
			$last_name = reset($last_name_array);

			while (!$found) {
				$user_login_by_name = strtolower(substr($firstName, 0, $pos)) . $last_name;
				$user_login_by_name = sanitize_user($user_login_by_name);
				$user_login_by_name = str_replace("'", "", $user_login_by_name);

				if (get_user_by('login', $user_login_by_name) === false) {
					$user_login = $user_login_by_name;
					$found = true;
				} else {
					$pos++;
				}
			}
		}

		return $user_login;
	}


	private function sendCreatedUserEmail($user_login, $email_address, $first_name, $last_name, $language)
	{

		if (!sendCreatedUserEmail)
			return false;

		if (!strlen($email_address)) {
			error_log("This user doesn't have email: " . $user_login);
			return false;
		}

		//send email to user
		try {
			$href = generate_recover_password_link($email_address);

			if ($language == LanguagesCRM::FRENCH) {
				$subject = "Vérifiez votre adresse courriel pour terminer la configuration de votre compte sur Chamber.ca";

				$mail_content = "<p>Bonjour $first_name,<p>";
				$mail_content .= "<p>Un compte a été créé pour vous permettre d’accéder au portail des membres sur Chamber.ca. Le portail est l’endroit où vous pouvez payer vos factures, mettre à jour votre profil, accéder aux publications et ressources réservées aux membres et participer à des groupes de discussion avec vos pairs.<p>";
				$mail_content .= "<p>Pour accéder au portail des membres, veuillez terminer la configuration de votre compte et vérifier votre adresse courriel en cliquant sur le lien ci-dessous:</p>";
				$mail_content .= "<p><a href='" . $href . "'>" . $href . "</a></p>";
				$mail_content .= "<p>Merci!</p>";
				$mail_content .= "<p>#ÉquipedelaChambre</p>";
				$mail_content .= "<p><small>Besoin d'aide? Contactez-nous à info@chamber.ca.</small></p>";
			} else {
				$subject = "Verify your email address to finish setting up your account on Chamber.ca";

				$mail_content = "<p>Hi $first_name,<p>";
				$mail_content .= "<p>An account has been created for you to access the member portal on Chamber.ca. The portal is where you can pay invoices, update your profile, access member-only publications and resources and participate in discussion groups with your peers.<p>";
				$mail_content .= "<p>To access the member portal, please finish setting up your account and verify your email address by clicking the link below:</p>";
				$mail_content .= "<p><a href='" . $href . "'>" . $href . "</a></p>";
				$mail_content .= "<p>Thank you!</p>";
				$mail_content .= "<p>#TeamChamber</p>";
				$mail_content .= "<p><small>Need help? Contact us at info@chamber.ca.</small></p>";
			}

			if (sendCreatedUserEmail) {
				ccc_send_mail($email_address, $subject, $mail_content, "User created");
			}
		} catch (Exception $exception) {
			return false;
		}

	}


	public function getAllEvents($filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null)
	{
		if ($this->client == null)
			return null;

		$or_conditions = '';
		$and_conditions = '';

		if ($filters != null) {
			if (isset($filters->types) && $filters->types != null && sizeof($filters->types)) {
				$or_conditions .= '<filter type="or">';
				foreach ($filters->types as $type) {
					$or_conditions .= '<condition attribute="msevtmgt_eventtype" operator="eq" value="' . $type . '" />';
				}
				$or_conditions .= '</filter>';
			}

			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions .= '<condition attribute="ccc_province" operator="eq" value="' . $province . '" />';
				}
				$or_conditions .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions .= '<filter type="or">';
				$or_conditions .= '<condition attribute="msevtmgt_name" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '<condition attribute="msevtmgt_expectedoutcome" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '</filter>';
			}

			if (isset($filters->startdate) && $filters->startdate != null) {
				$startdate = $filters->startdate . '  00:00:00';
				$and_conditions .= '<condition attribute="msevtmgt_eventstartdate" operator="ge" value="' . $startdate . '" />';
			}

			if (isset($filters->enddate) && $filters->enddate != null) {
				$enddate = $filters->enddate . '  23:59:59';
				$and_conditions .= '<condition attribute="msevtmgt_eventenddate" operator="le" value="' . $enddate . '" />';
			}

			if (isset($filters->eventid) && $filters->eventid != null) {
				$and_conditions .= '<condition attribute="msevtmgt_eventid" operator="neq" value="' . $filters->eventid . '" />';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true" >
                        <entity name="msevtmgt_event" >
                            <attribute name="msevtmgt_eventid" />
                            <attribute name="msevtmgt_name" />
                            <attribute name="msevtmgt_eventtype" />
                            <attribute name="msevtmgt_eventformat" />
                            <attribute name="msevtmgt_eventstartdate" />
                            <attribute name="msevtmgt_eventenddate" />
                            <attribute name="msevtmgt_primaryvenue" />
                            <attribute name="msevtmgt_publiceventurl" />
                            <attribute name="createdon" />
                            <attribute name="msevtmgt_eventimage" />
                            <attribute name="msevtmgt_description" />
                            <attribute name="msevtmgt_expectedoutcome" />
                            <attribute name="ccc_province" />
                            <attribute name="ccc_featured" />
                            <attribute name="ccc_private" />
                            <attribute name="msevtmgt_publishstatus" />
                            <attribute name="ccc_eventpageurl" />                            
                            <order attribute="msevtmgt_eventstartdate" />
                            <filter type="and">
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                                <condition attribute="msevtmgt_eventtype" operator="neq" value="803330000" />
                                ' . $and_conditions . '
                            </filter>
                            ' . $or_conditions . '
                        </entity>
                    </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="msevtmgt_event" >  
                                <attribute name="msevtmgt_eventid" aggregate="count" alias="count" />                         
                                <filter type="and">
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                    <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                                    <condition attribute="msevtmgt_eventtype" operator="neq" value="803330000" />
                                    ' . $and_conditions . '
                                </filter>
                                ' . $or_conditions . '
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Entities[0]->count->Value->msevtmgt_eventid);

		if ($count > 0) {
			$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($elementsCRMEntities->Entities as $eventCRM) {
				$event = new stdClass();
				$event->eventid = $eventCRM->msevtmgt_eventid;
				$event->name = $eventCRM->msevtmgt_name;
				$event->eventtype = isset($eventCRM->msevtmgt_eventtype) ? $eventCRM->msevtmgt_eventtype->FormattedValue : null;
				$event->eventformat = isset($eventCRM->msevtmgt_eventformat) ? $eventCRM->msevtmgt_eventformat->FormattedValue : null;
				$event->startdate = isset($eventCRM->msevtmgt_eventstartdate) ? $eventCRM->msevtmgt_eventstartdate->FormattedValue : null;
				$event->enddate = isset($eventCRM->msevtmgt_eventenddate) ? $eventCRM->msevtmgt_eventenddate->FormattedValue : null;
				$event->publiceventurl = isset($eventCRM->msevtmgt_publiceventurl) ? $eventCRM->msevtmgt_publiceventurl : null;
				$event->createdon = $eventCRM->createdon->FormattedValue;
				$event->eventimage = isset($eventCRM->msevtmgt_eventimage) ? $eventCRM->msevtmgt_eventimage : null;
				$event->description = isset($eventCRM->msevtmgt_description) ? $eventCRM->msevtmgt_description : null;
				$event->expectedoutcome = isset($eventCRM->msevtmgt_expectedoutcome) ? $eventCRM->msevtmgt_expectedoutcome : null;
				$event->province = isset($eventCRM->ccc_province) ? $eventCRM->ccc_province->FormattedValue : null;
				$event->featured = isset($eventCRM->ccc_featured) ? $eventCRM->ccc_featured->Value : null;
				$event->private = isset($eventCRM->ccc_private) ? $eventCRM->ccc_private->Value : null;
				$event->eventpageurl = isset($eventCRM->ccc_eventpageurl) ? $eventCRM->ccc_eventpageurl : null;

				$elements[] = $event;
			}

		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	public function getEventsByIds($ids)
	{
		if ($this->client == null)
			return null;

		$count = 0;
		$elements = array();

		if (sizeof($ids)) {
			$and_conditions = '<condition attribute="msevtmgt_eventid" operator="in" >';

			foreach ($ids as $id) {
				$and_conditions .= "<value>$id</value>";
			}

			$and_conditions .= '</condition>';

			$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true" >
                        <entity name="msevtmgt_event" >
                            <attribute name="msevtmgt_eventid" />
                            <attribute name="msevtmgt_name" />
                            <attribute name="msevtmgt_eventtype" />
                            <attribute name="msevtmgt_eventformat" />
                            <attribute name="msevtmgt_eventstartdate" />
                            <attribute name="msevtmgt_eventenddate" />
                            <attribute name="msevtmgt_primaryvenue" />
                            <attribute name="msevtmgt_publiceventurl" />
                            <attribute name="createdon" />
                            <attribute name="msevtmgt_eventimage" />
                            <attribute name="msevtmgt_description" />
                            <attribute name="msevtmgt_expectedoutcome" />
                            <attribute name="ccc_province" />
                            <attribute name="ccc_featured" />
                            <attribute name="ccc_private" />
                            <attribute name="msevtmgt_publishstatus" />
                            <attribute name="ccc_eventpageurl" />                            
                            <order attribute="msevtmgt_eventstartdate" />
                            <filter type="and">
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                                <condition attribute="msevtmgt_eventtype" operator="neq" value="803330000" />
                                ' . $and_conditions . '
                            </filter>
                        </entity>
                    </fetch>';

			$fetchXMLCount = '<fetch version="1.0" mapping="logical" aggregate="true" >
                            <entity name="msevtmgt_event" >  
                                <attribute name="msevtmgt_eventid" aggregate="count" alias="count" />                         
                                <filter type="and">
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                    <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                                    <condition attribute="msevtmgt_eventtype" operator="neq" value="803330000" />
                                    ' . $and_conditions . '
                                </filter>
                            </entity>
                        </fetch>';

			$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

			$count = intval($elementsCRMCount->Entities[0]->count->Value->msevtmgt_eventid);

			if ($count > 0) {
				$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, true, null, null, null, true);

				foreach ($elementsCRMEntities->Entities as $eventCRM) {
					$event = new stdClass();
					$event->eventid = $eventCRM->msevtmgt_eventid;
					$event->name = $eventCRM->msevtmgt_name;
					$event->eventtype = isset($eventCRM->msevtmgt_eventtype) ? $eventCRM->msevtmgt_eventtype->FormattedValue : null;
					$event->eventformat = isset($eventCRM->msevtmgt_eventformat) ? $eventCRM->msevtmgt_eventformat->FormattedValue : null;
					$event->startdate = isset($eventCRM->msevtmgt_eventstartdate) ? $eventCRM->msevtmgt_eventstartdate->FormattedValue : null;
					$event->enddate = isset($eventCRM->msevtmgt_eventenddate) ? $eventCRM->msevtmgt_eventenddate->FormattedValue : null;
					$event->publiceventurl = isset($eventCRM->msevtmgt_publiceventurl) ? $eventCRM->msevtmgt_publiceventurl : null;
					$event->createdon = $eventCRM->createdon->FormattedValue;
					$event->eventimage = isset($eventCRM->msevtmgt_eventimage) ? $eventCRM->msevtmgt_eventimage : null;
					$event->description = isset($eventCRM->msevtmgt_description) ? $eventCRM->msevtmgt_description : null;
					$event->expectedoutcome = isset($eventCRM->msevtmgt_expectedoutcome) ? $eventCRM->msevtmgt_expectedoutcome : null;
					$event->province = isset($eventCRM->ccc_province) ? $eventCRM->ccc_province->FormattedValue : null;
					$event->featured = isset($eventCRM->ccc_featured) ? $eventCRM->ccc_featured->Value : null;
					$event->private = isset($eventCRM->ccc_private) ? $eventCRM->ccc_private->Value : null;
					$event->eventpageurl = isset($eventCRM->ccc_eventpageurl) ? $eventCRM->ccc_eventpageurl : null;

					$elements[] = $event;
				}

			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}


	public function getEventById($event_id)
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="msevtmgt_event" >
                            <attribute name="msevtmgt_eventid" />
                            <attribute name="msevtmgt_name" />
                            <attribute name="msevtmgt_eventtype" />
                            <attribute name="msevtmgt_eventformat" />
                            <attribute name="msevtmgt_eventstartdate" />
                            <attribute name="msevtmgt_eventenddate" />
                            <attribute name="msevtmgt_primaryvenue" />
                            <attribute name="msevtmgt_publiceventurl" />
                            <attribute name="createdon" />    
                            <attribute name="msevtmgt_eventimage" />  
                            <attribute name="msevtmgt_description" />                             
                            <attribute name="msevtmgt_expectedoutcome" /> 
                            <attribute name="entityimageid" />     
                            <attribute name="msevtmgt_building" />
                            <attribute name="msevtmgt_room" />
                            <attribute name="msevtmgt_totalregistrationfee" />
                            <attribute name="transactioncurrencyid" />   
                            <attribute name="ccc_province" /> 
                            <attribute name="ccc_featured" />
                            <attribute name="ccc_private" />
                            <attribute name="msevtmgt_publishstatus" />
                            <attribute name="ccc_eventpageurl" />                            
                            <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                                <condition attribute="msevtmgt_eventid" operator="eq" value="{' . $event_id . '}" />
                            </filter>
                          </entity>
                        </fetch>';

		$eventCRM = $this->getFirstByFetchXML($fetchXML);

		$event = new stdClass();

		if ($eventCRM) {
			$event->eventid = $eventCRM->msevtmgt_eventid;
			$event->name = $eventCRM->msevtmgt_name;
			$event->eventtype = isset($eventCRM->msevtmgt_eventtype) ? $eventCRM->msevtmgt_eventtype->FormattedValue : null;
			$event->eventformat = isset($eventCRM->msevtmgt_eventformat) ? $eventCRM->msevtmgt_eventformat->FormattedValue : null;
			$event->startdate = isset($eventCRM->msevtmgt_eventstartdate) ? $eventCRM->msevtmgt_eventstartdate->FormattedValue : null;
			$event->enddate = isset($eventCRM->msevtmgt_eventenddate) ? $eventCRM->msevtmgt_eventenddate->FormattedValue : null;
			$event->publiceventurl = isset($eventCRM->msevtmgt_publiceventurl) ? $eventCRM->msevtmgt_publiceventurl : null;
			$event->createdon = $eventCRM->createdon->FormattedValue;
			$event->eventimage = isset($eventCRM->msevtmgt_eventimage) ? $eventCRM->msevtmgt_eventimage : null;
			$event->description = isset($eventCRM->msevtmgt_description) ? $eventCRM->msevtmgt_description : null;
			$event->expectedoutcome = isset($eventCRM->msevtmgt_expectedoutcome) ? $eventCRM->msevtmgt_expectedoutcome : null;
			$event->building = isset($eventCRM->msevtmgt_building) ? $eventCRM->msevtmgt_building->FormattedValue : null;
			$event->room = isset($eventCRM->msevtmgt_room) ? $eventCRM->msevtmgt_room->FormattedValue : null;
			$event->totalregistrationfee = isset($eventCRM->msevtmgt_totalregistrationfee) ? $eventCRM->msevtmgt_totalregistrationfee->FormattedValue : null;
			$event->transactioncurrency = isset($eventCRM->transactioncurrencyid) ? $eventCRM->transactioncurrencyid->FormattedValue : null;
			$event->province = isset($eventCRM->ccc_province) ? $eventCRM->ccc_province->FormattedValue : null;
			$event->featured = isset($eventCRM->ccc_featured) ? $eventCRM->ccc_featured->Value : null;
			$event->private = isset($eventCRM->ccc_private) ? $eventCRM->ccc_private->Value : null;
			$event->eventpageurl = isset($eventCRM->ccc_eventpageurl) ? $eventCRM->ccc_eventpageurl : null;

			//image
			if (isset($eventCRM->entityimageid)) {
				$fetchImage = '<fetch mapping="logical">
                                <entity name="msevtmgt_event">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="msevtmgt_eventid" operator="eq" value="{' . $event_id . '}" />
                                        </filter>
                                </entity>
                          </fetch>';

				$entityImage = $this->client->retrieveMultiple($fetchImage, false, null, 1, null, true);

				if ($entityImage && sizeof($entityImage->Entities)) {
					$event->image = $entityImage->Entities[0]->entityimage;
				}
			} else {
				$event->image = null;
			}

			//speakers
			$event->speakers = $this->getSpeakersByEventId($event_id);
		}

		return $event;
	}


	public function getFeaturedEvent()
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                          <entity name="msevtmgt_event" >
                            <attribute name="msevtmgt_eventid" />
                            <attribute name="msevtmgt_name" />
                            <attribute name="msevtmgt_eventtype" />
                            <attribute name="msevtmgt_eventformat" />
                            <attribute name="msevtmgt_eventstartdate" />
                            <attribute name="msevtmgt_eventenddate" />
                            <attribute name="msevtmgt_eventimage" />  
                            <attribute name="msevtmgt_description" /> 
                            <attribute name="msevtmgt_expectedoutcome" />                            
                            <attribute name="entityimageid" />     
                            <attribute name="msevtmgt_building" />
                            <attribute name="msevtmgt_room" />
                            <attribute name="ccc_province" /> 
                            <attribute name="ccc_featured" />
                            <attribute name="ccc_private" />
                            <attribute name="msevtmgt_publishstatus" />
                            <attribute name="ccc_eventpageurl" />                            
                            <filter type="and" >
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="ccc_featured" operator="eq" value="1" />
                                <condition attribute="msevtmgt_publishstatus" operator="eq" value="100000003" />
                             </filter>
                          </entity>
                        </fetch>';


		$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, true, false, null, null, true);

		$count = isset($elementsCRMEntities) ? sizeof($elementsCRMEntities->Entities) : 0;

		$event = new stdClass();

		if ($count) {
			$i = rand(0, $count - 1);
			$eventCRM = $elementsCRMEntities->Entities[$i];

			$event->eventid = $eventCRM->msevtmgt_eventid;
			$event->name = $eventCRM->msevtmgt_name;
			$event->eventtype = isset($eventCRM->msevtmgt_eventtype) ? $eventCRM->msevtmgt_eventtype->FormattedValue : null;
			$event->eventformat = isset($eventCRM->msevtmgt_eventformat) ? $eventCRM->msevtmgt_eventformat->FormattedValue : null;
			$event->startdate = isset($eventCRM->msevtmgt_eventstartdate) ? $eventCRM->msevtmgt_eventstartdate->FormattedValue : null;
			$event->enddate = isset($eventCRM->msevtmgt_eventenddate) ? $eventCRM->msevtmgt_eventenddate->FormattedValue : null;
			$event->eventimage = isset($eventCRM->msevtmgt_eventimage) ? $eventCRM->msevtmgt_eventimage : null;
			$event->description = isset($eventCRM->msevtmgt_description) ? $eventCRM->msevtmgt_description : null;
			$event->building = isset($eventCRM->msevtmgt_building) ? $eventCRM->msevtmgt_building->FormattedValue : null;
			$event->expectedoutcome = isset($eventCRM->msevtmgt_expectedoutcome) ? $eventCRM->msevtmgt_expectedoutcome : null;
			$event->room = isset($eventCRM->msevtmgt_room) ? $eventCRM->msevtmgt_room->FormattedValue : null;
			$event->province = isset($eventCRM->ccc_province) ? $eventCRM->ccc_province->FormattedValue : null;
			$event->featured = isset($eventCRM->ccc_featured) ? $eventCRM->ccc_featured->Value : null;
			$event->private = isset($eventCRM->ccc_private) ? $eventCRM->ccc_private->Value : null;
			$event->eventpageurl = isset($eventCRM->ccc_eventpageurl) ? $eventCRM->ccc_eventpageurl : null;

			//image
			if (isset($eventCRM->entityimageid)) {
				$fetchImage = '<fetch mapping="logical">
                                <entity name="msevtmgt_event">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="msevtmgt_eventid" operator="eq" value="{' . $event->eventid . '}" />
                                        </filter>
                                </entity>
                          </fetch>';

				$entityImage = $this->client->retrieveMultiple($fetchImage, false, null, 1, null, true);

				if ($entityImage && sizeof($entityImage->Entities)) {
					$event->image = $entityImage->Entities[0]->entityimage;
				}
			} else {
				$event->image = null;
			}
		}

		return $event;
	}


	public function getSpeakersByEventId($event_id)
	{
		$speakers = array();

		$fetchSpeakers = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true">
                                  <entity name="msevtmgt_speaker" >
                                    <attribute name="msevtmgt_speakerid" />
                                    <attribute name="msevtmgt_name" />
                                    <attribute name="msevtmgt_title" />
                                    <attribute name="entityimageid" /> 
                                    <attribute name="ccc_salutation" />                              
                                    <filter type="and" >
                                        <condition attribute="statecode" operator="eq" value="0" />
                                        <condition attribute="statuscode" operator="eq" value="1" />
                                        <condition attribute="msevtmgt_eventid" operator="eq" value="{' . $event_id . '}" />
                                    </filter>
                                  </entity>
                              </fetch>';

		$speakersCRM = $this->client->retrieveMultiple($fetchSpeakers, true, null, null, null, true);

		foreach ($speakersCRM->Entities as $speakerCRM) {
			$speaker = new stdClass();
			$speaker->speakerid = $speakerCRM->msevtmgt_speakerid;
			$speaker->name = $speakerCRM->msevtmgt_name;
			$speaker->title = isset($speakerCRM->msevtmgt_title) ? $speakerCRM->msevtmgt_title : null;
			$speaker->salutation = isset($speakerCRM->ccc_salutation) ? $speakerCRM->ccc_salutation->FormattedValue : null;

			//image
			if (isset($speakerCRM->entityimageid)) {
				$fetchImage = '<fetch mapping="logical">
                                    <entity name="msevtmgt_speaker">
                                            <attribute name="entityimage" />
                                            <filter type="and">
                                                <condition attribute="msevtmgt_speakerid" operator="eq" value="{' . $speakerCRM->msevtmgt_speakerid . '}" />
                                            </filter>
                                    </entity>
                                </fetch>';

				$entityImage = $this->client->retrieveMultiple($fetchImage, false, null, 1, null, true);

				if ($entityImage && sizeof($entityImage->Entities)) {
					$speaker->image = $entityImage->Entities[0]->entityimage;
				}
			} else {
				$speaker->image = null;
			}


			$speakers[] = $speaker;
		}

		return $speakers;
	}


	/**
	 * Insert a request of member in Chamber CRM .
	 *
	 * @param array|object| $memberData {
	 * @type BecomeMemberType $type
	 * @type AssociationType $association_type //only Association
	 * @type string $company_name
	 * @type string $description
	 * @type string $address1_line1
	 * @type string $address1_line2
	 * @type string $address1_city
	 * @type string $address1_stateorprovince
	 * @type string $address1_postalcode
	 * @type string $telephone1
	 * @type string $twitter
	 * @type string $facebook
	 * @type string $websiteurl
	 * @type integer $numberofemployees
	 * @type string $yearlyfinancialcontributiontoprograms
	 * @type string $memberoflocalchamber
	 * @type string $memberofprovincialchamber
	 * @type IndustryTypeCRM $industry_code //only Business and Association
	 * @type bool $acceptedtc
	 * }
	 * @param array|object| $contactData {
	 * @type SalutationCRM $salutation
	 * @type string $firstname
	 * @type string $lastname
	 * @type string $jobtitle
	 * @type string $contactphone
	 * @type string $telephone1
	 * @type string $emailaddress1
	 * @type LanguagesCRM $ccc_lauguagepref
	 * @type string $termofoffice //only Chamber
	 * }
	 * @param array|object| $areasOfInterestData { only Business and Association
	 * @type bool $artificialintelligence
	 * @type bool $canadaus
	 * @type bool $cannabis
	 * @type bool $circulareconomy
	 * @type bool $competitionpolicy
	 * @type bool $diversityandinclusion
	 * @type bool $environment
	 * @type bool $fintech
	 * @type bool $fiscalpolicy
	 * @type bool $indigenousbusinessrelations
	 * @type bool $infrastructure
	 * @type bool $innovation
	 * @type bool $intellectualproperty
	 * @type bool $internaltrade
	 * @type bool $internationalaffairs
	 * @type bool $labourrelations
	 * @type bool $naturalresourcesandenergy
	 * @type bool $regulatorycompetitiveness
	 * @type bool $scienceandtechnology
	 * @type bool $skillsandimmigration
	 * @type bool $smallandmediumsizedbusiness
	 * @type bool $transportation
	 * @type string $otherareasofpolicyinterest
	 * @type string $countryofinterest1
	 * @type string $countryofinterest2
	 * @type string $countryofinterest3
	 * }
	 * @param array|object| $industryTypesData { only Business and Association
	 * @type bool $accomodation
	 * @type bool $advertisingmarketingcommunications
	 * @type bool $agriculture
	 * @type bool $artsentertainmentrecreation
	 * @type bool $constructionengineering
	 * @type bool $financeinsurance
	 * @type bool $foodbeverageservices
	 * @type bool $healthcaresocialservices
	 * @type bool $hightechnology
	 * @type bool $hrpayrollservices
	 * @type bool $importingexporting
	 * @type bool $legalservices
	 * @type bool $loggingforestry
	 * @type bool $manufacturing
	 * @type bool $media
	 * @type bool $miningoilgas
	 * @type bool $printingproduction
	 * @type bool $realestatedevelopment
	 * @type bool $retailtrade
	 * @type bool $skilledtrades
	 * @type bool $transportationwarehousing
	 * @type bool $utilities
	 * @type bool $wholesaletrade
	 * @type bool $otherbusinessservcies
	 * }
	 * @param array|object| $chamberMemberTypes { only Chamber
	 * @type bool $1_99members
	 * @type bool $100_199members
	 * @type bool $200_399members
	 * @type bool $400_599members
	 * @type bool $600_799members
	 * @type bool $800_1199members
	 * @type bool $1200_2999members
	 * @type bool $3000_3999members
	 * @type bool $4000_5999members
	 * @type bool $6000_plus
	 * }
	 * @param array|object| $chamberOthersStaff { only Chamber
	 * @type string $seniorchamberstaffname
	 * @type string $seniorchamberstafftitle
	 * @type string $seniorstaffemail
	 * @type string $keychamberstaffname
	 * @type string $keychamberstafftitle
	 * @type string $keychamberstaffemail
	 * }
	 * @return  Guid|boolean  The newly created lead's ID or false if the lead could not
	 *          be created.
	 */
	public function insertRequestOfMember($memberData, $contactData, $areasOfInterestData = null, $industryTypesData = null, $chamberMemberTypes = null, $chamberOthersStaff = null)
	{
		if ($this->client == null)
			return null;

		if ($memberData instanceof stdClass) {
			$memberData = get_object_vars($memberData);
		}

		if (empty($memberData['type']) || !in_array($memberData['type'], array(BecomeMemberType::BUSINESS, BecomeMemberType::ASSOCIATION, BecomeMemberType::CHAMBER))) {
			return false;
		}

		$subject = "Request of member - " . $memberData['type'];

		if ($memberData['type'] == BecomeMemberType::CHAMBER) {
			$subject_area_en = SubjectAreaCRM::CHAMBER;
			$subject_area_fr = SubjectAreaFrCRM::CHAMBER;
		} else if ($memberData['type'] == BecomeMemberType::BUSINESS || $memberData['type'] == BecomeMemberType::ASSOCIATION) {
			$subject_area_en = SubjectAreaCRM::CORPORATE_ASSOCIATION;
			$subject_area_fr = SubjectAreaFrCRM::CORPORATE_ASSOCIATION;
		}

		$lead = $this->client->entity('lead');

		$lead->statuscode = 1; //new (not contacted)
		$lead->subject = $subject;
		$lead->ccc_subjectarea = $subject_area_en;
		$lead->ccc_subjectareafr = $subject_area_fr;
		$lead->companyname = $memberData['company_name'];
		$lead->description = $memberData['description'];
		$lead->address1_line1 = $memberData['address1_line1'];
		$lead->address1_line2 = $memberData['address1_line2'];
		$lead->address1_city = $memberData['address1_city'];
		$lead->address1_stateorprovince = $memberData['address1_stateorprovince'];
		$lead->address1_postalcode = $memberData['address1_postalcode'];
		$lead->address1_country = 'Canada';
		$lead->telephone1 = $memberData['telephone1'];
		$lead->new_twitter = $memberData['twitter'];
		$lead->new_facebook = $memberData['facebook'];
		$lead->websiteurl = $memberData['websiteurl'];
		// $lead->transactioncurrencyid = new EntityReference('transactioncurrency', 'f9b7c56b-ae58-ea11-b7ff-c5a883e635f9');//canadian dollar
		$lead->numberofemployees = $memberData['numberofemployees'];
		$lead->new_yearlyfinancialcontributions = $memberData['yearlyfinancialcontributiontoprograms'];
		$lead->new_acceptedtc = $memberData['acceptedtc'];

		$lead->leadsourcecode = 8; //web
		$lead->ccc_leadtype = new EntityReference('ccc_leadtype', 'e51f4cb9-17be-e511-bb93-005056a00b05');//website

		if ($memberData['type'] == BecomeMemberType::ASSOCIATION) {
			$lead->new_associationmembershiptype = $memberData['association_type'];
		}

		if ($memberData['type'] == BecomeMemberType::BUSINESS) {
			$lead->new_memberoflocalchambers = $memberData['memberoflocalchamber'];
			$lead->new_memberofprovincialchambers = $memberData['memberofprovincialchamber'];
		}

		//contact
		if ($contactData instanceof stdClass) {
			$contactData = get_object_vars($contactData);
		}
		$lead->ccc_salutation = $contactData['salutation']; //salutation string
		$lead->firstname = $contactData['firstname'];
		$lead->lastname = $contactData['lastname'];
		$lead->jobtitle = $contactData['jobtitle'];
		$lead->new_businessphone2 = $contactData['contactphone'];
		$lead->ccc_lauguagepref = isset($contactData['ccc_lauguagepref']) ? $contactData['ccc_lauguagepref'] : null;
		$lead->emailaddress1 = $contactData['emailaddress1'];

		if ($memberData['type'] == BecomeMemberType::CHAMBER) {
			$lead->new_termofoffice = $contactData['termofoffice'];

			if (isset($chamberMemberTypes)) {
				if ($chamberMemberTypes instanceof stdClass) {
					$chamberMemberTypes = get_object_vars($chamberMemberTypes);
				}

				$lead->new_199members = $chamberMemberTypes['1_99members'];
				$lead->new_100199members = $chamberMemberTypes['100_199members'];
				$lead->new_200399members = $chamberMemberTypes['200_399members'];
				$lead->new_400599members = $chamberMemberTypes['400_599members'];
				$lead->new_600799members = $chamberMemberTypes['600_799members'];
				$lead->new_8001199members = $chamberMemberTypes['800_1199members'];
				$lead->new_12002999members = $chamberMemberTypes['1200_2999members'];
				$lead->new_30003999members = $chamberMemberTypes['3000_3999members'];
				$lead->new_40005999members = $chamberMemberTypes['4000_5999members'];
				$lead->new_6000 = $chamberMemberTypes['6000_plus'];
			}

			//others staff
			if (isset($chamberOthersStaff)) {
				if ($chamberOthersStaff instanceof stdClass) {
					$chamberOthersStaff = get_object_vars($chamberOthersStaff);
				}

				$lead->new_seniorchamberstaffname = $chamberOthersStaff['seniorchamberstaffname'];
				$lead->new_seniorchamberstafftitle = $chamberOthersStaff['seniorchamberstafftitle'];
				$lead->new_seniorstaffemail = $chamberOthersStaff['seniorstaffemail'];
				$lead->new_keychamberstaffname = $chamberOthersStaff['keychamberstaffname'];
				$lead->new_keychamberstafftitle = $chamberOthersStaff['keychamberstafftitle'];
				$lead->new_keychamberstaffemail = $chamberOthersStaff['keychamberstaffemail'];
			}
		}

		//Areas of Interest Yes o No and Industry Types (Business and Association type)
		if ((isset($areasOfInterestData) || isset($industryTypesData)) && ($memberData['type'] == BecomeMemberType::BUSINESS || $memberData['type'] == BecomeMemberType::ASSOCIATION)) {
			//Areas of Interest Yes o No
			if ($areasOfInterestData instanceof stdClass) {
				$areasOfInterestData = get_object_vars($areasOfInterestData);
			}

			$lead->new_artificialintelligence = $areasOfInterestData['artificialintelligence'];
			$lead->new_canadaus = $areasOfInterestData['canadaus'];
			$lead->new_cannabis = $areasOfInterestData['cannabis'];
			$lead->new_circulareconomy = $areasOfInterestData['circulareconomy'];
			$lead->new_competitionpolicy = $areasOfInterestData['competitionpolicy'];
			$lead->new_diversityandinclusion = $areasOfInterestData['diversityandinclusion'];
			$lead->new_environment = $areasOfInterestData['environment'];
			$lead->new_fintech = $areasOfInterestData['fintech'];
			$lead->new_fiscalpolicy = $areasOfInterestData['fiscalpolicy'];
			$lead->new_indigenousbusinessrelations = $areasOfInterestData['indigenousbusinessrelations'];
			$lead->new_infrastructure = $areasOfInterestData['infrastructure'];
			$lead->new_innovation = $areasOfInterestData['innovation'];
			$lead->new_intellectualproperty = $areasOfInterestData['intellectualproperty'];
			$lead->new_internaltrade = $areasOfInterestData['internaltrade'];
			$lead->new_internationalaffairs = $areasOfInterestData['internationalaffairs'];
			$lead->new_labourrelations = $areasOfInterestData['labourrelations'];
			$lead->new_naturalresourcesenergy = $areasOfInterestData['naturalresourcesandenergy'];
			$lead->new_regulatorycompetitiveness = $areasOfInterestData['regulatorycompetitiveness'];
			$lead->new_scienceandtechnology = $areasOfInterestData['scienceandtechnology'];
			$lead->new_skillsandimmigration = $areasOfInterestData['skillsandimmigration'];
			$lead->new_smallandmediumsizedbusiness = $areasOfInterestData['smallandmediumsizedbusiness'];
			$lead->new_transportation = $areasOfInterestData['transportation'];

			$lead->new_otherareaofpolicyinterest = $areasOfInterestData['otherareasofpolicyinterest'];
			$lead->new_countryofinterest1 = $areasOfInterestData['countryofinterest1'];
			$lead->new_countryofinterest2 = $areasOfInterestData['countryofinterest2'];
			$lead->new_countryofinterest3 = $areasOfInterestData['countryofinterest3'];

			//Industry Types
			if ($industryTypesData instanceof stdClass) {
				$industryTypesData = get_object_vars($industryTypesData);
			}

			$lead->new_accomodation = $industryTypesData['accomodation'];
			$lead->new_advertisingmarketingcommunications = $industryTypesData['advertisingmarketingcommunications'];
			$lead->new_agriculture = $industryTypesData['agriculture'];
			$lead->new_artsentertainmentrecreation = $industryTypesData['artsentertainmentrecreation'];
			$lead->new_constructionengineering = $industryTypesData['constructionengineering'];
			$lead->new_financeinsurance = $industryTypesData['financeinsurance'];
			$lead->new_foodbeverageservices = $industryTypesData['foodbeverageservices'];
			$lead->new_healthcaresocialservices = $industryTypesData['healthcaresocialservices'];
			$lead->new_hightechnology = $industryTypesData['hightechnology'];
			$lead->new_hrpayrollservices = $industryTypesData['hrpayrollservices'];
			$lead->new_importingexporting = $industryTypesData['importingexporting'];
			$lead->new_legalservices = $industryTypesData['legalservices'];
			$lead->new_loggingforestry = $industryTypesData['loggingforestry'];
			$lead->new_manufacturing = $industryTypesData['manufacturing'];
			$lead->new_media = $industryTypesData['media'];
			$lead->new_miningoilgas = $industryTypesData['miningoilgas'];
			$lead->new_printingproduction = $industryTypesData['printingproduction'];
			$lead->new_realestatedevelopment = $industryTypesData['realestatedevelopment'];
			$lead->new_retailtrade = $industryTypesData['retailtrade'];
			$lead->new_skilledtrades = $industryTypesData['skilledtrades'];
			$lead->new_transportationwarehousing = $industryTypesData['transportationwarehousing'];
			$lead->new_utilities = $industryTypesData['utilities'];
			$lead->new_wholesaletrade = $industryTypesData['wholesaletrade'];
			$lead->new_otherbusinessservcies = $industryTypesData['otherbusinessservcies'];
		}

		$leadId = $lead->create();

		//attachment
		if ($leadId && $memberData['type'] == BecomeMemberType::CHAMBER) {
			foreach ($_FILES as $name => $uploadedFile) {
				$description = DynamicsIntegration::getDescriptionByFileName()[$name];
				$this->insertAttachmentToLead($leadId, $description, $uploadedFile);
			}
		}

		return $leadId;
	}


	private function insertAttachmentToLead($leadId, $description, $uploadedFile)
	{

		$fileName = $uploadedFile['name'];
		$filePath = $uploadedFile['tmp_name'];
		$fileType = $uploadedFile['type'];
		$base64 = base64_encode(file_get_contents($filePath));

		$note = $this->client->entity('annotation');
		$note->objectid = new EntityReference('lead', $leadId);
		$note->notetext = $description;
		$note->documentbody = $base64;
		$note->filename = $fileName;
		$note->isdocument = 1;
		$note->mimetype = $fileType;

		$noteId = $note->create();

		return $noteId;
	}


	/**
	 * Insert a request of arbitrator in Chamber CRM .
	 *
	 * @param array|object| $memberData {
	 * @type bool $solearbitratorandmemberofccc
	 * @type bool $solearbitratorandnotmemberofccc
	 * @type bool $academicgovernmentnonprofit
	 * @type bool $youngpractitioner
	 * @type bool $inhouselawyer
	 * @type string $company_name
	 * @type string $description
	 * @type SalutationCRM $salutation
	 * @type string $firstname
	 * @type string $lastname
	 * @type string $jobtitle
	 * @type AgeRangeArbitratorCRM $age
	 * @type string $contactphone
	 * @type string $address1_line1
	 * @type string $address1_line2
	 * @type string $address1_city
	 * @type string $address1_stateorprovince
	 * @type string $address1_postalcode
	 * @type string $telephone1
	 * @type string $emailaddress1
	 * @type string $twitter
	 * @type string $facebook
	 * @type bool $acceptedtc
	 * }
	 * @return  Guid|boolean  The newly created lead's ID or false if the lead could not
	 *          be created.
	 */
	public function insertRequestOfArbitrator($memberData)
	{
		if ($this->client == null)
			return null;

		if ($memberData instanceof stdClass) {
			$memberData = get_object_vars($memberData);
		}

		$subject = "Request of member - Arbitrator";

		$lead = $this->client->entity('lead');
		$lead->new_solearbitratorandmemberofccc = $memberData['solearbitratorandmemberofccc'];
		$lead->new_solearbitratorandnotmemberofccc = $memberData['solearbitratorandnotmemberofccc'];
		$lead->new_academicgovernmentnonprofit = $memberData['academicgovernmentnonprofit'];
		$lead->new_youngpractitioner = $memberData['youngpractitioner'];
		$lead->new_inhouselawyer = $memberData['inhouselawyer'];

		$lead->statuscode = 1; //new (not contacted)
		$lead->subject = $subject;
		$lead->description = $memberData['description'];

		$lead->ccc_salutation = $memberData['salutation'];
		$lead->firstname = $memberData['firstname'];
		$lead->lastname = $memberData['lastname'];
		$lead->companyname = $memberData['company_name'];
		$lead->jobtitle = $memberData['jobtitle'];
		$lead->new_age = $memberData['age'];

		$lead->address1_line1 = $memberData['address1_line1'];
		$lead->address1_line2 = $memberData['address1_line2'];
		$lead->address1_city = $memberData['address1_city'];
		$lead->address1_stateorprovince = $memberData['address1_stateorprovince'];
		$lead->address1_postalcode = $memberData['address1_postalcode'];
		$lead->address1_country = 'Canada';

		$lead->telephone1 = $memberData['telephone1'];
		$lead->emailaddress1 = $memberData['emailaddress1'];
		$lead->new_twitter = $memberData['twitter'];
		$lead->new_facebook = $memberData['facebook'];

		$lead->new_acceptedtc = $memberData['acceptedtc'];

		// $lead->transactioncurrencyid = new EntityReference('transactioncurrency', 'f9b7c56b-ae58-ea11-b7ff-c5a883e635f9');//canadian dollar
		$lead->leadsourcecode = 8; //web
		$lead->ccc_leadtype = new EntityReference('ccc_leadtype', 'e51f4cb9-17be-e511-bb93-005056a00b05');//website

		$leadId = $lead->create();

		return $leadId;
	}


	/**
	 * Insert a request of lead in Chamber CRM .
	 *
	 * @type string $firstname
	 * @type string $lastname
	 * @type string $companyname
	 * @type string $jobtitle
	 * @type string $emailaddress1
	 * @return  Guid|boolean  The newly created lead's ID or false if the lead could not
	 *          be created.
	 */
	public function insertLead($firstname, $lastname, $companyname, $jobtitle, $emailaddress1, $gdrp = false)
	{
		if ($this->client == null)
			return null;

		$lead = $this->client->entity('lead');
		$lead->statuscode = 1; //new (not contacted)
		$lead->subject = 'Request for Gated Content';
		$lead->firstname = $firstname;
		$lead->lastname = $lastname;
		$lead->companyname = $companyname;
		$lead->jobtitle = $jobtitle;
		$lead->emailaddress1 = $emailaddress1;
		$lead->leadsourcecode = 8; //web
		$lead->ccc_leadtype = new EntityReference('ccc_leadtype', 'e51f4cb9-17be-e511-bb93-005056a00b05');//website
		$lead->msdyn_gdproptout = $gdrp;
		$lead->ccc_subjectarea = SubjectAreaCRM::ICC_PUBLICATIONS;
		$lead->ccc_subjectareafr = SubjectAreaFrCRM::ICC_PUBLICATIONS;
		$leadId = $lead->create();

		return $leadId;
	}


	static function ageRangeOptions()
	{
		return [
			AgeRangeCRM::RANGE_35_AND_UNDER => '35 and Under',
			AgeRangeCRM::RANGE_36_TO_45 => '36 to 45',
			AgeRangeCRM::RANGE_46_TO_55 => '46 to 55',
			AgeRangeCRM::RANGE_56_TO_65 => '56 to 65',
			AgeRangeCRM::RANGE_66_AND_ABOVE => '66 and Above',
		];
	}


	static function ageRangeArbitratorOptions()
	{
		return [
			AgeRangeArbitratorCRM::RANGE_35_AND_UNDER => '35 and Under',
			AgeRangeArbitratorCRM::RANGE_36_TO_45 => '36 to 45',
			AgeRangeArbitratorCRM::RANGE_46_TO_55 => '46 to 55',
			AgeRangeArbitratorCRM::RANGE_56_TO_65 => '56 to 65',
			AgeRangeArbitratorCRM::RANGE_66_AND_ABOVE => '66 and Above',
		];
	}


	static function membershipTypeOptions()
	{
		return [
			MembershipTypeCRM::CORPORATE_MEMBERSHIP => 'Corporate Membership',
			MembershipTypeCRM::ASSOCIATION_MEMBERSHIP => 'Association Membership',
			MembershipTypeCRM::CHAMBER_MEMBERSHIP => 'Chamber Membership',
			MembershipTypeCRM::ONLY_SECONDARY_MEMERSHIP_TYPES => 'Only Secondary Membership Types',
			MembershipTypeCRM::CANADIAN_CHAMBER_OF_COMMERCE => 'Canadian Chamber of Commerce',
			MembershipTypeCRM::NON_MEMBER => 'Non Member',
		];
	}


	static function associationTypeOptions()
	{
		return [
			AssociationType::ASSOCIATION_PARTNER => 'Association Partner - $1,000',
			AssociationType::ENGAGEMENT_PARTNER => 'Engagement Partner - $2,500',
			AssociationType::POLICY_PARTNER => 'Policy Partner - $5,000',
		];
	}


	static function arbitratorTypeOptions()
	{
		return [
			ArbitratorType::SOLE_ARBITRATOR_OR_LAWYER_MEMBER_OF_CHAMBER => 'Sole arbitrator or lawyer in a firm that is a member of the Canadian Chamber of Commerce. $500 (annual fee)',
			ArbitratorType::SOLE_ARBITRATOR_OR_LAWYER_NOT_MEMBER_OF_CHAMBER => 'Sole arbitrator or lawyer in a firm that is not a member of the Canadian Chamber of Commerce. $750 (annual fee) ',
			ArbitratorType::ACADEMIC_GOVERNMENT_OR_NON_PROFIT_ORGANIZATION_LAWYER => 'Academic, government or non-profit organization lawyer. $250 (annual fee) ',
			ArbitratorType::YOUNG_PRACTITIONER => 'Young practitioner (Member of YCAP and less than 35 years of age. Must provide proof of YCAP membership). $250 (annual fee) ',
			ArbitratorType::IN_HOUSE_LAWYER => 'In-house lawyer (corporate counsel). $250 (annual fee)',
		];
	}


	static function languagesCRMOptions()
	{
		return [
			LanguagesCRM::ENGLISH => 'English',
			LanguagesCRM::FRENCH => 'French'
		];
	}


	static function salutationCRMOptions()
	{
		return [
			SalutationCRM::MR => 'Mr.',
			SalutationCRM::MRS => 'Mrs.',
			SalutationCRM::MS => 'Ms.',
			SalutationCRM::DR => 'Dr.'
		];
	}


	static function yesOrNoOptions()
	{
		return [
			YesOrNo::YES => 'Yes',
			YesOrNo::NO => 'No',
		];
	}


	static function eventTypeCRMOptions()
	{
		return [
			EventTypeCRM::CONFERENCE => 'Conference',
			EventTypeCRM::CONVENTION => 'Convention',
			EventTypeCRM::DEMONSTRATION => 'Demonstration',
			EventTypeCRM::EXECUTIVE_BRIEFING => 'Executive briefing',
			EventTypeCRM::MEETING_OR_NETWORKING => 'Meeting or Networking Event',
			EventTypeCRM::SEMINAR_OR_TALK => 'Seminar or Talk',
			EventTypeCRM::TRAINING => 'Training',
			EventTypeCRM::WEBCAST => 'Webcast'
		];
	}


	static function eventFormatCRMOptions()
	{
		return [
			EventFormatCRM::ON_SITE => 'On site',
			EventFormatCRM::WEBINAR => 'Webinar',
			EventFormatCRM::HYBRID => 'Hybrid'
		];
	}


	static function provinceCRMOptions()
	{
		return [
			ProvinceCRM::AB => 'Alberta',
			ProvinceCRM::BC => 'British Columbia',
			ProvinceCRM::MB => 'Manitoba',
			ProvinceCRM::NB => 'New Brunswick',
			ProvinceCRM::NL => 'Newfoundland and Labrador',
			ProvinceCRM::NS => 'Nova Scotia',
			ProvinceCRM::NT => 'Northwest Territories',
			ProvinceCRM::NU => 'Nunavut',
			ProvinceCRM::ON => 'Ontario',
			ProvinceCRM::QC => 'Quebec',
			ProvinceCRM::SK => 'Saskatchewan',
			ProvinceCRM::YT => 'Yukon',
			ProvinceCRM::PE => 'Prince Edward Island',
			ProvinceCRM::INTERNATIONAL => 'International'
		];
	}

	static function serviceCRMOptions()
	{
		return [
			ServiceBusinessMemberCRM::AMD => 'Advertising, Media & Digital Services',
			ServiceBusinessMemberCRM::ACT => 'Arts, Culture & Tourism',
			ServiceBusinessMemberCRM::AN => 'Association & Not-for-Profit',
			ServiceBusinessMemberCRM::EE => 'Energy & Environment',
			ServiceBusinessMemberCRM::FS => 'Financial Services',
			ServiceBusinessMemberCRM::FB => 'Food & Beverages',
			ServiceBusinessMemberCRM::HW => 'Health & Wellness',
			ServiceBusinessMemberCRM::ME => 'Manufacturing & Exports',
			ServiceBusinessMemberCRM::MI => 'Miscellaneous',
			ServiceBusinessMemberCRM::PS => 'Professional Services',
			ServiceBusinessMemberCRM::PSM => 'Public Sector, Municipalities, Universities, Schools & Hospitals',
			ServiceBusinessMemberCRM::RECD => 'Real Estate, Construction & Development',
			ServiceBusinessMemberCRM::RE => 'Retail',
			ServiceBusinessMemberCRM::TE => 'Technology',
			ServiceBusinessMemberCRM::TR => 'Transportation & Logistics',
		];
	}

	static function provinceMarketingCRMOptions()
	{
		return [
			ProvinceMarketingCRM::AB => 'Alberta',
			ProvinceMarketingCRM::BC => 'British Columbia',
			ProvinceMarketingCRM::MB => 'Manitoba',
			ProvinceMarketingCRM::NB => 'New Brunswick',
			ProvinceMarketingCRM::NF => 'Newfoundland and Labrador',
			ProvinceMarketingCRM::NS => 'Nova Scotia',
			ProvinceMarketingCRM::NT => 'Northwest Territories',
			ProvinceMarketingCRM::NU => 'Nunavut',
			ProvinceMarketingCRM::ON => 'Ontario',
			ProvinceMarketingCRM::PEI => 'Prince Edward Island',
			ProvinceMarketingCRM::QC => 'Quebec',
			ProvinceMarketingCRM::YT => 'Yukon',
		];
	}


	static function salutationMarketingCRMOptions()
	{
		return [
			SalutationMarketingCRM::DR => 'Dr.',
			SalutationMarketingCRM::MISS => 'Miss.',
			SalutationMarketingCRM::MR => 'Mr.',
			SalutationMarketingCRM::MRS => 'Mrs.',
			SalutationMarketingCRM::MS => 'Ms.'
		];
	}


	static function getDescriptionByFileName()
	{
		return [
			'bylaws' => 'A copy of your bylaws',
			'membership_list' => 'A current membership list',
			'annual_report' => 'Most recent annual report',
			'financial_statement' => 'Latest financial statement'
		];
	}

	static function industryTypeCRMOptions()
	{
		return [
			IndustryTypeCRM::ACC => 'Accommodation',
			IndustryTypeCRM::AMC => 'Advertising, Marketing & Communications',
			IndustryTypeCRM::AGR => 'Agriculture',
			IndustryTypeCRM::AER => 'Arts, Entertainment & Recreation',
			IndustryTypeCRM::BPS => 'Business & Professional Services',
			IndustryTypeCRM::CE => 'Construction & Engineering',
			IndustryTypeCRM::ES => 'Educational Services',
			IndustryTypeCRM::FI => 'Finance & Insurance',
			IndustryTypeCRM::FBS => 'Food & Beverage Services',
			IndustryTypeCRM::GO => 'Government',
			IndustryTypeCRM::HCSS => 'Health Care & Social Services',
			IndustryTypeCRM::HT => 'High Technology',
			IndustryTypeCRM::HPS => 'HR & Payroll Services',
			IndustryTypeCRM::IE => 'Importing & Exporting',
			IndustryTypeCRM::LS => 'Legal Services',
			IndustryTypeCRM::LF => 'Logging & Forestry',
			IndustryTypeCRM::MAN => 'Manufacturing',
			IndustryTypeCRM::ME => 'Media',
			IndustryTypeCRM::MOG => 'Mining, Oil & Gas',
			IndustryTypeCRM::PP => 'Printing & Production',
			IndustryTypeCRM::RED => 'Real Estate & Development',
			IndustryTypeCRM::RT => 'Retail Trade',
			IndustryTypeCRM::ST => 'Skilled Trades',
			IndustryTypeCRM::TW => 'Transportation & Warehousing',
			IndustryTypeCRM::UT => 'Utilities',
			IndustryTypeCRM::WT => 'Wholesale Trade',
			IndustryTypeCRM::OTHER => 'Other Business Services',
		];
	}

	/**
	 * @param $type
	 * @param $accountId
	 * @return stdClass|null
	 */
	public function getMemberByMembershipTypeAndAccountId($type, $accountId): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true" count="2">
						<entity name="account" >
							<attribute name="accountid" />
                            <attribute name="name" />
                            <attribute name="description" />
                            <attribute name="telephone1" />
                            <attribute name="emailaddress1" />
                            <attribute name="websiteurl" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="createdon" />
                            <order attribute="createdon" descending="true" />
                            <attribute name="entityimageid" />
							<attribute name="new_deluxebusinessmember" />
							
							<attribute name="new_advertisingmediadigitalservices" />
							<attribute name="new_artsculturetourism" />
							<attribute name="new_associationnotforprofit" />
							<attribute name="new_energyenvironment" />
							<attribute name="new_financialservices" />
							<attribute name="new_foodbeverages" />
							<attribute name="new_healthwellness" />
							<attribute name="new_manufacturingexports" />
							<attribute name="new_miscellaneous" />
							<attribute name="new_professionalservices" />
							<attribute name="new_publicsecmunicipalityedufacilityhospital" />
							<attribute name="new_realestateconstructiondevelopment" />
							<attribute name="new_retail" />
							<attribute name="new_technology" />
							<attribute name="new_transportationlogistics" />
							
							<filter type="and" >
                                <condition attribute="accountid" operator="eq" value="' . $accountId . '" />
                                <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                            </filter>
                        </entity>
					</fetch>
		';

		$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, true, false, null, null, true);
		$count = isset($elementsCRMEntities) ? sizeof($elementsCRMEntities->Entities) : 0;

		return $this->formatEntitiesData($count, $elementsCRMEntities);
	}

	/**
	 * @param $type
	 * @return stdClass|null
	 */
	public function getFeaturedMembersByMembershipType($type): ?stdClass
	{
		if ($this->client == null)
			return null;

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true" count="2">
                        <entity name="account" >
                            <attribute name="accountid" />
                            <attribute name="name" />
                            <attribute name="telephone1" />
                            <attribute name="emailaddress1" />
                            <attribute name="websiteurl" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="createdon" />
                            <order attribute="createdon" descending="true" />
                            <attribute name="entityimageid" />
                            <attribute name="new_deluxebusinessmember" />
                            <filter type="and" >
                                <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                <condition attribute="new_featuredbusiness" operator="eq" value="1" />
                            </filter>
                        </entity>
                    </fetch>';
		$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, true, false, null, null, true);
		$count = isset($elementsCRMEntities) ? sizeof($elementsCRMEntities->Entities) : 0;

		return $this->formatEntitiesData($count, $elementsCRMEntities);
	}

	/**
	 * @param $type
	 * @param null $filters
	 * @param false $allPages
	 * @param null $pagingCookie
	 * @param null $limitCount
	 * @param null $pageNumber
	 * @return stdClass|null
	 */
	public function getAllMembersByMembershipType($type, $filters = null, $allPages = false, $pagingCookie = null, $limitCount = null, $pageNumber = null): ?stdClass
	{
		if ($this->client == null)
			return null;

		$or_conditions = '';
		$and_conditions = '';
		$sort = 'ascending';

		if ($filters != null) {
			if (isset($filters->provinces) && $filters->provinces != null && sizeof($filters->provinces)) {
				$or_conditions .= '<filter type="or">';
				foreach ($filters->provinces as $province) {
					$or_conditions .= '<condition attribute="ccc_address1provincestate" operator="eq" value="' . $province . '" />';
				}
				$or_conditions .= '</filter>';
			}

			if (isset($filters->industry_types) && $filters->industry_types != null && sizeof($filters->industry_types)) {
				$or_conditions .= '<filter type="or">';
				foreach ($filters->industry_types as $industry_type) {
					$or_conditions .= '<condition attribute="ccc_industry" operator="eq" value="' . $industry_type . '" />';
				}
				$or_conditions .= '</filter>';
			}

			if (isset($filters->services) && $filters->services != null && sizeof($filters->services)) {
				$or_conditions .= '<filter type="or">';
				foreach ($filters->services as $service) {
					$or_conditions .= '<condition attribute="' . $service . '" operator="eq" value="1"></condition>';
				}
				$or_conditions .= '</filter>';
			}

			if (isset($filters->city) && $filters->city != null && strlen(trim($filters->city))) {
				$or_conditions .= '<filter type="or">';
				$or_conditions .= '<condition attribute="address1_city" operator="like" value="%' . trim($filters->city) . '%" />';
				$or_conditions .= '</filter>';
			}

			if (isset($filters->search) && $filters->search != null && strlen(trim($filters->search))) {
				$or_conditions .= '<filter type="or">';
				$or_conditions .= '<condition attribute="name" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '<condition attribute="description" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '<condition attribute="emailaddress1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '<condition attribute="websiteurl" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '<condition attribute="telephone1" operator="like" value="%' . trim($filters->search) . '%" />';
				$or_conditions .= '</filter>';
			}

			if (isset($filters->account_filter) && $filters->account_filter !== null && $filters->account_filter !== '#') {
				$and_conditions .= '<condition attribute="name" operator="like" value="' . trim($filters->account_filter) . '%" />';
			}

			if (isset($filters->account_filter) && $filters->account_filter !== null && $filters->account_filter == '#') {
				$or_conditions .= '<filter type="or">';
				foreach (range(1, 10) as $number)
					$or_conditions .= '<condition attribute="name" operator="like" value="' . $number . '%" />';
				$or_conditions .= '</filter>';
			}

			if (isset($filters->sort) && $filters->sort != null) {
				$sort = $filters->sort;
			}

			if (isset($filters->accountid) && $filters->accountid != null) {
				$and_conditions .= '<condition attribute="accountid" operator="neq" value="' . $filters->accountid . '" />';
			}
		}

		$fetchXML = '<fetch version="1.0" output-format="xml-platform" mapping="logical" distinct="true" >
                        <entity name="account" >
                            <attribute name="accountid" />
                            <attribute name="name" />
                            <attribute name="address1_city" />
                            <attribute name="ccc_address1provincestate" />
                            <attribute name="emailaddress1" />
                            <attribute name="websiteurl" />
                            <attribute name="telephone1" />
                            <attribute name="ccc_industry" />
                            <attribute name="description" />
                            <attribute name="new_ebspartner" />
                            <attribute name="new_deluxebusinessmember" />
                            <attribute name="entityimageid" />
							<attribute name="ccc_chamberaffiliation" />
                            <attribute name="ccc_chamberaffiliation2" />
                            <attribute name="ccc_chamberaffiliation3" />
                            <attribute name="ccc_chamberaffiliation4" />
                            <attribute name="ccc_chamberaffiliation5" />
                            <attribute name="ccc_chamberaffiliation6" />
                            <attribute name="ccc_chamberaffiliation7" />
                            <attribute name="ccc_chamberaffiliation8" />
                            <attribute name="ccc_chamberaffiliation9" />
                            <attribute name="ccc_chamberaffiliation10" />
                            <attribute name="ccc_chamberaffiliation11" />
                            <attribute name="ccc_chamberaffiliation12" />
                            
                            <attribute name="new_advertisingmediadigitalservices" />
							<attribute name="new_artsculturetourism" />
							<attribute name="new_associationnotforprofit" />
							<attribute name="new_energyenvironment" />
							<attribute name="new_financialservices" />
							<attribute name="new_foodbeverages" />
							<attribute name="new_healthwellness" />
							<attribute name="new_manufacturingexports" />
							<attribute name="new_miscellaneous" />
							<attribute name="new_professionalservices" />
							<attribute name="new_publicsecmunicipalityedufacilityhospital" />
							<attribute name="new_realestateconstructiondevelopment" />
							<attribute name="new_retail" />
							<attribute name="new_technology" />
							<attribute name="new_transportationlogistics" />
							
                            <order attribute="name" ' . $sort . '="true" />
                            <filter type="and">
                                <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                <condition attribute="statecode" operator="eq" value="0" />
                                <condition attribute="statuscode" operator="eq" value="1" />
                                ' . $and_conditions . '
                            </filter>
                            ' . $or_conditions . '
                        </entity>
                    </fetch>';

		$fetchXMLCount = '<fetch version="1.0" mapping="logical" >
                            <entity name="account" >
                                <attribute name="accountid" />
                                <filter type="and">
                                    <condition attribute="ccc_membershiptype" operator="eq" value="' . $type . '" />
                                    <condition attribute="ccc_membershipstate" operator="eq" value="803330000" />
                                    <condition attribute="statecode" operator="eq" value="0" />
                                    <condition attribute="statuscode" operator="eq" value="1" />
                                    ' . $and_conditions . '
                                </filter>
                                ' . $or_conditions . '
                            </entity>
                        </fetch>';

		$elements = array();

		$elementsCRMCount = $this->client->retrieveMultiple($fetchXMLCount, true, null, null, null, true);

		$count = intval($elementsCRMCount->Count);

		if ($count > 0) {
			$elementsCRMEntities = $this->client->retrieveMultiple($fetchXML, $allPages, $pagingCookie, $limitCount, $pageNumber, true);

			foreach ($elementsCRMEntities->Entities as $accountCRM) {
				$account = new stdClass();
				$account->accountid = $accountCRM->accountid;
				$account->name = $accountCRM->name;
				$account->telephone1 = isset($accountCRM->telephone1) ? $accountCRM->telephone1 : null;
				$account->emailaddress1 = isset($accountCRM->emailaddress1) ? $accountCRM->emailaddress1 : null;
				$account->websiteurl = isset($accountCRM->websiteurl) ? $accountCRM->websiteurl : null;
				$account->ccc_industry = isset($accountCRM->ccc_industry) ? $accountCRM->ccc_industry->FormattedValue : null;
				$account->address1_city = isset($accountCRM->address1_city) ? $accountCRM->address1_city : null;
				$account->address1_stateorprovince = isset($accountCRM->ccc_address1provincestate) ? $accountCRM->ccc_address1provincestate->FormattedValue : null;
				$account->description = isset($accountCRM->description) ? $accountCRM->description : null;
				$account->new_ebspartner = isset($accountCRM->new_ebspartner->Value) && ($accountCRM->new_ebspartner->Value == 'true') ? true : false;
				$account->new_deluxebusinessmember = isset($accountCRM->new_deluxebusinessmember->Value) && ($accountCRM->new_deluxebusinessmember->Value == 'true') ? true : false;
				$account->new_servicesprovided = isset($accountCRM->new_servicesprovided->FormattedValue) ? $accountCRM->new_servicesprovided->FormattedValue : null;

				foreach (DataServiceCCC::getServicesWithoutKeys() as $key => $value) {
					$account->$key = $accountCRM->$key && $accountCRM->$key->FormattedValue === "Yes" ? $accountCRM->$key->Value : false;
				}

				$affiliations = array();
				for ($i = 1; $i < 13; $i++) {
					if ($i == 1) {
						$chamber_affiliation = 'ccc_chamberaffiliation';
					} else {
						$chamber_affiliation = 'ccc_chamberaffiliation' . $i;
					}
					if (isset($accountCRM->$chamber_affiliation->Value->Name) && $accountCRM->$chamber_affiliation->Value->Name != null) {
						$affiliations[] = $accountCRM->$chamber_affiliation->Value->Name;
					}
				}
				$account->chamber_affiliation = implode(", ", $affiliations);

				//image
				$account->image = null;
				if (isset($accountCRM->entityimageid)) {
					$fetchImage = '<fetch mapping="logical">
                                <entity name="account">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="accountid" operator="eq" value="{' . $account->accountid . '}" />
                                            <condition attribute="new_deluxebusinessmember" operator="eq" value="1" />
                                        </filter>
                                </entity>
                          </fetch>';

					$entityImage = $this->client->retrieveMultiple($fetchImage, false, null, 1, null, true);

					if ($entityImage && sizeof($entityImage->Entities)) {
						$account->image = $entityImage->Entities[0]->entityimage;
					}
				}

				$elements[] = $account;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;

		return $data;
	}

	/**
	 * @param int $count
	 * @param stdClass $elementsCRMEntities
	 * @return stdClass
	 */
	private function formatEntitiesData(int $count, stdClass $elementsCRMEntities): stdClass
	{
		$elements = array();
		if ($count > 0) {
			foreach ($elementsCRMEntities->Entities as $accountCRM) {
				$account = new stdClass();
				$account->accountid = $accountCRM->accountid;
				$account->name = $accountCRM->name;
				$account->telephone1 = $accountCRM->telephone1 ?? null;
				$account->emailaddress1 = $accountCRM->emailaddress1 ?? null;
				$account->websiteurl = $accountCRM->websiteurl ?? null;
				$account->address1_city = $accountCRM->address1_city ?? null;
				$account->address1_stateorprovince = isset($accountCRM->ccc_address1provincestate) ? $accountCRM->ccc_address1provincestate->FormattedValue : null;
				$account->description = $accountCRM->description ?? null;
				$account->new_deluxebusinessmember = $accountCRM->new_deluxebusinessmember && $accountCRM->new_deluxebusinessmember->FormattedValue === "Yes" ? $accountCRM->new_deluxebusinessmember->Value : false;

				foreach (DataServiceCCC::getServicesWithoutKeys() as $key => $value) {
					$account->$key = $accountCRM->$key && $accountCRM->$key->FormattedValue === "Yes" ? $accountCRM->$key->Value : false;
				}

				//image
				$account->image = null;
				if (isset($accountCRM->entityimageid)) {
					$fetchImage = '<fetch mapping="logical">
                                <entity name="account">
                                        <attribute name="entityimage" />
                                        <filter type="and">
                                            <condition attribute="accountid" operator="eq" value="{' . $account->accountid . '}" />
                                            <condition attribute="new_deluxebusinessmember" operator="eq" value="1" />
                                        </filter>
                                </entity>
                          </fetch>';

					$entityImage = $this->client->retrieveMultiple($fetchImage, false, null, 1, null, true);

					if ($entityImage && sizeof($entityImage->Entities)) {
						$account->image = $entityImage->Entities[0]->entityimage;
					}
				}

				$elements[] = $account;
			}
		}

		$data = new stdClass();
		$data->total_count = $count;
		$data->elements = $elements;
		return $data;
	}

	/**
	 * @param array $array1
	 * @param array $array2
	 * @param array|null $keysToCompare
	 * @return array
	 */
	private function arrayDifference(array $array1, array $array2, array $keysToCompare = null): array
	{
		$serialize = function (&$item, $idx, $keysToCompare) {
			if (is_array($item) && $keysToCompare) {
				$a = array();
				foreach ($keysToCompare as $k) {
					if (array_key_exists($k, $item)) {
						$a[$k] = $item[$k];
					}
				}
				$item = $a;
			}
			$item = serialize($item);
		};

		$deserialize = function (&$item) {
			$item = unserialize($item);
		};

		array_walk($array1, $serialize, $keysToCompare);
		array_walk($array2, $serialize, $keysToCompare);

		// Items that are in the original array but not the new one
		$deletions = array_diff($array1, $array2);
		$insertions = array_diff($array2, $array1);

		array_walk($insertions, $deserialize);
		array_walk($deletions, $deserialize);

		return array('insertions' => $insertions, 'deletions' => $deletions);
	}
}
