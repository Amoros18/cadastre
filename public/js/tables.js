$(document).ready( function () {
    //Initialisation des datatable
    $('#table').DataTable();

    //Ligne des tables clickables
    $(".table-row").click(function(){
        window.location=$(this).data("href");
    });
} );