@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Konfigurasi</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-gear fa-fw "></i>
                Konfigurasi
                <br><span>Sila isi maklumat konfigurasi berikut.</span>
            </h1>
        </div>
    </div>

    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <article class="jarviswidget" id="wid-id-1" data-widget-editbutton="false"
                     data-widget-custombutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                </header>

                <div>
                    <div class="widget-body no-padding">
                        <form method="post" action="{!! URL::to('#') !!}" id='sender-form' class="smart-form"
                              novalidate="novalidate">
                            <input type="hidden" name="_token" value="<?php echo e(Session::getToken()); ?>" />

                            <header>Konfigurasi Email</header>

                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Nama Daripada</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-user"></i>
                                            {!! Form::input('text', 'from_name', null, array('placeholder' => 'Contoh: Admin Tadika NUR')) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">Email Daripada</label>
                                        <label class="input">
                                            <i class="icon-append fa fa-envelope"></i>
                                            {!! Form::input('text', 'from_email', null, array('placeholder' => 'Contoh: tadika.nur@gmail.com')) !!}
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <footer>
                                <button id="submit" class="btn btn-success">Simpan</button>
                            </footer>
                        </form>
                    </div><!-- end widget content -->
                </div>
            </article>
        </article>
    </div>
@stop


@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('config') !!}';
                var validate = ['name', 'email', 'role'];


                $('#submit').click(function () {

                    $.smallBox({
                        title : "Rekod berjaya disimpan",
                        content : "Anda berjaya menyimpan rekod tersebut",
                        color : "#739E73",
                        icon : "fa fa-check bounce animated",
                        timeout : 4000
                    });
                });

            })
        });
    </script>
@stop