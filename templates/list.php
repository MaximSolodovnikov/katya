<?php require 'templates/header.php'; ?>
<?php echo $info; ?>
<div class="row">
    <?php foreach ($records as $row): ?> 
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">  
            <a href="?act=view-entry&id=<?= $row['id']; ?>"><img src="img/IMG_3111.JPG" alt=""></a>
            <div class="caption">
                <h3><a href="?act=view-entry&id=<?= $row['id']; ?>"><?= $row['header']; ?></a></h3>
                <p><?= $row['date']; ?></p>
                <p class="list_content"><?= $row['content']; ?></p>
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>" class="btn btn-primary" role="button">Продолжить &raquo;</a></p>
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>">Комментарии: <?= $row['comments']; ?></a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php require 'templates/footer.php'; ?>