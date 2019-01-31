@extends('main')
@section('crumb')
    <li>Utama</li>
    <li>Mesej</li>
    <li>Mesej Baru</li>

@stop

@section('content')
    <!-- MAIN CONTENT -->

    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-envelope fa-fw "></i>
                    Mesej
                    <span> > Mesej Baru</span>
                </h1>
            </div>

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                             data-widget-colorbutton="false"
                             data-widget-editbutton="false" data-widget-togglebutton="false"
                             data-widget-fullscreenbutton="false" data-widget-sortable="false">
                            <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                            -->

                            <header>
                                <span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
                                <h2> Ruangan Mesej</h2>
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

											<textarea name="ckeditor">
												&lt;h1> &lt;/a&gt;&lt;/small&gt;&lt;/p&gt;
				                			</textarea>
                                </div><!-- end widget content -->
                            </div><!-- end widget div -->
                        </div><!-- end widget -->
                    </article><!-- WIDGET END -->
                </div><!-- end row -->
            </section><!-- end widget grid -->

            <footer class="demo-btns pull-right">
                <button type="button" class="btn btn-default btn-labeled btn-danger" onclick="window.history.back();">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Batal
                </button>
                <button type="submit" class="btn btn-primary btn-labeled btn-success" onclick=""><span
                            class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Hantar
                </button>
            </footer>
        </div><!-- END MAIN CONTENT -->
    </div><!-- END MAIN PANEL -->
@stop

@section('page-script')

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true} );

        })

    </script>
@stop