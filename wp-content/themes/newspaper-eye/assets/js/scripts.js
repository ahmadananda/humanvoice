(function ($) {
  "use strict";

  $.fn.affiliateEyeAccessibleDropDown = function () {
    var el = $(this);
    $("a", el)
      .focus(function () {
        $(this).parents("li").addClass("hover");
      })
      .blur(function () {
        $(this).parents("li").removeClass("hover");
      });
  };

  //document ready function
  jQuery(document).ready(function ($) {
    $(".news-update").ticker();
    $(".news-update").removeClass("news-noload");
    $("#newspaper-eye-menu").affiliateEyeAccessibleDropDown();

    $("#besearch").on("click", function (e) {
      e.preventDefault();
      $("#bspopup").addClass("popup-box-on");
    });

    $("#removeClass").click(function () {
      $("#bspopup").removeClass("popup-box-on");
    });
  }); // end document ready

  function stickyElement(e) {
    var header = document.querySelector(".header");
    var headerHeight = getComputedStyle(header).height.split("px")[0];
    var menuBar = document.querySelector(".menu-bar");
    var scrollValue = window.scrollY;

    if (scrollValue > headerHeight) {
      menuBar.classList.add("is-fixed");
    } else if (scrollValue < headerHeight) {
      menuBar.classList.remove("is-fixed");
    }
  }

  window.addEventListener("scroll", stickyElement);
})(jQuery);
