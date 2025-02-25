<div class="table" id="my_slots">
<h1>All Claimed Timeslots</h1>
<table>
    <tr>
        <th>UTC Date</th>
        <th>UTC Time</th> 
        <th>Local Time</th>
        <th>Band</th>
        <th>Mode</th>
	<th>Callsign</th>
        <th>Action</th>
    </tr>
    <?php foreach ($slots as $s): 
		$c = query("SELECT callsign as c FROM `op` where id = ". $s["op"]);
		$s["op"] = $c[0]["c"]; ?>
    <tr>
        <?php
            //dump($s["time"][0]);
            $utc_time = DateTime::createFromFormat(
                        "Y-m-d Gi", $s["date"] . sprintf("%04d",$s["time"][0]), new DateTimeZone('UTC'));
            $utc_date_str = $utc_time->format("D n/j");
            $local_time = $utc_time;
            $local_time->setTimeZone(new DateTimeZone(TIMEZONE));
            $local_time_str = $local_time->format("D n/j -\ng a");

            $utc_time = DateTime::createFromFormat(
                "Y-m-d Gi", $s["date"] . sprintf("%04d",$s["time"][1]), 
                new DateTimeZone('UTC'));
            $local_time = $utc_time;
            $local_time->setTimeZone(new DateTimeZone(TIMEZONE));
            $local_time_str .= $local_time->format(' - g a');
        ?>
        <td><?= $utc_date_str?></td>
        <td class="time"><?php printf("%04d-%04d",$s["time"][0],
            $s["time"][1] == 2400 ? 0 : $s["time"][1]); ?></td>
        <td class="time"><?= $local_time_str?></td>
        <td><?= $s["band"]?></td>
        <td><?= $s["mode"]?></td>
        <td><?= $s["op"]?></td>
        <td class="<?= $call == $_SESSION["call"] ? "my_slot" : "others_slot"?>"><form action="reserve.php" method="POST">
                <input type="hidden" name="id" value="<?= $s["id"] ?>">
                <input type="hidden" name="op" value="0">
                <input type="hidden" name="url" value="<?= $url?>">
                <input type="submit" value="Cancel">
        </form></td>
    </tr>
    <?php endforeach ?>
</table>
</div>
<script src='js/jquery-1.11.0.min.js'></script>
<script src="js/confirm.js" type="text/javascript" charset="utf-8"></script>
<br />


<a href="javascript:history.go(-1);">Back</a>

