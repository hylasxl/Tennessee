$('.view_btn').click(function () {
    id = this.id
    window.location.replace(`./teacher_lesson_view.php?id=${id}`)
  })