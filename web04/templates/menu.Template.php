<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?controller=user">Stock-bar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li>
						<a href="index.php?controller=user&action=mesParties">Le stock</a>
					</li>
                    <li>
                        <a href="index.php?controller=user&action=partiesEnLigne">Les bières</a>
                    </li>
					<li>
					<li>
                        <a href="index.php?controller=user&action=monProfil">Mon profil</a>
					</li>
					
					<?php if(isset($_SESSION['role']) && ($_SESSION['role'])>1){
					echo(
					'<li>
						 <a href="index.php?controller=user&action=adminUser">Admin</a>
					</li>');
					}
					?>
					
					<li>
                        <a href="index.php?controller=user&action=disconnect">Se deconnecter</a>
					</li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>