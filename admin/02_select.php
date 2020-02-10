<?php
require_once('../01_connection.php');
require_once('../partials/header.php');

// *******************************
if($connect) {
    $sql = "SELECT * FROM chambre";
    $res = mysqli_query($connect,$sql);
}

?>









<!-- ----------------- HTML ------------------------ -->
<p style="Float: right;">
    <a href="04_ajouter.php">
        <button class="button button4">Ajouter une chambre</button>
    </a>
</p>

<h3>Liste des chambres</h3>

<table>
    <thead>
        <tr>
            <th>numChambre</th>
            <th>prix</th>
            <th>nbLits</th>
            <th>nbPers</th>
            <th>confort</th>
            <th>image</th>
            <th style="text-align:center;" colspan="3">Action</th>
        </tr>
    </thead>

    <tbody>

    <?php
    if($res) 
    {
        while($rows = mysqli_fetch_assoc($res)) 
        {
            $sql = "SELECT * FROM reservation WHERE numChambre = " . $rows['numChambre'];
            $result = mysqli_query($connect,$sql);
            $ligne = mysqli_fetch_assoc($result);

    ?>

        <tr>
            <td><?=$rows['numChambre']; ?></td>
            <td><?=$rows['prix']; ?></td>
            <td><?=$rows['nbLits']; ?></td>
            <td><?=$rows['nbPers']; ?></td>
            <td><?=$rows['confort']; ?></td>
            <td> <img src="../img/<?=$rows['image']; ?>" alt="" width="100"></td>

            <!-- ------------------- -->
            <td> 
                <a href="03_detail.php?numChambre=<?=$rows['numChambre']; ?>">
                    <button class="button button4">Détails</button>
                </a>
            </td>

            <td> 
                <a href="05_editer.php?numChambre=<?=$rows['numChambre']; ?>">
                    <button class="button button4">Editer</button>
                </a>
            </td>

            <td> 
                <a 
                    onclick="return confirm('Êtes-vous sur de vouloir supprimer ?')"
                    href="06_supprimer.php?numChambre=<?=$rows['numChambre']; ?>">
                    <button class="button button4">Supprimer</button>
                </a>
            </td>

        </tr>


    <?php 
        }
    }
    ?>

    </tbody> 

</table>










