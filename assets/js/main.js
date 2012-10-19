/* Author:

*/

$(document).ready(function ($) { 
	
    //slider function
    $('.image-carousel').carousel({
  		interval: 2000
	});

	$('.testimonials-carousel').carousel({
  		interval: 2000
	});
	//twitter feeds
	$('#tweets').tweetable({username: 'pixlpitch', limit: 3});
});

