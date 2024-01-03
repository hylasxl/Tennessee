var date = new Date()
date.setDate(date.getDate() + 1);

$("#from-date").datetimepicker({
    timepicker: false,
    defaultDate: new Date(),
    format:'Y-m-d',
    closeOnDateSelect:true,
    startDate: new Date(),
    weeks: false,
    yearStart: 2020,
    yearEnd: new Date().getFullYear()+3,
    todayButton:true,
})
    
$("#to-date").datetimepicker({
    timepicker: false,
    defaultDate: new Date(),
    format:'Y-m-d',
    closeOnDateSelect:true,
    startDate: new Date(),
    weeks: false,
    yearStart: 2020,
    yearEnd: new Date().getFullYear()+3,
    todayButton:true,
    minDate: true,
})
    
$("#event-edit-time").datetimepicker({
    timepicker: true,
    defaultDate: new Date(),
    format:'Y-m-d H:i',
    step:30,
    closeOnDateSelect:true,
    startDate: new Date(),
    weeks: false,
    yearStart: 2020,
    yearEnd: new Date().getFullYear()+3,
    todayButton:true,
    minDate: new Date(),
})
    
$("#event-edit-duration").datetimepicker({
    timepicker: true,
    datepicker: false,
    defaultDate: new Date(),
    format:'H:i',
    minTime: '00:30',
    maxTime: '5:30',
    step:30,

    
})

$("#start-date").datetimepicker({
    format: "Y-m-d",
    timepicker: false,
    datepicker: true,
    minDate: date,
    yearEnd: new Date().getFullYear()+3,
    disabledWeekDays: [0, 7],
    
})
    
$("#dateofbirth").datetimepicker({
    timepicker: false,
    format: "Y-m-d"
})
