<?php

/*
	*************************************************************************
	functions    
	*************************************************************************

*/

function preselect($value){
	
	$language = "";
	$currency = "";
	
	if($_GET['lang'] && ($_GET['lang']=='en' || $_GET['lang']=='es')){
		$language = $_GET['lang'];
	}
	
	if($_GET['curr'] && ($_GET['curr']=='usd' || $_GET['curr']=='mxn')){
		$currency = $_GET['curr'];
	}
	
	$pattern = "lang=".$language."&curr=".$currency;
	
	if($pattern == $value){
		echo ' selected="selected" ';
	} else {
		// nothing;
	}	
} // EOF

function ie8orBelow(){
	
	$uas = $_SERVER['HTTP_USER_AGENT'];
	
	if(preg_match( '/MSIE ([0-9]{1,}[\.0-9]{0,})/', $uas, $matches )){
		$version = floatval($matches[1]);
		if($version <= 8){
			return true;
		} else {
			return false;	
		}
	} else {
		return false;	
	}
	
} // EOF

function passThroughAndSetCookie(){
	
	$visitTrue = true;
	setcookie('visited',$visitTrue,time() + (86400 * 1)); // 86400 = 1 day

} // EOF

function httpRefererAvailable(){
	
	if(isset($_SERVER['HTTP_REFERER'])){
		$pattern = "/10.1.2.131|telmex.com|infinitummovil.net|boingo.com/i";
		$uas = $_SERVER['HTTP_REFERER'];
		
				if(preg_match($pattern, $uas)){
					return true;
				} else {
					return false;
				}
		
	} else {
		return false;	
	}
	
} // EOF

function redirectToBoingoHome(){
	header("Location: /");
	exit;	
}


/*
	*************************************************************************
	Using $_SERVER['HTTP_REFERER'] to show content only for users coming from
	certain domains (See below). Then setting a cookie so subsequent page loads
	triggered by language/currency selector doesn't get rejected 
	*************************************************************************

*/

if(!isset($_COOKIE['visited'])){

		// if http_referer is present and matches pattern
		if(httpRefererAvailable()) {
			passThroughAndSetCookie();
			
		// if UAS matches IE 8 or below
		} else if(ie8orBelow()) {
			passThroughAndSetCookie();
			
		// else redirect to boingo.com homepage and stop execution of page
		} else {
			//redirectToBoingoHome();
		}

} // end of cookie check if conditional


/*
	*************************************************************************
	Checking for url parameters to change content, if none set defaults and 
	reload the page with params in url
	*************************************************************************

*/

if($_GET['lang'] && ($_GET['lang']=="en" || $_GET['lang']=="es")){
	$language = $_GET['lang'];
	$language_css = $_GET['lang'];
} else {
	// default
	$language = 'es';
	$language_css = 'es';
}

if($_GET['curr'] && ($_GET['curr']=="usd" || $_GET['curr']=="mxn")){
	$currency = $_GET['curr'];
	$currency_css = $_GET['curr'];
} else {
	// default
	$currency = 'usd';
	$currency_css = 'usd';	
}

// if no url params then reload the page and put defaults in

if( !($_GET['lang']) || !($_GET['curr']) ){
	header("Location: ?lang=$language&curr=$currency");
	exit;
}

/*
	*************************************************************************
	Content array for english and spanish strings
	*************************************************************************

*/

$content = array(
      // common variables
	  "signup_url" => $signup_url="https://c01.client.boingo.com/signup/SignupStart.app?",   
   	  "SCC" => $scc = "TELMEX003",
	  
	  // english =================================================================
	  "en" => array(
	  
	     "lang_code" => $lang_code = "en",
		 "main_header" => "Introducing the World's Largest Wi-Fi Network!",  
	     "get_online_button_text" => "Get Online Now!",
		 "features" => "<div class=\"features\">With Boingo you get ...<br><br>
            <p>No Contracts</p>
            <p>No Cancellation Fees</p>
            <p>24/7<br>Customer Support</p>
            <p>Up to 3x Faster than Mobile Broadband (3G)</p>
            Access to 700,000 Hotspots Worldwide</div>",
		"img_quote" => "https://c01.client.boingo.com/shared/media/img/quote_0.gif",
		"bubble_hsc" => '<p id="one">BOINGO</p>
                <p id="two"> IN MORE THAN</p>
                <p id="three">700,000 HOTSPOTS</p>
                <p id="four"> WORLDWIDE!</p>',
		 
		 // plan 1 .....................
		 "Boingo Unlimited" => array(
		    "name" => "Boingo <b>Unlimited</b>",
			"price" => array(
			   "usd" => array(
			      "symbol" => "\$",
				  "actual" => 4.98,
				  "interval" => "per month",
				  "description" => "Access unlimited Wi-Fi at thousands of hotspots throughout the Americas for just $4.98 per month for the 1st 3 months, just $9.95 per month thereafter.",
				  "signup_link" => $signup_url."PROMO=UNUO3052USD0&SCC=TELMEX003&PLANTYPE=UNLIMITED&lang=en",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 75,
				  "interval" => "MXN per month",
				  "description" => "Access unlimited Wi-Fi at thousands of hotspots throughout the Americas for just $75 MXN per month for the 1st 3 months, just $150 MXN per month thereafter.",
				  "signup_link" => $signup_url."PROMO=UNUO3052MXN0&SCC=TELMEX003&PLANTYPE=UNLIMITED&lang=en",
			   ),
			),
			
			"stats1" => "600+ Airports<br>Worldwide",
			"stats2" => "25,000+ Hotels<br>(Marriott&reg;, Sheraton&reg; & more)",
			"stats3" => "Plus<br> 70,000+ Cafés"	
		 ),
		 
		 // plan 2 .....................
		 "Boingo Mobile" => array(
		    "name" => "Boingo <b>Mobile</b>",
			"price" => array(
			   "usd" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 5.95,
				  "interval" => "per month",
				  "description" => "Connect to Wi-Fi at 700,000 hotspots worldwide on your smartphone or tablet.",
				  "signup_link" => $signup_url."PROMO=BOM01595USD0&SCC=TELMEX003&PLANTYPE=MOBILE&lang=en",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 100,
				  "interval" => "MXN per month",
				  "description" => "Connect to Wi-Fi at 700,000 hotspots worldwide on your smartphone or tablet.",
				  "signup_link" => $signup_url."PROMO=BOM01595MXN0&SCC=TELMEX003&PLANTYPE=MOBILE&lang=en",
			   ),
			),
		 ),
		 
		 // plan 3 .....................
		 "Unlimited Worldwide" => array(
		    "name" => "Unlimited <b>Worldwide</b>",
			"price" => array(
			   "usd" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 19.95,
				  "interval" => "per month",
				  "description" => "Connect to Wi-Fi on any two devices at hotspots worldwide for just $19.95 per month.",
				  "signup_link" => $signup_url."PROMO=BUW01190USD0&SCC=TELMEX003&PLANTYPE=WORLDWIDE&lang=en",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 250,
				  "interval" => "MXN per month",
				  "description" => "Connect to Wi-Fi on any 2 two devices at hotspots worldwide for just $250 MXN per month.",
				  "signup_link" => $signup_url."PROMO=BUW01190MXN0&SCC=TELMEX003&PLANTYPE=WORLDWIDE&lang=en",
			   ),
			),
		 ),		 
	  ),
	  
	  // spanish =================================================================
	  "es" => array(
	  
	     "lang_code" => $lang_code = "es",
		 "main_header" => "<span style=\"font-size:16px;\">¡Client infinitum a la red Wi-Fi más grande del mundo!</span>",  
	     "get_online_button_text" => "Conéctese en línea ahora",
		 "features" => "<div class=\"features\" style=\"font-size:10px;\">Con Boingo disfrute...<br><br>
            <p>Sin contraltos</p>
            <p>Sin tarifas de cancelación</p>
            <p>Servicio de atención al cliente las 24 horas del día</p>
            <p>Hasta 3 veces más rápido que la banda ancha móvil (3G)</p>
            Obtenga 700 000 puntos de acceso en todo el mundo</div>",
		"img_quote" => "https://c01.client.boingo.com/shared/media/img/quote_3_es.gif",
		"bubble_hsc" => '<p id="two">¡Boingo está en más de <nobr style="color:black;">700 000</nobr></p>
                <p id="three">Hotspots</p>',  
		 
		 // plan 1 .....................
		 "Boingo Unlimited" => array(
		    "name" => "Boingo <b>Unlimited</b>",
			"price" => array(
			   "usd" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => "4.98",
				  "interval" => "por mes",
				  "description" => "Acceso Wi-Fi ilimitado a miles de puntos de acceso en toda América por solo $ 4.98 por mes durante los primeros 3 meses, y solo $9.95 por mes a partir de allí.",
				  "signup_link" => $signup_url."PROMO=UNUO3052USD0&SCC=TELMEX003&PLANTYPE=UNLIMITED&lang=es",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 75,
				  "interval" => "MXN por mes",
				  "description" => "Acceso Wi-Fi ilimitado a miles de puntos de acceso en toda América por solo $75 MXN por mes durante los primeros 3 meses, y solo $150 MXN por mes a partir de allí.",
				  "signup_link" => $signup_url."PROMO=UNUO3052MXN0&SCC=TELMEX003&PLANTYPE=UNLIMITED&lang=es",
			   ),
			),
			
			"stats1" => "Más de 700 aeropuertos en todo el mundo",
			"stats2" => "Más de 25 000<br />hoteles",
			"stats3" => "Más de 70 000<br />cafeterías"	
		 ),
		 
		 // plan 2 .....................
		 "Boingo Mobile" => array(
		    "name" => "Boingo <b>Mobile</b>",
			"price" => array(
			   "usd" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => "5.95",
				  "interval" => "por mes",
				  "description" => "Conéctese a Wi-Fi en los 700 000 puntos de acceso de todo el mundo en su teléfono inteligente o tablet.",
				  "signup_link" => $signup_url."PROMO=BOM01595USD0&SCC=TELMEX003&PLANTYPE=MOBILE&lang=es",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 100,
				  "interval" => "MXN por mes",
				  "description" => "Conéctese a Wi-Fi en los 700 000 puntos de acceso de todo el mundo en su teléfono inteligente o tablet.",
				  "signup_link" => $signup_url."PROMO=BOM01595MXN0&SCC=TELMEX003&PLANTYPE=MOBILE&lang=es",
			   ),
			),
		 ),
		 
		 // plan 3 .....................
		 "Unlimited Worldwide" => array(
		    "name" => "Unlimited <b>Worldwide</b>",
			"price" => array(
			   "usd" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => "19.95",
				  "interval" => "por mes",
				  "description" => "Conéctese a Wi-Fi en cualquiera de los dos dispositivos en los puntos de acceso en todo el mundo por solo $19.95 por mes.",
				  "signup_link" => $signup_url."PROMO=BUW01190USD0&SCC=TELMEX003&PLANTYPE=WORLDWIDE&lang=es",
			   ),
			   "mxn" => array(
			      "promo" => "",
			      "symbol" => "\$",
				  "actual" => 250,
				  "interval" => "MXN por mes",
				  "description" => "Conéctese a Wi-Fi en cualquiera de los dos dispositivos en los puntos de acceso en todo el mundo por solo $250 MXN por mes.",
				  "signup_link" => $signup_url."PROMO=BUW01190MXN0&SCC=TELMEX003&PLANTYPE=WORLDWIDE&lang=es",
			   ),
			),
		 ),	 
	  ),
   
   

); // end of content array

?>