<head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">    
</head>
<body>
    <div class="container">
 
        <br />
        <h3 align="center">Page de connection</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                    if( $this->session->flashdata('message') ) {
                        echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
                    }
                ?>
                <form method="post" action="<?= base_url("login/validation"); ?>">
                    <div class="form-group">
                        <label>Entrez votre email :</label>
                        <input type="mail" name="User_Mail" class="form_control" value="<?= set_value('User_Mail'); ?>"/>
                        <span class="text-danger"><?= form_error('User_Mail'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Entrez votre mot de passe :</label>
                        <input type="password" name="User_Password" class="form_control" value="<?= set_value('User_Password'); ?>"/>
                        <span class="text-danger"><?= form_error('User_Password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Se connecter" class="btn btn-info" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-info" href="<?= base_url('register'); ?>">S'inscrire</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>