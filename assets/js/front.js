jQuery( document ).ready( function( $ ) {

    var popupRootEl     = $( '#tmc_sp_root' );      //  Popup main object.
    var popupCloseEls   = $( '#tmc_sp_close' );     //  Close buttons.
    var popupOpenEls    = $( '#adminbar-search' );  //  Open buttons.

    if( ! popupRootEl ){
        console.log( 'Search popup could not initialize elements.' );
        return;
    }

    popupOpenEls.click( function( event ) {
        event.preventDefault();
        activatePopup();
    } );

    popupCloseEls.click( function( event ) {
        event.preventDefault();
        deactivatePopup();
    } );

    //  ----------------------------------------
    //  Functions
    //  ----------------------------------------

    function activatePopup() {

        popupRootEl.addClass( 'is-active' );
        $( 'body' ).addClass( 'noscroll' );

    }

    function deactivatePopup() {

        popupRootEl.removeClass( 'is-active' );
        $( 'body' ).removeClass( 'noscroll' );

    }

} );