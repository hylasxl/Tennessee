$(document).ready(function(){
    
    $(".button-submit-acc").click(function(){
        id = this.id
        window.location.replace(`./php/approve_account.php?id=${id}`)
    });
})

