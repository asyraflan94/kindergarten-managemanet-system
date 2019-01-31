@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Pelajaran</li>
    <li>Pakej</li>
    <li>Butiran Pakej</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-archive fa-fw "></i>
                Butiran
                <span>> Pakej</span>
                <a href="{!! URL::to('package') !!}" class="btn btm-sm btn-danger pull-right">
                    <i class="fa fa-angle-left"></i>&nbsp;&nbsp;Kembali
                </a>
            </h1>
        </div>
    </div>

    <div class="row">
        <!-- Maklumat Asas -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="panel panel-darken pricing-big">

                <div class="panel-heading">
                    <h1 align="center">
                        Pakej {!! $package->name !!}</h1>
                </div>
                <div class="panel-body no-padding text-align-center">
                    <div class="the-price">
                        <h1>
                            RM {!! number_format($package->price, 2) !!} <br/>
                            <span class="subscript">*termasuk gst</span></h1>
                    </div>
                    <div class="price-features" align="left">
                        <ul class="list-unstyled text-left">
                            <li>
                                <i class="fa fa-commenting"></i> <strong>&nbsp; Huraian </strong>
                                <p style="padding-left: 23px">{!! $package->description !!}</p>
                                <hr/>
                            </li>
                            <li>
                                <i class="fa fa-child"></i> <strong>&nbsp;&nbsp; Had Pelajar </strong>
                                <p style="padding-left: 23px">{!! $package->limit_student !!} orang</p>
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i> <strong>&nbsp; Tarikh Buat </strong>
                                <p style="padding-left: 23px">{!! $package->created_at !!}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <article class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0"
                 data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Senarai Subjek</h2>
                </header>

                <!-- widget div-->
                <div class="table-responsive  no-padding">
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- widget content -->
                    <table class="table table-striped table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kod</th>
                            <th>Nama Subjek</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th style="width: 30%">Huraian</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($package->subjects as $subject)
                            <tr>
                                <td>
                                    {!! $i++ !!}
                                </td>
                                <td>
                                    {!! $subject->code !!}
                                </td>
                                <td>
                                    {!! $subject->name !!}
                                </td>
                                <td>
                                    {!! $subject->type_subject !!}
                                </td>
                                <td>
                                    RM {!! number_format($subject->price, 2) !!}
                                </td>
                                <td>
                                    {!! $subject->description !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </article><!-- Maklumat Subjek -->
    </div><!-- end row -->

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