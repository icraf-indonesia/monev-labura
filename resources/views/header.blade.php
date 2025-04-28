<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title') | Monitoring & Evaluation of Labuhan Batu Utara</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link href="{{ url('') }}/dist/assets/img/labura-small.png" rel="icon">
    <!-- Bootstrap CSS File -->
    <link href="{{ url('') }}/dist/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{ url('') }}/dist/assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{{ url('') }}/dist/assets/css/style.css" rel="stylesheet">
    <!-- datetimepicker Stylesheet File -->
    <link href="{{ url('') }}/dist/assets/css/jquery.datepicker2.css" rel="stylesheet">
    <link href="{{ url('') }}/dist/assets/css/animate.min.css" rel="stylesheet">
    <!-- data table stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/dist/assets/css/datatable.min.css" />
    <script src="{{ url('') }}/dist/assets/js/utils.js"></script>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.9.4/dist/leaflet.css' crossorigin='' />
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/rubik?styles=19495" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/shpjs@latest/dist/shp.min.js"></script>
</head>

<body class="innerpage-body">

    <header>
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg ct-navbar-01">
            <div class="container-fluid" style="width: 1170px">
                <div class="row">
                    <div class="col-md-8 col-sm-12 header-navbar-lft text-center" style="padding-left: 0px;">
                        <a class="web-logo1 visible-xs visible-sm" href="{{ url('') }}/"><img
                                src="{{ url('') }}/dist/assets/img/header-kab-small-labura.png" class="img-responsive" alt=""></a>

                        <div class="hamburger navbar-toggle collapsed mob-icon-menu img-responsive visible-xs visible-sm"
                            data-toggle="slide-collapse" data-target="#slide-navbar-collapse" aria-expanded="false">
                            <div class="burger-main">
                                <div class="burger-inner">
                                    <span class="top"></span>
                                    <span class="mid"></span>
                                    <span class="bot"></span>
                                </div>
                            </div>
                        </div>

                        <ul id="menu" class="hidden-xs hidden-sm" style="padding-right:0px; padding-left:0px;">
                            <li><a class="web-logo" href="{{ url('') }}/"><img
                                        src="{{ url('') }}/dist/assets/img/header-kab-small-labura.png"
                                        class="img-responsive" alt=""></a></li>
                            <li><a class="home" href="{{ url('') }}/">Beranda</a></li>
                            <li><a class="home" href="{{ url('') }}/perencanaan">Perencanaan</a></li>
                            <li><a class="home" href="{{ url('') }}/unduh">Unduh</a></li>
                            @if (Auth::check())
                                @if (Auth::user()->role === 'admin')
                                    <li><a href="{{ url('') }}/admin">Admin</a></li>
                                @else
                                    <li><a href="{{ url('') }}/kontributor">Kontributor</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-5 header-navbar-rht hidden-xs hidden-sm" style="padding-left: 0px;">
                        <ul class="text-right m-t-13">
                            @if (Auth::check())
                                <li>
                                    <a style="font-size: 13px; pointer-events: none; position: relative; top: -5px">{{ Auth::user()->name }}</a>
                                </li>

                                <li>
                                    <a href="{{ url('') }}/session/logout" class="header-login">Keluar</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('') }}/session" class="header-login">Masuk</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    {{-- Start: Mobile View --}}
                    <div id="slide-navbar-collapse" class="collapse mobile-sidemenu">
                        <ul>
                            <li><a class="home" href="{{ url('') }}/">Beranda</a></li>
                            <li><a class="home" href="{{ url('') }}/perencanaan">Perencanaan</a></li>
                            <li><a class="home" href="{{ url('') }}/pembelajaran">Pembelajaran</a></li>
                            @if (Auth::check())
                                @if (Auth::user()->role === 'admin')
                                    <li><a href="{{ url('') }}/admin">Admin</a></li>
                                @else
                                    <li><a href="{{ url('') }}/kontributor">Kontributor</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- section fliters start -->
    <section class="container-body">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    <!-- section filter end -->

    <!-- footer start -->
    <footer class="footer-section">
        <div class="container-fluid">
        </div>
    </footer>
    <!-- footer start -->


    <!-- JavaScript Libraries -->
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/jquery-2.2.0.js"></script>
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/jquery.datepicker2.js"></script>
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/slick.js"></script>
    <script src="{{ url('') }}/dist/assets/js/Chartjs.js"></script>
    <!-- circle animation -->
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/bookingcount-circle.js"></script>
    <!-- circle animation -->
    <!-- datatable -->
    <script type="text/javascript" src="{{ url('') }}/dist/assets/js/datatable.min.js"></script>

    @yield('customJSLibrary')

    <script>
        @yield('customJS')
    </script>

    <script>
        $(document).ready(function() {
            $("#patientfilter").DataTable({
                "sScrollX": "100%",
                "bScrollCollapse": true,
                "scrollY": "400px",
                "scrollCollapse": true,
                "paging": false,
                "filter": true
            });
            $("#patientfiltertoday").DataTable({
                "filter": true,
                "bPaginate": false,
                "bAutoWidth": false,
                "bScrollCollapse": true,
                "bLengthChange": false,

            });
        });
    </script>
    <!-- datatable -->
    <script>
        $(document).ready(function($) {
            function animateElements() {
                $(".progressbar-booking1").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle1").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle1").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#da3f81"
                            }
                        });
                    }
                });
                $(".progressbar-booking2").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle2").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle2").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#68dda9"
                            }
                        });
                    }
                });
                $(".progressbar-booking3").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle3").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle3").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#1b5a90"
                            }
                        });
                    }
                });
                $(".progressbar-booking4").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle4").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle4").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#ffac14"
                            }
                        });
                    }
                });
                $(".progressbar-booking5").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle5").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle5").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#149dff"
                            }
                        });
                    }
                });
                $(".progressbar-booking6").each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var percent = $(this).find(".booking-circle6").attr("data-percent");
                    var animate = $(this).data("animate");
                    if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                        $(this).data("animate", true);
                        $(this).find(".booking-circle6").circleProgress({
                            value: percent / 100,
                            size: 400,
                            thickness: 30,
                            fill: {
                                color: "#c514ff"
                            }
                        });
                    }
                });

            }
            animateElements();
            $(window).scroll(animateElements);
        });
    </script>
    <script type="text/javascript">
        $('document').ready(function() {
            var Closed = false;

            $('.hamburger').click(function() {
                if (Closed == true) {
                    $(this).removeClass('open');
                    $(this).addClass('closed');
                    Closed = false;
                } else {
                    $(this).removeClass('closed');
                    $(this).addClass('open');
                    Closed = true;
                }
            });
        });
    </script>
    <script>
        $('[data-toggle="slide-collapse"]').on('click', function() {
            $navMenuCont = $($(this).data('target'));
            $navMenuCont.animate({
                'width': 'toggle'
            }, 350);
            $(".menu-overlay").fadeIn(500);

        });
        $(".menu-overlay").click(function(event) {
            $(".navbar-toggle").trigger("click");
            $(".menu-overlay").fadeOut(500);
        });
    </script>
    <script id="script-init">
        var DATA_COUNT = 16;
        var labels = [];

        Samples.srand(4);

        for (var i = 0; i < DATA_COUNT; ++i) {
            labels.push('' + i);
        }

        Chart.helpers.merge(Chart.defaults.global, {
            aspectRatio: 4 / 3,
            tooltips: false,
            layout: {
                padding: {
                    top: 32,
                    right: 24,
                    bottom: 20,
                    left: 0
                }
            },
            elements: {
                line: {
                    fill: true
                }
            },
            plugins: {
                legend: false,
                title: false
            }
        });
    </script>

    <script id="script-construct">
        var chart = new Chart('chart-0', {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: Samples.color(0),
                    borderColor: Samples.color(0),
                    data: Samples.numbers({
                        count: DATA_COUNT,
                        min: -100,
                        max: 100
                    })
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        align: function(context) {
                            var index = context.dataIndex;
                            var curr = context.dataset.data[index];
                            var prev = context.dataset.data[index - 1];
                            var next = context.dataset.data[index + 1];
                            return prev < curr && next < curr ? 'end' :
                                prev > curr && next > curr ? 'start' :
                                'center';
                        },
                        backgroundColor: 'rgba(255, 255, 255, 0.7)',
                        borderColor: 'rgba(128, 128, 128, 0.7)',
                        borderRadius: 4,
                        borderWidth: 1,
                        color: function(context) {
                            var i = context.dataIndex;
                            var value = context.dataset.data[i];
                            var prev = context.dataset.data[i - 1];
                            var diff = prev !== undefined ? value - prev : 0;
                            return diff < 0 ? Samples.color(0) :
                                diff > 0 ? Samples.color(1) :
                                'gray';
                        },
                        font: {
                            size: 11,
                            weight: 600
                        },
                        offset: 8,
                        formatter: function(value, context) {
                            var i = context.dataIndex;
                            var prev = context.dataset.data[i - 1];
                            var diff = prev !== undefined ? prev - value : 0;
                            var glyph = diff < 0 ? '\u25B2' : diff > 0 ? '\u25BC' : '\u25C6';
                            return glyph + ' ' + Math.round(value);
                        }
                    }
                }
            }
        });
    </script>

    <script id="script-init1">
        var DATA_COUNT = 5;
        var labels = [
            'Earth',
            'Mars',
            'Saturn',
            'Jupiter',
            'Others'
        ];

        Samples.srand(0);

        Chart.helpers.merge(Chart.defaults.global, {
            aspectRatio: 4 / 3,
            tooltips: false,
            layout: {
                padding: {
                    top: 32,
                    right: 24,
                    bottom: 20,
                    left: 0
                }
            },
            elements: {
                line: {
                    fill: false
                }
            },
            plugins: {
                legend: false,
                title: false
            }
        });
    </script>

    <script id="script-construct1">
        var chart = new Chart('chart-1', {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: Samples.color(0),
                    data: Samples.numbers({
                        count: DATA_COUNT,
                        min: 0,
                        max: 100
                    })
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        align: 'end',
                        anchor: 'end',
                        color: function(context) {
                            return context.dataset.backgroundColor;
                        },
                        font: function(context) {
                            var w = context.chart.width;
                            return {
                                size: w < 512 ? 12 : 14
                            };
                        },
                        formatter: function(value, context) {
                            return context.chart.data.labels[context.dataIndex];
                        }
                    }
                },
                scales: {
                    xAxes: [{
                        display: false,
                        offset: true
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
