<?php require 'templates/header.php'; ?>
<div class="row">
    <?php foreach ($records as $row): ?> 
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail"> 
            <a href="?act=view-entry&id=<?= $row['id']; ?>"><img src='<?php echo $row['main_photo'] ;?>' alt="thumbs"></a>

            <div class="caption">
                <h3><a href="?act=view-entry&id=<?= $row['id']; ?>"><?= $row['header']; ?></a></h3>
                <p><i><?= '('.$row['date'].')'; ?></i></p>
                <p class="list_content"><?= $row['content']; ?></p>
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>" class="btn btn-primary" role="button">Продолжить &raquo;</a></p>
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>">Комментарии: <?= $row['comments']; ?></a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

Страницы:
<?php for($i = 1; $i <= $pages/$limit+1; $i++): ?>
    <?php if($i == $page): ?><b/><?= $i; ?></b>
    <?php else: ?><a href="?page=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php require 'templates/footer.php'; ?>