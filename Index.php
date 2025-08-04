<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inicio Sittran</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="Css/Styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="Index.php">SITTRAN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="Index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="Nosotros.php">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="Contacto.php">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="Vehiculos.php">Vehiculos</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="ServiciosRNA.php">Registro Unico Nacional Automotor</a></li>
                                <li><a class="dropdown-item" href="ServiciosRNC.php">Registro Unico Nacional Conductores</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Formatos</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="FormatosRNA.php">Formatos RNA</a></li>
                                <li><a class="dropdown-item" href="FormatosRNC.php">Formatos RNC</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">SITTRAN</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Desde 2016, Sittran ha sido el Sistema Integral
                                de Trámites de Tránsito y Transporte a Nivel Nacional que acompaña a los colombianos,
                                simplificando lo que antes era un proceso complejo y engorroso. Nacimos con la misión de ser tu aliado
                                estratégico, facilitando la gestión de todos tus trámites vehiculares y de conducción
                                ante las diversas autoridades del país.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="Nosotros.php">Nosotros</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="Contacto.php">Contacto</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5"
                            src="Img/transito.jpeg" alt="..." />
                    </div>
                </div>
            </div>
        </header>
    </main>
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"Nos dedicamos a simplificar los procesos de tránsito para nuestros 
                            clientes en todo el país, y eso se refleja en un ambiente de trabajo dinámico, 
                            colaborativo y lleno de oportunidades. Aquí, cada día es una oportunidad para aprender, 
                            crecer y marcar una diferencia real en la vida de las personas, ayudándolas a 
                            navegar el complejo mundo de los trámites de tránsito.!"</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="fw-bold">
                                JoanSneider GP.
                                <span class="fw-bold text-primary mx-1">/</span>
                                CEO, Sittran & Jarvis
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Jarvis V.1.0 &copy; Sittran 2025</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="pdf/PolíticasdePrivacidaddeSITTRANSAS.pdf">Politica de Privacidad</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="pdf/TérminosyCondicionesdelServicioSITTRANSAS.pdf">Terminos & Condiciones</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="Admin/index.php">Admin</a>
                </div>
            </div>
        </div>
    </footer>
    <?php
    include("Admin/includes/dbconnection.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>