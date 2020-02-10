<?php
require_once('../01_connection.php');
require_once('../partials/header.php');
// *******************************

// if(isset($_GET['numChambre']) AND isset($_GET['numClient'])) {
//     $idReservation = (int)$_GET['numChambre'];
//     $idClient = (int)$_GET['numClient'];
//     if($connect) {
//         $sql = "SELECT * FROM chambre WHERE numChambre = " . $idReservation;
//         $res = mysqli_query($connect,$sql);
//         if($res) {
//             $donnees = mysqli_fetch_assoc($res);
//         }
//     }
// }

if(isset($_GET['numChambre'])) {
    $numChambre = (int)$_GET['numChambre'];
    if($connect) {
        $sql = "SELECT * FROM chambre WHERE numChambre = " . $numChambre;
        $res = mysqli_query($connect,$sql);
        if($res) {
            $donnees = mysqli_fetch_assoc($res);
        }
    }
}

?>


<!-- Bouton retour -->
<div>
    <a href="02_select.php">
        <button class="button button4">Retour</button>
    </a> </td>
</div>

<div>
    <h1>Détail d'une chambre</h1><br>

    <div class="col-4">
        <img src="../img/<?=$donnees['image']; ?>" alt="image" class="img-thumbnail" style="width:500px;">
    </div>

    <table>

        <tr>
            <td><b>Prix:</b> <?=$donnees['prix']; ?></td>
        </tr>
        <tr>
            <td><b>Nombre Lit:</b><?=$donnees['nbLits']; ?></td>
        </tr>
        <tr>
            <td><b>Nombre personne:</b><?=$donnees['nbPers']; ?></td>
        </tr>
        <tr>
            <td><b>Confort:</b><?=$donnees['confort']; ?></td>
        </tr>
        <tr>
            <td><b>Description:</b><br><?=$donnees['description']; ?></td>
        </tr>
        
    </table>



</div>