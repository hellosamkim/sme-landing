 

<div class="hidden form-step"  data-form-step="1"> 
    <form action="" class=""    id="business-1">  
        <input type="hidden" name="type"  value="Business">

        <p class="text-center"><?php _e('STEP 1 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Business Information','chamber') ?></h2> 
        <div  class="grid gap-10 gap-y-4">
            
            <div class="col-span-full">
                <label class="form-label"><?php _e('Business Name','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" required class="w-full" name="chamber_name" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Doing business as','chamber') ?></label>
                <input type="text" class="w-full" name="business_type" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Address Line 1','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="business_address_line1" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Address Line 2','chamber') ?></label>
                <input type="text" class="w-full" name="business_address_line2" />
            </div>
            
            <div class="grid gap-10 lg:grid-cols-3 col-span-full">
                <div>
                    <label class="form-label"><?php _e('City','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="business_city" />
                </div>
                <div>
                    <label class="form-label"><?php _e('Province/Territory','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="business_province" />
                </div>
                <div>
                    <label class="form-label"><?php _e('Postal Code','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="business_postal" />
                </div>
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Telephone','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="business_telephone" />
            </div>
            <div class="grid gap-10 lg:grid-cols-3 col-span-full">
                <div>
                    <label class="form-label"><?php _e('Twitter Handle','chamber') ?></label>
                    <input type="text" class="w-full" name="twitter_handle" />
                </div>
                <div>
                    <label class="form-label"><?php _e('Facebook URL','chamber') ?></label>
                    <input type="text" class="w-full" name="facebookUrl" />
                </div> 
                <div>
                    <label class="form-label"><?php _e('Website','chamber') ?></label>
                    <input type="text" class="w-full" name="website" />
                </div> 
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('How many jobs do you represent?','chamber') ?></label>
                <input type="text" class="w-full" name="how_many_jobs" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('What is your yearly financial contribution to social and/or community programs?','chamber') ?></label>
                <input type="text" class="w-full" name="your_yearly_financial" />
            </div> 
            <div class="col-span-full">
                <p class="mb-5"><?php _e('The Canadian Chamber Network is a three tier network with chambers working on the behalf of the businesses in local communities, provinces and territories and at the national level through the Canadian Chamber of Commerce. If you belong to other tiers of the network, we would be interested in knowing. Please indicate:','chamber') ?></p>
                
                <label class="form-label"><?php _e('The company is a member of the:','chamber') ?></label>
                    <div class="grid gap-10 lg:grid-cols-2 col-span-full">
                    <div>
                        <input type="text" class="w-full" name="prov_chamber" />
                        <label class="form-label"><?php _e('provincial/territorial chamber of commerce','chamber') ?></label>
                    </div>
                    <div> 
                        <input type="text" class="w-full" name="local_chamber" />
                        <label class="form-label"><?php _e('local chamber of commerce','chamber') ?></label>
                    </div>  
                </div>
            </div>
        </div>
    </form> 
</div>

<div class="hidden form-step"  data-form-step="2">

    <form action="" class=""  id="business-2">  
        <p class="text-center"><?php _e('STEP 2 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Primary Contact','chamber') ?></h2> 
        <div  class="grid gap-10 gap-y-4"> 
            <div class="grid grid-cols-12 gap-5 lg:gap-10 col-span-full">
                <div class="col-span-full lg:col-span-2">
                    <label class="form-label"><?php _e('Prefix','chamber') ?> <span class="text-primary">*</span></label>
                    <select class="w-full" name="prefix">
                        <option disabled value=""><?php _e('Prefix','chamber') ?></option>
                        <option value="803330020"><?php _e('Mr.','chamber') ?></option>
                        <option value="803330020"><?php _e('Mrs.','chamber') ?></option>
                        <option value="803330021"><?php _e('Ms.','chamber') ?></option>
                        <option value="803330006"><?php _e('Dr.','chamber') ?></option>
                    </select>
                </div>
                <div class="col-span-6 lg:col-span-5">
                    <label class="form-label"><?php _e('First Name ','chamber') ?><span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="first_name"/>
                </div>
                <div class="col-span-6 lg:col-span-5">
                    <label class="form-label"><?php _e('Last Name','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="last_name" />
                </div>
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Title','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="title" />
            </div>
            <div class="grid gap-10 lg:grid-cols-2 col-span-full">
                <div class="">
                    <label class="form-label"><?php _e('Telephone','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="tel" class="w-full" name="telephone" />
                </div>
                <div class="">
                    <label class="form-label"><?php _e('Email','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="email" />
                </div>
            </div> 
        </div>
    </form> 
</div>

<div class="hidden form-step"  data-form-step="3"> 
      <form action="" class=""  id="business-3">  
        <p class="text-center"><?php _e('STEP 3 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Areas of Interest','chamber') ?></h2> 
        <div  class="grid gap-10 gap-y-4">  
            <div class="">
                <label class="form-label"><?php _e('Please indicate your areas of interest:','chamber') ?> <span class="text-primary">*</span></label>
                <div id="business-3-errors"></div>
                <div class="grid gap-3 mb-5 md:grid-cols-2"> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_artificialintelligence" value="artificialintelligence">
                        <label for="interest_area_artificialintelligence"><?php _e('Artificial intelligence','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_canadaus" value="canadaus">
                        <label for="interest_area_canadaus"><?php _e('Canada-U.S.','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_cannabis" value="cannabis">
                        <label for="interest_area_cannabis"><?php _e('Cannabis','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_circulareconomy" value="circulareconomy">
                        <label for="interest_area_circulareconomy"><?php _e('Circular economy','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_competitionpolicy" value="competitionpolicy">
                        <label for="interest_area_competitionpolicy"><?php _e('Competition policy','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_diversityandinclusion" value="diversityandinclusion">
                        <label for="interest_area_diversityandinclusion"><?php _e('Diversity &amp; inclusion','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_environment" value="environment">
                        <label for="interest_area_environment"><?php _e('Environment','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_fintech" value="fintech">
                        <label for="interest_area_fintech"><?php _e('Fintech','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_fiscalpolicy" value="fiscalpolicy">
                        <label for="interest_area_fiscalpolicy"><?php _e('Fiscal policy','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_indigenousbusinessrelations" value="indigenousbusinessrelations">
                        <label for="interest_area_indigenousbusinessrelations"><?php _e('Indigenous business relations','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_infrastructure" value="infrastructure">
                        <label for="interest_area_infrastructure"><?php _e('Infrastructure','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_innovation" value="innovation">
                        <label for="interest_area_innovation"><?php _e('Innovation','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_intellectualproperty" value="intellectualproperty">
                        <label for="interest_area_intellectualproperty"><?php _e('Intellectual property','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_internaltrade" value="internaltrade">
                        <label for="interest_area_internaltrade"><?php _e('Internal trade','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_internationalaffairs" value="internationalaffairs">
                        <label for="interest_area_internationalaffairs"><?php _e('International affairs','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_labourrelations" value="labourrelations">
                        <label for="interest_area_labourrelations"><?php _e('Labour relations','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_naturalresourcesandenergy" value="naturalresourcesandenergy">
                        <label for="interest_area_naturalresourcesandenergy"><?php _e('Natural resources &amp; energy','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_regulatorycompetitiveness" value="regulatorycompetitiveness">
                        <label for="interest_area_regulatorycompetitiveness"><?php _e('Regulatory competitiveness','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_scienceandtechnology" value="scienceandtechnology">
                        <label for="interest_area_scienceandtechnology"><?php _e('Science and technology','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_skillsandimmigration" value="skillsandimmigration">
                        <label for="interest_area_skillsandimmigration"><?php _e('Skills &amp; immigration','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_smallandmediumsizedbusiness" value="smallandmediumsizedbusiness">
                        <label for="interest_area_smallandmediumsizedbusiness"><?php _e('Small &amp; medium sized business','chamber') ?></label>
                    </div> 
                    <div class="relative pt-1 pl-10 ">
                        <input type="checkbox" required="required" name="interest_area" id="interest_area_transportation" value="transportation">
                        <label for="interest_area_transportation"><?php _e('Transportation','chamber') ?></label>
                    </div> 
                </div>
            </div>  
            <div class="col-span-full">
                <label class="form-label"><?php _e('Other areas of policy interest','chamber') ?></label>
                <input type="text" class="w-full" name="other_areas" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Top countries/regions your company does business in:','chamber') ?></label>
                <div class="grid gap-10 lg:grid-cols-3 col-span-full">
                    <div class=""> 
                        <input type="text" class="w-full"  name="area1"/>
                    </div>
                    <div class=""> 
                        <input type="text" class="w-full"  name="area2"/>
                    </div>
                    <div class=""> 
                        <input type="text" class="w-full" name="area3" />
                    </div>
                </div> 
            </div> 
        </div>  
    </form> 
</div>

<div class="hidden form-step"  data-form-step="4">
      <form action=""  class=""  id="business-4">  
        <p class="text-center"><?php _e('STEP 4 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Type of Industry','chamber') ?></h2> 
        <div  class="grid gap-10 gap-y-4">  
            <div class="">
                <label class="form-label"><?php _e('Please indicate your type of industry','chamber') ?> <span class="text-primary">*</span></label>

                <div id="business-4-errors"></div>
                <div class="grid gap-3 md:grid-cols-2">   
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_accomodation" value="accomodation" >
                        <label for="industry_type_accomodation" class="radio-container">
                       <?php _e('Accommodation','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_advertisingmarketingcommunications" value="advertisingmarketingcommunications">
                        <label for="industry_type_advertisingmarketingcommunications" class="radio-container">
                       <?php _e('Advertising, Marketing &amp; Communications','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_agriculture" value="agriculture">
                        <label for="industry_type_agriculture" class="radio-container">
                       <?php _e('Agriculture','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_artsentertainmentrecreation" value="artsentertainmentrecreation">
                        <label for="industry_type_artsentertainmentrecreation" class="radio-container">
                        <?php _e('Arts, Entertainment &amp; Recreation','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_constructionengineering" value="constructionengineering">
                        <label for="industry_type_constructionengineering" class="radio-container">
                       <?php _e('Construction &amp; Engineering','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_financeinsurance" value="financeinsurance">
                        <label for="industry_type_financeinsurance" class="radio-container">
                        <?php _e('Finance &amp; Insurance','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_foodbeverageservices" value="foodbeverageservices">
                        <label for="industry_type_foodbeverageservices" class="radio-container">
                        <?php _e('Food &amp; Beverage Services','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_healthcaresocialservices" value="healthcaresocialservices">
                        <label for="industry_type_healthcaresocialservices" class="radio-container">
                        <?php _e('Health Care &amp; Social Services','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_hightechnology" value="hightechnology">
                        <label for="industry_type_hightechnology" class="radio-container">
                       <?php _e('High Technology','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_hrpayrollservices" value="hrpayrollservices">
                        <label for="industry_type_hrpayrollservices" class="radio-container">
                        <?php _e('HR &amp; Payroll Services','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_importingexporting" value="importingexporting">
                        <label for="industry_type_importingexporting" class="radio-container">
                        <?php _e('Importing &amp; Exporting','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_legalservices" value="legalservices">
                        <label for="industry_type_legalservices" class="radio-container">
                        <?php _e('Legal Services','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_loggingforestry" value="loggingforestry">
                        <label for="industry_type_loggingforestry" class="radio-container">
                        <?php _e('Logging &amp; Forestry','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_manufacturing" value="manufacturing">
                        <label for="industry_type_manufacturing" class="radio-container">
                       <?php _e('Manufacturing','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_media" value="media">
                        <label for="industry_type_media" class="radio-container">
                       <?php _e('Media','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_miningoilgas" value="miningoilgas">
                        <label for="industry_type_miningoilgas" class="radio-container">
                        <?php _e('Mining, Oil &amp; Gas','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_printingproduction" value="printingproduction">
                        <label for="industry_type_printingproduction" class="radio-container">
                       <?php _e('Printing &amp; Production','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_realestatedevelopment" value="realestatedevelopment">
                        <label for="industry_type_realestatedevelopment" class="radio-container">
                        <?php _e('Real Estate &amp; Development','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_retailtrade" value="retailtrade">
                        <label for="industry_type_retailtrade" class="radio-container">
                       <?php _e('Retail Trade','chamber') ?> 
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_skilledtrades" value="skilledtrades">
                        <label for="industry_type_skilledtrades" class="radio-container">
                        <?php _e('Skilled Trades','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_transportationwarehousing" value="transportationwarehousing">
                        <label for="industry_type_transportationwarehousing" class="radio-container">
                        <?php _e('Transportation &amp; Warehousing','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_utilities" value="utilities">
                        <label for="industry_type_utilities" class="radio-container">
                        <?php _e('Utilities','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_wholesaletrade" value="wholesaletrade">
                        <label for="industry_type_wholesaletrade" class="radio-container">
                        <?php _e('Wholesale Trade','chamber') ?>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="industry_type" id="industry_type_otherbusinessservcies" value="otherbusinessservcies">
                        <label for="industry_type_otherbusinessservcies" class="radio-container">
                       <?php _e(' Other Business Services','chamber') ?>
                        </label>
                    </div> 

                </div>
            </div>   
        </div>  
    </form>
</div>


<div class="hidden form-step"  data-form-step="5">
    <p class="text-center"><?php _e('STEP 5 OF 5','chamber') ?></p>
    <h2 class="mb-4 font-semibold text-center" ><?php _e('Review Application & Submit','chamber') ?></h2> 
    <div  class="grid gap-10 gap-y-4">  
        <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
            <div class="flex items-center mb-3 space-x-2">
                <h4 class="mb-0"><?php _e('Business Information','chamber') ?></h4>
                <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="1"><?php _e('Edit','chamber') ?></a>
            </div>
            <div class="space-y-1 fill-data" data-form="business-1">
                
            </div>
        </div>
        <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
            <div class="flex items-center mb-3 space-x-2">
                <h4 class="mb-0"><?php _e('Primary Contact','chamber') ?></h4>
                <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="2"><?php _e('Edit','chamber') ?></a>
            </div>
            <div class="space-y-1 fill-data" data-form="business-2">
                
            </div>
        </div>
        <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
            <div class="flex items-center mb-3 space-x-2">
                <h4 class="mb-0"><?php _e('Areas of Interest','chamber') ?></h4>
                <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="3"><?php _e('Edit','chamber') ?></a>
            </div>  
            <div class="space-y-1 fill-data" data-form="business-3">
                
            </div>
        </div>
            <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
                <div class="flex items-center mb-3 space-x-2">
                    <h4 class="mb-0"><?php _e('Type of Industry','chamber') ?></h4>
                <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="4"><?php _e('Edit','chamber') ?></a>
            </div>  
            <div class="space-y-1 fill-data" data-form="business-4">
              
            </div>
        </div>
        <h4 class="mb-0"><?php _e('Membership investment','chamber') ?></h4>
        <p><?php _e('Upon receiving your membership application form, our Membership and Services team will contact you to determine your membership investment.','chamber') ?></p>
        <div class="relative pt-1 pl-10 mt-8 accept_conditions-cb">
            <input type="checkbox" required="required" name="accept_conditions" id="accept_conditions" value="transportation">
            <label for="accept_conditions"> 
                    <span class="!text-red-600">*</span>
                  <?php _e(' I accept the site <a class="edit_text" href="/terms-of-use/" target="_blank">terms & conditions</a> and the <a class="edit_text" href="/privacy-policy/" target="_blank">statement on the use of personal data</a>','chamber') ?>.
                </label>
            </label>
        </div> 
        <div class="relative pt-1 pl-10 ">
            <input type="checkbox"  name="receive_update" id="receive_update" value="transportation">
            <label for="receive_update">
            <?php _e('In addition to having a member of #TeamChamber contact me about my membership application, I consent to the Canadian Chamber of Commerce keeping me informed with personalized news, offers, products and promotions it believes would interest me by email.','chamber') ?></label>
        </div> 
    </div>   
</div>
 