<header class="mb-2 pb-2 bg-white fixed-top">
  <!-- <div class="container-fluid"> -->

  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid px-5">
      <a class="navbar-brand" href=".">KazAwKiTaw</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=".">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="user"><?= isset($user) ? "Bienvenue, ".$user->getFirstname()."<br><a class='btn bg-cream text-black' href='index.php?page=logout'>Se déconnecter.</a>" : "<a class='btn bg-cream text-black' href='index.php?page=login'>Se connecter</a>"; ?>
</div>
</header>