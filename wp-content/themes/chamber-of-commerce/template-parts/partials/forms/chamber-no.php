 


<div class="hidden form-step"  data-form-step="1">
    <form action="" class=""  id="chamber-1"> 
        <p class="text-center"><?php _e('STEP 1 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Number of Chamber Members','chamber') ?></h2> 
        <div class="text-red-600" id="chamber-1-errors"></div>
        <p><?php _e('Select number of members','chamber') ?></p>
                    <input type="hidden" name="type"  value="Chamber">

      <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="1_99members" id="1_99members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="1_99members"  class="radio-container">1 - 99</label>
        </div>
        <div>
            <span class="members_price">$240.37</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="100_199members"  id="100_199members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="100_199members" class="radio-container">100 - 199</label>
        </div>
        <div>
            <span class="members_price">$480.76</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="200_399members" id="200_399members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="200_399members" class="radio-container">200 - 399</label>
        </div>
        <div>
            <span class="members_price">$932.38</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="400_599members" id="400_599members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="400_599members" class="radio-container">400 - 599</label>
        </div>
        <div>
            <span class="members_price">$1,108.60</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="600_799members"  id="600_799members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="600_799members" class="radio-container">600 - 799</label>
        </div>
        <div>
            <span class="members_price">$1,405.86</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="800_1199members" id="800_1199members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="800_1199members" class="radio-container">800 - 1,199</label>
        </div>
        <div>
            <span class="members_price">$1,857.45</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="1200_2999members" id="1200_2999members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="1200_2999members" class="radio-container">1,200 - 2,999</label>
        </div>
        <div>
            <span class="members_price">$3,569.22</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="3000_3999members" id="3000_3999members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="3000_3999members" class="radio-container">3,000 - 3,999</label>
        </div>
        <div>
            <span class="members_price">$7,240.41</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="4000_5999members" id="4000_5999members" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="4000_5999members" class="radio-container">4,000 - 5,999</label>
        </div>
        <div>
            <span class="members_price">$7,487.24</span>
        </div>
        </div>
        <div class="grid grid-cols-2 mb-5 lg:grid-cols-3">
        <div class="relative">
            <input type="radio" name="chamber_size" value="6000_plus" id="6000_plus" required="required" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1">
            <label for="6000_plus" class="radio-container">6,000+</label>
        </div>
        <div>
            <span class="members_price"><?php _e('$7,561.11 + $1.00 per additional member over 5,999','chamber') ?></span>
        </div>
        </div>

    </form> 
    
</div>

<div class="hidden form-step"  data-form-step="2">  
      <form action="" class=""  id="chamber-2">  
        <p class="text-center"><?php _e('STEP 2 OF 5','chamber') ?></p>
        <h2 class="mb-4 font-semibold text-center" ><?php _e('Chamber Information','chamber') ?></h2> 

        <div  class="grid gap-10 gap-y-4"> 
              <div class="col-span-full">
                <label class="form-label"><?php _e('Name of chamber/board of trade','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="chamber_name"/>
            </div>
                <div class="col-span-full">
                <label class="form-label"><?php _e('Address Line 1 ','chamber') ?><span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="address_line1" />
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Address Line 2','chamber') ?></label>
                <input type="text" class="w-full" name="address_line2" />
            </div>
            
            <div class="grid gap-10 lg:grid-cols-3 col-span-full">
                <div>
                    <label class="form-label"><?php _e('City','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="city" />
                </div>
                <div>
                    <label class="form-label"><?php _e('Province/Territory','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="province" />
                </div>
                <div>
                    <label class="form-label"><?php _e('Postal Code','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="postal" />
                </div>
            </div>
            <div class="col-span-full">
                <label class="form-label"><?php _e('Telephone','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="telephone" />
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
        <hr class="my-5"/>
        <h4><?php _e('Chief Elected Officer','chamber') ?></h4>
            </div>

            <div class="grid grid-cols-12 gap-5 lg:gap-10 col-span-full">
                <div class="col-span-full lg:col-span-2">
                    <label class="form-label"><?php _e('Prefix','chamber') ?> <span class="text-primary">*</span></label>
                    <select class="w-full" name="prefix">
                        <option disabled value=""><?php _e('Prefix','chamber') ?></option>
                        <option value="803330019"><?php _e('Mr.','chamber') ?></option>
                        <option value="803330020"><?php _e('Mrs.','chamber') ?></option>
                        <option value="803330021"><?php _e('Ms.','chamber') ?></option>
                        <option value="803330006"><?php _e('Dr.','chamber') ?></option>
                    </select>
                </div>
                <div class="col-span-6 lg:col-span-5">
                    <label class="form-label"><?php _e('First Name','chamber') ?> <span class="text-primary">*</span></label>
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
            <div class="col-span-full">
                <label class="form-label"><?php _e('Term of office','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="terms_office" />
            </div>
            
            <div class="col-span-full">
                <label class="form-label"><?php _e('Email','chamber') ?> <span class="text-primary">*</span></label>
                <input type="text" class="w-full" name="email" />
            </div>
        </div>
    </form>
</div>

<div class="hidden form-step"  data-form-step="3">
  <form action="" class=""  id="chamber-3">  
      <p class="text-center"><?php _e('STEP 3 OF 5','chamber') ?> </p>
      <h2 class="mb-4 font-semibold text-center" ><?php _e('Chamber Staff Information','chamber') ?></h2> 
      <h4 class="mb-2"><?php _e('Senior Staff Person','chamber') ?></h4>

      <div  class="grid grid-cols-12 gap-10 gap-y-4">  
          <div class="col-span-12 lg:col-span-6">
              <label class="form-label"><?php _e('Name','chamber') ?> </label>
              <input type="text" class="w-full" name="senior_name"/>
          </div>
          <div class="col-span-12 lg:col-span-6">
              <label class="form-label"><?php _e('Title','chamber') ?> </label>
              <input type="text" class="w-full" name="senior_title"/>
          </div>
          <div class="col-span-full">
              <label class="form-label"><?php _e('Email','chamber') ?> </label>
              <input type="email" class="w-full" name="senior_email"/>
          </div>
          
          <div class="col-span-full">
              <hr class="my-5"/>

              <h4><?php _e('Other Key Staff Members','chamber') ?></h4>
          </div>

          <div class="col-span-12 lg:col-span-6">
              <label class="form-label"><?php _e('Name','chamber') ?> </label>
              <input type="text" class="w-full" name="staff_member_name"/>
          </div>
          <div class="col-span-12 lg:col-span-6">
              <label class="form-label"><?php _e('Title','chamber') ?> </label>
              <input type="text" class="w-full" name="staff_member_title"/>
          </div>
          <div class="col-span-full">
              <label class="form-label"><?php _e('Email','chamber') ?> </label>
              <input type="email" class="w-full" name="staff_member_email"/>
          </div>
      </div>
  </form>
</div>


<div class="hidden form-step"  data-form-step="4">
    <p class="text-center"><?php _e('STEP 4 OF 5','chamber') ?></p>
    <h2 class="mb-4 font-semibold text-center" ><?php _e('Documents & Attachments','chamber') ?></h2> 
<form action="" class=""  id="chamber-4">  
    <div class="grid grid-cols-1 gap-10 gap-y-4">  
        <div class="">
            <label class="form-label"><?php _e('1. A copy of your bylaws: ','chamber') ?></label>
            <input type="file" accept=".doc, .pdf, .csv, .xls" class="w-full" name="bylaws" id="bylaws"/>
        </div> 
        <div class="">
            <label class="form-label"><?php _e('2. A current membership list:','chamber') ?> </label>
            <input type="file" accept=".doc, .pdf, .csv, .xls" class="w-full" name="membership_list" id="membership_list"/>
        </div> 
            <div class="">
            <label class="form-label"><?php _e('3. Most recent annual report:','chamber') ?> </label>
            <input type="file" accept=".doc, .pdf, .csv, .xls" class="w-full" name="annual_report" id="annual_report"/>
        </div> 
            <div class="">
            <label class="form-label"><?php _e('4. Latest financial statement:','chamber') ?></label>
            <input type="file" accept=".doc, .pdf, .csv, .xls" class="w-full" name="financial_statement" id="financial_statement"/>
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
              <h4 class="mb-0"><?php _e('Number of Chamber Members','chamber') ?></h4>
              <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="1"><?php _e('Edit','chamber') ?></a>
          </div>
          <div class="space-y-1 fill-data" data-form="chamber-1">
              
          </div>
      </div>
      <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
          <div class="flex items-center mb-3 space-x-2">
              <h4 class="mb-0"><?php _e('Chamber Information','chamber') ?></h4>
              <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="2"><?php _e('Edit','chamber') ?></a>
          </div>
          <div class="space-y-1 fill-data" data-form="chamber-2">
              
          </div>
      </div>
      <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
          <div class="flex items-center mb-3 space-x-2">
              <h4 class="mb-0"><?php _e('Chamber Staff Information','chamber') ?></h4>
              <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="3"><?php _e('Edit','chamber') ?></a>
          </div>  
          <div class="space-y-1 fill-data" data-form="chamber-3">
              
          </div>
      </div> 
        <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
            <div class="flex items-center mb-3 space-x-2">
            <h4 class="mb-0"><?php _e('Documents & Attachments','chamber') ?></h4>
            <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="4"><?php _e('Edit','chamber') ?></a>
          </div>  
          <div class="space-y-1 fill-data" data-form="chamber-4">
             <p><?php _e('A copy of your bylaws:','chamber') ?> <span id="file-name-1"> </span> </p>
             <p><?php _e('A current membership list:','chamber') ?> <span id="file-name-2"> </span> </p>
             <p><?php _e('Most recent annual report:','chamber') ?> <span id="file-name-3"> </span></p>
             <p><?php _e('Latest financial statement:','chamber') ?> <span id="file-name-4"> </span></p>
          </div>
      </div>
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
