<!-- app/Views/auth/reset_password.php -->

<?= $this->extend('layouts/maincoach') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Reset Password</h2>
            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('/reset-password') ?>" method="post">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
