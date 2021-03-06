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
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>" class="btn btn-primary" role="button">Продолжить &raquo; </a></p>
              <p><a href="?act=view-entry&id=<?= $row['id']; ?>">Комментарии: <?= $row['comments']; ?></a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<hr/>

<nav>
    <ul class="pagination">
        <li>
            <a href="?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

      <?php for($i = 1; $i <= $pages/$limit+1; $i++): ?> 
      <?php if($i == $page): ?><li class="active"><a href="#"><?php echo $i; ?></a></li>
      <?php else: ?><li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endif; ?>
      <?php endfor; ?>

        <li>
            <a href="?page=<?php echo $i - 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<?php require 'templates/footer.php'; ?>