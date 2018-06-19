<?php
	error_reporting(0);
	if(isset($_POST['btn_submit'])){
		$data=$_POST['search_by'];
		if(!empty($data)) {
			
			//return response()->json(array('data'=>"Student with index number $student does not exist."));
			$json = json_decode(file_get_contents("http://45.33.4.164/admissions/search/$data"), true, JSON_PRETTY_PRINT);
			
			//print_r($json);
			//echo count($json);
			
			
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Takoradi Technical University - Admission Status </title>
	
	<!-- Bootstrap core CSS -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/bootstrap/dataTables/datatables.min.css">
	<link href="assets/css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container">
	<div class="py-5 text-center">
		<img class="d-block mx-auto mb-1" src="assets/bootstrap/img/logo.png" alt="" style="height: auto; width: 250px;">
		<h1 class="display-5 mb-0">Admission Status</h1>
	</div>
	

	<div class="row">
		<div class="col-md-12 order-md-1">
			<form class="needs-validation" method="post" action="index.php" novalidate>
					<div class="form-row">
						<div class="col-md-8 offset-md-1">
							<div class="input-group">
								<input type="text" class="form-control" name="search_by" placeholder="Search by Name, Admission Number,Program, Pin" required>
								<div class="invalid-feedback" style="width: 100%;">
									This Field is required.
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<button type="submit" name="btn_submit" class="btn btn-primary">Search</button>
						</div>
					</div>
			</form>
		</div>
	</div>
	
	<?php if(isset($_POST['btn_submit'])){ ?>
	<div class="row">
	
		<div class="col-md-12 mt-2">
			<hr>
			<table id="listTable" class="table table-responsive-md table-hover table-bordered" width="100%" cellspacing="0">
				<thead>
				<th>No</th>
				<th>Name</th>
				<th>Admission Number</th>
				<th>Programme</th>
				<th>School Fees</th>
				<th>Hall</th>
				<th>Letter</th>
				</thead>
				<tbody>
				<?php
					$no;
					//$a[] = (array)$json;
					
					//print_r($a);
					foreach ($json as $i) {
						$no++;
						echo '<tr>';
						echo"<td>$no</td>";
						echo '<td>'.$i["application_number"].'</td>';
						echo'<td>'.$i["lastname"]." ".$i["firstname"] .'</td>';
						echo'<td>'.$i["programme"].'</td>';
						echo'<td> '.$i["fees"].'</td>';
						echo'<td>'.$i["hall"].'</td>';
						echo'<td><a href="http://admissions.ttuportal.com">Print Letter</a></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<?php } ?>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">&copy;<?php echo date("Y ")?>TPConnect</p>
		<p>Powered by: TPConnect</p>
	</footer>
</div>


<script src="assets/jquery-3.3.1.slim.min.js" ></script>
<script src="assets/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/holder.min.js"></script>
<script src="assets/bootstrap/dataTables/datatables.min.js"></script>
<script src="table..js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
