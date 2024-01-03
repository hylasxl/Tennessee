$('.view_btn').click(function () {
    id = this.id
    window.location.replace(`./student_lesson_view.php?id=${id}`)
  })