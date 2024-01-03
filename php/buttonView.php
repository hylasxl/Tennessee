<?php

session_start();
if($_SESSION["LoginStatus"] == 1){
    echo "<style type=\"text/css\">
    .sign-in-group{
        display: none !important;
    }
    .management-session{
        display: block;
    }
    </style>";

}
else{
    echo "<style type=\"text/css\">
    .sign-out-group{
        display: none !important;
    }

    .management-session{
        display: none;
    }
    </style>";
}


if($_SESSION["AccountType"] == 1){
    echo "<style type=\"text/css\">
    .ofadmin{
        display: block !important;
    }
    </style>";
} else if ($_SESSION["AccountType"] == 3){
    echo "<style type=\"text/css\">
    .ofedu{
        display: block !important;
    }
    </style>";
} else if($_SESSION["AccountType"] == 2){
    echo "<style type=\"text/css\">
    .ofteacher{
        display: block !important;
    }
    </style>";
} else if ($_SESSION["AccountType"] == 4){
    echo "<style type=\"text/css\">
    .ofstudent{
        display: block !important;
    }
    </style>";
}

?>