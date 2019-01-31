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
                    <i class="fa fa-user fa-fw "></i>
                    Pelajar
                    <span> > Butiran Pelajar</span>
                </h1>
            </div>


            <div id="content">

                <!-- widget grid -->
                <section id="widget-grid" class="">

                    <!-- row -->
                    <div class="row">

                        <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="well well-sm">

                                        <div class="row">

                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="well well-light well-sm no-margin no-padding">

                                                    <div class="row">

                                                        <div class="col-sm-12">
                                                            <div id="myCarousel"
                                                                 class="carousel fade profile-carousel">
                                                                <div class="carousel-inner">
                                                                    <!-- Slide 1 -->
                                                                    <div class="item active">
                                                                        <img src="{!! asset('img/demo/kindergarten.jpg')!!}"
                                                                             alt="demo user"
                                                                             width="100%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">

                                                            <div class="row">

                                                                <div class="col-sm-3 profile-pic">
                                                                    <img src="{!! asset('img/avatars/student.png')!!}"
                                                                         alt="demo user">
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <h1>
                                                                        <i class="ultra-light text-muted">
                                                                            Pelajar :</i>
                                                                    </h1>

                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-user"></i>&nbsp;&nbsp;Nama:
                                                                                <i class="txt-color-darken">{!! $student_list->full_name !!} </i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-info-circle"></i>&nbsp;&nbsp;No
                                                                                MyKid:
                                                                                <i class="txt-color-darken">{!! $student_list->mykid !!} </i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-heart"></i>&nbsp;&nbsp;Jantina:
                                                                                <i class="txt-color-darken">{!! $student_list->gender !!}</i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-globe"></i>&nbsp;Bangsa:
                                                                                <i class="txt-color-darken">{!! $student_list->nationality !!}</i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-calendar"></i>&nbsp;&nbsp;Tarikh
                                                                                Lahir:
                                                                                <i class="txt-color-darken">{!! $student_list->dob !!}</i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-mortar-board"></i>&nbsp;&nbsp;Kelas:
                                                                                <i class="txt-color-darken">{!! $student_list->classroom !!}</i>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-primary">
                                                                                <i class="fa fa-certificate"></i>&nbsp;&nbsp;Tarikh
                                                                                Pendaftaran:
                                                                                <i class="txt-color-darken">{!! $student_list->reg_date !!}</i>
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end widget-->

                            <footer class="pull-right">
                                <button type="button" class="btn btn-danger"
                                        onclick="window.history.back();"><span class="btn-labeled">< Kembali</span>
                                </button>
                            </footer>

                        </article>
                    </div>
                </section>
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

