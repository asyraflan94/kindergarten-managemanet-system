@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajaran</li>
    <li>Subjek</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-book fa-fw "></i>
                Subjek
                &nbsp;
                <a data-toggle="modal" href="#modal-form" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Subjek</h2>
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
                                <th>Kod</th>
                                <th>Nama Subjek</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Huraian</th>
                                <th></th>
                            </tr>
                        </table>

                    </div>
                </div><!-- end widget content -->
            </div><!-- end widget div -->
        </article><!-- WIDGET END -->
    </div><!-- end row -->

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Tambah Subjek Baru</h4>
                </div>
                <div class="modal-body no-padding">
                    {!! Form::open(array('id' => 'form-ab', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) !!}
                    <fieldset style="border-top: 0px;">
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('code', 'Kod Subjek', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'code', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('name', 'Nama Subjek', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'name', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('description', 'Huraian Subjek', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::textarea('description', null, array('class' => 'form-control input-sm', 'rows' => '5')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                <br>
                                <span class="onoffswitch-title">Subjek Add-On</span>
                                <span class="onoffswitch">
                                    <input type="hidden" name="type_subject" id="add_onHidden" value="Basic"/>
                                    <input type="checkbox" name="type_subject" class="onoffswitch-checkbox" id="add_on"
                                           value="Add-On"/>
                                    <label class="onoffswitch-label" for="add_on">
                                        <span class="onoffswitch-inner" data-swchon-text="Ya"
                                              data-swchoff-text="Tidak"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </span>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('price', 'Harga (RM)', ['class' => 'label']) !!}
                                <label class="input">
                                    <input id="is_addOn" type="text" class="input form-control input-sm" readonly=""
                                           name="price" value="0"/>
                                    <!-- harga ni akan enable bila user switch YA dekat Add on -->
                                </label>
                            </section>
                        </div>
                        <br/>
                    </fieldset>
                    <footer>
                        <button type="submit" id="submit" class="btn btn-success">
                            Simpan
                        </button>
                        <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>
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
                var url = '{!! URL::to('subject') !!}';
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

                var errorClass = 'invalid';
                var errorElement = 'em';

                var $modalForm = $("#form-ab").validate({
                    errorClass: errorClass,
                    errorElement: errorElement,
                    highlight: function (element) {
                        $(element).parent().removeClass('state-success').addClass("state-error");
                        $(element).removeClass('valid');
                    },
                    unhighlight: function (element) {
                        $(element).parent().removeClass("state-error").addClass('state-success');
                        $(element).addClass('valid');
                    },
                    // Rules for form validation
                    rules: {
                        code: {
                            required: true
                        },
                        name: {
                            required: true
                        },
                        price: {
                            required: true
                        }
                    },

                    // Messages for form validation
                    messages: {
                        code: "Sila masukkan kod subjek.",
                        name: "Sila masukkan nama subjek.",
                        price: "Sila masukkan harga."

                    },

                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    },
                    submitHandler: function (form) {

                        if ($('.modal-title').html() == 'Tambah Subjek Baru') {
                            url = '{!! URL::to('subject') !!}';
                        }

                        var fd = new FormData();

                        if ($('.modal-title').html() == 'Kemaskini Subjek') {
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
                        return false; // required to block normal submit since you used ajax
                    }
                });

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
                    "ajax": "{!! URL::to('json/subject') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "code"
                        },
                        {
                            "targets": [1],
                            "name": "name"
                        },
                        {
                            "targets": [2],
                            "name": "type_subject"
                        },
                        {
                            "targets": [3],
                            "name": "price",
                            "render": function (data) {
                                return 'RM ' + $('<div/> ').text(data).html() + '';
                            }
                        },
                        {
                            "targets": [4],
                            "name": "description",
                            "width": "40%"
                        },
                        {
                            "targets": [5],
                            "searchable": false,
                            "sortable": false,
                            "width": "90px"
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
                                        url: '{!! URL::to('subject') !!}/' + $this.prev().val() + '',
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
                                url: '{!! URL::to('subject') !!}/' + $(this).prev().prev().val() + '/edit',
                                type: 'GET',
                                dataType: 'JSON',
                                success: function (result) {

                                    $.each(validate, function (k, v) {
                                        $('#' + v).parent().removeClass('state-error');
                                    });

                                    $('#form-ab input, #form-ab select, #form-ab textarea').each(
                                            function (index) {
                                                var input = $(this);
                                                $.each(result, function (k, v) {
                                                    if (k == input.attr('name') && input.attr('type') == 'text') {
                                                        input.val(v);
                                                    } else if (k == input.attr('name') && input.is('select') === true) {
                                                        $('[name="' + k + '"] option').removeAttr('selected');
                                                        $('[name="' + k + '"] option').filter('[value="' + v + '"]').prop('selected', true)
                                                    } else if (k == input.attr('name') && input.is('textarea') === true) {
                                                        input.val(v);
                                                    }
                                                });

                                            }
                                    );
                                    $('#form-ab input:checkbox').each(
                                            function (index) {
                                                var input = $(this);
                                                $.each(result, function (k, v) {
                                                    if (v == 'Basic') {
                                                        input.prop('checked', false);
                                                    }
                                                    else if (v == 'Add-On') {
                                                        input.prop('checked', true);
                                                    }
                                                });
                                            }
                                    );

                                    url = '{!! URL::to('subject') !!}/' + result['id'];
                                    $('.modal-title').html("Kemaskini Subjek");
                                    $('[data-toggle="modal"]').trigger("click");
                                }
                            });
                        });
                    }
                });

                $('#modal-form').on('hidden.bs.modal', function () {

                    $('#form-ab input, #form-ab select, #form-ab textarea').each(
                            function (index) {
                                var input = $(this);
                                if (input.attr('type') == 'text') {
                                    input.val('');
                                } else if (input.is('select') === true) {
                                    $('[name="' + input.attr('name') + '"] option')
                                            .removeAttr('selected')
                                            .filter('[value=""]')
                                            .attr('selected', true)
                                } else if (input.is('textarea') == true) {
                                    input.val('');
                                }
                            }
                    );
                    $('#is_addOn').val('0');
                    $('#form-ab').find('input:checkbox').prop('checked', false);
                    $('.modal-title').html("Tambah Subjek Baru");
                });

                $('#add_on').on('click', function () {
                    var inp = $('#is_addOn').get(0);
                    if (inp.hasAttribute('enable')) {
                        inp.val("00.00");
                        $('#add_onHidden').disabled = false;
                        $('#add_on').prop('checked', false);
                        inp.setAttribute('readonly', 'true');
                        inp.removeAttribute('enable');
                    }
                    else {
                        $('#add_onHidden').disabled = true;
                        $('#add_on').prop('checked', true);
                        $('#add_on').val("Add-On");
                        inp.setAttribute('enable', 'enable');
                        inp.removeAttribute('readonly');
                    }
                });
            })
        });
    </script>
@stop
