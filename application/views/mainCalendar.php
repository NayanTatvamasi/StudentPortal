<?//php include('header.php');?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Calendar</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url('Assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url('Assets/dist/assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />
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
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Card Calendar-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Events Calendar
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <a href="<?= base_url('admin/events');?>" class="btn btn-light-primary font-weight-bold">
                                        <i class="ki ki-plus icon-md mr-2"></i> Add Event
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="kt_calendar"></div>
                            </div>
                        </div>
                        <!--end::Card Calendar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->

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

    <!--begin::Page Vendors(used by this page)-->
    <script src="<?= base_url('Assets/dist/assets/plugins/custom/datatables/datatables.bundle.js'); ?>"></script>
    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="<?= base_url('Assets/dist/assets/js/pages/crud/datatables/basic/scrollable.js'); ?>"></script>
    <!--end::Page Scripts-->


    <!--begin: Calendar Script For Data -->
    <script>
        function eventsData() {
            var eventDataList = [];
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url() ?>admin/eventList',
                async: false,
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var i;
                    var cName;
                    // var eventDataList = '';

                    for (i = 0; i < data.length; i++) {


                        if (data[i].teacher_id == '1596') {
                            cName = "fc-event-danger";
                        } else {
                            cName = "fc-event-primary";
                        }

                        eventDataList[i] = {
                            title: data[i].event_title,
                            start: data[i].event_date + 'T' + data[i].event_time,
                            description: data[i].event_body,
                            end: data[i].event_date,
                            className: cName
                        };


                    }
                    // console.log(eventDataList);


                }

            });

            return eventDataList;

        }

        "use strict";

        var KTCalendarBackgroundEvents = function() {

            return {
                //main function to initiate the module
                init: function() {

                    var edata = eventsData();
                    // console.log(edata);
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


                        events: edata, //Display Data


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
    <!-- end: Calendar Script For Data -->

</body>
<!--end::Body-->
</html>