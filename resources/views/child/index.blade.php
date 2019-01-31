@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Anak</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-child fa-fw "></i>
                Anak
                <br><span>Senarai anak anda yang didaftarkan di (nama_tadika):</span>
            </h1>
        </div>

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Anak </h2>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Nama Anak</th>
                                <th>Nombor MyKid</th>
                                <th>Tarikh Lahir</th>
                                <th>Jantina</th>
                                <th>Kelas</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div><!-- end widget content -->
            </div><!-- end widget div -->
        </article><!-- WIDGET END -->
    </div><!-- end row -->
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('child') !!}';
                var validate = ['name', 'email', 'role'];

                /* BASIC ;*/
                var responsiveHelper_dt_basic = undefined;
                var responsiveHelper_datatable_fixed_column = undefined;
                var responsiveHelper_datatable_col_reorder = undefined;
                var responsiveHelper_datatable_tabletools = undefined;

                var breakpointDefinition = {
                    tablet: 1024,
                    phone: 480
                };

                $('#dt_basic').dataTable({
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                    "autoWidth": true,
                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                    },
                    "preDrawCallback": function () {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper_dt_basic) {
                            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                        }
                    },
                    "processing": true,
                    "serverSide": true,
                    "stateSave": true,
                    "ajax": "{!! URL::to('json/child') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "full_name"
                        },
                        {
                            "targets": [1],
                            "name": "mykid"
                        },
                        {
                            "targets": [2],
                            "name": "dob"
                        },
                        {
                            "targets": [3],
                            "name": "gender"
                        },
                        {
                            "targets": [4],
                            "name": "classroom"
                        },
                        {
                            "targets": [5],
                            "searchable": false,
                            "sortable": false,
                            "width": "40px"
                        }
                    ],
                    "rowCallback": function (nRow) {
                        responsiveHelper_dt_basic.createExpandIcon(nRow);
                    },
                    "drawCallback": function (oSettings) {
                        responsiveHelper_dt_basic.respond();
                        $('#dt_basic_length').attr('style', 'float:right');
                        $('[rel=tooltip]').tooltip();
                    }
                });
            })
        });
    </script>
@stop