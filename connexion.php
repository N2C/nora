<?php
/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 19/04/2017
 * Time: 21:19
 */


    if(isset($_POST['username'])|| isset($_POST['password'])){
        $bdd = new PDO('mysql:host=localhost;dbname=nora;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT COUNT(*) FROM users WHERE username = ? AND password = ?');
        $req->execute(array($_POST['username'], md5($_POST['password']) ));

        $nb = $req->fetchColumn();

        if($nb == 1){
            header('Location : /nora/index.php');
            exit();
        }
        else{
            $message = "Bad credentials";
        }


    }

include('design/templates/base.php');

?>


<div class="card card-teal" style="margin-left: 25%; margin-right: 25%; margin-top: 10%;">
    <h1 class="header">Connexion à Nora</h1>
    <form action="connexion.php" method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur"/><br />
        <input type="password" name="password" placeholder="Mot de passe"/><br />

        <input type="submit">
    </form>
</div>


