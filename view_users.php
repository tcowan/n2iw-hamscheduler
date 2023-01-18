<?php
    require("includes/config.php");

    checkTable(SLOT_TABLE);

   makeSureIsAdmin();

    $rows = query("SELECT * FROM `op` WHERE id > 0");
    if ($rows === false) {
        apologize("Something wrong with finding slots for you!");
    } else {
        foreach ($rows as $r) {
            $data[] = array("name"=>$r["name"] , "call"=>$r["callsign"], "priv"=>$r["privilege"]); 
        }
        if (!isset($data)) {
            apologize("You haven't reserved any time slots yet!");
        } else {
            render("users_template.php", array("title"=>"All Users in Database",
                "data"=>$data, "call"=>$_SESSION["call"], "url"=>$_SERVER["REQUEST_URI"]));
        }
    }
?>
