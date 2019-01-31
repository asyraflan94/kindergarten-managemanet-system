@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Organisasi</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-building fa-fw "></i>
                Organisasi
                <span>> Cawangan Utama</span>
                &nbsp;
                <a data-toggle="modal" href="#modal-form" class="btn btn-primary pull-right"> Tambah</a>
            </h1>
        </div>
    </div>

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Organisasi</h2>
                </header>

                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>

                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Nama Organisasi</th>
                                <th>Dimiliki Oleh</th>
                                <th>Tel Pejabat</th>
                                <th>Emel</th>
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </article>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Tambah Organisasi Baru</h4>
                </div>
                <div class="modal-body no-padding">
                    {!! Form::open(array('id' => 'form-ab', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) !!}
                    <fieldset style="border-top: 0px;">
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('organization_name', 'Nama Organisasi', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'organization_name', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-3">
                                {!! Form::label('type', 'Jenis', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'type', null, array('class' => 'input-sm', 'placeholder' => 'Contoh: Pusat Tuisyen')) !!}
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="label">Logo Organisasi</label>
                                <div class="input input-file">
                                    <span class="button">
                                        <input type="file" id="file" name="file"
                                               onchange="$('input[type=\'file\']').parent().next().val($('input[type=\'file\']').val())">
                                        Upload
                                    </span>
                                    <input type="text" readonly="">
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('own_by', 'Nama Pemilik', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'own_by', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('email', 'Emel Organization', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'email', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('tel_office', 'No. Telefon (Pejabat)', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'tel_office', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('tel_mobile', 'No. Telefon', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'tel_mobile', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <br/>
                        <hr/>
                        <br/>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('address_1', 'Alamat 1', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'address_1', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('address_2', 'Alamat 2', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'address_2', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('city', 'Bandar', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'city', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('postcode', 'Poskod', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'postcode', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('state', 'Negeri', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'state', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('country', 'Negara', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'country', null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button type="submit" id="submit" class="btn btn-success">
                            Simpan
                        </button>
                        <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">
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
                var url = '{!! URL::to('organization') !!}';
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
                        organization_name: {
                            required: true
                        },
                        own_by: {
                            required: true
                        },
                        type: {
                            required: true
                        },
                        tel_office: {
                            required: true,
                            digits: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        postcode: {
                            required: true,
                            digits: true
                        }
                    },

                    // Messages for form validation
                    messages: {
                        organization_name: "Sila masukkan nama organisasi.",
                        own_by: "Sila masukkan nama pemilik.",
                        type: "Ruang ini diperlukan.",
                        tel_office: {
                            required: "Ruang ini diperlukan.",
                            digits: 'Nombor sahaja'
                        },
                        email: {
                            required: "Sila masukkan email untuk dihubungi.",
                            email: "Format email mestilah seperti ini: name@domain.com"
                        },
                        postcode: {
                            required: "Sila masukkan poskod.",
                            digits: 'Nombor sahaja'
                        }
                    },

                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    },
                    submitHandler: function (form) {
                        if ($('.modal-title').html() == 'Tambah Organisasi Baru') {
                            url = '{!! URL::to('store/organization') !!}';
                        }

                        var fd = new FormData();
                        fd.append('file', $('#file')[0].files[0]);

                        if ($('.modal-title').html() == 'Kemaskini Organisasi') {
                            fd.append('_method', 'post');
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
                    "ajax": "{!! URL::to('json/organization') !!}",
                    "columnDefs": [
                        {
                            "targets": [0],
                            "name": "organization_name"
                        },
                        {
                            "targets": [1],
                            "name": "own_by"
                        },
                        {
                            "targets": [2],
                            "name": "tel_office"
                        },
                        {
                            "targets": [3],
                            "name": "email"
                        },
                        {
                            "targets": [4],
                            "name": "type"
                        },
                        {
                            "targets": [5],
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
                                        url: '{!! URL::to('delete/organization') !!}/' + $this.prev().val(),
                                        type: 'DELETE',
                                        dataType: 'JSON',
                                        processData: false,
                                        contentType: false,
                                        success: function (result) {
                                            $("#dt_basic").dataTable().fnDraw();
                                        }
                                    });
                                    $.smallBox({
                                        title: "Berjaya",
                                        content: "Rekod berjaya dihapuskan",
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
                                url: '{!! URL::to('edit/organization') !!}/' + $(this).prev().prev().val(),
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
                                    $('#email').prop('readonly', 'readonly');
                                    
                                    url = '{!! URL::to('update/organization') !!}/' + result['id'];
                                    $('.modal-title').html("Kemaskini Organisasi");
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
                    $('.modal-title').html("Tambah Organisasi Baru");
                });
            })
        });
    </script>
@stop