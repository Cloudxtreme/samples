<?php

/*
	-- Harma Davtian --
	Access logic to this page is controlled by controller.php
	This is not a full proof solution but will serve the purpose for the aggressive launch timeline
	Users from Telemex or other whitelist domains will be able to see this page via
	php superglobal $_SERVER['HTTP_REFERER']

*/

require_once("controller.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Telmex Customers</title>
<link href="https://c01.client.boingo.com/shared/css/tmxcstmr-main.css" rel="stylesheet" type="text/css" />
<link href="/shared/css/tmxcstmr-main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://c01.client.boingo.com/shared/jscript/jquery-1.8.3.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	
	// on the "language" dropdown change, reload the page with lang param to show language specific content
	$("#language").change(function(){
		window.location = $(this).val();	
	});
	
	// show links in console for easy checking
	$("a").each(function(){
		
		if($(this).prop("href") && $(this).prop("href").indexOf('SCC')){
			console.log($(this).prop("href"));
		}
		
	});
	
}) // end of document ready
</script>

</head>

<body class="<?=$language_css?>">

<!-- header start -->
<div class="header">
    <div class="inner">
    	<div class="logo"><img src="https://c01.client.boingo.com/shared/css/img/logoWhiteTop.gif" border="0" alt="" /></div>
    
    	<div class="userControls">
        
        <div class="control1">            
            <select name="language" id="language">
              <option value="?lang=en&curr=usd" <?php preselect('lang=en&curr=usd');?>>English Int'l - $USD</option>
              <option value="?lang=en&curr=mxn" <?php preselect('lang=en&curr=mxn');?>>English Int'l - $MXN</option>
              <option value="">---------------</option>
              <option value="?lang=es&curr=usd" <?php preselect('lang=es&curr=usd');?>>Espa&ntilde;ol - $USD</option>
              <option value="?lang=es&curr=mxn" <?php preselect('lang=es&curr=mxn');?>>Espa&ntilde;ol - $MXN</option>
            </select>
        </div>
        
    </div>
    
    </div>
</div>
<!-- header end -->

<!-- content start -->
<div class="content">

    <div class="mainContent">
    
    <?php
		
			$plan = 'Boingo Unlimited';
			$signup_link_unl = $content[$language][$plan]['price'][$currency]['signup_link'];
		
	?>
    
    <!-- Main Offerpod start-->
    <div class="wrapperMainPod">
        <a class="offerpod-signup signupLink" href="<?=$signup_link_unl?>">&nbsp;</a>
        <div class="laptopMainOfferPod bg_nero">
        
        	<div class="burst"></div>
        
            <h1 class="headline"><?=$content[$language]['main_header']?></h1>
                
            <?=$content[$language]['features']?>

        
        <div class="description">
        
            <h2><?=$content[$language][$plan]['name']?></h2>
            <p><?=$content[$language][$plan]['price'][$currency]['description']?></p>
            
            <div class="price_and_button">
            
            <div class="col1">
                <div class="denomination"><?=$content[$language][$plan]['price'][$currency]['symbol']?></div>
                <div class="price"><?=$content[$language][$plan]['price'][$currency]['actual']?></div>
                <div class="frequency"><?=$content[$language][$plan]['price'][$currency]['interval']?></div>
            </div>
            
            <div class="col2"><div class="btnType1 bgcolor_red1">
            <a><?=$content[$language]['get_online_button_text']?></a></div></div>
            </div>
        </div>
        
        <p class="stats1"><?=$content[$language][$plan]['stats1']?></p>
        <p class="stats2"><?=$content[$language][$plan]['stats2']?></p>
        <p class="stats3"><?=$content[$language][$plan]['stats3']?></p>
        
        </div>
        
        <div class="bubble">
            <div class="coverup">
                <?=$content[$language]['bubble_hsc']?>
            </div>
        </div>
        
    </div>
    <!-- Main Offerpod end -->
    
    <!-- Sub Offerpod start -->
    <div class="subofferContainer">
    
        <!-- suboffer ////////////////////////////////////////////////////////////////////////////////// -->
        
        <?php
		
			$plan = 'Boingo Mobile';
			$signup_link_mob = $content[$language][$plan]['price'][$currency]['signup_link'];
		
		?>
        
        <div class="subofferOuter twoOfferLayout float_left">
            <div class="subofferInner">
                <a class="offerpod-signup signupLink" href="<?=$signup_link_mob?>">&nbsp;</a>
                <h2><?=$content[$language][$plan]['name']?></h2>
                
                <div class="description">
                    <p><?=$content[$language][$plan]['price'][$currency]['description']?></p>
                </div>
                
                <div class="price_and_button">
                    
                    <div class="pricingContainer">
                        <p><span class="denomination"><?=$content[$language][$plan]['price'][$currency]['symbol']?></span>
                        <span class="price"><?=$content[$language][$plan]['price'][$currency]['actual']?></span>
                        <span class="cycle"><?=$content[$language][$plan]['price'][$currency]['interval']?></span></p>
                    </div>
                    
                    <div class="btnType1 bgcolor_red1"><a><?=$content[$language]['get_online_button_text']?></a></div>
                </div>
                
            </div>
        </div>
        
        <!-- suboffer ////////////////////////////////////////////////////////////////////////////////// -->
        
        <?php
		
			$plan = 'Unlimited Worldwide';
			$signup_link_wor = $content[$language][$plan]['price'][$currency]['signup_link'];
		
		?>
        
        <div style="margin-left:8px;" class="subofferOuter twoOfferLayout float_left">
            <div class="subofferInner">
                <a class="offerpod-signup signupLink" href="<?=$signup_link_wor?>">&nbsp;</a>
                <h2><?=$content[$language][$plan]['name']?></h2>
                
                <div class="description">
                    <p><?=$content[$language][$plan]['price'][$currency]['description']?></p>
                </div>
                
                <div class="price_and_button">
                
                    <div class="pricingContainer">
                        <p><span class="denomination"><?=$content[$language][$plan]['price'][$currency]['symbol']?></span>
                        <span class="price"><?=$content[$language][$plan]['price'][$currency]['actual']?></span>
                        <span class="cycle"><?=$content[$language][$plan]['price'][$currency]['interval']?></span></p>
                    </div>
                
                    <div class="btnType1 bgcolor_red1"><a><?=$content[$language]['get_online_button_text']?></a></div>
                </div>
                
            </div>
        </div>
        
    </div>
    <!-- Sub Offerpod end -->
    </div>
    
    <div class="supportContent">
    <div class="" style="text-align:center;">
		<img src="https://c01.client.boingo.com/shared/media/img/infinitum-logo.png" alt="" border="0" style="padding:35px 0 65px 0;"><br />
        <img class="quote" alt="" title="" src="<?=$content[$language]['img_quote']?>" border="0">
    </div>
    </div>


</div>
<!-- content end -->

<!-- footer start -->
<div class="footer">

</div>
<!-- footer end -->

</body>
</html>
