<?php if(isset($_SESSION['login'])&&isset($_SESSION['password'])){

	echo "<h2>Bienvenue : ".$_SESSION['nom']."</h2>";}

		else{echo "Erreur, veuillez réessayer.";
		}		

?>
