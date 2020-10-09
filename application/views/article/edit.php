<div class="container">
    <br />
    <h3 align="center">Ajout d'article</h3>
    <br />		
    <div class="panel-body">
        <form method="post" action="<?= base_url("article/edit/".$article['Article_Slug']); ?>">
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="Article_Title" class="form_control" value="<?= ($this->input->post('Article_Title') ? $this->input->post('Article_Title') : $article['Article_Title']); ?>"/>
                <span class="text-danger"><?= form_error('Article_Title'); ?></span>
            </div>
            <div class="form-group">
                <label>Catégorie</label>
                <select class="form-control" name="ID_Categorie" value="<?= ($this->input->post('ID_Categorie') ? $this->input->post('ID_Categorie') : $article['ID_Categorie']); ?>">
                    <option value="" disabled selected></option>
                    <option value="1">Test</option>
                    <option value="2">News</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea rows="3" name="Article_Descritption" class="form_control" value="<?= set_value('Article_Descritption'); ?>"><?= ($this->input->post('Article_Descritption') ? $this->input->post('Article_Descritption') : $article['Article_Descritption']); ?></textarea>
                <span class="text-danger"><?= form_error('Article_Descritption'); ?></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="Article_Picture" class="form_control" value="<?= ($this->input->post('Article_Picture') ? $this->input->post('Article_Picture') : $article['Article_Picture']); ?>"/>
                <span class="text-danger"><?= form_error('Article_Picture'); ?></span>
            </div>
            <div class="form-group">
                <label>Note</label>
                <select name="Article_Score" class="form_control" value="<?= ($this->input->post('Article_Score') ? $this->input->post('Article_Score') : $article['Article_Score']); ?>">
                    <option value="" disabled selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Modifier l'article</button>
            </div>
        </form>
    </div>
</div>
