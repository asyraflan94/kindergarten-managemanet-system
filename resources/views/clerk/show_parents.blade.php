@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Ibu Bapa & Penjaga</li>
    <li>Butiran Ibu Bapa & Penjaga</li>
@stop

@section('content')
    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-building fa-fw "></i>
                    Butiran

                    <a href="{!! URL::to('parents') !!}" class="btn btm-sm btn-danger pull-right"><i
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
                                       href="{!! \URL::to('parents/'.$parents->id.'/edit') !!}">
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

                                <div class="col-sm-4">
                                    <h1>
                                        <span class="semi-bold">{!! $parents->father_name !!}</span>
                                    </h1>
                                    <br/><br/>
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-info-circle"></i>&nbsp; No. Kad Pengenalan:
                                                {!! $parents->ic_father !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-suitcase"></i>&nbsp; Pekerjaan:
                                                {!! $parents->occupation_f !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-money"></i>&nbsp;Gaji:
                                                RM {!! number_format($parents->salary_f, 2) !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-envelope"></i>&nbsp;Emel:
                                                {!! $parents->email_f !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-map-marker"></i>
                                                <span style="padding-left: 10px">
                                                {!! $parents->address_1 !!},
                                            </span><br>
                                                <span style="padding-left: 22px">
                                                {!! $parents->address_2 !!},
                                            </span><br>
                                                <span style="padding-left: 22px">
                                                {!! $parents->city !!},&nbsp;
                                                    {!! $parents->postcode !!}&nbsp;
                                                    {!! $parents->state !!},
                                            </span><br>
                                                <span style="padding-left: 22px">
                                                {!! $parents->country !!}.
                                            </span>
                                            </p>
                                        </li>
                                    </ul>
                                    <br/>
                                </div>

                                <div class="col-sm-4">
                                    <h1>
                                        <span class="semi-bold">{!! $parents->mother_name !!}</span>
                                    </h1>
                                    <br/><br/>
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-info-circle"></i>&nbsp; No. Kad Pengenalan:
                                                {!! $parents->ic_mother !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-suitcase"></i>&nbsp; Pekerjaan:
                                                {!! $parents->occupation_m !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-money"></i>&nbsp;Gaji:
                                                RM {!! number_format($parents->salary_m, 2) !!}
                                            </p>
                                        </li>
                                        <li>
                                            <p class="txt-color-darken">
                                                <i class="fa fa-lg fa-envelope"></i>&nbsp;Emel:
                                                {!! $parents->email_m !!}
                                            </p>
                                        </li>
                                    </ul>
                                    <br/>
                                </div>
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