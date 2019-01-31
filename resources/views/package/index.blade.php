@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajaran</li>
    <li>Pakej</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-archive fa-fw "></i>
                Pakej
                &nbsp;
                <a href="{!! URL::to('create/package') !!}" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Pakej</h2>
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
                                <th>Nama Pakej</th>
                                <th>Harga</th>
                                <th>Had Pelajar</th>
                                <th>Penerangan</th>
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
                var url = '{!! URL::to('package') !!}';
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

                $('#dt_basic').grid({
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
                    "ajax": "{!! URL::to('json/package') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "name"
                        },
                        {
                            "targets": [1],
                            "name"   : "price",
                            "render" : function (data){
                                return 'RM '  + $('<div/> ').text(data).html() + '';
                            }
                        },
                        {
                            "targets": [2],
                            "name": "limit_student"
                        },
                        {
                            "targets": [3],
                            "name": "description"
                        },
                        {
                            "targets": [4],
                            "searchable": false,
                            "sortable": false,
                            "width": "103px"
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
                                        url: '{!! URL::to('package') !!}/' + $this.prev().val() + '',
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