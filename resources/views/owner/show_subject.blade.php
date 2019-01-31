@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajaran</li>
    <li>Subjek</li>
    <li>Butiran Subjek</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-book fa-fw "></i>
                Butiran
                <span>> Subjek</span>
                <a href="{!! URL::to('subject') !!}" class="btn btm-sm btn-danger pull-right">
                    <i class="fa fa-angle-left"></i>&nbsp;&nbsp;Kembali
                </a>
            </h1>
        </div>
    </div>

    <div class="row padding-10">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-darken pricing-big">

                <div class="panel-heading">
                    <h1 align="center">
                        {!! $subject->name !!}</h1>
                </div>
                <div class="panel-body no-padding text-align-center">
                    <div class="the-price">
                        <h1>{!! $subject->type_subject !!}</h1>
                    </div>
                    <div class="price-features" align="left">
                        <ul class="list-unstyled text-left">
                            <li>
                                <i class="fa fa-paperclip"></i> <strong>&nbsp;&nbsp;Kod </strong>
                                <p style="padding-left: 23px">{!! $subject->code !!}</p>
                            </li>
                            <li>
                                <i class="fa fa-money"></i> <strong>&nbsp;Harga </strong>
                                <p style="padding-left: 23px">RM {!! number_format($subject->price, 2) !!}</p>
                                <hr/>
                            </li>
                            <li>
                                <i class="fa fa-comment"></i> <strong>&nbsp;&nbsp;Huraian </strong>
                                <p style="padding-left: 23px">{!! $subject->description !!}</p>
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i> <strong>&nbsp;&nbsp;Tarikh Buat </strong>
                                <p style="padding-left: 23px">{!! $subject->created_at !!}</p>
                            </li>
                        </ul>
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
                var url = '{!! URL::to('subject') !!}';
                var validate = ['name', 'email', 'role'];
            })
        });
    </script>
@stop