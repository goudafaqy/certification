$(document).ready(function() {
  $().owlCarousel && ($(".owl-carousel.basic").length > 0 && $(".owl-carousel.basic").owlCarousel({
      margin: 30,
      rtl:true,
      autoplay:true,
      loop:true,
      animateOut: 'slideOutDown',
    animateIn: 'flipInX',
      stagePadding: 0,
      dotsContainer: $(".owl-carousel.basic").parents(".owl-container").find(".slider-dot-container"),
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 1
          }
      }
  })

                           
    .data("owl.carousel").onResize(), $(".owl-dot").click(function() {
      $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("to.owl.carousel", [$(this).index(), 300])
  }), $(".owl-prev").click(function(e) {
      e.preventDefault(), $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("prev.owl.carousel", [300])
  }), $(".owl-next").click(function(e) {
      e.preventDefault(), $($(this).parents(".owl-container").find(".owl-carousel")).owlCarousel().trigger("next.owl.carousel", [300])
  }));
  
    
    $('.certi').owlCarousel({
    loop:true,
    autoplay:true,
    margin:10,
          animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    dotsContainer: $(".certi").parents(".owl-container").find(".slider-dot-container"),
    rtl:true,
    
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
     
});