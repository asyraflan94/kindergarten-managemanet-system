@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajaran</li>
    <li>Pakej</li>
    <li>Borang Pakej</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-archive fa-fw "></i>
                Pakej
                <br><span>Sila isi maklumat berikut untuk pakej.</span>
                <a href="{!! URL::to('package') !!}" class="btn btn-danger pull-right" id="cancel"><i class="fa fa-times"></i>
                    &nbsp; Batal</a>
            </h1>
        </div>
    </div>

    <div class="row">
        @if (isset($package))
            {!! Form::open(array('url' => URL::to('package', $package->id), 'method' => 'put', 'files'=>true, 'id' => 'form-package')) !!}
        @else
            {!! Form::open(array('url' => URL::to('package'), 'method' => 'post', 'id' => 'form-package', 'files'=>true)) !!}
        @endif

        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false"
                 data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Borang Pakej</h2>
                </header>

                <div>
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>

                    <div class="widget-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Nama Pakej</label>
                                        <div class="input-group">
                                            {!! Form::input('text', 'name', isset($package) ? $package->name : null, array('class'=>'form-control')) !!}
                                            <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Harga (RM)</label>
                                        <div class="input-group">
                                            {!! Form::input('text', 'price', isset($package) ? $package->price : null, array('class'=>'form-control', 'placeholder' => '00.00')) !!}
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Had Pelajar</label>
                                        <div class="input-group">
                                            {!! Form::input('text', 'limit_student', isset($package) ? $package->limit_student : null, array('class'=>'form-control', 'placeholder' => 'contoh: 30')) !!}
                                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Penerangan Pakej</label>
                                        <div class="input-group">
                                            {!! Form::textarea('description', isset($package) ? $package->description : null, array('class' => 'form-control', 'rows'=>'2')) !!}
                                            <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <fieldset>
                            <div class="form-group">
                                <label for="subject">Nama Subjek</label>
                                <label style="width:100%">
                                    {!! Form::select('subject[]', $subject, null, array('multiple'=>'multiple','class'=>'select2','id'=>'subject')) !!}
                                </label>
                                <div class="note">
                                    Pilih Subjek untuk Pakej ini.
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" id="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        {!! Form::close() !!}
    </div>
@stop

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function () {
            var errorClass = 'invalid';
            var errorElement = 'em';

            var $formPackage = $("#form-package").validate({
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
                    name: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    limit_student: {
                        required: true,
                        digits: true
                    }
                },

                // Messages for form validation
                messages: {
                    name: "Sila masukkan nama pakej.",
                    price: "Ruang ini diperlukan.",
                    limit_student: {
                        required: "Sila masukkan had pelajar",
                        digits: 'Nombor sahaja'
                    }
                },

                // Do not change code below
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });

            @if (isset($package))
                $("#subject").val({!! json_encode($selected) !!}).trigger("change");
            @endif
        });
    </script>
@stop