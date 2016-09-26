 $(function () {
    $("#example1").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
      e.preventDefault();
      $( this ).tab( 'show' );
    } );


    $( '.js-alert-test' ).click( function () {
      alert( 'Button Clicked: Event was maintained' );
    } );
    fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );

});

