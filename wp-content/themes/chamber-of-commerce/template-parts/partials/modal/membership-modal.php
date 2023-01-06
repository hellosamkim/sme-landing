
    <div class="text-center form-step active" data-form-step="-1">
        <h2 class="mb-4 font-semibold"><?php _e('Become a Member','chamber') ?></h2>
        <p class="mb-10"><?php _e('CHOOSE WHICH REPRESENTS YOU','chamber') ?></p>
        <div id="become-member-1-errors"></div>
          <form action=""  id="become-member-1">  
            <input type="hidden" name="action" value="becomemember">
            <input type="hidden" name="security" value="<?= wp_create_nonce('business_member'); ?>">
      
            <div  class="grid lg:grid-cols-3 gap-7 ">
                  
                <div class="relative">
                    <input type="radio" class="absolute form-radio top-10 z-[-1] " value="business" id="business" name="member_type" />
                    <label for="business" href="<?= get_template_directory_uri() . '/template-parts/partials/forms/business.php' ?>" class="block h-full p-6 !normal-case bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT custom-label">
                        <h4 class="mb-1 font-medium text-center"> <?php _e(' Businesses','chamber') ?></h4>
                        <p class="!normal-case"><?php _e('Businesses of all sizes, from all sectors and all regions of Canada can apply as a “business member.”','chamber') ?></p>
                    </label>
                </div>
                <div class="relative">
                    <input type="radio" class="absolute form-radio top-10 z-[-1] " value="association"  id="association" name="member_type" />
                    <label for="association" href="<?= get_template_directory_uri() . '/template-parts/partials/forms/associations.php' ?>" class="block h-full p-6 !normal-case bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT custom-label">
                        <h4 class="mb-2 font-medium text-center"><?php _e('Associations','chamber') ?></h4>
                        <p class="!normal-case"><?php _e('Business, trade and professional associations, sector councils and chambers of commerce that represent the interests of a particular sector or cultural group can apply as an “association member.”','chamber') ?></p>
                    </label>
                </div>
                <div class="relative">
                    <input type="radio" class="absolute form-radio top-10 z-[-1] " value="before-start-yes" id="before-start-yes" name="member_type" />
                    <label href="<?= get_template_directory_uri() . '/template-parts/partials/forms/associations.php' ?>" for="before-start-yes" class="block h-full p-6 !normal-case bg-white border-b-4 rounded cursor-pointer border-forest-DEFUALT custom-label">
                        <h4 class="mb-2 font-medium text-center"><?php _e('Chambers','chamber') ?></h4>
                        <p class="!normal-case"><?php _e('Chambers of commerce and boards of trade that are associated with a geographic territory can apply as a “chamber member.”','chamber') ?></p>
                    </label>
                </div>
            </div>
        </form>
        
    </div>

    <div class="hidden text-center form-step"  data-form-step="0">

          <form action=""  id="membership-2">  
            <div class="hidden step-2-selection step-2-business" >
                <h2 class="mb-4 font-semibold"><?php _e('Become a Member – Businesses','chamber') ?></h2> 
                <div  class="max-w-lg mx-auto">
                    <p><?php _e('By becoming a member of the Canadian Chamber of Commerce, you can contribute to the development of policies and advocacy initiatives that directly affect your business and benefit from a broad range of services designed to help your business thrive.','chamber') ?>
                    </p>
                </div>
            </div>
              <div class="hidden step-2-selection step-2-association">
                <h2 class="mb-4 font-semibold"><?php _e('Become a Member – Association','chamber') ?></h2> 
                <div  class="max-w-lg mx-auto">
                    <p><?php _e('By becoming a member of the Canadian Chamber of Commerce, you can help your member businesses thrive by contributing to the development of policies and advocacy initiatives that directly affect their success as well as benefit from a broad range of business services designed to help your association thrive.','chamber') ?>
                    </p>
                </div>
            </div>
              <div class="hidden step-2-selection step-2-chambers">
                <h2 class="mb-4 font-semibold"><?php _e('Become a Member – Chamber','chamber') ?></h2> 
                <div  class="max-w-lg mx-auto">
                    <p><?php _e('By joining the Canadian Chamber of Commerce, you can help your member businesses thrive by contributing to the development of policies and advocacy initiatives that directly affect their success and boost your own growth and retention by giving your members access to a broad range of business services designed to help them thrive.','chamber') ?> 
                    </p>
                </div>
            </div>
              <div class="hidden before-you-start">
                <form action="" class="step-3-form"  id="membership-3-before-start-yes"> 
                    <h2 class="mb-4 font-semibold text-center"><?php _e('Before we start...','chamber') ?></h2> 
                    <div id="membership-3-errors-no"></div>
                        <div  class="max-w-lg mx-auto mt-10 text-center">
                            <p>
                                <?php _e(' Are you special interest chamber of commerce?','chamber') ?>
                            </p>
                            <div class="flex justify-center mt-2 space-x-8 specialIntrest" >
                                <div class="relative specialIntrest" >
                                <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1" checked  required="required" name="interest" id="radio_yes" value="yes" >
                                <label for="radio_yes" class="radio-container" href="<?= get_template_directory_uri() . '/template-parts/partials/forms/associations.php' ?>">
                                <?php _e(' Yes','chamber') ?>
                                </label>
                            </div>
                            <div class="relative specialIntrest " >
                                <input type="radio" class="!w-6 !h-6 !p-0 form-radio text-primary mr-1"  required="required" name="interest" id="radio_no" value="no">
                                <label for="radio_no" class="radio-container" href="<?= get_template_directory_uri() . '/template-parts/partials/forms/chamber-no.php' ?>" >
                                <?php _e(' No','chamber') ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                    
                
            
        </form>
        
    </div>
    <div id="partials">

    </div>

    <div class="hidden text-center form-step"  data-form-step="thankyou">
        <h2 class="mb-4 font-semibold text-center" ><?php _e(' Thank you for your submission!','chamber') ?></h2> 
        <p><?php _e(' A member of #TeamChamber will be getting in touch with you soon.','chamber') ?></p>
        <a href="#" class="close-mdoal mt-3 button-filled__primary inline-block lg:min-w-[200px] form-next-step" tabindex="0"><?php _e('Close','chamber') ?></a>
    </div>

    <div class="sticky bottom-0 mt-10 -mx-5 bg-white lg:-mx-10">
        <div class="flex items-center justify-between px-5 mb-3 text-center lg:px-10 membership-nav">
            <a href="#" class="mt-3 button-outline__primary inline-block lg:min-w-[200px] form-previous-step" tabindex="0"><?php _e('Previous','chamber') ?></a>
            <a href="#" class="mt-3 button-filled__primary inline-block lg:min-w-[200px] form-next-step" tabindex="0"><?php _e('Next','chamber') ?></a>
        </div>  
        <div class="px-5 py-4 text-white lg:px-10 bg-indigo-DEFUALT">
            <p class="text-white"><?php _e('If you have any questions or need help completing this form, please contact members@chamber.ca.','chamber') ?></p>
        </div>
    </div>
