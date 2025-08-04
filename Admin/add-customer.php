<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Placa = $_POST['Placa'];
		$Ciudad = $_POST['Ciudad'];
		$MobileNumber = $_POST['MobileNumber'];
		$Gender = $_POST['Gender'];
		$Details = $_POST['Details'];
		$query = mysqli_query($con, "insert into  tblcustomers(Name,Email,Placa,Ciudad,MobileNumber,Gender,Details) 
		value('$Name','$Email','$Placa','$Ciudad','$MobileNumber','$Gender','$Details')");
		if ($query) {
			echo "<script>alert('Cliente agregado satisfactoriamente.');</script>";
			echo "<script>window.location.href = 'add-customer.php'</script>";
		} else {
			echo "<script>alert('Algo salió mal. Inténtalo de nuevo.');</script>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Agregar Servicio</title>
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
						<h3 class="title1">Agregar Cliente</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
							<div class="form-title">
								<h4>Agregar Cliente:</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
										echo $msg;}  ?> 
									</p>
									<div class="form-group"> <label for="exampleInputEmail1">Nombre</label> <input type="text" class="form-control" id="Name" name="Name" placeholder="Nombre de Cliente" value="" required="true"> </div>
									<div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="Email" id="Email" name="Email" class="form-control" placeholder="Correo" value="" required="true"> </div>
									<div class="form-group"> <label for="exampleInputPassword1">Placa</label> <input type="Placa" id="Placa" name="Placa" class="form-control" placeholder="Placa" value="" required="true"> </div>
									<div class="form-group"> <label for="exampleInputPassword1">Ciudad</label> <input type="Ciudad" id="Ciudad" name="Ciudad" class="form-control" placeholder="Ciudad" value="" required="true"> </div>
									<div class="form-group"> <label for="exampleInputEmail1">MobileNumber</label> <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Telefono" value="" required="true" maxlength="10" pattern="[0-9]+"> </div>
									<div class="radio">
										<p style="padding-top: 20px; font-size: 15px"> <strong>Género:</strong> 
											<label><input type="radio" name="Gender" id="Gender" value="Hombre" checked="true">Mujer</label>
											<label><input type="radio" name="Gender" id="Gender" value="Mujer">Hombre</label>
											<label><input type="radio" name="Gender" id="Gender" value="No definido">No definido</label>
										</p>
									</div>
									<div class="form-group"> <label for="exampleInputEmail1">Detalle Cliente o Servicio</label> <textarea type="text" class="form-control" id="details" name="details" placeholder="Detalle" required="true" rows="12" cols="4"></textarea> </div>
									<button type="submit" name="submit" class="btn btn-default">Agregar Cliente</button>
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
<?php } ?>