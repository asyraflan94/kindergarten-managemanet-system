@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Akademik</li>
    <li>Butiran Akademik Pelajar</li>
@stop

@section('content')
    <!-- MAIN CONTENT -->

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-mortar-board fa-fw "></i>
                    Akademik
                    <span> > Gred Pelajar : </span>

                    <a data-toggle="modal" href="#modal-form"></a>
                    <i class="ultra-light text-primary"> {!! $teacher->full_name !!}</i>


                </h1>
            </div>
        </div>

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                        <!-- widget options:
                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"

                        -->

                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Gred Akademik Pelajar</h2>
                        </header>

                        <div>

                            <div class="jarviswidget-editbox">

                            </div>

                            <div class="widget-body no-padding">
                                <table id="dt_basic"
                                       class="table table-striped table-bordered table-hover"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-align-center">Subjek</th>
                                        <th class="text-align-center">Kod Subjek</th>
                                        <th class="text-align-center">Gred</th>
                                        <th class="text-align-center">Markah</th>
                                        <th class="text-align-center">Ulasan</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                </table>

                            </div>
                        </div><!-- end widget div -->
                    </div>
                </article>
            </div>

            <footer class="pull-right">
                <button type="button" class="btn btn-danger"
                        onclick="window.history.back();"><span class="btn-labeled">< Kembali</span>
                </button>
            </footer>
        </section>
    </div><!-- end widget -->


    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Kemaskini Gred Pelajar</h4>
                </div>
                <div class="modal-body no-padding">
                    {!! Form::open(array('id' => 'form-ab', 'class' => 'smart-form', 'enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id_student" value="{!! \Request::segment(2) !!}">
                    <fieldset style="border-top: 0px;">
                        <div class="row">
                            <section class="col col-6 ">
                                {!! Form::label('subject_name', 'Nama Subjek', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'subject_name', isset($show_grade) ? $show_grade->subject_name : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('id_subject', 'Kod Subjek', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'id_subject', isset($show_grade) ? $show_grade->id_subject : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('mark', 'Markah', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'mark', isset($grade) ? $grade->mark : null, array('class' => 'input-sm', 'placeholder' => 'Contoh: 90')) !!}
                                </label>
                            </section>
                            <section class="col col-3">
                                {!! Form::label('grade', 'Gred', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::select('select', array('' => 'Sila pilih','A' => 'A','B' => 'B','C' => 'C','D' => 'D'), isset($grade) ? $grade->grade : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-3">
                                {!! Form::label('review', 'Ulasan', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::select('select',  array('' => 'Sila pilih','Cemerlang' => 'Cemerlang','Baik' => 'Baik','Memuaskan' => 'Memuaskan','Kurang baik' => 'Kurang baik'), isset($grade) ? $grade->review : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                    </fieldset>

                    <footer>
                        <button type="button" id="submit" class="btn btn-primary btn-labeled btn-success">
                            Simpan
                        </button>
                        <button type="button" id="cancel" class="btn btn-danger" data-dismiss="modal">
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
                var url = '{!! URL::to('show_grade') !!}';
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
                    "ajax": "{!! URL::to('datatables/grade', Request::segment(2)) !!}",
                    "columnDefs": [

                        {
                            "targets": [0],
                            "name": "subject_name"
                        },
                        {
                            "targets": [1],
                            "name": "id_subject"
                        },
                        {
                            "targets": [2],
                            "name": "grade"
                        },
                        {
                            "targets": [3],
                            "name": "mark"
                        },
                        {
                            "targets": [4],
                            "name": "review"
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
                        $(".m-edit").click(function (e) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '{!! URL::to('show_grade') !!}/' + $(this).prev().prev().val() + '/edit',
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

                                    $('#subject_name').prop('readonly', 'readonly');
                                    $('#id_subject').prop('readonly', 'readonly');
                                    url = '{!! URL::to('show_grade') !!}/' + result['id'] + '/edit';
                                    $('.modal-title').html("Kemaskini Gred Pelajar");
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

                    $('.modal-title').html("Kemaskini Gred Pelajar");
                });
                $('#submit').click(function () {

                    if ($('.modal-title').html() == 'Kemaskini Gred Pelajarr') {
                        url = '{!! URL::to('show_grade') !!}';
                    }

                    var fd = new FormData();

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


            })
        });
    </script>
@stop

