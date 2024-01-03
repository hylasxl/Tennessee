<?
$status = $_POST['status'];
require "dbconnect.php";
$getRequest = "SELECT * FROM account_providing_request where status = '$status';";
$getRequest = $conn->query($getRequest);


if ($getRequest->num_rows < 1) {
    echo "<p class='ms-5 mt-3'>No recorded value.</p>";
}
$gender = "O";
while ($row = $getRequest->fetch_assoc()) {
    if ($row["gender"] == "F") {
        $gender = "Female";
    } else if ($row["gender"] == "M") {
        $gender = "Male";
    } else if ($row["gender"] == "O") {
        $gender = "Other";
    }

    $button_str = "<button style=\"width: 40%;background-color: #1a2d59; border: none; height: 30px; \" class=\"button-submit-acc\" id=\"$row[id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Approve</a></button>";
    if($row['status'] == 'approved'){
        $button_str = "<button style=\"width: 40%;background-color: #1a2d59; border: none; height: 30px; \" class=\"button-submit-acc d-none\" id=\"$row[id]\" name=\"\"><a  style=\" color: white; text-decoration: none;\">Approve</a></button>";
    }
    $status = ucwords($row["status"]);
    echo ("<div class=\"row mt-2  border border-top-0 border-start-0 border-end-0 pb-2 border-bottom-1\">
                    <div class=\"col text-center col-1 \">$row[id]</div>
                    <div class=\"col text-center col-2 \">$row[first_name] $row[last_name]</div>
                    <div class=\"col text-center col-3 \">$row[email]</div>
                    <div class=\"col text-center col-1 \">0$row[phone]</div>
                    <div class=\"col text-center col-1 \">$row[dateofbirth]</div>
                    <div class=\"col text-center col-1  \">$gender</div>

                    <div class=\"col text-center col-1  \">$status</div>
                    <div class=\"col text-center col-1  \">$row[type]</div>
                    <div class=\"col text-center col-2\">             
                                $button_str
                    </div>
                </div>");
}

echo "<script src='./js/account.js'></script>";


?>
