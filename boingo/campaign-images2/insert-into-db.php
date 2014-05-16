<?php 

require_once("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$connection = mysql_connect('localhost', 'cms', 'w0nd3rful');
connectToDB($connection);

storeDirImagesInDB('C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\wgcontent\images');
storeDirImagesInDB('C:\smartsvn-www.boingo.com\trunk\boingo_website\html\shared\media\img');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\images');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\img');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Campaigns\Offerpod\Images\Sponsored\shopping_portal');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Laptop');
storeDirImagesInDB('C:\smartsvn-www.boingohotspot.net\boingo_aero\web\Static\Image\Mobile');

disconnectFromDB($connection);



?>

</body>
</html>