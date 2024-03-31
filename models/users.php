<?php

/*
    Model za uporabnika. Vsebuje lastnosti, ki definirajo strukturo uporabnika in sovpadajo s stolpci v bazi.
    Nekatere metode so statične, ker niso vezane na posameznega uporabnika (find, authenticate, ...). Ob klicu teh ne potrebujemo instance objekta: User::find(...)
    Druge so nestatične, ker so vezane na posameznega uporabnika (update, ...). Ob klicu teh potrebujemo instanco objekta: $user->update(...)
*/

class User
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $article_count;
    public $comment_count;


    // Konstruktor
    public function __construct($id, $username, $email, $password, $article_count, $comment_count)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->article_count = $article_count;
        $this->comment_count = $comment_count;
    }

    // Metoda, ki vrne uporabnika z določenim ID-jem iz baze
    public static function find($id)
    {
        $db = Db::getInstance();
        $id = mysqli_real_escape_string($db, $id);
        $query = "SELECT * FROM users WHERE id = '$id';";
        $res = $db->query($query);
        if ($user = $res->fetch_object()) {
            $article_query = "SELECT COUNT(*) AS article_count FROM articles WHERE user_id = '$id';";
            $article_res = $db->query($article_query);
            $article_count = $article_res->fetch_object()->article_count;
    
            $comment_query = "SELECT COUNT(*) AS comment_count FROM comments WHERE user_id = '$id';";
            $comment_res = $db->query($comment_query);
            $comment_count = $comment_res->fetch_object()->comment_count;
    
            return new User($user->id, $user->username, $user->email, $user->password, $article_count, $comment_count);
        }
        return null;
    }

    // Metoda, ki preveri ustreznost podanega uporabniškega imena in gesla
    public static function authenticate($username, $password){
        $db = Db::getInstance();
        $username = mysqli_real_escape_string($db, $username);
        $query = "SELECT * FROM users WHERE username='$username'";
        $res = $db->query($query);
        $user_obj = $res->fetch_object();
        if($user_obj && password_verify($password, $user_obj->password)){
            return $user_obj->id;
        }
            return -1;
    }

    // Metoda, ki vstavi uporabnika v bazo v tabelo users
    public static function create($username, $email, $password){
        $db = Db::getInstance();
        $username = mysqli_real_escape_string($db, $username);
        $email = mysqli_real_escape_string($db, $email);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pass');";
        if($db->query($query)){
            return true;
        }
        else{
            return false;
        } 
    }

    public static function update_password($password){
        $db = Db::getInstance();
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password ='$pass';";
        if($db->query($query)){
            return true;
        }
        else{
            return false;
        } 
    }

    // Metoda, ki preveri razpoložljivost uporabniškega imena
    public static function is_available($username){
        $db = Db::getInstance();
        $username = mysqli_real_escape_string($db, $username);
        $query = "SELECT * FROM users WHERE username='$username'";
        $res = $db->query($query);
        return mysqli_num_rows($res) > 0;
    }

    // Metoda, ki posodobi uporabniko ime in e-mail od trenutnega uporabnika v bazi
    public function update($username, $email){
        $db = Db::getInstance();
        $username = mysqli_real_escape_string($db, $username);
        $email = mysqli_real_escape_string($db, $email);
        $id = $this->id;
        $query = "UPDATE users SET username='$username', email='$email' WHERE id=$id LIMIT 1;";
        if($db->query($query)){
            return true;
        }
        else{
            return false;
        } 
    }
}
