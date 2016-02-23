<!-- Page Content -->
<div class="container">

<hr class="featurette-divider">


<!-- First Featurette -->


<h2 class="featurette-heading">Bienvenue sur la page d'administration
			</h2>
			  
		</div>

	
<hr class="featurette-divider">

		<!-- jQuery -->
		<script src="jquery/jquery.min.js"></script>
		<script src="jquery.cookie.min.js"></script>

		<!-- datable (sort columns, table pagination, ...) -->
		<!-- <link rel="stylesheet" href="assets/dataTables/media/css/jquery.dataTables.min.css"> -->
		<script src="dataTables/media/js/jquery.dataTables.min.js"></script> 
		<script src="dataTables/media/Bootstrap3/dataTables.bootstrap.min.js"></script> 
		<link rel="stylesheet" href="dataTables/media/Bootstrap3/dataTables.bootstrap.css">
		
		<script>
			$(document).ready(function(){
				$('#usersTable').DataTable();
				
				$('#usersTable').on( 'click', 'a[data-confirm]', function(evt) {
					var href = $(this).attr('data-href');
					var $modal = $('#confirm-delete');
					var modalText = $(this).attr('data-confirm');
					$modal.find('.modalText').text(modalText);
					$modal.find('.btn-ok').attr('href',href);
					$modal.modal({show:true});
					return false;
				});			
			});	
			</script>
		
