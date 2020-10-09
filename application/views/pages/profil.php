<div class="container-xl m-5">
    <h2>Commentaire récents :</h2>
</div>

<div class="container-xl m-5">
<h2>Paramètre de compte :</h2>
<form method="post" action="<?= base_url('profil/'); ?>">
        <?= $this->session->userdata['id']; ?>
        <div class="form-group">
            <label>Adresse Mail</label>
            <input type="email" class="form-control" id="" aria-describedby="emailHelp" value="<?= ($this->input->post('User_Mail') ? $this->input->post('User_Mail') : $this->input->post('User_Mail') ) ?>">

        </div>

        <div class="form-group">
            <label>Pseudonyme</label>
            <input type="email" class="form-control" id="" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label>Nouveau mot de passe</label>
            <input type="password" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Verification nouveau mot de passe</label>
            <input type="password" class="form-control" id="">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    
    </form>
</div>