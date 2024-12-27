<?php
session_start();
require_once '../controller/ListPaysController.php';

if (isset($_GET['id'])) {
    $id_pays = $_GET['id'];

    $listpaysController = new ListPaysController();
    $paysVilles = $listpaysController->getSinglePaysVilles($id_pays);

    // foreach ($paysVilles as $item) {
    //     echo "<li>" . $item['name'] . " - Population: " . number_format($item['population_Number']) . "</li>";

    // }
}

// print_r($paysVilles);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Africa Géo-Junior</title>
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

                        <div class="navbar-collapse justify-content-center" id="navbarCollapse">
                            <div class="navbar-nav py-0" id="navbarCollapseNav">
                                <a href="../index.php" class="nav-item nav-link active">Villes</a>
                                <a href="./listPays.php" class="nav-item nav-link active">Pays</a>
                                <a href="./listPays.php" class="nav-item nav-link active">Continents</a>
                            </div>
                            <button type="button" class="navbar-toggler" id="togglecollapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-end">
                    <?php if (isset($_SESSION["UserName"])): ?>
                        <a href="../controller/LogoutController.php"
                            class="btn btn-primary rounded-lg py-1  px-md-3 d-none d-lg-block">
                            <i class="fa fa-user me-2"></i> <?= $_SESSION["UserName"] ?>
                        </a>
                    <?php else: ?>
                        <a href="../view/signin.php" class="btn btn-primary rounded-lg py-1  px-md-3 d-none d-lg-block">se
                            connecter
                            <i class="fa fa-arrow-right ms-3"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Room Start -->
        <div class="container">
            <div class="d-flex justify-content-between align-items-center wow fadeInUp my-5" data-wow-delay="0.1s">
                <div class="text-center">
                    <h2 class=""><span class="text-primary text-uppercase mx-1">Liste
                            des</span>Pays
                    </h2>
                </div>
                <div class="text-end">
                    <?php if (isset($_SESSION["UserRole"]) && $_SESSION["UserRole"] == 1): ?>
                        <a href="./AjoutePaysForm.php" class="btn btn-primary rounded py-2 px-4">Ajouter une nouvelle
                            Pays</a>
                    <?php else: ?>
                        <span></span>

                    <?php endif; ?>

                </div>

            </div>

            <!-- Room Start -->
            <?php if (isset($paysVilles) && !empty($paysVilles)): ?>
                <div class="my-5 p-4 border rounded bg-light">
                    <h3 class="text-primary">Pays: <?= htmlspecialchars($paysVilles[0]['paysName']) ?></h3>

                    <?php if (count($paysVilles) > 1): ?>
                        <ul class="list-group mt-3">
                            <?php foreach ($paysVilles as $ville): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <strong><?= htmlspecialchars($ville['name']) ?></strong><br>
                                        <?= htmlspecialchars($ville['vill_descreption']) ?>
                                    </span>
                                    <span class="badge bg-secondary">
                                        Population: <?= number_format($ville['population_Number']) ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-warning mt-3">Aucune ville disponible pour ce pays.</p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-warning mt-5">
                    Informations sur le pays non disponibles.
                </div>
            <?php endif; ?>


            <!-- Room End -->


            <!-- Footer Start -->
            <footer class="bg-dark py-3 mt-5">
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="#">Africa Géo-Junior.
                                </a>, All Right Reserved Designed By <a class="border-bottom"
                                    href="https://htmlcodex.com">CodeChogun</a>
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

        <script src="../assets/js/main.js"></script>
</body>

</html>