<!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
          <div class="featurette" id="about">
            
            <h2 class="featurette-heading">Mon profil
            </h2>
			<?php  if(isset($_SESSION['login'])&&isset($_SESSION['password'])){

				echo "\n <br /> Nom : ".$_SESSION['nom'];
				echo "\n <br /> login : ".$_SESSION['login'];
				echo "\n <br /> E-mail : ".$_SESSION['email'];}

			?>		