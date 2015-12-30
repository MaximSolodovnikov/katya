<?php require 'templates/header.php'; ?>




<div class="row">
    <?php foreach ($records as $item): ?> 
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="img/IMG_3111.JPG" alt="">
            <div class="caption">
                <h3><a href='?act=view-entry&id='<?= $item['id']; ?>><?= $item['header']; ?></a></h3>
                <p><?= $item['content']; ?></p>
              <p><a href="?act=view-entry&id='<?= $item['id']; ?>" class="btn btn-primary" role="button">Продолжить &raquo;</a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>




<?php require 'templates/footer.php'; ?>