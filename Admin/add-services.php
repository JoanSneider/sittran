<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$sername = $_POST['sername'];
		$cost = $_POST['cost'];
		$query = mysqli_query($con, "insert into  tblservices(ServiceName,Cost) value('$sername','$cost')");
		if ($query) {
			echo "<script>alert('Servicio ha sido agregado satisfactoriamente.');</script>";
			echo "<script>window.location.href = 'add-services.php'</script>";
			$msg = "";
		} else {
			echo "<script>alert('Algo salió mal. Inténtalo de nuevo.');</script>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Agregar Servicios</title>
		<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
		</script>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href="css/font-awesome.css" rel="stylesheet">
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>new WOW().init();</script>
		<script src="js/metisMenu.min.js"></script>
		<script src="js/custom.js"></script>
		<link href="css/custom.css" rel="stylesheet">
	</head>
	<body class="cbp-spmenu-push">
		<div class="main-content">
			<?php include_once('includes/sidebar.php'); ?>
			<?php include_once('includes/header.php'); ?>
			<div id="page-wrapper">
				<div class="main-page">
					<div class="forms">
						<h3 class="title1">Agregar Servicios</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
							<div class="form-title">
								<h4>Servicios Sittran</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<p style="font-size:16px; color:red" align="center"> 
										<?php if ($msg) {echo $msg;}  
										?> 
									</p>
									<div class="form-group"> 
										<label for="exampleInputEmail1">Servicio</label>
										<input type="text" class="form-control" id="ServiceName" name="ServiceName" placeholder="Servicio" value="" required="true"> 
									</div>
									<div class="form-group"> 
										<label for="exampleInputPassword1">Placa</label> 
										<input type="text" class="form-control" id="Placa" name="Placa" placeholder="Placa" value="Placa" required="true"> 
									</div>
									<div class="form-group"> 
										<label for="exampleInputPassword1">Ciudad</label>
										<input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad" value="Ciudad" required="true"> 
									</div>
									<div class="form-group"> 
										<label for="exampleInputPassword1">Costo</label> 
										<input type="text" id="cost" name="cost" class="form-control" placeholder="Costo" value="" required="true"> 
									</div>
									<button type="submit" name="submit" class="btn btn-default">Agregar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php include_once('includes/footer.php'); ?>
			</div>
			<script src="js/classie.js"></script>
			<script>
			var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;
			showLeftPush.onclick = function() {
				classie.toggle(this, 'active');
				classie.toggle(body, 'cbp-spmenu-push-toright');
				classie.toggle(menuLeft, 'cbp-spmenu-open');
				disableOther('showLeftPush');
			};
			function disableOther(button) {
				if (button !== 'showLeftPush') {
					classie.toggle(showLeftPush, 'disabled');
				}
			}
			</script>
			<script src="js/jquery.nicescroll.js"></script>
			<script src="js/scripts.js"></script>
			<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } 
?>