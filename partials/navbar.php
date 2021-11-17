<div class="container">
  <div class="header-wrapper d-flex flex-col justify-center align-center">
    <div class="header-informations d-flex align-center">
      <h2 class="header-site-title"><a href="homepage.php">The Bookshelf</a></h2>
      <div class="header-account d-flex">
        <div class="account-logged  d-flex justify-center align-center">
          <?php if (isset($_SESSION) && !empty($_SESSION['user'])): ?>
          <div class="user-logo-texts">
            <a href="user.php" id="btn-login">
              <?php echo Session::getUserConnected() ?></a>
            <?php if($_SESSION['user']['role'] == 'admin') {   ?>
            <a class="nav-link" href="<?= $_SESSION['user']['role'] ?? 'admin' ?>.php">
              Dashboard</a>
            <?php } ?>
            <a href="logout.php" target="_self">Log out</a>

          </div>
        </div>
        <?php else: ?>
        <div class="account-not-logged  d-flex justify-center align-center">
          <div class="user-logo-texts">
            <a href="login.php" id="btn-login" target="_self">Login</a>
            <a href="register.php" target="_self">Create an account</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="header-search-bar d-flex align-center">
      <div id="posts-section" class="search--results"></div>
      <form method="POST" action="search.php" role="search" class="form-search-suggest d-flex">
        <div class="input-wrapper d-flex">
          <input autocomplete="off" type="text" name="search-post" id="input-search-bar"
            placeholder="Search by title, author" />

          <a href="#" id="btn-search-cancel">
            <i class="far fa-window-close"></i></a>
        </div>
        <button id="btn-search" type="submit" name="search" class="a" title="Start searching">

          <span class="search-icon"><i class="fas fa-search"></i></span>
        </button>
      </form>
    </div>
    <div id="ul-search-results"></div>

  </div>
</div>