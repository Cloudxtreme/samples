
function getAgent() {
	
	if (// navigator.userAgent.match(/Android/i)||
        navigator.userAgent.match(/iPhone/i)||
        navigator.userAgent.match(/iPod/i)||
        navigator.userAgent.match(/Mozilla(.*)AppleWebKit(.*)Pre/i)) {
		theAgent = "med";
		//alert(pageStyle);
	} else if (navigator.userAgent.match(/android/i)) {
		theAgent = "medAndroid";
	} else if (navigator.userAgent.match(/iPad/i)) {
		theAgent = "lrg";
		//alert(pageStyle);
	} else {
        theAgent = "laptop";
	}
	
return theAgent;
	
} // eof getAgent

var theAgent = getAgent();

function getStyle(theAgent)	{
	
	switch (theAgent) {
		
		case "med":
		pageStyle = "membership-mobile";
		break;
		
		case "medAndroid":
		pageStyle = "membership-android";
		break;
		
		case "lrg":
		pageStyle = "membership-ipad";
		break;
		
		default:
		pageStyle = "membership-laptop";
		
	} // eo switch statement

return pageStyle;

} // eof getStyle()

// Added by hd 10/12/2010
// viewportAndStylesheet function added <meta> tags to document based on useragent (returned from another function
function viewportAndCss(agent){

	var a = agent;
	
	// if ipad
	if (a == "lrg")	{
		document.write('<meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" />');
	// if iphone
	} else if (a == "med") {
		document.write('<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">');
	// if android
	} else if (a == "medAndroid") {
		document.write('<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">');
	}
	
	// writes stylesheet include code on page
	document.write('<link href="/shared/css/' + getStyle(getAgent()) + '.php?width= ' + GetWidth() + '&height= ' + GetHeight() + '" rel="stylesheet">');	

}

function viewportAndCssIE(agent){
	
	viewportAndCss(agent);
	
	document.write('<link href="http://10.1.2.131:8888/shared/css/' + getStyle(getAgent()) + '-IE.php?width= ' + GetWidth() + '&height= ' + GetHeight() + '" rel="stylesheet">');
	
}
