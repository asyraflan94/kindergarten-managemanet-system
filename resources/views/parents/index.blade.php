@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>IbuBapa & Penjaga</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-child fa-fw "></i>
                Ibu Bapa & Penjaga
                <span>> Menguruskan Ibu Bapa & Penjaga </span>
                &nbsp;
                <a href="{!! URL::to('create/parents') !!}" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Ibu Bapa & Penjaga </h2>
                </header>

                <div>
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>

                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Nama Bapa</th>
                                <th>Nama Ibu</th>
                                <th>Alamat 1</th>
                                <th>Alamat 2</th>
                                <th>Poskod</th>
                                <th>Bandar</th>
                                <th>Negeri</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </article>
    </div><!-- end row -->
@stop


@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('parents') !!}';
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
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>>" +
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
                    "ajax": "{!! URL::to('json/parents') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "father_name"
                        },
                        {
                            "targets": [1],
                            "name": "mother_name"
                        },
                        {
                            "targets": [2],
                            "name": "address_1"
                        },
                        {
                            "targets": [3],
                            "name": "address_2"
                        },
                        {
                            "targets": [4],
                            "name": "postcode"
                        },
                        {
                            "targets": [5],
                            "name": "city"
                        },
                        {
                            "targets": [6],
                            "name": "state"
                        },
                        {
                            "targets": [7],
                            "searchable": false,
                            "sortable": false,
                            "width": "85px"
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
                                        url: '{!! URL::to('parents') !!}/' + $this.prev().val() + '',
                                        type: 'DELETE',
                                        dataType: 'JSON',
                                        processData: false,
                                        contentType: false,
                                        success: function (result) {
                                            $("#dt_basic").dataTable().fnDraw();
                                        }
                                    });
                                    $.smallBox({
                                        title: "Rekod berjaya dihapuskan",
                                        content: "Anda klik butang hapus",
                                        color: "#C46A69",
                                        icon: "fa fa-trash shake animated",
                                        timeout: 4000
                                    });
                                }
                            });
                            e.preventDefault();
                        });

                        $(".m-edit").click(function (e) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '{!! URL::to('parents') !!}/' + $(this).prev().prev().val() + '/edit',
                                type: 'GET',
                                dataType: 'JSON',
                                success: function (result) {

                                    $.each(validate, function (k, v) {
                                        $('#' + v).parent().removeClass('state-error');
                                    });

                                    $('#form-ab input, #form-ab select').each(
                                        function (index) {
                                            var input = $(this);
                                            $.each(result, function (k, v) {
                                                if (k == input.attr('name') && input.attr('type') == 'text') {
                                                    input.val(v);
                                                } else if (k == input.attr('name') && input.is('select') === true) {
                                                    $('[name="' + k + '"] option').removeAttr('selected');
                                                    $('[name="' + k + '"] option').filter('[value="' + v + '"]').prop('selected', true)
                                                }
                                            });

                                        }
                                    );

                                    //TODO edit email memerlukan special treatment sbb email adalah unik
                                    // $('#email').prop('disabled', 'disabled');
                                    url = '{!! URL::to('parents') !!}/' + result['id'];
                                }
                            });
                        });
                    }
                });

                $('#submit').click(function () {

                    var other_data = $('#form-ab').serializeArray();
                    $.each(other_data, function (key, input) {
                        fd.append(input.name, input.value);
                    });
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        data: fd,
                        success: function (result) {
                            $('#modal-form').modal('hide');
                            $("#dt_basic").dataTable().fnDraw();
                            $.smallBox({
                                title: "Rekod berjaya disimpan",
                                content: "Anda berjaya menyimpan rekod tersebut",
                                color: "#739E73",
                                icon: "fa fa-check bounce animated",
                                timeout: 4000
                            });
                        }
                    });
                });

                $('#cancel').click(function () {
                    $.smallBox({
                        title: "Batal",
                        content: "<i class='fa fa-clock-o'></i> <i> Anda klik butang batal</i>",
                        color: "#C79121",
                        iconSmall: "fa fa-times shake animated",
                        number: "1",
                        timeout: 4000
                    });
                });
            })
        });
    </script>
@stop