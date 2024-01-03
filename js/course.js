$('.lesson-course-page').click(function(){
    id = this.id
    window.location.replace(`./lesson_page.php?id=${id}`)
})

$('.register_btn').click(function () {
    id=this.id
    window.location.replace(`./php/course_enroll.php?id=${id}`)
  })

