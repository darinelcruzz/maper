<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- iCheck 1.0.1 -->
<script src="{{ asset('/plugins/icheck.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('/plugins/select2.full.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script>
$(function () {

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    var language = {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Registros del _START_ al _END_ de _TOTAL_ ",
      "sInfoEmpty":      "No hay registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    };

    //Initialize Select2 Elements
    $(".select2").select2();

    // Data Table With Full Features
    $("#example1").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example2").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example3").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example4").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example5").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example6").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example7").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $("#example8").DataTable({
      "order":[[ 0 , "desc"]],
      language: language
    });
    $(".no-pagination").DataTable({
      "order":[[ 0 , "desc"]],
      language: language,
      paging: false
    });
});
</script>
