<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url('Assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url('Assets/dist/assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('Assets/dist/assets/plugins/custom/prismjs/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('Assets/dist/assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="<?= base_url('Assets/dist/assets/css/themes/layout/header/base/light.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('Assets/dist/assets/css/themes/layout/header/menu/light.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('Assets/dist/assets/css/themes/layout/brand/dark.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('Assets/dist/assets/css/themes/layout/aside/dark.css'); ?>" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body">

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
        <!--begin::Logo-->
        <a href="#">

        </a>
        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->

        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Aside-->
            <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto " id="kt_brand">
                    <!--begin::Logo-->
                    <a href="#" class="brand-logo">
                        <!-- <img alt="Logo" src="<? //= base_url('Assets/dist/assets/media/logos/logo-light.png');
                                                    ?>" /> -->
                    </a>
                    <!--end::Logo-->

                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav ">


                            <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Select.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
                                                <path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span><span class="menu-text">Calendar</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item  menu-item-parent" aria-haspopup="true"><span class="menu-link"><span class="menu-text">Calendar</span></span></li>
                                        <li class="menu-item " aria-haspopup="true"><a href="#" class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">All Events</span></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->




            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class=" container ">
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Background Calendar
                                        </h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-light-primary font-weight-bold">
                                            <i class="ki ki-plus icon-md mr-2"></i> Add Event
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="kt_calendar"></div>
                                </div>
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->



        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?= base_url('Assets/dist/assets/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?= base_url('Assets/dist/assets/plugins/custom/prismjs/prismjs.bundle.js'); ?>"></script>
    <script src="<?= base_url('Assets/dist/assets/js/scripts.bundle.js'); ?>"></script>
    <!--end::Global Theme Bundle-->

    <!--begin::Page Vendors(used by this page)-->
    <script src="<?= base_url('Assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js'); ?>"></script>
    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="<?= base_url('Assets/dist/assets/js/pages/widgets.js'); ?>"></script>
    <!--end::Page Scripts-->

    <script>
        function eventsData() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>admin/eventList',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var i;
                    var  eventDataList = '[';
                    for (i = 0; i < data.length; i++) {

                        eventDataList += '{' +
                            'title: ' + data[i].event_title + ',' +
                            'start: ' + data[i].event_date + 'T' + data[i].event_time + ',' +
                            'description: ' + data[i].event_body + ',' +
                            'end: ' + data[i].event_date + 'T' + data[i].event_time + ',' +
                            'className: "fc-event-primary"' +
                            '},';

                    }
                    eventDataList += '],';
                    // console.log(eventDataList);

                }

            });

        }

        eventsData();
        "use strict";

        var KTCalendarBackgroundEvents = function() {

            return {
                //main function to initiate the module
                init: function() {

                    var todayDate = moment().startOf('day');
                    var YM = todayDate.format('YYYY-MM');
                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                    var TODAY = todayDate.format('YYYY-MM-DD');
                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                    var calendarEl = document.getElementById('kt_calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

                        isRTL: KTUtil.isRTL(),
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                        nowIndicator: true,
                        now: TODAY + 'T09:25:00', // just for demo

                        views: {
                            dayGridMonth: {
                                buttonText: 'month'
                            },
                            timeGridWeek: {
                                buttonText: 'week'
                            },
                            timeGridDay: {
                                buttonText: 'day'
                            }
                        },

                        defaultView: 'dayGridMonth',
                        defaultDate: TODAY,

                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        navLinks: true,
                        businessHours: true, // display business hours


                        events: [{
                            title: 'All Day Event',
                            start: YM + '-01',
                            description: 'Toto lorem ipsum dolor sit incid idunt ut',
                            className: "fc-event-danger fc-event-solid-warning",
                            color: KTApp.getSettings()['colors']['theme']['base']['info'],
                            rendering: 'background'
                        }],

                        eventRender: function(info) {
                            var element = $(info.el);

                            if (info.event.extendedProps && info.event.extendedProps.description) {
                                if (element.hasClass('fc-day-grid-event')) {
                                    element.data('content', info.event.extendedProps.description);
                                    element.data('placement', 'top');
                                    KTApp.initPopover(element);
                                } else if (element.hasClass('fc-time-grid-event')) {
                                    element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                    element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                }
                            }
                        }
                    });

                    calendar.render();
                }
            };
        }();

        jQuery(document).ready(function() {

            KTCalendarBackgroundEvents.init();
        });
    </script>
</body>
<!--end::Body-->

<script>

</script>

</html>