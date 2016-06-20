<?php 
	session_start();
	require_once "engine/database_class.php";

	$db = new DataBase();
  $courses = $db->getFieldsValue('courses', array('*'));
  $company_info = $db->getFieldsValue('company', array('*'), "login='".$_SESSION['login']."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Страница компании</title>
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
			<div class="large-9 medium-9 column company-profile">
      	<div class="company-profile-head">
        	<div class="company-profile-foto-w">
        		<img src="img/company-logo.png" alt="" class="company-profile-foto" />
        	</div>
          <div class="company-profile-name-w">
          	<p class="company-profile-name"><?= $company_info[0]['name'] ?></p>
          </div>
        </div>
        <div class="company-profile-main_inform">
        	<div class="company-profile-main_inform-links">
        		<p class="profile-info_text">Информация:</p>
        		<a href="#" class="company-profile-main_inform-link link-active js-info_btn" data-info="1">Общая</a>
        		<a href="#" class="company-profile-main_inform-link js-info_btn" data-info="2">О курсах</a>
        	</div>
        </div>
        <div class="company-about-yourself">
        	<div class="company-about-info info-active" data-info="1">
	          <div class="company-about-yourself-text">
	          	<?= $company_info[0]['about_company'] ?>
	          </div>
	          <div class="company-about-yourself-list-w">
	          	<ul class="company-about-yourself-list column">
	            	<li>
	            		Профиль компании:
	                <p class="company-ab-your-l-text"><?= $company_info[0]['activity'] ?></p>
	              </li>
	              <li>
	              	Адрес:
	                <p class="company-ab-your-l-text"><?= $company_info[0]['address'] ?></p>
	              </li>
	              <li>
	              	Телефон:
	                <p class="company-ab-your-l-text"><?= $company_info[0]['phone_numb'] ?></p>
	              </li>
	            </ul>
	            <ul class="company-about-yourself-list column">
	            	<li>
	            		E-mail:
	                <p class="company-ab-your-l-text"><?= $company_info[0]['e-mail'] ?></p>
	              </li>
	              <li>
	              	Сайт:
	                <p class="company-ab-your-l-text"><?= $company_info[0]['site'] ?></p>
	              </li>
	            </ul>
	          </div>
		        <div class="company-map-w">
		          <div class="company-map large-12 medium-12 small-12">
		          	<div id="map" data-address="<?= $company_info[0]['address'] ?>"></div>
		          </div>
		        </div>
	      	</div>
	      	<div class="company-about-info" data-info="2">
		      	<div class="row user-btns-courses">
				      <div class="large-12 medium-12 column courses">
				        <h1 class="kn-your-head">Активные курсы</h1>
				        <div class="large-12 medium-12 column courses-list-w">
				          <ul class="courses-list row">
				            <li class="large-4 medium-5 courses-list-item">
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
				            <li class="large-4 medium-5 courses-list-item">
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
				            <li class="large-4 medium-5 courses-list-item">
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
				            <li class="large-4 medium-5 courses-list-item">
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
				            <li class="large-4 medium-5 courses-list-item">
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
				            <li class="large-4 medium-5 courses-list-item">
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
			    </div>
      </div>
    </div>
  </section>
 <div class="pop-ups"></div>

	<?php require_once "engine/templates.php" ?>
  <script src="js/jquery.js"></script>
  <script src="js/handlebars.js"></script>
  <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
  <script src="js/main.js"></script>
</body>

</html>
