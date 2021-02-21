// js fixed menu pc
$(document).ready(function(){
    $(window).scroll(function(){
    if ($(window).scrollTop() > 150)
        {
            $('.sticky-wrapper').addClass('header-sticky');
        }
        else
        {
            $('.sticky-wrapper').removeClass('header-sticky');
        }
    });
});

/*js menu mobile*/
$(document).ready(function ($) {
    $('#trigger-mobile').click(function() {
        $(".mobile-main-menu").addClass('active');
        $(".backdrop__body-backdrop___1rvky").addClass('active');
    });
    $('#close-nav').click(function() {
        $(".mobile-main-menu").removeClass('active');
        $(".backdrop__body-backdrop___1rvky").removeClass('active');
    });
    $('.backdrop__body-backdrop___1rvky').click(function() {
        $(".mobile-main-menu").removeClass('active');
        $(".backdrop__body-backdrop___1rvky").removeClass('active');
    });
    $(window).resize( function(){
        if ($(window).width() > 1023) {
            $(".mobile-main-menu").removeClass('active');
            $(".backdrop__body-backdrop___1rvky").removeClass('active');
        }
    });
    $('.ng-has-child1 a .fa1').on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        $this.parents('.ng-has-child1').find('.ul-has-child1').stop().slideToggle();
        $(this).toggleClass('active')
        return false;
    });
    $('.ng-has-child1 .ul-has-child1 .ng-has-child2 a .fa2').on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        $this.parents('.ng-has-child1 .ul-has-child1 .ng-has-child2').find('.ul-has-child2').stop().slideToggle();
        $(this).toggleClass('active')
        return false;
    });
});
/*resize img cùng cấp*/
/*$( window ).load(function() {
    render_size();
    var url = window.location.href;
    $('.menu-item  a[href="' + url + '"]').parent().addClass('active');
});
$( window ).resize(function() {
    render_size();
});*/
/*function render_size(){

    var h_1000 = $('.h_1000 img').width();
    $('.h_1000 img').height( 1.000 * parseInt(h_1000));


}*/
/*navText:["<i class=\"fa fa-long-arrow-left\"></i>","<i class=\"fa fa-long-arrow-right\"></i>"],*/
// js resize img
var h_1 = $('.h_1 img').width();
$('.h_1 img').height( 1.0 * parseInt(h_1));
// js back to top
if ($('#back-to-top').length) {
    var scrollTrigger = 800, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false");
// document.onkeydown = function(n) {
//     return !n.ctrlKey || 67 !== n.keyCode && 86 !== n.keyCode && 85 !== n.keyCode && 117 !== n.keyCode && 17 !== n.keycode && 85 !== n.keycode || alert("Not Allowed"), !1
// };
        
/*js home slider banner*/
$('#slider-home').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:true,
    autoplayTimeout:6000,
    autoplaySpeed:3600,
    smartSpeed:1600,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

/*js home slider ykkh*/
$('#slider-ykkh').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:true,
    autoplayTimeout:6000,
    autoplaySpeed:3600,
    smartSpeed:2200,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

/*js home slider sanpham*/
$('#slider-sanpham').owlCarousel({
    loop:false,
    margin:30,
    dots:true,
    nav:false,
    autoplay:false,
    autoplayTimeout:6000,
    autoplaySpeed:2600,
    smartSpeed:2200,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        600:{
            items:3,
            margin:20,
        },
        1000:{
            items:3
        }
    }
})

/*js home slider news*/
$('#slider-news').owlCarousel({
    loop:true,
    margin:30,
    dots:false,
    nav:true,
    autoplay:true,
    autoplayTimeout:6000,
    autoplaySpeed:3600,
    smartSpeed:2200,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        600:{
            items:2,
            margin:20,
        },
        1000:{
            items:3
        }
    }
})

/*js slide ctsp*/
$('#slider-ctsp').owlCarousel({
    items:1,
    loop:false,
    center:false,
    margin:10,
    dots:false,
    nav:false,
    autoplay:false,
    smartSpeed:1200,
    URLhashListener:false,
    autoplayHoverPause:true,
    startPosition: 'URLHash'
})

// js click sidebar san pham
/*js menu danh muc left*/
var acc = document.getElementsByClassName("accordion1");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
jQuery(function($) {
  if ($(window).width() > 769) {
    $('.navbar .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });

  }
});
// js check aria add active
// $(document).ready(function() {
//     $(".card-header button").click(function(){
//         $(this).toggleClass('active')
//     });
//     // Search form  
//     var isOpen=false;
//     $('.btn-search').click(function(){
//         if(isOpen){
//             var a = $(this).closest('form').find('.search-form input').val();
//             console.log(a);
//             if($.trim(a)!=''){
//                 $(this).closest('form').submit();
//             }else{
//                 $('.search-form').animate({ width: 'hide' });
//                 isOpen=false;
//                 $('.overlay').removeClass('for-search');
//             }           
//         }else{
//             $('.search-form').animate({ width: 'show' });
//             isOpen=true;
//             $('.overlay').addClass('for-search');
//         }
        
//         return false;
//     })
//     $(document).mouseup(function(){
//         if(isOpen){
//             $('.search-form').css('display','none');
//             $('.overlay').removeClass('for-search');
//         }
//     })
//     $('.search-form').mouseup(function(){
//         return false;
//     })
// });


// js bo loc gia filter
