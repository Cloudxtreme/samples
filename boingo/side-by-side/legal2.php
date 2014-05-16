<?
include_once ($_SERVER["DOCUMENT_ROOT"] . '/shared/includes/header_footer.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . "/global/root.php");
include_once (SHARED_ROOT . "/functions/functions.php");
?>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
	<meta name="robots" content="noindex,nofollow">
    <?
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/global/root.php" );
	include_once (SHARED_ROOT . '/constants/constants.php');
	?>
	<script type="text/javascript" src="<?= C01_ROOT ?>shared/jscript/ClientDetect.js"></script>
	<script type="text/javascript" src="<?= C01_ROOT ?>shared/jscript/resDetect.js"></script>
	<?
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
	<style>
		<?php echo file_get_contents($css); ?> 
    </style>
    <!--[if IE]>
    <style>
		<?php echo file_get_contents(C01_ROOT."shared/css/membership-laptop-ie.php"); ?> 
	</style>
    <![endif]-->
    
</head>
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

wwwheadpopup($filename, $ls, $lang, $supported_langs);

if(file_exists(SHARED_ROOT . '/docs/'.$filename.'.htm')) {
  $xml_file_name = SHARED_ROOT . '/docs/'.$filename.'.htm';
} else if(file_exists(SHARED_ROOT . '/docs/'.$filename.'.xml')){
  $xml_file_name = SHARED_ROOT . '/docs/'.$filename.'.xml';  
}

print_parsed_doc($xml_file_name); 

?>
</body>
</html>