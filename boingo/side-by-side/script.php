<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>script</title>
</head>

<body>

<?php

$arrFiles = array(
'start' => 'http://10.1.2.138:5700/shared/membership/',
'plans' => 'http://10.1.2.138:5700/shared/membership/index2.php?SCC=sdsd&platform=sdsd&brand=sdsds&bssid=sdsds&ssid=sdsds',
'uc10-1' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/1.htm',
'uc10-2' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/2.htm',
'uc10-3' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/3.htm',
'uc10-4' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/4.htm',
'uc10-5' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/5.htm',
'uc10-6' => 'http://10.1.2.138:5700/shared/membership/temp/UC10/6.htm',
'uc11-1' => 'http://10.1.2.138:5700/sales/special_offer/',
'uc11-2' => 'http://10.1.2.138:5700/shared/membership/temp/UC11/1.htm',
'uc11-3' => 'http://10.1.2.138:5700/shared/membership/temp/UC11/2.htm',
'uc12-1' => 'http://10.1.2.138:5700/shared/membership/temp/UC12/1.htm',
'uc12-2' => 'http://10.1.2.138:5700/shared/membership/temp/UC12/2.htm',
'uc12-3' => 'http://10.1.2.138:5700/shared/membership/temp/UC12/3.htm',
'uc12-4' => 'http://10.1.2.138:5700/shared/membership/temp/UC12/4.htm',
'uc20-1' => 'http://10.1.2.138:5700/shared/membership/temp/UC20/1.htm',
'uc20-2' => 'http://10.1.2.138:5700/shared/membership/temp/UC20/2.htm',
'uc20-3' => 'http://10.1.2.138:5700/shared/membership/temp/UC20/3.htm',
'uc22-1' => 'http://10.1.2.138:5700/shared/membership/temp/UC22/1.htm',
'uc22-2' => 'http://10.1.2.138:5700/shared/membership/temp/UC22/2.htm',
'bms-pricing-chart' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadPricingChartMessage&postCredentials=false&apmac=00%3A0C%3A42%3A2B%3AA5%3AD0&brand=goboingort&clientid=bsn&clientmac=00-16-EA-F0-87-F8&lang=en&locale=en-US&reg=10012243229136&SSID=concourse&username=dev001password%3Dboingo&hpe=100.0&protocol=2',
'bms-price-case1' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadPricingMessage&currencyCode=GBP&platform=ios',
'bms-price-case2' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadPricingMessage&currencyCode=GBP&platform=ios&price=343',
'cc-soft-decline' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadCcSoftDeclineMessage',
'exception-message' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadExceptionMessage',
'invalid-credentials-noreset' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadInvalidCredentialsMessage',
'invalid-credentials-reset' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadInvalidCredentialsMessage&canResetPassword=true',
'activate-account' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadActivateAccountMessage&username=bshields%40boingo.com&hashCode=39339',
'account-good-standing' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadAccountGoodStandingMessage',
'invalid-account' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadInvalidAccountMessage',
'selfcare-message1' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadSelfcareMessage&offerBundledPlan=true',
'selfcare-message2' => 'http://10.1.2.138:5700/shared/bms/?messageId=loadSelfcareMessage',
'offline-offer-page' => 'http://10.1.2.138:5700/shared/membership/index2.php?SCC=sdsd&platform=sdsd&brand=sdsds&bssid=sdsds&ssid=sdsds&mode=offline',
'email-verification' => 'http://10.1.2.138:5700/shared/email_verification/?username=bshields%40boingo.com&hashCode=39339',
'contact' => 'http://10.1.2.131:8888/shared/membership/offline/contact.php',
'pricing-page' => 'http://10.1.2.131:8888/shared/membership/offline/pricing.php',
'additional-charges' => 'http://10.1.2.138:5700/shared/membership/temp/offlinepages/Additional_Charges.php',
'exclusion-list' => 'http://10.1.2.138:5700/exclusion_list.php'
);

// manual pages ***********************************************************
$arrManualPages = array(
'check-your-email',
'check-your-email-form',
'confirmation-resent',
'connect-most-often',
'convenient-plans',
'setup-your-account',
'thanks-free',
'thanks-free-n-paid',
'username-password'
);

// replacing IPs on manual pages

$pattern = '/http:\/\/10.1.2.138:5700/';
$replacement = 'http://10.1.2.131:8888';

$toc = "<ol>";

foreach($arrManualPages as $page){
	$toc .= "<li><a href=\"http://10.1.2.131:8888/shared/membership/temp/harma/iphone2/" . $page . ".html\" >" . $page . "</a></li>\n";
	$filename = $page . '.html';
	$original = file_get_contents($filename);
	$converted = preg_replace($pattern, $replacement, $original);
	$fh = fopen($filename, "w");
	fwrite($fh, $converted);
	fclose($fh);
}

// automatic pages from brian's list ***********************************************************

foreach($arrFiles as $key => $value){
	/*echo $key . " : " . $value . "<br />";*/
	$content = file_get_contents($value);
	$content = preg_replace($pattern, $replacement, $content);
	$toc .= "<li><a href=\"http://10.1.2.131:8888/shared/membership/temp/harma/iphone2/" . $key . ".html\" >" . $key . "</a></li>\n";
	$fh = fopen($key . ".html", "w");
	fwrite($fh, $content);
	fclose($fh);
}

$toc .= "</ol>";

$fh = fopen('index.html',"w");
fwrite($fh, $toc);
fclose($fh);

/*
$filename = "../iphone/choose-your-plan.html";
$content = file_get_contents($filename);
echo $content;
*/
?>

</body>
</html>