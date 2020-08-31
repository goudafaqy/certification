$(function() {

    $('.event-slider').slick({
        vertical: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        cssEase: 'linear',
        verticalSwiping: true,
        infinite: false,
        nextArrow: $(".ev-slider-arrows .slick-next"),
        prevArrow: $(".ev-slider-arrows .slick-prev"),
    });

    $('.testimonial-vertical').slick({
        centerMode: true,
        infinite: true,
        slidesToShow: 3,
        cssEase: 'linear',
        speed: 600,
        variableWidth: true,
        vertical: true,
        verticalSwiping: true,
        nextArrow: $(".testimonials-navigation .slick-next"),
        prevArrow: $(".testimonials-navigation .slick-prev"),
    });

    $(".sticky-sidebar").stick_in_parent();
});