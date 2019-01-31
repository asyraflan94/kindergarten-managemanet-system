@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Stok</li>
    <li>Menguruskan Stok Tadika</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-shopping-cart fa-fw "></i>
                Stok
                <span>> Menguruskan Stok</span>
                &nbsp;
                <a data-toggle="modal" href="#modal-form" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Stok </h2>
                </header>

                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">

                    </div>

                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Nama Stok</th>
                                <th>Harga Seunit (RM)</th>
                                <th>Kuantiti</th>
                                <th>Tarikh Stok Masuk</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div><!-- end widget content -->
            </div><!-- end widget div -->
        </article><!-- WIDGET END -->
    </div><!-- end row -->

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Tambah Stok Baru</h4>
                </div>

                <div class="modal-body no-padding">
                    {!! Form::open(array('id' => 'form-ab', 'class' => 'smart-form', 'encType' => 'multipart/form-data', 'novalidate' => 'novalidate')) !!}
                    <fieldset style="border-top: 0px;">
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('stock_name', 'Nama Stok', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'stock_name', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('price', 'Harga Seunit (RM)', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'price', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('quantity', 'Kuantiti', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'quantity', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('desc', 'Penerangan', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'description', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                    </fieldset>

                    <footer>
                        <button type="button" id="submit" class="btn btn-success">Simpan</button>
                        <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </footer>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('stock') !!}';
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
                    "ajax": "{!! URL::to('json/stock') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "stock_name",
                            "width": "30%"
                        },
                        {
                            "targets": [1],
                            "name": "price",
                            "render" : function (data){
                                return 'RM '  + $('<div/> ').text(data).html() + '';
                            }
                        },
                        {
                            "targets": [2],
                            "name": "quantity"
                        },
                        {
                            "targets": [3],
                            "name": "created_at"
                        },
                        {
                            "targets": [4],
                            "searchable": false,
                            "sortable": false,
                            "width": "93px"
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
                                        url: '{!! URL::to('stock') !!}/' + $this.prev().val() + '',
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
                                url: '{!! URL::to('stock') !!}/' + $(this).prev().prev().val() + '/edit',
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

                                    url = '{!! URL::to('stock') !!}/' + result['id'];
                                    $('.modal-title').html("Kemaskini Stok");
                                    $('[data-toggle="modal"]').trigger("click");
                                }
                            });
                        });
                    }
                });

                $('#modal-form').on('hidden.bs.modal', function () {

                    $('#form-ab input, #form-ab select').each(
                        function (index) {
                            var input = $(this);
                            if (input.attr('type') == 'text') {
                                input.val('');
                            } else if (input.is('select') === true) {
                                $('[name="' + input.attr('name') + '"] option')
                                    .removeAttr('selected')
                                    .filter('[value=""]')
                                    .attr('selected', true)
                            }

                        }
                    );
                    $('.modal-title').html("Tambah Stok Baru");
                });

                $('#submit').click(function () {

                    if ($('.modal-title').html() == 'Tambah Stok Baru') {
                        url = '{!! URL::to('stock') !!}';
                    }

                    var fd = new FormData();

                    if ($('.modal-title').html() == 'Kemaskini Stok') {
                        fd.append('_method', 'put');
                    }

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