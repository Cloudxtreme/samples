

var pageHeight = window.innerHeight;

function setHeightToPercentageOfPage(elementId, desiredHeight){
	var el = document.getElementById(elementId);
	var h = desiredHeight / 100;
	var bodyHeight = window.innerHeight;
	el.style.height = (bodyHeight * h) + 'px'; 
}

/*

This function sets height of div to viewable page.
If content of the div doesn't fit to the assigned height
(if it's overflowing) then set overflow to hide and possibly
add a little widget, for example a down arrow so people can see it

*/

function addElement (tagName, className, parentElementId) { 
	// Create a new, plain <span> element
	var newElement = document.createElement(tagName);
	newElement.className = className;

	// Get a reference to the element, before we want to insert the element
	var existingElementReference = document.getElementById(parentElementId);
	
	// Get a reference to the parent element
	var parentDiv = existingElementReference.parentNode;

	// Insert the new element into the DOM before reference element
	parentDiv.appendChild(newElement, existingElementReference);
}

function setScroll(elementId){
	var el = document.getElementById(elementId);
	window[elementId + "-original-height"] = el.offsetHeight;
	var bodyHeight = window.innerHeight;

	if (el.offsetHeight > bodyHeight) {
		el.style.height = (bodyHeight-50)+'px';
		el.style.overflow = 'hidden';
		addElement("div", "glyphicon glyphicon-arrow-down", "class-profile-content");
	}
}

// @todo: following needs to be refactored

// setting div heights on initial page load
setHeightToPercentageOfPage("hp1", 15);
setHeightToPercentageOfPage("hp2", 45);
setHeightToPercentageOfPage("hp3", 40);

setHeightToPercentageOfPage("profile-img1", 33);
setHeightToPercentageOfPage("profile-img2", 33);
setHeightToPercentageOfPage("profile-img3", 34);

setHeightToPercentageOfPage("about-img1", 34);

//setHeightToPercentageOfPage("class-profile-content", 100);
setScroll("class-profile-content");


// setting div heights on resize
window.onresize = function(){

	setHeightToPercentageOfPage("hp1", 15);
	setHeightToPercentageOfPage("hp2", 45);
	setHeightToPercentageOfPage("hp3", 40);

	setHeightToPercentageOfPage("profile-img1", 33);
	setHeightToPercentageOfPage("profile-img2", 33);
	setHeightToPercentageOfPage("profile-img3", 34);

	setHeightToPercentageOfPage("about-img1", 34);

	setScroll("class-profile-content");

}

console.log("page height: " + pageHeight);