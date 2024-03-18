<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prosit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 2em;
        }
        form {
            border: 0.2em solid #ccc;
            padding: 2em;
            background-color: #f9f9f9;
        }
        .form-label {
            color: #333;
        }
    </style>
</head>
<body>
    <center><h1>F1 table</h1></center>
    <br>
    <form action="" method="post" class="row g-3" id="mon-formulaire">
        <div class="col-md-6">
            <label for="NoGP" class="form-label">NoGP</label>
            <input type="number" name="NoGP" class="form-control" id="NoGP" required>
        </div>
        <div class="col-md-6">
            <label for="NoGP" class="form-label">NomPil</label>
            <input type="number" class="form-control" id="NomPil" required>
        </div>

        <div class="col-md-6">
            <label for="NomGP" class="form-label">NomGP</label>
            <input type="text" name="NomGP" class="form-control" id="NomGP" required>
        </div>

        <div class="col-md-6">
            <label for="DateGP" class="form-label">DateGP</label>
            <input type="date" name="DateGP" class="form-control" id="DateGP" required>
        </div>

        <div class="col-md-6">
            <label for="LieuCirc" class="form-label">LieuCirc</label>
            <input type="text" name="LieuCirc" class="form-control" id="LieuCirc" required>
        </div>

        <div class="col-md-6">
            <label for="NoPil" class="form-label">NoPil</label>
            <input type="number" name="NoPil" class="form-control" id="NoPil" required>
        </div>

        <div class="col-md-6">
            <label for="NatPil" class="form-label">NatPil</label>
            <input type="number" name="NatPil" class="form-control" id="NatPil" required>
        </div>

        <div class="col-md-6">
            <label for="RecTour" class="form-label">RecTour</label>
            <input type="text" name="RecTour" class="form-control" id="RecTour" required>
        </div>

        <div class="col-md-6">
            <label for="Place" class="form-label">Place</label>
            <input type="number" name="Place" class="form-control" id="Place" required>
        </div>

        <div class="col-md-6">
            <label for="PtObt" class="form-label">PtObt</label>
            <input type="number" name="PtObt" class="form-control" id="PtObt" required>
        </div>

        <div class="col-md-6">
            <label for="NoTV" class="form-label">NoTV</label>
            <input type="number" name="NoTV" class="form-control" id="NoTV" required>
        </div>

        <div class="col-md-6">
            <label for="NomTV" class="form-label">NomTV</label>
            <input type="text" name="NomTV" class="form-control" id="NomTV" required>
        </div>

        <div class="col-md-6">
            <label for="Moteur" class="form-label">Moteur</label>
            <input type="text" name="Moteur" class="form-control" id="Moteur" required>
        </div>

        <div class="col-12">
            <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="submit" class="btn btn-primary">afficher</button>
            <button type="submit" name="effacer" class="btn btn-primary">Effacer</button>            
            <button type="submit" class="btn btn-primary">Reinitialiser</button>
        </div>
    </form>
    <script>
        async function ajouterDonnees(donnees) {
            const response = await fetch('ajax/ajouter.php', {
                method: 'POST',
                body: donnees
            });

            const result = await response.json();

            if (response.ok) {
            } else {
            }
        }

        async function modifierDonnees(donnees) {
            const response = await fetch('ajax/modifier.php', {
                method: 'POST',
                body: donnees
            });

            const result = await response.json();

            if (response.ok) {
            } else {
            }
        }

        async function afficherDonnees() {
            const response = await fetch('ajax/afficher.php');
            const result = await response.json();

            if (response.ok) {
            } else {
            }
        }

        async function effacerDonnees(id) {
            const response = await fetch('ajax/effacer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: id})
            });

            const result = await response.json();

            if (response.ok) {
            } else {
            }
        }

        document.querySelector('button[name="ajouter"]').addEventListener('click', async function(e) {
            e.preventDefault();

            const formData = new FormData(document.getElementById('mon-formulaire'));

            await ajouterDonnees(formData);
        });

        document.querySelector('#modif').addEventListener('click', async function(e) {
            e.preventDefault();

            const formData = new FormData(document.getElementById('mon-formulaire'));

            await modifierDonnees(formData);
        });

        document.querySelector('#affi').addEventListener('click', async function(e) {
            e.preventDefault();

            await afficherDonnees();
        });

        document.querySelector('button[name="effacer"]').addEventListener('click', async function(e) {
            e.preventDefault();

            const id = 1;

            await effacerDonnees();
        });

        document.querySelector('button[type="submit"]:last-child').addEventListener('click', function(e) {
            e.preventDefault();

            document.getElementById('mon-formulaire').reset();
        });
    </script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $NoGP = $_POST['NoGP'];
    $NomPil = $_POST['NomPil'];
    $NomGP = $_POST['NomGP'];
    $DateGP = $_POST['DateGP'];
    $LieuCirc = $_POST['LieuCirc'];
    $NoPil = $_POST['NoPil'];
    $NatPil = $_POST['NatPil'];
    $RecTour = $_POST['RecTour'];

    $Place = $_POST['Place'];
    $PtObt = $_POST['PtObt'];

    $NoTV = $_POST['NoTV'];
    $NomTV = $_POST['NomTV'];
    $Moteur = $_POST['Moteur'];

    $stmt_grandprix = $conn->prepare("INSERT INTO grandprix (NoGP, NomGP, DateGP, LieuCirc, NoPil, RecTour) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_grandprix->bind_param("isssis", $NoGP, $NomGP, $DateGP, $LieuCirc, $NoPil, $RecTour);

    $stmt_resultats = $conn->prepare("INSERT INTO resultats (NoGP, NoPil, Place, PtObt) VALUES (?, ?, ?, ?)");
    $stmt_resultats->bind_param("iiii", $NoGP, $NoPil, $Place, $PtObt);

    $stmt_typevoiture = $conn->prepare("INSERT INTO typevoiture (NoTV, NomTV, Moteur) VALUES (?, ?, ?)");
    $stmt_typevoiture->bind_param("iss", $NoTV, $NomTV, $Moteur);

    if ($stmt_grandprix->execute() && $stmt_resultats->execute() && $stmt_typevoiture->execute()) {
        echo "TT est bon!!";
    } else {
        echo "WW??? : " . $conn->error;
    }

    $stmt_grandprix->close();
    $stmt_resultats->close();
    $stmt_typevoiture->close();
}

$conn->close();

?>