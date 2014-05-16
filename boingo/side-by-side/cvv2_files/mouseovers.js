
//var orientation3 = 'not_set_yet';
var orientation3 = 'portrait';

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
			
			/* android_452 ----------------------------------- */
			else if (device == 'android_h452') {
				
				// Special Boingo Mobile Offer! text alignment (unset styles)			
				if ($('div#special-offer-bkgd').length) {
					$('h1, #bms-copy').css({'width' : '270px','margin-left' : 'auto'});
				}
				
			} // end of android_h452
				
		
		/* landscape ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
		} else if (orientation == 'landscape'){

			btnContainerPlacement();
			
			// One offs landscape
			
			/* ipad ------------------------------------------ */
			if (device == 'ipad') {
				
				// Special Boingo Mobile Offer! text alignment (set styles)
				if ($('div#special-offer-bkgd').length) {
					$('h1, #bms-copy').css({'width' : '525px','margin-left' : '375px'});
				}
				
			} // end of ipad
			
			/* android_452 ----------------------------------- */
			else if (device == 'android_h452') {
				
				// Special Boingo Mobile Offer! text alignment (set styles)
				if ($('div#special-offer-bkgd').length) {
					$('h1, #bms-copy').css({'width' : '230px','margin-left' : '210px'});
				}
				
			} // end of android_h452
			
		} // end of landscape
			
} // end of function myOC (my orientation change)

// this will not be called on devices with only portrait orientation (iphone)
function boingoWebViewOnOrientationChange(o){
		
	if(o == 'portrait'){
		//alert('ipad/iphone script says portrait orientationchange');
		orientation3 = 'portrait';
	} else {
		//alert('ipad/iphone script says landscape orientationchange');
		orientation3 = 'landscape';
	}

	myOC();
	
}

function boingoWebViewDidFinishLoad(o){
	
	if(o == 'portrait'){
		//alert('ipad/iphone script says portrait orientationchange');
		orientation3 = 'portrait';
	} else {
		//alert('ipad/iphone script says landscape orientationchange');
		orientation3 = 'landscape';
	}
	
	myOC();
}

function addBtnContainers(){
	
	// if these divs exist do nothing other create them (so it doesn't fire again for orientation change)
	if ( $('div.innerContainer').length || $('div.outerContainer').length ) {
		// do nothing
	} else {
		
			if ( ($('button').has('span')).length ){
				container = ($('button').has('span')).first().parent().wrapInner('<div class="innerContainer">').wrapInner('<div class="outerContainer">');
			} else if (($('a').has('span')).length) {
				container = $('a').has('span').parent().wrapInner('<div class="innerContainer">').wrapInner('<div class="outerContainer">');
			}		
	}
	
} // end of function addBtnContainers()

function identifyOrientation(){

	if (orientation3 == 'portrait'){
		actualOrientation = 'portrait';
	} else {
		actualOrientation = 'landscape';
	}
	
	if ($('div.portrait').length){
		$('div.portrait:first-child').unwrap();
	}
	
	if ($('div.landscape').length){
		$('div.landscape:first-child').unwrap();
	}
	
	$('body').wrapInner('<div class="' + actualOrientation  + '">');
	
	return actualOrientation;

} // end of function identifyOrientation()

function identifyDevice(){
	
	if ((/iphone/i).test(navigator.userAgent)){
		device = 'iphone';	
	} else if ((/android/i).test(navigator.userAgent)) {
		
		// checking height/width for same value because of orientation change
		if ( (/nexus/i).test(navigator.userAgent) ) {
			device = 'android_h452';
		} else if(screen.height <= 854 || screen.width <= 854) {
			device = 'android_h854';
		} else {
			// set default (smaller screen droid)
			device = 'android_h452';
		}

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
	
function identifyPageLength(){
	
	// the same page may be scrollable or not scrollable on different devices
	// so setting up this system to manually label each page short or long per device
	
var length = '';
	
	if ((/iphone/i).test(navigator.userAgent)){
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
			// normal: pages with following 'hooks' are considered 'normal' in length (non-scrolling)
			if (
				$('div#getStarted').length ||
				($('div#planSelection').length && $('form#command').length==0) || /* One great service, thousands of hotspots  */
				$('div#accountCreationSpinner').length || /* Creating your account ... */
				$('div#memberVerification').length || /* Please check your email */
				$('div#memberVerificationResend').length || /* Email confirmation resent */
				$('div#memberVerificationEnterCode').length || /* Please check your email */
				$('div#memberClientFinishPageMember').length || /* Success (free) end of uc10 */
				$('div#special-offer-bkgd').length || /* Special Boingo Mobile Offer */
				$('div#success').length || /* Your Boingo trial has begun! */
				$('div#countrySelection').length || /* Where do you connect most often */
				$('div#memberClientFinishPageRetail').length || /* Success (free and Boingo) end of uc12 */
				$('div#pricing-container').length || /* pricing summary */
				$('div#bms-bkgd').length /* Make it a combo! */
				
			) {
				length = 'normal';
				
			// long: pages will following 'hooks' are considered 'long' in length (scrolling)
			} else if(
				$('div#memberAccountData').length || /* Choose a username and password*/
				$('form#memberUpgrade').length || /* Please enter your billing info */
				($('div#planSelection').length && $('form#command').length) || /* Select from these convenient plans */
				$('div#accountData').length || /* Setup your account */
				$('form#changePlan').length || /* Please confirm your plan change */
				$('div#contact-info').length /* contact page */
			){
				length = 'long';
			}
		
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	} else if ((/android/i).test(navigator.userAgent)) {
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					
						// portrait
						if ( orientation3 == 'portrait' ) {
							
								if (
									$('div#getStarted').length ||
									$('div#memberAccountData').length || /* Choose a username and password*/
									($('div#planSelection').length && $('form#command').length==0) || /* One great service, thousands of hotspots  */
									$('div#accountCreationSpinner').length || /* Creating your account ... */
									$('div#memberVerification').length || /* Please check your email */
									$('div#memberVerificationResend').length || /* Email confirmation resent */
									$('div#memberVerificationEnterCode').length || /* Please check your email */
									$('div#memberClientFinishPageMember').length || /* Success (free) end of uc10 */
									$('div#special-offer-bkgd').length || /* Special Boingo Mobile Offer */
									$('div#success').length || /* Your Boingo trial has begun! */
									$('div#countrySelection').length || /* Where do you connect most often */
									$('div#memberClientFinishPageRetail').length || /* Success (free and Boingo) end of uc12 */
									$('div#bms-bkgd').length || /* Make it a combo! */
									$('form#forgotPassword').length || /* forgot password */
									$('div#pricing-container').length /* pricing summary */
									
								) {
									length = 'normal';
									
								// long: pages will following 'hooks' are considered 'long' in length (scrolling)
								} else if (
									($('form#memberUpgrade').length && $('form#memberUpgrade[action~=billingCollect.app]')) || /* Please enter your billing info */
									$('form#changePlan').length || /* Please confirm your plan change */
									($('div#planSelection').length && $('form#command').length) || /* Select from these convenient plans */
									$('div#accountData').length || /* Setup your account */
									$('div#contact-info').length /* contact page*/
								){
									length = 'long';
								}
							
						// landscape
						} else if (orientation3 == 'landscape') {
							
								if (
									$('div#getStarted').length ||
									($('div#planSelection').length && $('form#command').length==0) || /* One great service, thousands of hotspots  */
									$('div#accountCreationSpinner').length || /* Creating your account ... */
									$('div#memberVerification').length || /* Please check your email */
									$('div#memberVerificationResend').length || /* Email confirmation resent */
									$('div#memberVerificationEnterCode').length || /* Please check your email */
									$('div#memberClientFinishPageMember').length || /* Success (free) end of uc10 */
									$('div#special-offer-bkgd').length || /* Special Boingo Mobile Offer */
									$('div#success').length || /* Your Boingo trial has begun! */
									$('div#countrySelection').length || /* Where do you connect most often */
									$('div#memberClientFinishPageRetail').length || /* Success (free and Boingo) end of uc12 */
									$('div#bms-bkgd').length /* Make it a combo! */
									
								) {
									length = 'normal';
									
								// long: pages will following 'hooks' are considered 'long' in length (scrolling)
								} else if (
									($('form#memberUpgrade').length && $('form#memberUpgrade[action~=billingCollect.app]')) || /* Please enter your billing info */
									$('form#changePlan').length || /* Please confirm your plan change */
									($('div#planSelection').length && $('form#command').length) || /* Select from these convenient plans */
									$('form#forgotPassword').length || /* forgot password */
									$('div#memberAccountData').length || /* Choose a username and password*/
									$('div#accountData').length || /* Setup your account */
									$('div#contact-info').length || /* contact page*/
									$('div#pricing-container').length /* pricing summary */
								){
									length = 'long';
								}
							
						}	
	
	
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	} else if ((/ipad/i).test(navigator.userAgent)) {
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			
			// ipad portrait
			if ( orientation3 == 'portrait' ) {
			
						// normal: pages with following 'hooks' are considered 'normal' in length (non-scrolling)
						if (
							$('div#getStarted').length ||
							$('div#memberAccountData').length || /* Choose a username and password*/
							($('div#planSelection').length && $('form#command').length) || /* Select from these convenient plans */
							($('div#planSelection').length && $('form#command').length==0) || /* One great service, thousands of hotspots  */
							$('div#accountCreationSpinner').length || /* Creating your account ... */
							$('div#memberVerification').length || /* Please check your email */
							$('div#memberVerificationResend').length || /* Email confirmation resent */
							$('div#memberVerificationEnterCode').length || /* Please check your email */
							$('div#memberClientFinishPageMember').length || /* Success (free) end of uc10 */
							$('div#special-offer-bkgd').length || /* Special Boingo Mobile Offer */
							$('div#success').length || /* Your Boingo trial has begun! */
							$('div#countrySelection').length || /* Where do you connect most often */
							$('div#memberClientFinishPageRetail').length || /* Success (free and Boingo) end of uc12 */
							$('form#changePlan').length || /* Please confirm your plan change */
							$('div#bms-bkgd').length  || /* Make it a combo! */
							$('div#contact-info').length || /* contact page */
							$('div#pricing-container').length || /* pricing summary */
							($('form#memberUpgrade').length && $('form#memberUpgrade[action~=selfcare]')) /* Please choose your plan */
							
						) {
							length = 'normal';
							
						// long: pages will following 'hooks' are considered 'long' in length (scrolling)
						} else if(
							($('form#memberUpgrade').length && $('form#memberUpgrade[action~=billingCollect.app]')) || /* Please enter your billing info */
							$('div#accountData').length /* Setup your account */
						){
							length = 'long';
						}
			
			
			// ipad landscape
			} else {
				
						// normal: pages with following 'hooks' are considered 'normal' in length (non-scrolling)
						if (
							$('div#getStarted').length ||
							$('div#memberAccountData').length || /* Choose a username and password*/
							($('div#planSelection').length && $('form#command').length) || /* Select from these convenient plans */
							($('div#planSelection').length && $('form#command').length==0) || /* One great service, thousands of hotspots  */
							$('div#accountCreationSpinner').length || /* Creating your account ... */
							$('div#memberVerification').length || /* Please check your email */
							$('div#memberVerificationResend').length || /* Email confirmation resent */
							$('div#memberVerificationEnterCode').length || /* Please check your email */
							$('div#memberClientFinishPageMember').length || /* Success (free) end of uc10 */
							$('div#special-offer-bkgd').length || /* Special Boingo Mobile Offer */
							$('div#success').length || /* Your Boingo trial has begun! */
							$('div#countrySelection').length || /* Where do you connect most often */
							$('div#memberClientFinishPageRetail').length || /* Success (free and Boingo) end of uc12 */
							$('form#changePlan').length || /* Please confirm your plan change */
							$('div#bms-bkgd').length  || /* Make it a combo! */
							$('div#pricing-container').length || /* pricing summary */
							($('form#memberUpgrade').length && $('form#memberUpgrade[action~=selfcare]')) /* Please choose your plan */
							
						) {
							length = 'normal';
							
						// long: pages will following 'hooks' are considered 'long' in length (scrolling)
						} else if(
							($('form#memberUpgrade').length && $('form#memberUpgrade[action~=billingCollect.app]')) || /* Please enter your billing info */
							$('div#accountData').length || /* Setup your account */
							$('div#contact-info').length /* contact page*/
						){
							length = 'long';
						}
				
			}
		
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	} else { /* pc/mac */
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	}
	
return length;
	
} // end of function identifyPageLength

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
		'Continue', 'CONTINUE', 'NEXT', 'Next', 'SUBMIT', 'Change Plan', 'Confirm', 'Log In', 'Retry Login', 'Reset Password'
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
	
	// removing class first to get rid of previous value (orientation change)
	$('.outerContainer').parent().removeAttr('class').addClass(device+'_'+orientation+'_'+pageLength+'_'+buttons);
	
	// device: iphone
	if (device == 'iphone') {
		
		/* ********************** if iphone: start ************************************************************************** */
		
		/* if orientation: portrait */
		if (orientation == 'portrait') {
			
			/* if page: normal */
			if(pageLength == 'normal') {
			
				/* if number of buttons: 1 */
				if (buttons == 1) {
					
					// placeholder for future actions
				
				/* if number of buttons: 2 */	
				} else if (buttons == 2) {
					
					// placeholder for future actions
					
				}
			
			/* if page: long */	
			} else if (pageLength == 'long'){
				
				/* if number of buttons: 1 */
				if (buttons == 1) {
					
					// placeholder for future actions
				
				/* if number of buttons: 2 */	
				} else if (buttons == 2) {
					
					// placeholder for future actions
					
				}
				
			}			
		
		/* if orientation: landscape */	
		} else if (orientation == 'landscape') {
			
		}
		/* ********************** if iphone: end *************************** */
		
	} else if (device == 'lalalala1') {
		// do nothing yet
	} else if (device == 'lalalala2') {
		// do nothing yet
	} else if (device == 'lalalala3') {
		// do nothing yet
	} else {
		// do nothing yet
	}

if ($('div[name=boingoDevTest]').length){
	$('div[name=boingoDevTest]').remove();
}

// Placing test/debug parameters on the page, remove the html <!-- --> from around the div to display on page (for trouble shooting)
$('body').prepend('<!-- <div name="boingoDevTest" style="position:absolute;top=0;right=0;background-color:blue;color:white;padding:5px;font-size:11px;">' + device + ' ' + orientation + ' ' + pageLength + ' ' + buttons + '<br /> ' + 'availHeight: ' + screen.availHeight + ' availWidth: ' + screen.availWidth +  '</div> -->');


} // end of function buttonStacker2()

function extraPadding(){
// This function inserts an extra div called .inner so we set padding without disrupting other widths, it's also cross browser friendly
	if ( $('div#planSelection').length ) {
		 $('div#planSelection').wrapInner('<div class="inner">');
	}
	
	if ( $('form#memberUpgrade').length ) {
		 $('div.container-scm').wrap('<div class="inner">');
	}
	
	if ( $('form#changePlan').length ) {
		 $('div.container-scm').addClass("inner");
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
	
	if ( $('form#forgotPassword').length ) {
		 $('div.container-scm').wrapInner('<div class="inner">');
	}
	
	if ( $('div#contact-info').length ) {
		 $('div#contact-info').parent().wrapInner('<div class="inner">');
	}

} // end of function extrapadding

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function bodyHeight(target){
	var target = "#left_content_area_sub";
	var height = document.body.clientHeight;
	var height = $(target).height();
	$(target).css('height', height + 'px');
	$(target).css('border-bottom','1px solid red');
	$(target).append('<p>' + target + ' height: ' + height + 'px</p>');
	//alert(height);
}

function alertSize() {
	var myWidth = 0;
	myHeight = 0;
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
	jqWindowHeight = $(window).height();
	jqDocumentHeight = $(document).height();
	
	var output='';
	output += 'Body width: ' + myWidth + '\n';
	output += 'Body Height: ' + myHeight + '\n';
	output += 'jq window height: ' + jqWindowHeight + '\n';
	output += 'jq document height: ' + jqDocumentHeight + '\n';
	alert(output);
}

function androidBtnPlacement(container){
	$(container).wrap('<div class="AndroidBtnContainer"/>').wrapInner('<div class="twoBtnContainerAndroid" />');
	$('.AndroidBtnContainer').css('top', ($('body').height() - $(container).height()) + 'px');
}

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

// To be used sparingly, call this function for each device.
function generalOneOffCases(){
	
	// "Forgot password page" replacing "Submit" button construction to be consistent with other pages
	if ( $('div.backbutton ul li a:contains("SUBMIT")').length==1 && ($('form[name=forgotPassword]').length || $('form[name=resetPassword]').length) ) {
	
		if ($('form[name=forgotPassword]').length)	{ var formName = 'forgotPassword';}
		if ($('form[name=resetPassword]').length)	{ var formName = 'resetPassword';}
	
	$('div.backbutton ul').remove();
	$('div.backbutton').removeClass('backbutton').addClass('backbutton2');
	$('div.backbutton2').append('<a id="backButton" name="backButton" class="submitBtn" href="javascript:document.' + formName + '.submit();"><span>SUBMIT</span></a>');
	}	
	
	// offline help page
	$("h2:contains('Connect with us!')").css('width','175px');
	$("h2:contains('Connect with us!')").css('margin-bottom','10px');
	$("h2:contains('Your Plan Change Was Successful')").replaceWith('<h5 class="titleBubble">Your Plan Change Was Successful</h5>');
	$("div#left_content_area_sub").removeAttr('style');

	// centering the spinner
	$('div img[src*=Spinner]').addClass('spinnerDiv');
	

} // end of function generalOneOffCases()

function buttonStacker(){

// Changing button stacking on pages with "action" and "non-action" buttons 

var btnContainer = new Array(
	'div[class~=backbutton2]',
	'div[class~=backbutton]',
	'div[class~=backButton]',
	'div[id~=bms-button-container]',
	'div[id~=price-button-container]',
	'div[id~=congrats-sbmt-cont]',
	'div[id~=congrats-nothanks]',
	'div[id~=button-container-cc]'
	);

for (x in btnContainer){
	var btnCode_button = btnContainer[x] + ' button';
	var btnCode_a = btnContainer[x] + ' a';
	var btnCode_button_span = btnCode_button[x] + ' span';
	var btnCode_a_span = btnCode_a[x] + ' span';
		
		// When 2 buttons
		if (
		// container and <button> and <a>
		($(btnContainer[x]).length && $(btnCode_button).length==1 && $(btnCode_a).length==1) ||
		// container and 2 buttons (no <a>'s)
		($(btnContainer[x]).length && $(btnCode_button).length==2) ||
		($('div.account_is_inactive a.submitBtn').length && $('div.account_is_inactive button.submitBtn-disabled').length)
		) {
		
			// Add a new div container with class=twoBtnContainer with position="relative"
			
				// if Android + form
				if ((/android/i).test(navigator.userAgent) && $('input[type!=hidden]').length) {
					androidBtnPlacement(btnContainer[x]);
				} else {
					$(btnContainer[x]).wrapInner('<div class="twoBtnContainer" />');
				}
			
			// Action button labels that are 1st (vertically topmost) in hierarchy
			var arrActionBtn = new Array(
				'Continue', 'CONTINUE', 'NEXT', 'Next', 'SUBMIT', 'Change Plan', 'Confirm', 'Log In', 'Retry Login', 'Reset Password'
			);
			
			// Non-Action button labels that will vertically be stacked (2nd)	
			var arrNonActionBtn = new Array(
				'BACK', 'Back' , 'No Thanks', 'Cancel', 'Contact Us', 'Close'
			);
			
			for (i in arrActionBtn){
					$('span:contains(' + arrActionBtn[i] + ')').parent().addClass('topPlacement');
			}
			
			for (j in arrNonActionBtn){
					$('span:contains(' + arrNonActionBtn[j] + ')').parent().addClass('bottomPlacement');
			}
	
	} // eof if (container + button)
	
	// if 1 button and pc/mac
	else if (
		// container and <button> and no a
		($(btnContainer[x]).length && $(btnCode_button).length==1 && $(btnCode_a).length==0) ||
		($(btnContainer[x]).length && $(btnCode_button).length==0 && $(btnCode_a).length==1)
		) {
			
			if (
				!(/ipad/i).test(navigator.userAgent) &&
				!(/iphone/i).test(navigator.userAgent) &&
				!(/android/i).test(navigator.userAgent)
			) {
				//$(btnContainer[x]).css("border","5px solid red");
				$(btnCode_button).css("margin-left","181px");
				$(btnCode_a).css("margin-left","181px");
			}
	}
	// end of 1 button and pc/mac
	
	// if ipad
	if ((/ipad/i).test(navigator.userAgent)) {
	
		if (
			($(btnContainer[x]).length && ($(btnCode_button).length==1 && $(btnCode_a).length==0)) ||
			($(btnContainer[x]).length && ($(btnCode_button).length==0 && $(btnCode_a).length==1)) ||
			$("a#startOverButton") || /* this is a one off, page has commented out button containers */
			$("button#continueButton-0")
			) {
				// there's a single button either a 'div > button > span' or a 'div > a > span' 
				$(btnCode_button).css('margin','0 auto 0 auto');
				$(btnCode_a).css('margin','0 auto 0 auto');
		}
		
		
		// some one off ipad issues
		
		$("div.formlabel:contains('*Confirmation Code')").removeClass('formlabel').addClass('formlabel-confirmationCode');
		
	} // end of if ipad
	
	// if Android + form + 1 button
	if ((/Android/i).test(navigator.userAgent) && $('input[type!=hidden]').length && $(btnCode_button).length==1 && $(btnCode_a).length==0) {
		androidBtnPlacement(btnContainer[x]);
	}

} // end of for loop
} // end of function


/* Create functions above this line -------------------------------------------------------------------------------------------------------- */

/* START */ $(document).ready(function(){ /* of jquery mouse functions */

/* if iphone +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
if ( (/iphone/i).test(navigator.userAgent) ) {
	
	if ($('form#changePlan').length) {
		$('div.upperrightcol').removeClass('upperrightcol');
	}
	
	extraPadding();
	btnContainerPlacement();
	
}

/* if ipad  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else if ( (/ipad/i).test(navigator.userAgent) ) {

	extraPadding();
	btnContainerPlacement();
	
}

/* if android  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else if ( (/android/i).test(navigator.userAgent) ) {
	
	extraPadding();
	btnContainerPlacement();
	
}

/* if pc/mac ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
else {
	//alertSize();
	mouseOvers('.submitBtn');
	buttonStacker();
	$(window).load(function(){
		// one off cases for pc/mac
		if ( $('form#changePlan').length ) {
			$('div.backbutton').removeClass('backbutton').addClass('backbutton2');
			$('div.backbutton').css("position","none!important");
		}
		
		// fixing button margin (test)
		if ( $('div#special-offer-bkgd').css('margin-left') == '-30px' ) {
			$('.twoBtnContainer').css('margin-left','30px');
		}
		
		if ( $('div#bms-bkgd').css('margin-left') == '-30px' ) {
			$('.twoBtnContainer').css('margin-left','30px');
		}
		
		
		// one off pc only
		
		if ( (/msie/i).test(navigator.userAgent) ) {
			//alert("ieieie");
			
			// Special Boingo Mobile Offer!
			if ( $('h1:contains["Special Boingo Mobile Offer!"]') ) {
				$('#bms-bkgd-container h1').css("margin-left","75px");
				$('#bms-copy').css("margin-left","58px");
			}
			
			// h1 top spacing on some bubble pages (example whoops, pricing chart page )
			if ( $("#bms-bkgd #bms-bkgd-container").length ) {
				$('h1').css("margin-top","15px");
			}
			
			// plan selection
			if ( $("div#hj-head-signup").length ) {
				$("div#planSelection").removeClass("container").addClass("container2");
			}
			
			// Select from these convenient plans (top font wrong color, style being overwritten somewhow)
			if ( $('div#planSelection').hasClass('container') ) {
				$('h2').css('color','#d52b1e');
			}
			
			// Your Boingo Trial Has Begun
			if ( $('h3:contains("Your Boingo Trial Has Begun!")').length ||
				 $('h5:contains("Your Plan Change Was Successful")').length 
				 ) {
				$('div.container-scm').removeClass('container-scm').addClass('container-scm2');
			}
			
			// Make it a Combo!
			if ( $("h1:contains['Make it a Combo!']").length ) {
				$('h1').css('margin-top','0');
			}
			
				
		}
		
		
	})
}

/* Call for all environments ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

//testing placing spinner on clicked button

/*
$('a span, button span').click(function(){
	$(this).addClass('spinnerOnButton');	
})
*/
generalOneOffCases();
	
/* END */ }); /* of jquery document ready function */  