<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Website designed by N2IW</title>
        <?php endif ?>

    </head>

    <body>

        <div class="container-fluid">

            <div id="nav" class="navigator">
                    <table>
                        <tr>
                            <td><a href="index.php">Home</a></td>
                            <?php if ( !isLogin() ): ?>
			        <td style="font-weight:bold;background-color:teal">
					<a href="#" style="color:white">Request Login</a>
					<!-- UPDATE WITH HOW YOU WANT TO CAPTURE REQUESTS -->
				</td>
                                <td><a href="login.php">Login</a></td>
                            <?php else :?>
                                <td style="background-color:black;text-align:center;">
					<a href="https://contests.arrl.org/votalogutility.php?p=votalog" style="color:white"><b>Upload Log</b>
					<br /><span style="font-size:10px">for W1AW/2 NY</span></a>
				</td>
                                <td><a href="my_slots.php">My Slots</a></td>
                                <td><a href="profile.php">My Profile</a></td>
                                <?php if (isAdmin()): ?>
                                    <td style="background-color:red;font-weight:bold"><a href="management.php" style="color:white">Management</a></td>
                                <?php endif ?>
                                <td style="font-weight:bold;text-align:center">
					<a href="logout.php">
					<span style="font-size:10px">Logged in as <?= $_SESSION["call"] ?></span><br />Logout</a>
				</td>
                            <?php endif ?>
                        </tr>
                    </table>
            </div>
            <div id="middle">
		<?php 
	 	// Second-tier links that do not need to be buttons
		?>
		<p> <a href="https://vota.arrl.org/w1awPortable.php">General Information</a> | <a href="#">Instructions for Activators (or prospective Activators)</a></p>
		    
		<?php 
	 	// Notification area... might be better calling as a require() to a different page to be edited somewhere else
		?>
		<p style="border:1px solid #000; background-color:#c0c0c0; width:400px;margin-left: auto; margin-right: auto;">Activators and Prospective Activators are invited to a <br>
		<strong>Q&A Session with NY Coordination Team</strong><br /> on Sunday, January 22, 2023 at 6PM local <br />
		<a href="https://us02web.zoom.us/meeting/register/tZAkc-2tqjsiHt3CUbOq-ZrkVNIU0kMHNSPw" style="font-weight:bold">Register for Zoom Meeting</a></p>
