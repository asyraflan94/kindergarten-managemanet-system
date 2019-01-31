@extends('main')
@section('crumb')
    <li>Kerani</li>
    <li>Pendaftaran</li>
@stop

@section('content')

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-pencil-square-o"></i>
                    Pendaftaran Pelajar<br/>
                    <span>
				    Isikan maklumat berikut bagi pelajar baru.
                    <span>
                </h1>
            </div>
        </div>

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false"
                         data-widget-deletebutton="false">
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
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Borang Pendaftaran Pelajar</h2>
                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body">

                                <div class="row">
                                    <form id="wizard-1" novalidate="novalidate">
                                        <div id="bootstrap-wizard-1" class="col-sm-12">
                                            <div class="form-bootstrapWizard">
                                                <ul class="bootstrapWizard form-wizard">
                                                    <li class="active" data-target="#step1">
                                                        <a href="#tab1" data-toggle="tab"> <span class="step">1</span>
                                                            <span class="title">Maklumat Pelajar</span> </a>
                                                    </li>
                                                    <li data-target="#step2">
                                                        <a href="#tab2" data-toggle="tab"> <span class="step">2</span>
                                                            <span class="title">Maklumat Ibubapa & Penjaga</span> </a>
                                                    </li>
                                                    <li data-target="#step3">
                                                        <a href="#tab3" data-toggle="tab"> <span class="step">3</span>
                                                            <span class="title">Maklumat Kediaman</span> </a>
                                                    </li>
                                                    <li data-target="#step4">
                                                        <a href="#tab4" data-toggle="tab"> <span class="step">4</span>
                                                            <span class="title">Simpan Borang</span> </a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="tab-content">

                                                <!-- MAKLUMAT PELAJAR -->
                                                <div class="tab-pane active" id="tab1">
                                                    <br>
                                                    <h3><strong>Maklumat Pelajar</strong></h3>

                                                    <form method="post">
                                                        <div class="row">
                                                          <div class="form-group col-md-8">
                                                            <label for="namaprasekolah">1. Nama Prasekolah:</label>
                                                            <input type="text" class="form-control" name="namaprasekolah">
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-8">
                                                              <label for="nama">2. Nama:</label>
                                                              <input type="text" class="form-control" name="nama">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="full_name">3. Nama Murid:</label>
                                                              <label class="input"> <i class="icon-append fa fa-user"></i>
                                                            {!! Form::input('text', 'full_name', isset($pelajar) ? $pelajar->full_name : null, array()) !!}
                                                              </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                            <div>
                                                            <h4 align = "center"><br>Profil IbuBapa/Penjaga<br><br></h4>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="mykid">4. No. Mykid:</label>
                                                              <label class="input"> <i class="icon-append fa fa-certificate"></i>
                                                                {!! Form::input('text', 'mykid', isset($pelajar) ? $pelajar->mykid : null, array()) !!}
                                                            </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="father_name">18. Nama Bapa:</label>
                                                              <input type="text" class="form-control" name="father_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                              <label for="no.passport">  No. Passport:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                              <input type="text" class="form-control" name="no.passport">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                              <label for="no.sijillahir">  No. Sijil Lahir:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <input type="text" class="form-control" name="no.sijillahir">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="dob">5. Tarikh Lahir:</label>
                                                              <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                {!! Form::input('text', 'dob', isset($pelajar) ? $pelajar->reg_date : null, array('id' => 'date')) !!}
                                                            </label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="ic_father">19. No. Kad Pengenalan/Passport Bapa:</label>
                                                              <input type="text" class="form-control" name="ic_father" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="birthplace">6. Negeri Lahir:</label>
                                                              <label class="input"><i class="icon-append fa fa-hospital-o"></i>
                                                                {!! Form::input('text', 'birthplace', isset($pelajar) ? $pelajar->birthplace : null, array() ) !!}
                                                            </label>
                                                             </div>
                                                            <div class="form-group col-md-3">
                                                              <label for="nationality">20. Taraf Warganegara Bapa:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                              <input type="radio" name="nationality" value="Ya" checked>Ya</input>
                                                              <input type="radio" name="nationality" value="Tidak">Tidak</input>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="gender">7. Jantina:</label>
                                                              <label class="radio">
                                                                {{ Form::radio('gender', 'Lelaki', isset($pelajar) && $pelajar->gender == 'Lelaki' ? 'checked' : null, array()) }}
                                                                <i></i>Lelaki</label>
                                                            <label class="radio">
                                                                {{ Form::radio('gender', 'Perempuan', isset($pelajar) && $pelajar->gender == 'Perempuan' ? 'checked' : null, array()) }}
                                                                <i></i>Perempuan</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                              <label for="occupation_f">21. Pekerjaan:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                              <input type="text" class="form-control" name="occupation_f" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="religion">8. Agama:</label>
                                                              <label class="radio">
                                                                {{ Form::radio('religion', 'Buddha', isset($pelajar) && $pelajar->religion == 'Buddha' ? 'checked' : null, array()) }}
                                                                <i></i>Buddha</label>
                                                            <label class="radio">
                                                                {{ Form::radio('religion', 'Hindu', isset($pelajar) && $pelajar->religion == 'Hindu' ? 'checked' : null, array()) }}
                                                                <i></i>Hindu</label>
                                                            <label class="radio">
                                                                {{ Form::radio('religion', 'Islam', isset($pelajar) && $pelajar->religion == 'Islam' ? 'checked' : null, array()) }}
                                                                <i></i>Islam</label>
                                                            <label class="radio">
                                                                {{ Form::radio('religion', 'Kristian', isset($pelajar) && $pelajar->religion == 'Kristian' ? 'checked' : null, array()) }}
                                                                <i></i>Kristian</label>
                                                            <label class="radio">
                                                                {{ Form::radio('religion', 'Lain-lain', isset($pelajar) && $pelajar->religion == 'Lain-lain' ? 'checked' : null, array()) }}
                                                                <i></i>Lain-lain</label>
                                                        </div>
                                                            <div class="form-group col-md-2">
                                                              <label for="salary_f">22. Pendapatan(RM):</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                              <input type="text" class="form-control" name="salary_f" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="race">9. Kaum:</label>
                                                              <label class="radio">
                                                                {{ Form::radio('race', 'Melayu', isset($pelajar) && $pelajar->race == 'Melayu' ? 'checked' : null, array()) }}
                                                                <i></i>Melayu</label>
                                                            <label class="radio">
                                                                {{ Form::radio('race', 'Cina', isset($pelajar) && $pelajar->race == 'Cina' ? 'checked' : null, array()) }}
                                                                <i></i>Cina</label>
                                                            <label class="radio">
                                                                {{ Form::radio('race', 'India', isset($pelajar) && $pelajar->race == 'India' ? 'checked' : null, array()) }}
                                                                <i></i>India</label>
                                                            <label class="radio">
                                                                {{ Form::radio('race', 'Lain-lain', isset($pelajar) && $pelajar->race == 'Lain-lain' ? 'checked' : null, array()) }}
                                                                <i></i>Lain-lain</label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="tarikhkewarganegaraanbapa">23. Tarikh Kewarganegaraan Bapa:</label>
                                                              <input type="text" class="form-control" name="tarikhkewarganegaraanbapa" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="nationality">10. Warganegara:</label>
                                                              <label class="input"> <i class="icon-append fa fa-globe"></i>
                                                                {!! Form::input('text', 'nationality', isset($pelajar) ? $pelajar->nationality : null, array() ) !!}
                                                            </label>
                                                        </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="mother_name">24. Nama Ibu:</label>
                                                              <input type="text" class="form-control" name="mother_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="address">11. Alamat Rumah:</label>
                                                              <textarea id="address" name="address" class="form-control" required>
                                                
                                                              </textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="no.kadpengenalanibu">25. No. Kad Pengenalan/Passport Ibu:</label>
                                                              <input type="text" class="form-control" name="no. kadpengenalanibu" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="postcode">12. Poskod:</label>
                                                              <input type="text" class="form-control" name="postcode" required>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label for="nationality" required>26. Taraf Warganegara Ibu:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <input type="radio" name="nationality" value="Ya" checked>Ya</input>
                                                                <input type="radio" name="nationality" value="Tidak">Tidak</input>
                                                              </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="city">Bandar:</label>
                                                              <input type="text" class="form-control" name="city">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="occupation_m">27. Pekerjaan:</label>
                                                              <input type="text" class="form-control" name="occupation_m" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="state">13. Negeri:</label>
                                                              <input type="text" class="form-control" name="state" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="salary_m">28. Pendapatan(RM):</label>
                                                              <input type="text" class="form-control" name="salary_m" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="tel_mobile">14. No. Telefon:</label>
                                                              <input type="text" class="form-control" name="tel_mobile">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="tarikkewarganegaraanibu">29. Tarikh Kewarganegaraan Ibu:</label>
                                                              <input type="text" class="form-control" name="tarikhkewarganegaraanibu" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                              <label for="statusmurid">15. *Status Murid:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <input type="radio" name="statusmurid" value="Ya" checked>Aktif</input>
                                                                <input type="radio" name="statusmurid" value="Tidak">Tidak Aktif</input>
                                                              </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="namapenjaga">30. Nama Penjaga:</label>
                                                              <input type="text" class="form-control" name="namapenjaga" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="maklumatoku">16. Maklumat OKU:</label>
                                                              <input type="text" class="form-control" name="maklumatoku" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="no.kadpengenalanpenjaga">31. No. Kad Pengenalan/Passport Penjaga:</label>
                                                              <input type="text" class="form-control" name="no.kadpengenalanpenjaga">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                              <label for="no.kadoku">17. No. Kad OKU:</label>
                                                              <input type="text" class="form-control" name="no.kadoku">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label for="tarafkewarganegaraanpenjaga">32. *Taraf Warganegara Penjaga:</label>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <input type="radio" name="tarafwarganegarapenjaga" value="Ya" checked>Ya</input>
                                                                <input type="radio" name="tarafwarganegarapenjaga" value="Tidak">Tidak</input>
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="form-group col-md-4">
                                                            <div>
                                                            <p>Catatan</p>
                                                            <p>1. Borang ini hendaklah digunakan untuk diisi dengan maklumat yang
                                                              betul dan lengkap bagi semua murid.</p>
                                                            </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                              <label for="pekerjaanpenjaga">33. *Pekerjaan:</label>
                                                              <input type="text" class="form-control" name="pekerjaanpenjaga">
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="form-group col-md-4"></div>
                                                            <div class="form-group col-md-4">
                                                              <label for="pendapatanpenjaga">34. *Pendapatan(RM):</label>
                                                              <input type="text" class="form-control" name="pendapatanibu">
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="form-group col-md-4"></div>
                                                            <div class="form-group col-md-4">
                                                              <label for="tarikhkewarganegaraanpenjaga">35. *Tarikh Kewarganegaraan Penjaga:</label>
                                                              <input type="text" class="form-control" name="tarikhkewarganegaraanpenjaga">
                                                            </div>
                                                          </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul class="pager wizard no-margin">
                                                                        <!--<li class="previous first disabled">
                                                                        <a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
                                                                        </li>-->
                                                                        <li class="previous disabled">
                                                                            <a href="javascript:void(0);"
                                                                           class="btn btn-lg btn-default"> Belakang </a>
                                                                        </li>
                                                                        <!--<li class="next last">
                                                                        <a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
                                                                        </li>-->
                                                                        <li class="next">
                                                                            <a href="javascript:void(0);"
                                                                           class="btn btn-lg txt-color-darken">
                                                                            Seterusnya </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end widget content -->
                        </div><!-- end widget div -->
                    </div><!-- end widget -->
                </article><!-- WIDGET END -->
            </div>
        </section>
    </div>
@stop

@section('page-script')
<script>
    $(document).ready(function() {

        pageSetUp();



        //Bootstrap Wizard Validations

        var $validator = $("#wizard-1").validate({

            rules: {
                email: {
                    required: true,
                    email: "Your email address must be in the format of name@domain.com"
                },
                fname: {
                    required: true
                },
                lname: {
                    required: true
                },
                country: {
                    required: true
                },
                city: {
                    required: true
                },
                postal: {
                    required: true,
                    minlength: 4
                },
                wphone: {
                    required: true,
                    minlength: 10
                },
                hphone: {
                    required: true,
                    minlength: 10
                }
            },

            messages: {
                fname: "Please specify your First name",
                lname: "Please specify your Last name",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                }
            },

            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $('#bootstrap-wizard-1').bootstrapWizard({
            'tabClass': 'form-wizard',
            'onNext': function (tab, navigation, index) {
                var $valid = $("#wizard-1").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                } else {
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                        'complete');
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                        .html('<i class="fa fa-check"></i>');
                }
            }
        });


        // fuelux wizard
        var wizard = $('.wizard').wizard();

        wizard.on('finished', function (e, data) {
            //$("#fuelux-wizard").submit();
            //console.log("submitted!");
            $.smallBox({
                title: "Congratulations! Your form was submitted",
                content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
                color: "#5F895F",
                iconSmall: "fa fa-check bounce animated",
                timeout: 4000
            });

        });


    })
</script>
@stop