<?php require 'templates/header.php'; ?>

<?php if(IS_ADMIN): ?>
<!------------ Added photos, edit and delete of art ---------->
<div class="jumbotron"><hr />
    <h3 class="add"><b>Добавление ФОТО к событию &laquo; <?= $ENTRY['header']; ?> &raquo; </b></h3><br />  
    <form method="POST" action="?act=add-photos-to-art" enctype="multipart/form-data">
        <label class="sr-only">Выберите фото:</label>
        <input class="input_adding_photos" name="upload[]" type="file" multiple="multiple" /><br /><br />
        <input type="hidden" name="entry_id" value="<?= $id; ?>">
        <button class="btn btn-success" name="add" type="submit">Добавить фото</button>
    </form><hr />
    <h3><b><a class="edit" href="?act=edit-entry&id=<?= $ENTRY['id']; ?>">Редактировать СОБЫТИЕ &laquo; <?= $ENTRY['header']; ?> &raquo;</a></b></h3><hr />
    <h3><b><a class="delete" href="?act=delete-entry&id=<?= $ENTRY['id']; ?>">Удалить СОБЫТИЕ &laquo; <?= $ENTRY['header']; ?> &raquo;</a></b></h3><hr />
</div>
 
<!------------- End of adding photos --------->
<?php endif; ?>

<h2><b><?= $ENTRY['header']; ?></b></h2>

<p><?= $ENTRY['date']; ?></p><br />
<div class="jumbotron">
   
    <p class="list_content"><?= $ENTRY['content']; ?></p>
    <div class="row">
        <?php foreach ($pics as $item): ?>
            <div class="col-xs-6 col-md-3">
                <a href="<?php echo $item['photos'] ;?>" class="thumbnail" rel="lightbox" data-lightbox="image-1">
                    <img src='<?php echo $item['thumbs'] ;?>' alt="thumbs"> 
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php if(!IS_ADMIN): ?>
<!-------------- Post a comment ------------>
<div class="col-sm-6">
    <h3 class="madia"><b>Оставить комментарий</b></h3><br />
    <form class="form-signin" action="?act=do-new-comment" method="POST">
        <label for="inputEmail" class="sr-only">Автор комментария:</label>
        <input type="text" name="author" id="inputEmail" class="form-control" placeholder="Ваш логин">
        <input type="hidden" name="entry_id" value="<?= $id; ?>">
        <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>"><br />
        <label for="inputEmail" class="sr-only">Текст комментария</label>
        <textarea name="text" id="inputEmail" class="form-control" placeholder="Текст комментария"></textarea><br/>
        <button class="btn btn-primary" name="add_comment" type="submit">Комментировать</button><br /><br /><hr />
    </form>
</div>
<?php endif; ?>


<!-------------- Outputs of comments ------------>
<div class="col-sm-8">
    <h3 class="madia"><?php if(IS_ADMIN): ?><b>Комментарии</b><?php endif; ?></h3><br />
    <?php foreach ($comments as $item): ?>
    <div class="media">
        <div class="media-left media-top">
          <a href="#">
            <img class="media-object" src="img/avatar.png" alt="avatar">
          </a>
        </div>
        <div class="media-body"><a name="d"></a>
            <h4 class="media-heading media-left"><b><?= $item['author']; ?></b> | <?= $item['date']; ?></h4><br/>
            <h5 class="media-left list_content"><?= $item['text']; ?><?php if(IS_ADMIN): ?><a class="delete" href="?act=delete-comment&entry_id=<?= $ENTRY['id'];?>&id=<?= $item['id'];?>#d"> &raquo; Удалить</a><?php endif; ?>
            </h5>
        </div>
    </div>
    <?php endforeach; ?>
</div>



<?php require 'templates/footer.php'; ?>