<?php
require_once('../01_connection.php');
require_once('../partials/header.php');
// *******************************
    if($connect){
        $sql = "SELECT * FROM chambre WHERE numChambre < 4";
        $res = mysqli_query($connect,$sql);
   


    if(isset($_POST['soumis'])  &&  !empty($_POST['prix'])  &&  !empty($_POST['nbLits'])  &&  !empty($_POST['nbPers']) ) {

        $prix = trim(htmlentities(addslashes($_POST['prix'])));
        $nbLits = trim(htmlentities(addslashes($_POST['nbLits'])));
        $nbPers = trim(htmlentities(addslashes($_POST['nbPers'])));

        $confort = $_POST['confort'];
        $image = $_FILES['image']['name'];

        $descr = trim(htmlentities(addslashes($_POST['descr'])));
        $destination = '../img/';
        move_uploaded_file(  $_FILES['image']['tmp_name'] , $destination . $_FILES['image']['name']  );

        $sql = "INSERT INTO chambre(prix, nbLits, nbPers, confort, image, description) 
        VALUES ('$prix','$nbLits','$nbPers','$confort','$image','$descr')";

        $exe = mysqli_query($connect,$sql);

            if($exe) {
                header('location:02_select.php');
            }else{
                echo "Echec d'insertion";
            }
    }
}    


?>

<!-- ---------------------------------HTML------------------------------- -->

<div>

    <h1>Ajout d'une chambre</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <input type="text" name="prix" placeholder="Prix/chambre" size="33"><br>

        <input type="text" name="nbLits" placeholder="Nombre lit/chambre" size="33"><br>

        <input type="text" name="nbPers" placeholder="Nombre personne/chambre" size="33"><br>

    <!-- -------------------------- -->
        <select name="confort">
            <option hidden>Choisir le confort</option>
            <?php
            while($rows = mysqli_fetch_assoc($res)) {
            ?>
            <option value=" <?=$rows['confort']; ?> "> <?=$rows['confort']; ?> </option>
            <?php   
            }
            ?>
        </select><br>
    <!-- -------------------------- -->

        <input type="file" name="image"><br>

    <!-- -------------------------- -->

        <textarea name="descr" cols="30" rows="10" placeholder="Description de la chambre"></textarea><br>

    <!-- ---------------------------------------------------------------- -->
        <button type="submit" name="soumis">Valider</button>
    <!-- ---------------------------------------------------------------- -->

    </form>

</div>