<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $clubName=$_POST['clubName'];
    $ground=$_POST['ground'];
    $ok=true;
    $clubId=$_POST['clubId'];
    

    if(empty($clubId)){
        echo '<p>Club Id is required</p>';
        $ok=false;
    }

    if(empty($clubName)){
        echo '<p>Club Name is required</p>';
        $ok=false;
    }

    if(empty($ground)){
        echo '<p>Club Stadium is required</p>';
        $ok=false;
    }

    if($ok){
        $db= new PDO('mysql:host=172.31.22.43;dbname=Spencer1178551','Spencer1178551','ST3BJVqAAF');
        $sql= "UPDATE clubs SET clubName=:clubName,ground=:ground WHERE clubId= :clubId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':clubName',$clubName,PDO::PARAM_STR,100);
        $cmd->bindParam(':ground',$ground,PDO::PARAM_STR,100);
        $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
        $cmd->execute();
        $db=null;
        echo "Club updated";
    }
    header('location:club-tabel.php');
    ?>
</body>
</html>