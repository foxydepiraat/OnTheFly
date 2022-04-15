<?php
// connect met de databse aan deze pagina
    require('DBFly.php');
    $query = "SELECT * from vluchten";
    $stm = $conn->prepare($query);
    if($stm->execute()){
        $vlieg = $stm->fetchAll(PDO::FETCH_OBJ);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Planningen</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body><div id="planningen">
    <form method="POST">
        <!-- home knop naar index.php -->
        <input type="submit" name="btnHome" value="HOME"  class="btnHome"/></br>
        <!-- hier wordt van de datbase de vliegtuigen in de select gezet die in de database vluchten heet -->
        naam van vliegtuig:<select name="Type">
            <?php
                $query="SELECT * FROM vluchten";
                $stm=$conn->prepare($query);
                $stm->execute();
                $type=$stm->fetchAll(PDO::FETCH_OBJ);
                foreach($type as $item){
                     echo "<option value='$item->Type'>$item->Type</option> ";
                }   
            ?>

        </select>
    </br>
    
    <!-- hier maak je een planning voor een vliegtuig van hierboven wordt opgehaald-->
        vertrek datum:<input type="date" name="verDate" /></br>
        retour datum:<input type="date" name="retDate"/></br>
        bestemmingen:<select name="bestemming">
            <option value="Japan">Japan</option>
            <option value="Duitsland">Duitsland</option>
            <option value="Engeland">Engeland</option>
            <option value="New York">New York</option>
            <option value="Florida">Florida</option>
            <option value="Las Vegas">Las Vegas</option>
            <option value="Frankrijk">Frankrijk</option>
            <option value="Spanje">Spanje</option>
        </select></br>
        Status:<select name="Status">
                    <option name="klaar voor gebruik">Klaar voor gebruik</option>
                    <option name="verlaat">verlaat</option>
                    <option name="vertrokken">vertrokken</option>
                    <option name ="cancelled">cancelled</option>
                </select></br>
                <input type="submit" name="btnSave" value="Plannen" class="btnHome"/>

    </form>
    <?php
    if(isset($_POST['btnHome'])){
        header('location:index.php');
    }
    // insert all info voor een planning aan te maken
    if(isset($_POST['btnSave'])){
        $type=$_POST['Type'];
        $verDate=$_POST['verDate'];
        $retDate=$_POST['retDate'];
        $bestemming=$_POST['bestemming'];
        $status=$_POST['Status'];
    
        $query= "INSERT INTO  `planningen`  (`typeVlieg`, `DatumVertrek`, `DatumRetour`, `Bestemming`, `status`) values('$type' , '$verDate' , '$retDate' , '$bestemming' , '$status' )";
        $stm = $conn->prepare($query);
        if($stm->execute()){
            echo "gelukt";
        }
    }
       ?>
            
        
    </div>
</body>
</html>