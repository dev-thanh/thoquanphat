$(document).ready(function () {
  function slideBanner() {
    $(".slick__banner").slick({
      lazyLoad: "ondemand",
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      autoplay: true,
      arrows: true,
    });
  }
  slideBanner();

  $(window).on("load", function () {
    if ($(this).scrollTop() >= 42) {
      $("#header").addClass("scrolled");
    } else {
      $("#header").removeClass("scrolled");
    }
  });
  $(document).scroll(function () {
    if ($(this).scrollTop() >= 42) {
      $("#header").addClass("scrolled");
      $(".back-top").addClass("active");
    } else {
      $("#header").removeClass("scrolled");
      $(".back-top").removeClass("active");
    }
    if ($(this).scrollTop() >= 42) {
      $("#header").addClass("scrolled");
      $(".back-top").addClass("active");
    } else {
      $("#header").removeClass("scrolled");
      $(".back-top").removeClass("active");
    }
  });
  $(".back-top").on("click", function () {
    $(".back-top").removeClass("active");
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });
});
