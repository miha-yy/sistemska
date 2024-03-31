<div class="container">
    <h3 class="mb-3">Sprememba gesla</h3>
    <form action="/users/update_password" method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">Geslo</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"]: ""; ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Novo geslo</label>
            <input type="password" class="form-control" id="new_password" name="new_password">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Ponovi novo geslo</label>
            <input type="password" class="form-control" id="repeat_password" name="repeat_password">
        </div>
        <button type="submit" class="btn btn-primary" name="register">Shrani</button>
        <label class="text-danger"><?php echo $error; ?></label>
    </form>
</div>