jQuery( document ).ready( function( $ ) {

    var popupRootEl     = $( '#tmc_sp_root' );      //  Popup main object.
    var popupCloseEls   = $( '#tmc_sp_close' );     //  Close buttons.
    var popupOpenEls    = $( '#adminbar-search' );  //  Open buttons.
    var popupFormEl     = $( '#tmc_sp_form' );      //  Form.
    var popupResultsEl  = $( '#tmc_sp_results' );   //  Results div.

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

    popupFormEl.submit( function( event ) {
        event.preventDefault();
        sendForm();
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

    function sendForm() {

        popupRootEl.addClass( 'has-results' );
        popupResultsEl.html( '' );

    }

} );