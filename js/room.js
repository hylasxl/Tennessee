$(document).ready(function(){
    $(".room-edit").click(function(){   
        id = this.id
        window.location.replace(`./room_edit.php?id=${id}`)
    });
    $(".room-edit-save-change").click(function(){ 
        rname = $('.rname').val()  
        id = this.id
        window.location.replace(`./php./room_edit.php?id=${id}&name=${rname}`)
    });
    $(".room-fix").click(function(){ 
        
        id = this.id
        window.location.replace(`./php./room_fix.php?id=${id}`)
    });
    $(".room-use").click(function(){ 
        
        id = this.id
        window.location.replace(`./php./room_use.php?id=${id}`)
    });

    $(".room-timesheet").click(function () {
        id=this.id;
        window.location.replace(`./room_timesheet.php?id=${id}`)
      })

})