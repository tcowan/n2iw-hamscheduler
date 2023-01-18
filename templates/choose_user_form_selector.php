<form action="<?= $url ?>" method="GET">
    <fieldset>
	<div class="control-group">
            <button type="submit" class="btn"><?= $action ?></button>
        </div>
        <div class="control-group">
	<select name="call">
	<?php 
	$result = query("SELECT `callsign` FROM `op` WHERE `id` > 0;");
	 for ($i = 0; $i < count($result); ++$i): ?>
          <option value="<?= $result[$i]['callsign'] ?>"><?= $result[$i]['callsign'] ?></option>
          <?php endfor ?>
        </div>
        
    </fieldset>
</form>
