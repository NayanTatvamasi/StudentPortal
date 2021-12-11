<script>
    //file upload in ajax
    {
        var file = $('#show_name').get(0).files[0];
        var formData = new FormData();
        formData.append('file', file);
    }
    $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>excel_import/import",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#file').val('');
                load_data();
                alert(data);
            }
        })
    });


    // file delete in codeigniter
    {
        delete_files('./path/to/directory/'); //all file in directory
    }

    // URL parce and get specific string
    {
        $bits = parse_url($list[0]['as_path']);
        $filename = basename($bits['path']);
        print_r($filename);
        exit;
    }
</script>


<body>

    <div id="" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Student_Name Enroll{X}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    Student Grades
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <table class="table table-bordered table-responsive" style="margin-top: 20px; text-align:center;">
        <thead>
            <tr>
                <?php if (!($y == '1')) { ?>
                    <th>Student ID</th>
                <?php } else { ?><th>Number</th> <?php  } ?>
                <th>Exam Date</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Marks</th>
                <th>Percentage</th>
                <!-- <th>Rank In Class</th> -->
                <?php if (!($y == '1')) { ?>
                    <th colspan="2">Actions</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody id="innerGradeList">

        </tbody>
    </table>
</body>

<script>
    function showAllGrades() {
        // alert('click');
        $count = 0;
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>result/showAllGrades',
            dataType: 'json',
            success: function(data) {
                // alert('hello');
                var html = '';
                var i, c = 0;

                for (i = 0; i < data.length; i++) {

                    html += '<tr>' +
                        '<td><?php if (!($y == '1')) { ?>' + data[i].studentid + '<?php } else { ?>' + ++c + '<?php } ?></td>' +
                        // '<td>' + '<img src ="' + data[i].Image_path + '" alt="Null" id="ihover" class="img-thumbnail" width="100" height="100"/>' + ' </td>' +
                        '<td>' + data[i].event_date + '</td>' +
                        '<td>' + data[i].subject + '</td>' +
                        '<td>' + data[i].exam_category + '</td>' +
                        '<td>' + data[i].obtain_m + ' | ' + data[i].total_m + '</td>' +
                        '<td>' + data[i].percentage + '</td>' +
                        '<?php if (!($y == '1')) : ?>' +
                        '<td>' + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].m_id + '">Edit</a>' + '</td>' +
                        '<td>' +
                        '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].m_id + '">Delete</a>' +
                        '</td>' +
                        '<?php endif; ?>' +
                        '</tr>';
                }

                $('#innerGradeList').html(html);
            },
            error: function() {
                $('#innerGradeList').html('No data Available');
                // $('#studentList').html( +'< tr >'+ '< td colspan = "7" > Not data available </td></tr >' );
            }
        });
    }
</script>



<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Basic Calendar
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-light-primary font-weight-bold">
                <i class="ki ki-plus "></i> Add Event
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="kt_calendar"></div>
    </div>
</div>

<script>
    var KTCalendarBasic = function() {

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
                    plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                    themeSystem: 'bootstrap',

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
                    events: [{
                            title: 'All Day Event',
                            start: YM + '-01',
                            description: 'Toto lorem ipsum dolor sit incid idunt ut',
                            className: "fc-event-danger fc-event-solid-warning"
                        },
                        {
                            title: 'Reporting',
                            start: YM + '-14T13:30:00',
                            description: 'Lorem ipsum dolor incid idunt ut labore',
                            end: YM + '-14',
                            className: "fc-event-success"
                        },
                        {
                            title: 'Company Trip',
                            start: YM + '-02',
                            description: 'Lorem ipsum dolor sit tempor incid',
                            end: YM + '-03',
                            className: "fc-event-primary"
                        },
                        {
                            title: 'ICT Expo 2017 - Product Release',
                            start: YM + '-03',
                            description: 'Lorem ipsum dolor sit tempor inci',
                            end: YM + '-05',
                            className: "fc-event-light fc-event-solid-primary"
                        },
                        {
                            title: 'Dinner',
                            start: YM + '-12',
                            description: 'Lorem ipsum dolor sit amet, conse ctetur',
                            end: YM + '-10'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: YM + '-09T16:00:00',
                            description: 'Lorem ipsum dolor sit ncididunt ut labore',
                            className: "fc-event-danger"
                        },
                        {
                            id: 1000,
                            title: 'Repeating Event',
                            description: 'Lorem ipsum dolor sit amet, labore',
                            start: YM + '-16T16:00:00'
                        },
                        {
                            title: 'Conference',
                            start: YESTERDAY,
                            end: TOMORROW,
                            description: 'Lorem ipsum dolor eius mod tempor labore',
                            className: "fc-event-primary"
                        },
                        {
                            title: 'Meeting',
                            start: TODAY + 'T10:30:00',
                            end: TODAY + 'T12:30:00',
                            description: 'Lorem ipsum dolor eiu idunt ut labore'
                        },
                        {
                            title: 'Lunch',
                            start: TODAY + 'T12:00:00',
                            className: "fc-event-info",
                            description: 'Lorem ipsum dolor sit amet, ut labore'
                        },
                        {
                            title: 'Meeting',
                            start: TODAY + 'T14:30:00',
                            className: "fc-event-warning",
                            description: 'Lorem ipsum conse ctetur adipi scing'
                        },
                        {
                            title: 'Happy Hour',
                            start: TODAY + 'T17:30:00',
                            className: "fc-event-info",
                            description: 'Lorem ipsum dolor sit amet, conse ctetur'
                        },
                        {
                            title: 'Dinner',
                            start: TOMORROW + 'T05:00:00',
                            className: "fc-event-solid-danger fc-event-light",
                            description: 'Lorem ipsum dolor sit ctetur adipi scing'
                        },
                        {
                            title: 'Birthday Party',
                            start: TOMORROW + 'T07:00:00',
                            className: "fc-event-primary",
                            description: 'Lorem ipsum dolor sit amet, scing'
                        },
                        {
                            title: 'Click for Google',
                            url: 'http://google.com/',
                            start: YM + '-28',
                            className: "fc-event-solid-info fc-event-light",
                            description: 'Lorem ipsum dolor sit amet, labore'
                        }
                    ],

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
        KTCalendarBasic.init();
    });
</script>