//Use Strict Mode
(function ($) {
    "use strict";

    var mainSlider = $(".main-carousel");

    function sliderCarousel(){

        var mainSlider = $(".main-carousel");

        mainSlider.on('initialized.owl.carousel', function(e){
            $('.slide-title').addClass('active');
            $('.slide-icon').addClass('active');
            $('.slide-text').addClass('active');
            $('.slide-extra').removeClass('active');
            $('.featured-slide .primary-btn').addClass('active');
            var slideVideo = $(this).find('video');
            if ( $( slideVideo ).length ) {
                slideVideo.get(0).play();
            }     
        }); 
        
        mainSlider.owlCarousel({
            items: 1,
            nav: true,
            loop: false,
            autoplay:true,
            autoplayTimeout:8000,
            navText: ['&#xf053;','&#xf054;']  
        });

        mainSlider.on('changed.owl.carousel', function(e){          
            $('.slide-title').removeClass('active');
            $('.slide-icon').removeClass('active');
            $('.slide-text').removeClass('active');
            $('.featured-slide .primary-btn').removeClass('active'); 
            $('.slide-extra').removeClass('active');                        
            return false;
        });
         

        mainSlider.on('translated.owl.carousel', function(e){
            $('.slide-title').addClass('active');
            $('.slide-icon').addClass('active');
            $('.slide-text').addClass('active');
            $('.slide-extra').addClass('active');
            $('.featured-slide .primary-btn').addClass('active');
            var slideVideo = $(this).find('video');
            if ( $( slideVideo ).length ) {
                slideVideo.get(0).play();
            }            
            return false;
        });       
    }

    //Begin - Window Load
    $(window).load(function () {        

        setTimeout(sliderCarousel, 500);     	

    });

    $(document).on('mouseup', function(){
       setTimeout(sliderCarousel, 1200);   
    });

    //End - Use Strict mode
})(jQuery);