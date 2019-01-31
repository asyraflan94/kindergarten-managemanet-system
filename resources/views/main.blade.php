<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> Kindergarten Management System </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/font-awesome.min.css') !!}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen"
          href="{!! asset('css/smartadmin-production-plugins.min.css') !!}">
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/smartadmin-production.min.css') !!}">
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/smartadmin-skins.min.css') !!}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/smartadmin-rtl.min.css') !!}">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/demo.min.css') !!}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{!! asset('img/favicon/favicon.ico') !!}" type="image/x-icon">
    <link rel="icon" href="{!! asset('img/favicon/favicon.ico') !!}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{!! asset('img/splash/sptouch-icon-iphone.png') !!}">
    <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('img/splash/touch-icon-ipad.png') !!}">
    <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('img/splash/touch-icon-iphone-retina.png') !!}">
    <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('img/splash/touch-icon-ipad-retina.png') !!}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{!! asset('img/splash/ipad-landscape.png') !!}"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{!! asset('img/splash/ipad-portrait.png') !!}"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{!! asset('img/splash/iphone.png') !!}"
          media="screen and (max-device-width: 320px)">
</head>

<body class="">

<!-- HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->

        <!-- END LOGO PLACEHOLDER -->
    </div>


    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i
                            class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                    <img src="{!! asset('img/avatars/sunny.png') !!}" alt="John Doe" class="online"/>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i
                                    class="fa fa-cog"></i> Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                    class="fa fa-user"></i> <u>P</u>rofile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"
                           data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{!! URL::to('login') !!}" class="padding-10 padding-top-5 padding-bottom-5"
                           data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="{!! URL::to('logout') !!}" title="Sign Out" data-action="userLogout"
                      data-logout-msg="Adakah anda pasti untuk keuar dari sistem ini?"><i
                            class="fa fa-power-off"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field -->
        <form action="search.html" class="header-search pull-right">
            <input id="search-fld" type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i
                            class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->
    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="{!! asset('img/avatars/5.png') !!}" alt="me" class="online"/>
						<span>
							User
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
    </div>
    <!-- end user info -->

    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        @include('menu')
    </nav>


    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>
<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"
                          rel="tooltip" data-placement="bottom"
                          data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings."
                          data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            @yield('crumb')
        </ol>
    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">
        @yield('content')
    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">NI Solution 1.8.2 <span
                        class="hidden-xs"> - Kindergarten Management System</span> © 2016</span>
        </div>

        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
            <div class="txt-color-white inline-block">
                <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i>
                    <strong>52 mins ago &nbsp;</strong> </i>
                <div class="btn-group dropup">
                    <button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
                        <i class="fa fa-link"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right text-left">
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Download Progress</p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 50%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Server Load</p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 20%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span>
                                </p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <button class="btn btn-block btn-default">refresh</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
<div id="shortcut">
    <ul>
        <li>
            <a href="www.gmail.com.my" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i
                            class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span>
            </a>
        </li>
        <li>
            <a href="www.timeanddate.com" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i
                            class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
            <a href="www.google.com" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i
                            class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
            <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i
                            class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span>
            </a>
        </li>
        <li>
            <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i
                            class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li>
        <li>
            <a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i
                            class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }'
        src="{!! asset('js/plugin/pace/pace.min.js') !!}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{!! asset('js/app.config.js') !!}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="{!! asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') !!}"></script>

<!-- BOOTSTRAP JS -->
<script src="{!! asset('js/bootstrap/bootstrap.min.js') !!}"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="{!! asset('js/notification/SmartNotification.min.js') !!}"></script>

<!-- JARVIS WIDGETS -->
<script src="{!! asset('js/smartwidgets/jarvis.widget.min.js') !!}"></script>

<!-- EASY PIE CHARTS -->
<script src="{!! asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') !!}"></script>

<!-- SPARKLINES -->
<script src="{!! asset('js/plugin/sparkline/jquery.sparkline.min.js') !!}"></script>

<!-- JQUERY VALIDATE -->
<script src="{!! asset('js/plugin/jquery-validate/jquery.validate.min.js') !!}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{!! asset('js/plugin/masked-input/jquery.maskedinput.min.js') !!}"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="{!! asset('js/plugin/select2/select2.min.js') !!}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{!! asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') !!}"></script>

<!-- browser msie issue fix -->
<script src="{!! asset('js/plugin/msie-fix/jquery.mb.browser.min.js') !!}"></script>

<!-- FastClick: For mobile devices -->
<script src="{!! asset('js/plugin/fastclick/fastclick.min.js') !!}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
<script src="{!! asset('js/demo.min.js') !!}"></script>

<!-- MAIN APP JS FILE -->
<script src="{!! asset('js/app.min.js') !!}"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="{!! asset('js/speech/voicecommand.min.js') !!}"></script>

<!-- SmartChat UI : plugin -->
<script src="{!! asset('js/smart-chat-ui/smart.chat.ui.min.js') !!}"></script>
<script src="{!! asset('js/smart-chat-ui/smart.chat.manager.min.js') !!}"></script>

<!-- PAGE RELATED PLUGIN(S) -->

<script src="{!! asset('js/plugin/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('js/plugin/datatables/dataTables.colVis.min.js') !!}"></script>
<script src="{!! asset('js/plugin/datatables/dataTables.tableTools.min.js') !!}"></script>
<script src="{!! asset('js/plugin/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/plugin/datatable-responsive/datatables.responsive.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js') !!}"></script>
<script src="{!! asset('js/plugin/fuelux/wizard/wizard.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrapvalidator/bootstrapValidator.min.js') !!}"></script>
<script src="{!! asset('js/plugin/jquery-form/jquery-form.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js') !!}"></script>

<script src="{!! asset('js/plugin/maxlength/bootstrap-maxlength.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js') !!}"></script>
<script src="{!! asset('js/plugin/clockpicker/clockpicker.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js') !!}"></script>
<script src="{!! asset('js/plugin/noUiSlider/jquery.nouislider.min.js') !!}"></script>
<script src="{!! asset('js/plugin/ion-slider/ion.rangeSlider.min.js') !!}"></script>
<script src="{!! asset('js/plugin/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js') !!}"></script>
<script src="{!! asset('js/plugin/colorpicker/bootstrap-colorpicker.min.js') !!}"></script>
<script src="{!! asset('js/plugin/knob/jquery.knob.min.js') !!}"></script>
<script src="{!! asset('js/plugin/x-editable/moment.min.js') !!}"></script>
<script src="{!! asset('js/plugin/x-editable/jquery.mockjax.min.js') !!}"></script>
<script src="{!! asset('js/plugin/x-editable/x-editable.min.js') !!}"></script>
<script src="{!! asset('js/plugin/typeahead/typeahead.min.js') !!}"></script>
<script src="{!! asset('js/plugin/typeahead/typeaheadjs.min.js') !!}"></script>
<script src="{!! asset('js/plugin/ckeditor/ckeditor.js') !!}"></script>

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {

        pageSetUp();
        @if (Session::get('success') != '')
        $.smallBox({
            title: "Rekod berjaya disimpan",
            content: "{!! Session::get('success') !!}",
            color: "#739E73",
            icon: "fa fa-check bounce animated",
            timeout: 4000
        });
        @endif

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

</script>

@yield("page-script")

</body>
</html>