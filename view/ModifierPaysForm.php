<?php
require_once '../controller/GetSinglePaysController.php';

$paysController = new GetSinglePaysController();

if (isset($_GET['id'])) {
    $pays = $paysController->getSinglePays($_GET['id']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Africa Géo-Junior - Modifier</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/logo3.jpg" type="image/x-icon">

    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0 py-3">
            <div class="row gx-0" id="row_header">
                <div class="col-md-3">
                    <a href="../index.php"
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-start">
                        <h5 class="m-0 text-primary text-uppercase">Africa Géo-Junior</h5>
                    </a>
                </div>
                <div class="col-md-6">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                            <div class="navbar-nav py-0">
                                <a href="../index.php" class="nav-item nav-link active">Villes</a>
                                <a href="./listPays.php" class="nav-item nav-link active">Pays</a>
                                <a href="./statistiques.php" class="nav-item nav-link active">statistiques</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-end">
                    <a href="https://htmlcodex.com/hotel-html-template-pro"
                        class="btn btn-primary rounded-lg py-2  px-md-5 d-none d-lg-block">LOGIN
                        <i class="fa fa-arrow-right ms-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title text-center text-primary text-uppercase">Modifier</h6>
                        <h1 class="mb-5"><span class="text-primary text-uppercase mx-1">L'</span>Pays</h1>
                    </div>
                    <form action="../controller/ModifierPays.php" method="POST" class="wow fadeInUp"
                        data-wow-delay="0.2s">
                        <input type="text" hidden value="<?= $pays['paysId'] ?>" name="id_pays" class="form-control">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" value="<?= $pays['paysName'] ?>" name="pays_nom" class="form-control"
                                    placeholder="Nom du Pays" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" value="<?= $pays['population_Number'] ?>" name="pays_population"
                                    class="form-control" placeholder="Population" required>
                            </div>
                            <div class="col-md-12">
                                <select name="pays_continent" class="form-select" required>
                                    <option value="" disabled selected>Continent</option>
                                    <?php if ($pays['continent_id'] == 1): ?>
                                        <option value="1" selected>Africa</option>
                                        <option value="2">Europe</option>
                                    <?php else: ?>
                                        <option value="1">Africa</option>
                                        <option value="2" selected>Europe</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <select name="pays_langues" class="form-select" required>
                                    <option value="" disabled selected>Langues</option>
                                    <?php if ($pays['language'] == 'français'): ?>
                                        <option value="français" selected> Français</option>
                                    <?php else: ?>
                                        <option value="français"> Français</option>
                                    <?php endif; ?>

                                    <?php if ($pays['language'] == 'anglais'): ?>
                                        <option value="anglais" selected>Anglais</option>
                                    <?php else: ?>
                                        <option value="anglais">Anglais</option>
                                    <?php endif; ?>

                                    <?php if ($pays['language'] == 'espagnol'): ?>
                                        <option value="espagnol" selected> Espagnol</option>
                                    <?php else: ?>
                                        <option value="espagnol"> Espagnol</option>
                                    <?php endif; ?>

                                    <?php if ($pays['language'] == 'allemand'): ?>
                                        <option value="allemand" selected> Allemand</option>
                                    <?php else: ?>
                                        <option value="allemand"> Allemand</option>
                                    <?php endif; ?>

                                    <?php if ($pays['language'] == 'Arabe'): ?>
                                        <option value="Arabe" selected> Arabe</option>
                                    <?php else: ?>
                                        <option value="Arabe"> Arabe</option>
                                    <?php endif; ?>

                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" value="<?= $pays['image'] ?>" name="image" class="form-control"
                                    placeholder="Url de pays">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary rounded py-2 px-5">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Room End -->


        <!-- Footer Start -->
        <footer class="bg-dark py-3">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Africa Géo-Junior.
                            </a>, All Right Reserved Designed By <a class="border-bottom"
                                href="https://htmlcodex.com">Rabeh Abderrahmane</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="../index.php">Ville</a>
                                <a href="./listPays.php">Pays</a>
                                <a href="./statistiques.php">Statistiques</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
    </div>

    <script src="assets/js/main.js"></script>
</body>

</html>