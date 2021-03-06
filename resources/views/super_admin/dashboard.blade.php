@extends('main')
@section('crumb')
    <li>Utama</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-home fa-fw "></i>
                Utama <span>> Quick Shortcut</span>
            </h1>
        </div>
    </div>

    <div class="row padding-10">
        <div class="col-sm-6">
            <div class="well">
                <h1 class="semi-bold">Pemilik &nbsp;<i class="fa fa-user-plus"></i></h1>
                <div class="row">
                    <div class="col-lg-8">
                        <p>
                            Akses kepada borang penambahan <strong>Pemilik</strong> organisasi yang melanggan sistem ini.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <a href="{!! URL::to('create/owner') !!}" title="Owner" class="btn btn-default btn-lg pull-right">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop