<?php require 'templates/header.php'; ?>

<div class="col-sm-8">
    <div class="jumbotron">
        <form method="POST" action="?act=do-new-entry">
            <label>Название нового события</label>
            <input type="text" name="header" class="form-control" placeholder="Text input">
            <label>Описание нового события</label>
            <textarea name="content" class="form-control" rows="3"></textarea><br />
            <button class="btn btn-lg btn-primary" name="add" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php require 'templates/footer.php'; ?>