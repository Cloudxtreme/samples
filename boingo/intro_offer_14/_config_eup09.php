<?php

$promo = 'BUE01090EUR0';

// Adding scc override by url to this page
$scc = overrideSCCbyURL(/*default*/'WEBSEM001');

$signup_url = 'https://c01.client.boingo.com/signup/SignupStart.app?PROMO='.$promo.'&SCC='.$scc;

// append param 'landingPage' if it exists
$signup_url = appendParamIfExists('landingPage', $signup_url);

// template elements

$template_plan_price = 9.95;
$template_currency_denomination = '&euro;';
$template_currency_price = $template_currency_denomination . $template_plan_price;

$template_meta_title = 'Unlimited Wi-Fi Throughout Europe from Boingo';
$template_top_banner_image = 'top_banner_europe_995_usd.png';
$template_top_banner_image_alt = 'SPECIAL WI-FI OFFER: SIGN UP FOR BOINGO EUROPE PLUS, NO CONTRACTS. NO MB FEES. HUGE SAVINGS! - SIGN UP NOW, '.$template_currency_price.' per month';
$template_signup_button_image = 'btn_europe_995.png';
$template_signup_button_image_alt = 'SIGN UP FOR BOINGO EUROPE PLUS, '.$template_currency_price.' PER MONTH';
$template_content_title = 'SAVE ON WIRELESS INTERNET (WLAN) ACCESS THROUGHOUT EUROPE, THE MIDDLE EAST AND AFRICA!';

$template_content_intro_paragraph=<<<END
<p>Cellular data plans (3G/4G) can be expensive and even restrict how much you can enjoy the Internet because of low monthly megabyte caps. With Boingo, there are no megabyte restrictions. Use as much Wi-Fi as you want and save money.</p>
<p><strong>Boingo's award winning Wi-Fi service lets you access Wi-Fi on any 2 Wi-Fi enabled devices throughout <a href="$signup_url" class="envokeRegionPopup" name="emea">Europe, the Middle East and Africa</a> for only $template_currency_price per month!</strong></p>
<p>Boingo hotspots include airports, hotels, caf&eacute;s, malls, stadiums, convention centers and many other locations.</p>
END;

$template_content_plan_details=<<<END
<ul>
<li><strong>Unlimited Wi-Fi access</strong> at 200,000+ hotspots throughout <a href="$signup_url" class="envokeRegionPopup" name="emea">Europe, the Middle East, and Africa.</a></li>
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
    <td class="airport_code">DME</td>
    <td class="airport_name">Domodedovo Airport</td>
    <td class="airport_code">MLH</td>
    <td class="airport_name">EuroAirport Basel Mulhouse Freiburg</td>
  </tr>
  <tr>
    <td class="airport_code">AMS</td>
    <td class="airport_name">Amsterdam Airport Schiphol</td>
    <td class="airport_code">EDI</td>
    <td class="airport_name">Edinburgh Airport</td>
    <td class="airport_code">MRS</td>
    <td class="airport_name">Aeroport Marseille</td>
  </tr>
  <tr>
    <td class="airport_code">ARN</td>
    <td class="airport_name">Stockholm</td>
    <td class="airport_code">FCO</td>
    <td class="airport_name">Fiumicino International Airport</td>
    <td class="airport_code">MXP</td>
    <td class="airport_name">Malpensa International Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BCN</td>
    <td class="airport_name">Aeropuerto Barcelona</td>
    <td class="airport_code">GLA</td>
    <td class="airport_name">Glasgow International Airport</td>
    <td class="airport_code">OSL</td>
    <td class="airport_name">Oslo Airport Gardermoen</td>
  </tr>
  <tr>
    <td class="airport_code">BFS</td>
    <td class="airport_name">TBI Belfast International Airport</td>
    <td class="airport_code">GVA</td>
    <td class="airport_name">Geneva Airport</td>
    <td class="airport_code">SOU</td>
    <td class="airport_name">Southhampton Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BHD</td>
    <td class="airport_name">Belfast City Airport</td>
    <td class="airport_code">LGW</td>
    <td class="airport_name">London Gatwick Airport</td>
    <td class="airport_code">STN</td>
    <td class="airport_name">London Stansted Airport</td>
  </tr>
  <tr>
    <td class="airport_code">BRU</td>
    <td class="airport_name">Brussels Airport</td>
    <td class="airport_code">LHR</td>
    <td class="airport_name">London Heathrow Airport</td>
    <td class="airport_code">SVG</td>
    <td class="airport_name">Stavanger Airport</td>
  </tr>
  <tr>
    <td class="airport_code">CDG</td>
    <td class="airport_name">Charles de Gaulle International Airport</td>
    <td class="airport_code">LIN</td>
    <td class="airport_name">Milan Linate Airport</td>
    <td class="airport_code">VCE</td>
    <td class="airport_name">Venice Marco Polo Airport</td>
  </tr>
  <tr>
    <td class="airport_code">CPH</td>
    <td class="airport_name">Copenhagen International Airport</td>
    <td class="airport_code">MAD</td>
    <td class="airport_name">Aeropuerto Madrid</td>
    <td class="airport_code">ZRH</td>
    <td class="airport_name">Zurich Airport</td>
  </tr>
  <tr>
    <td class="airport_code">CRL</td>
    <td class="airport_name">Brussels South Charleroi Airport</td>
    <td class="airport_code">&nbsp;</td>
    <td class="airport_name">&nbsp;</td>
    <td class="airport_code">&nbsp;</td>
    <td class="airport_name">&nbsp;</td>
  </tr>
</table>

<h5>Hotels:</h5>

<img src="img/hotels_europe.png" width="700" height="78" border="0" usemap="#Map">
<map name="Map">
  <area shape="rect" coords="2,4,108,59" alt="Crowne Plaza">
  <area shape="rect" coords="118,6,185,59" alt="Hilton">
  <area shape="rect" coords="196,7,282,61" alt="Mariott">
  <area shape="rect" coords="294,4,355,62" alt="NH Hotels">
  <area shape="rect" coords="366,6,490,62" alt="Quality Hotel Park">
  <area shape="rect" coords="506,4,608,60" alt="SIlken Berlaymont">
  <area shape="rect" coords="620,4,694,59" alt="Swisscom Hotspot">
</map>
<h5>Partner Hotspots:</h5>

<table class="partner_hotspots" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>ADP Telecom Hotspot</td>
    <td>Kubi Wireless Hotspot</td>
    <td>Orange France Hotspot</td>
  </tr>
  <tr>
    <td>BT Openzone Hotspot</td>
    <td>M3 Hotspot</td>
    <td>Smartnet Hotspot</td>
  </tr>
  <tr>
    <td>Castlewood Apartments</td>
    <td>Metero Hotspot</td>
    <td>Spectrum Hotspot</td>
  </tr>
    <tr>
    <td>Eircom Hotspot</td>
    <td>Moto Services</td>
    <td>Swisscom Mobile Hotspot</td>
  </tr>
    <tr>
    <td>Fira de Barcelona</td>
    <td>Network Rail</td>
    <td>True WiFi Hotspot</td>
  </tr>
</table>
END;

?>