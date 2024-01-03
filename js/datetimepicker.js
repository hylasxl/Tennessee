var today = new Date();
var tomorrow = new Date(today);
tomorrow.setDate(today.getDate()+1);
tomorrow.toLocaleDateString();
$('#dateofBirthforOver18').datetimepicker(
    {
        timepicker: false,
        format: "Y-m-d",
        yearEnd: new Date().getFullYear() - 18,
        maxDate : new Date(new Date().setFullYear(new Date().getFullYear() -18 )),
        startDate: new Date(new Date().setFullYear(new Date().getFullYear() -18 ))
    }
)

$('#dateofBirth').datetimepicker(
    {
        timepicker: false,
        format: "Y-m-d",
    }
)

$('#select-start-date').datetimepicker(
    {
        timepicker: false,
        format: "Y-m-d",
        minDate: tomorrow,
        closeOnDateSelect:true,
        disabledWeekDays: [0],
    }
)

$('#to-date-ab').datetimepicker(
    {
        timepicker: false,
        format: "Y-m-d",
        minDate: tomorrow,
        closeOnDateSelect:true,
        disabledWeekDays: [0],
    }
)
$('#from-date-ab').datetimepicker(
    {
        timepicker: false,
        format: "Y-m-d",
        minDate: tomorrow,
        closeOnDateSelect:true,
        disabledWeekDays: [0],
    }
)