<?php $title = ""; ?>
<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>
<!-- CONTENT -->
<?php ob_start(); ?>
<div class="col-md-12 ">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">
                News
            </h5>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Search</span>
                </div>
                <input type="text" id="search-input" class="form-control" placeholder="ID - Name " aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div>
                <button type="button" id="btnExport" class="btn btn-primary">Export data</button>
            </div>
            </p>
            <table class="table table-hover" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php
                    foreach ($news as $key => $new) {
                    ?>
                        <tr class="table-tr" onclick="location.href='<?= site_url() . '/admin/candidate/test/' . $new['id'] ?>' ">
                            <td><?= $new["id"] ?></td>
                            <td><?= $new["title"] ?></td>
                            <td><?= $new["description"] ?></td>
                            <td><?= $new["created_at"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- Bordered table -->
<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>
<script>
    $("#btnExport").click(function() {
        $("#myTable").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Data",
            filename: new Date().toLocaleString().replace(',', '').replace(' ', '') + "_data", //do not include extension
            fileext: ".xls" // file extension
        });
    });
</script>
<?php $scripts = ob_get_clean(); ?>
<?php require('template.php'); ?>