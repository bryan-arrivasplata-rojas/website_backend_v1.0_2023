var estilo = $('#example');
var table;
var table = estilo.DataTable({
    responsive:true,
    autoWidth:true,
    deferRender:    true,
    scroller:       true,
    "language":{
        url:'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
    }
});


$('.usability').change(function(){
    table.columns(4).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.userHost').change(function(){
    table.columns(5).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('#example').on( 'keyup', function () {
    table.search( this.value ).draw();
} );