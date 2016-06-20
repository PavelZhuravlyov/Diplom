<?php
  session_start();
  require_once "engine/database_class.php";

  $db = new DataBase();
  $courses = $db->getFieldsValue('courses', array('*'));
  $user_info = $db->getFieldsValue('users', array('*'), "login='".$_SESSION['login']."'");

  $finished_courses = $user_info[0]['finished_courses'];
  $finished_courses = explode(',', $finished_courses);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Пользователь</title>
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
      <div class="large-9 medium-9 column form">
        <form action="#" method="POST" class="search-form">
          <input type="text" placeholder="Введите название курса" class="large-8 medium-8 small-7 search-form-input" />
          <input type="submit" value="Поиск" class="search-form-sub" />
          <div>
            <label class="search-label">
              <input type="radio" name="search" class="pop-up-auto-f-l-checkbox js-input-form" value="people">
              <span class="pop-up-auto-f-l-text-ch">Люди</span>
            </label>
            <label class="search-label">
              <input type="radio" name="search" class="pop-up-auto-f-l-checkbox js-input-form" value="companyes">
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
          <? if(isset($_SESSION['name'])) {?>
            <p class="st-stat">Статус: <span class="st-stat-t">Поиск</span></p>
          <?}?>
        </div>
        <div class="user-btn-w">
          <a href="#" class="user-btn private">Личный Кабинет</a>
          <a href="#" class="user-btn reply">Мои Отклики</a>
          <a href="#" class="user-btn offers">
            Предложения компаний <span class="user-btn-news">1</span></a>
        </div>
     	</div>
      <div class="large-9 medium-9 column user-profile">
      	<div class="user-profile-head">
        	<div class="user-profile-foto-w">
        		<img src="img/User-profile.jpg" alt="" class="user-profile-foto" />
        	</div>
          <div class="user-profile-name-w">
          	<p class="user-profile-name"><?= $user_info[0]['name'].' '.$user_info[0]['secondname'] ?></p>
            <p class="user-profile-name-status">Очень хочу посетить курсы дизайна интерьеров</p>
          </div>
        </div>

        <div class="user-profile-main_inform">
        	<div class="user-profile-main_inform-links">
        		<a href="#" class="user-profile-main_inform-link js-info_btn link-active" data-info="1">Общее</a>
        		<a href="#" class="user-profile-main_inform-link js-info_btn" data-info="2">Образование</a>
        		<a href="#" class="user-profile-main_inform-link js-info_btn" data-info="3">Курсы</a>
        	</div>
        	<div class="company-about-yourself">
	          <div data-blockInfo="1" class="user-profile-main_inform-bl large-6 medium-8 info-active" data-info="1">
	            <ul class="user-profile-main_inform-bl-list">
	              <li>Телефон:
	              	<p><?= $user_info[0]['phone_numb'] ?></p>
	              </li>
	              <li>E-mail:
	              	<p><?= $user_info[0]['e-mail'] ?></p>
	              </li>
	              <li>Город проживания:
	              	<p><?= $user_info[0]['town'] ?></p>
	              </li>
	              <li>Хобби:
	              	<p><?= $user_info[0]['hobby'] ?></p>
	              </li>
	              <li>О себе
	              	<p><?= $user_info[0]['about_yourself'] ?></p>
	              </li>
	            </ul>
	            <a href="#" class="user-profile-main_inform-bl-edit">Редактировать</a>
	          </div>
	          <div data-blockInfo="2" class="user-profile-main_inform-bl large-6 medium-8" data-info="2">
	          	<ul class="user-profile-main_inform-bl-list">
	            	<li>Школа:
	              	<p>г. Полевской</p>
	              </li>
	              <li>Университет:
	              	<p>УрФУ ВШЭМ "Информационные системы и технологии в бизнесе"</p>
	              </li>
	              <li>Ключевые навыки
	              	<p>Языки программирования: С/C++, PHP, JavaScript, Node.js</p>
	              </li>
	            </ul>
	            <a href="#" class="user-profile-main_inform-bl-edit">Редактировать</a>
	          </div>
	          <div data-blockInfo="3" class="user-profile-main_inform-bl large-6 medium-8" data-info="3">
	          	<div class="user-profile-main_inform-bl-course">
                <? for ($i = 0; $i < count($courses); $i++) {?>
                  <? for ($j = 0; $j < count($finished_courses); $j++) {?> 
                    <? if ($courses[$i]['id'] == $finished_courses[$j]) {?> 
      	            	<ul class="user-profile-main_inform-bl-list user-profile-main_inform-bl-list-line">
                        <li>Название курса
                          <p><?= $courses[$i]['name'] ?></p>
                        </li>        
                        <li>Период обучения
                          <p><?= $courses[$i]['time'] ?></p>
                        </li>
                        <li>Представитель курсов
                          <p><?= $courses[$i]['company_course'] ?></p>
                        </li>
                      </ul>
                    <?}?>
                  <?}?>
                <?}?>
	            </div>
	           	<a href="#" class="user-profile-main_inform-bl-edit">Редактировать</a>
	          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row user-btns-courses">
      <div class="large-12 medium-12 column courses">
        <h1 class="kn-your-head">Рекомендованные курсы</h1>
        <div class="large-12 medium-12 column courses-list-w">
          <ul class="courses-list row">
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/company-1.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Программирование С++</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                  <li>
                    Компания
                    <p class="cour-l-params-val">Яндекс</p>
                  </li>
                  <li>
                    Цена
                    <p class="cour-l-params-val">Бесплатно</p>
                  </li>
                  <li>
                    Длительность
                    <p class="cour-l-params-val">3 мес.</p>
                  </li>
                  <li>
                    Город
                    <p class="cour-l-params-val">Екатеринбург</p>
                  </li>
                </ul>
                <a href="#" class="cour-l-btn-add">Подробнее</a>
              </div>
            </li>
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/company-2.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Оператор call-центра</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                  <li>
                    Компания
                    <p class="cour-l-params-val">СКБ-Банк</p>
                  </li>
                  <li>
                    Цена
                    <p class="cour-l-params-val">Бесплатно</p>
                  </li>
                  <li>
                    Длительность
                    <p class="cour-l-params-val">2 мес.</p>
                  </li>
                  <li>
                    Город
                    <p class="cour-l-params-val">Екатеринбург</p>
                  </li>
                </ul>
                <a href="#" class="cour-l-btn-add">Подробнее</a>
              </div>
            </li>
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/not-logo.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Веб-дизайн</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                  <li>
                    Компания
                    <p class="cour-l-params-val">DesignStud</p>
                  </li>
                  <li>
                    Цена
                    <p class="cour-l-params-val">10 000 руб.</p>
                  </li>
                  <li>
                    Длительность
                    <p class="cour-l-params-val">2 мес.</p>
                  </li>
                  <li>
                    Город
                    <p class="cour-l-params-val">Екатеринбург</p>
                  </li>
                </ul>
                <a href="#" class="cour-l-btn-add">Подробнее</a>
              </div>
            </li>
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/company-1.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Программирование С++</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                    <li>
                      Компания
                      <p class="cour-l-params-val">Яндекс</p>
                    </li>
                    <li>
                      Цена
                      <p class="cour-l-params-val">Бесплатно</p>
                    </li>
                    <li>
                      Длительность
                      <p class="cour-l-params-val">3 мес.</p>
                    </li>
                    <li>
                      Город
                      <p class="cour-l-params-val">Екатеринбург</p>
                    </li>
                </ul>
                <a href="#" class="cour-l-btn-add">Подробнее</a>
              </div>
            </li>
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/company-2.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Оператор call-центра</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                  <li>
                    Компания
                    <p class="cour-l-params-val">СКБ-Банк</p>
                  </li>
                  <li>
                    Цена
                    <p class="cour-l-params-val">Бесплатно</p>
                  </li>
                  <li>
                    Длительность
                    <p class="cour-l-params-val">2 мес.</p>
                  </li>
                  <li>
                    Город
                    <p class="cour-l-params-val">Екатеринбург</p>
                  </li>
                </ul>
                <a href="#" class="cour-l-btn-add">Подробнее</a>
              </div>
            </li>
            <li class="large-3 medium-5 courses-list-item">
              <div class="cour-l-logo">
                <img src="img/not-logo.png" />
              </div>
              <div class="cour-l-info">
                <h1 class="cour-l-head cour-l-head-name">Веб-дизайн</h1>
                <h1 class="cour-l-head">Парамметры</h1>
                <ul class="cour-l-params">
                <li>
                  Компания
                  <p class="cour-l-params-val">DesignStud</p>
                </li>
                <li>
                  Цена
                  <p class="cour-l-params-val">10 000 руб.</p>
                </li>
                <li>
                  Длительность
                  <p class="cour-l-params-val">2 мес.</p>
                </li>
                <li>
                  Город
                  <p class="cour-l-params-val">Екатеринбург</p>
                </li>
              </ul>
              <a href="#" class="cour-l-btn-add">Подробнее</a></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="pop-ups"></div>
  <?php require_once "engine/templates.php" ?>
  <script src="js/jquery.js"></script>
  <script src="js/handlebars.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
