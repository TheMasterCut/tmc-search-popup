jQuery( document ).ready( function( $ ) {

    var popup = {

        'elems':            {
            'popupRootEl':      $( '#tmc_sp_root' ),        //  Popup main object.
            'popupCloseEls':    $( '#tmc_sp_close' ),       //  Close buttons.
            'popupOpenEls':     $( '#adminbar-search' ),    //  Open buttons.
            'popupFormEl':      $( '#tmc_sp_form' ),        //  Form.
            'popupResultsEl':   $( '#tmc_sp_results' )      //  Results div.
        },

        /**
         * Initializes whole mechanism.
         *
         * @return void
         */
        init:               function() {

            if( ! popup.elems.popupRootEl ){
                console.log( 'Search Popup TMC could not initialize elements.' );
                return;
            }

            popup.elems.popupOpenEls.click( function( event ) {
                event.preventDefault();
                popup.activatePopup();
            } );

            popup.elems.popupCloseEls.click( function( event ) {
                event.preventDefault();
                popup.deactivatePopup();
            } );

            popup.elems.popupFormEl.submit( function( event ) {
                event.preventDefault();
                popup.sendForm();
            } );

        },

        /**
         *
         *
         * @return void
         */
        activatePopup:      function() {

            popup.elems.popupRootEl.addClass( 'is-active' );
            $( 'body' ).addClass( 'noscroll' );

        },

        deactivatePopup:    function() {

            popup.elems.popupRootEl.removeClass( 'is-active' );
            $( 'body' ).removeClass( 'noscroll' );

        },

        sendForm:           function() {

            popup.elems.popupRootEl.addClass( 'has-results' );
            popup.elems.popupResultsEl.html( '' );

        }

    };

    popup.init();

} );