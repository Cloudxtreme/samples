<?php

$promo = 'BUK01090GBP0';

// Adding scc override by url to this page
$scc = overrideSCCbyURL(/*default*/'WEBSEM001');

$signup_url = 'https://c01.client.boingo.com/signup/SignupStart.app?PROMO='.$promo.'&SCC='.$scc;

// append param 'landingPage' if it exists
$signup_url = appendParamIfExists('landingPage', $signup_url);

// template elements

$template_plan_price = 9.95;
$template_currency_denomination = '&pound;';
$template_currency_price = $template_currency_denomination . $template_plan_price;

$template_meta_title = 'Unlimited Wi-Fi Throughout the UK & Ireland from Boingo';
$template_content_title = 'BOINGO UK &amp; IRELAND';
$template_top_banner_image = 'top_banner_uki_1195.png';
$template_top_banner_image_alt = 'SPECIAL WI-FI OFFER: SIGN UP FOR '.$template_content_title.', NO CONTRACTS. NO MB FEES. HUGE SAVINGS! - SIGN UP NOW, '.$template_currency_price.' per month';
$template_signup_button_image = 'btn_uki_1195.png';
$template_signup_button_image_alt = 'SIGN UP FOR '.$template_content_title.', '.$template_currency_price.' PER MONTH';

$template_content_intro_paragraph=<<<END
<p>Cellular data plans (3G/4G) can be expensive and even restrict how much you can enjoy the Internet because of low monthly megabyte caps. With Boingo, there are no megabyte restrictions. Use as much Wi-Fi as you want and save money.</p>
<p><strong>Boingo's award winning Wi-Fi service lets you access Wi-Fi on any 2 Wi-Fi enabled devices throughout the <a href="$signup_url" class="envokeRegionPopup" name="uki">UK and Ireland</a> for only $template_currency_price per month!</strong></p>
<p>Boingo hotspots include airports, hotels, caf&eacute;s, malls, stadiums, convention centers and many other locations.</p>
END;

$template_content_plan_details=<<<END
<ul>
<li><strong>Unlimited Wi-Fi access</strong> at Boingo hotspots throughout the <a href="$signup_url" class="envokeRegionPopup" name="uki">UK and Ireland.</a></li>
<li>Connect to Wi-Fi on any Wi-Fi enabled device including <strong>laptops, iPads, iPhones, iPods, Androids, tablets, e-readers</strong> and more.</li>
<li>Stream video, download large files, play multiplayer games, make VOIP calls using Skype- all at <strong>Wi-Fi speeds up to 10 times faster than cellular data (3G/4G).</strong></li>
<li>No contracts, no cancellation fees, <strong>no per-megabyte charges.</strong></li>
</ul>
<a href="$signup_url"><img src="img/$template_signup_button_image" alt="$template_signup_button_image_alt" width="458" height="91" border="0" style="margin:5px 0 25px 0;" /></a>
END;

$template_content_plan_further_details=<<<END
<h5>Airports:</h5>
  
  <table class="airports" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="airport_code">ABZ</td>
    <td class="airport_name">Aberdeen Airport</td>
    <td class="airport_code">EDI</td>
    <td class="airport_name">Edinburgh Airport</td>
    <td class="airport_code">LGW</td>
    <td class="airport_name">London Gatwick Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BFS</td>
    <td class="airport_name">TBI Belfast International Airport</td>
    <td class="airport_code">GLA</td>
    <td class="airport_name">Glasgow International Airport</td>
    <td class="airport_code">STN</td>
    <td class="airport_name">London Stansted Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BHD</td>
    <td class="airport_name">Belfast City Airport</td>
    <td class="airport_code">LHR</td>
    <td class="airport_name">London Heathrow Airport</td>
    <td class="airport_code">SOU</td>
    <td class="airport_name">Southhampton Airport</td>
  </tr>
</table>

<h5>Hotels:</h5>

<img src="img/hotels_uki.png" width="703" height="78" border="0" usemap="#Map">
<map name="Map">
  <area shape="rect" coords="4,7,43,70" alt="Barcelo" >
  <area shape="rect" coords="49,8,102,71" alt="Hilton">
  <area shape="rect" coords="107,5,155,71" alt="Ibis">
  <area shape="rect" coords="158,7,232,71" alt="Marriott">
  <area shape="rect" coords="237,6,304,71" alt="NH Harrington">
  <area shape="rect" coords="306,6,353,72" alt="Novotel">
  <area shape="rect" coords="356,7,415,73" alt="Park Inn">
  <area shape="rect" coords="418,9,476,73" alt="Premier Inn">
  <area shape="rect" coords="480,7,547,73" alt="Renaissance">
  <area shape="rect" coords="552,7,621,73" alt="St. Giles" >
  <area shape="rect" coords="626,6,696,72" alt="The Shelbourne">
</map>

<h5>Partner Hotspots:</h5>

<table class="partner_hotspots" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>BT Openzone Hotspot</td>
    <td>Network Rail</td>
    <td>Spectrum Hotspot</td>
  </tr>
  <tr>
    <td>Castlewood Apartments</td>
    <td>Moto Services</td>
    <td>Swisscom/Eurospot Hotspot</td>
  </tr>
  <tr>
    <td>Eircom Hotspot</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
END;

?>