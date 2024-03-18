(function($) {
    if ($(window).width() > 992) {
    $('.slider__wrapp').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    }
   })( jQuery );


   jQuery(($) => {
    if ($(window).width() < 800) {
        $('.products').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 3
        });
    }
});

