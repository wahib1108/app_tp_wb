<?php require_once('../07_config.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

/* ------------ Style header ------------ */
        .imgHeader {
        background-image: url(../img/ch2b.jpg);
        background-position: right bottom, left top;
        background-repeat: no-repeat, repeat;
        height:300px;
        }

        body {
        font-size: 28px;
        }

        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        }

        li {
        float: left;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        li a:hover {
        background-color: #111;
        }

        .accueil {
        background-color: #8B4513;
        }

/* ------------ Style Table ------------ */
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color:#f5f5f5;
        }

/* ------------ Button Actions ------------ */
        .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
        
        .button4 {background-color: #e7e7e7; color: black;} /* Gray */ 

/* ------------  ------------ */










/* ------------ FIN Style ------------ */
    </style>

</head>
<body>
        <div class="imgHeader">
        </div>

        <ul>
                <li><a class="accueil" href="<?php ROOT; ?>index.php">Accueil</a></li>
                <li><a href="#lien2">lien2</a></li>
                <li><a href="#lien3">lien3</a></li>
                <li style="float:right">
                        <a href="#lien4">
                                <?php
                                if(isset($_SESSION['user'])) {
                                        echo $_SESSION['user']['login'];
                                }else{
                                        echo 'Profil ?';
                                }
                                ?>
                                
                        </a>
                </li>
        </ul>
<!-- ------------------------------------------------------------------------ -->


