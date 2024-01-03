$(document).ready(function(){
    $(".event-edit-btn").click(function(){   
        id = this.id
        window.location.replace(`./event_edit.php?id=${id}`)
    });
    $(".event-edit-save-change").click(function () { 
        id= this.id
        event_name = $('.name').val()
        datetime = $('.datetime').val()
        duration = $('.duration').val()
        state = $('.status').val()
        window.location.replace(`./php/event_edit.php?id=${id}&name=${event_name}&time=${datetime}&duration=${duration}&status=${state}`)
     });

     $(".event-add-new").click(function () { 
        window.location.replace('./event_add.php');
    })
    $(".event-delete-btn").click(function(){
        id = this.id
        window.location.replace(`./php/event_delete.php?id=${id}`)
    })
    $(".event-info-btn").click(function(){
        id = this.id
        window.location.replace(`./event_info.php?id=${id}`)
    })
    
})