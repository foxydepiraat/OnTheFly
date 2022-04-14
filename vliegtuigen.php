<?php
 require ("DBFly.php");
?>
<!DOCTYPE html>
<html>
    <div id="img">
    <head>
        <title>vliegtuig</title>
        <link rel="stylesheet" href="vluchtStyle.css"/>
    </head>
    <body>
    
        <form method="POST">
        <div id="vliegtuigen">
        <input type="submit" name="btnHome" value="HOME" class="btnHome"/><br/>
        <?php
        // knop naar home
        if(isset($_POST['btnHome']))
        {
            header('location:index.php');
        }
        ?>
        <!-- formulier -->
            type vliegtuig:<input type="text" name="txtType"/><br/>
            vliegtuig maatschappij:<select name="vliegtuig">
                                        <option value="corendon">CorenDon</option>
                                        <option value="KLM">KLM</option>
                                        <option value="TUI">TUI</option>
                                    </select><br/>
            Status:<select name="selStatus">
                        <option value="klaar voor gebruik">klaar voor gebruik</option>
                        <option value="verlaat">verlaat</option>
                        <option value="vertrokken">vertrokken</option>
                        <option value="cancelled">cancelled</option>
                    </select><br/>
            <input type="submit" name="btnSave" value="OPSLAAN" class="btnHome"/>
            </div> 
        </form>
        
        <?php
        if(isset($_POST['btnSave']))
        {
            $type=$_POST['txtType'];
            $vliegMaat=$_POST['vliegtuig'];
            $status=$_POST['selStatus'];
            
            $query="INSERT INTO vluchten (Type, vliegmaatschappij, Status) VALUES('$type','$vliegMaat','$status')" ;
            $stm=$conn->prepare($query);
            if($stm->execute())
            {
                echo "gelukt";
            }else  echo "mislukt"; }


        ?>
    </body>
    </div>
</html>