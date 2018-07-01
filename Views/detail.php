<?php include 'inc/header.inc.php';?>
<div>
  <div>
    <h1><?=$this->posts['title']?></h1>
  </div>

  <div class="post-time">
    <span>发布时间：</span> <i><?=$this->posts['createdDate']?></i>
  </div>

  <div class="post-time">
    <a href="?c=blog&f=delInfo&id=<?=$this->posts['id']?>">删除</a>
  </div>

  <div class="post-detail">
    <p><?=nl2br($this->posts['body'])?></p>
  </div>
</div>
<?php include 'inc/footer.inc.php';?>
