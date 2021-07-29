(function($) {
    $(document).ready(function(){
        
        $('.catalog-sidebar .widget-title').click(function() {
            $('.catalog-sidebar').toggleClass('toggled');
        });
        

        // $(window).on('scroll', function(event) {
        //         // console.log($(window).scrollTop());
        //         // console.log(elementPosition.top);
        //         // console.log($('ul.tabs.scroll_tabs_container').offset().top);
        //         if($(window).scrollTop() >= $('.woocommerce-tabs.wc-tabs-wrapper').offset().top){
        //             $('ul.tabs.scroll_tabs_container').addClass('sticky');
        //         } else {
        //             $('ul.tabs.scroll_tabs_container').removeClass('sticky');
        //         }    
        // });
    });




})(jQuery);