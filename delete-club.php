<?php
// read the selected taskId from the url param using $_GET
$clubId = $_GET['clubId'];

// connect
$db=new PDO('mysql:host=172.31.22.43;dbname=Spencer1178551','Spencer1178551','ST3BJVqAAF');

// set up the SQL DELETE
$sql = "DELETE FROM clubs WHERE clubId = :clubId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);

// run the delete
$cmd->execute();

// disconnect
$db = null;

// show confirmation / redirect
echo '<p>Club Deleted</p>
    <a href="club-tabel.php">See the Updated Club List</a>';

header('location:club-tabel.php');
?>