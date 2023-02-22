<?php
$clubId = $_GET['clubId'];

// connect
$db=new PDO('mysql:host=172.31.22.43;dbname=Spencer1178551','Spencer1178551','ST3BJVqAAF');

$sql = "SELECT * FROM clubs WHERE clubId = :clubId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
$cmd->execute();
$club = $cmd->fetch();

if (empty($club)) {
    header('location:404.php');
    exit();
}

// store the values in local vars
$clubName = $club['clubName'];
$ground = $club['ground'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Club</title>
</head>
<body>
    <h1>Edit Club</h1>
    <form action="update-club.php" method="post">
            <fieldset>
                <label for="clubName">Club Name:</label>
                <textarea name="clubName" id="clubName" required><?php echo $clubName; ?></textarea>
            </fieldset>
            <fieldset>
                <label for="ground">Club Stadium:</label>
                <textarea name="ground" id="ground" required><?php echo $ground; ?></textarea>
            </fieldset>
            <button class="btnOffset">Update</button>
            <input name="clubId" id="clubId" value="<?php echo $clubId; ?>" type="hidden" />
        </form>
</body>
</html>