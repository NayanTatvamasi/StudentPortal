<? //php include('header.php');?>
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
                        <!--end::Card Calendar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->

                <!--begin:: studentListContent-->
                <!-- <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

                    
                    <div class="d-flex flex-column-fluid">
                        
                        <div class=" container ">
                            
                            <div class="card card-custom gutter-b">
                                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Scrollable Table
                                            <span class="d-block text-muted pt-2 font-size-sm">scrollable datatable with
                                                fixed height</span>
                                        </h3>
                                    </div>
                                    <div class="card-toolbar">
                                        
                                        <div class="dropdown dropdown-inline mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    
                                                </span> Export
                                            </button>

                                           
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                               
                                                <ul class="navi flex-column navi-hover py-2">
                                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                                        Choose an option:
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-print"></i></span>
                                                            <span class="navi-text">Print</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-copy"></i></span>
                                                            <span class="navi-text">Copy</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                            <span class="navi-text">Excel</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                                            <span class="navi-text">CSV</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                                            <span class="navi-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                            
                                        </div>
                                        

                                       
                                        <a href="#" class="btn btn-primary font-weight-bolder">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                
                                            </span> New Record
                                        </a>
                                        
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                        <thead>
                                            <tr>
                                                <th>Record Number</th>
                                                <th>Student ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Class room</th>
                                                <th>STD</th>
                                                <th>Date of Birth</th>
                                                <th>Contact Number</th>
                                                <th>Register Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody id="innerstudentList">

                                        </tbody>

                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div> -->
                <!--end::studentListContent Content-->

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

    <!--begin: Student List Script For Data -->
    <!-- <script>
        function showAllStudent() {
            // alert('click');
            $count = 0;
            $.ajax({
                type: 'ajax',
                url: '<? //php echo base_url() 
                        ?>admin/showAllStudent',
                dataType: 'json',
                success: function(data) {
                    // alert('hello');
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {

                        html += '<tr>' +
                            '<td>' + ++$count + '</td>' +
                            '<td>' + data[i].studentid + '</td>' +
                            '<td>' + data[i].firstname + '</td>' +
                            '<td>' + data[i].lastname + '</td>' +
                            '<td>' + data[i].classroomid + '</td>' +
                            '<td>' + data[i].standard + '</td>' +
                            '<td>' + data[i].dob + '</td>' +
                            '<td>' + data[i].contact_no + '</td>' +
                            '<td>' + data[i].register_date + '</td>' +
                            '<td>' + '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>\
	                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>\
	                     ' + '</td>' +
                            '</tr>';
                    }

                    $('#innerstudentList').html(html);
                },
                error: function() {
                    $('#innerstudentList').html('No data Available');
                    // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
                }
            });
        }

        showAllStudent();
    </script> -->
    <!-- end: Student List Script For Data -->

</body>
<!--end::Body-->
</html>