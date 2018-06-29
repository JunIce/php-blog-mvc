<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <? if (!isset($this->posts['title'])):
        echo "博客列表";
      else:
        echo $this->posts['title'];
      endif
    ?>
  </title>
  <link rel="stylesheet" href="Views/assets/css/common.css">
</head>
<body>
<header>
  <? if(!empty($_SESSION['is_logined'])):?>
      <a href="?c=user&f=login"><?=strtoupper($_COOKIE['email']);?></a>
      <a href="?c=user&f=logout">LOGOUT</a>
  <? else: ?>
      <a href="?c=user&f=login">登录</a>
      <a href="?c=user&f=register">注册</a>        
  <? endif ?>
</header>
<div class="post-main">
  
