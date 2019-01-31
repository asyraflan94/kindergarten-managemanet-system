@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Notifikasi</li>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-bell fa-fw "></i>
                Notifikasi
                {{--<br><span>Notifikasi anak anda yang didaftarkan di (nama_tadika):</span>--}}
            </h1>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <a id="read" class="btn btn-default" type="button">Read</a>
            <a id="unread" class="btn btn-default" type="button">Unread</a>
            <p>&nbsp;</p>
        </div>

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                 data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-bell"></i> </span>
                    <h2>Senarai Notifikasi </h2>
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

                        <table id="dt_basic" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th data-hide="phone"> </th>
                                <th data-hide="phone"> Nama Anak</th>
                                <th data-hide="phone,tablet"> Tajuk</th>
                                <th data-hide="phone,tablet"> Tarikh</th>
                                <th data-hide="phone,tablet"> Masa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="" align="center">
                                    <label><input type="checkbox" class="checkbox style-2"><span></span></label>
                                </td>
                                <td class="">Nurfaziana
                                    <span class="label label-warning">New</span>
                                </td>
                                <td class="">Pembatalan Majlis Anugerah</td>
                                <td class="">26-10-2016</td>
                                <td class="">7.50 AM</td>
                            </tr>
                            <tr>
                                <td class="" align="center">
                                    <label><input type="checkbox" class="checkbox style-2"><span></span></label>
                                </td>
                                <td class="">Naadiyah</td>
                                <td class="">Lawatan Ke Zoo Negara</td>
                                <td class="">04-10-2016</td>
                                <td class="">6.38 PM</td>
                            </tr>
                            <tr>
                                <td class="" align="center">
                                    <label><input type="checkbox" class="checkbox style-2"><span></span></label>
                                </td>
                                <td class="">Nurfaziana</td>
                                <td class="">Cuti Tambahan</td>
                                <td class="">01-10-2016</td>
                                <td class="">8.50 AM</td>
                            </tr>
                            </tbody>
                        </table>
                        </table>
                        <div class="dt-toolbar-footer">
                            <div class="col-sm-6 col-xs-12 hidden-xs">
                                <div class="dataTables_info" id="dt_basic_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 100 entries
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="dt_basic_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="dt_basic_previous"><a
                                                    href="#" aria-controls="dt_basic" data-dt-idx="0" tabindex="0">Previous</a>
                                        </li>
                                        <li class="paginate_button active"><a href="#" aria-controls="dt_basic"
                                                                              data-dt-idx="1" tabindex="0">1</a>
                                        </li>
                                        <li class="paginate_button "><a href="#" aria-controls="dt_basic"
                                                                        data-dt-idx="2" tabindex="0">2</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="dt_basic"
                                                                        data-dt-idx="3" tabindex="0">3</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="dt_basic"
                                                                        data-dt-idx="4" tabindex="0">4</a></li>
                                        <li class="paginate_button disabled" id="dt_basic_ellipsis"><a href="#"
                                                                                                       aria-controls="dt_basic"
                                                                                                       data-dt-idx="5"
                                                                                                       tabindex="0">…</a>
                                        </li>
                                        <li class="paginate_button "><a href="#" aria-controls="dt_basic"
                                                                        data-dt-idx="7" tabindex="0">10</a></li>
                                        <li class="paginate_button next" id="dt_basic_next"><a href="#"
                                                                                               aria-controls="dt_basic"
                                                                                               data-dt-idx="8"
                                                                                               tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end widget content -->
            </div><!-- end widget div -->
        </article><!-- WIDGET END -->
    </div><!-- end row -->
@stop

@push('page-script')
<script type="text/javascript">
    /**
     * PUT BELOW HERE
     * ALL PAGE LEVEL RELATED SCRIPTS
     */


    /**
     * 1. pageLoadScripts
     */
    var pageLoadScripts = [
        "js/bemat-demo-script1.min.js",
        "js/bemat-demo-script2.min.js"];

    var pageLoadCSS = []


    /**
     * 2. pageRequiredComponents
     */
    var pageRequiredComponents = [
        "Panel",
        "Checkbox",
        "Select",
        "Dropdown",
        "Tooltip",
        "Modals",
        "FloatingLabels",
        "Scrollbar",
        "MaterialRipple",
        "Snackbar",
        "Toast",
        "Subheader",
        "SimplePieCharts",
        "LinearProgress",
        "CircularProgress",
        "SpeedDial"
    ];


    /**
     * 3. pageRequiredFeatures
     */
    var pageRequiredFeatures = [
        "prettyPrint",
        "hierarchicaldisplay"
    ];


    /**
     * 4. doneScriptsLoad()
     *
     * This function gets called when the "pageLoadScripts"
     * and "pageRequiredComponents" arrays above are fully loaded
     */

            // Set page variables globally
    var globalDemoVar; // This is a global variable, that you can unset later on pageDestroy() function
    var clipboard;

    var doneScriptsLoad = function () {
        clipboard = new Clipboard('[data-copycode="true"]', {
            target: function (trigger) {
                return trigger.parentNode.parentNode.getElementsByTagName("pre")[0];
            }
        });

        clipboard.on('success', function (e) {
            $.toasts("add", {
                msg: "Copied!"
            });
            e.clearSelection();
        });


        /**
         * SweetAlert
         */
        $("#noti").on("click", function () {
            swal({
                title: "Pembatalan Majlis Anugerah",
                text: "<h3>Dari : Cikgu Mukrimah</h3>" + "<p>Majlis Anugerah untuk esok (27-10-2016, Khamis) terpaksa dibatalkan kerana bekalan elektrik terputus selama dua hari",
                showCloseButton: true,
                html: true
            });
        });
        $("#notidua").on("click", function () {
            swal({
                title: "Lawatan Pelajar ke Zoo Negara",
                text: "<h3>Dari : Cikgu Mukrimah</h3>" + "<p>Anak Tuan/Puan perlu membawa air mineral secukupnya untuk sepanjang perjalan di dalam bas ke Zoo Negara. Makanan di Zoo Negara telah disediakan. Terima Kasih.",
                showCloseButton: true,
                html: true
            });
        });
        $("#notitiga").on("click", function () {
            swal({
                title: "Cuti Tambahan",
                text: "<h3>Dari : Cikgu Mukrimah</h3>" + "<p>Cuti dipanjangkan sehingga 03-10-2016, Isnin. Pelajar ke sekolah pada Selasa seperti hari biasa. Terima Kasih",
                showCloseButton: true,
                html: true
            });
        });

        //Delete button
        $("#hapus").on("click", function () {
            swal({
                        title: "Amaran",
                        text: "Adakah anda pasti untuk menghapus maklumat ini?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Hapus",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("", "Maklumat ini berjaya dihapuskan", "success");
                        } else {
                            swal("", "Maklumat tidak dihapuskan", "error");
                        }
                    });
        });

    }; // END: doneScriptsLoad();


    /**
     * 4. pageDestroy()
     *
     * Destroy all generated instances
     */
    var pageDestroy = function () {
        clipboard.destroy();
        clipboard = void 0;
    };

</script>
@endpush