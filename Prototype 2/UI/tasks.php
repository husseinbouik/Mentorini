<?php
include "../managers/GestionTask.php";
$id = $_GET['id'];
// Trouver tous les employés depuis la base de données 
$GestionTask = new GestionTask();
$tasks = $GestionTask->RechercherTous($id);
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

    <title>Gestion des employés</title>
</head>

<body>
    <div>
        <!-- <h2>les taches de projet </h2> -->
        <a class="btn btn-primary" href="./ajouteTask.php?id=<?php echo $id ?>">Ajouter un Task</a>
        <table class="table table-success table-striped table-hover" >
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($tasks as $task) {
            ?>
                <tr>
                    <td>
                        <?= $task->getNom() ?>
                    </td>
                    <td>
                        <?= $task->getDescription() ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="editTask.php?Id_Task=<?php echo $task->getId() ?>&Id_projet=<?php echo $id ?>">Éditer</a>
                        <a class="btn btn-danger" href="deletTask.php?Id_Task=<?php echo $task->getId() ?>&Id_projet=<?php echo $id ?>">delet</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a class="btn btn-info" href="../index.php">Annuler</a>
    </div>
</body>

</html>