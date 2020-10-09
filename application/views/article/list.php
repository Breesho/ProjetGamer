<h2 class="text-center m-5 text-primary">Liste Articles</h2>
<div class="container d-flex">
<?php foreach ($articles_item as $article) : ?>
    
        <div class="row m-5 d-flex flex-column bg-dark rounded shadow-lg">
            
        <div class="p-2">

        <h3 ><a class="text-light" href="<?= base_url('article/detail/' . $article['Article_Slug']); ?>"><?= $article['Article_Title']; ?></a></h3>
            <div class="main">
                <?= $article['Article_CreateAt']; ?><br />
                <p>Note : <?= $article['Article_Score']; ?>/5</p><br />

                <?php if ($this->session->userdata('role') == 2) { ?>
                    <a href="<?= site_url('article/edit/' . $article['Article_Slug']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                    <a href="<?= site_url('article/remove/' . $article['Article_Slug']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                <?php } ?>
            </div>
        </div>
        </div>
<?php endforeach; ?> 
 </div>