(function ($) {
	"use strict";

	$(window).on('load', function () {
		preloader();
		wowAnimation();
	});

	/*------------------------------------------
	= preloader
	-------------------------------------------*/

	
	function preloader() {
		$('.preloader').delay().fadeOut();
	}

	/*------------------------------------------
	= back to top
	-------------------------------------------*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('.xb-backtotop').addClass('active');
		} else {
			$('.xb-backtotop').removeClass('active');
		}
	});
	$(function () {
		$(".scroll").on('click', function () {
			$("html,body").animate({ scrollTop: 0 }, "slow");
			return false
		});
	});

	/*------------------------------------------
	= sticky header
	-------------------------------------------*/
	// sticky header
	// if ($('.stricky').length) {
    //     $('.stricky').addClass('original').clone(true).insertAfter('.stricky').addClass('stricked-menu').removeClass('original');
    // }
	// $(window).on('scroll', function () {
    //     if ($('.stricked-menu').length) {
    //         var headerScrollPos = 100;
    //         var stricky = $('.stricked-menu');
    //         if ($(window).scrollTop() > headerScrollPos) {
    //             stricky.addClass('stricky-fixed');
    //         } else if ($(this).scrollTop() <= headerScrollPos) {
    //             stricky.removeClass('stricky-fixed');
    //         }
    //     }

    // });


	/*------------------------------------------
	= header search
	-------------------------------------------*/
	$(".header-search-btn").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").addClass("open");
		$('.header-search-form-wrapper input[type="search"]').focus();
		$('.body-overlay').addClass('active');
	});
	$(".xb-search-close").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").removeClass("open");
		$("body").removeClass("active");
		$('.body-overlay').removeClass('active');
	});

	/*------------------------------------------
	= sidebar
	-------------------------------------------*/
	$('.sidebar-menu-close, .body-overlay').on('click', function () {
		$('.offcanvas-sidebar').removeClass('active');
		$('.body-overlay').removeClass('active');
	});

	$('.offcanvas-sidebar-btn').on('click', function () {
		$('.offcanvas-sidebar').addClass('active');
		$('.body-overlay').addClass('active');
	});
	$('.body-overlay').on('click', function () {
		$(this).removeClass('active');
		$(".header-search-form-wrapper").removeClass("open");
	});

	/*------------------------------------------
	= mobile menu
	-------------------------------------------*/
	$('.xb-nav-hidden li.menu-item-has-children > a').append('<span class="xb-menu-toggle"></span>');
	$('.xb-header-menu li.menu-item-has-children, .xb-menu-primary li.menu-item-has-children').append('<span class="xb-menu-toggle"></span>');
	$('.xb-menu-toggle').on('click', function () {
		if (!$(this).hasClass('active')) {
			$(this).closest('ul').find('.xb-menu-toggle.active').toggleClass('active');
			$(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
		}
		$(this).toggleClass('active');
		$(this).closest('.menu-item').find('> .sub-menu').toggleClass('active');
		$(this).closest('.menu-item').find('> .sub-menu').slideToggle();
	});

	$('.xb-nav-hidden li.menu-item-has-children > a').on('click', function () {
		var target = $(e.target);
		if ($(this).attr('href') === '#' && !(target.is('.xb-menu-toggle'))) {
			e.stopPropagation();
			if (!$(this).find('.xb-menu-toggle').hasClass('active')) {
				$(this).closest('ul').find('.xb-menu-toggle.active').toggleClass('active');
				$(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
			}
			$(this).find('.xb-menu-toggle').toggleClass('active');
			$(this).closest('.menu-item').find('> .sub-menu').toggleClass('active');
			$(this).closest('.menu-item').find('> .sub-menu').slideToggle();
		}
	});
	$(".xb-nav-mobile").on('click', function () {
		$(this).toggleClass('active');
		$('.xb-header-menu').toggleClass('active');
	
		if ($('.xb-header-menu').hasClass('active')) {
			$('.property-filter, .property-filter-img-two').hide();
		} else {
			$('.property-filter, .property-filter-img-two').show();
		}
	});
	
	$(".xb-menu-close, .xb-header-menu-backdrop").on('click', function () {
		$('.xb-nav-mobile').removeClass('active');
		$('.xb-header-menu').removeClass('active');
		$('.property-filter, .property-filter-img-two').show(); 
	});
	
	/*------------------------------------------
	= data background and bg color
	-------------------------------------------*/
	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ") ")
	})
	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));

	});

	/*------------------------------------------
	= wow animation
	-------------------------------------------*/
	function wowAnimation() {
		var wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: false,
			live: true
		});
		wow.init();
	}

	/*------------------------------------------
	= counter
	-------------------------------------------*/
	if ($(".xbo").length) {
		$('.xbo').appear();
		$(document.body).on('appear', '.xbo', function (e) {
			var odo = $(".xbo");
			odo.each(function () {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
			window.xboOptions = {
				format: 'd',
			};
		});
	}



		var slider = new Swiper(".properties-swiper-mobile", {
			slidesPerView: 1,
			spaceBetween: 10,
			loop: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			autoplay: {
				delay: 3000,
			},
		});
	




	/*------------------------------------------
	= partner slider
	-------------------------------------------*/
	var slider = new Swiper(".partner-active", {
		loop: true,
		spaceBetween: 0,
		speed: 5000, 
		slidesPerView: 6,
		autoplay: {
			delay: 0, 
			disableOnInteraction: false, 
		},
		freeMode: true, 
		freeModeMomentum: false, 
		allowTouchMove: false, 
		breakpoints: {
			1600: { slidesPerView: 6 },
			1200: { slidesPerView: 4 },
			992: { slidesPerView: 3 },
			768: { slidesPerView: 2 },
			576: { slidesPerView: 1.5 }, // Show one and a half slides on small screens
			0: { slidesPerView: 1.5 }, // Apply the same setting for extra-small screens
		},
	});
	/*------------------------------------------
	= partner slider two
	-------------------------------------------*/
	var slider = new Swiper(".partner-slider-two", {
		loop: true,
		spaceBetween: 20,
		speed: 400,
		slidesPerView: 9,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1600': {
				slidesPerView: 9,
			},
			'1200': {
				slidesPerView: 7,
			},
			'992': {
				slidesPerView: 6,
			},
			'768': {
				slidesPerView: 5,
			},
			'576': {
				slidesPerView: 4,
			},
			'0': {
				slidesPerView: 3,
			},
		},
	});









	var slider = new Swiper(".partner-slider-three", {
		loop: true,
		spaceBetween: 20,
		speed: 400,
		slidesPerView: 9,
		// autoplay: {
		//     enabled: true,
		//     delay: 6000
		// },
		breakpoints: {
			1600: { slidesPerView: 4 },
			1200: { slidesPerView: 4 },
			992: { slidesPerView: 4 },
			768: { slidesPerView: 3 },
			576: { slidesPerView: 2 },
			0: { slidesPerView: 1.3 }, 
		},
	});
	

	/*------------------------------------------
	= footer-testimonial-slider
	-------------------------------------------*/
	var slider = new Swiper(".testimonial-slider", {
		loop: true,
		spaceBetween: 0,
		speed: 400,
		slidesPerView: 1,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	/*------------------------------------------
	= xb-testimonial-slider
	-------------------------------------------*/
	var slider = new Swiper(".xb-testimonial-slider", {
		loop: true,
		spaceBetween: 0,
		speed: 400,
		slidesPerView: 1,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= dm-team-slider
	-------------------------------------------*/
	var slider = new Swiper(".dm-team-slider", {
		loop: true,
		spaceBetween: 30,
		speed: 400,
		slidesPerView: 5,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1600': {
				slidesPerView: 5,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 2,
			},
		},
	});

	/*------------------------------------------
	= brand slider
	-------------------------------------------*/
	var slider = new Swiper('.brand-slider', {
		slidesPerView: 6,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 6,
			},
			'1200': {
				slidesPerView: 6,
			},
			'992': {
				slidesPerView: 5,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 2,
			},
		},
	});


	/*------------------------------------------
	= service slider
	-------------------------------------------*/
	var slider = new Swiper('.service-slider', {
		spaceBetween: 0,
		slidesPerView: 4,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= service details slider
	-------------------------------------------*/
	var slider = new Swiper('.service-gallery-slider', {
		gap: 30,
		slidesPerView: 5,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 5,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= award slider
	-------------------------------------------*/
	var slider = new Swiper('.award-slider', {
		spaceBetween: 30,
		slidesPerView: 4,
		roundLengths: true,
		loop: true,
		navigation: {
			nextEl: '.xb-swiper-arrow-next',
			prevEl: '.xb-swiper-arrow-prev',
		},
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= award slider
	-------------------------------------------*/
	var slider = new Swiper('.portfolio-slider', {
		spaceBetween: 30,
		slidesPerView: 2,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 2,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});


	/*------------------------------------------
		= dm-brand slider
		-------------------------------------------*/
	var slider = new Swiper('.dm-brand-slider', {
		spaceBetween: 148,
		slidesPerView: 6,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 6,
			},
			'1200': {
				slidesPerView: 6,
			},
			'992': {
				slidesPerView: 5,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 3,
			},
		},
	});

	/*------------------------------------------
	= dm-service slider
	-------------------------------------------*/
	var slider = new Swiper('.dm-service-slider', {
		spaceBetween: 0,
		slidesPerView: 4,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= dm-testimonial slider
	-------------------------------------------*/
	var slider = new Swiper('.dm-testimonial-slider', {
		spaceBetween: 0,
		slidesPerView: 3,
		roundLengths: true,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= dm-instragram slider
	-------------------------------------------*/
	var slider = new Swiper('.instragram-slider', {
		spaceBetween: 0,
		slidesPerView: 6,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 6,
			},
			'1200': {
				slidesPerView: 6,
			},
			'992': {
				slidesPerView: 5,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= ds-testimonial-slider
	-------------------------------------------*/
	var slider = new Swiper('.ds-testimonial-slider', {
		spaceBetween: 30,
		slidesPerView: 4,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	/*------------------------------------------
	= ds-brand-slider
	-------------------------------------------*/
	var slider = new Swiper('.ds-brand-slider', {
		spaceBetween: 89,
		slidesPerView: 5,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 4000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 5,
			},
			'1200': {
				slidesPerView: 5,
			},
			'992': {
				slidesPerView: 4,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	

	var slider = new Swiper(".blog__item-property-one", {
		loop: true,
		spaceBetween: 0,
		speed: 400,
		slidesPerView: 1,
		pagination: {
		  el: ".swiper-pagination",
		  clickable: true,
		  renderBullet: function (index, className) {
			// Maximum 5 bullets
			const totalSlides = this.slides.length;
			const totalVisible = 5;
	  
			// Only render a limited number of bullets (5 max)
			if (index < totalVisible) {
			  return '<span class="' + className + '"></span>';
			} else {
			  return ''; // Don't render bullets beyond 5
			}
		  }
		},
		navigation: false,
	  });
	  






	/*------------------------------------------
	= magnificPopup
	-------------------------------------------*/
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	$('.popup-video').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-zoom-in',
	});

	/*------------------------------------------
	= Accordion Box
	-------------------------------------------*/
	if ($(".accordion_box").length) {
		$(".accordion_box").on("click", ".acc-btn", function () {
			var outerBox = $(this).parents(".accordion_box");
			var target = $(this).parents(".accordion");

			if ($(this).next(".acc_body").is(":visible")) {
				$(this).removeClass("active");
				$(this).next(".acc_body").slideUp(300);
				$(outerBox).children(".accordion").removeClass("active-block");
			} else {
				$(outerBox).find(".accordion .acc-btn").removeClass("active");
				$(this).addClass("active");
				$(outerBox).children(".accordion").removeClass("active-block");
				$(outerBox).find(".accordion").children(".acc_body").slideUp(300);
				$(outerBox).find(".accordion .accordion-inner").children(".acc_body").slideUp(300);
				target.addClass("active-block");
				$(this).next(".acc_body").slideDown(300);
			}
		});
	}

	//  Countdown
	$('[data-countdown]').each(function () {

		var $this = $(this),
			finalDate = $(this).data('countdown');
		if (!$this.hasClass('countdown-full-format')) {
			$this.countdown(finalDate, function (event) {
				$this.html(event.strftime('<div class="single"><p>Days</p><h1>%D</h1></div> <div class="single"><p>Hours</p><h1>%H</h1></div> <div class="single"><p>Minutes</p><h1>%M</h1></div> <div class="single"><p>SECONDS</p><h1>%S</h1></div>'));
			});
		} else {
			$this.countdown(finalDate, function (event) {
				$this.html(event.strftime('<div class="single"><p>Years</p><h1>%Y</h1></div> <div class="single"><p>Months</p><h1>%m</h1></div> <div class="single"><p>Weeks</p><h1>%W</h1></div> <div class="single"><p>Days</p><h1>%d</h1></div> <div class="single"><p>Hours</p><h1>%H</h1></div> <div class="single"><p>Minutes</p><h1>%M</h1></div> <div class="single"><p>SECONDS</p><h1>%S</h1></div>'));
			});
		}
	});


})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
    const upImg = document.querySelector(".up-img");

    if (upImg) {
        upImg.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    }

    const currentPath = window.location.pathname;

    const isPropertiesPage = currentPath.startsWith("/properties");
    const isAgentDetailsPage = currentPath.startsWith("/agents/") && currentPath !== "/agents";
    const isHolidayPage = currentPath.startsWith("/holiday-properties/") && currentPath !== "/holiday-properties";

    if (isPropertiesPage || isAgentDetailsPage || isHolidayPage) {
        if (upImg) {
            upImg.style.display = "none";
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // ----- Price Dropdown -----
    const priceToggle = document.getElementById("priceToggle");
    const priceDropdown = document.getElementById("priceDropdown");
    const selectedMinPrice = document.getElementById("selectedMinPrice");
    const selectedMaxPrice = document.getElementById("selectedMaxPrice");

    if (priceToggle && priceDropdown) {
        priceToggle.addEventListener("click", function () {
            priceDropdown.classList.toggle("active");
        });
    }

    document.querySelectorAll(".price-option[data-min]").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".price-option[data-min]").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            if (selectedMinPrice) selectedMinPrice.value = this.getAttribute("data-min");
        });
    });

    document.querySelectorAll(".price-option[data-max]").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".price-option[data-max]").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            if (selectedMaxPrice) selectedMaxPrice.value = this.getAttribute("data-max");
        });
    });

    // ----- Area Dropdown -----
    const areaToggle = document.getElementById("AreaToggle");
    const areaDropdown = document.getElementById("areaDropdown");

    if (areaToggle && areaDropdown) {
        areaToggle.addEventListener("click", function () {
            areaDropdown.classList.toggle("active-Area");
        });
    }

    document.querySelectorAll("select[name='min_area']").forEach(select => {
        select.addEventListener("change", function () {
            if (selectedMinPrice) selectedMinPrice.value = this.value;
        });
    });

    document.querySelectorAll("select[name='max_area']").forEach(select => {
        select.addEventListener("change", function () {
            if (selectedMaxPrice) selectedMaxPrice.value = this.value;
        });
    });

    // ----- More Filters Dropdown -----
    const filtersToggle = document.getElementById("FiltersToggle");
    const filtersDropdown = document.getElementById("FiltersDropdown");

    if (filtersToggle && filtersDropdown) {
        filtersToggle.addEventListener("click", function () {
            filtersDropdown.classList.toggle("active");
        });
    }

    // ----- Furnishing -----
    document.querySelectorAll(".furnished").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".furnished").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const input = document.querySelector("input[name='furnishing']");
            if (input) input.value = this.getAttribute("data-value");
        });
    });

    // ----- Completion Status -----
    document.querySelectorAll(".Completion").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".Completion").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const input = document.querySelector("input[name='completion_status']");
            if (input) input.value = this.getAttribute("data-value");
        });
    });

	document.addEventListener("DOMContentLoaded", function () {
		const form = document.querySelector(".mobile-form-home");
	
		// --- Handle Checkbox Selection ---
		document.querySelectorAll(".amenities input[type='checkbox']").forEach(checkbox => {
			checkbox.addEventListener("change", function () {
				let selectedAmenities = [];
				document.querySelectorAll(".amenities input[type='checkbox']:checked").forEach(checkedBox => {
					selectedAmenities.push(checkedBox.value);
				});
	
				let hiddenInput = document.getElementById("selectedAmenitiesInput");
				if (!hiddenInput) {
					// Create hidden input if it doesn't exist
					hiddenInput = document.createElement("input");
					hiddenInput.type = "hidden";
					hiddenInput.name = "selectedAmenities";
					hiddenInput.id = "selectedAmenitiesInput";
					form.appendChild(hiddenInput);
				}
	
				// Assign selected amenities to the hidden input
				hiddenInput.value = selectedAmenities.join(",");
	
				console.log("Selected Amenities:", selectedAmenities); // Debugging log
			});
		});
	
		// --- Remove Unchecked Checkboxes Before Submission ---
		form.addEventListener("submit", function (event) {
			document.querySelectorAll("input[name='amenities[]']").forEach(input => {
				if (!input.checked) input.remove(); // Cleans up unchecked inputs
			});
		});
	});

    // ----- Amenities Search -----
    const searchInput = document.querySelector("input[name='search-filters']");
    if (searchInput) {
        searchInput.addEventListener("input", function () {
            let searchValue = this.value.toLowerCase();
            document.querySelectorAll(".amenities label").forEach(label => {
                let amenityText = label.textContent.toLowerCase();
                label.style.display = amenityText.includes(searchValue) ? "flex" : "none";
            });
        });
    }
});

// Utility Functions
function closeDropdowntwo(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove("active");
}

function closeDropdownArea(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove("active-Area");
}



document.addEventListener("DOMContentLoaded", function () {
    // Amenities Search Filtering
    document.querySelector("input[name='search-filters']").addEventListener("input", function () {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll(".amenities").forEach(label => {
            let amenityText = label.textContent.toLowerCase();
            if (amenityText.includes(searchValue)) {
                label.style.display = "flex"; 
            } else {
                label.style.display = "none"; 
            }
        });
    });
});




document.addEventListener('DOMContentLoaded', function () {
	const scrollLink = document.querySelector('.agent-flex-link-two');
	
	scrollLink.addEventListener('click', function (e) {
		e.preventDefault();  // Prevent default anchor behavior
		const target = document.querySelector('#question-form-footer');
		
		// Scroll to the target element smoothly
		target.scrollIntoView({
			behavior: 'smooth'
		});
	});
});




/// social media buttons 
document.addEventListener('DOMContentLoaded', function () {
	$('.contact-btn').on('click', function () {
		const method = $(this).data('method');
		const container = $(this).closest('.property-two-box-five-two');

		const user_id = container.data('user-id');
		const propertyable_id = container.data('property-id');
		const property_ref_no = container.data('property-ref');
		const url = container.data('url');
		const property_type = container.data('property-type');  

		$.ajax({
			url: '/api/user-contacted-properties',
			type: 'POST',
			data: {
				user_id: user_id,
				propertyable_id: propertyable_id,
				property_ref_no: property_ref_no,
				contacted_through: method,
				url: url,
				property_type: property_type, 
				_token: '{{ csrf_token() }}'
			},
			success: function (response) {
				console.log('Contact recorded successfully:', response);
			},
			error: function (xhr) {
				console.error('Error logging contact:', xhr.responseText);
			}
		});
	});
});