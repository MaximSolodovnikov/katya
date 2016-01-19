<?php require 'templates/header.php'; ?>

<div class="col-sm-8">
    <h3><b>Редактирование события</b></h3><br />
    <div class="jumbotron">
        <form method="POST" action="?act=apply-edit-entry" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Основное фото статьи:</label><br />
            <img width="380" height="270" src="<?php echo $row['main_photo'];?>" /><br /><br />
            <input type="file" name="main_photo" class="form-control" value="<?= $row['main_photo']; ?>">
            <label>Название нового события:</label>
            <input type="text" name="header" class="form-control" value="<?= $row['header']; ?>">
            <label>Дата события:</label>
            <input type="date" name="date" class="form-control" value="<?= $row['date']; ?>">
            <label>Описание нового события</label>
            <textarea name="content" class="form-control" rows="3" ><?= $row['content']; ?></textarea><br />
            <button class="btn btn-lg btn-primary" name="edit" type="submit">Редактировать</button>
        </form>
    </div>
</div>

<?php require 'templates/footer.php'; ?>