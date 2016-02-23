<!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
           
		<h2>Inscription</h2>
		<?php
		if(isset($inscErrorText))
		echo '<span class="error">' . $inscErrorText . '</span>';
		?>
			<form action="<?php echo Request::construireLien('user', 'validateInscription','') ?>" method="POST">
			<table>
			
				<tr>
					<th>Login* :</th>
					<td><input type="text" name="inscLogin"/></td>
				</tr>
				<tr>
					<th>Mot de passe* :</th>
					<td><input type="password" name="inscPassword"/></td>
				</tr>
				<tr>
					<th>Mail :</th>
					<td><input type="text" name="mail"/></td>
				</tr>
				<tr>
					<th>Pseudo :</th>
					<td><input type="text" name="nickname"/></td>
				</tr>
				<tr>
					<th />
					<td><input type="submit" value="Creer un compte !" /></td>
				</tr>
				
			</table>
		</form>
	   </div>

        <hr class="featurette-divider">
