$(".field-input-acc").on('change',function(){
    $("#update_acc_info_btn").css("display","block");
})

$(document).ready(function(){
    
$("#passForm").on("submit", function(e) {
    e.preventDefault();
    $(".error").hide();
    var hasError = false;
    var currentpass = $("#oldpass").val();
    var newpass = $("#newpass").val();
    var cnfpass = $("#repass").val();
    var id = $("#userID").val();
    if (currentpass == '') {
        $("#oldpass").after('<span class="error text-danger"><em>Please  enter your current password.</em></span>');
        //$('#currentPass-group').addClass('has-error'); // add the error class to show red input
        //$('#old').append('<div class="help-block">Please enter your current password.</div>'); // add the actual error message under our input
        hasError = true;
    } else if (newpass == '') {
        $("#newpass").after('<span class="error text-danger"><em>Please enter a password.</em></span>');
        hasError = true;
    } else if (cnfpass == '') {
        $("#repass").after('<span class="error text-danger"><em>Please re-enter your password.</em></span>');
        hasError = true;
    } else if (newpass != cnfpass) {
        $("#repass").after('<span class="error text-danger"><em>Passwords do not match.</em></span>');
        hasError = true;
    }

    if (hasError == true) {
        return false;
    }
    if (hasError == false) {
        window.location.replace(`./php/changePassword.php?old=${currentpass}&new=${newpass}&id=${id}`);
    }
    
})

})    

$("#send_request").on("click",function (e) {
    e.preventDefault();
    $("#passForm").submit();
  })