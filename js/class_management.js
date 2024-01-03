$(".add-class").click(function () {
  window.location.replace("./class_add_new.php");
});

$(".view_detail_class").click(function () {
  id = this.id;
  window.location.replace(`./class_detail.php?id=${id}`);
});
$(".view_detail_class_lec").click(function () {
  id = this.id;
  window.location.replace(`./lecturer_class_detail.php?id=${id}`);
});

$(".add-student").click(function () {
  id = this.id;
  window.location.replace(`./class_add_student.php?id=${id}`);
});

$(".check_attendance_lec").click(function () {
  id = this.id;
  window.location.replace(`./lecturer_check_table.php?id=${id}`);
});
$(".transcript").click(function () {
  id = this.id;
  window.location.replace(`./lecturer_class_transcript.php?id=${id}`);
});

$(".check-submit").click(function () {
  let checkboxValues = document.querySelectorAll(".checkbox_attendance");

  let stringquery = "";
  for (let i = 0; i < checkboxValues.length; i++) {
    if (checkboxValues[i].disabled) stringquery += "/-1";
    else {
      if (checkboxValues[i].checked == true) {
        stringquery += "/1";
      } else stringquery += "/0";
    }

    stringquery += checkboxValues[i].value;
  }

  window.location.replace(`./php/class_attend.php?data=${stringquery}`);
});

$(".transcript-stu").click(function () {
  id = this.id;
  window.location.replace(`./student_view_transcript.php?id=${id}`);
});
$(".absent-request").click(function () {
  window.location.replace(`./student_new_absent_request.php`);
});

$(".ab-appr").click(function () {
  id = this.id;
  window.location.replace(`./php/approve_stu_ab.php?id=${id}`);
});
$(".ab-rej").click(function () {
  id = this.id;
  window.location.replace(`./php/reject_stu_ab.php?id=${id}`);
});
