<?php
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
        <input type="submit" name="btnOverzicht" value="OVERZICHT"  class="btnHome"/></br>
        naam van vliegtuig:<select name="type">
            <?php
                $query="SELECT * FROM vliuchten";
                $stm=$conn->prepare($query);
                $stm->execute();
                $type=$stm->fetchAll(PDO::FETCH_OBJ);
                foreach($type as $item){
                echo "<option value='$item->Type'>'$item->Type'</option";
                }   
            ?>

        </select>
    </br>
    </form>
      <form method="POST">  
        vertrek datum:<input type="date" name="verDate"/></br>
        aankomst datum:<input type="date" name="aanDate"/></br>
        bestemmingen:<input type="text" name="txtbestemming"/></br>
        Status:<select name="Status">
                    <option name="klaar voor gebruik">klaar voor gebruik</option>
                    <option name="verlaat">verlaat</option>
                    <option name="vertrokken">vertrokken</option>
                    <option name ="cancelled">cancelled</option>
                </select></br>
                <input type="submit" name="btnSave" value="Plannen" class="btnHome"/>

    </form>
    <?php
    if(isset($_POST['btnOverzicht'])){
        header('location:vluchtOverzicht.php');
    }
    if(isset($_POST['btnSave']))
        $type=$_POST['txtType'];
        $verDate=$_POST['verDate'];
        $aanDate=$_POST['aanDate'];
        $bestemming=$_POST['txtbestemming'];
        $status=$_POST['Status'];
        
        $query= "INSERT INTO planningen ('typeVlieg', 'DatumVetrek', 'DatumRetour', 'Bestemmingen', 'status')
            values('$type','$verDate','$aanDate','$bestemming',' $status')";
        $stm = $conn->prepare($query);
        $stm->execute();
    ?>
    </div>
</body>
</html>