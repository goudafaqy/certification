$('#owl').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  autoplay:true,
  dots:true,
  nav:true,
 
  
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:4
      }
  }
})

$('.owl-carousell').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  autoplay:true,
  dots:true,
  nav:true,
 
  
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
})


// $(document).ready(function(){
//   $(".panel-heading").click(function(e){
//       var accordionitem = $(this).attr("data-tab");
//       $("#"+accordionitem).slideToggle().parent().siblings().find(".panel-body").slideUp();

//       $(this).toggleClass("active-title");
//       $("#"+accordionitem).parent().siblings().find(".panel-heading").removeClass("active-title");

//       $("i.fa-chevron-down",this).toggleClass("chevron-top");
//       $("#"+accordionitem).parent().siblings().find(".panel-heading i.fa-chevron-down").removeClass("chevron-top");
//   });
  
// });




 var btn = $('#button');

 $(window).scroll(function() {
   if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

 btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
 })
 
 var btn = $('#button2');

 $(window).scroll(function() {
   if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

 btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
 })









var sliderSelector = '.swiper-container',
    isMove = false,
    options = {
      init: false,
      loop: true,
      speed:1500,
      autoplay:{
        delay:5000
      },
      effect:  'cube',//, 'fade', 'coverflow',
     
     coverflowEffect: {
    rotate: 30,
    slideShadows: false,
  },
      grabCursor: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
      // Events
     /* on: {
        init: function(){
          this.autoplay.stop();
        },
        imagesReady: function(){
          this.el.classList.remove('loading');
          this.autoplay.start();
        },
        touchMove: function(event){
          if (!isMove) {
            this.el.classList.remove('scale-in');
            this.el.classList.add('scale-out');
            isMove = true;
          }
        },
        touchEnd: function(event){
          this.el.classList.remove('scale-out');
          this.el.classList.add('scale-in');
          setTimeout(function(){
            isMove = false;
          }, 300);
        },
        slideChangeTransitionStart: function(){
          console.log('slideChangeTransitionStart '+this.activeIndex);
          if (!isMove) {
            this.el.classList.remove('scale-in');
            this.el.classList.add('scale-out');
          }
        },
        slideChangeTransitionEnd: function(){
          console.log('slideChangeTransitionEnd '+this.activeIndex);
          if (!isMove) {
            this.el.classList.remove('scale-out');
            this.el.classList.add('scale-in');
          }
        },
        transitionStart: function(){
          console.log('transitionStart '+this.activeIndex);
        },
        transitionEnd: function(){
          console.log('transitionEnd '+this.activeIndex);
        },
        slideChange:function(){
          console.log('slideChange '+this.activeIndex);
          console.log(this);
        }
      }*/
    },
    mySwiper = new Swiper(sliderSelector, options);

// Initialize slider
mySwiper.init();

$('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 8000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
  

});

$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});

// make it as accordion for smaller screens
if ($(window).width() < 992) {
  $('.dropdown-menu a').click(function(e){
    e.preventDefault();
      if($(this).next('.submenu').length){
        $(this).next('.submenu').toggle();
      }
      $('.dropdown').on('hide.bs.dropdown', function () {
     $(this).find('.submenu').hide();
  })
  });
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


// const chatbox = jQuery.noConflict();

// chatbox(() => {
//   chatbox(".chat").click(() =>
//     chatbox(".chatbox-popup").fadeIn()
    
    
//   );

//   chatbox(".chat-box-close").click(() =>
//     chatbox(".chatbox-popup").fadeOut()
//   );
// });

// $( document ).ready(function() {
//   $('.has-children').on('click', function(){

//   if ($('.has-children').hasClass('open')) {
//      $(this).removeClass('open');
//    } else {
//       $(this).addClass('open');
//    }
//   });  
// });

//chat
$(document).ready(function(){
  $(".chat").click(function(){
    $(".chatbox-popup").fadeIn("slow");
  });
  $(".chat-box-close").click(function(){
    $(".chatbox-popup").fadeOut("slow");
  });
});
//      $(".chat").click(function() {
//       $('.chatbox-popup').toggle(function() {
        
//       });
//   });


// $(".chat-box-close").click(function() {
//   $('.chatbox-popup').hide();
  
// });

// $("#toggle").click(function() {
//   $("#toggle i").toggleClass("fas fa-times");
// });




