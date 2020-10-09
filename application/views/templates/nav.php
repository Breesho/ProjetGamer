<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
       <?php if($this->session->userdata('id') ) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/article/list") ?>">Accueil</a>
          </li>
          <?php if( $this->session->userdata('role') == 2) { ?>          
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url("dashboard"); ?>">Dashboard</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url("profil/"); ?>">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url("logout"); ?>">Deconnexion</a>
          </li>
         <?php } else { ?>
              <li class="nav-item">
              <a class="nav-link" href="<?= site_url("register"); ?>">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url("login"); ?>">Se connecter</a>
            </li>
         <?php } ?>
        </ul>
      </div>
    </div>
  </nav>