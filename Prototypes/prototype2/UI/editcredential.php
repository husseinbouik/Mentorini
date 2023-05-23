<?php
// if (file_exists('./managers/GestionCredentials.php')) {
// 	include './managers/GestionCredentials.php';
// } elseif (file_exists('../managers/GestionCredentials.php')) {
	include '../managers/GestionCredentials.php';
// } else {
// 	// Neither file exists, so handle the error here
// 	echo "Error: Project.php not found in either directory.";
// }

$gestionCredentials = new GestionCredentials();
$Credential_ID = $_GET['Credential_ID'];
// if (isset($_GET['Credential_ID'])) {
    $credential = $gestionCredentials->RechercherCredentialParCredentialId($Credential_ID);
    // $credential = $credentials[0]; // Assuming the query returns only one credential
// }
// echo "<pre>";
// var_dump($credential);
// echo "</pre>";
if (isset($_POST['modifier'])) {
    $id = $_POST['Credential_ID'];
    $degree = $_POST['degree'];
    $institution = $_POST['institution'];
    $year = $_POST['year'];
    $gestionCredentials->ModifierCredential($id, $degree, $institution, $year);
    header('Location: credentials.php?Id_Expert='.$credential->getExpertId());
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./style/file.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="assets/lab-sb-admin/dist/css/styles.css" rel="stylesheet" />
  <link href="assets/lab-sb-admin/dist/css/custom.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

  <title>Gestion des experts</title>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Mentorini</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>

            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
              </nav>
            </div>

            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

              </nav>
            </div>

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Hussein Bouik
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Credentials</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Credentials</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Gestion des Credentials
            </div>
            <div class="card-body">
              <div class="container">
              <h1>Modification of Credential: <?= $credential->getDegree() ?></h1>
              <form method="post" action="" class="needs-validation">
  <input type="hidden" required="required" name="Credential_ID" value="<?= $credential->getCredentialId() ?>">

  <div class="form-group">
    <label for="degree">Degree</label>
    <input type="text" required="required" id="degree" name="degree" placeholder="Degree"
      value="<?= $credential->getDegree() ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="institution">Institution</label>
    <input type="text" required="required" id="institution" name="institution" placeholder="Institution"
      value="<?= $credential->getInstitution() ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="year">Year</label>
    <input type="text" required="required" id="year" name="year" placeholder="Year"
      value="<?= $credential->getYear() ?>" class="form-control">
  </div>

  <div class="form-group">
    <input name="modifier" type="submit" value="Modify" class="btn btn-primary">
    <a href="credentials.php?Id_Expert=<?php echo $credential->getExpertId() ?>">Cancel</a>
  </div>
</form>
  </div>


            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="assets/lab-sb-admin/dist/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/lab-sb-admin/dist/assets/demo/chart-area-demo.js"></script>
  <script src="assets/lab-sb-admin/dist/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="assets/lab-sb-admin/dist/js/datatables-simple-demo.js"></script>
</body>

</html>
