<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search images</title>
<script type="text/javascript" src="http://ripclaw:8890/shared/jscript/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="http://ripclaw:8082/static/css/common/generic.css" />
<link rel="stylesheet" href="main.css" />
</head>

<body>

<div class="mainWrapper">

<?php include('../header.php');?>

<div id="">

<h1>Search images</h1>

<p class="fontsize_14">You can search  boingo.com and boingohotspot.net image repositories. Simply start typing in textbox below, for example type: <u>redcross</u>.<br /><span style="color:red;">NOTE: Image previews will only show if results are less than 250 (to save page load time)</span></p>

<form id="search1" name="search1" action="">
<input class="display_block width_465 margin_0_auto" name="search" type="text" id="searchterms" /><br />
<label>Minimum Width</label><input class="display_block width_50" name="min_width" type="text" id="min_width" /><br />
<label>Maximum Width</label><input class="display_block width_50" name="max_width" type="text" id="max_width" /><br />
<!-- <input class="display_block margin_0_auto" name="submit" type="submit" value="Search" /> -->
</form>

<div id="resultsWrapper"></div>

</div>

<?php include('../footer.php');?>

<!-- main Wrapper --></div><!--END-->

<script type="text/javascript">

$(document).ready(function(){
	
	//$('#search1').submit(function(){
	$('#searchterms').keyup(function(){
		
		// empty the results div from possible previous search results
		$("#resultsWrapper").empty();
			
				$.ajax({
				  url: "results.php",
				  type: "POST",
				  data: {search: $('#searchterms').val()},
				  cache: false }).done(function( html ) {
					  $("#resultsWrapper").append( $(html).find('#searchResults'));
				});
				
				// prevent default action of the form
				return false;
		
		
	}); // end of submit
		
		

	
}) // end of document ready

</script>

</body>
</html>