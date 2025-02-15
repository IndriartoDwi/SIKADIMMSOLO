<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">

@if (in_array('datatable', @$plugins))
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endif

@if (in_array('form_wizard', @$plugins))
<!-- twitter-bootstrap-wizard css -->
<link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}>
@endif

@if (in_array('leaflet', @$plugins))

<!-- leaflet Css -->
<link href="{{ asset('assets/libs/leaflet/leaflet.css') }} rel="stylesheet" type="text/css" />
@endif

@if (in_array('swal', @$plugins))
<!-- Sweet Alert-->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endif

@if (in_array('lightbox', @$plugins))
<!-- Lightbox css -->
<link href="{{ asset('assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
@endif

@if (in_array('select2', @$plugins))
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endif

@if (in_array('tui_chart', @$plugins))
<!-- tui charts Css -->
<link href="{{ asset('assets/libs/tui-chart/tui-chart.min.css') }}" rel="stylesheet" type="text/css" />
@endif

@if (in_array('datepicker', @$plugins))
<link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
    type="text/css">
@endif