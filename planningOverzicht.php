<?php
// connect met de databse aan deze pagina
require('DBFly.php');
$query= "SELECT * FROM planningen";
$stm=$conn->prepare($query);
$stm->execute();
$planning=$stm->fetchAll(PDO::FETCH_OBJ);
?>  	
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Planningen overzicht</title>
    <link rel="stylesheet" href="vluchtStyle.css"/>
</head>
<body>
<div id="planningenOverzicht">
    <form method="POST">
        <!-- home knop naar index.php -->
        <input type="submit" name="btnHome" value="HOME" class="btnHome"/></br>
        <!-- de rsultaat dat je wilt zoeken  -->
        vertrek datum<input type="date" name="ZoekDate"/></br>`
        <!-- knop die zoek op alle resultaten -->
        <input type="submit" name="btnAlle" value="ALLE RESULTATEN" class="btnHome"/>
        <!-- knop die zoek op de resultaat dat je invoert -->
        <input type="submit" name="btnZoek" value="ZOEKEN" class="btnHome"/>
    </form>
    <?php
    // knop code om naar de home pagina te gaan
    if(isset($_POST['btnHome'])){
        header('location:index.php');
    }
    ?>
    
    <!-- planningen overzicht -->
    <table>
        <tr>
            <th>vlucht ID</th>
            <th>Type vliegtuig</th>
            <th>vertrek Datum</th>
            <th>Retour Datum</th>
            <th>Bestemmingen</th>
            <th>Status</th>
            <th>wijzigen</th>
            <th>verwijderens</th>
        </tr>
        <?php
         if(isset($_POST['btnZoek'])){
            $ZoekDate=$_POST['ZoekDate'];

            $query ="SELECT * FROM planningen WHERE DatumVertrek='$ZoekDate'";
            $stm=$conn->prepare($query);
            $stm->execute();
            $plan=$stm->fetchAll(PDO::FETCH_OBJ);
                
                foreach($plan as $item){
                    echo "<tr>";
                    echo "<td>$item->vluchtID</td>";
                    echo "<td>$item->typeVlieg</td>";
                    echo "<td>$item->DatumVertrek</td>";
                    echo "<td>$item->DatumRetour</td>";
                    echo "<td>$item->Bestemming</td>";
                    echo "<td>$item->status</td>";
                    echo "<td><a href='wijzigenPlan.php?ID=$item->vluchtID'>wijzigen</a></td>";
                    echo "<td><a href='verwijderenPlan.php?ID=$item->vluchtID'>verwijderen</a></td>";
                    echo "</tr>";
                    
                }
            }else if(isset($_POST['btnAlle'])){
                        foreach($planning as $item){
                        echo "<tr>";
                        echo "<td>$item->vluchtID</td>";
                        echo "<td>$item->typeVlieg</td>";
                        echo "<td>$item->DatumVertrek</td>";
                        echo "<td>$item->DatumRetour</td>";
                        echo "<td>$item->Bestemming</td>";
                        echo "<td>$item->status</td>";
                        echo "<td><a href='wijzigenPlan.php?ID=$item->vluchtID'>wijzigen</a></td>";
                        echo "<td><a href='verwijderenPlan.php?ID=$item->vluchtID'>verwijderen</a></td>";
                        echo "</tr>";
                }
            }
    	
        ?>
        
    </table>
    </div>
</body>
</html