$(".view_btn").click(function () {
  id = this.id;
  window.location.replace(`./attendance_view.php?id=${id}`);
});

serialize = function(obj) {
  var str = [];
  for (var p in obj)
    if (obj.hasOwnProperty(p)) {
      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
    }
  return str.join("&");
}
$("#save-check-attendance").click(function () {
  const checkboxes = document.querySelectorAll('.checkbox_attendance');
  var data ="";
  const checkboxesLength = checkboxes.length;
  for (let index = 0; index < checkboxesLength; index++) {
    value = checkboxes[index].value;
    value = "-"+value;
    checked = checkboxes[index].checked;
    attended = "-0";
    if (checked == true) {
      attended = "-1";
    } else attended = "-0";
    data = data+value+attended
  }
  
  // console.log(data);
  window.location.replace(`./php/check_attendance.php?data=${data}`)
  
});
