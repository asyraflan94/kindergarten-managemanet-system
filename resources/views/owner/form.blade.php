
@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pemilik</li>
    <li>Borang Pemilik Organisasi</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-user fa-fw "></i>
                Pemilik
                <br><span>Sila isi maklumat berikut untuk pemilik organisasi.</span>
                &nbsp;
                <a href="{!! URL::to('owner') !!}" class="btn btn-danger pull-right" id="cancel"><i
                            class="fa fa-times"></i>
                    &nbsp; Batal</a>
            </h1>
        </div>
    </div>

    <div class="row">
        @if (isset($owner))
            {!! Form::open(array('url' => URL::to('update/owner', $owner->id), 'method' => 'post', 'files'=>true, 'id' => 'form-owner')) !!}
        @else
            {!! Form::open(array('url' => URL::to('store/owner'), 'method' => 'post', 'id' => 'form-owner', 'files'=>true)) !!}
        @endif
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <article class="jarviswidget" id="wid-id-1" data-widget-editbutton="false"
                     data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Borang Pemilik </h2>
                </header>

                <div class="smart-form">
                    <div class="widget-body no-padding">
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Nama Penuh</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        {!! Form::input('text', 'full_name', isset($owner) ? $owner->full_name : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Nama Organisasi</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-building"></i>
                                        {!! Form::input('text', 'organization_name', isset($owner) ? $owner->organization_name : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Gambar Pemilik</label>
                                    <label class="input input-file">
                                        <span class="button">
                                            <input type="file" id="file" name="image"
                                                   onchange="$('input[type=\'file\']').parent().next().val($('input[type=\'file\']').val())">
                                            Upload
                                        </span>
                                        {!! Form::input('text', 'image', isset($owner) ? $owner->image : null, array('readonly')) !!}
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Tarikh Lahir</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-calendar"></i>
                                        {!! Form::input('text', 'dob', isset($owner) ? $owner->dob : null, array('id' => 'dob_date')) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">No. Kad Pengenalan</label>
                                    <label class="input">
                                        {!! Form::input('text', 'no_ic', isset($owner) ? $owner->no_ic : null, array()) !!}
                                    </label>
                                </section>

                                <section class="col col-4">
                                    <label class="label">Jantina</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            {{ Form::radio('gender', 'Lelaki', isset($owner) && $owner->gender == 'Lelaki' ? 'checked' : null, array()) }}
                                            <i></i>Lelaki</label>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'Perempuan', isset($owner) && $owner->gender == 'Perempuan' ? 'checked' : null, array()) }}
                                            <i></i>Perempuan</label>
                                    </div>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Warganegara</label>
                                    <label class="input">
                                        {!! Form::input('text', 'nationality', isset($owner) ? $owner->nationality : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Status</label>
                                    <label class="select">
                                        {!! Form::select('marital_status',
                                                         ['' => '',
                                                          'Bujang' => 'Bujang',
                                                          'Berkahwin' => 'Berkahwin',
                                                          'Lain-lain' => 'Lain-lain'],
                                                          isset($owner) ? $owner->marital_status : null, array()) !!}
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Agama</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Buddha', isset($owner) && $owner->religion == 'Buddha' ? 'checked' : null, array()) }}
                                            <i></i>Buddha</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Hindu', isset($owner) && $owner->religion == 'Hindu' ? 'checked' : null, array()) }}
                                            <i></i>Hindu</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Islam', isset($owner) && $owner->religion == 'Islam' ? 'checked' : null, array()) }}
                                            <i></i>Islam</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Kristian', isset($owner) && $owner->religion == 'Kristian' ? 'checked' : null, array()) }}
                                            <i></i>Kristian</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Lain-lain', isset($owner) && $owner->religion == 'Lain-lain' ? 'checked' : null, array()) }}
                                            <i></i>Lain-lain</label>
                                    </div>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">No. Telefon</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        {!! Form::input('tel', 'tel_mobile', isset($owner) ? $owner->tel_mobile : null, array('placeholder' => 'Contoh: 0131234567')) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Email</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope-o"></i>
                                        {!! Form::input('text', 'email', isset($owner) ? $owner->email : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Jawatan</label>
                                    <label class="input">
                                        <input class="form-control" type="text" value="Pemilik" name="role"
                                               readonly="">
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Alamat 1</label>
                                    <label class="input">
                                        {!! Form::input('text', 'address_1', isset($owner) ? $owner->address_1 : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Alamat 2</label>
                                    <label class="input">
                                        {!! Form::input('text', 'address_2', isset($owner) ? $owner->address_2 : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Bandar</label>
                                    <label class="input">
                                        {!! Form::input('text', 'city', isset($owner) ? $owner->city : null, array()) !!}
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Poskod</label>
                                    <label class="input">
                                        {!! Form::input('text', 'postcode', isset($owner) ? $owner->postcode : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Negeri</label>
                                    <label class="input">
                                        {!! Form::input('text', 'state', isset($owner) ? $owner->state : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Negera</label>
                                    <label class="input">
                                        {!! Form::input('text', 'country', isset($owner) ? $owner->country : null, array()) !!}
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <footer>
                            <button id="submit" type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </footer>
                    </div><!-- end widget content -->
                </div>
            </article>
        </article>

        {!! Form::close() !!}
    </div>
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                $('#dob_date').datepicker({
                    dateFormat: 'yy-mm-dd',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1950:' + new Date().getFullYear().toString()
                });

                var errorClass = 'invalid';
                var errorElement = 'em';

                var $formOwner = $("#form-owner").validate({
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
                        full_name: {
                            required: true
                        },
                        organization_name: {
                            required: true
                        },
                        dob: {
                            required: true
                        },
                        tel_mobile: {
                            required: true,
                            minlength: 10
                        },
                        email: {
                            required: true,
                            email: "Format email mestilah seperti ini: name@domain.com"
                        },
                        postcode: {
                            required: true
                        }
                    },

                    // Messages for form validation
                    messages: {
                        full_name: "Sila masukkan nama penuh.",
                        organization_name: "Sila masukkan nama organisasi.",
                        dob: "Sila masukkan tarikh lahir",
                        tel_mobile: {
                            required: "Ruang ini diperlukan.",
                            minlength: "Sila masukkan sekurangnya 10 karakter."
                        },
                        email: {
                            required: "Sila masukkan email untuk dihubungi.",
                            email: "Format email mestilah seperti ini: name@domain.com"
                        },
                        postcode: "Sila masukkan poskod",
                    },

                    // Do not change code below
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.parent());
                    }
                });

                $("#image").click(function (e) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{!! URL::to('owner/upload') !!}',
                        type: 'GET',
                        dataType: 'JSON'
                    });
                });

            });
        })
    </script>
@stop