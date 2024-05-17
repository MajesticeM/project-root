<?php

namespace App\Controllers;

use App\Models\UserModel; 

use CodeIgniter\Controller;
use TCPDF;


class AuthController extends Controller
{
    protected $userModel;
    protected $validation;

    public function __construct()
    {
        // Load the form helper
        helper('form','url');
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function registerPage()
    {
        return view('auth/register');
    }
    //Forgot password functionality
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }
    
    // app/Controllers/AuthController.php


    // app/Controllers/AuthController.php

public function resetPassword($token)
{
    // Check if the token exists
    $userModel = new UserModel(); // Replace with your actual User model
    $user = $userModel->where('reset_token', $token)->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'Invalid reset token.');
    }

    // Process the password reset
    if ($this->request->getMethod() === 'post') {
        $password = $this->request->getPost('password');
        
        // Validate the password as needed

        // Update the user's password and clear the reset token
        $userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => null,
        ]);

        return redirect()->to('/login')->with('success', 'Password reset successful. You can now log in with your new password.');
    }

    return view('auth/reset_password');
}

    //End of forgot password functionality

    public function sendPasswordResetLink()
    {
        // Validate the email input
        $validationRules = [
            'email' => 'required|valid_email',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', 'Invalid email address.');
        }
    
        // Fetch user by email
        $email = $this->request->getPost('email');
        $userModel = new UserModel(); // Replace with your actual User model
        $user = $userModel->where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'User not found.');
        }
    
        // Generate a unique token and store it in the database
        $token = bin2hex(random_bytes(16)); // Generate a random token
    
        // Check if 'id' is present in the user data
        if (isset($user['id'])) {
            log_message('debug', 'Data to be updated: ' . print_r(['reset_token' => $token], true));
            $userModel->update($user['id'], ['reset_token' => $token]);
        } else {
            // Handle the case where 'id' is not present
            return redirect()->back()->withInput()->with('error', 'Invalid user data.');
        }
    
        // Send an email to the user with a link containing the token
        // You need to implement the email sending logic here
    
        return redirect()->to('/login')->with('success', 'Password reset link sent to your email.');
    }
    

    public function searchAthlete()
{
    // Get the search query from the URL parameter
    $searchQuery = $this->request->getGet('q');

    // Load the UserModel
    $userModel = new UserModel();

    // Perform the search based on the athlete's name
    $athletes = $userModel->like('name', $searchQuery)->where('user_type', 'athlete')->findAll();

    // Pass the search results to the coach search view
    return view('dashboard/coach_search', ['athletes' => $athletes, 'searchQuery' => $searchQuery]);
}

    public function viewAthletePortfolio($athleteId)
    {
         // Load the UserModel
    $userModel = new UserModel();

    // Retrieve athlete details from the database
    $athleteProfile = $userModel->find($athleteId);

    // Pass the athlete profile to the view
    return view('dashboard/athlete_portfolio', ['athleteProfile' => $athleteProfile]);
    }


    // Add this method to your AuthController.php or another relevant controller
    public function downloadPortfolio($athleteId)
    {
        // Load the AthleteModel (replace 'AthleteModel' with your actual model class)
        $athleteModel = new UserModel();
    
        // Fetch the athlete data from the database based on the athleteId
        $athlete = $athleteModel->find($athleteId);
    
        // Check if the athlete exists
        if (!$athlete) {
            // Handle case where athlete is not found (e.g., show an error message)
            return redirect()->back()->with('error', 'Athlete not found');
        }
    
        // Assuming you have a method to generate the portfolio content, replace 'generatePortfolioContent' with your actual method
        $portfolioContent = $this->generatePortfolioContent($athlete);
    
        // Set the file name for the download
        $filename = 'athlete_portfolio_' . $athlete['id'] . '.pdf';
    
        // Generate headers to force download
        $response = service('response');
        $response->setHeader('Content-Type', 'application/pdf');
        $response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
    
        // Output the portfolio content
        $response->setBody($portfolioContent);
    
        return $response;
    }
    
    // Add this method to your AuthController.php or a helper file
    private function generatePortfolioContent($athlete)
    {
        // Create a new TCPDF instance
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator('Your Application Name');
        $pdf->SetAuthor('Athlete Name');
        $pdf->SetTitle("Athlete Portfolio: {$athlete['name']}");
        // Add a page
        $pdf->AddPage();

        // Example: Format the athlete data as content in the PDF
        $content = "<b>Athlete Name:</b> {$athlete['name']}<br>";
        $content .= "<b>Date of Birth:</b> {$athlete['dob']}<br>";
        $content .= "<b>Bio:</b> {$athlete['bio']}<br>";
        $content .= "<b>Height:</b> {$athlete['height']}<br>";
        $content .= "<b>Weight:</b> {$athlete['weight']}<br>";
        $content .= "<b>Country:</b> {$athlete['country']}<br>";
        $content .= "<b>Gender:</b> {$athlete['gender']}<br>";
        $content .= "<b>Teams Played:</b> {$athlete['teams_played']}<br>";
        $content .= "<b>What makes you different:</b> {$athlete['what_makes_different']}<br>";
        $content .= "<b>Why compete in college:</b> {$athlete['why_compete_college']}<br>";
        $content .= "<b>High school:</b> {$athlete['high_school']}<br>";
        $content .= "<b>Prospective university:</b> {$athlete['prospective_university']}<br>";
        $content .= "<b>SAT:</b> {$athlete['sat_total_score']}<br>";
        $content .= "<b>GPA:</b> {$athlete['gpa']}<br>";
        // Add more fields as needed

        // Output the content on the PDF
        $pdf->writeHTML($content, true, false, true, false, '');

        // Output as a string
        $pdfContent = $pdf->Output('', 'S');

        return $pdfContent;
    }
    
    
    public function register()
    {
        // Handle user registration
        $email = $this->request->getPost('email');

        // Check if the email already exists
        if ($this->userModel->emailExists($email)) {
            return redirect()->to('/register')->with('error', 'Email address is already in use.');
        }

        // Save user type (athlete or coach) in the database
        // Example code (add database interaction as needed)

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'user_type' => $this->request->getPost('user_type'),
        ];

        // Save $data to the database using a model
        $userModel = new \App\Models\UserModel();
        $userModel->insert($data);

        return redirect()->to('/');
    }
    
    /*public function register()
    {
        $validation = \Config\Services::validation();
        $validationRules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[5]|is_unique[users.username]',
            // Add rules for other fields if needed
        ];

        // Run validation
        if ($this->request->getMethod() === 'post') {
            if (!$validation->run($validationRules)) {
                return view('auth/register', ['validation' => $validation]);
            }

            // Handle user registration
            $email = $this->request->getPost('email');

            // Check if the email already exists
            if ($this->userModel->emailExists($email)) {
                return redirect()->to('/registerPage')->with('error', 'Email address is already in use.');
            }

            // Prepare data for insertion
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'user_type' => $this->request->getPost('user_type'),
                // Add other fields here if needed
            ];

            // Dump and die to inspect data
            dd($data);

            // Save $data to the database using a model
            $userModel = new UserModel();
            $userModel->insert($data);

            return redirect()->to('/')->with('success', 'Registration successful. Please log in.');
        }

        return view('auth/register');
    }*/

public function login()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Load the UserModel
    $userModel = new UserModel();

    // Retrieve user information from the database
    $user = $userModel->where('username', $username)->first();

    // Assuming $userData contains user information including 'id'
    $userId = $user['id'];

    // Set user ID in the session
    $session = session();
    $session->set('user_id', $userId);

    // Debug logs
    log_message('debug', 'User Data: ' . print_r($user, true));
    log_message('debug', 'User ID set in session: ' . $userId);

    if ($user && password_verify($password, $user['password'])) {
        // Valid credentials

        // Check if the user is an admin
        if ($user['is_admin']) {
            return redirect()->to("/admin");
        }

        // Redirect to the appropriate dashboard based on user type
        $userType = $user['user_type'];
        if ($userType === 'athlete') {
            return redirect()->to("/athlete-dashboard");
        } elseif ($userType === 'coach') {
            return redirect()->to("/coach-dashboard");
        }
    } else {
        // Invalid credentials
        return redirect()->to('/')->with('error', 'Invalid username or password');
    }

    // Additional logic for non-admin users
    if ($this->request->getMethod() === 'post') {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = (bool)$this->request->getPost('remember');

        // Your authentication logic (check email and password)

        if ($authenticated) {
            // Set session and remember user if "Remember Me" is checked
            $this->setUserSession($userData);

            if ($remember) {
                $this->rememberUser($userData);
            }

            // Redirect to the dashboard or any other page
            return redirect()->to('/dashboard');
        } else {
            // Login failed
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }
    }

    return view('auth/login');
}

    public function updateProfile()
    {
         // Load the athlete's existing profile information from the database
         $session = session();
         $userId = $session->get('user_id');
         $userModel = new UserModel();
         $athleteProfile = $userModel->find($userId);
         // Adjust the file path to be relative to the 'public' folder
         $athleteProfile['profile_image'] = base_url('uploads/' . $athleteProfile['profile_image']);
         // Add debugging output
        if ($athleteProfile['profile_image']) {
            $imagePath = base_url($athleteProfile['profile_image']);
            error_log("Profile Image Path: $imagePath");
        } else {
            error_log("No Profile Image");
        }
                // Render the update-profile view with the existing profile information
         echo view('update-profile', ['athleteProfile' => $athleteProfile]);
    }

   

    public function saveProfile()
    {
        // Retrieve user ID from the session
        $session = session();
        $userId = $session->get('user_id');
        // Log the user ID for debugging
        log_message('debug', 'User ID from session: ' . $userId);
    
        $userModel = new UserModel();
    
        // Check if the user has existing profile data
        $existingProfile = $userModel->find($userId);
    
        // Log form data for debugging
        log_message('debug', 'Form Data: ' . print_r($this->request->getPost(), true));
    
        if ($this->request->getPost() && $existingProfile) {
            // Form data is submitted, and the user has existing profile data, perform update
        
            // Get the update data
            $updateData = [
                        'name'                  => $this->request->getPost('name'),
                        'dob'                   => $this->request->getPost('dob'),
                        'height'                => $this->request->getPost('height'),
                        'weight'                => $this->request->getPost('weight'),
                        'country'               => $this->request->getPost('country'),
                        'gender'                => $this->request->getPost('gender'),
                        'bio'                   => $this->request->getPost('bio'),
                        'teams_played'          => $this->request->getPost('teams_played'),
                        'what_makes_different'  => $this->request->getPost('what_makes_different'),
                        'why_compete_college'   => $this->request->getPost('why_compete_college'),
                        //'college_goals'         => $this->request->getPost('college_goals'),
                        'high_school'           => $this->request->getPost('high_school'),
                        'prospective_university'=> $this->request->getPost('prospective_university'),
                        'sat_total_score'       => $this->request->getPost('sat_total_score'),
                        'gpa'                   => $this->request->getPost('gpa'),
                        'academic_certificates'  => $this->request->getPost('academic_certificates'),
                        'achievements'          => $this->request->getPost('achievements'),
                        'cellphone_number'      => $this->request->getPost('cellphone_number'),
                        'email'                 => $this->request->getPost('email'),
                        'social_media'          => $this->request->getPost('social_media'),
                        'sport'                 => $this->request->getPost('sport'), // Add the sport field
            ];
        
            // Handle image upload
            $profileImage = $this->request->getFile('profile_image');
        
            if ($profileImage->isValid() && !$profileImage->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $profileImage->move(ROOTPATH . '/public/uploads', $newName);
        
                // Store the image path in the database
                $updateData['profile_image'] = 'uploads/' . $newName;
                if ($updateData) {
                    var_dump("data stored in database");
                }
                else
                {
                    var_dump("data not stored in database");
                }
            }

            /*$Img01 = $this->request->getFile('img1');
        
            if ($Img01->isValid() && !$Img01->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img01->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['img1'] = 'galleryImages/' . $newName;
              
            }
            $Img02 = $this->request->getFile('img2');
        
            if ($Img02->isValid() && !$Img02->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img02->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['img2'] = 'galleryImages/' . $newName;
              
            }
            $Img03 = $this->request->getFile('img3');
        
            if ($Img03->isValid() && !$Img03->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img03->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['img3'] = 'galleryImages/' . $newName;
              
            }*/
        
            // Log update data for debugging
            log_message('debug', 'Update Data: ' . print_r($updateData, true));
        
            // Check if there are changes in the data before attempting to update
            $changedFields = [];
        
            foreach ($updateData as $field => $value) {
                if ($existingProfile[$field] != $value) {
                    $changedFields[$field] = $value;
                }
            }
        
            // Log changed fields for debugging
            log_message('debug', 'Changed Fields: ' . print_r($changedFields, true));
        
            // Check if there are changes in the data before attempting to update
            if (!empty($changedFields)) {
                // Log the generated SQL query
                $query = $userModel->getLastQuery();
                log_message('debug', 'Update Query: ' . $query);
        
                // Specify the $dataToUpdate array in the update method
                $userModel->update($userId, $changedFields);
                return redirect()->to("/athlete-dashboard")->with('success', 'Profile updated successfully');
            } else {
                return redirect()->to("/athlete-dashboard")->with('info', 'No changes in profile data');
            }
        } elseif ($this->request->getPost()) {
            // Form data is submitted, and the user doesn't have existing profile data, perform insert
            $insertData = [
                        'name'                  => $this->request->getPost('name'),
                        'dob'                   => $this->request->getPost('dob'),
                        'height'                => $this->request->getPost('height'),
                        'weight'                => $this->request->getPost('weight'),
                        'country'               => $this->request->getPost('country'),
                        'gender'                => $this->request->getPost('gender'),
                        'bio'                   => $this->request->getPost('bio'),
                        'teams_played'          => $this->request->getPost('teams_played'),
                        'what_makes_different'  => $this->request->getPost('what_makes_different'),
                        'why_compete_college'   => $this->request->getPost('why_compete_college'),
                        //'college_goals'         => $this->request->getPost('college_goals'),
                        'high_school'           => $this->request->getPost('high_school'),
                        'prospective_university'=> $this->request->getPost('prospective_university'),
                        'sat_total_score'       => $this->request->getPost('sat_total_score'),
                        'gpa'                   => $this->request->getPost('gpa'),
                        'academic_certificates'  => $this->request->getPost('academic_certificates'),
                        'achievements'          => $this->request->getPost('achievements'),
                        'cellphone_number'      => $this->request->getPost('cellphone_number'),
                        'email'                 => $this->request->getPost('email'),
                        'social_media'          => $this->request->getPost('social_media'),
                        'sport'                 => $this->request->getPost('sport'), // Add the sport field
            ];
        
            // Handle image upload
            $profileImage = $this->request->getFile('profile_image');
        
            if ($profileImage->isValid() && !$profileImage->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $profileImage->move(ROOTPATH . '/uploads', $newName);
        
                // Store the image path in the insert data
                $insertData['profile_image'] = 'uploads/' . $newName;
            }

            $Img01 = $this->request->getFile('img1');
        
            if ($Img01->isValid() && !$Img01->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img01->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['profile_image'] = 'galleryImages/' . $newName;
              
            }
            $Img02 = $this->request->getFile('img1');
        
            if ($Img02->isValid() && !$Img02->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img02->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['profile_image'] = 'galleryImages/' . $newName;
              
            }
            $Img03 = $this->request->getFile('img3');
        
            if ($Img03->isValid() && !$Img03->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $Img03->move(ROOTPATH . '/public/galleryImages', $newName);
        
                // Store the image path in the database
                $updateData['profile_image'] = 'galleryImages/' . $newName;
              
            }
        
        
            // Log insert data for debugging
            log_message('debug', 'Insert Data: ' . print_r($insertData, true));
        
            $userModel->insert($insertData);
            return redirect()->to("/athlete-dashboard")->with('success', 'Profile created successfully');
        } else {
            // No form data submitted, handle accordingly
            return redirect()->back()->withInput()->with('error', 'No data submitted.');
        }
    }
    


    public function athleteDashboard()
    {
        $session = session();
        $userId = $session->get('user_id');
        $userModel = new UserModel();
        $athleteProfile = $userModel->find($userId);

        // Pass the athlete profile to the view
        return view('dashboard/athlete', ['athleteProfile' => $athleteProfile]);
    }

    public function coachDashboard()
    {
        // Load the UserModel
        $session = session();
        $userId = $session->get('user_id');
        $userModel = new UserModel();

        // Retrieve all athletes from the database (replace 'coach' with your authentication logic)
        //$athletes = $userModel->where('user_type', 'athlete')->findAll();
        $athletes = $userModel->where(['user_type' => 'athlete', 'status' => 'approved'])->findAll();

        // Render the coach dashboard view with the list of athletes
        echo view('dashboard/coach', ['athletes' => $athletes]);
    }


    public function downloadPDF($athleteId)
    {
        // Load the UserModel
        $userModel = new UserModel();

        // Retrieve the athlete's profile from the database
        $athleteProfile = $userModel->find($athleteId);

        if ($athleteProfile) {
            // Load the mPDF library
            $mpdf = new \Mpdf\Mpdf();

            // Generate PDF content
            $pdfContent = view('pdf/athlete_profile', ['athleteProfile' => $athleteProfile]);

            // Write PDF content
            $mpdf->WriteHTML($pdfContent);

            // Output the PDF for download
            $mpdf->Output('Athlete_Profile.pdf', 'D');
        } else {
            // Handle error, athlete not found
            return redirect()->to('dashboard/coach')->with('error', 'Athlete not found.');
        }
    }
}
