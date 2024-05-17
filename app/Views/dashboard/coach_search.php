<!-- app/Views/dashboard/coach.php -->

<?= $this->extend('layouts/maincoach') ?>

<?= $this->section('content') ?>
<style>
    .profile_images
    {
        border-radius:50%;
        max-width:200px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <!-- Sidebar -->
            <form class="form-inline" action="<?= base_url('/coach/search-athlete'); ?>" method="get">
                                <div class="form-group">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" name="q" id="search" placeholder="Search by athlete name">
                                </div>
                                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <div class="form-group">
        <label for="search">Search Athletes:</label>
        <input type="text" class="form-control" id="search" name="q"  placeholder="Enter athlete's name">
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
                        <?php foreach ($athletes as $athlete): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h3 class="card-title"><?= $athlete['name'] ?></h3>
                                    </div>
                                    <div class="card-body">
                                    <?php if ($athlete['profile_image']) : ?>
                                    <img class="profile_images" src="<?= base_url($athlete['profile_image']) ?>" alt="Profile Image" class="img-responsive">
                                    <?php else : ?>
                                        <p>No profile image available</p>
                                    <?php endif; ?>
                                        <p>Name: <?= $athlete['username'] ?></p>
                                        <p>Date of Birth: <?= $athlete['dob'] ?></p>
                                        <p>Height: <?= $athlete['height'] ?></p>
                                        <p>Weight: <?= $athlete['weight'] ?></p>
                                        <p>Country: <?= $athlete['country'] ?></p>
                                        <a class="btn btn-primary" href="<?= base_url("/coach/view-athlete-portfolio/{$athlete['id']}"); ?>">
                                            View Portfolio
                                        </a>
                                        <!-- Add other athlete details as needed -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main content -->
    </div>
</div>
<?= $this->endSection() ?>





