<?php 
include_once 'inc/header.inc.php'; 
?>
<form action="" method="post" class="add_form">
  <div>
    <label for="title">标题:</label>
    <input type="text" name="title" id="title">
  </div>
  <div>
    <label for="body">正文:</label>
    <textarea name="body" id="content_body" rows="12"></textarea>
  </div>
  <div>
    <input type="submit" value="提交">
  </div>
</form>

<?php
include_once 'inc/footer.inc.php';
?>