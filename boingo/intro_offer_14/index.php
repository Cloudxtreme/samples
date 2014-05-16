<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/global/init.php");
include_once(SHARED_ROOT . "/includes/header_footer.php");
include_once (SHARED_ROOT . '/includes/content_hooks.php');
$hide_js = true;
include_once (SHARED_ROOT . "/jscript/common-text.php");
include_once(SHARED_ROOT . "/functions/functions.php");
$SERVERPATH = getSecuredServerPath($c01_url, $website_url);

// listen for ref=whatever to properly choose the correct config file, if not ref param in url then redirect to homepage

if ($_GET['ref']) {
	$uniqueID = $_GET['ref'];
} else {
	$uniqueID = false;	
}

if ($uniqueID) {
	
	switch($uniqueID){
	
		case 'apac':
		include('_config_apac.php');
		break;
		
		case 'eup':
		include('_config_eup.php');
		break;
		
		case 'eup09':
		include('_config_eup09.php');
		break;
		
		case 'eupus':
		include('_config_eupus.php');
		break;
		
		case 'uki':
		include('_config_uki.php');
		break;
		
		case 'unl':
		case 'unlcj':
		include('_config_unl.php');
		break;
		
		case 'unlamzn':
		include('_config_unlamzn.php');
		break;
		
		default:
		header('Location: /');
		exit;
		
	}
	
} else {
	header('Location: /');
	exit;	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$template_meta_title?></title>
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
    <script type="text/javascript" src="<?php echo $SERVERPATH."/shared"; ?>/jscript/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $SERVERPATH."/shared"; ?>/jscript/envokeRegionsPopup.js"></script> 
   	<!-- CSS file of the template file used for this page -->
    <link href="../intro_offer_11/css.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="/shared/regional_overlays/regionOverlayWrapper.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="mainWrapper">

<div class="logo"><a href="/"><img src="/shared/images/logo_boingo.png" alt="Boingo" width="130" height="66" border="0"/></a></div>

<div class="innerContentWrapper"> <a href="<?=$signup_url?>"><img src="img/<?=$template_top_banner_image?>" alt="<?=$template_top_banner_image_alt?>" width="768" height="272" border="0" /></a><br />
  <div style="overflow:hidden;">
    <img src="img/magazine-quotes.png" alt="&quot;The Best Wi-Fi Service In The World&quot; - Global Traveler, &quot;Top Ten Travel Apps &quot; - Travel+Leisure, &quot;One Of The Top 10 Ways To Stay Connected On The Road&quot;, Time" width="222" height="482" border="0" style="float:right;margin-top:40px;border-left:1px solid #ccc;" />
    <div class="details" style="float:left;width:485px;margin-left:35px;">
    <h1><?=$template_content_title?></h1>
    <div><?=$template_content_intro_paragraph?></div>
    <h3>Plan Details</h3>
    <div><?=$template_content_plan_details?></div>
    </div>
  </div>
  
  <h4>Connect to Boingo at thousands of locations including:</h4>
  
  <div><?=$template_content_plan_further_details?></div>


<div class="footer">
  <p>Boingo, Boingo Wireless, and the Boingo Wireless Logo are registered trademarks of Boingo Wireless, Inc. Trademarks included are the property of their respective companies.</p>
</div>
</div>

</div>

<?
include_once (SHARED_ROOT . '/includes/doubleclick.php');
include_once (SHARED_ROOT . '/includes/analytics.php');
?>
</body>
</html>