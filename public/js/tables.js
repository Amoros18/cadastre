$(document).ready( function () {
    //Initialisation des datatable
    $('#table').DataTable();

    //Ligne des tables clickables
    $('#table tbody').on('click', '.table-row', function() {
        window.location=$(this).data("href");
    });
} );