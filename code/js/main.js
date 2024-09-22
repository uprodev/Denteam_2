jQuery(document).ready(function ($) {
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
      }
    });
    elements.each(function () {
      $(this).height(eqHeight);
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
    var scrolled = e.actualScroll;

    if (scrolled > 115) {
      $(".header").addClass("header-fixed");
    } else {
      $(".header").removeClass("header-fixed");
    }
  });
  if (lenis.targetScroll > 115) {
    $(".header").addClass("header-fixed");
  } else {
    $(".header").removeClass("header-fixed");
  }

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
        768: {
          slidesPerView: 4,
          slidesPerGroup: 1,
          spaceBetween: 60,
          allowTouchMove: false,
        },
      },
    });
  }
  if ($(".cards-slider").length) {
    document.querySelectorAll(".cards-slider").forEach((slider) => {
      let spacing = 50;
      if (slider.querySelector(".card-type-02")) {
        spacing = 33;
      }
      if (!slider.classList.contains("cards-slider-lg")) {
        const swipercards = new Swiper(slider, {
          spaceBetween: spacing,
          slidesPerView: 1,
          pagination: {
            el: ".cards-slider .swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            375: {
              spaceBetween: spacing,
              slidesPerView: 1,
            },
            640: {
              spaceBetween: 35,
              slidesPerView: 2,
            },
            992: {
              slidesPerView: 3,
              spaceBetween: 46,
              pagination: false,
            },
          },
        });
      } else {
        const swipercards = new Swiper(slider, {
          spaceBetween: spacing,
          slidesPerView: 1,
          pagination: {
            el: ".cards-slider .swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            375: {
              spaceBetween: spacing,
              slidesPerView: 1,
            },
            640: {
              spaceBetween: 35,
              slidesPerView: 2,
            },
            1400: {
              slidesPerView: 3,
              spaceBetween: 46,
              pagination: false,
            },
          },
        });
      }
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
  if ($(".image-slider").length) {
    const swiperImage = new Swiper(".image-slider", {
      spaceBetween: 50,
      slidesPerView: 1,
      pagination: {
        el: ".image-slider .swiper-pagination",
        clickable: true,
      },
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
      // var nextSection = document.querySelector(".page-banner").nextElementSibling;
      var nextSection = document.querySelector(this.dataset.section);
      lenis.scrollTo(nextSection, { offset: 0, duration: 2 });
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

  $("#navbarContent").on("shown.bs.collapse", function () {
    const scrollY = $(window).scrollTop();
    $("body").css({ position: "fixed", top: -scrollY });
    $("html").addClass("hide-scroll");
  });
  $("#navbarContent").on("hide.bs.collapse", function () {
    const scrollY = document.body.style.top;
    $("body").css({ position: "initial", top: 0 });
    window.scrollTo(0, parseInt(scrollY || "0") * -1);
    $("html").removeClass("hide-scroll");
  });

  // hide contact block

  if (elementInViewport(document.querySelector(".footer"))) {
    $(".contact-block-fixed").css("z-index", 1);
  } else {
    $(".contact-block-fixed").css("z-index", 990);
  }
  $(window).on("scroll", function () {
    if (elementInViewport(document.querySelector(".footer"))) {
      $(".contact-block-fixed").css("z-index", 1);
    } else {
      $(".contact-block-fixed").css("z-index", 990);
    }
  });

  var bannerHeight;
  if ($(".main-banner-section").length) {
    bannerHeight = $(".main-banner-section").outerHeight() + $(".main-banner-bottom-section").outerHeight();
  } else if ($(".details-banner").length) {
    bannerHeight = $(".details-banner").outerHeight();
  } else if ($(".page-banner").length) {
    bannerHeight = $(".page-banner").outerHeight();
  } else if ($(".main-banner-single").length) {
    bannerHeight = $(".main-banner-single").outerHeight();
  } else {
    bannerHeight = $(".header").outerHeight();
  }
  lenis.on("scroll", (e) => {
    if (lenis.actualScroll > $(window).height() / 2) {
      $(".contact-block-fixed").css("opacity", 1);
    } else {
      $(".contact-block-fixed").css("opacity", 0);
    }

    if (lenis.actualScroll > bannerHeight) {
      $(".header").addClass("header-fixed-top");
    } else {
      $(".header").removeClass("header-fixed-top");
    }
  });

  if (lenis.targetScroll > bannerHeight) {
    $(".header").addClass("header-fixed-top");
  } else {
    $(".header").removeClass("header-fixed-top");
  }
  $(".contact-block-fixed .btn-close").on("click", function () {
    $(".contact-block-fixed ").remove();
  });

  // form steps
  function changeFormStep(current, next) {
    $(".denteam-card .form-wrapper").attr("data-step", next);
    $("#formStepInd").attr("data-step", next);
  }
  $(".denteam-card .btn-form-next").on("click", function () {
    const current = parseInt($(".denteam-card .form-wrapper").attr("data-step"));
    const next = current + 1;
    changeFormStep(current, next);
  });
  $(".denteam-card .btn-form-prev").on("click", function () {
    const current = parseInt($(".denteam-card .form-wrapper").attr("data-step"));
    const next = current - 1;
    changeFormStep(current, next);
  });
});
