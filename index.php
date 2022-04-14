<!DOCTYPE html>
<html>
    <head>
        <Title>home</Title>
        <link rel="stylesheet" href="vluchtStyle.css"/>
    </head>
    <body>
        <div id="tobbar">
        <form method="POST">

            <input type="submit" name="btnVinPl" value="VLIEGTUIGEN INVOEREN" class="btnHome"/>
            <input type="submit" name="btnOZ" value="OVERZICHT" class="btnHome"/>
            <input type="submit" name="btnPlan" value="PLANNINGEN" class="btnHome"/>
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

        ?>
    </body>
</html>