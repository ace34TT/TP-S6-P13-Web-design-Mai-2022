<?php $title = $new["title"]; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<article class="mb-4">
    <h1 class="post-title"><?= $new["title"] ?></h1>
    <img width="700px" height="350px" src="<?= base_url() ?>/uploads/images/<?= $new["image"] ?>" alt="">
    <br>
    <br>
    <h3 class="post-subtitle"><?= $new["description"] ?></h3>
    <br>
    <?=
    $new["content"]
    ?>
    <p class="post-meta">
        Posted by
        <a href="#!">Earth</a>
        on <?= $new["created_at"] ?>
    </p>
</article>
<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    window.scrollTo(0, 550);
</script>
<?php $scripts = ob_get_clean(); ?>
<?php require('template.php'); ?>