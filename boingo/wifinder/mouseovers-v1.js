// START of jquery mouse functions   
$(function(){
		// ******************************************************
		// just update the 3 variables below with the proper class names
		// for the rest of the script to work
		var mouseoverClass = 'submitBtnHover'; // mouseover
		var mouseoutClass = 'mouseleave'; // mouseout
		var mouseclickClass = 'submitBtnDown'; // click
		
		// remove onmouseclick class on doc load (if it's there)
		$('.submitBtn').removeClass(mouseclickClass);
		
		// click
		$('.submitBtn').mousedown(function(){
			$(this).addClass(mouseclickClass);
			$(this).removeClass(mouseoverClass);
			$(this).removeClass(mouseoutClass);
			//alert("testing");
		})
		
		// onmouseenter
		$('.submitBtn').mouseenter(function(){
			// $(this).addClass(mouseclickClass);
			$(this).addClass(mouseoverClass);
			$(this).removeClass(mouseoutClass);
		})
	
		// onmouseleave
		$('.submitBtn').mouseleave(function(){
			$(this).addClass(mouseoutClass);
			$(this).removeClass(mouseoverClass);
			$(this).removeClass(mouseclickClass); // you can remove this to make down state stick
		})
		
		// *******************************************     
		
/* previous code by Brian, commented out by Harma
	$('.submitBtn').hover(
					// mouseover
					function(){ $(this).addClass('submitBtnHover'); },
					// mouseout
					function(){ $(this).removeClass('submitBtnHover'); }
	);            
*/


}); // END of jquery mouse functions  