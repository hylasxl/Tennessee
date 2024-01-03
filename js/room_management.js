$('.view-room-timesheet').click(function () { 
    id = this.id
    window.location.replace(`./room_timesheet.php?id=${id}`);
})
$('.room-maintain').click(function () { 
    id = this.id
    window.location.replace(`./room_maintain.php?id=${id}`)
})
$('.room-restore').click(function () { 
    id = this.id
    window.location.replace(`./php/room_restore.php?id=${id}`)
})