<body>
    <div class="container">
        <br />
        <h3 align="center">Ajout d'article</h3>
        <br />
        <div class="panel panel-default">
  
            <div class="panel-body">
                <form method="post" action="<?= base_url("article/validation"); ?>">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="Article_Title" class="form_control" value="<?= set_value('Article_Title'); ?>"/>
                        <span class="text-danger"><?= form_error('Article_Title'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select class="form-control" name="ID_Categorie" value="<?= set_value('ID_Categorie'); ?>">
                            <option value="" disabled selected></option>
                            <option value="1">Test</option>
                            <option value="2">News</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" name="Article_Descritption" class="form_control" value="<?= set_value('Article_Descritption'); ?>"></textarea>
                        <span class="text-danger"><?= form_error('Article_Descritption'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="Article_Picture" class="form_control" value="<?= set_value('Article_Picture'); ?>"/>
                        <span class="text-danger"><?= form_error('Article_Picture'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <select name="Article_Score" class="form_control" value="<?= set_value('Article_Score'); ?>">
                            <option value="" disabled selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Créer l'article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>