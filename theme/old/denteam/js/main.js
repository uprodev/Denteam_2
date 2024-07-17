// hide contact block
let contactBlockStatus = sessionStorage.getItem("contact-block");
if(contactBlockStatus == "inactive") {
  jQuery(".contact-block-fixed").addClass('inactive');
}

jQuery(document).ready(function ($) {
  $('.btn').each(function() {
    if($(this).data('bs-target') == '#testModal') {
      $(this).addClass('matchtest');
    } 
  })
  // helper functions
  function is_touch_device() {
    if ("ontouchstart" in window) return true;
    if (window.DocumentTouch && document instanceof DocumentTouch) return true;
    return window.matchMedia("(pointer: coarse)").matches;
  }

  function getScrollBarWidth() {
    var inner = document.createElement("p");
    inner.style.width = "100%";
    inner.style.height = "200px";
    var outer = document.createElement("div");
    outer.style.position = "absolute";
    outer.style.top = "0px";
    outer.style.left = "0px";
    outer.style.visibility = "hidden";
    outer.style.width = "100%";
    outer.style.height = "150px";
    outer.style.overflow = "hidden";
    outer.appendChild(inner);
    document.body.appendChild(outer);
    var w1 = inner.offsetWidth;
    outer.style.overflow = "scroll";
    var w2 = inner.offsetWidth;
    if (w1 == w2) w2 = outer.clientWidth;
    document.body.removeChild(outer);
    return w1 - w2;
  }

  function switchNavToggler() {
    if (!is_touch_device()) {
      console.log('is no touch device');
      $(".dropdown-toggle").removeAttr("data-bs-toggle");
      $(".dropdown").attr("data-bs-hover", "dropdown");
    } else {
      $(".dropdown").removeAttr("data-bs-hover");
      $(".dropdown-toggle").attr("data-bs-toggle", "dropdown");
    }
  }

  function eqHeightReset(elements) {
    elements.each(function () {
      $(this).height("auto");
    });
  }

  function eqHeight(elements) {
    var eqHeight = 0;
    elements.each(function () {
      var ht = $(this).height();
      if (ht > eqHeight) {
        eqHeight = ht;
        console.log(eqHeight);
      }
    });
    elements.each(function () {
      $(this).height(eqHeight);
      console.log(eqHeight);
    });
  }

  function elementInViewport(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;
    while (el.offsetParent) {
      el = el.offsetParent;
      top += el.offsetTop;
      left += el.offsetLeft;
    }
    return top < window.pageYOffset + window.innerHeight && left < window.pageXOffset + window.innerWidth && top + height > window.pageYOffset && left + width > window.pageXOffset;
  }

  eqHeight($(".cards-list .row .card-title"));

  $(window).on("resize", function () {
    eqHeightReset($(".cards-list .row .card-title"));
    if ($(window).width() >= 768) {
      eqHeight($(".cards-list .row .card-title"));
    }
  });

  const lenis = new Lenis();

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);

  lenis.on("scroll", (e) => {
    var scrolled = e.targetScroll;

    if (scrolled > $(".header").outerHeight()) {
      $(".header").addClass("header-fixed");
    } else {
      $(".header").removeClass("header-fixed");
    }
  });

  switchNavToggler();
  $(window).on("resize", function () {
    switchNavToggler();
  });

  // sliders
  if ($(".main-banner-slider").length) {
    const swiperBanner = new Swiper(".main-banner-slider", {
      speed: 500,
      spaceBetween: 0,
      autoHeight: true,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      pagination: {
        el: ".main-banner-slider .swiper-pagination",
        clickable: true,
      },
    });
  }
  if ($(".icons-slider").length) {
    const swiperIcons = new Swiper(".icons-slider", {
      spaceBetween: 11,
      slidesPerView: 2,
      slidesPerGroup: 2,
      pagination: {
        el: ".icons-slider .swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        576: {
          slidesPerView: 4,
          slidesPerGroup: 1,
          spaceBetween: 60,
          pagination: true,
        },
        768: {
          slidesPerView: 4,
          slidesPerGroup: 1,
          spaceBetween: 60,
          pagination: false,
        },
        992: {
          slidesPerView: 4,
          slidesPerGroup: 1,
          spaceBetween: 60,
          pagination: false,
          allowTouchMove: false,
        }
      },
    });
  }
  if ($(".cards-slider").length) {
    const swiperVacancies = new Swiper(".cards-slider", {
      spaceBetween: 35,
      slidesPerView: 1,
      pagination: {
        el: ".cards-slider .swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        375: {
          spaceBetween: 35,
          slidesPerView: 1,
        },
        640: {
          spaceBetween: 35,
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 44,
          pagination: false,
        },
      },
    });
  }
  if ($(".stories-slider").length) {
    const swiperVacancies = new Swiper(".stories-slider", {
      spaceBetween: 0,
      slidesPerView: 1,
      pagination: {
        el: ".stories-slider .swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        768: {
          pagination: false,
        },
      },
      on: {
        realIndexChange: function (swiper) {
          $(".swiper-pagination-stories [data-slide]").each(function () {
            if (parseInt($(this).attr("data-slide")) === swiper.realIndex && !$(this).hasClass("active")) {
              $(".swiper-pagination-stories [data-slide].active").removeClass("active");
              $(this).addClass("active");
            }
          });
        },
      },
    });
    $(".swiper-pagination-stories [data-slide]").on("click", function () {
      var slide = parseInt($(this).attr("data-slide"));
      $(".swiper-pagination-stories [data-slide].active").removeClass("active");
      $(this).addClass("active");
      swiperVacancies.slideTo(slide, 500);
    });
  }
  if ($(".steps-slider").length) {
    const swiperSteps = new Swiper(".steps-slider", {
      spaceBetween: 40,
      slidesPerView: 1,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      pagination: {
        el: ".steps-slider .swiper-pagination",
        clickable: true,
      },

      on: {
        realIndexChange: function (swiper) {
          $(".steps-slider-pagination [data-slide]").each(function () {
            if (parseInt($(this).attr("data-slide")) === swiper.realIndex && !$(this).hasClass("active")) {
              $(".steps-slider-pagination [data-slide].active").removeClass("active");
              $(this).addClass("active");
            }
          });
        },
      },
    });
    $(".steps-slider-pagination [data-slide]").on("click", function () {
      var slide = parseInt($(this).attr("data-slide"));
      $(".steps-slider-pagination [data-slide].active").removeClass("active");
      $(this).addClass("active");
      swiperSteps.slideTo(slide, 500);
    });
    $(".steps-slider-next").on("click", function (e) {
      e.preventDefault();
      swiperSteps.slideNext(500);
    });
  }

  // click
  $(document)
    .on("click", ".footer .f-nav .f-nav-title", function () {
      if ($(window).width() < 992) {
        $(this).next().slideToggle(200);
      }
    })
    .on("click", ".video-play", function () {
      var video = $(this).prev("video");
      $(this).hide();
      video.attr("controls", true);
      video.get(0).play();
    });

  if (document.querySelector(".scroll-bottom")) {
    document.querySelector(".scroll-bottom").addEventListener("click", function () {
      var nextSection = document.querySelector(".page-banner").nextElementSibling;
      if($(window).width() < 992) {
        lenis.scrollTo(nextSection, { offset: 0, duration: 2 });
      } else {
        lenis.scrollTo(nextSection, { offset: -185, duration: 2 });
      }
    });
  }
  // forms
  $(".form-select").on("change", function () {
    if ($(this).val() !== "" && $(this).val() !== "0") {
      $(this).addClass("selected");
    } else {
      $(this).removeClass("selected");
    }
  });

  if (elementInViewport(document.querySelector(".footer"))) {
    $(".contact-block-fixed").css("z-index", 1);
  } else {
    $(".contact-block-fixed").css("z-index", 1001);
  }
  $(window).on("scroll", function () {
    if (elementInViewport(document.querySelector(".footer"))) {
      $(".contact-block-fixed").css("z-index", 1);
    } else {
      $(".contact-block-fixed").css("z-index", 1001);
    }
  });

  $(".contact-block-fixed .close-button").click(function(){
    sessionStorage.setItem("contact-block", "inactive");
    $(".contact-block-fixed").addClass('inactive');
  });
  $('.nav-item.dropdown').each(function() {
    if($(window).width() < 992) {
      $(this).children('a').after('<button class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true"></button>');
    }
  });
  $('.navbar-toggler').on('click', function() {
    $('html').toggleClass('nav-open');
      $('html').toggleClass('lenis');
  });
  
  $('.load-more-info').on('click', function() {
    console.log('test');
  });
});

// Kaart Dropdown
$(document).on("click",".meer-info",function() {
  var element = document.getElementById("powerTip");
  element.classList.toggle("active");
});