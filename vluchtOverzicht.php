<?php
 require ('DBFly.php');
$query = "SELECT * FROM vluchten";
$stm = $conn->prepare($query);
$stm->execute();

$vliegtuig = $stm->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>vliegtuig overzicht</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
    <div id="overzicht">
        <!-- formulier voor het zoeken -->
    <form method="POST">
        <input type="submit"  name="btnHome" value="HOME" class="btnHome"/></br>
        <input type="radio" value="vertrokken"  name="radioStatus"/>:vertrokken vliegtuigen </br>
        <input type="radio" value="alle vliegtuigen" name="radioStatus"/>:alle vliegtuigen</br>
        <input type="submit" name="btnZoek" value="ZOEK" class="btnHome"/>
    </form>
<?php
// zoeken van active of alle vliegtuigen
if(isset($_POST['btnZoek']) && $_POST['radioStatus'] == 'vertrokken'){
    $vertrokken=$_POST['radioStatus'];
    
    $query="SELECT * FROM vluchten WHERE status = '$vertrokken'";
    $stm = $conn->prepare($query);
    $stm->execute();
    $vliegtuig=$stm->fetchAll(PDO::FETCH_OBJ);

} else if (isset($_POST['btnZoek']) && isset($_POST['alle vliegtuigen'])) {
    $query="SELECT * FROM vluchten";
    $stm = $conn->prepare($query);
    $stm->execute();
    $vliegtuig=$stm->fetchAll(PDO::FETCH_OBJ);
}
?> 
</div> 
<div id="tbOverzicht">
    <!-- begin van de tabel -->
    <table>
    <tr>
        <th>type</th>
        <th>vliegtuig maatschapij</th>
        <th>status</th>
        <th>aanpassen</th>
        <th>verwijderen</th>
    </tr>
    <?php


// tabel de resultaten laten zien
        foreach($vliegtuig as $item){
            echo "<tr>";
            echo "<td>$item->Type</td>";
            echo "<td>$item->vliegmaatschappij</td>";
            echo "<td>$item->status</td>";
            echo "<td><a href='aanpassen.php?ID=$item->vliegtuigID'>aanpassen</a></td>";
            echo "<td><a href='verwijderen.php?ID=$item->vliegtuigID'>verwijderen</a></td>";
            echo "</tr>";
        }
        // naar home
        if(isset($_POST['btnHome'])){
            header('location:index.php');
        }
    ?>
    </table>
    </div>
</body>
</html>
