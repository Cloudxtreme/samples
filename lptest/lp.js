$(document).ready(function(){

myPage = new LpTestPage (
	'.zone1 ul', // ul element selector
	'button[name="shuffleBtn', // shuffle button selector
	'.zone1', // zone1 selector
	'.zone2' // zone2 selector
);
myPage.setTallerContainerBorder();
myPage.setButtonAction();

/*
*
*
* @desc class contains methods to shuffle and create simple button
* event listener
* @param ulElem selector for the <ul> which contains the <li>s
* @param buttonElem selector for button which will shuffle the <li>s
* @param container1 selector for 'zone1' container
* @param container2 selector for 'zone2' container
* @author Harma Davtian
*
*/

function LpTestPage (ulElem, buttonElem, container1, container2) {

	// *************************************************
	// Properties
	// *************************************************
	this.list = ulElem; //'.zone1 ul';
	this.button = buttonElem; //'button[name="shuffleBtn"]';
	this.container1 = container1; // '.zone1'
	this.container2 = container2; // '.zone2'

	// *************************************************
	// Methods
	// *************************************************

	//
	//
	// @desc get list items from ul li's on the page, will
	// use class property which is a css selector target the
	// <ul> (not the <li>s)
	// @return array
	//
	//
	this.getContent = function() {
		var content = [];
		$(this.list + ' li').each(function(){
			content.push($(this).html());
		});
		//console.log(content);
		return content;
	}; // end of getContent()

	// 
	// 
	// @desc shuffle array script found on google, I tried doing myself
	// but gave up after a while and googled it, this is the
	// 'Fisher-Yates (aka Knuth) Shuffle'
	//
	//
	this.shuffle = function() {
		// calling getContent() method, targets <ul> and returns array of data
		var array = this.getContent();
		var currentIndex = array.length, temporaryValue, randomIndex ;

		// While there remain elements to shuffle...
		while (0 !== currentIndex) {
			// Pick a remaining element...
			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;

			// And swap it with the current element.
			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		}

		//console.log(array);
		return array;
	} // end of shuffle()

	//
	//
	// @desc outputs the shuffled array onto itself
	//
	//
	this.displayShuffledList = function () {
		var output = '';
		var array = this.shuffle();
		for (var i=0; i<array.length; i++) {
			output += '<li>' + array[i] + '</li>';
		};
		$(this.list).html(output);
	}; // end of displayShuffledList

	//
	//
	// @desc listener for button click
	//
	//
	this.setButtonAction = function () {
		$(this.button).on("click", function () {
			myPage.displayShuffledList();
		});
	}; // end of setButtonAction

	//
	// 
	// @desc set border class to taller element
	//
	//
	this.setTallerContainerBorder = function () {
		var zone1 = $(this.container1);
		var zone2 = $(this.container2);
		var zone1Height = zone1.height();
		var zone2Height = zone2.height();

		if (zone1Height > zone2Height) {
			zone1.addClass('border-right');
		} else {
			zone2.addClass('border-left');
		}
	}; // end of setTallerContainerBorder

} // end of class

}); // end of document ready