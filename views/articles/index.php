<div class="container">
    <h3>Seznam novic</h3>
    <?php
    foreach ($articles as $article){
        ?>
        <div class="article">
            <h4><?php echo $article->title;?></h4>
            <p><?php echo $article->abstract;?></p>
            <p>Objavil: <a href="/users/show?id=<?php echo $article->user->id?>"><?php echo $article->user->username; ?></a></span>, <?php echo date_format(date_create($article->date), 'd. m. Y \ob H:i:s'); ?></p>
            <?php 
            foreach ($article->comments as $comment){
            ?>
            <div style="margin-left: 50px;">
                <h6><?php echo $comment->content;?></h6>
                <p>Objavil: <a href="/users/show?id=<?php echo $comment->user->id?>"><?php echo $comment->user->username; ?></a></span>, <?php echo date_format(date_create($comment->date), 'd. m. Y \ob H:i:s'); ?></p>
            </div>
            <?php
            }
            if(isset($_SESSION["USER_ID"])){
            ?>
            <div class="container">
            <h3 class="mb-3">Komentiraj</h3>
            <form action="/comments/store?article_id=<?php echo $article->id; ?>" method="POST">
                <div class="mb-3">
                    <label for="content" class="form-label">Vsebina</label>
                    <input type="text" class="form-control" id="content" name="content">
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Pošlji</button>
                <?php if($article_error_id===$article->id){ ?>
                <label class="text-danger"><?php echo $error; ?></label>
                <?php } ?>
            </form>
            </div>
            <?php
            }
            ?>
            <a href="/articles/show?id=<?php echo $article->id;?>"><button>Preberi več</button></a>
        </div>
        <?php
    }
    ?>
</div>