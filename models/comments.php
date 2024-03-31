<?php

/*
    Model za uporabnika. Vsebuje lastnosti, ki definirajo strukturo uporabnika in sovpadajo s stolpci v bazi.
    Nekatere metode so statične, ker niso vezane na posameznega uporabnika (find, authenticate, ...). Ob klicu teh ne potrebujemo instance objekta: User::find(...)
    Druge so nestatične, ker so vezane na posameznega uporabnika (update, ...). Ob klicu teh potrebujemo instanco objekta: $user->update(...)
*/

require_once 'users.php'; // Vključimo model za uporabnike

class Comment
{
    public $id;
    public $content;
    public $date;
    public $user;

    // Konstruktor
    public function __construct($id, $content, $date, $user_id)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->user = User::find($user_id); //naložimo podatke o uporabniku
    }

    // Metoda, ki vrne uporabnika z določenim ID-jem iz baze
    public static function find_all_comments($article_id)
    {
        $db = Db::getInstance();
        $id = mysqli_real_escape_string($db, $article_id);
        $query = "SELECT * FROM comments WHERE article_id = '$article_id';";
        $res = $db->query($query);
        $comments = [];
        while ($comment = $res->fetch_object()) {
            $comments[] = new Comment($comment->id, $comment->content, $comment->date, $comment->user_id);
        }
        return $comments;
    }

    public static function create($content, $article_id){
        $db = Db::getInstance();
        $content = mysqli_real_escape_string($db, $content);
        $query = "INSERT INTO comments (content, user_id, article_id) VALUES ('$content', '" . $_SESSION["USER_ID"] . "', '$article_id');";
        if($db->query($query)){
            return true;
        }
        else{
            return false;
        } 
    }
}
