$(document).ready(function() {

    $('input.checkboxss').on('change', function() {
	    $('input.checkboxss').not(this).prop('checked', false);
	});
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides fade");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        // slides change every 4 seconds
        setTimeout(showSlides, 4000); s
    }
	
});