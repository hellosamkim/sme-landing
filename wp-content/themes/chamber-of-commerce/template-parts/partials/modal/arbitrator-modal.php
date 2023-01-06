 
<div class="active form-step" data-form-step="1">
    <form action="" class="" id="arbitrator-1">
    <p class="text-center"><?php _e('STEP 1 OF 3','chamber') ?></p>
    <h2 class="mb-4 font-semibold text-center">
        <?php _e('ICC Canada Arbitration Committee','chamber') ?>
    </h2>
    <p class="mb-10 text-center">
        <?php _e('Join the ICC Canada Arbitration Committee. Our committee raises the profile of Canadian international arbitrators and arbitration counsel both within Canada and abroad.','chamber') ?>
    </p>
    <div class="text-red-600" id="arbitrator-1-errors"></div>
    <p class="mb-3"><?php _e('Select your membership type','chamber') ?></p>

    <div class="grid grid-cols-2 gap-10 mb-5">
        <div class="relative">
        <input
            type="radio"
            name="arbitrator_type"
            value="100000003"
            id="100000003"
            required="required"
            class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"
        />
        <label for="100000003" class="radio-container"
            ><?php _e('Sole arbitrator or lawyer in a firm that is a member of the Canadian Chamber of Commerce.','chamber') ?></label
        >
        </div>
        <div>
        <span class="members_price">500 $ (annual fee)</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10 mb-5">
        <div class="relative">
        <input
            type="radio"
            name="arbitrator_type"
            value="100000004"
            id="100000004"
            required="required"
            class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"
        />
        <label for="100000004" class="radio-container"
            ><?php _e('Sole arbitrator or lawyer in a firm that is not a member of the Canadian Chamber of Commerce','chamber') ?></label
        >
        </div>
        <div>
        <span class="members_price">750 $ (annual fee)</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10 mb-5">
        <div class="relative">
        <input
            type="radio"
            name="arbitrator_type"
            value="100000005"
            id="100000005"
            required="required"
            class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"
        />
        <label for="100000005" class="radio-container"
            ><?php _e('Academic, government or non-profit organization lawyer','chamber') ?></label
        >
        </div>
        <div>
        <span class="members_price">250 $ (annual fee)</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10 mb-5">
        <div class="relative">
        <input
            type="radio"
            name="arbitrator_type"
            value="100000006"
            id="100000006"
            required="required"
            class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"
        />
        <label for="100000006" class="radio-container"
            ><?php _e('Young practitioner (Member of YCAP and less than 35 years of age. Must provide proof of YCAP membership)','chamber') ?></label
        >
        </div>
        <div>
        <span class="members_price">250 $ (annual fee)</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10 mb-5">
        <div class="relative">
        <input
            type="radio"
            name="arbitrator_type"
            value="100000007"
            id="100000007"
            required="required"
            class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"
        />
        <label for="100000007" class="radio-container"
            ><?php _e('In-house lawyer (corporate counsel)','chamber') ?></label
        >
        </div>
        <div>
        <span class="members_price">250 $ (annual fee)</span>
        </div>
    </div>
    <p class="my-3"><?php _e('Fees are subject to applicable taxes (HST#106844285 | QST # 1006090296). The membership fee covers a 12-month period from January 1 to December 31. New member fees will be prorated for the current year. Memberships at the $250 categories are not prorated.','chamber') ?></p>
    </form>
</div>

<div class="hidden form-step" data-form-step="2">
    <form class="" id="arbitrator-2">

            <p class="text-center"><?php _e('STEP 2 OF 3','chamber') ?></p>
            <h2 class="mb-4 font-semibold text-center" ><?php _e('Arbitrator Information','chamber') ?></h2> 
            <div  class="grid gap-10 gap-y-4">

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
                
            
                    <div class="grid grid-cols-12 gap-5 lg:gap-10 col-span-full">
                    <div class="col-span-full lg:col-span-6">
                        <label class="form-label"><?php _e('Organization / Firm','chamber') ?> <span class="text-primary">*</span></label>
                        <input type="text" class="w-full" name="company_name" />
                    </div>
                    <div class="col-span-full lg:col-span-6">
                        <label class="form-label"><?php _e('Age','chamber') ?> <span class="text-primary">*</span></label>
                        <select class="w-full" name="age_range">
                            <option disabled value=""><?php _e('Select Age','chamber') ?></option>
                            <option value="100000000"><?php _e('35 and Under','chamber') ?></option>
                            <option value="100000001"><?php _e('36 to 45','chamber') ?></option>
                            <option value="100000002"><?php _e('46 to 55','chamber') ?></option>
                            <option value="100000003"><?php _e('56 to 65','chamber') ?></option>
                            <option value="100000004"><?php _e('66 and Above','chamber') ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-span-full">
                    <label class="form-label"><?php _e('Address Line 1','chamber') ?> <span class="text-primary">*</span></label>
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
                        <select class="w-full" name="province_dp" id="province" required="required" aria-required="true" tabindex="1">
                            <option></option>
                            <option value="803330001">Alberta</option>
                            <option value="803330002">British Columbia</option>
                            <option value="803330003">Manitoba</option>
                            <option value="803330004">New Brunswick</option>
                            <option value="803330005">Newfoundland and Labrador</option>
                            <option value="803330007">Nova Scotia</option>
                            <option value="803330006">Northwest Territories</option>
                            <option value="803330008">Nunavut</option>
                            <option value="803330009">Ontario</option>
                            <option value="803330010">Quebec</option>
                            <option value="803330011">Saskatchewan</option>
                            <option value="803330012">Yukon</option>
                            <option value="803330066">Prince Edward Island</option>
                            <option value="803330065">International</option>
                    </select>
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
                <div class="col-span-full">
                    <label class="form-label"><?php _e('Email','chamber') ?> <span class="text-primary">*</span></label>
                    <input type="text" class="w-full" name="email" />
                </div>
                <div class="grid gap-10 lg:grid-cols-2 col-span-full">
                    <div>
                        <label class="form-label"><?php _e('Twitter Handle','chamber') ?></label>
                        <input type="text" class="w-full" name="twitter_handle" />
                    </div>
                    <div>
                        <label class="form-label"><?php _e('Facebook URL','chamber') ?></label>
                        <input type="text" class="w-full" name="facebookUrl" />
                    </div>  
                </div> 
            </div>
    </form>
</div>


<div class="hidden form-step"  data-form-step="3" data-review="1">
<p class="text-center"><?php _e('STEP 3 OF 3','chamber') ?></p>
<h2 class="mb-4 font-semibold text-center" ><?php _e('Review Application & Submit','chamber') ?></h2> 
<div  class="grid gap-10 gap-y-4">  
    
    <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
        <div class="flex items-center mb-3 space-x-2">
            <h4 class="mb-0"><?php _e('ICC Canada Arbitration Committee','chamber') ?></h4>
            <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="1"><?php _e('Edit','chamber') ?></a>
        </div>
        <div class="space-y-1 fill-data" data-form="arbitrator-1">
            
        </div>
    </div>
    <div class="block h-full p-6 bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT">
        <div class="flex items-center mb-3 space-x-2">
            <h4 class="mb-0"><?php _e('Arbitrator Information','chamber') ?></h4>
            <a href="" class="text-sm font-medium underline text-primary form-go-to" go-to="2"><?php _e('Edit','chamber') ?></a>
        </div>  
        <div class="space-y-1 fill-data" data-form="arbitrator-2">
            
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

    <div class="sticky bottom-0 mt-10 -mx-5 bg-white lg:-mx-10">
    <div
        class="flex items-center justify-between px-5 mb-3 text-center lg:px-10 membership-nav"
    >
        <a
        href="#"
        class="mt-3 button-outline__primary inline-block lg:min-w-[200px] form-previous-step"
        tabindex="0"
        ><?php _e('Previous','chamber') ?></a
        >
        <a
        href="#"
        class="mt-3 button-filled__primary inline-block lg:min-w-[200px] form-next-step"
        tabindex="0"
        ><?php _e('Next','chamber') ?></a
        >
    </div>
    <div class="px-5 py-4 text-white lg:px-10 bg-indigo-DEFUALT">
        <p class="text-white">
        <?php _e('If you have any questions or need help completing this form, please contact members@chamber.ca.','chamber') ?>
        </p>
    </div>
    </div> 
