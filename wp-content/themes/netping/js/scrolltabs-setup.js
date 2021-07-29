jQuery(document).ready(function($) {

    $('ul.tabs.wc-tabs').scrollTabs({
        scroll_distance: 350,        // Pixel width for how far to scroll with each single-click
        scroll_duration: 350,        // Milliseconds for how long to animate the scroll
        left_arrow_size: 26,         // Width of the left arrow (if you choose to customize this)
        right_arrow_size: 26,        // Width of the right arrow (if you choose to customize this)
        click_callback: function(e){ 
            // This shows the default callback, which will redirect the page based
            // on the 'rel' attribute.
            
            // $(this).on('click', '.wc-tabs .scroll_tab_inner li a, ul.tabs li a', function( e ) {

                e.preventDefault();
                var $tab          = $( this ).find('a');
                var $tabs_wrapper = $tab.closest( '.wc-tabs-wrapper, .woocommerce-tabs' );
                var $tabs         = $tabs_wrapper.find( '.wc-tabs, ul.tabs' );

                $tabs.find( 'li' ).removeClass( 'active' );
                $tabs_wrapper.find( '.wc-tab, .panel:not(.panel .panel)' ).hide();

                $tab.closest( 'li' ).addClass( 'active' );
                $tabs_wrapper.find( $tab.attr( 'href' ) ).show();
                

            // });
            
            // var val = $(this).attr('aria-controls');
            // if(val){
            //     window.location.href = '#' + val;
            // }
        }
    });
});