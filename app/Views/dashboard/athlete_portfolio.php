<?= $this->extend('layouts/maincoach') ?>

<?= $this->section('content') ?>
<style>

.hero-section {
        background-image: url('<?= base_url('/uploads/1706080965_edf0482d5c62e84ba0c2.jpg'); ?>');
        background-size: cover;
        background-position: center;
        color: black; /* Set text color to white or appropriate contrast color */
        text-align: center;
        padding: 100px 0; /* Adjust padding as needed */
    }

    .hero-section h1 {
        margin-bottom: 20px;
        font-size: 36px; /* Adjust font size as needed */
    }

    .profile-header {
        text-align: center;
        background-color: #F4F4F4;
        padding: 20px;
        border-bottom: 1px solid #E0E0E0;
    }

    .profile-header img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 20px;
        border: 3px solid #ffffff; /* Add a border to the profile picture */
    }

    .profile-info {
        background-color: #ffffff;
        border: 1px solid #E0E0E0;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info h3 {
        color: #333333;
    }

    .profile-info p {
        color: #666666;
    }

    .profile-tabs {
        margin-top: 20px;
    }

    .tab-button {
        background-color: #0077B5; /* LinkedIn Blue */
        color: #ffffff;
        border: 1px solid #0077B5;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }

    .tab-button:hover {
        background-color: #005983; /* Darker shade on hover */
    }

    .tab-content {
        display: none;
        background-color: #ffffff;
        border: 1px solid #E0E0E0;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    li {
        list-style: none;
    }

    .add-certificate-btn,
    .add-achievement-btn {
        background-color: #0077B5; /* LinkedIn Blue */
        color: #ffffff;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
    }
    .GalleryImg
    {
        margin:30px;
        
        max-width: 140px;
    }
</style>


<div class="row">
    <div class="col-lg-9 profile-header text-left">
    <?php if ($athleteProfile['profile_image']) : ?>
    <img src="<?= base_url($athleteProfile['profile_image']) ?>" alt="Profile Image" class="img-responsive">
    <?php else : ?>
        <p>No profile image available</p>
    <?php endif; ?>
        <h3><?= $athleteProfile['name']; ?></h3>
        <p><b>Discipline:</b> <?= $athleteProfile['sport']; ?></p>
        <p><b>Prospect Institution:</b> <?= $athleteProfile['prospective_university']; ?></p>
    </div>

    <!-- Update Portfolio Button -->
    <div class="col-lg-3 profile-header text-right" >
        <a class="btn btn-primary" href="<?= base_url("/download-portfolio/{$athleteProfile['id']}"); ?>" download> Download Portfolio</a>
        <br>
        <button style="margin-top:10px" class="btn btn-primary"><a href="<?= base_url('/coach-dashboard') ?>" style="color: white;">Back to dashboard</a></button>
        <div class="social-media-icons">
    <a href="<?= $athleteProfile['social_media'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
    <a href="<?= $athleteProfile['social_media'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="<?= $athleteProfile['social_media'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
    <!-- Add other social media icons as needed -->
</div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-3 profile-info">
            <h3>Basic Info</h3>
            <ul>
                <li><b>Date of birth:</b> <?= $athleteProfile['dob']; ?></li>
                <li><b>Height:</b> <?= $athleteProfile['height']; ?></li>
                <li><b>Weight:</b> <?= $athleteProfile['weight']; ?></li>
                <li><b>Gender:</b> <?= $athleteProfile['gender']; ?></li>
                <li><b>Country:</b> <?= $athleteProfile['country']; ?></li>
            </ul>
            
        </div>
        <div class="col-lg-9">
            <div class="profile-tabs">
                <button class="tab-button" onclick="openTab('about')">About</button>
                <button class="tab-button" onclick="openTab('gallery')">Gallery</button>
                <button class="tab-button" onclick="openTab('academic')">Academics</button>
                <button class="tab-button" onclick="openTab('contact')">Contact</button>
                <button class="tab-button" onclick="openTab('achievements')">Achievements</button>
            </div>

            <div id="about" class="tab-content" style="display: block;">
                <h1>About</h1>
                <p><?= $athleteProfile['bio']; ?></p>
                <p><b>What Makes You Different:</b> <?= $athleteProfile['what_makes_different']; ?></p>
                <p><b>Why Compete in College:</b> <?= $athleteProfile['why_compete_college']; ?></p>
            </div>

            <div id="gallery" class="tab-content">
                <h1>Gallery</h1>
                <!-- Add Gallery section content here -->
                <div class="row">
                    <div class="col-lg-4" style="">
                    <?php if ($athleteProfile['img1']) : ?>
                    <img class="GalleryImg" src="<?= base_url($athleteProfile['img1']) ?>" alt="Profile Image" class="img-responsive">
                    <?php else : ?>
                        <p>No profile image available</p>
                    <?php endif; ?>
                    </div>
                     <div class="col-lg-4">
                    <?php if ($athleteProfile['img2']) : ?>
                    <img class="GalleryImg" src="<?= base_url($athleteProfile['img2']) ?>" alt="Profile Image" class="img-responsive">
                    <?php else : ?>
                        <p>No profile image available</p>
                    <?php endif; ?>
                    </div>
                     <div class="col-lg-4">
                    <?php if ($athleteProfile['img3']) : ?>
                    <img class="GalleryImg" src="<?= base_url($athleteProfile['img3']) ?>" alt="Profile Image" class="img-responsive">
                    <?php else : ?>
                        <p>No profile image available</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="academic" class="tab-content">
                <h1>Academics</h1>
                <p><b>Academic Certificates:</b> <?= $athleteProfile['academic_certificates']; ?></p>
                <p><b>Name of High School:</b> <?= $athleteProfile['high_school']; ?></p>
                <p><b>Prospective University:</b> <?= $athleteProfile['prospective_university']; ?></p>
                <p><b>SAT Total Score:</b> <?= $athleteProfile['sat_total_score']; ?></p>
                <p><b>GPA:</b> <?= $athleteProfile['gpa']; ?></p>
            </div>

            <div id="contact" class="tab-content">
                <h1>Contact</h1>
                <p><b>Cellphone Number:</b> <?= $athleteProfile['cellphone_number']; ?></p>
                <p><b>Email:</b> <?= $athleteProfile['email']; ?></p>
                <p><b>Social Media:</b> <?= $athleteProfile['social_media']; ?></p>
            </div>

            <div id="achievements" class="tab-content">
                <h1>Achievements</h1>
                <p><b>Achievements:</b> <?= $athleteProfile['achievements']; ?></p>
                <p><b>Teams Played:</b> <?= $athleteProfile['teams_played']; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for tab functionality -->
<script>
    function openTab(tabName) {
        var i;
        var tabContent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
</script>
</div>
<div class="container">

<?= $this->endSection() ?>
