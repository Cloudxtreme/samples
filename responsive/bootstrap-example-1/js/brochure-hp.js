

var pageHeight = window.innerHeight;

function setHeightToPercentageOfPage(elementId, desiredHeight){
	var el = document.getElementById(elementId);
	var h = desiredHeight / 100;
	var bodyHeight = window.innerHeight;
	el.style.height = (bodyHeight * h) + 'px'; 
}



setHeightToPercentageOfPage("hp1", 15);
setHeightToPercentageOfPage("hp2", 45);
setHeightToPercentageOfPage("hp3", 40);

window.onresize = function(){
	setHeightToPercentageOfPage("hp1", 15);
	setHeightToPercentageOfPage("hp2", 45);
	setHeightToPercentageOfPage("hp3", 40);
}

console.log("page height: " + pageHeight);