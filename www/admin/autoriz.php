<div class="container">
  <form class="form-signin" action="autor.php" method="POST">
    <h2 class="form-signin-heading">Авторизация</h2>
    <label for="inputEmail" class="sr-only">Логин</label>
    <input type="text" id="inputEmail" class="form-control" name="login" placeholder="Логин" required="">
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Пароль" required="">
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Запомнить меня
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
  </form>
</div>