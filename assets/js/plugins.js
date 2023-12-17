/* ==============
 ========= js documentation ==========================

    ==================================================

     01. voice slider
     -------------------------------------------------
     02. sponsor slider
     -------------------------------------------------
     03. case slider
     -------------------------------------------------
     04. language slider
     -------------------------------------------------
     05. typing effect
     -------------------------------------------------
     06. testimonial slider
     -------------------------------------------------
     07. feature slider
     -------------------------------------------------
     08. banner three slider
     -------------------------------------------------
     09. eraser slider
     -------------------------------------------------
     10. testimonial three slider
     -------------------------------------------------
     11. explore slider
     -------------------------------------------------
     12. select subject
     -------------------------------------------------
     13. video modal
     -------------------------------------------------
     14. init wow js

    ==================================================
============== */

(function ($) {
  "use strict";

  jQuery(document).ready(function () {
    // 01. voice slider
    $(".voice__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 6,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        appendDots: $(".voice-pagination"),
        centerMode: false,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 425,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });

    // 02. sponsor slider
    $(".sponsor__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 6,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        centerMode: true,
        centerPadding: 0,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 5,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 425,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });

    // 03. case slider
    $(".case__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 6,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 3,
        arrows: false,
        dots: true,
        appendDots: $(".case-pagination"),
        centerMode: false,
        variableWidth: true,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToScroll: 1,
            },
          },
        ],
      });

    // 04. language slider
    $(".language__slider").not(".slick-initialized").slick({
      infinite: true,
      autoplay: true,
      focusOnSelect: false,
      slidesToShow: 1,
      speed: 1000,
      autoplaySpeed: 0,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 0,
      speed: 5000,
      cssEase: "linear",
      pauseOnHover: false,
      pauseOnFocus: false,
      dots: false,
      centerMode: false,
      variableWidth: true,
    });

    $(".language__slider-rtl").not(".slick-initialized").slick({
      infinite: true,
      autoplay: true,
      focusOnSelect: false,
      slidesToShow: 1,
      speed: 1000,
      autoplaySpeed: 0,
      slidesToScroll: 1,
      arrows: false,
      autoplaySpeed: 0,
      speed: 5000,
      cssEase: "linear",
      pauseOnHover: false,
      pauseOnFocus: false,
      dots: false,
      centerMode: false,
      variableWidth: true,
      rtl: true,
    });

    //  05. typing effect
    if ($("#textTyped").length) {
      new Typed("#textTyped", {
        strings: ["facebook posts", "twitter posts", "instagram posts"],
        typeSpeed: 50,
        startDelay: 50,
        backSpeed: 50,
        backDelay: 1000,
        loop: true,
      });
    }

    // 06. testimonial slider
    $(".testimonial__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 1,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $(".prev-testimonial"),
        nextArrow: $(".next-testimonial"),
        dots: false,
        centerMode: true,
        variableWidth: true,
      });

    $(".testimonial__slider .slick-center")
      .prev(".slick-slide")
      .addClass("active");

    $(".testimonial__slider").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
        var $slides = $(slick.$slides);
        var $centerSlide = $slides.eq(nextSlide);

        $slides.removeClass("active");
        $centerSlide.prev().addClass("active");
      }
    );

    // 07. feature slider
    $(".features__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 1,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $(".prev-feature"),
        nextArrow: $(".next-feature"),
        dots: false,
        centerMode: false,
      });

    // 08. banner three slider
    $(".banner-three-slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 1,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        appendDots: $(".banner-three-pagination"),
        centerMode: false,
      });

    // 09. eraser slider
    $(".eraser__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 4,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 3,
        arrows: false,
        dots: true,
        appendDots: $(".eraser-pagination"),
        centerMode: false,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });

    // 10. testimonial three slider
    $(".testimonial-three__slider")
      .not(".slick-initialized")
      .slick({
        // infinite: true,
        // autoplay: true,
        // focusOnSelect: false,
        // slidesToShow: 2,
        // speed: 1000,
        // autoplaySpeed: 4000,
        // slidesToScroll: 1,
        // arrows: true,
        // prevArrow: $(".prev-testimonial-three"),
        // nextArrow: $(".next-testimonial-three"),
        // dots: false,
        // centerMode: false,
        // vertical: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 2,
        slidesToScroll: -1,
        infinite: true,
        swipeToSlide: true,
        dots: false,
        arrows: true,
        prevArrow: $(".prev-testimonial-three"),
        nextArrow: $(".next-testimonial-three"),
        centerMode: true,
        centerPadding: "0px",
        focusOnSelect: true,
        vertical: true,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 1,
              vertical: false,
            },
          },
        ],
      });

    // 11. explore slider
    $(".explore__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 3,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        appendDots: $(".explore-pagination"),
        centerMode: false,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              vertical: false,
            },
          },
        ],
      });

    // 12. select subject
    $(".subject").niceSelect();
    $(".styles").niceSelect();

    // 13. video modal
    if (document.querySelector(".video-btn") !== null) {
      $(".video-btn").magnificPopup({
        disableOn: 768,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
      });
    }

    // 14. init wow js
    new WOW().init();

    // 15. f overview slider
    $(".f-overview__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 3,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $(".prev-f"),
        nextArrow: $(".next-f"),
        dots: false,
        centerMode: true,
        centerPadding: "10%",
        responsive: [
          {
            breakpoint: 1440,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              centerPadding: "20%",
            },
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              centerPadding: "10px",
            },
          },
        ],
      });

    $(".h-f-o-sl").slick({
      speed: 5000,
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: "linear",
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      swipeToSlide: true,
      dots: false,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
      vertical: true,
    });

    $(".h-f-t-sl").slick({
      speed: 5000,
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: "linear",
      slidesToShow: 1,
      slidesToScroll: -1,
      infinite: true,
      swipeToSlide: true,
      dots: false,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
      vertical: true,
    });

        // 16. home four testimonial slider
        $(".nt-slider")
        .not(".slick-initialized")
        .slick({
          infinite: true,
          autoplay: true,
          focusOnSelect: false,
          slidesToShow: 1,
          speed: 1000,
          autoplaySpeed: 4000,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          appendDots: $(".nt-pagination"),
          centerMode: true,
          variableWidth: true,
        });
  
      $(".nt-slider .slick-center")
        .prev(".slick-slide")
        .addClass("active");
  
      $(".nt-slider").on(
        "beforeChange",
        function (event, slick, currentSlide, nextSlide) {
          var $slides = $(slick.$slides);
          var $centerSlide = $slides.eq(nextSlide);
  
          $slides.removeClass("active");
          $centerSlide.prev().addClass("active");
        }
      );

      $(".case__slider-h-e")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: false,
        slidesToShow: 1,
        speed: 1000,
        autoplaySpeed: 4000,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-h-e-case"),
        nextArrow: $(".next-h-e-case"),
        centerMode: false,
        variableWidth: true,
      });

      // testimonial
      $(".testimonial__text-slider").not(".slick-initialized").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 10000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        cssEase: "linear",
        variableWidth: true,
      });

      $(".testimonial-s__slider")
			.not(".slick-initialized")
			.slick({
				infinite: true,
				autoplay: true,
				focusOnSelect: true,
				slidesToShow: 1,
				speed: 1000,
				autoplaySpeed: 5000,
				slidesToScroll: 1,
				arrows: true,
				prevArrow: $(".prev-testimonial-three"),
				nextArrow: $(".next-testimonial-three"),
				dots: false,
				centerMode: true,
				centerPadding: "0px",
			});

		$(".testimonial-s__slider").on(
			"beforeChange",
			function(event, slick, currentSlide, nextSlide) {
				var nextSlideIndex = (nextSlide + 1) % slick.slideCount;
				var nextImageSrc = slick.$slides
					.eq(nextSlideIndex)
					.find("img")
					.attr("src");
				$(".other-section-image").attr("src", nextImageSrc);
			}
		);


    // he blog slider
    $(".he-ln___slider")
    .not(".slick-initialized")
    .slick({
      infinite: true,
      autoplay: true,
      focusOnSelect: false,
      slidesToShow: 3,
      speed: 1000,
      autoplaySpeed: 4000,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: $(".prev-h-n-case"),
      nextArrow: $(".next-h-n-case"),
      dots: false,
      centerMode: true,
      centerPadding: "0%",
      responsive: [
        {
          breakpoint: 1440,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  });
})(jQuery);
