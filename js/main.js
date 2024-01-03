$(document).ready(function () {


  $("#menu-name").text("MENU");
  $(".menu-icon").append('<i class="icon-toggle fa-solid fa-bars fa-xl"></i>');
  $(".text-toggle").click(function () {
    var text = $("#menu-name").text();
    if (text == "MENU") {
      $("#menu-name").text("CLOSE");
    } else {
      $("#menu-name").text("MENU");
    }

    var icon_class = $(".icon-toggle").attr("class");
    if (icon_class.includes("fa-bars")) {
      $(".icon-toggle").removeClass("fa-bars");
      $(".icon-toggle").addClass("fa-xmark");
      $(".icon-toggle").addClass("closebtn");
      $(".icon-toggle").on("click", openNav());
    } else {
      $(".icon-toggle").removeClass("fa-xmark");
      $(".icon-toggle").addClass("fa-bars");
      $("icon-toggle").on("click", closeNav());
    }
  });

  function openNav() {
    document.getElementById("myNav").style.height = "calc(100% - 80px)";
  }

  function closeNav() {
    document.getElementById("myNav").style.height = "0%";
  }

  
  
});

