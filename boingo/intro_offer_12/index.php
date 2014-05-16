<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/global/init.php");
include_once(SHARED_ROOT . "/includes/header_footer.php");
include_once (SHARED_ROOT . '/includes/content_hooks.php');
$hide_js = true;
include_once (SHARED_ROOT . "/jscript/common-text.php");
include_once(SHARED_ROOT . "/functions/functions.php");
$SERVERPATH = getSecuredServerPath($c01_url, $website_url);

// default promo for page (if needed, you can override $promo below, $promo is used in the signup url on the buttons on this page
$promo = 'BUL01090USD0';

// Adding scc override by url to this page
$scc = overrideSCCbyURL(/*default*/'WEBSEM064');

$signup_url = 'https://c01.client.boingo.com/signup/SignupStart.app?PROMO='.$promo.'&SCC='.$scc;

// append param 'landingPage' if it exists
$signup_url = appendParamIfExists('landingPage', $signup_url);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sign Up For Boingo Unlimited and Earn a $10 Amazon.com Gift Card!*</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="resource-type" content="document">
	<meta name="distribution" content="global">

	<meta name="author" content="Boingo">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 days">
	<meta name="rating" content="general">
    
    <script type="text/javascript" src="<?php echo $SERVERPATH."/shared"; ?>/jscript/common-text.php"></script> 
   	<!-- CSS file of the template file used for this page -->
    <link href="../intro_offer_11/css.css" rel="stylesheet" type="text/css" />

<style>
.mainWrapper {
    margin: 0 auto 15px;
    width: 768px;
}

.details ul {
	list-style: url(../intro_offer_11/img/bullet.gif);
	padding-left:2em;
}

.details ul li {
	padding-bottom:10px;
}

h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size:24px;
	color: #d52b1e;
}

h3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size:18px;
	color: #d52b1e;
}
</style>

<?php
// Include extole pixel code to headwhen scc='WEBEXT064'
if ($scc == 'WEBEXT064') {
	include_once($_SERVER['DOCUMENT_ROOT'] . '/shared/includes/extole_tracking_pixel.php');
}
?>

</head>

<body>

<div class="mainWrapper">

<div class="logo"><a href="/"><img src="/shared/images/logo_boingo.png" alt="Boingo" width="130" height="66" border="0"/></a></div>

<div> <a href="<?=$signup_url?>"><img src="img/special-wifi-offer.png" alt="Special Wi-Fi Offer - Sign Up For Boingo Unlimited, Earn A $10 Amazon.com Gift Card!*" width="768" height="272" border="0" /></a><br />
  <div style="overflow:hidden;">
    <img src="img/magazine-quotes.png" alt="&quot;The Best Wi-Fi Service In The World&quot; - Global Traveler, &quot;Top Ten Travel Apps For 2010&quot; - Travel+Leisure, &quot;One Of The Top 10 Ways To Stay Connected On The Road&quot;, Time" width="237" height="372" border="0" style="float:right;margin-top:40px;" />
    <div class="details" style="float:left;width:485px;margin-left:35px;">
    <h1>BOINGO UNLIMITED WI-FI</h1>
    <p>Boingo's award winning Wi-Fi service lets you access Wi-Fi on any Wi-Fi enabled device for only $9.95 per month throughout the Americas.<br />
      Boingo hotspots include airports, hotels, caf&eacute;s, doughnut shops, malls, convention centers, stadiums and many other locations.</p>
    <h3>Plan Details</h3>
    <ul>
      <li>Connect to Wi-Fi on any Wi-Fi enabled device including <strong>laptops, iPads, iPhones, iTouch, Androids, tablets, e-readers</strong> and more ...</li>
      <li>Save money with Wi-Fi and avoid expensive cellular data roaming fees when traveling internationally.</li>
      <li>Wi-Fi speeds up to <strong>10 times faster than 3G.</strong></li>
      <li>No contracts, no cancellation fees, no per-minute charges.</li>
      <li>Plus, when you sign up today, <strong>earn a $10 Amazon.com Gift Card</strong> after your 2nd month.</li>
    </ul>
    
    <a href="<?=$signup_url?>"><img src="img/btn-signup.png" alt="Boingo Unlimited + Amazon.com $10 Gift Card" width="462" height="88" border="0" style="margin:5px 0 25px 0;" /></a>
    </div>
  </div>
  <img src="img/partner-locations.png" alt="Connect to Boingo at thousands of locations" width="709" height="73" border="0" style="margin-left:35px;"/>
  <div class="footer">
<p>*Amazon.com is not a sponsor of this promotion. Except as required by law, GCs cannot be transferred for value or redeemed for cash. GCs may be used only for purchases of eligible goods on Amazon.com or certain of its affiliated websites. For complete terms and conditions, see <span class="boingored">www.amazon.com/gc-legal</span>. GCs are issued by ACI Gift Cards, Inc., a Washington corporation. &copy;,&reg;,&trade; Amazon.com Inc. and/or its affiliates, 2012.</p>
<p>You must maintain your active Boingo Unlimited account  for at least 60 days to receive the $10 Amazon.com Gift Card from Boingo.</p>
  </div>
</div>

</div>

<?
include_once (SHARED_ROOT . '/includes/doubleclick.php');
include_once (SHARED_ROOT . '/includes/analytics.php');
?>
</body>
</html>