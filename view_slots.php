<?php
    require("includes/config.php");

    checkTable(SLOT_TABLE);

   makeSureIsAdmin();

    $getSlots = sprintf("SELECT %s.%s as id, ", SLOT_TABLE, SLOT_ID) .
        sprintf("%s.%s as date, ", SLOT_TABLE, SLOT_DATE) .
        sprintf("%s.%s as startTime, ", SLOT_TABLE, SLOT_START_TIME) .
        sprintf("%s.%s as endTime, ", SLOT_TABLE, SLOT_END_TIME) .
        sprintf("%s.%s as band, ", BAND_TABLE, BAND_NAME) .
        sprintf("%s.%s as mode, ", MODE_TABLE, MODE_NAME) .
        sprintf("%s.%s as op ", SLOT_TABLE, SLOT_OP_ID) .
        sprintf("FROM %s, %s, %s ", SLOT_TABLE, BAND_TABLE, MODE_TABLE) .
        sprintf("WHERE %s.%s=%s.%s ", SLOT_TABLE, SLOT_BAND_ID, BAND_TABLE, BAND_ID) .
        sprintf("AND %s.%s=%s.%s ", SLOT_TABLE, SLOT_MODE_ID, MODE_TABLE, MODE_ID) .
        sprintf("AND %s>0 ", SLOT_OP_ID) .
        sprintf("ORDER BY %s.%s, ", SLOT_TABLE, SLOT_DATE) .
        sprintf("%s.%s, ", SLOT_TABLE, SLOT_START_TIME) .
        sprintf("%s.%s, ", SLOT_TABLE, SLOT_BAND_ID) .
        sprintf("%s.%s", SLOT_TABLE, SLOT_MODE_ID);
    //dump($getSlots);
    $rows = query($getSlots);
    if ($rows === false) {
        apologize("Something wrong with finding slots for you!");
    } else {
        foreach ($rows as $r) {
            $slots[] = array("id"=>$r["id"] , "date"=>$r["date"], "time"=>array($r["startTime"],$r["endTime"]), 
                "band"=>$r["band"], "mode"=>$r["mode"], "op"=>$r["op"]); 
        }
        if (!isset($slots)) {
            apologize("You haven't reserved any time slots yet!");
        } else {
            render("all_slots_template.php", array("title"=>"All Slots Assigned in Database",
                "slots"=>$slots, "call"=>$_SESSION["call"], "url"=>$_SERVER["REQUEST_URI"]));
        }
    }
?>
