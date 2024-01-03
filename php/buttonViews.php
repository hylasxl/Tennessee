<?php

session_start();

if($_SESSION["LoginStatus"] == true){
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
    .type-1{
        display: flex !important;
    }
    </style>";
} else if ($_SESSION["AccountType"] == 3){
    echo "<style type=\"text/css\">
    .type-3{
        display: flex !important;
    }
    </style>";
} else if($_SESSION["AccountType"] == 2){
    echo "<style type=\"text/css\">
    .type-2{
        display: flex !important;
    }
    </style>";
} else if ($_SESSION["AccountType"] == 4){
    echo "<style type=\"text/css\">
    .type-4{
        display: flex !important;
    }
    </style>";
}

?>