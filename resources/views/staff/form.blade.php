@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Staf</li>
    <li>Borang Staf</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-user fa-fw "></i>
                Staf
                <br><span>Sila isi maklumat berikut untuk staf.</span>

                <a href="{!! URL::to('staff') !!}" class="btn btn-danger pull-right" id="cancel"><i class="fa fa-times"></i>
                    &nbsp; Batal</a>
            </h1>
        </div>

        <!-- NEW COL START -->
        @if (isset($staff))
            {!! Form::open(array('url' => URL::to('update/staff', $staff->id), 'method' => 'post', 'files'=>true, 'id' => 'form-staff')) !!}
        @else
            {!! Form::open(array('url' => URL::to('store/staff'), 'method' => 'post', 'id' => 'form-staff', 'files'=>true)) !!}
        @endif

        {{--maklumat Basic--}}
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <article class="jarviswidget" id="wid-id-1" data-widget-editbutton="false"
                     data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Maklumat Staf </h2>
                </header>

                <div class="smart-form">
                    <div class="widget-body no-padding">
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Nama Penuh</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        {!! Form::input('text', 'full_name', isset($staff) ? $staff->full_name : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Mengajar Kelas</label>
                                    <label class="select">
                                        {!! Form::select('class_name', ['' => '',
                                                          'Tiada' => '-- Tiada --',
                                                          '4 Nuri' => '4 Nuri',
                                                          '4 Helang' => '4 Helang',
                                                          '5 Nuri' => '5 Nuri'],
                                                          isset($staff) ? $staff->class_name : null, array()) !!}
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Nama Cawangan</label>
                                    <label class="select">
                                        {!! Form::select('branch_name',
                                                         ['' => '',
                                                          'Tiada' => '-- Tiada --',
                                                          'Pusat Tuisyen Berjaya Ampang' => 'Pusat Tuisyen Berjaya Ampang',
                                                          'Pusat Tuisyen Berjaya Keramat' => 'Pusat Tuisyen Berjaya Keramat',
                                                          'Pusat Tuisyen Berjaya Johor Jaya' => 'Pusat Tuisyen Berjaya Johor Jaya',
                                                          'Tadika Amee Tmn Universiti' => 'Tadika Amee Tmn Universiti',
                                                          'Pusat Jagaan Bayi Melmel' => 'Pusat Jagaan Bayi Melmel'],
                                                          isset($staff) ? $staff->branch_name : null, array()) !!}
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Gambar Staf</label>
                                    <label class="input input-file">
                                        <span class="button">
                                            <input type="file" id="file" name="file"
                                                   onchange="$('input[type=\'file\']').parent().next().val($('input[type=\'file\']').val())">
                                            Upload
                                        </span>
                                        {!! Form::input('text', 'image', isset($staff) ? $staff->image : null, array('readonly')) !!}
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
                                        {!! Form::input('text', 'dob', isset($staff) ? $staff->dob : null, array('id' => 'dob_date')) !!}
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">No. Kad Pengenalan</label>
                                    <label class="input">
                                        {!! Form::input('text', 'no_ic', isset($staff) ? $staff->no_ic : null, array()) !!}
                                    </label>
                                </section>

                                <section class="col col-4">
                                    <label class="label">Jantina</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            {{ Form::radio('gender', 'Lelaki', isset($staff) && $staff->gender == 'Lelaki' ? 'checked' : null, array()) }}
                                            <i></i>Lelaki</label>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'Perempuan', isset($staff) && $staff->gender == 'Perempuan' ? 'checked' : null, array()) }}
                                            <i></i>Perempuan</label>
                                    </div>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-4">
                                    <label class="label">Warganegara</label>
                                    <label class="input">
                                        {!! Form::input('text', 'nationality', isset($staff) ? $staff->nationality : null, array()) !!}
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
                                                          isset($staff) ? $staff->marital_status : null, array()) !!}
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="label">Agama</label>
                                    <div class="inline-group">
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Buddha', isset($staff) && $staff->religion == 'Buddha' ? 'checked' : null, array()) }}
                                            <i></i>Buddha</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Hindu', isset($staff) && $staff->religion == 'Hindu' ? 'checked' : null, array()) }}
                                            <i></i>Hindu</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Islam', isset($staff) && $staff->religion == 'Islam' ? 'checked' : null, array()) }}
                                            <i></i>Islam</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Kristian', isset($staff) && $staff->religion == 'Kristian' ? 'checked' : null, array()) }}
                                            <i></i>Kristian</label>
                                        <label class="radio">
                                            {{ Form::radio('religion', 'Lain-lain', isset($staff) && $staff->religion == 'Lain-lain' ? 'checked' : null, array()) }}
                                            <i></i>Lain-lain</label>
                                    </div>
                                </section>
                            </div>
                        </fieldset>
                    </div><!-- end widget content -->
                </div>
            </article>
        </article>

        {{--maklumat Akaun & Perhubungan--}}
        <article class="col-sm-12 col-md-12 col-lg-6">
            <!-- Widget ID (each widget will need unique ID)-->
            <article class="jarviswidget" id="wid-id-1" data-widget-editbutton="false"
                     data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Maklumat Akaun dan Perhubungan</h2>
                </header>

                <div class="smart-form">
                    <div class="widget-body no-padding">
                        <fieldset>
                            <section>
                                <label class="label">Bank</label>
                                <label class="select">
                                    {!! Form::select('bank_name',
                                                         ['' => '',
                                                          'CIMB' => 'CIMB',
                                                          'MAYBANK' => 'MAYBANK'],
                                                          isset($staff) ? $staff->bank_name : null, array()) !!}
                                    <i></i>
                                </label>
                            </section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">No. Akaun</label>
                                    <label class="input">
                                        {!! Form::input('text', 'no_account', isset($staff) ? $staff->no_account : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Gaji (RM)</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-money"></i>
                                        {!! Form::input('text', 'salary', isset($staff) ? $staff->salary : null, array('placeholder' => '00.00')) !!}
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <section>
                                <label class="label">Email</label>
                                <label class="input">
                                    <i class="icon-append fa fa-envelope-o"></i>
                                    {!! Form::input('text', 'email', isset($staff) ? $staff->email : null, array()) !!}
                                </label>
                            </section>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">No. Telefon</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-phone"></i>
                                        {!! Form::input('tel', 'tel_mobile', isset($staff) ? $staff->tel_mobile : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Jawatan</label>
                                    <label class="select">
                                        {!! Form::select('role',
                                                         ['' => '',
                                                          'Cikgu' => 'Cikgu',
                                                          'Kerani' => 'Kerani'],
                                                          isset($staff) ? $staff->role : null, array()) !!}
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                    </div><!-- end widget content -->
                </div>
            </article>
        </article>

        {{--maklumat Kediaman--}}
        <article class="col-sm-12 col-md-12 col-lg-6">
            <!-- Widget ID (each widget will need unique ID)-->
            <article class="jarviswidget" id="wid-id-1" data-widget-editbutton="false"
                     data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Maklmat Kediaman </h2>
                </header>

                <div class="smart-form">
                    <div class="widget-body no-padding">
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Alamat</label>
                                    <label class="input">
                                        {!! Form::input('text', 'address_1', isset($staff) ? $staff->address_1 : null, array()) !!}
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="label">Alamat 2</label>
                                    <label class="input">
                                        {!! Form::input('text', 'address_2', isset($staff) ? $staff->address_2 : null, array()) !!}
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Bandar</label>
                                    <label class="input">
                                        {!! Form::input('text', 'city', isset($staff) ? $staff->city : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Poskod</label>
                                    <label class="input">
                                        {!! Form::input('text', 'postcode', isset($staff) ? $staff->postcode : null, array()) !!}
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-6">
                                    <label class="label">Negeri</label>
                                    <label class="input">
                                        {!! Form::input('text', 'state', isset($staff) ? $staff->state : null, array()) !!}
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="label">Negera</label>
                                    <label class="input">
                                        {!! Form::input('text', 'country', isset($staff) ? $staff->country : null, array()) !!}
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <br/><br/>
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
    <script type="text/javascript">
        $('#dob_date').datepicker({
            dateFormat : 'yy-mm-dd',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:' + new Date().getFullYear().toString()
        });

        var errorClass = 'invalid';
        var errorElement = 'em';

        var $formStaff = $("#form-staff").validate({
            errorClass		: errorClass,
            errorElement	: errorElement,
            highlight: function(element) {
                $(element).parent().removeClass('state-success').addClass("state-error");
                $(element).removeClass('valid');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass("state-error").addClass('state-success');
                $(element).addClass('valid');
            },
            // Rules for form validation
            rules: {
                full_name: {
                    required: true
                },
                branch_name: {
                    required: true
                },
                dob: {
                    required: true
                },
                tel_mobile: {
                    required: true,
                    minlength: 10
                },
                no_account: {
                    required: true,
                    digits : true
                },
                salary: {
                    required: true,
                    digits : true
                },
                email: {
                    required: true,
                    email: "Format email mestilah seperti ini: name@domain.com"
                },
                role: {
                    required: true

                },
                postcode: {
                    required: true,
                    digits : true
                }
            },

            // Messages for form validation
            messages: {
                full_name: "Sila masukkan nama penuh.",
                branch_name: "Sila masukkan nama cawangan.",
                dob: "Sila masukkan tarikh lahir",
                tel_mobile: {
                    required: "Ruang ini diperlukan.",
                    minlength: "Sila masukkan sekurangnya 10 karakter."
                },
                no_account: {
                    required: "Ruang ini diperlukan.",
                    digits : 'Nombor sahaja'
                },
                salary: {
                    required: "Sila masukkan jumlah gaji sebulan",
                    digits : 'Nombor sahaja'
                },
                email: {
                    required: "Sila masukkan email untuk dihubungi.",
                    email: "Format email mestilah seperti ini: name@domain.com"
                },
                role: "Sila pilih jawatan",
                postcode: {
                    required: "Sila masukkan poskod",
                    digits : 'Nombor sahaja'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        $("#image").click(function (e) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{!! URL::to('staff/upload') !!}',
                type: 'GET',
                dataType: 'JSON'
            });
        });
    </script>
@stop