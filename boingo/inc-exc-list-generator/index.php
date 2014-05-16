<?php

function print_array_inside_textarea($arr){
	$arr = array_unique($arr); /* added to remove duplicate entries */
	natcasesort($arr);
	foreach ($arr as $element) {
		echo $element . "\r\n";
	}
}

function is_array_element_empty($var){
	if (empty($var)) {
		// returning false removes the empty element from the array
		return false;	
	} else {
		return true;	
	}
}

function hsx_return_as_array($attribute='id'){
	
	// path to the hotspotsite.xml file on boingo.aero (do not use https)
	$file = 'http://www.boingo.aero/data/config/hotspotsite.xml';
	
	// use php built in simplexml to load the file
	$xml = simplexml_load_file($file);
	//var_dump($xml);
	
	// initialize an empty array, will add elements to it below
	$arr_Venues = array();
	
	foreach($xml->site as $site){
		// before adding to array, convert to uppercase
		$newElement = strtoupper($site->attributes()->$attribute);
		// add to array
		array_push($arr_Venues, $newElement);
	}
	
	// Array has been constructed, now sort it
	sort($arr_Venues);
	
	// Last step, return the array
	return $arr_Venues;
} // eof hsx_return_as_array

/*
$venues_all = array('ABZ', 'ATLAA', 'ATLBOINGO', 'ATLOF', 'AUS', 'AZO', 'BIL', 'BKK', 'BNA', 'BUF', 'BWI', 'BZN', 'CBB', 'CAM', 'CGR', 'CWS', 'DBC', 'DEN', 'DCAR', 'DCA', 'DSM', 'DTW', 'EDI', 'ELP', 'EWR', 'GLA', 'GEG', 'GRR', 'GSO', 'HDC', 'HOU', 'IAD', 'IADR', 'IAH', 'JAC', 'JFK', 'JWR', 'KKD', 'KKW', 'LGA', 'LAL', 'LGW', 'LHR', 'LIN', 'MDW', 'MEM', 'MKE', 'MRT', 'MRTX', 'MRY', 'MSP', 'MXP', 'NYS', 'OKC', 'ORD', 'ORF', 'PET', 'PHF', 'PWM', 'RCC', 'SBN', 'SDF', 'SF0', 'SJU', 'SMO', 'SOU', 'STL', 'STN', 'SWF', 'TCJ', 'TCO', 'TRD', 'TOL', 'TVC', 'UMC', 'UMK', 'UMM', 'UNV', 'WSF', 'YEG', 'YHM', 'YOW', 'YQG', 'YQQ', 'YQT', 'YXX', 'YYJ', 'YYZ', 'ZOO', 'ZRH');
*/

// pulling in venues from hotspotsite.xml file on aero
$venues_all = hsx_return_as_array();

if (isset($_POST['TAChild'])) {
	
	$output1 = "";
	$output1 .= "<h4>All venues (" . count($venues_all) . ")</h4>";
	$output1 .= "<div>";
	foreach($venues_all as $venues) {
		$output1 .= $venues . ', ';	
	}
	$output1 .= "</div>";
	
	$inclusion_list = $_POST['TAChild'];
	$inclusion_list = strtoupper($inclusion_list);
	$inclusion_list = preg_replace('/\n/', ',', $inclusion_list);
	$inclusion_list = preg_replace('/\s+/', ',', $inclusion_list);
	$inclusion_list = preg_replace('/,+/', ',', $inclusion_list);
	$inclusion_list_array = explode(',', $inclusion_list);
	$inclusion_list_array = array_filter($inclusion_list_array, "is_array_element_empty");
	
	$output2 = "";
	$output2 .= "<h4>Inclusion list (" . count($inclusion_list_array) . ")</h4>";
	
	foreach($inclusion_list_array as $inclusion_list_array_e){
		$output2 .= $inclusion_list_array_e . ', ';
	};
	
	$exclusion_list_array = array_diff($venues_all, $inclusion_list_array);
	$output3 = "";
	$output3 .= "<h4>Exclusion list (" . count($exclusion_list_array) . ")</h4>";
	$output3 .= "<div>";
	foreach($exclusion_list_array as $exclusion_list_array_e) {
		$output3 .= $exclusion_list_array_e . ', ';	
	}
	//$output3 = rtrim($output3, ',');
	$output3 .= "</div>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inclusion/Exclusion list generator</title>
<link href="omntr-xcl.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="inclusion-exclusion.js"></script>
</head>

<body>

<h1>Inclusion/Exclusion List generator</h1>
<p>Enter your inclusion list below <span class="form_inclusion_list">(green box)</span> and click the button to generate the <span class="form_exclusion_list">exclusion</span> list.<br />
You may enter values one on each line, separated by commas or spaces, they could also be in lower case, results will be capitalized and sorted alphabetically.</p>
<?php
if (isset($_POST['TAChild'])) {
	$not_in_list = "";
	foreach($inclusion_list_array as $value){
		 if (!in_array($value, $venues_all)) {
			$not_in_list .= "<u>" . $value . "</u>, ";
			$errors_found='';	
		 } else {
			$error_free='';
		 }
	}
	if (isset($errors_found)) {
		echo "<div class='error'><strong style='color:red'>WARNING:</strong> The following location(s) entered in the inclusion list were not found in the master list, please check your input!<br>" . $not_in_list . "</div>";
	} else if (isset($error_free)) {
		echo "<div class='error_free'><strong>SUCCESS:</strong> No errors were detected ... an exclusion list has been generated :)</div>";
	}
}
?>

<form name="formVenues" method="post" action="index.php">
<input class="" name="" type="reset" value="Reset" onclick="window.location.href=window.location.href"/>
<input class="generate" name="" type="submit" value="Generate Exclusion List!"/>
<table class="table_inc_exc_lists" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">All venues (<?php echo count($venues_all); ?>)</th>
    <th scope="col">Inclusion (<?php echo count($inclusion_list_array); ?>)</th>
    <th scope="col">Difference (Exclusion) (<?php echo count($exclusion_list_array); ?>)</th>
  </tr>
  <tr>
    <td><textarea class="form_complete_list" name="TAParent" cols="20" rows="20"><?php print_array_inside_textarea($venues_all); ?></textarea></td>
    <td><textarea class="form_inclusion_list" name="TAChild" cols="20" rows="20"><?php if(isset($_POST['TAChild'])){print_array_inside_textarea($inclusion_list_array);}?></textarea></td>
    <td><textarea class="form_exclusion_list" name="TADiff" cols="20" rows="20"><?php if(isset($_POST['TAChild'])){print_array_inside_textarea($exclusion_list_array);}?></textarea></td>
  
  
  </tr>
</table>
<input class="" name="" type="reset" value="Reset" onclick="window.location.href=window.location.href"/>
<input class="generate" name="" type="submit" value="Generate Exclusion List!"/>
</form>

<hr />
<?php

// if no errors are found then show output below
if (!isset($errors_found)) {

	echo $output1; 
	echo $output2;
	echo $output3;

}
?>


</body>

</html>