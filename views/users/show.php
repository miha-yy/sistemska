<div class="container">
    <h3>Seznam mojih podatkov</h3>
    <div class="user">
        <h4><?php echo $user->username;?></h4>
        <p><?php echo $user->email; ?></p>
        <p>Objavil novic: <?php echo $user->article_count; ?></p>
        <p>Objavil komentarjev: <?php echo $user->comment_count; ?></p>
        <a href="/users/edit_password"><button>Spremeni geslo</button></a>
        <a href="/"><button>Nazaj</button></a>
    </div>
</div>