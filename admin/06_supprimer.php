<?php
require_once('../01_connection.php');
require_once('../partials/header.php');

// *******************************

if($connect) {
    if(isset($_GET['numChambre'])) {
        $numChambre = (int)htmlentities(trim($_GET['numChambre'])) ;

        $req = "SELECT image FROM chambre WHERE numChambre = " . $numChambre;
        $result = mysqli_query($connect,$req);
        $data = mysqli_fetch_assoc($result);
        

        $sql = "DELETE FROM chambre WHERE numChambre = " . $numChambre ;
        $res = mysqli_query($connect,$sql);
        if($res) {
            unlink('../img/' . $data['image']);
            header('location:02_select.php');

        }else{
            echo "erreur lors de la suppression";
        }
        
    }

}