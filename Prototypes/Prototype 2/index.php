<?php
include "./managers/GestionProject.php";
// Trouver tous les employés depuis la base de données 
$GestionProject = new GestionProject();
$projects = $GestionProject->RechercherTous();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des employés</title>
</head>

<body>
    <div>
        <a class="btn btn-primary" href="./UI/Ajoute.php">Ajouter un project</a>
        <table class="table table-success table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($projects as $project) {
            ?>
                <tr>
                    <td>

                        <?= $project->getNom() ?>

                    </td>
                    <td>
                        <?= $project->getDescription() ?>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="./UI/edit.php?Id_Project=<?php echo $project->getId() ?>">Éditer</a>
                      <a  class="btn btn-warning" href="./UI/delet.php?Id_Project=<?php echo $project->getId() ?>">delet</a>
                        <a  class="btn btn-info" href="./UI/tasks.php?id=<?php echo $project->getId() ?>">
                            Tasks
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>