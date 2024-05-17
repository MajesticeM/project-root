<!-- app/Views/auth/register.php -->

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="register-box">
    <div class="register-logo">
        <a href="<?= base_url() ?>"><b>Olympic Throws Academy Registration</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
        <?php if (isset($validation)): ?>
                <?php if ($validation->getError()): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>


            <p class="login-box-msg">Register a new membership</p>

            <!-- Add your registration form here -->
            <form action="<?= base_url('/register') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                     <!-- Display email validation error -->
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div class="error"><?= $validation->getError('email') ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control" name="user_type" required>
                        <option value="athlete">Athlete</option>
                        <option value="coach">Coach</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" required>
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?= base_url('/') ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?= $this->endSection() ?>
