
<?php
// pakt de ID uit de url
    $vliegtuigID = $_GET['ID'];
// connect met de databse aan deze pagina
     require('DBFly.php');
     $query = "SELECT * from vluchten WHERE vliegtuigID=$vliegtuigID";
     $stm = $conn->prepare($query);
 if($stm->execute()){
     $item = $stm ->fetch(PDO::FETCH_OBJ);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>vliegtuigen info</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
<div id="vliegtuigen">
    <?php
echo "vliegtuig ID = $vliegtuigID";
?>
    <form method="POST">
        <!-- fourmulie voor vliegtuigen aan te passen -->
        <input type="submit" name="btnHome" value="OVERZICHT"/></br>
        type vliegtuig:<input type="text" name="txtType" value="<?php echo"$item->Type"; ?>"/><br/>
        vliegtuig maatschappij:<select name="vliegtuig">
                                    <option <?php if(isset($item)) if($item->vliegmaatschappij=="corendon")echo "selected ";?>value="corendon">CorenDon</option>
                                    <option <?php if(isset($item)) if($item->vliegmaatschappij=="KLM")echo "selected ";?>value="KLM">KLM</option>
                                    <option <?php if(isset($item)) if($item->vliegmaatschappij=="TUI")echo "selected ";?>value="TUI">TUI</option>
                                </select><br/>
        Status:<select name="Status">
                    <option <?php if(isset($item)) if($item->status=="klaar voor gebruik") echo "selected "; ?>value="klaar voor gebruik">klaar voor gebruik</option>
                    <option <?php if(isset($item)) if($item->status=="verlaat") echo "selected "; ?>value="verlaat">verlaat</option>
                    <option <?php if(isset($item)) if($item->status=="vertrokken") echo "selected "; ?>value="vertrokken">vertrokken</option>
                    <option <?php if(isset($item)) if($item->status=="cancelled") echo "selected "; ?>value="cancelled">cancelled</option>
                </select><br/>
        <input type="submit" name="btnSave" value="OPSLAAN"/>
    </form>
   
    
    <?php
    // code van de knop overzicht van vliegtuigen te gaan
    if(isset($_POST['btnHome'])){
        header('location:vluchtOverzicht.php');
    }
    // de wijzigingen van de vliegtuigen op te slaan in de database
    if(isset($_POST['btnSave'])){
        $Type= $_POST['txtType'];
        $maatschappij=$_POST['vliegtuig'];
        $status=$_POST['Status'];
        $query= "UPDATE vluchten SET Type='$Type', vliegmaatschappij='$maatschappij' , status='$status' WHERE vliegtuigID=$vliegtuigID";
        $stm = $conn->prepare($query);
        $stm->execute();
        echo "gelukt";
    }else   echo "mislukt";
       

    ?>
    </div>
</body>
</html>