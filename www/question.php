<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Узнать себя</title>
</head>
<body>
  <header>
  	<div class="row">
    	<div class="logo large-3 medium-3 column">
      	<h1 class="head-logo"><a href="/">SearchCourses</a></h1>
      </div>
      <div class="large-6 medium-8 column h-menu-w">
      	<ul class="head-menu">
        	<li><a href="#">Главная</a></li>
          <li><a href="#">Помощь</a></li>
          <li><a href="#">О проекте</a></li>
          <li class="list-active"><a href="#">Личный кабинет</a></li>
        </ul>
      </div>
    </div>
  </header>
  <section class="main">
  	<div class="row m-search">
  		<div class="large-3 medium-3 small-6 column auto-reg-btn">
        <? if(isset($_SESSION['login'])) {?>
           <a href="#" class="auto-reg js-exit_account" data-button="autoriz">Выйти</a>
        <?} else {?>
          <a href="#" class="auto-reg js-auto_reg" data-button="autoriz">Войти</a>
        <?}?>
      </div>
    </div>
  	<div class="row know-yourself">
    	<div class="large-3 medium-3 column status">
        <div class="status-info">
          <p class="st-name"><?= $_SESSION['name']." ".$_SESSION['secondname'] ?></p>
          <? if(isset($_SESSION['name']) && (!$_SESSION['is_company'])) {?>
            <p class="st-stat">Статус: <span class="st-stat-t">Поиск</span></p>
          <?}?>
        </div>
        <? if (!$_SESSION['is_company']) {?>
          <div class="user-btn-w">
            <a href="#" class="user-btn private">Личный Кабинет</a>
            <a href="#" class="user-btn reply">Мои Отклики</a>
            <a href="#" class="user-btn offers">
              Предложения компаний <span class="user-btn-news">1</span></a>
          </div>
        <?}?>
      </div>
      <div class="large-9 medium-9 column kn-your-bl" id="questions"></div>
    </div>
  </section>
  <div class="pop-ups">
    <div class="pop-up-auto">
      <h1 class="pop-up-auto-head">Авторизация</h1>
      <p class="pop-up-auto-pref">Чтобы войти в личный кабинет введите логин и пароль</p>
      <form action="#" method="POST" class="pop-up-auto-form">
        <label class="pop-up-auto-f-l"><span class="pop-up-auto-f-l-text">Логин(E-mail): </span>
          <input type="text" name="Auto[login]" class="pop-up-auto-f-l-inp search-form-input" />
        </label>
        <label class="pop-up-auto-f-l"><span class="pop-up-auto-f-l-text">Пароль: </span>
          <input type="password" name="Auto[pass]" class="pop-up-auto-f-l-inp search-form-input" />
        </label>
        <label class="pop-up-auto-f-l">
          <span class="pop-up-auto-f-l-text-ch">Запомнить меня </span>
          <input type="checkbox" name="Auto[remember]" class="pop-up-auto-f-l-checkbox" />
        </label>
        <div class="pop-up-auto-f-l-wr">
          <div class="pop-up-auto-f-l-btn"> 
            <a href="#" class="pop-up-auto-f-l-sub">Регистрация</a>
          </div>
          <div class="pop-up-auto-f-l-btn">
            <input type="submit" value="Войти" class="pop-up-auto-f-l-sub" />
          </div>
        </div>
      </form>
      <a href="#" class="pop-up-close"></a>
    </div>
    <div class="pop-ups"></div>
  

  <?php require_once "engine/templates.php" ?>

  <script src="js/jquery.js"></script>
  <script src="js/handlebars.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.min.js"></script>
  <script src="js/EventEmitter.js"></script>
  <script src="js/main.js"></script>
  <script type="text/babel" src="js/questions.js"></script>
	</div>
</body>
</html>
