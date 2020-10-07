<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
       <?php if (!isset($_SESSION)) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("../"); ?>">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("dashboard"); ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("profil"); ?>">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Deconnexion</a>
          </li>
         <?php } else { ?>
              <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("register"); ?>">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("login"); ?>">Se connecter</a>
            </li>
         <?php } ?>
        </ul>
      </div>
    </div>
  </nav>