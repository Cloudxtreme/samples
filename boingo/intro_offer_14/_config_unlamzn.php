<?php

$promo = 'BUL01090USD0';

// Adding scc override by url to this page
$scc = overrideSCCbyURL(/*default*/'WEBSEM064');

$signup_url = 'https://c01.client.boingo.com/signup/SignupStart.app?PROMO='.$promo.'&SCC='.$scc;

// append param 'landingPage' if it exists
$signup_url = appendParamIfExists('landingPage', $signup_url);

// template elements

$template_plan_price = 9.95;
$template_currency_denomination = '$';
$template_currency_price = $template_currency_denomination . $template_plan_price;

$template_meta_title = 'Boingo Unlimited + $10 Amazon.com Gift Card';
$template_content_title = 'BOINGO UNLIMITED WI-FI';
$template_top_banner_image = 'top_banner_unl_amazon_995.png';
$template_top_banner_image_alt = 'SPECIAL WI-FI OFFER: SIGN UP FOR BOINGO UNLIMITED, EARN A $10 AMAZON.COM GIFT CARD!* - SIGN UP NOW, '.$template_currency_price.' per month';
$template_signup_button_image = 'btn_unl_amazon_995.png';
$template_signup_button_image_alt = 'SIGN UP FOR BOINGO UNLIMITED, '.$template_currency_price.' PER MONTH';

$template_content_intro_paragraph=<<<END
<p>Cellular data plans (3G/4G) can be expensive and even restrict how much you can enjoy the Internet because of low monthly megabyte caps. With Boingo, there are no megabyte restrictions. Use as much Wi-Fi as you want and save money.</p>
<p><strong>Boingo's award winning Wi-Fi service lets you access Wi-Fi on any Wi-Fi enabled device for only $template_currency_price per month throughout the <a href="$signup_url" class="envokeRegionPopup" name="americas">Americas.</a></strong></p>
<p>Boingo hotspots include airports, hotels, caf&eacute;s, malls, stadiums, convention centers and many other locations.</p>
END;

$template_content_plan_details=<<<END
<ul>
<li><strong>Unlimited Wi-Fi access</strong> in North and South America.</li>
<li>Connect to Wi-Fi on any Wi-Fi enabled device including <strong>laptops, iPads, iPhones, iPods, Androids, tablets, e-readers</strong> and more.</li>
<li>Stream video, download large files, play multiplayer games, make VOIP calls using Skype- all at <strong>Wi-Fi speeds up to 10 times faster than cellular data (3G/4G).</strong></li>
<li>Use Boingo instead of cellular data and save big. One flat fee for Unlimited Wi-Fi access throughout the <a href="$signup_url" class="envokeRegionPopup" name="americas">Americas.</a></li>
<li>No contracts, no cancellation fees, <strong>no per-megabyte charges.</strong></li>
<li>Plus, when you sign up today, earn a <strong>$10 Amazon.com Gift Card</strong> after your 2<sup>nd</sup> month.</strong></li>
</ul>
<a href="$signup_url"><img src="img/$template_signup_button_image" alt="$template_signup_button_image_alt" width="458" height="91" border="0" style="margin:5px 0 25px 0;" /></a>
END;

$template_content_plan_further_details=<<<END
<h5>Airports:</h5>

<table class="airports" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="airport_code">ATL</td>
    <td class="airport_name">Atlanta International Airport</td>
    <td class="airport_code">AUS</td>
    <td class="airport_name">Austin Bergstrom International Airport</td>
    <td class="airport_code">BIL</td>
    <td class="airport_name">Billings Logan International Airport</td>
</tr>
<tr>
    <td class="airport_code">BNA</td>
    <td class="airport_name">Nashville International Airport</td>
    <td class="airport_code">BUF</td>
    <td class="airport_name">Buffalo Niagara International Airport</td>
    <td class="airport_code">BWI</td>
    <td class="airport_name">Baltimore/Washington International Airport</td>
</tr>
<tr>
    <td class="airport_code">CUN</td>
    <td class="airport_name">Aeropuerto Internacional De Cancun</td>
    <td class="airport_code">CVG</td>
    <td class="airport_name">Cincinnati Int'l Airport</td>
    <td class="airport_code">DAL</td>
    <td class="airport_name">Dallas Love Field Airport</td>
</tr>
<tr>
    <td class="airport_code">DCA</td>
    <td class="airport_name">Reagan National Airport</td>
    <td class="airport_code">DEN</td>
    <td class="airport_name">Denver Int'l Airport</td>
    <td class="airport_code">DSM</td>
    <td class="airport_name">Des Moines International Airport</td>
</tr>
<tr>
    <td class="airport_code">DTW</td>
    <td class="airport_name">Detroit Metropolitan Wayne County Airport</td>
    <td class="airport_code">ELP</td>
    <td class="airport_name">El Paso International Airport</td>
    <td class="airport_code">EWR</td>
    <td class="airport_name">Newark Liberty International Airport</td>
</tr>
<tr>
    <td class="airport_code">GEG</td>
    <td class="airport_name">Spokane Airport</td>
    <td class="airport_code">GIG</td>
    <td class="airport_name">Aeroporto Antonio Carlos Jobim - Galeao</td>
    <td class="airport_code">GRR</td>
    <td class="airport_name">Gerald R. Ford International Airport</td>
</tr>
<tr>
    <td class="airport_code">GRU</td>
    <td class="airport_name">Aeroporto Internacional De Sao Paulo</td>
    <td class="airport_code">GSO</td>
    <td class="airport_name">Piedmont Triad International Airport</td>
    <td class="airport_code">HOU</td>
    <td class="airport_name">Houston William P Hobby Airport</td>
</tr>
<tr>
    <td class="airport_code">IAD</td>
    <td class="airport_name">Dulles International Airport</td>
    <td class="airport_code">IAH</td>
    <td class="airport_name">George Bush Intercontinental Airport</td>
    <td class="airport_code">IND</td>
    <td class="airport_name">Indianapolis International Airport</td>
</tr>
<tr>
    <td class="airport_code">JFK</td>
    <td class="airport_name">John F. Kennedy International Airport</td>
    <td class="airport_code">LAX</td>
    <td class="airport_name">Los Angeles International Airport</td>
    <td class="airport_code">LGA</td>
    <td class="airport_name">LaGuardia International Airport</td>
</tr>
<tr>
    <td class="airport_code">MEM</td>
    <td class="airport_name">Memphis International Airport</td>
    <td class="airport_code">MEX</td>
    <td class="airport_name">Sala Centurion American Internacional</td>
    <td class="airport_code">MDW</td>
    <td class="airport_name">Chicago Midway Airport</td>
</tr>
<tr>
    <td class="airport_code">MIA</td>
    <td class="airport_name">Miami International Airport</td>
    <td class="airport_code">MKE</td>
    <td class="airport_name">General Mitchell International Airport</td>
    <td class="airport_code">MRY</td>
    <td class="airport_name">Monterey Peninsula Airport</td>
</tr>
<tr>
    <td class="airport_code">MSN</td>
    <td class="airport_name">Dane County Regional Airport</td>
    <td class="airport_code">MSP</td>
    <td class="airport_name">Minneapolis-St. Paul International Airport</td>
    <td class="airport_code">OKC</td>
    <td class="airport_name">Oklahoma City Will Rogers World Airport</td>
</tr>
<tr>
    <td class="airport_code">OMA</td>
    <td class="airport_name">Eppley Airfield Omaha Int'l Airport</td>
    <td class="airport_code">ORD</td>
    <td class="airport_name">Chicago O'Hare International Airport</td>
    <td class="airport_code">ORF</td>
    <td class="airport_name">Norfolk International Airport</td>
</tr>
<tr>
    <td class="airport_code">SBN</td>
    <td class="airport_name">South Bend Regional Airport</td>
    <td class="airport_code">SDF</td>
    <td class="airport_name">Louisville International Airport</td>
    <td class="airport_code">SFO</td>
    <td class="airport_name">San Francisco International Airport</td>
</tr>
<tr>
    <td class="airport_code">STL</td>
    <td class="airport_name">Lambert-St. Louis International Airport</td>
    <td class="airport_code">TVC</td>
    <td class="airport_name">Traverse City/Cherry Capital Airport</td>
    <td class="airport_code">YOW</td>
    <td class="airport_name">Ottawa International Airport</td>
</tr>
<tr>
    <td class="airport_code">YQG</td>
    <td class="airport_name">Windsor International Airport</td>
    <td class="airport_code">YQT</td>
    <td class="airport_name">Thunder Bay International Airport</td>
    <td class="airport_code">YYZ</td>
    <td class="airport_name">Toronto Pearson International Airport</td>
  </tr>
</table>

<h5>Hotels:</h5>

<img src="img/hotels_unl.png" width="715" height="168" border="0" usemap="#Map">
<map name="Map">
  <area shape="rect" coords="3,8,112,57" alt="Colorado Belle">
  <area shape="rect" coords="134,5,228,70" alt="DoubleTree">
  <area shape="rect" coords="254,5,327,64" alt="E-Z 8">
  <area shape="rect" coords="356,5,451,69" alt="Hawthorne Ayres">
  <area shape="rect" coords="469,6,572,70" alt="Hotel Velas Vallarta">
  <area shape="rect" coords="591,5,705,79" alt="Hyat">
  <area shape="rect" coords="4,94,106,160" alt="Marriott">
  <area shape="rect" coords="137,90,215,162" alt="Premier Inn">
  <area shape="rect" coords="234,91,334,160" alt="Sands Regency">
  <area shape="rect" coords="354,85,448,157" alt="Sheraton">
  <area shape="rect" coords="474,88,568,159" alt="Travel Inn">
  <area shape="rect" coords="591,92,704,161" alt="Westin">
</map>
<h5>Partner Hotspots:</h5>

<table class="partner_hotspots" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Centro De Convenciones Cancun</td>
    <td>Rosemont Convention Center</td>
    <td>The Americana at Brand</td>
  </tr>
  <tr>
    <td>Fran's Cafe</td>
    <td>Shopping Iguatemi Campinas</td>
    <td>The Grove</td>
  </tr>
  <tr>
    <td>Home Depot Center</td>
    <td>Shopping Villa Lobos</td>
    <td>The Merchandise Mart</td>
  </tr>
  <tr>
    <td>Manhattan Town Center</td>
    <td>Soldier Field</td>
    <td>Trade &amp; Exhibition Centre</td>
  </tr><tr>
    <td>Oakland Mall</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<div class="footer">
<p>*Amazon.com is not a sponsor of this promotion. Except as required by law, GCs cannot be transferred for value or redeemed for cash. GCs may be used only for purchases of eligible goods on Amazon.com or certain of its affiliated websites. For complete terms and conditions, see <span class="boingored">www.amazon.com/gc-legal</span>. GCs are issued by ACI Gift Cards, Inc., a Washington corporation. &copy;,&reg;,&trade; Amazon.com Inc. and/or its affiliates, 2012.</p>
<p>You must maintain your active Boingo Unlimited account for at least 60 days to receive the $10 Amazon.com Gift Card from Boingo.</p>
</div>
END;

?>