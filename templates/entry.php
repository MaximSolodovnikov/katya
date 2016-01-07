<?php require 'templates/header.php'; ?>

<div class="jumbotron">
    <h2><?= $ENTRY['header']; ?></h2><hr>
    <h4><?= $ENTRY['date']; ?></h4>
    <p class="list_content"><?= $ENTRY['content']; ?></p>
    
    <div class="row">
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="...">
          </a>
        </div>
    </div>
</div>
<h3 class="madia">Comments</h3>
<hr/>

<!-------------- Post a comment ------------>
<div class="col-sm-6">
    <form class="form-signin" action="?act=do-new-comment" method="POST">
        <label for="inputEmail" class="sr-only">Автор комментария:</label>
        <input type="text" name="author" id="inputEmail" class="form-control" placeholder="Ваш логин" required autofocus>
        <input type="hidden" name="entry_id" value="<?= $id; ?>">
        <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>"><br />
        <label for="inputEmail" class="sr-only">Текст комментария</label>
        <textarea name="text" id="inputEmail" class="form-control" placeholder="Текст комментария"></textarea><br/>
        <button class="btn btn-primary" name="add_comment" type="submit">Комментировать</button><br /><br /><hr />
    </form>
</div>
<!-------------- Outputs of comments ------------>
<div class="col-sm-8">
    <?php foreach ($comments as $item): ?>
    <div class="media">
        <div class="media-left media-top">
          <a href="#">
            <img class="media-object" src="img/nature-q-g-64-64-5.jpg" alt="...">
          </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading media-left"><b><?= $item['author']; ?></b> | <?= $item['date']; ?></h4><br/>
          <h5 class="media-left list_content"><?= $item['text']; ?></h5>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php require 'templates/footer.php'; ?>