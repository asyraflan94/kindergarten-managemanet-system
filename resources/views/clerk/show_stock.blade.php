@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Stok</li>
    <li>Butiran Stok</li>
@stop

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-shopping-cart fa-fw "></i>
                    Butiran
                    <span>> {!! $stock_in->stock_name !!}</span>

                    <a href="{!! URL::to('stock') !!}" class="btn btm-sm btn-danger pull-right"><i
                                class="fa fa-angle-left"></i>&nbsp;&nbsp;Kembali</a>
                </h1>
            </div>
        </div>

        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                     data-widget-editbutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Butiran Stok </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->

                        <div class="widget-body no-padding">
                            <div class="modal-body no-padding">
                                <table cellpadding="5" cellspacing="0" border="0"
                                       class="table table-hover table-condensed">
                                    <tbody>
                                    <tr>
                                        <td style="width:300px">Nama Stok:</td>
                                        <td>{!! $stock_in->stock_name !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:300px">Kuantiti:</td>
                                        <td>{!! $stock_in->quantity !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:300px">Harga Seunit:</td>
                                        <td> RM {!! number_format($stock_in->price, 2) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:300px">Penerangan:</td>
                                        <td>{!! $stock_in->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:300px">Tarikh Stok Masuk:</td>
                                        <td>{!! $stock_in->created_at !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end widget content -->
                </div><!-- end widget div -->
            </article><!-- WIDGET END -->
        </div><!-- end row -->
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