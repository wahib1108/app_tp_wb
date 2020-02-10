<?php
require_once('../01_connection.php');
require_once('../partials/header.php');
require_once(ROOT.'authentification/09_securite.php');
// *******************************

if($_SESSION['user']['role'] == 1 ) {

        if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pwd']) ) {

                $login = trim(addslashes(htmlentities($_POST['login'])));
                $pass = md5(trim(addslashes(htmlentities($_POST['pwd']))));
                $role = (int)trim(addslashes(htmlentities($_POST['role'])));

                if($connect) {

                        $sql = "INSERT INTO utilisateurs (login,pass,role) VALUES ('$login','$pass','$role')";
                        $res = mysqli_query($connect,$sql);

                        if($res) {

                                echo 'Inscription réussie';
                                header('location:index.php');
                        }else{
                                echo 'echec';
                        }
                }
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


        <h1>Page d'inscription</h1><br>


        <form action="" autocomplete="on" method="POST">

            Login:          <input type="text"      name="login"    placeholder="login" >   <br><br>

            Mot de passe:   <input type="password"  name="pwd">     <br><br>


            <p>Moderateur ou Admin</p><br>
            <select name="role">
                <option hidden>Choix</option>
                <option value="1">Administrateur</option>
                <option value="2">Moderateur</option>
            </select>



            <button type="submit"    name="soumis"> Inscrire </button>   <br>

        </form>

    </div>





