@foreach ($permissions as $key => $value)
<input type="hidden" name="{{$key}}" class="permission_status" data-name="{{$key}}" value="{{$value ? 1 : 0}}">
@endforeach

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('js/plugin/loading-overlay/loadingoverlay.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
<script src="{{ asset('js/page/change-password/form.js') }}"></script>

@if (in_array('datatable', $plugins))
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
<script
    src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<!-- Buttons examples -->
<script
    src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script
    src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script
    src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}">
</script>
<script
    src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}">
</script>
<script
    src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}">
</script>

<!-- Responsive examples -->
<script
    src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>
<script>
    $('body').on('draw.dt', function(e, ctx) {
        var api = new $.fn.dataTable.Api(ctx);

        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endif

@if (in_array('form_wizard', $plugins))
<!-- twitter-bootstrap-wizard js -->
<script
    src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}">
</script>

<script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
@endif

@if (in_array('swal', $plugins))
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endif

@if (in_array('apex_chart', $plugins))
<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
@endif

@if (in_array('lightbox', $plugins))
<!-- Magnific Popup-->
<script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}">
</script>
@endif

@if (in_array('select2', $plugins))
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
@endif

@if (in_array('tui_chart', $plugins))
<!-- tui charts plugins -->
<script src="{{ asset('assets/libs/tui-chart/tui-chart-all.min.js') }}"></script>
@endif

@if (in_array('leaflet', $plugins))
<script src="{{ asset('js/plugin/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('js/plugin/leaflet/leaflet-esri.js') }}"></script>
<script src="{{ asset('js/plugin/leaflet/leaflet.ajax.js') }}"></script>
@endif

@if (in_array('datepicker', $plugins))
<script
    src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}">
</script>
@endif

@if (in_array('chart_js', $plugins))
<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>
@endif