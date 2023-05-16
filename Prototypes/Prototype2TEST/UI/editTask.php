<?php


if (file_exists('./managers/GestionTask.php')) {
	include './managers/GestionTask.php';
} elseif (file_exists('../managers/GestionTask.php')) {
	include '../managers/GestionTask.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

$GestionTask= new GestionTask();

if(isset($_GET['Id_Task'])){
    $tasks = $GestionTask->RechercherParId($_GET['Id_Task']);
}
$id_projet = $_GET['Id_projet'];
if(isset($_POST['modifier'])){
    $id = $_POST['Id_Task'];
    $nom = $_POST['name'];
    $description = $_POST['description'];
    $GestionTask->Modifier($id,$nom,$description);
    header("Location:  tasks.php?id=".$id_projet);
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
  
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de task : <?=$tasks->getNom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id_Task"   
        value=<?php echo $tasks->getId()?> >

    <div class="input-group mb-3">
        <label for="Nom">Nom</label>
        <input type="text" required="required" class="form-control"
        id="Nom" name="name"  placeholder="Nom" 
        value=<?php echo $tasks->getNom()?> >
    </div>
  
    <div class="input-group mb-3">
        <label for="description">description</label>
        <input type="text" required="required"  class="form-control"
        id="description"  name="description" placeholder="description"
        value=<?php echo $tasks->getDescription()?>>
    </div>
    <div>
        <input class="btn btn-primary" name="modifier" type="submit" value="Modifier">
        <a  class="btn btn-info" href="tasks.php?id=<?php echo $id_projet ?>">Annuler</a>
    </div>
</form>
</body>
</html>