<?php
			// database
			$host= "localhost";
			$dbname= "VluchtPlannen";
			$user= "root";
			$password= "";
			
			//checkt als hij kan verbinden met het database
			try{
				$conn = new PDO("mysql:host=$host;dbname=$dbname",$user, $password);
				}catch(PDOException $ex){
					echo "verbinding mislukt"."<br>";
                }               
?>