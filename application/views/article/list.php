<h2><?= $title; ?></h2>

<?php foreach($articles_item as $article): ?>

    <h3><a href="<?= base_url('article/detail/'.$article['Article_Slug']); ?>"><?= $article['Article_Title']; ?></a></h3>
    <div class="main">
        <?= $article['Article_CreateAt']; ?><br />
        <p>Note : <?= $article['Article_Score']; ?>/5</p><br />

        <?php if( $this->session->userdata('role') == 2) { ?>
            <a href="<?= site_url('article/edit/'.$article['Article_Slug']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
            <a href="<?= site_url('article/remove/'.$article['Article_Slug']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
        <?php } ?>
    </div>
    <hr>

<?php endforeach; ?>