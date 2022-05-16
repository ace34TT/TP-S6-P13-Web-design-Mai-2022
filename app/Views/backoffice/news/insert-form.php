<?php $title = ""; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<main role="main">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Form validation</h2>
                <p class="text-muted">
                    Provide valuable, actionable feedback to your users with HTML5
                    form validation
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Default Validation</strong>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" action="<?= route_to('admin.news.insert.post') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="validationCustom01">Titre</label>
                                            <input name="title" type="text" class="form-control" id="validationCustom01" required />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="validationCustom01">Description</label>
                                            <textarea class="form-control" id="validationCustom01" name="description" rows="2" cols="50"></textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="validationCustom01">Contenu</label>\
                                            <textarea class="form-control" id="validationCustom01" name="content" rows="4" cols="50"></textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="validationCustom01">Image</label>
                                            <input type="file" name="picture" class="form-control" id="validationCustom01" required />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">
                                        Submit form
                                    </button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- end section -->
            </div>
            <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div>
        <!-- .row -->
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>

<?php $scripts = ob_get_clean(); ?>
<?php require($target_file = APPPATH . 'Views/backoffice/template.php'); ?>