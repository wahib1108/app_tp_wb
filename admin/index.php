<?php
require_once('../01_connection.php');
require_once('../partials/header.php');
// *******************************

$erreur ="";

if(isset($_POST['soumis'])) {

        if( !empty($_POST['login']) && !empty($_POST['pwd']) ) {

                $login = trim(addslashes(htmlentities($_POST['login'])));
                $pass = md5(trim(addslashes(htmlentities($_POST['pwd']))));

                if($connect){

                        $res = mysqli_query($connect,"SELECT * FROM utilisateurs WHERE login = '$login' AND pass = '$pass' ");

                        if($res){

                                if(mysqli_num_rows($res) != 0 ) {

                                        $data = mysqli_fetch_assoc($res);
                                        session_start();
                                        $_SESSION['user'] = $data;
                                        header('location:02_select.php');

                                }else{

                                        $erreur = '<div style="color:red;"> Le champ login ou le mot de passe ne correspondent pas ! </div>';

                                }

                        }

                }

        }else{

                $erreur = '<div style="color:red;"> Champ login ou mot de passe vide ! </div>';

        }

}

?>

<br><br>

<div style="
        border:1px solid #8B4513;
        border-radius:10px;
        margin:auto;
        text-align:center;
        width:50%;
        padding:20px;
        ">


    <h1>Page d'authentification</h1><br>


    <form action="" autocomplete="on" method="POST">

        Login:          <input type="text"      name="login"    placeholder="login" >   <br><br>

        Mot de passe:   <input type="password"  name="pwd">     <br><br>

                       <button type="submit"    name="soumis"> Soumettre </button>   <br>

    </form>

</div>

