<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <h1 class="mt-3">Login</h1>
                <div class="panel-body">
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="" action="<?= base_url('login') ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>