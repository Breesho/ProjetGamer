<h2><?= $title; ?></h2>

<?php foreach($articles_item as $article): ?>

    <h3><a href="<?= base_url('article/detail/'.$article['Article_Slug']); ?>"><?= $article['Article_Title']; ?></a></h3>
    <div class="main">
        <?= $article['Article_CreateAt']; ?><br />
        <p>Note : <?= $article['Article_Score']; ?>/5</p><br />
    </div>
    <hr>

<?php endforeach; ?>