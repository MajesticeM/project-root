<?= $this->extend('layouts/maincoach') ?>

<?= $this->section('content') ?>
<style>
    .profile_images {
        border-radius: 50%;
        max-width: 100px;
    }
</style>

<div class="container-fluid">
<div class="row" style="margin-top:50px;margin-bottom:50px">
    <div class="col-md-9 profile-header text-left">
        <img  alt="Profile Image" class="img-responsive">
        <h3>Coach Name</h3>
        <p><b>Specialty:</b> Discus Throw</p>
       
    </div>

    <!-- Update Portfolio Button -->
    <div class="col-md-3 profile-header text-right" >
        <button class="btn btn-danger"><a href="<?= base_url('dashboard/update-profile01') ?>" style="color: white;">Update Portfolio</a></button>
        <br>
        <button style="margin-top:10px" class="btn btn-primary"><a href="<?= base_url('/') ?>" style="color: white;">Logout Profile</a></button>
        <div class="social-media-icons">
            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
        </div>
    </div>
</div>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <form class="form-inline" action="<?= base_url('/coach/search-athlete'); ?>" method="get">
                <div class="form-group">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="q" id="search" placeholder="Search by athlete name">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <div class="form-group">
                <label for="search">Search Athletes:</label>
                <input type="text" class="form-control" id="search" name="q" placeholder="Enter athlete's name">
            </div>
            <!-- Sport Filter -->
            <div class="form-group">
                <label for="sport">Filter by Sport:</label>
                <select class="form-control" id="sport" name="sport">
                    <option value="">All Sports</option>
                    <!-- Check if $sportsList is defined before using it -->
                    <?php if (isset($sportsList) && is_array($sportsList)): ?>
                        <?php foreach ($sportsList as $sport): ?>
                            <option value="<?= $sport ?>"><?= $sport ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <!-- Country Filter -->
            <div class="form-group">
                <label for="country">Filter by Country:</label>
                <select class="form-control" id="country" name="country">
                    <option value="">All Countries</option>
                    <!-- Check if $countriesList is defined before using it -->
                    <?php if (isset($countriesList) && is_array($countriesList)): ?>
                        <?php foreach ($countriesList as $country): ?>
                            <option value="<?= $country ?>"><?= $country ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="country">Filter by Position:</label>
                <select class="form-control" id="country" name="country">
                    <option value="">All Positions</option>
                    <!-- Check if $countriesList is defined before using it -->
                    <?php if (isset($countriesList) && is_array($countriesList)): ?>
                        <?php foreach ($countriesList as $country): ?>
                            <option value="<?= $country ?>"><?= $country ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Filter by Gender:</label>
                <select class="form-control" id="country" name="country">
                    <option value="">All Genders</option>
                    <!-- Check if $countriesList is defined before using it -->
                    <?php if (isset($countriesList) && is_array($countriesList)): ?>
                        <?php foreach ($countriesList as $country): ?>
                            <option value="<?= $country ?>"><?= $country ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Filter by Age:</label>
                <select class="form-control" id="country" name="country">
                    <option value="">Age categories</option>
                    <!-- Check if $countriesList is defined before using it -->
                    <?php if (isset($countriesList) && is_array($countriesList)): ?>
                        <?php foreach ($countriesList as $country): ?>
                            <option value="<?= $country ?>"><?= $country ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <!-- /Sidebar -->
        </div>
        <!-- /Sidebar -->
        <!-- Main content -->
        
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Coach Dashboard</h3>
                    <!-- Search form on the same line -->
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-12 text-right">

                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <!-- Dummy content for 12 cards -->
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h3 class="card-title">Athlete <?= $i ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <img class="profile_images" src="https://via.placeholder.com/150" alt="Profile Image">
                                        <p>Name: Athlete <?= $i ?></p>
                                        <p>Date of Birth: 1990-01-01</p>
                                        <p>Height (cm): 180</p>
                                        <p>Weight (kg): 70</p>
                                        <p>Country: Country <?= $i ?></p>
                                        <a class="btn btn-primary" href="<?= base_url("/coach/view-athlete-portfolio"); ?>">
                                            View Portfolio
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <!-- End of dummy content for 12 cards -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main content -->
    </div>
</div>
<?= $this->endSection() ?>
