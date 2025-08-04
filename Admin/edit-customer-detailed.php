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
		$eid = $_GET['editid'];
		$query = mysqli_query($con, "update  tblcustomers set Name='$Name',Email='$Email',Placa='$Placa',Ciudad='$Ciudad',MobileNumber='$MobileNumber',Gender='$Gender',Details='$Details' where ID='$eid' ");
		if ($query) {
			$msg = "Información de Cliente Actualizada Satisfactoriamente.";
		} else {
			$msg = "Algo salió mal. Inténtalo de nuevo.";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Editar Cliente</title>
		<script type="application/x-javascript">addEventListener("load", function() {
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
						<h3 class="title1">Editar Información de Cliente</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
							<div class="form-title">
								<h4>Actualizar Información de Cliente:</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<p style="font-size:16px; color:red" align="center"> 
										<?php if ($msg) {echo $msg;}?>
									</p>
									<?php
									$cid = $_GET['editid'];
									$ret = mysqli_query($con, "select * from  tblcustomers where ID='$cid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
										?>
										<div class="form-group"> <label for="exampleInputEmail1">Nombre de Cliente</label> <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $row['Nombre']; ?>" required="true"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="text" id="Email" name="Email" class="form-control" value="<?php echo $row['Email']; ?>" required="true"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Placa</label> <input type="text" id="Placa" name="Placa" class="form-control" value="<?php echo $row['Placa']; ?>" required="true"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Ciudad</label> <input type="text" id="Ciudad" name="Ciudad" class="form-control" value="<?php echo $row['Ciudad']; ?>" required="true"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">MobileNumber</label> <input type="text" id="MobileNumber" name="MobileNumber" class="form-control" value="<?php echo $row['Telefono']; ?>" required="true"> </div>
										<div class="form-group"> <label for="exampleInputEmail1">Género</label> <?php if ($row['Gender'] == "Male") { ?>
											<input type="radio" id="Gender" name="Gender" value="Male" checked="true">Hombre
											<input type="radio" name="Gender" value="Female">Mujer
											<input type="radio" name="Gender" value="Transgender">No definido
											<?php } ?>
											<?php if ($row['Gender'] == "Female") { ?><input type="radio" id="Gender" name="Gender" value="Male">Hombre
												<input type="radio" name="Gender" value="Female" checked="true">Mujer
												<input type="radio" name="Gender" value="Transgender">No definido
												<?php } else { ?>
												<input type="radio" id="Gender" name="Gender" value="Hombre">Hombre
												<input type="radio" name="Gender" value="Mujer">Mujer
												<input type="radio" name="Gender" value="No definido" checked="true">No definido
											<?php } ?>
											<div class="form-group"> <label for="exampleInputEmail1">Detalle</label> <textarea type="text" class="form-control" id="Details" name="Details" placeholder="Details" required="true" rows="12" cols="4">
												<?php echo $row['Details']; ?></textarea> 
											</div>
											<div class="form-group"> <label for="exampleInputPassword1">Fecha de Creación</label> <input type="text" id="" name="" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly='true'> </div><?php } ?>
											<button type="submit" name="submit" class="btn btn-default">Actualizar Información Cliente</button>
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