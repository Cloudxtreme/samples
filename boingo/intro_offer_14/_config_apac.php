<?php

// default promo for page (if needed, you can override $promo below, $promo is used in the signup url on the buttons on this page
$promo = 'BUA01110USD0';

// Adding scc override by url to this page
$scc = overrideSCCbyURL(/*default*/'WEBSEM001');

$signup_url = 'https://c01.client.boingo.com/signup/SignupStart.app?PROMO='.$promo.'&SCC='.$scc;

// append param 'landingPage' if it exists
$signup_url = appendParamIfExists('landingPage', $signup_url);

// template elements

$template_plan_price = 11.95;
$template_currency_denomination = '$';
$template_currency_price = $template_currency_denomination . $template_plan_price;

$template_meta_title = 'Unlimited Wi-Fi Throughout Asia Pacific from Boingo';
$template_content_title = 'BOINGO ASIA PACIFIC';
$template_top_banner_image = 'top_banner_apac_1195.png';
$template_top_banner_image_alt = 'SPECIAL WI-FI OFFER: GET WI-FI ACCESS IN ASIA PACIFIC, NO CONTRACTS. NO MB FEES. HUGE SAVINGS! - SIGN UP NOW, '.$template_currency_price.' per month';
$template_signup_button_image = 'btn_apac_1195.png';
$template_signup_button_image_alt = 'SIGN UP FOR '.$template_content_title.', '.$template_currency_price.' PER MONTH';


$template_content_intro_paragraph=<<<END
<p>Cellular data plans (3G/4G) can be expensive and even restrict how much you can enjoy the Internet because of low monthly megabyte caps. With Boingo, there are no megabyte restrictions. Use as much Wi-Fi as you want and save money.</p>
<p><strong>Boingo's award winning Wi-Fi service lets you access Wi-Fi on any 2 Wi-Fi enabled devices throughout <a href="$signup_url" class="envokeRegionPopup" name="apac">Asia Pacific,</a> including China, Japan, Australia, Singapore and more for only $template_currency_price per month!</strong></p>
<p>Boingo hotspots include airports, hotels, caf&eacute;s, malls, stadiums, convention centers and many other locations.</p>
END;

$template_content_plan_details=<<<END
<ul>
<li><strong>Unlimited Wi-Fi access</strong> at 150,000+ hotspots in the <a href="$signup_url" class="envokeRegionPopup" name="apac">Asia Pacific</a> region.</li>
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
    <td class="airport_code">BKK</td>
    <td class="airport_name">Suvarnabhumi Airport</td>
    <td class="airport_code">HKG</td>
    <td class="airport_name">Hong Kong International Airport</td>
    <td class="airport_code">PER</td>
    <td class="airport_name">Perth Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BLR</td>
    <td class="airport_name">Bangalore International Airport</td>
    <td class="airport_code">MEL</td>
    <td class="airport_name">Melbourne Airport</td>
    <td class="airport_code">SIN</td>
    <td class="airport_name">Singapore Changi International Airport</td>
  </tr>
  <tr>
    <td class="airport_code">CEB</td>
    <td class="airport_name">Mactan International Airport</td>
    <td class="airport_code">NRT</td>
    <td class="airport_name">Tokyo Airport</td>
    <td class="airport_code">SYD</td>
    <td class="airport_name">Sydney Airport</td>
  </tr>
  <tr>
    <td class="airport_code">HDD</td>
    <td class="airport_name">Hyderabad International Airport</td>
    <td class="airport_code">PEK</td>
    <td class="airport_name">Beijing Capital Airport</td>
    <td class="airport_code">TEP</td>
    <td class="airport_name">CKS International Airport</td>
  </tr>
</table>

<h5>Hotels:</h5>

<img src="img/hotels_apac.png" width="704" height="159" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="rect" coords="3,6,92,58" alt="Assured Ascot Quays" />
  <area shape="rect" coords="140,6,240,61" alt="Breakfree" />
  <area shape="rect" coords="3,75,91,138" alt="Holiday Inn" />
  <area shape="rect" coords="139,72,241,136" alt="James Cook Hotel" />
  <area shape="rect" coords="309,3,383,67" alt="Central Cosmo" />
  <area shape="rect" coords="307,76,386,137" alt="Novotel" />
  <area shape="rect" coords="447,6,547,70" alt="Crowne Plaza" />
  <area shape="rect" coords="449,80,551,137" alt="Scenic Hotels" />
  <area shape="rect" coords="591,6,701,70" alt="Heritage" />
  <area shape="rect" coords="598,75,696,138" alt="Somerset" />
</map>

<h5>Partner Hotspots:</h5>

<table class="partner_hotspots" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>7-Eleven</td>
    <td>iCell Hotspot</td>
    <td>Suntec Hotspot</td>
  </tr>
  <tr>
    <td>China Mobile Communications Corporation Hotspot</td>
    <td>Korea Telecom Hotspot</td>
    <td>Starhub Hotspot</td>
  </tr>
  <tr>
    <td>China Telecom Hotspot</td>
    <td>KSC Hotspot</td>
    <td>True WiFi Hotspot</td>
  </tr>
  <tr>
    <td>Chunghwa Hotspot</td>
    <td>MobilepointBB Hotspot</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Companhia de Telecomunica&ccedil;&ouml;es de Macau Hotspot</td>
    <td>NTT Communications Hotspot</td>
    <td>&nbsp;</td>
  </tr>
</table>
END;

?>