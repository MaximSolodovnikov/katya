<?php require 'templates/header.php'; ?>

<div class="col-sm-8">
    <h3><b>Добавление нового события</b></h3><br />
    <div class="jumbotron">
        <form method="POST" action="?act=do-new-entry" enctype="multipart/form-data">
            <label>Основное фото статьи:</label>
            <input type="file" name="main_photo" class="form-control">
            <label>Название нового события:</label>
            <input type="text" name="header" class="form-control" placeholder="Название события">
            <label>Дата события:</label>
            <input type="date" name="date" class="form-control" >
            <label>Описание нового события</label>
            <textarea name="content" class="form-control" rows="3" placeholder="Описание события"></textarea><br />
            <button class="btn btn-lg btn-primary" name="add" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php require 'templates/footer.php'; ?>