<?php
require_once('../01_connection.php');
require_once('../partials/header.php');
// *******************************

    if($connect) {
        $sql = "SELECT * FROM chambre WHERE numChambre < 4"; // WHERE numChambre < 4
        $res = mysqli_query($connect,$sql);

        if(isset($_GET['numChambre'])) {
            $numChambre = (int)trim(htmlentities($_GET['numChambre'])) ;
            $sql2 = "SELECT * FROM chambre WHERE numChambre =" . $numChambre;
            $res2 = mysqli_query($connect,$sql2);

            if($res2) {
                $data = mysqli_fetch_assoc($res2);
                $confort1 = "";
                while( $ligne = mysqli_fetch_assoc($res) ) {
                    $confort1 = $ligne['confort'];
                }
            }
        }
    }

// --------------------------------------------------------

    if(isset($_POST['soumis'])  &&  !empty($_POST['prix'])  &&  !empty($_POST['nbLits'])  &&  !empty($_POST['nbPers']) ) {

        $prix = trim(htmlentities(addslashes($_POST['prix'])));
        $nbLits = trim(htmlentities(addslashes($_POST['nbLits'])));
        $nbPers = trim(htmlentities(addslashes($_POST['nbPers'])));

        $confort = $_POST['confort'];
        $image = $_FILES['image']['name'];

        $descr = trim(htmlentities(addslashes($_POST['descr'])));

        $destination = '../img/';
        move_uploaded_file(  $_FILES['image']['tmp_name'] , $destination . $_FILES['image']['name']  );

        
// Editer le confort
        $conf = "";
        if($_POST['confort'] == '0' ) {
            $conf = $data['confort'];
        }else{
            $conf = $confort;
        }

// Editer image
        // if($image == "") {
        //     $sql = "UPDATE chambre SET "
        // }

        if($res) {
            header('location:02_select.php');
        }else{
            echo 'Echec de modification';
        }



    }





?>

<!-- ---------------------------------HTML------------------------------- -->

<div>

    <h1>Modification d'une chambre</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <input type="text" name="prix" value="<?=$data['prix']; ?>" size="33"><br>

        <input type="text" name="nbLits" value="<?=$data['nbLits']; ?>" size="33"><br>

        <input type="text" name="nbPers" value="<?=$data['nbPers']; ?>" size="33"><br>

    <!-- -------------------------- -->
        <select name="confort">
            <option hidden value="0" > <?=$confort1; ?> </option>
            <?php
            $res = mysqli_query($connect,$sql);
            while($rows = mysqli_fetch_assoc($res)) {
            ?>

            <option value=" <?=$rows['confort']; ?> "> <?=$rows['confort']; ?> </option>
            
            <?php   
            }
            ?>
        </select><br>
    <!-- -------------------------- -->

        <input type="file" name="image"><br>
        <img src="../img/<?=$data['image']; ?>" width=100><br>

    <!-- -------------------------- -->

        <textarea name="descr" cols="30" rows="10"><?=$data['description']; ?></textarea><br>

    <!-- ---------------------------------------------------------------- -->
        <button type="submit" name="soumis">Modifier</button>
    <!-- ---------------------------------------------------------------- -->

    </form>

</div>