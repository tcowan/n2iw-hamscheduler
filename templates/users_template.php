<div class="table" id="my_slots">
<h1>All Users in Database</h1>
<table>
    <tr>
        <th>Callsign</th>
        <th>Name</th> 
        <th>Privilege</th>
        <th>Edit<br />Profile</th>
        <th>Edit<br />Slots</th>
	<th>Delete</th>
    </tr>
    <?php foreach ($data as $s): ?>
    <tr>
        <td><a href="http://www.qrz.com/db/<?= $s["call"]?>" style="font-weight:bold"><?= $s["call"]?></a></td>
        <td><?= $s["name"]?></td>
        <td><?php switch($s["priv"]) { case '1': echo 'Operator'; break; case 2: echo 'Admin'; break; } ?></td>
        <td><a href="/edit_user.php?call=<?= $s["call"]?>">Edit</a></td>
        <td><a href="/edit_user_slots.php?call=<?= $s["call"]?>">Edit</a></td>
        <td>-</td>
    </tr>
    <?php endforeach ?>
</table>
</div>
<script src='js/jquery-1.11.0.min.js'></script>
<script src="js/confirm.js" type="text/javascript" charset="utf-8"></script>
<br />


<a href="javascript:history.go(-1);">Back</a>

