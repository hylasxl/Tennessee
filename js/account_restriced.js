$(document).ready(function(){
    $(".block-btn").click(function(){
        
        id = this.id
        console.log(id);
        window.location.replace(`./php/restrict_account.php?id=${id}`)
    });
    $(".unblock-btn").click(function(){
        id = this.id
        window.location.replace(`./php/permit_account.php?id=${id}`)
    });
})