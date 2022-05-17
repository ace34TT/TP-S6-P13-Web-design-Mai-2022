<?php $title = $new["title"]; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<article class="mb-4">
    <h1><?= $new["title"] ?></h1>
    <br>
    <h3><?= $new["description"] ?></h3>

    <img src="<?= base_url() ?>/assets/uploads/<?= $new["image"] ?>" alt="">
    <?=
    $new["content"]
    ?>
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