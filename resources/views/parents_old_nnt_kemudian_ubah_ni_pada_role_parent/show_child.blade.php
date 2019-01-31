@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Anak</li>
    <li>Butiran Anak</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-child fa-fw "></i>
                Butiran
                <span>> {!! $child->full_name !!}</span>
                <a href="{!! URL::to('child') !!}" class="btn btm-sm btn-danger pull-right"><i
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
                                <img src="{!! asset('img/avatars/2.png') !!}" alt="demo user"
                                     width="120px" height="100px">
                                <div class="padding-10">
                                    {{--<h4 class="font-md"><strong>1,543</strong>
                                        <br>
                                        <small>Followers</small>
                                    </h4>--}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h1>
                                    <span class="semi-bold">{!! $child->full_name !!}</span><br>
                                    <small>No. MyKid : {!! $child->mykid !!}</small>
                                </h1>
                                <br/><br/><br/>
                            </div>
                            <div class="col-sm-3">
                                <h1>
                                    <small>
                                        <strong class="txt-color-darken">Kelas</strong><br/>
                                        <span class="txt-color-darken">{!! $child->classroom !!}</span>
                                    </small>
                                    <br/>
                                    <small>
                                        <br/><strong class="txt-color-darken">Pakej</strong><br/>
                                        <span class="txt-color-darken">{!! $child->package !!}</span>
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
                                    <a href="#a1" data-toggle="tab">Maklumat Akademik</a>
                                </li>
                                <li>
                                    <a href="#a2" data-toggle="tab">Maklumat Asas</a>
                                </li>
                            </ul>

                            <div class="tab-content padding-top-10">
                                <div class="tab-pane fade in active" id="a1">
                                    <br/>
                                    <div class="row padding-10">
                                        <header>Maklumat Cikgu</header>
                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><i class="fa fa-bookmark"></i>&nbsp; Kod Subjek
                                                        </th>
                                                        <th><i class="fa fa-book"></i>&nbsp; Nama Subjek
                                                        </th>
                                                        <th><i class="fa fa-tag"></i>&nbsp; Gred
                                                        </th>
                                                        <th><i class="fa fa-percent"></i>&nbsp; Markah
                                                        </th>
                                                        <th><i class="fa fa-comment"></i>&nbsp; Ulasan
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($child->grades as $grade)
                                                        <tr>
                                                            <td>
                                                                {!! $i++ !!}
                                                            </td>
                                                            <td>
                                                                {!! $grade->id_subject !!}
                                                            </td>
                                                            <td>
                                                                {!! $grade->subject_name !!}
                                                            </td>
                                                            <td>
                                                                {!! $grade->grade !!}
                                                            </td>
                                                            <td>
                                                                {!! $grade->mark !!}
                                                            </td>
                                                            <td>
                                                                {!! $grade->review !!}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="a2">
                                    <br/>
                                    <div class="row padding-10">
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-calendar"></i> <strong>&nbsp; Tarikh
                                                        Lahir </strong>
                                                    <p style="padding-left: 23px">{!! date_format(date_create($child->dob), 'd/m/Y') !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-hospital-o"></i> <strong>&nbsp;&nbsp;Tempat
                                                        Lahir </strong>
                                                    <p style="padding-left: 23px">{!! $child->birthplace !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-male"></i><i class="fa fa-female"></i> <strong>
                                                        &nbsp;Jantina </strong>
                                                    <p style="padding-left: 23px">{!! $child->gender !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-asterisk"></i> <strong>
                                                        &nbsp;&nbsp;Agama </strong>
                                                    <p style="padding-left: 23px">{!! $child->religion !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-heart"></i> <strong>&nbsp; Bangsa </strong>
                                                    <p style="padding-left: 23px">{!! $child->race !!}</p>
                                                </li>
                                                <li>
                                                    <i class="fa fa-globe"></i> <strong>
                                                        &nbsp;&nbsp;Warganegara </strong>
                                                    <p style="padding-left: 23px">{!! $child->nationality !!}</p>
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
                                                    <p style="padding-left: 23px">{!! date_format($child->created_at, 'd/m/Y H:i:s') !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-calendar-o"></i> <strong>&nbsp; Tarikh
                                                        Kemaskini </strong>
                                                    <p style="padding-left: 23px">{!! date_format($child->updated_at, 'd/m/Y H:i:s') !!}</p>
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