@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Staf</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-group fa-fw "></i>
                Staf
                &nbsp;
                <a href="{!! URL::to('create/staff') !!}" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Pemilik Organisasi </h2>
                </header>

                <div>
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>

                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Nama Staf</th>
                                <th>Nama Cawangan</th>
                                <th>Jawatan</th>
                                <th>No. Telefon</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </article>
    </div>
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('staff') !!}';
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
                    "ajax": "{!! URL::to('json/staff') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "full_name"
                        },
                        {
                            "targets": [1],
                            "name": "branch_name"
                        },
                        {
                            "targets": [2],
                            "name": "role"
                        },
                        {
                            "targets": [3],
                            "name": "tel_mobile"
                        },
                        {
                            "targets": [4],
                            "searchable": false,
                            "sortable": false,
                            "width": "110px"
                        }
                    ],
                    "rowCallback": function (nRow) {
                        responsiveHelper_dt_basic.createExpandIcon(nRow);
                    },
                    "drawCallback": function (oSettings) {
                        responsiveHelper_dt_basic.respond();
                        $('#dt_basic_length').attr('style', 'float:right');
                        $('[rel=tooltip]').tooltip();
                        $(".m-delete").click(function (e) {
                            var $this = $(this);
                            $.SmartMessageBox({
                                title: "Pengesahan",
                                content: "Adakah anda pasti ingin menghapuskan rekod ini?",
                                buttons: '[No][Yes]'
                            }, function (ButtonPressed) {
                                if (ButtonPressed === "Yes") {
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url: '{!! URL::to('staff') !!}/' + $this.prev().val() + '',
                                        type: 'DELETE',
                                        dataType: 'JSON',
                                        processData: false,
                                        contentType: false,
                                        success: function (result) {
                                            $("#dt_basic").dataTable().fnDraw();
                                        }
                                    });
                                    $.smallBox({
                                        title : "Rekod berjaya dihapuskan",
                                        content : "Anda klik butang hapus",
                                        color : "#C46A69",
                                        icon : "fa fa-trash shake animated",
                                        timeout : 4000
                                    });
                                }
                            });
                            e.preventDefault();
                        });
                    }
                });
            })
        });
    </script>
@stop