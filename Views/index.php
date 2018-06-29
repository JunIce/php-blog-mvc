<?php require 'inc/header.inc.php'; ?>
<? if (empty($this->posts)): ?>
  <p>没有任何发布</p>
<? else: ?>
  <? foreach($this->posts as $post): ?>
    <div class="post-item">
      <h1><a href="?c=blog&f=detail&id=<?=$post['id']?>"><?= $post['title']?></a></h1>
      <p><span>发布时间: </span> <i><?=$post['createdDate']?></i></p>
      <div>
        <p><strong>正文: </strong> <i><?=mb_strimwidth($post['body'], 0, 100, '...', 'utf-8');?></i></p>
      </div>
    </div>
  <?php endforeach ?>
<? endif ?>
<?php require 'inc/footer.inc.php'; ?>