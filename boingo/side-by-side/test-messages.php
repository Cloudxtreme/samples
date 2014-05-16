<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/ClientDetect.js"></script>
<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/resDetect.js"></script>
<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/mouseovers.js"></script>  

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<meta name="robots" content="noindex,nofollow">
<script type="text/javascript">viewportAndCss(getAgent())</script>
<!--[if IE]>
    <script type="text/javascript">viewportAndCssIE(getAgent())</script>
<![endif]-->
</head>
<body class="bar">
<div id="logo"><img src="/shared/img/cdot.gif"></div>
<div class="container" id="bms">

<?php 

$aMessages = array(

	"Additional Charges May Apply" => "Sorry, but we're having trouble obtaining pricing information for this hotspot. If this is a free hotspot, you won't be charged. If this is a Boingo location, please consult the Pricing Chart for applicable charges.",
	"Please Note:1" => "This hotspot is not included in your plan. You will be charged $price $increment for Wi-Fi access at this location.",
	"Please Note:2" => "This hotspot is not included in your plan. Click \"Continue\" for a list of available plans.",
	"Whoops!1" => "There's an error regarding your credit card. Please visit https://my.boingo.com to update your billing information after you log in.",
	"Whoops!2" => "We are unable to process your request. If this problem persists, please contact us.",
	"Whoops!3" => "Your username and/or password do not match our records. Please select the \"Account\" menu to review them.",
	"Whoops!4" => "Your username and/or password do not match our records.",
	"Whoops!5" => "We're unable to process your request. If this problem persists, please contact us.",
	"Whoops!6" => "There seems to be an error with your account. Please contact us.",
	"Make it a Combo!7" => "You currently have a Boingo Unlimited account. Add Wi-Fi service for your mobile device with Boingo Wi-Fi Combo today!",
	"Make it a Combo!8" => "You currently have a Boingo Mobile account. To log in, please launch the Boingo Wi-Finder software from your mobile device. To connect on your laptop now, switch to the Boingo Wi-Fi Combo plan.",
	"This is a Premium Hotspot9" => "This location is not included in your free membership. To connect here, plus 125,000 more Boingo hotspots, select \"Continue\" and choose the Boingo plan that's right for you.",
	"Whoops!10" => "We're unable to determine the exact pricing information for this location. You may be charged if you select \"Log In.\" Please click here to view pricing by plan type and location. Please note: You will not be charged if you are in a free location."
);

?>

<?php foreach ($aMessages as $headline => $message) {?>

<div id="bms-bkgd">
    <div id="bms-bkgd-container">
    <h1><?php echo $headline ;?></h1>
    <div id="bms-copy"><?php echo $message; ?></div>            
    </div>
</div>

<?php } ?>


</div>
</body>
</html>