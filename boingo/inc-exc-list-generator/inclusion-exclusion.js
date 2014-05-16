$(document).ready(function(){
	
$('input.generate').click(function(){
		if ( $('textarea.form_inclusion_list').attr('value') == '' ) {
			alert('Oops! you MUST fill out the inclusion list first!');
			return false;
		}
	}
);	
	
})