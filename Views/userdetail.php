<?php include 'inc/header.inc.php'; ?>

<div class="user-detail">
  <span class="user-detail-title">USER_EMAIL:</span>
  <i class="user-detail-name"><?=$this->posts['email']?></i>
</div>

<div class="user-detail">
  <span class="user-detail-title">USER_PASS:</span>
  <i class="user-detail-name"><?=$this->posts['password']?></i>
</div>

<?php include 'inc/footer.inc.php'; ?>