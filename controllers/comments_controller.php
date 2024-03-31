<?php
class comments_controller
{
    function store(){
        //Preveri če so vsi podatki izpolnjeni
        if(empty($_POST["content"])){
            header("Location: /?error=1&article_id=" . $_GET['article_id']);
        }
        //Podatki so pravilno izpolnjeni, registriraj uporabnika
        else if(Comment::create($_POST["content"],$_GET["article_id"])){
            header("Location: /");
        }
        //Prišlo je do napake pri registraciji
        else{
            header("Location: /?error=2&article_id=" . $_GET['article_id']);
        }
        die();
    }
}