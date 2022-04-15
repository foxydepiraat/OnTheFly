<!DOCTYPE html>
<html>
    <head>
        <Title>Navbar</Title>
        <link rel="stylesheet" href="vluchtStyle.css"/>
    </head>
    <body>
        <div id="tobbar">
        <form method="POST">

            <input type="submit" name="btnVinPl" value="VLIEGTUIGEN INVOEREN" class="btnNavbar"/>
            <input type="submit" name="btnOZ" value="OVERZICHT VLIEGTUIGEN" class="btnNavbar"/>
            <input type="submit" name="btnPlan" value="PLANNINGEN" class="btnNavbar"/>
            <input type="submit" name="btnPlanOverzicht" value="PLANNINGEN OVERZICHT" class="btnNavbar"/>
        </form>
        </div>
        <?PHP
            if(isset($_POST['btnOZ'])){
                header('location:vluchtOverzicht.php');
            }
            if(isset($_POST['btnVinPl'])){
                header('location:vliegtuigen.php');
            }
            if(isset($_POST['btnPlan'])){
                header('location:planningen.php');
            }
            if(isset($_POST['btnPlanOverzicht'])){
                header('location:planningOverzicht.php');
            }
        ?>
    </body>
</html>