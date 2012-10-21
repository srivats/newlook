/* Author:

*/

$(document).ready(function ($) { 
	
    //slider function
    $('.image-carousel').carousel({
  		interval: 2000
	});
    //testimonial slider
	$('.testimonials-carousel').carousel({
  		interval: 2000
	});	
	//colorbox
	$('a#colorbox').colorbox();
	//twitter feeds
	$('#tweets').tweetable({username: 'pixlpitch', limit: 3});
});

