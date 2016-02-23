<!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
           
		   <h2>Erreur : Veuillez réessayer !</h2>
		   
		<h2>Connexion</h2>
		<?php if(isset($error)): ?>
						<div class="alert alert-danger" role="alert"><?php echo $error ?></div>
					<?php endif ?>
					<form action="<?php echo Request::construireLien('anonymous', 'connected','') ?>" method="post">
					
					<input type="text" placeholder="Identifiant" class="input-control form-control" name="login">
					<input type="password" placeholder="Password" class="input-control form-control" name="password">
					<button id="btn-connexion" type="submit" class="btn btn-success">Se connecter</button>
					
					</form>
	   </div>

        <hr class="featurette-divider">
