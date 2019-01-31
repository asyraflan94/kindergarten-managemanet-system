@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajar</li>
    <li>Butiran Pelajar</li>
@stop

@section('content')
    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-building fa-fw "></i>
                    Butiran
                    <span>> {!! $pelajar->full_name !!}</span>

                    <a href="{!! URL::to('pelajar') !!}" class="btn btm-sm btn-danger pull-right"><i
                                class="fa fa-angle-left"></i>&nbsp;&nbsp;Kembali</a>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well well-light well-sm no-margin">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="myCarousel" class="carousel fade profile-carousel">
                                <div class="air air-bottom-right padding-10">
                                    <a class="btn txt-color-white bg-color-teal btn-sm"
                                       href="{!! \URL::to('pelajar/'.$pelajar->id.'/edit') !!}">
                                        <i class="fa fa-edit"></i> Kemaskini
                                    </a>
                                </div>
                                <div class="air air-top-left padding-10">
                                    <h4 class="txt-color-white font-md">
                                        <span id="date" class="semi-bold"></span>
                                        <script>
                                            n = new Date();
                                            y = n.getFullYear();
                                            month = ['Januari', 'Februari', 'Mac',
                                                'April', 'Mei', 'Jun',
                                                'Julai', 'Ogos', 'September',
                                                'Oktober', 'November', 'Disember'];
                                            var m = month[n.getMonth()];
                                            d = n.getDate();
                                            document.getElementById("date").innerHTML = m + " " + d + ", " + y;
                                        </script>
                                    </h4>
                                </div>
                                <div class="carousel-inner">
                                    <img src="{!! asset('img/demo/s1.jpg') !!}" alt="demo user"
                                         width="100%"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3 profile-pic">
                                    <img src="{!! asset('img/avatars/sunny-big.jpg') !!}" alt="demo user">
                                    <div class="padding-10">
                                        {{--<h4 class="font-md"><strong>1,543</strong>
                                            <br>
                                            <small>Followers</small>
                                        </h4>--}}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h1>
                                        <span class="semi-bold">{!! $pelajar->full_name !!}</span>
                                    </h1>
                                    <br/><br/>
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-info-circle"></i>&nbsp; No Mykid:
                                                {!! $pelajar->mykid !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-mortar-board"></i>&nbsp; Kelas:
                                                {!! $pelajar->classroom !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-cube"></i>&nbsp; Pakej:
                                                {!! $pelajar->package !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-calendar"></i> &nbsp; Tarikh Pendaftaran :
                                                {!!  date_format(date_create($pelajar->reg_date), 'd/m/Y') !!}
                                            </p>
                                        </li>
                                    </ul>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tab -->
                    <div class="row">
                        <div class="col-sm-12">

                            <hr>
                            <div class="padding-10">
                                <ul class="nav nav-tabs tabs-pull-left">
                                    <li class="active">
                                        <a href="#a1" data-toggle="tab">Maklumat Asas</a>
                                    </li>
                                    <li>
                                        <a href="#a2" data-toggle="tab">Maklumat Penjaga</a>
                                    </li>
                                    <li>
                                        <a href="#a3" data-toggle="tab">Maklumat Surat Menyurat</a>
                                    </li>
                                </ul>

                                <div class="tab-content padding-top-10">
                                    <div class="tab-pane fade in active" id="a1">
                                        <br/>
                                        <div class="row padding-10">
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-calendar"></i> <strong>&nbsp; Tarikh
                                                            Lahir </strong>
                                                        <p style="padding-left: 23px">{!!  date_format(date_create($pelajar->dob), 'd/m/Y') !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-hospital-o"></i> <strong>&nbsp;&nbsp;Tempat Lahir</strong>
                                                        <p style="padding-left: 23px">{!! $pelajar->birthplace !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-male"></i><i class="fa fa-female"></i> <strong>
                                                            &nbsp;Jantina </strong>
                                                        <p style="padding-left: 23px">{!! $pelajar->gender !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-asterisk"></i> <strong>
                                                            &nbsp;&nbsp;Agama </strong>
                                                        <p style="padding-left: 23px">{!! $pelajar->religion !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-ge"></i> <strong>&nbsp; Kaum</strong>
                                                        <p style="padding-left: 23px">{!! $pelajar->race !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-globe"></i> <strong>
                                                            &nbsp;&nbsp;Warganegara </strong>
                                                        <p style="padding-left: 23px">{!! $pelajar->nationality !!}</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            @foreach($pelajar->guardians as $penjaga)
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-key"></i> <strong>&nbsp; Hubungan dengan
                                                            penjaga</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->relationship !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="a2">
                                        <br/>

                                        <div class="row padding-10">
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-user"></i> <strong>&nbsp; Nama
                                                            Bapa</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->father_name !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-credit-card"></i> <strong>&nbsp;&nbsp;No. Kad
                                                            Pengenalan </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->ic_father !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-suitcase"></i> <strong>&nbsp;&nbsp;Pekerjaan
                                                            Bapa </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->occupation_f !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-money"></i> <strong>&nbsp;&nbsp;Gaji
                                                            Bapa </strong>
                                                        <p style="padding-left: 23px">RM {!! number_format($penjaga->salary_f, 2) !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-envelope"></i> <strong>&nbsp;&nbsp;Emel
                                                            Bapa </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->email_f  !!}</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-user"></i> <strong>&nbsp; Nama Ibu</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->mother_name !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-credit-card"></i> <strong>&nbsp;&nbsp;No. Kad
                                                            Pengenalan </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->ic_mother !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-suitcase"></i> <strong>&nbsp;&nbsp;Pekerjaan
                                                            Ibu </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->occupation_m !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-money"></i> <strong>&nbsp;&nbsp;Gaji
                                                            Ibu </strong>
                                                        <p style="padding-left: 23px">RM {!! number_format($penjaga->salary_m, 2) !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-envelope"></i> <strong>&nbsp;&nbsp;Emel
                                                            Ibu </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->email_m  !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-lg fa-mobile"></i> <strong>&nbsp;Tel 1
                                                            (Bimbit)</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->tel_mobile_f !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-lg fa-mobile"></i> <strong>&nbsp;&nbsp;Tel 2
                                                            (Bimbit)</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->tel_mobile_m !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-lg fa-phone"></i> <strong>&nbsp;&nbsp; Tel
                                                            Rumah</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->tel_home !!}</p>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-globe"></i> <strong>&nbsp;&nbsp;
                                                            Warganegara</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->nationality !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="a3">
                                        <br/>
                                        <div class="row padding-10">
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-home"></i> <strong>
                                                            &nbsp;&nbsp;Alamat </strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->address_1 !!},
                                                            {!! $penjaga->address_2 !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-home"></i> <strong> Bandar</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->city !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-home"></i> <strong> Poskod</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->postcode !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-home"></i> <strong> Negeri</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->state !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                                <ul class="list-unstyled text-left">
                                                    <li>
                                                        <i class="fa fa-home"></i> <strong>
                                                            Negara</strong>
                                                        <p style="padding-left: 23px">{!! $penjaga->country !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                </div><!-- end tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {

            })
        });
    </script>
@stop