<?php
// connect met de databse aan deze pagina
require('DBFly.php');
// pakt de ID uit de url
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
        <!-- als je zeker weet als je het wilt verwijderen -->
        <input type="submit" name="btnNo" value="Nee ik wil terug" class="btnHome"/>
        <input type="submit" name="btnYes" value="JA ik weet het zeker" class="btnHome"/>
        
    </form>
    <?php
    // ja knop voor het verwijderen van alle data van de id in het overzicht/database
    if(isset($_POST['btnYes'])){
        $delete="DELETE FROM vluchten WHERE vliegtuigID= $ID";
        $stm=$conn->prepare($delete);
        if($stm->execute()){
            header('location:vluchtOverzicht.php');
        }
    // nee knop van het verwijderen van all dat van de id in het overzich/database
    }else if(isset($_POST['btnNo'])){
        header('location:vluchtOverzicht.php');
    }
    ?>
    </div>
</body>
</html>