<?php
// Inclure la connexion à la base de données
include('connection.php');

// Créer une connexion
$connection = new Connection();
$connection->selectDatabase('pharmacie');

// Récupérer tous les médicaments
$query = "SELECT * FROM medicaments";
$result = mysqli_query($connection->conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Médicaments</title>
    <!-- Lien vers Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <h1 class="text-center mb-4">Liste des Médicaments</h1>
        
        <!-- Bouton Exporter CSV -->
        <a href="export_csv.php" class="btn btn-info mb-3">Exporter CSV</a>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['prix']; ?></td>
                    <td><?php echo $row['quantite']; ?></td>
                    <td>
                        <a href="edit_medicament.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="delete_medicament.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="add_medicament.php" class="btn btn-primary">Ajouter un Médicament</a>
    </div>
</body>

</html>
