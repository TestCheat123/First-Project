<div class="menu">
                <?php
                    if( isset($_SESSION['logged_user'])) : ?>
                <p class="username">
                <?php
                    echo $_SESSION['username']; ?>
            </p>
        <a href="/link/logout.php">exit</a>
      <?php else : ?>
        <p><a href="auth.php">Вход</a> | <a href="reg.php">Регистрация</a></p>
      <?php endif; ?>
      </div>
          <div class="adress">
      <a href="#">Главная</a>
    </div>
    <div class="institutions">
      <p>Выберите институт (или оффтоп)</p>
      <ul class="instList">
        <li> <a href="razdeli.php?inst=1"> <?php echo $instList['1']['name']; ?> </a> </li>
        <li> <a href="razdeli.php?inst=2"> <?php echo $instList['2']['name']; ?> </a> </li>
        <li> <a href="#"> <?php  ?> </a> </li>
      </ul>
    </div>
