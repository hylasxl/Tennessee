$('.view-btn').click(function(){
    id = this.id
    window.location.replace(`./account_management_view_info.php?id=${id}`);
})
$('.view-student-info').click(function(){
    id = this.id
    window.location.replace(`./account_student_view.php?id=${id}`);
})
$('.view-lecturer').click(function(){
    id = this.id
    window.location.replace(`./account_lecturer_view.php?id=${id}`);
})
$('.create-edu').click(function(){
    window.location.replace(`./account_cadre_create.php?type=2`)
})
$('.create-admin').click(function(){
    window.location.replace(`./account_cadre_create.php?type=1`)
})

$('.restrict-btn').click(function(){
    id = this.id
    window.location.replace(`./php/restrict_account.php?id=${id}`)
})
$('.restore-btn').click(function(){
    id = this.id
    window.location.replace(`./php/restore_account.php?id=${id}`)
})

$('.data-changeable').change(function () {
    $('#submit-btn-info').prop('disabled',false);
  })


$('#avt-img').change(function(){
    $('#submit-btn-avt').show();
})

$('.create-student').click(function(){
    window.location.replace(`./account_student_create.php`)
})
$('.create-teacher').click(function(){
    window.location.replace(`./account_lecturer_create.php`)
})

$('.lec_acc_reject').click(function(){
    id = this.id 
    window.location.replace(`./php/reject_account_request.php?id=${id}`)
})

$('.lec_approve').click(function(){
    id = this.id 
    window.location.replace(`./php/approve_lecturer_account.php?id=${id}`)
})
$('.stu_acc_reject').click(function(){
    id = this.id 
    window.location.replace(`./php/student_reject_account.php?id=${id}`)
})

$('.stu_approve').click(function(){
    id = this.id 
    window.location.replace(`./php/approve_student_account.php?id=${id}`)
})

