$(function(){

    // Service
    $('.slide_main').slick({
        centerMode: true,
        centerPadding: 0,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        speed: 500,
        autoplay: true,
        prevArrow: '<i class="fas fa-chevron-left"></i>',
        nextArrow: '<i class="fas fa-chevron-right"></i>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: 0,
                    slidesToShow: 3
                }
		},
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: 0,
                    slidesToShow: 2
                }
		}
		]
    });


    
// $('.slide_main').slick({
//     dots: true,
//     infinite: false,
//     speed: 300,
//     slidesToShow: 4,
//     slidesToScroll: 4,
//     responsive: [
//       {
//         breakpoint: 1024,
//         settings: {
//           slidesToShow: 3,
//           slidesToScroll: 3,
//           infinite: true,
//           dots: true
//         }
//       },
//       {
//         breakpoint: 600,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 2
//         }
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1
//         }
//       }
//     ]
//   });


  
	// Preloader js
	// jQuery(window).load(function(){
		
	// 	$('body, html').removeClass('fix');
		
	// 	$(".preloader_wrapper").fadeOut(1000);
		
    // });

    // DropDown

	$(".btn-group, .dropdown").hover(
		function () {
			$('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
			$(this).addClass('open');
		},
		function () {
			$('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
			$(this).removeClass('open');
	});

	// Banner Slider
    $('#banner_part').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
	});

	 // testmonial-active
	//  $('.testmonial-active').owlCarousel({
    //     margin: 15,
    //     loop: true,
    //     autoplay: true,
    //     autoplayTimeout: 5000,
    //     nav: false,
    //     smartSpeed: 1000,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         450: {
    //             items: 1
    //         },
    //         768: {
    //             items: 1
    //         },
    //         1000: {
    //             items: 1
    //         }
    //     }
    // });

    
     
	
	// Menufix
	// var navoff = $("header").offset().top;

	// $(window).scroll(function () {
	// 	var scrolling = $(this).scrollTop();

	// 	if (scrolling > navoff) {
	// 		$("header").addClass("menu_fix");
	// 	} else {
	// 		$("header").removeClass("menu_fix");
	// 	}
	// });


	



//     // Scroll To Top  
//     $(".bto").click(function () {
//     	$("html,body").animate({
//     		scrollTop: 0,
//     	}, 2000);
//     });

//     $(window).scroll(function () {
//     	var scrolling = $(this).scrollTop();

//     	if (scrolling > 130) {
//     		$(".bto").fadeIn();
//     	} else {
//     		$(".bto").fadeOut();
//     	}
//     });




//Wow Js

//         var wow = new WOW(
//         {
//     boxClass:     'wow',      // animated element css class (default is wow)
//     animateClass: 'animated', // animation css class (default is animated)
//     offset:       0,          // distance to the element when triggering the animation (default is 0)
//     mobile:       true,       // trigger animations on mobile devices (default is true)
//     live:         true,       // act on asynchronously loaded content (default is true)
//     callback:     function(box) {
//       // the callback is fired every time an animation is started
//       // the argument that is passed in is the DOM node being animated
//   },
//     scrollContainer: null,    // optional scroll container selector, otherwise use window,
//     resetAnimation: true,     // reset animation on end (default is true)
// }
// );
//         wow.init(); 




	
});