<?php
// connect met de databse aan deze pagina
 require('DBFly.php');
 // pakt de ID uit de url
 $ID=$_GET['ID'];
 $query="SELECT * FROM planningen WHERE vluchtID=$ID ";
 $stm=$conn->prepare($query);
 $stm->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>verwijderen Planningen</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
    <div id="verwijderen">
    <form method="POST">
        <!-- als je zeker weet als je het wilt verwijderen -->
        <input type="submit" name="btnYes" value="Ja ik weet het zeker" class="btnHome"/>
        <input type="submit" name="btnNo" value="Nee ik wil terug" class="btnHome"/>
    </form>
    <?php
    // ja knop van het  verwijderen van alle data van het ID in het ovezicht/Database
    if(isset($_POST['btnYes'])){
        $query="DELETE FROM Planningen WHERE vluchtID=$ID";
        $stm=$conn->prepare($query);
        if($stm->execute()){
            header('location:planningOverzicht.php');
        }
    }else if(isset($_POST['btnNo'])){
        header('location:planningOverzicht.php');
    }
    ?>
    </div>
</body>
</html>