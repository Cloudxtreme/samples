<?php require_once('../../../Connections/boingotoolsCN.php'); ?>
<?php require_once('../../../Connections/boingotoolsCN.php'); ?>
<?php 

require_once('../../../Connections/boingotoolsCN.php');
require_once('functions.php');

?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$var1_imgResults = "amazon";
if (isset($_POST['search'])) {
  $var1_imgResults = $_POST['search'];
}
mysql_select_db($database_boingotoolsCN, $boingotoolsCN);
$query_imgResults = sprintf("SELECT * FROM all_images WHERE image like %s ORDER BY width asc", GetSQLValueString("%" . $var1_imgResults . "%", "text"));
$imgResults = mysql_query($query_imgResults, $boingotoolsCN) or die(mysql_error());
$row_imgResults = mysql_fetch_assoc($imgResults);
$totalRows_imgResults = mysql_num_rows($imgResults);$var1_imgResults = "amazon";
if (isset($_POST['search'])) {
  $var1_imgResults = $_POST['search'];
}
$width_min_imgResults = "0";
if (isset($_POST['width_min']) || $_POST['width_min']!='') {
  $width_min_imgResults = $_POST['width_min'];
}
$width_max_imgResults = "999999";
if (isset($_POST['width_max']) || $_POST['width_max']!='') {
  $width_max_imgResults = $_POST['width_max'];
}
mysql_select_db($database_boingotoolsCN, $boingotoolsCN);
$query_imgResults = sprintf("SELECT * FROM all_images WHERE image like %s AND (width<=%s AND width>=%s) ORDER BY width asc", GetSQLValueString("%" . $var1_imgResults . "%", "text"),GetSQLValueString($width_max_imgResults, "int"),GetSQLValueString($width_min_imgResults, "int"));
$imgResults = mysql_query($query_imgResults, $boingotoolsCN) or die(mysql_error());
$row_imgResults = mysql_fetch_assoc($imgResults);
$totalRows_imgResults = mysql_num_rows($imgResults);

$var1_dirResults = "boingo_aero";
if (isset($_POST['search'])) {
  $var1_dirResults = $_POST['search'];
}
mysql_select_db($database_boingotoolsCN, $boingotoolsCN);
$query_dirResults = sprintf("SELECT distinct directory FROM all_images WHERE directory like %s ORDER BY directory asc", GetSQLValueString("%" . $var1_dirResults . "%", "text"));
$dirResults = mysql_query($query_dirResults, $boingotoolsCN) or die(mysql_error());
$row_dirResults = mysql_fetch_assoc($dirResults);
$totalRows_dirResults = mysql_num_rows($dirResults);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search results</title>
<link rel="stylesheet" href="http://ripclaw:8082/static/css/common/generic.css" />
<link rel="stylesheet" href="main.css" />
</head>

<body>

<div class="mainWrapper">

<?php include('header.php');?>

<div id="searchResults">

<h2>Image results</h2>

<p><em><b>"<?php echo $_POST['search']?>"</b></em> found in <u><?php echo $totalRows_imgResults ?></u> images.</p>

<?php if ($totalRows_imgResults > 0) { // Show if recordset not empty ?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col">Image Name</th>
      <th scope="col">Repo</th>
      <th scope="col">Local Path</th>
      <th scope="col">Prod Path</th>
      <th scope="col">width</th>
      <th scope="col">height</th>
      <th scope="col">preview</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <?php do { ?>
    
    <?php

		// determining color of the repo for display hint
		$repo = aero_or_com($row_imgResults['directory']);
		if ($repo == 'aero' ) {
			$bg_color='#999999';
		} else {
			$bg_color='#99cc99';
		}
			
	?>
    
      <tr>
        <td><?php echo $row_imgResults['image']; ?></td>
              
        <td style="background-color:<?=$bg_color?>">
			<?php 
			// show if image is in .aero or .com repo
			echo aero_or_com($row_imgResults['directory']);
			?>
        </td>
        
        <td><?php echo $row_imgResults['directory']; ?></td>
        
        <?php $prod_img_path = replaceLocalWebPath_with_prodWebPath(replaceLocalPath_with_webPath($row_imgResults['directory'])).'/'.$row_imgResults['image']; ?>
        <td><a href="<?=$prod_img_path?>" target="_blank"><?=$prod_img_path?></a></td>
        
        <td><?php echo $row_imgResults['width']; ?></td>
        <td><?php echo $row_imgResults['height']; ?></td>
        <td>
        
        <?php 
			// show image if results are less than 75
			if(($totalRows_imgResults > 0 && $totalRows_imgResults<250)){
		?>
        <img src="<?php echo replaceLocalPath_with_webPath($row_imgResults['directory']).'/'.$row_imgResults['image']; ?>" />
        <?php
			}
		?>
        </td>
        
        <td>&nbsp;</td>
      </tr>
      <?php } while ($row_imgResults = mysql_fetch_assoc($imgResults)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<h2>Directory results</h2>

<p><em><b>"<?php echo $_POST['search']?>"</b></em> found in <u><?php echo $totalRows_dirResults ?></u> directories.</p>
<?php if ($totalRows_dirResults > 0) { // Show if recordset not empty ?>
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col">Directory</th>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_dirResults['directory']; ?></td>
      </tr>
      <?php } while ($row_dirResults = mysql_fetch_assoc($dirResults)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
</div>

<?php include('footer.php');?>

<!-- main Wrapper --></div><!--END-->

</body>
</html>
<?php
mysql_free_result($imgResults);

mysql_free_result($dirResults);
?>
