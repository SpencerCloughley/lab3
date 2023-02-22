<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Tabel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <h1>Club List</h1>
    <?php
    $db=new PDO('mysql:host=172.31.22.43;dbname=Spencer1178551','Spencer1178551','ST3BJVqAAF');
    $sql="SELECT * FROM clubs";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $clubs=$cmd->fetchAll();
    echo '<table><thead><th>Club Name</th><th>Club Stadium</th><th>Actions</th></thead>';
    foreach($clubs as $club){
        echo'<tr>
        <td>' . $club['clubName'] . '</td>
        <td>' . $club['ground'] . '</td>
        <td class="centre">
            <a href="edit-club.php?clubId=' . $club['clubId'] .'" title="Edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>           
            <a href="delete-club.php?clubId=' . $club['clubId'] . '"
                title="Delete" onclick="return confirmDelete();">
                    <i class="fa-solid fa-trash-can"></i>
            </a>
        </td>
        </tr>';
    }
    $db=null;
    ?>
</body>
</html>