<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'email', 'password', 'profile_image', 'is_admin', 'img1', 'img2', 'img3', 'user_type', 'teams_played', 'what_makes_different',
        'why_compete_college', 'high_school', 'prospective_university', 'sat_total_score', 'gpa',
        'academic_certificates', 'achievements', 'cellphone_number', 'sport', 'status', 'dob', 'social_media','wingspan','height','weight','country','sportReasons',
        'longTermGoals','ParentEmail','Parentcel','consent','achievementTeams','teamEvents','podiumFinishes','records','otherAchievements','achievementAge','podiumPlacing'
    ];
    
    public function emailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    public function isAdmin($userId)
    {
        $user = $this->find($userId);

        return $user && $user['is_admin'] == 1;
    }

}


