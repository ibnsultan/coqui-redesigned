/* ==============
 ========= js documentation ==========================

    ==================================================

     01. data background
     -------------------------------------------------
     02. navbar
     -------------------------------------------------
     03. voice audio
     -------------------------------------------------
     04. copyright year
     -------------------------------------------------
     05. scroll to top
     -------------------------------------------------
     06.  generate tab
     -------------------------------------------------
     07. faq tab
     -------------------------------------------------
     08. workflow background switch
     -------------------------------------------------
     09. image before after slider
     -------------------------------------------------
     10. preloader

    ==================================================
============== */

(function ($) {
  "use strict";

  jQuery(document).ready(function () {
    // 01. data background
    if ($(".mobile-menu").length > 0) {
      var mobileMenuContent = $(".nav__menu").html();
      $(".mobile-menu__list").append(mobileMenuContent);

      $(".mobile-menu .nav__menu-link--dropdown").on("click", function () {
        $(this).parent().siblings().find(".nav__dropdown").slideUp(300);
        $(this)
          .parent()
          .siblings()
          .find(".nav__menu-link--dropdown")
          .removeClass("navbar__item-active");
        $(this).siblings(".nav__dropdown").slideToggle(300);
        $(this).toggleClass("navbar__item-active");
      });
    }

    $(".nav__bar").on("click", function () {
      $(".mobile-menu__backdrop").addClass("mobile-menu__backdrop-active");
      $(".nav-fade").each(function (i) {
        $(this).css("animation-delay", 0.2 * 1 * i + "s");
      });

      $(".mobile-menu").addClass("show-menu");
      $(".mobile-menu__wrapper").removeClass("nav-fade-active");
      $("body").addClass("body-active");
    });

    $(".close-mobile-menu, .mobile-menu__backdrop").on("click", function () {
      setTimeout(function () {
        $(".mobile-menu").removeClass("show-menu");
      }, 900);
      setTimeout(function () {
        $(".mobile-menu__backdrop").removeClass("mobile-menu__backdrop-active");
      }, 1100);

      $(".mobile-menu__wrapper").addClass("nav-fade-active");
      $("body").removeClass("body-active");
    });

    $("[data-background]").each(function () {
      var backgroundImages = $(this).attr("data-background").split(",");
      var cssValue = backgroundImages.map(function (image) {
        return 'url("' + image.trim() + '")';
      }).join(',');
    
      $(this).css("background-image", cssValue);
    });

    $("[data-before-image]").each(function () {
      var backgroundImage = $(this).attr("data-before-image");
      $(this).css("position", "relative");
      $(this)
        .prepend('<div class="before-image"></div>')
        .find(".before-image")
        .css({
          position: "absolute",
          top: 0,
          left: 0,
          width: "100%",
          height: "100%",
          "background-image": 'url("' + backgroundImage + '")',
        });
    });
    

    $(window).on("resize", function () {
      $(".backdrop").removeClass("backdrop-active");
      $(".nav__bar").removeClass("nav__bar-toggle");
      $(".nav__menu").removeClass("nav__menu-active");
      $(".nav__dropdown").removeClass("nav__dropdown-active");
      $(".nav__menu-link--dropdown").removeClass(
        "nav__menu-link--dropdown-active"
      );
      $("body").removeClass("body-active");
      $(".ticket-modal").slideUp();
      $(".conference-modal").slideUp();
    });

    $(".nav__menu-link--dropdown").on("click", function () {
      $(this).next(".nav__dropdown").toggleClass("nav__dropdown-active");
      $(this).toggleClass("nav__menu-link--dropdown-active");
    });

    // on window scroll
    $(window).on("scroll", function () {
      // position navbar on scroll
      var scroll = $(window).scrollTop();
      if (scroll < 100) {
        $(".header").removeClass("header-active");
      } else {
        $(".header").addClass("header-active");
      }
    });

    // 03. voice audio
    $(".voice__slider-single").each(function () {
      var player = $(this).find(".player")[0]; // Get the audio player element

      $(this)
        .find(".play-track")
        .on("click", function () {
          if (player.paused) {
            player.play(); // Play the audio
            $(this).find("i").removeClass("fa-play").addClass("fa-pause"); // Toggle the play/pause icon
          } else {
            player.pause(); // Pause the audio
            $(this).find("i").removeClass("fa-pause").addClass("fa-play"); // Toggle the play/pause icon
          }
        });
    });

    $(".clone__thumb-single").each(function () {
      var playerClone = $(this).find(".player")[0]; // Get the audio player element

      $(this)
        .find(".play-track")
        .on("click", function () {
          if (playerClone.paused) {
            playerClone.play(); // Play the audio
            $(this).find("i").removeClass("fa-play").addClass("fa-pause"); // Toggle the play/pause icon
          } else {
            playerClone.pause(); // Pause the audio
            $(this).find("i").removeClass("fa-pause").addClass("fa-play"); // Toggle the play/pause icon
          }
        });
    });

    // 04. copyright year
    $("#copyYear").text(new Date().getFullYear());

    // 05. scroll to top
    // scroll to top with progress
    var progressPath = document.querySelector(".progress-wrap path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "stroke-dashoffset 10ms linear";
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 550;
    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery(".progress-wrap").addClass("active-progress");
      } else {
        jQuery(".progress-wrap").removeClass("active-progress");
      }
    });
    jQuery(".progress-wrap").on("click", function (event) {
      event.preventDefault();
      jQuery("html, body").animate({ scrollTop: 0 }, duration);
      return false;
    });

    // 06. generate tab
    $(".tab-content").hide();
    $(".tab-content:first").show();

    $(".generate__content-btn").click(function () {
      // Remove the 'active' class from all tab buttons and tab content
      $(".generate__content-btn").removeClass("generate__content-btn-active");
      $(".tab-content").hide();

      // Add the 'active' class to the clicked tab button
      $(this).addClass("generate__content-btn-active");

      // Get the index of the clicked tab button
      var tabIndex = $(this).index();

      // Show the corresponding tab content with fade-in animation
      $(".tab-content").eq(tabIndex).fadeIn(900);
    });

    // 07. faq tab
    $(".faq-tab-content").hide();
    $(".faq-tab-content:first").show();

    // Add click event listener to the switch
    $("#switch").on("change", function () {
      // Hide all tab contents
      $(".faq-tab-content").hide();
      $(".atc, .abc").removeClass("cd");

      // Show the selected tab content
      if ($(this).is(":checked")) {
        $("#faqTwo").fadeIn(900);
        $(".atc").addClass("cd");
      } else {
        $("#faqOne").fadeIn(900);
        $(".abc").addClass("cd");
      }
    });

    // 08. workflow background switch
    if ($(".workflow-switch-wrapper").length) {
      var initialBackground = $(".workflow-switch:first").css(
        "background-color"
      );
      $(".thumb-transparent").css("background-color", initialBackground);

      // Change background when clicked
      $(".workflow-switch").click(function () {
        var clickedBackground = $(this).css("background-color");
        $(".workflow-switch").removeClass("active");
        $(this).addClass("active");
        $(".thumb-transparent").css("background-color", clickedBackground);
      });
    }

    // 09. image before after slider

    $("#ranguslider2").on("input change", (e) => {
      const sliderPos2 = e.target.value;

      $(".foreground-img-1").css("width", `${sliderPos2}%`);

      $(".rangu-slider-button3").css("left", `calc(${sliderPos2}% - 18px)`);
    });

    $("#ranguslider3").on("input change", (e) => {
      const sliderPos3 = e.target.value;

      $(".foreground-img3").css("width", `${sliderPos3}%`);

      $(".rangu-slider-button4").css("left", `calc(${sliderPos3}% - 18px)`);
    });

    $("#ranguslider4").on("input change", (e) => {
      const sliderPos4 = e.target.value;

      $(".foreground-img4").css("width", `${sliderPos4}%`);

      $(".rangu-slider-button5").css("left", `calc(${sliderPos4}% - 18px)`);
    });

    $("#ranguslider5").on("input change", (e) => {
      const sliderPos5 = e.target.value;

      $(".foreground-img5").css("width", `${sliderPos5}%`);

      $(".rangu-slider-button6").css("left", `calc(${sliderPos5}% - 18px)`);
    });

    // 10.  preloader
    $("#preloader").hide();
  });
})(jQuery);
