<?php $title = $new["title"]; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<article class="mb-4">
    <h1><?= $new["title"] ?></h1>
    <?=
    $new["content"]
    ?>
</article>
<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>

<?php $scripts = ob_get_clean(); ?>
<?php require('template.php'); ?>