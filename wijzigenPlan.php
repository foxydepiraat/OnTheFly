<?php
// connect mert de databse aan deze pagina
require('DBFly.php');
// pakt de ID uit de url
$ID=$_GET['ID'];
$query="SELECT * FROM planningen WHERE vluchtID=$ID";
$stm=$conn->prepare($query);
$stm->execute();
$item = $stm ->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wijzigen Planinngen</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
    <div id="wijzigPlan">
    <form method="POST">
        <!-- knop om terug naar de overzicht te gaan -->
        <input type="submit" name="btnOverzicht" value="OVERZICHT" class="btnHome"/></br>
        <!-- formulier om de planninng aan te passen -->
        naam van vliegtuig:<?php echo"$item->typeVlieg"; ?>
    </br>
        Vertrek Datum<Input type="date" name="VerDate" value="<?php echo"$item->DatumVertrek"; ?>" /></br>
        Retour datum<Input type="date" name="RetDate" value="<?php echo"$item->DatumRetour"; ?>"/> </br>
        bestemmingen:<select name="Bestemming">
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
                    <option <?php if(isset($item)) if($item->status=="klaar voor gebruik") echo "selected "; ?>value="klaar voor gebruik">klaar voor gebruik</option>
                    <option <?php if(isset($item)) if($item->status=="verlaat") echo "selected "; ?>value="verlaat">verlaat</option>
                    <option <?php if(isset($item)) if($item->status=="vertrokken") echo "selected "; ?>value="vertrokken">vertrokken</option>
                    <option <?php if(isset($item)) if($item->status=="cancelled") echo "selected "; ?>value="cancelled">cancelled</option>
                </select><br/>
                
                <!-- knop om de aanpassing op te slaan -->
        <input type="submit" name="btnSave" value="wijzigen" class="btnHome"/>
    </form>
    <?php
    // van de knop naar de overzicht te gaan
        if(isset($_POST['btnOverzicht'])){
            header('location:planningOverzicht.php');
        }
    // code van de knop wijzigen om de gevegens aan te passen
    if(isset($_POST['btnSave'])){
        $VerDate=$_POST['VerDate'];
        $RetDate=$_POST['RetDate'];
        $Bestemming=$_POST['Bestemming'];
        $status=$_POST['Status'];

        $query="UPDATE planningen SET DatumVertrek='$VerDate', DatumRetour='$RetDate',Bestemming='$Bestemming',status='$status' WHERE vluchtID=$ID";
        $stm=$conn->prepare($query);
        if($stm->execute()){
            echo "gelukt";
        }
    }
        ?>
    </div>
</body>
</html>