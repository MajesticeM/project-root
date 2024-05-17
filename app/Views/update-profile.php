<?= $this->extend('layouts/maincoach') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top:70px">
    <!-- Main content -->

<!-- Update Profile Form -->
<?= form_open_multipart('/save-profile', ['class' => 'form-horizontal']) ?>
                         <!-- File input for profile image -->
                       
                        <div class="row">
                            <div class="col-lg-12">   
                            <h4>General Information</h4>
                         <hr/>
                         <div class="form-group">
                              <!-- Add other fields here -->
                              <div class="form-group">
                                    <label for="name" class="control-label">Name & surname</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name and surname" value="<?= old('name', $athleteProfile['name']) ?>">
                                    </div>
                                </div>
                                    <!-- Cellphone Number -->
                            <div class="form-group">
                                <label for="cellphone_number" class="control-label">Cellphone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="cellphone_number" id="cellphone_number" class="form-control" placeholder="Enter cellphone number" value="<?= old('cellphone_number', $athleteProfile['cellphone_number']) ?>">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="<?= old('email', $athleteProfile['email']) ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="country" class="control-label">Which country are you from?</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Enter your country" value="<?= old('country', $athleteProfile['country']) ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="control-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="male" <?= $athleteProfile['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                                            <option value="female" <?= $athleteProfile['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dob" class="control-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="dob" id="dob" class="form-control" value="<?= old('dob', $athleteProfile['dob']) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="height" class="control-label">Height (cm)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="height" id="height" class="form-control" placeholder="Enter your height" value="<?= old('height', $athleteProfile['height']) ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="weight" class="control-label">Weight (kg)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter your weight" value="<?= old('weight', $athleteProfile['weight']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="weight" class="control-label">Wingspan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="wingspan" id="wingspan" class="form-control" placeholder="Enter your weight" value="<?= old('wingspan', $athleteProfile['wingspan']) ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile_image" class="control-label">Upload Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image" id="profile_image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                                <h4><i class="fas fa-envelope"></i> Contact </h4>
                                <hr/>
                <!-- Achievements (Normal Textboxes) -->
                <div>
                    <div class="form-group">
                        <label class="control-label">Email address of parents (all athletes under the age of 18) as well as the athlete </label>
                        <input type="email" name="parentEmail" id="ParentEmail" class="form-control" placeholder="Enter parent's email" value="<?= old('ParentEmail', $athleteProfile['ParentEmail']) ?>">
                    
                    </div>
                    <div class="form-group">
                        <label class="control-label">Parent cellphone number </label>
                        <input type="tel" name="parentcel" id="Parentcel" class="form-control" placeholder="Enter parent's cellphone number" value="<?= old('Parentcel', $athleteProfile['Parentcel']) ?>">
                    
                    </div>
                    <div class="form-group">
                        <label class="control-label">Signed consent form by parents </label>
                        <input type="file" name="consent" id="consent" class="form-control" placeholder="Consent form" value="<?= old('consent', $athleteProfile['consent']) ?>">
                    </div>
                
                </div>
                            <h4><i class="fas fa-images"></i> Gallery </h4>
                                <hr/>
                                <!--Gallery images--->
                                <div class="form-group">
                                    <label for="img1" class="control-label">Image 1</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="img1" id="img1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="img2" class="control-label">Image 2</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="img2" id="img2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="img3" class="control-label">Image 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="img3" id="img3" class="form-control">
                                    </div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Sport</label>
                                    <div class="col-sm-10">   
                                    <input type="text" name="sport" class="form-control" placeholder="Enter your sport" value="<?= $athleteProfile['sport'] ?? '' ?>">
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Reasons for the love of the specific sport</label>
                                    <div class="col-sm-10">   
                                    <textarea name="sportReasons" id="sportReasons" class="form-control" placeholder="Enter your reasons here"><?= old('sportReasons', $athleteProfile['sportReasons']) ?></textarea>
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="col-lg-6">
                            <!-- Add other fields here -->
                            <h4><i class="fas fa-info-circle"></i> About </h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="bio" class="control-label">Tell us about yourself(<i>who are you</i>)</label>
                                    <div class="col-sm-10">
                                        <textarea name="bio" id="bio" class="form-control" placeholder="Enter your bio"><?= old('bio', $athleteProfile['bio']) ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bio" class="control-label">What are your long term goals? </label>
                                    <div class="col-sm-10">
                                        <textarea name="longTermGoals" id="longTermGoals" class="form-control" placeholder="Enter your long term goals"><?= old('longTermGoals', $athleteProfile['longTermGoals']) ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="teams_played" class="control-label">Teams Played</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="teams_played" id="teams_played" class="form-control" placeholder="Enter teams played" value="<?= old('teams_played', $athleteProfile['teams_played']) ?>">
                                </div>
                                 <!-- What Makes You Different -->
                                <div class="form-group">
                                    <label for="what_makes_different" class="control-label">What Makes You Different</label>
                                    <div class="col-sm-10">
                                        <textarea name="what_makes_different" id="what_makes_different" class="form-control" placeholder="Enter what makes you different"><?= old('what_makes_different', $athleteProfile['what_makes_different']) ?></textarea>
                                    </div>
                                </div>
                                 <!-- Why Compete in College -->
                        <div class="form-group">
                            <label for="why_compete_college" class="control-label">Why Compete in College</label>
                            <div class="col-sm-10">
                                <textarea name="why_compete_college" id="why_compete_college" class="form-control" placeholder="Enter why you want to compete in college"><?= old('why_compete_college', $athleteProfile['why_compete_college']) ?></textarea>
                            </div>
                        </div>
                        <h4><i class="fas fa-graduation-cap"></i> Academics </h4>
                        <hr/>
<!-- High School -->
<div class="form-group">
    <label for="high_school" class="control-label">Which school/s did you attend?</label>
    <div class="col-sm-10">
       
        <textarea name="high_school" id="high_school" class="form-control" placeholder="Schools attended"><?= old('what_makes_different', $athleteProfile['what_makes_different']) ?></textarea>
    </div>
</div>
<!-- Prospective University -->
<div class="form-group">
    <label for="prospective_university" class="control-label">Fully motivate why you want to attend a school in the USA (fully motivated),</label>
    <div class="col-sm-10">
        <textarea name="prospective_university" id="prospective_university" class="form-control" placeholder="Enter your motivation"><?= old('prospective_university', $athleteProfile['prospective_university']) ?></textarea>
    </div>
</div>

<!-- SAT Total Score -->
<div class="form-group">
    <label for="sat_total_score" class="control-label">SAT Total Score</label>
    <div class="col-sm-10">
        <input type="text" name="sat_total_score" id="sat_total_score" class="form-control" placeholder="Enter SAT total score" value="<?= old('sat_total_score', $athleteProfile['sat_total_score']) ?>">
    </div>
</div>

<!-- GPA -->
<div class="form-group">
    <label for="gpa" class="control-label">GPA</label>
    <div class="col-sm-10">
        <input type="text" name="gpa" id="gpa" class="form-control" placeholder="Enter GPA" value="<?= old('gpa', $athleteProfile['gpa']) ?>">
    </div>
</div>


             
                <!-- Achievements (Normal Textboxes) -->
                <div>
                <div class="form-group">
                    <label class="control-label">Attach all high school transcripts (each completed year), </label>
                    <div id="academic_certificates" class="container">
                        <?php if (is_array($athleteProfile['academic_certificates'])) : ?>
                            <?php foreach ($athleteProfile['academic_certificates'] as $certificate) : ?>
                                <div class="col-sm-10">
                                <input type="file" name="academic_certificates[]" class="form-control" placeholder="Enter academic certificate" value="<?= $certificate ?>">
                            </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-sm-10">
                            <input type="file" name="academic_certificates[]" class="form-control" placeholder="Enter academic certificate">
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Note: Removed the "Add Academic Certificate" button for normal textboxes -->
                </div>
                <div class="form-group">
                    <label class="control-label">Latest available transcript if year is not completed (All transcripts must be in English and certified by the relevant school)</label>
                    <div id="academic_certificates" class="container">
                        <?php if (is_array($athleteProfile['academic_certificates'])) : ?>
                            <?php foreach ($athleteProfile['academic_certificates'] as $certificate) : ?>
                                <div class="col-sm-10">
                                <input type="file" name="academic_certificates[]" class="form-control" placeholder="Enter academic certificate" value="<?= $certificate ?>">
                            </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-sm-10">
                            <input type="file" name="academic_certificates[]" class="form-control" placeholder="Enter academic certificate">
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Note: Removed the "Add Academic Certificate" button for normal textboxes -->
                </div>
                <div class="form-group">
                    <label class="control-label">Add any internships that you have completed (it is a bonus) and attach letter from employer.</label>
                    <div id="achievements" class="container">
                        <?php if (is_array($athleteProfile['achievements'])) : ?>
                            <?php foreach ($athleteProfile['achievements'] as $achievement) : ?>
                                <div class="col-sm-10">
                                <input type="file" name="achievements[]" class="form-control" placeholder="Enter achievements" value="<?= $achievement ?>">
                            </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-sm-10">
                            <input type="file" name="achievements[]" class="form-control" placeholder="Enter achievements">
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Note: Removed the "Add Achievement" button for normal textboxes -->
                </div>
                </div>
                

                <h4>Achievements</h4>
                <div>
                    <div class="form-group">
                        <label class="control-label">List your teams </label>
                        <input type="text" name="achievementTeams" id="achievementTeams" class="form-control" placeholder="Enter your teams" value="<?= old('achievementTeams', $athleteProfile['achievementTeams']) ?>">
                    
                    </div>
                    <div class="form-group">
                        <label class="control-label">The event and the age group that your team/s represented internationally </label>
                        <input type="text" name="teamEvents" id="teamEvents" class="form-control"  value="<?= old('teamEvents', $athleteProfile['teamEvents']) ?>">
                    
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nationally and provisional, mention podium placings at the events only with times / distances / size of implement </label>
                        <input type="text" name="podiumFinishes" id="podiumFinishes" class="form-control"  value="<?= old('podiumFinishes', $athleteProfile['podiumFinishes']) ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">List any record held at international, national and provisional level, the year achieved with times / distances / size of implement</label>
                        <input type="text" name="records" id="records" class="form-control"  value="<?= old('records', $athleteProfile['records']) ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">List any other achievements at national and international that is not related to your sport</label>
                        <input type="text" name="otherAchievements" id="otherAchievements" class="form-control"  value="<?= old('otherAchievements', $athleteProfile['otherAchievements']) ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">What age group did you achieve the national placement?</label>
                        <input type="text" name="achievementAge" id="achievementAge" class="form-control"  value="<?= old('achievementAge', $athleteProfile['achievementAge']) ?>">
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">List your podium placing at national championships and year achieved, if weight is applicable what weight in kilograms i.e. discus 1.5kg</label>
                        <input type="text" name="podiumPlacing" id="podiumPlacing" class="form-control"  value="<?= old('podiumPlacing', $athleteProfile['podiumPlacing']) ?>">
                    </div>
                </div>
                 <!-- Submit button -->
                 <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save Profile</button>
                            </div>
                        </div>

                        <?= form_close() ?>
                        </div>

                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                        <!-- Teams Played -->
                       

                       

                       
    </div>
    <div class="col-lg-6">

                                <!-- Academic Certificates (Normal Textboxes) -->
              


                    
                       
</div>
</div>

    
</div>


<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                  
                    <div class="box-body">
                        <!-- Display form errors (if any) -->
                        <?php if (session()->has('error')) : ?>
                            <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif; ?>

                        <!-- Display success or info messages (if any) -->
                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success"><?= session('success') ?></div>
                        <?php elseif (session()->has('info')) : ?>
                            <div class="alert alert-info"><?= session('info') ?></div>
                        <?php endif; ?>

                        
         
                      

                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    // Function to add more academic certificates textboxes
    function addAcademicCertificate() {
        var container = document.getElementById('academic_certificates');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'academic_certificates[]';
        input.className = 'form-control';
        input.placeholder = 'Enter academic certificate';
        container.appendChild(input);
    }

    function addAchievement() {
        var container = document.getElementById('achievements');
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'achievements[]';
        input.className = 'form-control';
        input.placeholder = 'Enter achievement';
        container.appendChild(input);
    }
</script>


<?= $this->endSection() ?>
