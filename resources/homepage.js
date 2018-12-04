$(document).ready(function() {

    $('input.checkboxss').on('change', function() {
	    $('input.checkboxss').not(this).prop('checked', false);
	});
	
});