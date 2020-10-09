  <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?= $articles_item['Article_Title']; ?></h1>

        <!-- Author -->
        <p class="lead">
          Note : <?= $articles_item['Article_Score']; ?>/5
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Poster le <?= $articles_item['Article_CreateAt']; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
       <p><?= $articles_item['Article_Descritption']; ?></p>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Laissez un commentaire: </h5>
          <div class="card-body">
            <form method="post" action="<?= base_url("commentary/add"); ?>">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="Commentary_Text" value="<?= set_value("Commentary_Text"); ?>"></textarea>
              </div>
              <span class="text-danger"><?= form_error('Commentary_Text'); ?></span>
              <input type="hidden" name="ID_Article" value="<?= $articles_item['ID_Article']; ?>" />
              <input type="hidden" name="Article_Slug" value="<?= $articles_item['Article_Slug']; ?>" />
              <input type="hidden" name="ID_User" value="<?= $this->session->userdata['id']; ?>" />
              <button type="submit" class="btn btn-primary">Commenter</button>
            </form>
          </div>
        </div>

        <!-- Comment with nested comments -->
       
          <?php foreach($commentaries as $com): ?>
            <div class="media mb-4">

            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
           
              <p style="margin: 0;">
                <?= $com['Commentary_Text']; ?>
              </p>
              <p style="font-size: small;"> <i>Publié le : <?= $com['Commentary_CreateAt']; ?></i></p>
              </div>
            </div>
          <?php endforeach; ?>
     

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
