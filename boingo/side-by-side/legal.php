<?php

include_once ($_SERVER["DOCUMENT_ROOT"] . '/shared/includes/header_footer.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . "/global/root.php");
include_once (SHARED_ROOT . "/functions/functions.php");

function start($parser,$element_name,$element_attrs) {
  switch($element_name) {
    case "SIMPLEDOCUMENT":
      //Output header, we're already taking care of this, so no need to handle it here.
      break; 
    
    case "DOCUMENTTITLE":
      echo '<h1 class="h1title">';
      break; 
    
    case "DOCUMENTSUBTITLE":
      echo '<p><strong class="copyHeader" style="text-transform: uppercase;">';
      break;  
   
    case "DOCUMENTDESCRIPTION":
      echo '<p class="description">';
      break;
      
    case "SECTIONTITLE":
      echo '<p><strong class="copyHeader">';
      break; 
    
    case "DOCUMENTSECTION":
      echo '<div class="section">';
      break;
    
    case "SUBSECTION":
      echo '<div class="subSection">';
      break;  
  }
}

function end_tag($parser, $name) {
  switch($name) {
    case "SIMPLEDOCUMENT":
      //Output footer, we're already taking care of this, so no need to handle it here.
      break;
      
    case "DOCUMENTTITLE":
      echo '</h1>';
      break;  
    case "DOCUMENTSUBTITLE":
      echo '</strong></p>';     
      break;
      
    case "DOCUMENTDESCRIPTION":
      echo '</span></p>';
      break;       
      
    case "SECTIONTITLE":
      echo '</strong></p>';
      break;
      
    
    case "DOCUMENTSECTION":
      echo '</div>';
      break;      
    
    case "SUBSECTION":
      echo '</div>';
      break;  
  }
}
function char($parser,$data) {
  echo $data;
}
  
function print_parsed_doc($xml_file_name) {
  
  if(substr($xml_file_name, -4, 4) == ".xml") {  
    $xmlstr = implode('', file($xml_file_name));
    $parser = xml_parser_create('UTF-8');
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1); 
    xml_set_element_handler($parser, "start", "end_tag");
    xml_set_character_data_handler($parser,"char");
    xml_parse($parser, $xmlstr);
    xml_parser_free($parser);
  } else {
    echo implode('', file($xml_file_name));
  }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<html>
<head>

<?php
    $cssFileName = getCSSFile();
    $css	=	C01_ROOT."shared/css/".$cssFileName.".php";
    // load apple-specific viewport meta tags
    if ($cssFileName="membership-mobile")	{
        echo '<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">';
    } else if($cssFileName="membership-ipad ")	{
        echo '<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />';
    } else {
        // do nothing
    };
?>  


	<!-- Membership Client -->
	<meta http-equiv="X-UA-Compatible" content="IE=6" /> 
		<title>Boingo Wireless | Signup Please Check Your Email</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

	<meta name="keywords" content="wireless plan,wireless internet provider,wireless internet access,wireless internet connection,wireless internet service provider,wireless internet card,compare wireless plan,best wireless plan,broadband wireless internet,mobile internet access,mobile internet service,wireless service plan,mobile wireless plan,wireless internet company,mobile internet connection,free wireless hotspots,wi fi service,wifi service,wireless mobile internet service,wireless interet plan,pay as you go wireless plan,free wi fi hotspots">
	<meta name="description" content="Wireless Plans at Boingo. Specializing in wireless internet providers, wireless internet access, wireless internet connections and wireless internet service providers">
	<meta name="robots" content="index,follow">
	<!-- Wireless Plan, Wireless Internet Provider, Wireless Internet Access, Wireless Internet Connection, Wireless Internet Service Provider -->
	<script language="JavaScript" src="http://10.1.2.131:8888/shared/jscript/SignupScriptTop.js"></script>
	
	<link rel="icon" type="image/ico" href="http://10.1.2.131:8888/shared/img/b.ico">

	<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/ClientDetect.js"></script>

	<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/resDetect.js"></script>
	<script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/jquery-1.4.1.min.js"></script>
	<script src="http://10.1.2.131:8888/signup/jscript/jquery.periodicalupdater.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://10.1.2.131:8888/shared/jscript/mouseovers.js"></script>
	
	<script>
		var a = getAgent();
		if (a=="lrg")	{
			document.write('<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />');
		}
		else if	(a=="med")	{
			document.write('<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">');
		} else if (a=="medAndroid") {
			document.write('<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">');
		}
		document.write('<link href="http://10.1.2.131:8888/shared/css/' + getStyle(getAgent()) + '.php?width= ' + GetWidth() + '&height= ' + GetHeight() + '" rel="stylesheet">')
	</script>
    
    <link rel="stylesheet" href="/shared/css/legal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/shared/css/boingo-style-main.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/shared/css/lib.css" type="text/css" media="screen" />
    
    <!--[if IE]>

    <script>
        var a = getAgent();
        if (a=="lrg")	{
            document.write('<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />');
        }
        else if	(a=="med")	{
            document.write('<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">');
        }
        document.write('<link href="http://10.1.2.131:8888/shared/css/' + getStyle(getAgent()) + '-IE.php?width= ' + GetWidth() + '&height= ' + GetHeight() + '" rel="stylesheet">');
		$(function(){
	        $('.submitBtn').hover(
	                        // mouseover
	                        function(){ $(this).addClass('submitBtnHover'); },
	                        // mouseout
	                        function(){ $(this).removeClass('submitBtnHover'); }
	        );            
		});         
	</script>
    <![endif]-->
	
	


	
<meta name="containerId" content="memberVerification">


<SCRIPT language="Javascript">

	function provisionClient(username, password) {
		try {
			window.external.setCredentials(username, password);
		}
		catch(err) {
		}
	}

	function activateClient() {
		try {
			window.external.activate();
		}
		catch(err) {
		}
	}

	function closeClient() {
		try {
			window.external.close();
		}
		catch(err) {
		}
	}
	
</SCRIPT>



<script>
var activated = false;

$.ajaxSetup ({  
	cache: false  
}); 

function prematureClick(){
	$('#stopClickingMe').show();
}

</script>




</head>
<body class="bar" id="location" style="padding-right:25px;">
<!-- client -->
	<div id="logo"><img src="http://10.1.2.131:8888/shared/img/cdot.gif"></div>
	<div>
		<div>

<?
sanitize_get_vars();

$filename	=	'bcana';
$ls = $_GET['ls'];

if($ls == 1) {
  $ls = true;  
  $lang = $_GET['lang'];
  $supported_langs = explode(',' , $_GET['sl']);
  if($lang != "en") //any language other than en has the language attached to the filename
    $filename .= "_" . $lang;
} else {
  $ls = false;  
}

//wwwheadpopup($filename, $ls, $lang, $supported_langs);

if(file_exists(SHARED_ROOT . '/docs/'.$filename.'.htm')) {
  $xml_file_name = SHARED_ROOT . '/docs/'.$filename.'.htm';
} else if(file_exists(SHARED_ROOT . '/docs/'.$filename.'.xml')){
  $xml_file_name = SHARED_ROOT . '/docs/'.$filename.'.xml';  
}

print_parsed_doc($xml_file_name); 

?>
</div>
</div>

</body>
</html>