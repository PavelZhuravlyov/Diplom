<?php
  session_start();
  require_once "engine/database_class.php";

  $db = new DataBase();
  $courses = $db->getFieldsValue('courses', array('*'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Главная</title>
</head>
<body>
  <header>
    <div class="row">
      <div class="logo large-3 medium-3 column">
        <h1 class="head-logo"><a href="/">SearchCourses</a></h1>
      </div>
      <div class="large-6 medium-8 column h-menu-w">
          <ul class="head-menu">
            <li class="list-active"><a href="/">Главная</a></li>
            <li><a href="/help.html">Помощь</a></li>
            <li><a href="/progect">О проекте</a></li>
            <li><a href="#">Личный кабинет</a></li>
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
      <div class="large-9 medium-9 column form">
        <form action="engine/search.php" method="POST" class="search-form">
          <input type="text" name="request" placeholder="Введите название курса" class="large-8 medium-8 small-7 search-form-input" />
          <input type="submit" value="Поиск" class="search-form-sub" />
          <div>
            <label class="search-label">
              <input type="radio" name="search" class="pop-up-auto-f-l-checkbox js-input-form" value="users">
              <span class="pop-up-auto-f-l-text-ch">Люди</span>
            </label>
            <label class="search-label">
              <input type="radio" name="search" class="pop-up-auto-f-l-checkbox js-input-form" value="company">
              <span class="pop-up-auto-f-l-text-ch">Компании</span>
            </label>
            <label class="search-label">
              <input type="radio" name="search" class="pop-up-auto-f-l-checkbox js-input-form" value="courses">
              <span class="pop-up-auto-f-l-text-ch">Курсы</span>
            </label>
          </div>
        </form>
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
      <div class="large-9 medium-9 column kn-your-bl">
          <? if (!$_SESSION['is_company']) {?>
            Внимание! Если вы хотите зарегистрировать на этом сайте компанию, которая предлагает свои курсы, то необходимо связаться с администрацией сайта.
            <? if ($_SESSION['test_result'] != NULL) {?>
              <p>Вы: <?= $_SESSION['test_result'] ?></p>
            <?} else {?>
              <h1 class="kn-your-head">Узнать себя</h1>
              <p class="kn-your-desc">Скиннер выдвинул концепцию "оперантного", подкрепляемого научения, в которой воспитание понимает филосовский конформизм. Сознание иллюстрирует психоз. Мышление, как принято считать, выбирает филосовский генезис. Этот концепт элиминирует концепт «нормального», однако ретардация возможна. Инсайт, иcходя из того, что начинает когнитивный гендер. Стимул неравномерен. Объект жизненно </p>
              <a href="/question.php" class="kn-your-btn">Узнать себя</a>
            <?}?>
          <?}?>
      </div>
    </div>
    <? if (!$_SESSION['is_company']) {?>
      <div class="row user-btns-courses">
        <div class="large-12 medium-12 column courses">
          <h1 class="kn-your-head">Новые курсы/Рекомендованные курсы</h1>
          <div class="large-12 medium-12 column courses-list-w">
            <ul class="courses-list row">
              <? for ($i = 0; $i < count($courses); $i++) {?>
                <li class="large-3 medium-5 courses-list-item">
                  <div class="cour-l-logo">
                    <? if (empty($courses[$i]['foto'])) {?>
                      <img src="img/not-logo.png"/>
                    <?} else {?>
                      <img src="<?= $courses[$i]['foto'] ?>" />
                    <?}?>
                  </div>
                  <div class="cour-l-info">
                    <h1 class="cour-l-head cour-l-head-name"><?= $courses[$i]['name'] ?></h1>
                    <h1 class="cour-l-head">Парамметры</h1>
                    <ul class="cour-l-params">
                      <li>
                        Компания
                        <p class="cour-l-params-val"><?= $courses[$i]['company_course'] ?></p>
                      </li>
                      <li>
                        Цена
                        <p class="cour-l-params-val">
                          <? if ($courses[$i]['price'] == 0) {?>
                            Бесплатно
                          <?} else {?>
                            <?= $courses[$i]['price'] ?>
                          <?}?>
                        </p>
                      </li>
                      <li>
                        Длительность
                        <p class="cour-l-params-val"><?= $courses[$i]['duration'] ?></p>
                      </li>
                      <li>
                        Город
                        <p class="cour-l-params-val"><?= $courses[$i]['town'] ?></p>
                      </li>
                    </ul>
                    <a href="<?= $courses[$i]['link'] ?>" class="cour-l-btn-add">Подробнее</a>
                  </div>
                </li>
              <?}?>
            </ul>
          </div>
        </div>
      </div>
    <?}?>
  </section>
  <div class="pop-ups"></div>

  <?php require_once "engine/templates.php" ?>

  <script src="js/jquery.js"></script>
  <script src="js/handlebars.js"></script>
  <script src="js/main.js">
  </script>
</body>
</html>