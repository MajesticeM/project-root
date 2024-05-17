<!-- app/Views/auth/login.php -->

<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>"><b>Olympic Throws Academy Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Coach & Athlete sign in</p>

            <!-- Add your login form here -->
            <form action="<?= base_url('/login') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="<?= base_url('/forgot-password') ?>">I forgot my password</a>
            </p>
            <p class="mb-0">
                
          
            <a href="<?= base_url('/registerPage') ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<?= $this->endSection() ?>
