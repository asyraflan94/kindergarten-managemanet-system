@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Staf</li>
    <li>Butiran Staf</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-user fa-fw "></i>
                Butiran
                <span>> Staf</span>
                <a href="{!! URL::to('staff') !!}" class="btn btm-sm btn-danger pull-right"><i
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
                                   href="{!! \URL::to('edit/staff/'.$staff->id) !!}">
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
                                <img src="{!! asset('img/demo/s3.jpg') !!}" alt="demo user"
                                     width="100%"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3 profile-pic">
                                <img src="{!! asset('upload/' . $staff->image) !!}" alt="demo user" width="120px" height="100px">
                                <div class="padding-10">
                                    {{--<h4 class="font-md"><strong>1,543</strong>
                                        <br>
                                        <small>Followers</small>
                                    </h4>--}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h1>
                                    <span class="semi-bold">{!! $staff->full_name !!}</span><br>
                                    <small>{!! $staff->branch_name !!}</small>
                                </h1>
                                <br/><br/>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-phone"></i>&nbsp;&nbsp;
                                            +(6){!! $staff->tel_mobile !!}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;
                                            {!! $staff->email !!}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-lg fa-map-marker"></i>
                                            <span style="padding-left: 10px">
                                                {!! $staff->address_1 !!},
                                                            </span><br>
                                            <span style="padding-left: 22px">
                                                                {!! $staff->address_2 !!},
                                                            </span><br>
                                            <span style="padding-left: 22px">
                                                                {!! $staff->city !!},&nbsp;{!! $staff->postcode !!}
                                                &nbsp;
                                                {!! $staff->state !!},
                                                            </span><br>
                                            <span style="padding-left: 22px">
                                                                {!! $staff->country !!}.
                                                            </span>
                                        </p>
                                    </li>
                                </ul>
                                <br/>
                            </div>
                            <div class="col-sm-3">
                                <h1>
                                    <small>
                                        <br/><strong class="txt-color-darken">Jawatan</strong><br/>
                                        <span class="txt-color-darken">{!! $staff->role !!}</span>
                                    </small>
                                    <br/>
                                    <small>
                                        <br/><strong class="txt-color-darken">Mengajar Kelas</strong><br/>
                                        <span class="txt-color-darken">{!! $staff->class_name !!}</span>
                                    </small>
                                </h1>
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
                                    <a href="#a2" data-toggle="tab">Maklumat Akaun</a>
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
                                                    <p style="padding-left: 23px">{!! date_format(date_create($staff->dob), 'd/m/Y') !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-credit-card"></i> <strong>&nbsp;&nbsp;No. Kad
                                                        Pengenalan </strong>
                                                    <p style="padding-left: 23px">{!! $staff->no_ic !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-male"></i><i class="fa fa-female"></i> <strong>
                                                        &nbsp;Jantina </strong>
                                                    <p style="padding-left: 23px">{!! $staff->gender !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-asterisk"></i> <strong>
                                                        &nbsp;&nbsp;Agama </strong>
                                                    <p style="padding-left: 23px">{!! $staff->religion !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-heart"></i> <strong>&nbsp; Status </strong>
                                                    <p style="padding-left: 23px">{!! $staff->marital_status !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-globe"></i> <strong>
                                                        &nbsp;&nbsp;Warganegara </strong>
                                                    <p style="padding-left: 23px">{!! $staff->nationality !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row padding-10">
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-calendar"></i> <strong>&nbsp; Tarikh
                                                        Daftar </strong>
                                                    <p style="padding-left: 23px">{!! date_format($staff->created_at, 'd/m/Y H:i:s') !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-calendar-o"></i> <strong>&nbsp; Tarikh
                                                        Kemaskini </strong>
                                                    <p style="padding-left: 23px">{!! date_format($staff->updated_at, 'd/m/Y H:i:s') !!}</p>
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
                                                    <i class="fa fa-bank"></i> <strong>&nbsp; Nama Bank </strong>
                                                    <p style="padding-left: 23px">{!! $staff->bank_name !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-credit-card"></i> <strong>&nbsp;&nbsp;No.
                                                        Akaun </strong>
                                                    <p style="padding-left: 23px">{!! $staff->no_account !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-money"></i> <strong>&nbsp; Gaji
                                                        (bulanan)</strong>
                                                    <p style="padding-left: 23px">
                                                        RM {!! number_format($staff->salary, 2) !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab -->
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