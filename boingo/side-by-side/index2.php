<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>showing all membership pages</title>
<?php
/*
$arrPages = array('start.html','plans.html','offline-offer-page.html','plans-radio.html','uc10-1.html','uc10-2.html','uc10-3.html','uc10-4.html','uc10-5.html','uc10-6.html','uc11-1.html','uc11-2.html','uc11-2b.html','uc11-3.html','uc12-1.html','uc12-2.html','uc12-2b.html','uc12-2c.html','uc12-3.html','uc12-4.html','uc20-1.html','uc20-2.html','uc20-3.html','uc22-1.html','uc22-2.html','bms-pricing-chart.html','bms-price-case1.html','cc-soft-decline.html','exception-message.html','invalid-credentials-noreset.html','invalid-credentials-reset.html','activate-account.html','account-good-standing.html','invalid-account.html','selfcare-message1.html','selfcare-message2.html','email-verification.html','new_contact.html','new_pricing_summary.html','new_additional_charges.html','exclusion-list.html','error.html','cvv2.htm','resetPassword-new.htm','forgotPassword-new.htm','password-change-successful.html','http://10.1.2.131:8888/shared/contact/');
*/

$arrPages = array(
'start.html','plans.html','plans-radio.html','uc10-1.html','uc10-2.html','uc10-3.html','uc10-3b.html','uc10-4.html','uc10-5.html','uc10-6.html','uc11-1.html','uc11-2.html','uc11-2b.html','uc11-3.html','uc12-1.html','uc12-2.html','uc12-2b.html','uc12-2c.html','uc12-3.html','uc12-4.html','uc20-1.html','uc20-2.html','uc20-3.html','uc22-1.html','uc22-2.html','http://10.1.2.131:8888/shared/bms/?messageId=loadPricingMessage&currencyCode=GBP&platform=ios','http://10.1.2.131:8888/shared/bms/?messageId=loadPricingMessage&currencyCode=GBP&platform=ios&price=343','http://10.1.2.131:8888/shared/bms/?messageId=loadCcSoftDeclineMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadAccountGoodStandingMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadInvalidCredentialsMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadInvalidCredentialsMessage&canResetPassword=true','http://10.1.2.131:8888/shared/bms/?messageId=loadActivateAccountMessage&username=bshields%40boingo.com&hashCode=39339','http://10.1.2.131:8888/shared/bms/?messageId=loadExceptionMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadInvalidAccountMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadSelfcareMessage&offerBundledPlan=true','http://10.1.2.131:8888/shared/bms/?messageId=loadSelfcareMessage','http://10.1.2.131:8888/shared/bms/?messageId=loadPricingChartMessage&postCredentials=false&apmac=00%3A0C%3A42%3A2B%3AA5%3AD0&brand=goboingort&clientid=bsn&clientmac=00-16-EA-F0-87-F8&lang=en&locale=en-US%AE=10012243229136&SSID=concourse&username=dev001password%3Dboingo&hpe=100.0&protocol=2','offline-offer-page.html','http://10.1.2.131:8888/shared/email_verification/?username=bshields%40boingo.com&hashCode=39339','http://10.1.2.131:8888/shared/contact/','http://10.1.2.131:8888/shared/additional_charges/','http://10.1.2.131:8888/shared/exclusions/','error.html','cvv2.htm','resetPassword-new.htm','forgotPassword-new.htm','password-change-successful.html'
);

$arrPagesCount = count($arrPages);

// detect useragent and then assign dimensions to the iframes accordingly for each device
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$iframeWidth = '';
$iframeHeight = '';

if (preg_match("/msie/i", $userAgent) || preg_match("/firefox/i", $userAgent)) {
	$iframeWidth = 396;
	$iframeHeight = 450;
} else if (preg_match("/macintosh/i", $userAgent)) {
	$iframeWidth = 396;
	$iframeHeight = 450;
// android +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
} else if (preg_match("/android/i", $userAgent)) {
	if (!isset($_GET['o'])) {
		$iframeWidth = 320;
		$iframeHeight = 526;
	} else if ($_GET['o']=='portrait'){
		$iframeWidth = 320;
		$iframeHeight = 526;
	} else if ($_GET['o']=='landscape') {
		$iframeWidth = 526;
		$iframeHeight = 320;	
	}
// iphone +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
} else if (preg_match("/iphone/i", $userAgent)) {
	$iframeWidth = 336;
	$iframeHeight = 480;
// ipad +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
} else if (preg_match("/ipad/i", $userAgent)) {
	if (!isset($_GET['o'])) {
		$iframeWidth = 796;
		$iframeHeight = 1024;	
	} else if ($_GET['o']=='portrait') {
		$iframeWidth = 796;
		$iframeHeight = 1024;
	} else if ($_GET['o']=='landscape') {
		$iframeWidth = 1024;
		$iframeHeight = 796;
	}
}

?>

<style type="text/css">
.preview {
float:left;
margin-right:25px;
width:<?php echo $iframeWidth; ?>px;
}

iframe {
border:1px solid black;	
}
p.title {
padding-left:15px;
}
</style>

</head>
<body style="width:<?php echo ($iframeWidth * $arrPagesCount) + ($arrPagesCount * 30);?>px;">
<h1>Showing all membership files</h1>
<div style="background-color:#ccc;font-size:9px;padding:3px;"><?php echo $userAgent; ?></div>
<p>Using iframes to load most of the html dumps for membership so we can see a flow of documents in a story-board style outline.</p>

<?php if (preg_match("/android/i", $userAgent) || preg_match("/ipad/i", $userAgent)) {?>
<p><a href="?o=portrait">Portrait</a> | <a href="?o=landscape">Landscape</a></p>
<?php } ?>

<?php foreach($arrPages as $page){?>
<div class="preview">
<iframe name="FRAMENAME" src="<?php echo $page; ?>" width="<?php echo $iframeWidth; ?>" height="<?php echo $iframeHeight; ?>" frameborder="0" scrolling="yes"></iframe>
<p class="title"><a href="<?php echo $page; ?>" target="_blank"><?php echo $page; ?></a></p>
</div>
<?php } ?>
</body>
</html>