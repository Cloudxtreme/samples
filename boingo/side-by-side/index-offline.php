<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>showing all membership pages</title>
<style type="text/css">
.preview {
float:left;
margin-right:25px;
}

iframe {
border:1px solid black;	
}
p.title {
padding-left:15px;
}
hr {
	clear:both;	
}

h3 {
	clear:both;	
}
</style>
<?php

$arrPages = array('additional_charges.html','autoconnect_help.html','contact.html','eula.html','faqs.html','help.html','ks_help.html','pricing.html','signup.html','splash.html','terms_help.html');
$arrPagesCount = count($arrPages);

$arrPagesMac = array('additional_charges.html','help_accept_terms.html','contact.html','eula.html','help.html','help_auto_connect.html','help_customer_agreement.html','pricing.html','signup.html','help_faq.html','help_no_free.html','signup_no_free.html');
$arrPagesMacCount = count($arrPagesMac);

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
</head>
<body style="width:<?php echo ($iframeWidth * $arrPagesCount) + ($arrPagesCount * 30);?>px;">
<h1>Offline pages</h1>
<div style="background-color:#ccc;font-size:9px;padding:3px;"><?php echo $userAgent; ?></div>
<p>Using iframes to load membership offline pages in succession to help get a snapshot of everything.</p>

<?php if (preg_match("/android/i", $userAgent) || preg_match("/ipad/i", $userAgent)) {?>
<p><a href="?o=portrait">Portrait</a> | <a href="?o=landscape">Landscape</a></p>
<?php } ?>

<h3>PC offline pages</h3>

<?php foreach($arrPages as $page){?>
<div class="preview">
<p class="title"><?php echo $page; ?></p>
<iframe name="FRAMENAME" src="pc-offline-pages/<?php echo $page; ?>" width="<?php echo $iframeWidth; ?>" height="<?php echo $iframeHeight; ?>" frameborder="0" scrolling="yes"></iframe>
</div>
<?php } ?>

<hr />

<h3>Mac offline pages</h3>

<?php foreach($arrPagesMac as $page){?>
<div class="preview">
<p class="title"><?php echo $page; ?></p>
<iframe name="FRAMENAME" src="mac-offline-pages/<?php echo $page; ?>" width="<?php echo $iframeWidth; ?>" height="<?php echo $iframeHeight; ?>" frameborder="0" scrolling="yes"></iframe>
</div>
<?php } ?>

</body>
</html>