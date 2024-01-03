<?php

include("./dbconnect.php");


$state = $_POST['state'];
$type = $_POST['type'];
$sql = "";
if ($state == '0' && $type == '0') {
    $sql = "";
} else if ($state != '0' && $type == '0') {
    $sql = " where acc.account_state = '$state'";
} else if ($state == '0' && $type != '0') {
    $sql = " where acct.id = '$type'";
} else if ($state != '0' && $type != '0') {
    $sql = " where acct.id = '$type' and acc.account_state = '$state' ";
}



$data = $conn->query("SELECT acc.account_id, acc.username, acci.first_name, acci.last_name, acct.name, acc.account_state, acci.createdAt from account as acc left join account_info as acci on acc.account_id = acci.id inner join account_type as acct on acc.account_type = acct.id" . " " . $sql);


while ($row = $data->fetch_assoc()) {
    $state = ucwords($row['account_state']);
    $button_str = "<button
    style=\"width: 100%;background-color: #d31245; border: none; height: 30px; \" class=\"block-btn\" id=\"$row[account_id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\" onclick=''>Restrict</a></button>
   <button
    style=\"width: 100%;background-color: #1a2d59; border: none; height: 30px; \" class=\"unblock-btn d-none\" id=\"$row[account_id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Permit</a></button>";
    if($row['account_state']=="restricted"){
        $button_str="<button
        style=\"width: 100%;background-color: #d31245; border: none; height: 30px; \" class=\"block-btn d-none\" id=\"$row[account_id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Restrict</a></button>
       <button
        style=\"width: 100%;background-color: #1a2d59; border: none; height: 30px; \" class=\"unblock-btn\" id=\"$row[account_id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Permit</a></button>";
    } else if($row['name'] == "Administrator") {
        $button_str = "";
    }
    echo ("<div class=\"row mt-2 border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                            
                    <div class=\"col text-center col-1 \">$row[account_id]</div>
                    <div class=\"col text-center col-2 \">$row[username]</div>
                    <div class=\"col text-center col-2 \">$row[first_name] $row[last_name]</div>
                    <div class=\"col text-center col-2 \">$row[name]</div>
                    <div class=\"col text-center col-2 \">$state</div>
                    <div class=\"col text-center col-2 \">$row[createdAt]</div>
                    
                    <div class=\"col text-center col-1\">             
                                $button_str
                    </div>
                </div>");
}

 echo '<script src=\'js/account_restriced.js\'></script>'
?>