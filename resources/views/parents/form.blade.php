@extends('main')
@section('crumb')
    <li>Kerani</li>
    <li>Pendaftaran</li>
    <li>Pendaftaran Ibu Bapa & Penjaga</li>
@stop

@section('content')

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-pencil-square-o"></i>
                    Pendaftaran Ibu Bapa & Penjaga<br/>
                    <span>
				    Isikan maklumat ibu bapa & Penjaga bagi pelajar baru.
                    </span>
                    &nbsp;
                    <a href="{!! URL::to('pelajar') !!}" class="btn btn-danger pull-right"><i class="fa fa-times"></i>
                        &nbsp; Batal</a>
                </h1>
            </div>
        </div>

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- START ROW -->
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false"
                         data-widget-custombutton="false">

                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Maklumat Penjaga </h2>
                        </header>

                        <div>
                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                            </div>

                            <div class="smart-form">
                                <div class="widget-body no-padding">

                                    <!-- Maklumat Bapa -->
                                    <form method="post" action="{!! URL::to('store/parents') !!}" id='sender-form'
                                          class="smart-form" novalidate="novalidate">
                                        <input type="hidden" name="_token"
                                               value="<?php echo e(Session::getToken()); ?>">
                                        <fieldset>
                                            <h4><strong>Maklumat Bapa</strong></h4><br/>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Nama Bapa</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'father_name', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">No. Kad Pengenalan</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'ic_father', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>

                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Pekerjaan</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'occupation', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Gaji</label>
                                                    <label class="input"><i class="icon-append fa fa-bookmark"></i>
                                                        {!! Form::input('text', 'salary', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">E-mel</label>
                                                    <label class="input"><i class="icon-append fa fa-envelope"></i>
                                                        {!! Form::input('text', 'email', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>

                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Warganegara</label>
                                                    <label class="input"> <i class="icon-append fa fa-globe"></i>
                                                        {!! Form::input('text', 'nationality', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">No. Telefon Bimbit</label>
                                                    <label class="input"> <i class="icon-append fa fa-mobile-phone"></i>
                                                        {!! Form::input('text', 'tel_mobile', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">No. Telefon Rumah</label>
                                                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                                                        {!! Form::input('text', 'tel_home', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>

                                        <!-- Maklumat Ibu -->
                                        <fieldset>
                                            <h4><strong>Maklumat Ibu</strong></h4><br/>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Nama Ibu</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'mother_name', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">No. Kad Pengenalan</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'ic_mother', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>

                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Pekerjaan</label>
                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                        {!! Form::input('text', 'occupation_1', null, array() ) !!}
                                                    </label>
                                                </section>

                                                <section class="col col-4">
                                                    <label class="label">Gaji</label>
                                                    <label class="input"><i class="icon-append fa fa-bookmark"></i>
                                                        {!! Form::input('text', 'salary_1', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">E-mel</label>
                                                    <label class="input"><i class="icon-append fa fa-envelope"></i>
                                                        {!! Form::input('text', 'email_1', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>

                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Warganegara</label>
                                                    <label class="input"> <i class="icon-append fa fa-globe"></i>
                                                        {!! Form::input('text', 'nationality_1', null, array() ) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">No. Telefon Bimbit</label>
                                                    <label class="input"> <i class="icon-append fa fa-mobile-phone"></i>
                                                        {!! Form::input('text', 'tel_mobile_1', null, array() ) !!}
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>


                                        <!-- Maklumat Kediaman -->
                                        <fieldset>
                                            <h4><strong>Maklumat Surat-menyurat</strong></h4><br/>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Alamat 1</label>
                                                    <label class="input">
                                                        {!! Form::input('text', 'address_1', null, array()) !!}
                                                    </label>
                                                </section>

                                                <section class="col col-4">
                                                    <label class="label">Alamat 2</label>
                                                    <label class="input">
                                                        {!! Form::input('text', 'address_2', null, array()) !!}
                                                    </label>
                                                </section>

                                                <section class="col col-4">
                                                    <label class="label">Bandar</label>
                                                    <label class="input">
                                                        {!! Form::input('text', 'city', null, array()) !!}
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Poskod</label>
                                                    <label class="input">
                                                        {!! Form::input('text', 'postcode', null, array()) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Negeri</label>
                                                    <label class="input">
                                                        {!! Form::input('text', 'state', null, array()) !!}
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Negara</label>
                                                    <label class="select">
                                                        <select name="country">
                                                            <option value="0" selected="" disabled=""></option>
                                                            <option value="244">Aaland Islands</option>
                                                            <option value="1">Afghanistan</option>
                                                            <option value="2">Albania</option>
                                                            <option value="3">Algeria</option>
                                                            <option value="4">American Samoa</option>
                                                            <option value="5">Andorra</option>
                                                            <option value="6">Angola</option>
                                                            <option value="7">Anguilla</option>
                                                            <option value="8">Antarctica</option>
                                                            <option value="9">Antigua and Barbuda</option>
                                                            <option value="10">Argentina</option>
                                                            <option value="11">Armenia</option>
                                                            <option value="12">Aruba</option>
                                                            <option value="13">Australia</option>
                                                            <option value="14">Austria</option>
                                                            <option value="15">Azerbaijan</option>
                                                            <option value="16">Bahamas</option>
                                                            <option value="17">Bahrain</option>
                                                            <option value="18">Bangladesh</option>
                                                            <option value="19">Barbados</option>
                                                            <option value="20">Belarus</option>
                                                            <option value="21">Belgium</option>
                                                            <option value="22">Belize</option>
                                                            <option value="23">Benin</option>
                                                            <option value="24">Bermuda</option>
                                                            <option value="25">Bhutan</option>
                                                            <option value="26">Bolivia</option>
                                                            <option value="245">Bonaire, Sint Eustatius and Saba
                                                            </option>
                                                            <option value="27">Bosnia and Herzegovina</option>
                                                            <option value="28">Botswana</option>
                                                            <option value="29">Bouvet Island</option>
                                                            <option value="30">Brazil</option>
                                                            <option value="31">British Indian Ocean Territory</option>
                                                            <option value="32">Brunei Darussalam</option>
                                                            <option value="33">Bulgaria</option>
                                                            <option value="34">Burkina Faso</option>
                                                            <option value="35">Burundi</option>
                                                            <option value="36">Cambodia</option>
                                                            <option value="37">Cameroon</option>
                                                            <option value="38">Canada</option>
                                                        </select> <i></i>
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>  <!--end maklumat kediaman -->

                                    <footer>
                                        <button id="submit" type="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </footer>
                                </div>
                                </form>
                            </div>
                        </div><!-- end widget div -->
                    </div>
                </article>
            </div>
        </section>
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
            });
        })
    </script>
@stop