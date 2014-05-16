/* Mouseovers - start ****************************************************************************************** */
var orientation3  = 'portrait';
var androidWidth  = 'not set';
var androidHeight = 'not set';
var androidDeviceSize = 'not set'; /* this will be set when client sends back dimensions, to be used for screen length later*/

// remove following line, it's for testing only
//$('head').append('<link href="/shared/css/membership-android-tablet-1024x600-group.css?b=4" rel="stylesheet" type="text/css" id="androidDeviceSpecificStyleSheet">');
//$('head').append('<link href="/shared/css/membership-android-tablet-1280x800-group.css?b=4" rel="stylesheet" type="text/css" id="androidDeviceSpecificStyleSheet">');

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */


function is_device_nookColor(){
	/* function is used to identify nook color and returns a simple true or false. This function is called in is_group... function below and can be called individually if necessary */
	if ((androidWidth == 1024 && androidHeight == 600) || (androidWidth == 600 && androidHeight == 1024)) {
		return true;	
	} else {
		return false;	
	}
}

function is_group_android_tablet_1024x600(){
	if (((androidWidth>=954)&&(androidWidth<=1094))&&((androidHeight>=530)&&(androidHeight<=670))||((androidHeight>=954)&&(androidHeight<=1094))&&((androidWidth>=530)&&(androidWidth<=670))) {
		return true;
	} else {
		return false;	
	}
}

function is_device_xoom_10inch(){
	/* function is used to identify xoom 10 inch and returns a simple true or false. This function is called in is_group... function below and can be called individually if necessary */
	if (androidWidth >= 1200 || androidHeight >= 1200) {
		return true;	
	} else {
		return false;	
	}
}

function is_group_android_tablet_1280x800(){
	if (((androidWidth>=1210)&&(androidWidth<=1350))&&((androidHeight>=730)&&(androidHeight<=870))||((androidHeight>=1210)&&(androidHeight<=1350))&&((androidWidth>=730)&&(androidWidth<=870))) {
		return true;
	} else {
		return false;	
	}
}

function is_group_android_tablet_1080x1920(){
	if ( (androidWidth==1080 && androidHeight==1920) || (androidWidth==1920 && androidHeight==1080)) {
		return true;
	} else {
		return false;	
	}
}

function myOC(){

	var orientation = orientation3;
	var device = identifyDevice();
	
		/* portrait ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
		if (orientation == 'portrait') {

			btnContainerPlacement();
				
			// One offs portrait
			
			/* ipad ----------------------------------------- */
			if (device == 'ipad') {
				
				// Special Boingo Mobile Offer! text alignment (unset styles)
				if ($('div#special-offer-bkgd').length) {
					$('h1, #bms-copy').css({'width' : '575px','margin-left' : 'auto'});
				}
				
			} // end of ipad
			
			/* android -------------------------------------- */
			if (device == 'android') {
				
				// Special Boingo Mobile Offer! text alignment
				
						// unset styles			
						if ($('div#special-offer-bkgd').length && (androidDeviceSize == 'large1' || androidDeviceSize == 'large2')) {
							$('h1').css('padding-top','25px');
							$('h1, #bms-copy').css({'width' : '250px','margin-left' : 'auto'});
						
						} else if ($('div#special-offer-bkgd').length && androidDeviceSize == 'medium') {
							$('h1, #bms-copy').css({'width' : '230px','margin-left' : 'auto'});
							
						} else if ($('div#special-offer-bkgd').length && (is_group_android_tablet_1280x800())) {
							$('h1').css({'margin-top':'0'});
							$('h1, #bms-copy').css({'width' : '500px','margin-left' : 'auto'});
						
						} else if ( $('div#special-offer-bkgd').length && (is_group_android_tablet_1024x600()) ) {
							$('h1').css({'margin-top':'0'});
							$('h1, #bms-copy').css({'width' : '400px','margin-left' : 'auto'});
						}
						
				// Your Boingo Trial Has Begun
				
						if ($('div#success').length) {
							$('div#container-sc p').css({'width':'270px','text-align':'center'});
						}
						
				// Make it a combo
				
						if ($('div#bms-bkgd').length) {
							$('#bms-bkgd-container h1').css('padding','20px 0 0 0');
						}
				
				
			} // end of android
				
		
		/* landscape ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
		} else if (orientation == 'landscape'){

			btnContainerPlacement();
			
			// One offs landscape
			
			/* ipad ------------------------------------------ */
			if (device == 'ipad') {
				
				// Special Boingo Mobile Offer! text alignment
				
						// set styles
						if ($('div#special-offer-bkgd').length) {
							$('h1, #bms-copy').css({'width' : '525px','margin-left' : '375px'});
						}
				
			} // end of ipad
			
			/* android ----------------------------------- */
			if (device == 'android') {
				
				// Special Boingo Mobile Offer! text alignment
				
						//set styles
						if ($('div#special-offer-bkgd').length && androidDeviceSize == 'large2') {
							$('h1').css('padding-top','18px');
							$('h1, #bms-copy').css({'width' : '220px','margin-left' : '235px'});
						
						} else if ($('div#special-offer-bkgd').length && androidDeviceSize == 'large1') {
							$('h1').css('padding-top','18px');
							$('h1, #bms-copy').css({'width' : '210px','margin-left' : '225px'});
						
						} else if ($('div#special-offer-bkgd').length && androidDeviceSize == 'medium') {
							$('h1, #bms-copy').css({'width' : '230px','margin-left' : '190px'});
						
						} else if ($('div#special-offer-bkgd').length && (is_group_android_tablet_1280x800())) {
							$('h1').css({'margin-top':'75px'});
							$('h1, #bms-copy').css({'width' : '500px','margin-left':'43%'});
						
						} else if ( $('div#special-offer-bkgd').length && (is_group_android_tablet_1024x600()) ) {
							$('h1').css({'margin-top':'0','padding':'105px 0 10px 0!important'});
							$('h1, #bms-copy').css({'width' : '400px','margin-left' : '41%'});
						}
						
						// Your Boingo Trial Has Begun
				
						if ($('div#success').length) {
							$('div#container-sc p').css({'width':'380px','text-align':'center'});
						}
						
						// Make it a combo
				
						if ($('div#bms-bkgd').length) {
							$('#bms-bkgd-container h1').css('padding-top','10px');
						}
				
			} // end of android
			
		} // end of landscape
			
} // end of function myOC (my orientation change)

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function boingoWebViewOnOrientationChange(o,height,width){
// this will not be called on devices with only portrait orientation (iphone)
		
	if(o == 'portrait'){
		//alert('ipad/iphone script says portrait orientationchange');
		orientation3 = 'portrait';
	} else {
		//alert('ipad/iphone script says landscape orientationchange');
		orientation3 = 'landscape';
	}
	
	/* This is for andfroid only, android client is passing height and width */
	if(height!='not set'){androidHeight = height;}
	if(width!='not set'){androidWidth = width;}
		
	/* new android size detection and css file insertion in document head - START */
	/* this code really needs to be cleaned up */
	if (androidWidth != 'not set' && androidWidth != 'not set') {
	
		var filename = '';
		
		// small (phone)
		if ((androidWidth == 240 && androidHeight == 320) || (androidWidth == 320 && androidHeight == 240)) {
			filename = 'sml';
			androidDeviceSize = 'small';
		// medium (phone)
		} else if ((androidWidth == 320 && androidHeight == 480) || (androidWidth == 480 && androidHeight == 320)) {
			filename = 'med';
			androidDeviceSize = 'medium';
		// large (phone)
		} else if ((androidWidth == 480 && androidHeight == 800) || (androidWidth == 800 && androidHeight == 480)) {
			filename = 'lrg';
			androidDeviceSize = 'large1';
		} else if ((androidWidth == 480 && androidHeight == 854) || (androidWidth == 854 && androidHeight == 480)) {
			filename = 'lrg2';
			androidDeviceSize = 'large2';
		// android tablet 1280x800 group
		} else if (is_group_android_tablet_1280x800()) {
			filename = 'tablet-1280x800-group';
			androidDeviceSize = 'tablet-1280x800-group';
			$('head').append('<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no,width=device-width,target-densitydpi=device-dpi" />');
		//} else if (androidWidth == 1024 && androidHeight == 600 || androidWidth == 600 || androidHeight == 1024) {
		// refactored code above in new functions is_device and is_group further up in this file
		} else if (is_group_android_tablet_1024x600()) {
			filename = 'tablet-1024x600-group';
			androidDeviceSize = 'tablet-1024x600-group';
			$('head').append('<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no,width=device-width,target-densitydpi=device-dpi" />');
		} else if(is_group_android_tablet_1080x1920()){
			filename = 'tablet-1280x800-group';
			androidDeviceSize = 'tablet-1280x800-group';
			$('head').append('<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no,width=device-width,target-densitydpi=350" />');			
		} else {
		// default
			filename = 'tablet-1280x800-group';
			androidDeviceSize = 'tablet-1280x800-group';
			$('head').append('<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no,width=device-width,target-densitydpi=device-dpi" />');
		}
		
		// check to see if <style> with id='androidDeviceSpecificStyleSheet' exists, if not then add
		if( $('link#androidDeviceSpecificStyleSheet').length<1 ){
			//DEBUG $('body').append('<p>Testing to see if this line appears.</p>');
			$('head').append('<link href="/shared/css/membership-android-' + filename + '.css?a=11" rel="stylesheet" type="text/css" id="androidDeviceSpecificStyleSheet">');
		}
	}
	/* new android size detection and css file insertion in document head - END */
	
	myOC();
	
}

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function boingoWebViewDidFinishLoad(o){
	
	if(o == 'portrait'){
		orientation3 = 'portrait';
	} else {
		orientation3 = 'landscape';
	}
	
	myOC();
}

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function addBtnContainers(){
	
	// if these divs exist do nothing otherwise create them (so it doesn't fire again for orientation change)
	if ( $('div.innerContainer').length || $('div.outerContainer').length ) {
		// do nothing
	} else {
		
			if ( ($('button').has('span')).length ){
				container = ($('button').has('span')).first().parent().wrapInner('<div class="innerContainer">').wrapInner('<div class="outerContainer">');
			} else if (($('a').has('span')).length) {
				container = $('a').has('span').parent().wrapInner('<div class="innerContainer">').wrapInner('<div class="outerContainer">');
			}
			
			// one off case for Jing's forgot password and reset password pages
			
			if ( $('form#forgotPassword').length || $('form#resetPassword').length) {
				$('div.backbutton').parent().wrapInner('<div class="innerContainer">').wrapInner('<div class="outerContainer">');
					
				if ($('form[name=forgotPassword]').length)	{ var formName = 'forgotPassword';}
				if ($('form[name=resetPassword]').length)	{ var formName = 'resetPassword';}
					
				$('div.backbutton ul').remove();
				$('div.backbutton').removeClass('backbutton').addClass('backbutton2');
				$('div.backbutton2').append('<a id="backButton" name="backButton" class="submitBtn" href="javascript:document.' + formName + '.submit();"><span>SUBMIT</span></a>');
			}
	}
	
} // end of function addBtnContainers()

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function identifyDevice(){
	
	if ((/iphone/i).test(navigator.userAgent)){
		device = 'iphone';	
	} else if ((/android/i).test(navigator.userAgent)) {		
		device = 'android';
	} else if ((/ipad/i).test(navigator.userAgent)) {
		device = 'ipad';
	} else {
		device = 'pcmac';	
	}
	
	// if body has class and class != device then add device (so that if called from other functions not duplicate
	if ( $('body').attr('class').length && $('body').attr('class')!=device ) {
		 $('body').addClass(device);
	}	
	
	return device;
	
} //end of function identifyDevice()


/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
	
function identifyPageLength(){
	
	// the same page may be scrollable or not scrollable on different devices
	// so setting up this system to manually label each page short or long per device

	var pg_get_started = $('div#getstarted').length; /*Getting started*/
	var pg_choose_username_password = $('div#memberAccountData').length; /* Choose a username and password*/
	var pg_creating_account = $('div#accountCreationSpinner').length; /* Creating your account ... */
	var pg_check_email = $('div#memberVerification').length; /* Please check your email */
	var pg_email_resent = $('div#memberVerificationResend').length; /* Email confirmation resent */
	var pg_email_confirmation_code = $('div#memberVerificationEnterCode').length; /* Please check your email (confirmation code) */
	var pg_success_free = $('div#memberClientFinishPageMember').length; /* Success (free) end of uc10 */
	var pg_special_mobile_offer = $('div#special-offer-bkgd').length; /* Special Boingo Mobile Offer */
	var pg_begun_trial = $('div#success').length; /* Your Boingo trial has begun! */
	var pg_connect_often = $('div#countrySelection').length; /* Where do you connect most often */
	var pg_success_free_boingo = $('div#memberClientFinishPageRetail').length; /* Success (free and Boingo) end of uc12 */
	var pg_make_combo = $('div#bms-bkgd').length; /* Make it a combo! */
	var pg_pricing_summary = $('div#pricing-container').length; /* pricing summary */
	var pg_pricing_summary_aircell = $('div#aircell-pricing-container').length;
	var pg_cvv2 = $('div#cvvimage').length; /* what is cvv2? */
	var pg_confirm_plan_change = $('form#changePlan').length; /* Please confirm your plan change */
	var pg_setup_your_account = $('div#accountData').length; /* Setup your account */
	var pg_contact = $('div#contact-info').length; /* contact page*/
	var pg_error_HTML = $('div.error').html();
	var pg_error = $.trim(pg_error_HTML).length;
	
	// if Error
	if (pg_error==0) {var no_errors = true}
	else if (pg_error>0) {var page_has_errors = true}
	
	/* Enter new password with and without errors */
	if ($('form#resetPassword').length && no_errors) {var pg_enter_new_password = true} 
	else if ($('form#resetPassword').length && page_has_errors) {var pg_enter_new_password_w_errors = true}
	
	/* Forgot password with and without errors */
	if ($('form#forgotPassword').length && no_errors) {var pg_forgot_password = true} 
	else if ($('form#forgotPassword').length && page_has_errors) {var pg_forgot_password_w_errors = true}
	
	/* One great service, thousands of hotspots */
	if (($('div#planSelection').length && $('form#command').length==0)) {var pg_one_great_service = true;}
	
	/* Please choose your plan - 1 plan */
	if (($('form#memberUpgrade').length && $('form[action*=selfcare]').length && $('div.twocol').length <= 1 )) {var pg_choose_your_plan_1 = true;}
	/* Please choose your plan - more than 1 plan */
	if (($('form#memberUpgrade').length && $('form[action*=selfcare]').length && $('div.twocol').length >= 2 )) {var pg_choose_your_plan_more = true;}
	
	/* Select from these convenient plans - 1 plan */
	if (($('div#planSelection').length && $('form#command').length && $('div.twocol').length <= 1)) {var pg_select_from_convenient_plans_1 = true;}
	/* Select from these convenient plans - more than 1 plan*/
	if (($('div#planSelection').length && $('form#command').length && $('div.twocol').length >= 2)) {var pg_select_from_convenient_plans_more = true;}
	
	/* Please enter your billing info - with errors and extra lines */
	if (( ($('form#memberUpgrade').length && ($('input#ccZipcode').length || $('input#ccCvv2').length) ) && (page_has_errors || $('div h4').length>0) )) {var pg_enter_billing_info_w_errors = true; }
	
	/* Please enter your billing info - NO errors and extra lines */
	if (( ($('form#memberUpgrade').length && ($('input#ccZipcode').length || $('input#ccCvv2').length)) && no_errors && $('div h4').length==0)) {var pg_enter_billing_info_no_errors = true;}

	var length = '';
	
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	if ((/iphone/i).test(navigator.userAgent)){
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
		
		// normal (non-scrolling)
		if (
			pg_get_started ||
			pg_one_great_service ||
			pg_creating_account || 
			pg_check_email || 
			pg_email_resent ||
			pg_email_confirmation_code ||
			pg_success_free ||
			pg_special_mobile_offer || 
			pg_begun_trial || 
			pg_connect_often || 
			pg_success_free_boingo ||
			pg_pricing_summary ||
			pg_make_combo ||
			pg_cvv2 ||
			pg_enter_new_password ||
			pg_forgot_password || 
			pg_choose_your_plan_1 ||
			pg_select_from_convenient_plans_1
		) {
			length = 'normal';
			
		// long (scrolling)
		} else if(
			pg_choose_username_password || 
			pg_enter_billing_info_no_errors || 
			pg_enter_billing_info_w_errors || 
			pg_choose_your_plan_more || 
			pg_pricing_summary_aircell || 
			pg_select_from_convenient_plans_more || 
			pg_setup_your_account || 
			pg_confirm_plan_change ||
			pg_contact
		){
			length = 'long';
		}
		
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */	
	} else if ((/android/i).test(navigator.userAgent)) {
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
		
		// androidDeviceSize values: small, medium, large1, large2 (set above)
		
		/*android small SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS */
		if (androidDeviceSize=='small') {
			
					// portrait
					if ( orientation3 == 'portrait' ) {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_make_combo || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_enter_new_password || 
								pg_forgot_password ||
								pg_choose_your_plan_1 ||
								pg_select_from_convenient_plans_1 ||
								pg_confirm_plan_change ||
								pg_enter_billing_info_no_errors
										
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_cvv2 || 
								pg_enter_billing_info_w_errors ||
								pg_select_from_convenient_plans_more ||
								pg_setup_your_account ||
								pg_contact ||
								pg_choose_your_plan_more
								
							){
								length = 'long';
							}
						
					// landscape
					} else if (orientation3 == 'landscape') {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo ||
								pg_select_from_convenient_plans_1 ||
								pg_choose_your_plan_1 || 
								pg_enter_new_password ||
								pg_make_combo
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_enter_billing_info_w_errors ||
								pg_enter_billing_info_no_errors ||
								pg_confirm_plan_change ||  
								pg_select_from_convenient_plans_more || 
								pg_choose_your_plan_more ||
								pg_choose_username_password || 
								pg_setup_your_account || 
								pg_contact || 
								pg_pricing_summary ||
								pg_pricing_summary_aircell ||   
								pg_forgot_password || 
								pg_cvv2
							){
								length = 'long';
							}
						
					}	
		
		/*android medium MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM */
		} else if (androidDeviceSize=='medium') {
			
					// portrait
					if ( orientation3 == 'portrait' ) {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_make_combo || 
								pg_pricing_summary ||
								pg_pricing_summary_aircell ||  
								pg_enter_new_password || 
								pg_enter_new_password_w_errors ||
								pg_forgot_password ||
								pg_forgot_password_w_errors ||
								pg_choose_your_plan_1 ||
								pg_select_from_convenient_plans_1 ||
								pg_confirm_plan_change
										
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_cvv2 || 
								pg_enter_billing_info_w_errors ||
								pg_enter_billing_info_no_errors ||
								pg_select_from_convenient_plans_more ||
								pg_setup_your_account ||
								pg_contact ||
								pg_choose_your_plan_more
								
							){
								length = 'long';
							}
						
					// landscape
					} else if (orientation3 == 'landscape') {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo ||
								pg_select_from_convenient_plans_1 ||
								pg_choose_your_plan_1 || 
								pg_enter_new_password ||
								pg_make_combo
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_enter_billing_info_w_errors ||
								pg_enter_billing_info_no_errors ||
								pg_confirm_plan_change ||  
								pg_select_from_convenient_plans_more || 
								pg_choose_your_plan_more ||
								pg_choose_username_password || 
								pg_setup_your_account || 
								pg_contact || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell ||  
								pg_forgot_password || 
								pg_cvv2 ||
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors
							){
								length = 'long';
							}
						
					}	
		
		/*android large1 or large2 LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL */
		} else if (androidDeviceSize=='large1' || androidDeviceSize=='large2') {
			
					// portrait
					if ( orientation3 == 'portrait' ) {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_make_combo || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_enter_new_password || 
								pg_enter_new_password_w_errors ||
								pg_forgot_password ||
								pg_forgot_password_w_errors ||
								pg_choose_your_plan_1 ||
								pg_select_from_convenient_plans_1 ||
								pg_confirm_plan_change ||
								pg_enter_billing_info_no_errors
										
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_cvv2 || 
								pg_enter_billing_info_w_errors ||
								pg_select_from_convenient_plans_more ||
								pg_setup_your_account ||
								pg_contact ||
								pg_choose_your_plan_more
								
							){
								length = 'long';
							}
						
					// landscape
					} else if (orientation3 == 'landscape') {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo ||
								pg_select_from_convenient_plans_1 ||
								pg_choose_your_plan_1 ||
								pg_enter_new_password ||
								pg_forgot_password ||
								pg_make_combo								
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_enter_billing_info_w_errors ||
								pg_enter_billing_info_no_errors ||
								pg_confirm_plan_change ||  
								pg_select_from_convenient_plans_more || 
								pg_choose_your_plan_more ||
								pg_choose_username_password || 
								pg_setup_your_account || 
								pg_contact || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_cvv2 ||
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors
							){
								length = 'long';
							}
						
					}
					
					
		/*android tablet - tablet-1280x800-group ******************************************************************************************** */
		} else if (androidDeviceSize=='tablet-1024x600-group') {
			
					// portrait
					if ( orientation3 == 'portrait' ) {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_select_from_convenient_plans_1 ||
								pg_select_from_convenient_plans_more || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_confirm_plan_change ||
								pg_make_combo  || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_choose_your_plan_1 ||
								pg_choose_your_plan_more ||
								pg_cvv2 || 
								pg_enter_new_password ||
								pg_enter_billing_info_w_errors || 
								pg_enter_billing_info_no_errors || 
								pg_forgot_password ||
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors ||
								pg_setup_your_account 
										
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_contact
								
							){
								length = 'long';
							}
						
					// landscape
					} else if (orientation3 == 'landscape') {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_select_from_convenient_plans_1 || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_confirm_plan_change || 
								pg_make_combo || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_choose_your_plan_1 || 
								pg_choose_your_plan_more ||
								pg_cvv2 || 
								pg_enter_new_password || 
								pg_enter_billing_info_w_errors || 
								pg_enter_billing_info_no_errors ||
								pg_forgot_password || 
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors							
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_select_from_convenient_plans_more ||
								pg_setup_your_account || 
								pg_contact
							){
								length = 'long';
							}
						
					}

		
		/*android tablet - tablet-1280x800-group ******************************************************************************************** */
		} else if (androidDeviceSize=='tablet-1280x800-group') {
			
					// portrait
					if ( orientation3 == 'portrait' ) {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_select_from_convenient_plans_1 ||
								pg_select_from_convenient_plans_more || 
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_confirm_plan_change ||
								pg_make_combo  || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_choose_your_plan_1 ||
								pg_choose_your_plan_more ||
								pg_cvv2 || 
								pg_enter_new_password ||
								pg_enter_billing_info_w_errors || 
								pg_enter_billing_info_no_errors || 
								pg_forgot_password ||
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors ||
								pg_setup_your_account 
										
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_contact
								
							){
								length = 'long';
							}
						
					// landscape
					} else if (orientation3 == 'landscape') {
							
							// normal (non-scrolling)
							if (
								pg_get_started ||
								pg_choose_username_password || 
								pg_select_from_convenient_plans_1 || 
								pg_select_from_convenient_plans_more ||
								pg_one_great_service || 
								pg_creating_account || 
								pg_check_email || 
								pg_email_resent || 
								pg_email_confirmation_code || 
								pg_success_free || 
								pg_special_mobile_offer || 
								pg_begun_trial || 
								pg_connect_often || 
								pg_success_free_boingo || 
								pg_confirm_plan_change || 
								pg_make_combo || 
								pg_pricing_summary || 
								pg_pricing_summary_aircell || 
								pg_choose_your_plan_1 || 
								pg_choose_your_plan_more ||
								pg_cvv2 || 
								pg_enter_new_password || 
								pg_enter_billing_info_w_errors || 
								pg_enter_billing_info_no_errors ||
								pg_forgot_password || 
								pg_enter_new_password_w_errors ||
								pg_forgot_password_w_errors							
							) {
								length = 'normal';
								
							// long (scrolling)
							} else if (
								pg_setup_your_account || 
								pg_contact
							){
								length = 'long';
							}
						
					}	
			
		}
	
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	} else if ((/ipad/i).test(navigator.userAgent)) {
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
			
		// ipad portrait
		if ( orientation3 == 'portrait' ) {
		
				// normal (non-scrolling)
				if (
					pg_get_started ||
					pg_choose_username_password || 
					pg_select_from_convenient_plans_1 ||
					pg_select_from_convenient_plans_more || 
					pg_one_great_service || 
					pg_creating_account || 
					pg_check_email || 
					pg_email_resent || 
					pg_email_confirmation_code || 
					pg_success_free || 
					pg_special_mobile_offer || 
					pg_begun_trial || 
					pg_connect_often || 
					pg_success_free_boingo || 
					pg_confirm_plan_change ||
					pg_make_combo  || 
					pg_pricing_summary || 

					pg_pricing_summary_aircell || 
					pg_choose_your_plan_1 ||
					pg_choose_your_plan_more ||
					pg_cvv2 || 
					pg_enter_new_password ||
					pg_enter_billing_info_w_errors || 
					pg_enter_billing_info_no_errors || 
					pg_forgot_password ||
					pg_enter_new_password_w_errors ||
					pg_forgot_password_w_errors
					
				) {
					length = 'normal';
					
				// long (scrolling)
				} else if(
					pg_contact || 
					pg_setup_your_account 
				){
					length = 'long';
				}
		
		// ipad landscape
		} else {
			
				// normal (non-scrolling)
				if (
					pg_get_started ||
					pg_choose_username_password || 
					pg_select_from_convenient_plans_1 || 
					pg_select_from_convenient_plans_more ||
					pg_one_great_service || 
					pg_creating_account || 
					pg_check_email || 
					pg_email_resent || 
					pg_email_confirmation_code || 
					pg_success_free || 
					pg_special_mobile_offer || 
					pg_begun_trial || 
					pg_connect_often || 
					pg_success_free_boingo || 
					pg_confirm_plan_change || 
					pg_make_combo || 
					pg_pricing_summary || 
					pg_pricing_summary_aircell || 
					pg_choose_your_plan_1 || 
					pg_choose_your_plan_more ||
					pg_cvv2 || 
					pg_enter_new_password || 
					pg_enter_billing_info_w_errors || 
					pg_enter_billing_info_no_errors ||
					pg_forgot_password || 
					pg_enter_new_password_w_errors ||
					pg_forgot_password_w_errors
					
				) {
					length = 'normal';
					
				// long (scrolling)
				} else if(
					pg_setup_your_account || 
					pg_contact
				){
					length = 'long';
				}
			
		}
		
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	} else { /* pc/mac */
	/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

			// normal (non-scrolling)
			if (
				pg_get_started || 
				pg_choose_username_password || 
				pg_one_great_service || 
				pg_creating_account || 
				pg_check_email || 
				pg_email_resent ||
				pg_email_confirmation_code || 
				pg_success_free || 
				pg_special_mobile_offer ||
				pg_begun_trial || 
				pg_connect_often || 
				pg_success_free_boingo || 
				pg_pricing_summary || 
				pg_pricing_summary_aircell || 
				pg_make_combo || 
				pg_enter_new_password ||
				pg_enter_new_password_w_errors || 
				pg_forgot_password || 
				pg_forgot_password_w_errors ||
				pg_forgot_password || 
				pg_confirm_plan_change || 
				pg_choose_your_plan_1 || 
				pg_select_from_convenient_plans_1 || 
				pg_enter_billing_info_no_errors	
			) {
				length = 'normal';
				
				/* if page is normal, remove vertical scroll */
				$('body').css({"overflow-x":"hidden","overflow-y":"hidden"});
				
			// long (scrolling)
			} else if(
				pg_choose_your_plan_more || 
				pg_select_from_convenient_plans_more || 
				pg_enter_billing_info_w_errors ||
				pg_setup_your_account || 
				pg_contact || 
				pg_cvv2 
			){
				length = 'long';
			}

	}
	
return length;
	
} // end of function identifyPageLength

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function identifyButtons(){
	
	var buttons = '';
	
	// 2 buttons
	if (
		($('a.submitBtn').length==1) && ($('button.submitBtn').length==1) ||
		 ($('button').length==2) ||
		 ($('a.submitBtn').length==1) && ($('button.submitBtn-disabled').length==1) /*one off case for email confirmation resent page*/
		
		){
		buttons = 2;
	// 1 button
	} else if (
		
		($('a.submitBtn').length==1 && $('button.submitBtn').length==0) ||
		$('button.submitBtn').length==1 ||
		$('ul li a').length
		
		){
		buttons = 1;
	// no buttons	
	} else {
		buttons = 0;	
	}
	
	return buttons;
} // end of identifyButtons()

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function btnContainerPlacement(){

	// step 1: detect device (iphone | android | ipad | pc | mac)
	// step 2: detect orientation (portrait | landscape)
	// step 3: detect page height (normal/no scroll | long/scroll)
	// step 4: detect number of buttons (one | two)
	
	// == then take appropriate action
	
	var device 			= identifyDevice();
	var orientation		= orientation3;
	var pageLength 		= identifyPageLength();
	var buttons 		= identifyButtons();
	
	addBtnContainers();
	
	// label buttons for top/bottom, left/right placement
	// Action button labels that are 1st (vertically topmost) in hierarchy
	var arrActionBtn = new Array(
		'Continue', 'CONTINUE', 'NEXT', 'Next', 'SUBMIT', 'Submit', 'Change Plan', 'Confirm', 'Log In', 'Retry Login', 'Retry', 'Reset Password', 'Connect', 'Add Device'
	);
	
	// Non-Action button labels that will vertically be stacked (2nd)	
	var arrNonActionBtn = new Array(
		'BACK', 'Back' , 'No Thanks', 'Cancel', 'Contact Us', 'Close'
	);
	
	for (i in arrActionBtn){
			$('span:contains(' + arrActionBtn[i] + ')').parent().addClass('btnPrimary');
	}
	
	for (j in arrNonActionBtn){
			$('span:contains(' + arrNonActionBtn[j] + ')').parent().addClass('btnSecondary');
	}
	
	// one off cases for button placement, switching stacking order
	
	if ( $('div.powerUserReachedMax').length ) {
		var thisBtnSecondary = $('.btnSecondary');	
		thisBtnSecondary.eq(0).toggleClass('btnSecondary btnPrimary','add');
	}
	
	
	// removing class first to get rid of previous value (orientation change)
	$('.outerContainer').parent().removeAttr('class').addClass(device+'_'+orientation+'_'+pageLength+'_'+buttons);
	

	if ($('div[name=boingoDevTest]').length){
		$('div[name=boingoDevTest]').remove();
	}

	// Placing test/debug parameters on the page, remove the html <!-- --> from around the div to display on page (for trouble shooting)

	/*
	$('body').prepend(
		' <div name="boingoDevTest" style="position:absolute;top=0;right=0;background-color:blue;color:white;padding:15px;font-size:11px;">' + 
		 device + ' ' + orientation + ' ' + pageLength + ' ' + buttons + '<br>' + 
		 '----- Javascript ------------------------------------ <br>' +
		 '- availWidth: ' + screen.availWidth + '<br>' +
		 '- availHeight: ' + screen.availHeight +  '<br>' + 
		 '- screen.width: ' + screen.width + '<br>' +
		 '- screen.height: ' + screen.height + '<br>' + 
		 '- window.outerWidth: ' + window.outerWidth + '<br>' +
		 '- window.outerHeight: ' + window.outerHeight + '<br>' +
		 '- window.orientation: ' + 'orientation script' + '<br>' +
		 '----- Wifinder Client ------------------------------- <br>' +
		 '- (android only) width: ' + androidWidth + '<br>' +
		 '- (android only) height: ' + androidHeight + '<br>' +
		 '- orientation: ' + orientation3 + '<br>' +
		 '- device size (android only): ' + androidDeviceSize +
		 '<p></p>' + 
		 '</div>' +
		 '<p style="position:absolute;top:35px;left:10px;background:black;color:red;"><a href="javascript:history.back(-1);">home</a></p>' + 
		 '<p style="position:absolute;top:35px;right:10px;background:black;color:red;"><a href="javascript:window.location.reload();">refresh</a></p>'
		
	);
	*/


} // end of function btnContainerPlacement()

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function extraPadding(){
// This function inserts an extra div called .inner so we set padding without disrupting other widths, it's also cross browser friendly
	if ( $('div#planSelection').length ) {
		 $('div#planSelection').wrapInner('<div class="inner">');
	}
	
	if ( $('form#memberUpgrade').length ) {
		 $('div.container-scm').wrap('<div class="inner">');
	}
	
	if ( $('form#changePlan').length ) {
		 //$('div.container-scm').addClass("inner");
		 $('div.container-scm').wrapInner('<div class="inner">');
	}
	
	if ( $('div#accountData').length ) {
		 $('div#accountData').wrapInner('<div class="inner">');
	}
	
	if ( $('div#countrySelection').length ) {

		 $('div#countrySelection').wrapInner('<div class="inner">');
	}
	
	if ( $('div#memberVerificationEnterCode').length ) {
		 $('div#memberVerificationEnterCode').wrapInner('<div class="inner">');
	}

	if ( $('div#memberVerificationResend').length ) {
		 $('div#memberVerificationResend').wrapInner('<div class="inner">');
	}
	
	if ( $('div#memberVerification').length ) {
		 $('div#memberVerification').wrapInner('<div class="inner">');
	}
	
	if ( $('div#accountCreationSpinner').length ) {
		 $('div#accountCreationSpinner').wrapInner('<div class="inner">');
	}

	if ( $('div#memberAccountData').length ) {
		 $('div#memberAccountData').wrapInner('<div class="inner">');
	}
	
	if ( $('form#forgotPassword').length || $('form#resetPassword').length) {
		 $('div.container-scm').wrapInner('<div class="inner">');
	}
	
	if ( $('div#contact-info').length ) {
		 $('div#contact-info').parent().wrapInner('<div class="inner">');
	}
	
	if ( $('div#cvvimage').length ) {
		$('div.container').wrapInner('<div class="inner">');
	}
	
	if ( $('body[onload*="setPassword"]').length ) {
		$('div.container-scm').wrapInner('<div class="inner">');
	}
	
	if ( $('div#pricing').length ) {
		$('div#pricing').wrapInner('<div class="inner">');
	}

} // end of function extrapadding

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function mouseOvers(target){
	
	// call: mouseOvers('.submitBtn')
	// just update the 3 variables below with the proper class names
	// for the rest of the script to work
	var mouseoverClass = 'submitBtnHover'; // mouseover
	var mouseoutClass = 'mouseleave'; // mouseout
	var mouseclickClass = 'submitBtnDown'; // click
	
	// remove onmouseclick class on doc load (if it's there)
	$(target).removeClass(mouseclickClass);
	
	// click
	$(target).mousedown(function(){
		$(this).addClass(mouseclickClass);
		$(this).removeClass(mouseoverClass);
		$(this).removeClass(mouseoutClass);
	})
	
	// onmouseenter
	$(target).mouseenter(function(){
		// $(this).addClass(mouseclickClass);
		$(this).addClass(mouseoverClass);
		$(this).removeClass(mouseoutClass);
	})

	// onmouseleave
	$(target).mouseleave(function(){
		$(this).addClass(mouseoutClass);
		$(this).removeClass(mouseoverClass);
		$(this).removeClass(mouseclickClass); // you can remove this to make down state stick
	})
	
	
}

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */

function generalOneOffCases(){
// To be used sparingly, call this function for each device.
	
	// offline help page
	$("h2:contains('Connect with us!')").css('width','175px');
	$("h2:contains('Connect with us!')").css('margin-bottom','10px');
	
	/*if($("h3:contains('Your Boingo Trial Has Begun!')").length){
		$('div#container-sc p').css({'width':'310px','text-align':'center'});
	}*/
	
	/*
	if ($('div#success').length) {
		$('div#container-sc p').css({'width':'310px','text-align':'center'});
	}
	*/
	
	$("div#left_content_area_sub").removeAttr('style');

	// centering the spinner
	$('div img[src*=Spinner]').addClass('spinnerDiv');
	
	if ($("h2:contains('PLAN CHANGE SUCCESS')").length){
		$("h2:contains('PLAN CHANGE SUCCESS')").replaceWith('<h5 class="titleBubble">PLAN CHANGE SUCCESS</h5>');
	}
	
	// Please check your email, case for really long username
	
	if ( ($('div#memberVerification').length || $('div#memberVerificationResend').length || $('div#memberVerificationEnterCode').length) && $('b')) {
		$('b').addClass('longwordbreak');
	}
	

} // end of function generalOneOffCases()

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */


/* Create functions above this line -------------------------------------------------------------------------------------------------------- */

/* START */ $(document).ready(function(){ /* of jquery mouse functions */

/* if iphone +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
if ( (/iphone/i).test(navigator.userAgent) ) {
	
	if ($('form#changePlan').length) {
		$('div.upperrightcol').removeClass('upperrightcol');
	}
	
	mouseOvers('.submitBtn');
	extraPadding();
	btnContainerPlacement();
	
}

/* if ipad  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else if ( (/ipad/i).test(navigator.userAgent) ) {

	extraPadding();
	btnContainerPlacement();
	
	if ($('div#accountData').length) {
		$("p:contains('Month')").attr('id','cardExprMonthDesc');
	}
	
}

/* if android  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else if ( (/android/i).test(navigator.userAgent) ) {
	//$('head').append('<link href="/shared/css/membership-android-lrg.css" rel="stylesheet" type="text/css" id="androidDeviceSpecificStyleSheet">');
	extraPadding();
	btnContainerPlacement();
	
}

/* if pc/mac ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else {
	//alertSize();
	mouseOvers('.submitBtn');
	//buttonStacker();
	extraPadding();
	btnContainerPlacement();
	
	// PC + MAC oneoffs +++++++++++++++++++++++++++++++++++++++++++++++++++++

	// cvv2 header
	if ( $('div#cvvimage').length ) {
		$('div.container').addClass('cvv2');
	}
	
	if ($('div#success').length) {
		$('div#container-sc p').css({'width':'310px','text-align':'center'});
	}
	
	// MAC only oneoffs +++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	if ((/mac/i).test(navigator.userAgent)) {
		
		// PLAN CHANGE SUCCESS
		if ($("h2:contains('PLAN CHANGE SUCCESS')").length){
			$("h2:contains('PLAN CHANGE SUCCESS')").replaceWith('<h5 class="titleBubble">PLAN CHANGE SUCCESS</h5>');
			$('p').css({'width':'300px','text-align':'center'});
		}
		
	}
	
	// PC only oneoffs ++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	// pc only one offs
	if ( (/msie/i).test(navigator.userAgent) ) {
		
		// PLAN CHANGE SUCCESS
		if ($("h2:contains('PLAN CHANGE SUCCESS')").length){
			$("h2:contains('PLAN CHANGE SUCCESS')").replaceWith('<h5 class="titleBubble">PLAN CHANGE SUCCESS</h5>');
			$('p').css({'padding-left':'60px','width':'325px','text-align':'center'});
		}
		
	}
	
}

/* Call for all environments ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

generalOneOffCases();
	
/* END */ }) /* of jquery document ready function */

/* Mouseovers - end ****************************************************************************************** */