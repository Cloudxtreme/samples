<?php 

require_once("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All images</title>
</head>

<body>

<?php
$connection = mysql_connect('localhost', 'cms', 'w0nd3rful');

connectToDB($connection);

$result = mysql_query("SELECT * FROM all_images");

while($row = mysql_fetch_array($result)){
	
	$field_directory = $row['directory'];
	$nondbfield_webpath = replaceLocalPath_with_webPath($field_directory);
	$field_image = $row['image'];
	
	// echo $field_directory . " - " . $nondbfield_webpath . " - " . $field_image . "<br />";
	$full_img_path = $nondbfield_webpath.'/'.$field_image;
	
	echo "<a href=\"$full_img_path\" target=\"_blank\">" . $full_img_path . "</a><br />";
	echo "<img src=\"$full_img_path\" /><br />";
		
	
}

disconnectFromDB($connection);



?>

</body>
</html>