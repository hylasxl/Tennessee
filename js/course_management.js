$(".create-course").click(function () {
  window.location.replace("./course_create.php");
});


$(".course-details").click(function () {
  id = this.id;
  window.location.replace(`./course_view_detail_approve.php?id=${id}`);
});
$(".course-details-edu").click(function () {
  id = this.id;
  window.location.replace(`./course_view_detail_edu.php?id=${id}`);
});
$(".btn-course-approve").click(function () {
  id = this.id;
  window.location.replace(`./php/approve_course.php?id=${id}`);
});
$(".btn-course-reject").click(function () {
  id = this.id;
  window.location.replace(`./php/reject_course.php?id=${id}`);
});


