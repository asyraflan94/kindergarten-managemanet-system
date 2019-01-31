@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Cawangan</li>
    <li>Butiran Cawangan</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-building fa-fw "></i>
                Butiran
                <span>> {!! $branch->branch_name !!}</span>
                <a href="{!! URL::to('branch') !!}" class="btn btm-sm btn-danger pull-right"><i
                            class="fa fa-angle-left"></i>&nbsp;&nbsp;Kembali</a>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="well well-light well-sm no-margin">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="myCarousel" class="carousel fade profile-carousel">
                            <div class="air air-bottom-right padding-10">
                                <a data-toggle="modal" href="#modal-form"
                                   class="m-edit btn txt-color-white bg-color-teal btn-sm"
                                   rel="tooltip" data-placement="top" data-original-title="Edit">
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
                                <img src="{!! asset('img/demo/image-placeholder-64x64.png') !!}" alt="demo user">
                                <div class="padding-10">
                                    {{--<h4 class="font-md"><strong>1,543</strong>
                                        <br>
                                        <small>Followers</small>
                                    </h4>--}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h1>
                                    <span class="semi-bold">{!! $branch->branch_name !!}</span>
                                </h1>
                                <br/><br/>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-lg fa-mobile"></i>&nbsp;&nbsp;
                                            +(6){!! $branch->tel_mobile !!}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-phone"></i>&nbsp;&nbsp;
                                            +(6){!! $branch->tel_office !!}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;
                                            {!! $branch->email !!}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="txt-color-darken">
                                            <i class="fa fa-lg fa-map-marker"></i>
                                            <span style="padding-left: 10px">
                                                {!! $branch->address_1 !!},
                                            </span><br>
                                            <span style="padding-left: 22px">
                                                {!! $branch->address_2 !!},
                                            </span><br>
                                            <span style="padding-left: 22px">
                                                {!! $branch->city !!},&nbsp;
                                                {!! $branch->postcode !!}&nbsp;
                                                {!! $branch->state !!},
                                            </span><br>
                                            <span style="padding-left: 22px">
                                                {!! $branch->country !!}.
                                            </span>
                                        </p>
                                    </li>
                                </ul>
                                <br/>
                            </div>
                            <div class="col-sm-3">
                                <h1>
                                    <small>
                                        <br/><strong class="txt-color-darken">Cawangan Utama</strong><br/>
                                        <span class="txt-color-darken">{!! $branch->organization_name !!}</span>
                                    </small>
                                    <small>
                                        <br/><br/>
                                        <strong class="txt-color-darken">Pemilik</strong><br/>
                                        <span class="txt-color-darken">{!! $branch->own_by !!}</span>
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
                                    <a href="#a1" data-toggle="tab">Maklumat Staf</a>
                                </li>
                                <li>
                                    <a href="#a2" data-toggle="tab">Maklumat Daftar</a>
                                </li>
                            </ul>

                            <div class="tab-content padding-top-10">
                                <div class="tab-pane fade in active" id="a1">
                                    <br/>
                                    <div class="row padding-10">

                                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><i class="fa fa-user"></i>&nbsp; Nama
                                                            Staf
                                                        </th>
                                                        <th><i class="fa fa-tag"></i>&nbsp; Jawatan
                                                        </th>
                                                        <th><i class="fa fa-lg fa-mobile"></i>&nbsp; Telefon
                                                        </th>
                                                        <th><i class="fa fa-lg fa-home"></i>&nbsp; Kawasan Tinggal
                                                        </th>
                                                        <th><i class="fa fa-envelope"></i>&nbsp; Email</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($branch->staffs as $staff)
                                                        <tr>
                                                            <td>
                                                                {!! $i++ !!}
                                                            </td>
                                                            <td>
                                                                {!! $staff->full_name !!}
                                                            </td>
                                                            <td>
                                                                {!! $staff->role !!}
                                                            </td>
                                                            <td>
                                                                {!! $staff->tel_mobile !!}
                                                            </td>
                                                            <td>
                                                                {!! $staff->city !!}
                                                            </td>
                                                            <td>
                                                                {!! $staff->email !!}
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
                                                    <i class="fa fa-plus"></i> <strong>&nbsp; Tarikh
                                                        Daftar </strong>
                                                    <p style="padding-left: 23px">{!! date_format($branch->created_at, 'd/m/Y H:i:s') !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <i class="fa fa-pencil"></i> <strong>&nbsp; Tarikh
                                                        Kemaskini </strong>
                                                    <p style="padding-left: 23px">{!! date_format($branch->updated_at, 'd/m/Y H:i:s') !!}</p>
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

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Kemaskini Cawangan</h4>
                </div>
                <div class="modal-body no-padding">
                    {!! Form::open(array('url' => URL::to('branch', $branch->id), 'method' => 'put', 'files'=>true, 'id' => 'form-ab', 'class' => 'smart-form',)) !!}
                    <fieldset style="border-top: 0px;">
                        <div class="row">
                            <section class="col col-8">
                                {!! Form::label('branch_name', 'Nama Cawangan', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'branch_name', isset($branch) ? $branch->branch_name : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-4">
                                {!! Form::label('organization_name', 'Nama Organisasi', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'organization_name', isset($branch) ? $branch->organization_name : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-4">
                                {!! Form::label('email', 'Emel Cawangan', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'email', isset($branch) ? $branch->email : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-4">
                                {!! Form::label('tel_office', 'No. Telefon (Pejabat)', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'tel_office', isset($branch) ? $branch->tel_office : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-4">
                                {!! Form::label('tel_mobile', 'No. Telefon', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'tel_mobile', isset($branch) ? $branch->tel_mobile : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <br/>
                        <hr/>
                        <br/>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('address_1', 'Alamat 1', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'address_1', isset($branch) ? $branch->address_1 : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('address_2', 'Alamat 2', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'address_2', isset($branch) ? $branch->address_2 : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('city', 'Bandar', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'city', isset($branch) ? $branch->city : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('postcode', 'Poskod', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'postcode', isset($branch) ? $branch->postcode : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-6">
                                {!! Form::label('country', 'Negeri', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'state', isset($branch) ? $branch->state : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                            <section class="col col-6">
                                {!! Form::label('country', 'Negara', ['class' => 'label']) !!}
                                <label class="input">
                                    {!! Form::input('text', 'country', isset($branch) ? $branch->country : null, array('class' => 'input-sm')) !!}
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button type="button" id="submit" class="btn btn-success">
                            Simpan
                        </button>
                        <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>
                    </footer>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-script')
    <script>
        $(function ($) {
            $(document).ready(function () {
                var url = '{!! URL::to('branch') !!}';
                var validate = ['name', 'email', 'role'];

                $('#modal-form').on('hidden.bs.modal', function () {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{!! URL::to('branch') !!}/' + $(this) + '/edit',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function (result) {

                            $.each(validate, function (k, v) {
                                $('#' + v).parent().removeClass('state-error');
                            });

                            $('#form-ab input, #form-ab select').each(
                                    function (index) {
                                        var input = $(this);
                                        $.each(result, function (k, v) {
                                            if (k == input.attr('name') && input.attr('type') == 'text') {
                                                input.val(v);
                                            } else if (k == input.attr('name') && input.is('select') === true) {
                                                $('[name="' + k + '"] option').removeAttr('selected');
                                                $('[name="' + k + '"] option').filter('[value="' + v + '"]').prop('selected', true)
                                            }
                                        });

                                    }
                            );
                        }
                    });
                });

                $('#submit').click(function () {

                    var fd = new FormData();

                    if ($('.modal-title').html() == 'Kemaskini Cawangan') {
                        fd.append('_method', 'put');
                        url = '{!! URL::to('branch', $branch->id) !!}';
                    }

                    var other_data = $('#form-ab').serializeArray();
                    $.each(other_data, function (key, input) {
                        fd.append(input.name, input.value);
                    });
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        data: fd,
                        success: function (result) {
                            $('#modal-form').modal('hide');
                            $.smallBox({
                                title: "Rekod berjaya disimpan",
                                content: "Anda berjaya menyimpan rekod tersebut",
                                color: "#739E73",
                                icon: "fa fa-check bounce animated",
                                timeout: 4000
                            });

                            setTimeout(function () {
                                location.reload()
                            }, 1000);
                        }
                    });

                });

                $('#cancel').click(function () {
                    $.smallBox({
                        title: "Batal",
                        content: "<i class='fa fa-clock-o'></i> <i> Anda klik butang batal</i>",
                        color: "#C79121",
                        iconSmall: "fa fa-times shake animated",
                        number: "1",
                        timeout: 4000
                    });
                });
            })
        });
    </script>
@stop