<div class="container">
    <h3 class="mb-3">Urejanje</h3>
    <form action="/articles/update?id=<?php echo $article->id; ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title; ?>">
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Abstrakt</label>
            <input class="form-control" id="abstract" name="abstract" value="<?php echo $article->abstract; ?>">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input class="form-control" id="text" name="text" value="<?php echo $article->text; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="edit">Uredi</button>
        <label class="text-danger"><?php echo $error; ?></label>
    </form>
</div>