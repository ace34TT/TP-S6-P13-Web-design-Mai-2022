<?php $title = $new["title"]; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<article class="mb-4">
    <h3><?= $new["title"] ?></h3>
    <h4><?= $new["description"] ?></h4>
    <?=
    $new["content"]
    ?>
</article>
<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>

<?php $scripts = ob_get_clean(); ?>
<?php require('template.php'); ?>