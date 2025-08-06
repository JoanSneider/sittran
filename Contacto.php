<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Admin/includes/dbconnection.php');
$msg = '';
if (isset($_SESSION['message_type']) && isset($_SESSION['message_text'])) {
    $msg = '<div class="alert alert-' . $_SESSION['message_type'] . ' alert-dismissible fade show" role="alert">' . $_SESSION['message_text'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

    unset($_SESSION['message_type']);
    unset($_SESSION['message_text']);
}

if (isset($_POST['submit'])) {

    $Name = trim($_POST['Name']);
    $Email = trim($_POST['Email']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $Services = trim($_POST['Services']);
    $errors = [];

    if (empty($Name)) {
        $errors[] = 'El Nombre Completo es obligatorio.';
    }
    if (empty($Email)) {
        $errors[] = 'El Email es obligatorio.';
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El Email no es válido.';
    }
    if (empty($PhoneNumber)) {
        $errors[] = 'El Teléfono es obligatorio.';
    }
    if (empty($Services)) {
        $errors[] = 'El Servicio es obligatorio.';
    }


    if (!empty($errors)) {
        $_SESSION['message_type'] = 'danger';
        $_SESSION['message_text'] = 'Por favor, corrige los siguientes errores:<br>' . implode('<br>', $errors);
        header('Location: Contacto.php');
        exit();
    }
    
    $aptnumber = mt_rand(100000000, 999999999);
    $stmt = mysqli_prepare($con, "INSERT INTO tblappointment(AptNumber, Name, Email, PhoneNumber, Services) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "issss", $aptnumber, $Name, $Email, $PhoneNumber, $Services);
        if (mysqli_stmt_execute($stmt)) {
            $ret = mysqli_query($con, "SELECT AptNumber FROM tblappointment WHERE Email='$Email' AND PhoneNumber='$PhoneNumber'");
            $result = mysqli_fetch_array($ret);
            $_SESSION['aptno'] = $result['AptNumber'];
            $_SESSION['message_type'] = 'success';
            $_SESSION['message_text'] = '¡Cita agendada exitosamente! Tu número de cita es: <strong>' . $_SESSION['aptno'] . '</strong>.';
            header('Location: Contacto.php');
            exit();
        } else {
            $_SESSION['message_type'] = 'danger';
            $_SESSION['message_text'] = 'Error al agendar la cita: ' . mysqli_error($con);
            header('Location: Contacto.php');
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message_type'] = 'danger';
        $_SESSION['message_text'] = 'Error interno del servidor al preparar la consulta: ' . mysqli_error($con);
        header('Location: Contacto.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Contacto</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="Css/Styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="Index.php">SITTRAN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="Index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="Nosotros.php">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="Contacto.php">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="Vehiculos.php">Vehiculos</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="ServiciosRNA.php">Registro Unico Nacional Automotor</a></li>
                                <li><a class="dropdown-item" href="ServiciosRNC.php">Registro Unico Nacional Conductores</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formatos</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="FormatosRNA.php">RNA</a></li>
                                <li><a class="dropdown-item" href="FormatosRNC.php">RNC</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-5">
            <div class="container px-5">
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder">Reserve aquí su Servicio</h1>
                        <p class="lead fw-normal text-muted mb-0">Nos encantaría saber cómo ayudarle</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <?php if ($msg != '') {
                                echo $msg;
                            } ?>

                            <form id="contactoForm" method="POST" action="">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="Name" name="Name" type="text" placeholder="Tu nombre completo" data-sb-validations="required" />
                                    <label for="Name">Nombre Completo</label>
                                    <div class="invalid-feedback" data-sb-feedback="El Nombre es Requerido">El Nombre es Requerido.</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="Email" name="Email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                    <label for="Email">Email</label>
                                    <div class="invalid-feedback" data-sb-feedback="Email:required">Se requiere un correo electrónico.</div>
                                    <div class="invalid-feedback" data-sb-feedback="Email:email">El correo electrónico no es válido.</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="PhoneNumber" name="PhoneNumber" type="text" placeholder="(123) 456-7890" data-sb-validations="required" />
                                    <label for="PhoneNumber">Teléfono</label>
                                    <div class="invalid-feedback" data-sb-feedback="PhoneNumber:required">Se requiere un número de teléfono.</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="Services" name="Services" type="text" placeholder="Tipo de Servicio" data-sb-validations="required" />
                                    <label for="Services">Servicio</label>
                                    <div class="invalid-feedback" data-sb-feedback="Services:required">Se requiere saber el tipo de Servicio.</div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" name="submit" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Jarvis V.1.0 &copy; Sittran 2025</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="pdf/PolíticasdePrivacidaddeSITTRANSAS.pdf">Política de Privacidad</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="pdf/TérminosyCondicionesdelServicioSITTRANSAS.pdf">Términos & Condiciones</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function myFuction() {
            window.location.href = "http://localhost/bpmsdb"
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>