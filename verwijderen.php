<?php
require('DBFly.php');
$ID=$_GET['ID'];
$query="SELECT * FROM vluchten WHERE vliegtuigID=$ID";
$stm=$conn->prepare($query);
$stm->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>verwijderen</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
    <div id="verwijderen">
    <form method="POST">
        <input type="submit" name="btnYes" value="JA ik weet het zeker" class="btnHome"/>
        <input type="submit" name="btnNo" value="Nee ik wil terug" class="btnHome"/>
    </form>
    <?php
    if(isset($_POST['btnYes'])){
        $delete="DELETE FROM vluchten WHERE vliegtuigID= $ID";
        $stm=$conn->prepare($delete);
        if($stm->execute()){
            header('location:vluchtOverzicht.php');
        }
                
    }else if(isset($_POST['btnNo'])){
        header('location:vluchtOverzicht.php');
    }
    ?>
    </div>
</body>
</html>