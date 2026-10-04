<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function studentData()
    {
        return [
            'title'      => 'Student Information',
            'student_id' => 'MCC2024-00167',
            'name'       => 'Marry Grace Ivy B. Reyes',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3-F4',
            'email'      => 'marrygraceivyr@gmail.com',
            'address'    => 'Tigkan, Naujan, Oriental Mindoro',
            'contact'    => '09924965812',
            'hobbies'    => 'Watching Movies',
            'facebook'   => 'https://www.facebook.com/ykshxna?mibextid=wwXIfr&rdid=xq72j7vjhdsNPBav&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F19Jy24zxwz%2F%3Fmibextid%3DwwXIfr'
        ];
    }

    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Going to Home alone does not unlock the protected profile.
        $data = $this->studentData();
        $data['notice'] = $_SESSION['student_notice'] ?? null;
        unset($_SESSION['student_notice']);

        $this->call->view('student/home', $data);
    }

    public function openProfile()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Same functional flow as the reference LAVALUST:
        // clicking Open Protected Profile gives a short-lived one-time pass.
        $_SESSION['student_profile_pass'] = bin2hex(random_bytes(16));
        $_SESSION['student_profile_pass_time'] = time();

        header('Location: ' . site_url('student/profile'));
        exit;
    }

    public function profile()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $data = $this->studentData();
        $data['title'] = 'Student Profile';
        $data['middleware_message'] =
            $_SESSION['middleware_message'] ?? 'Access verified by StudentMiddleware.';
        unset($_SESSION['middleware_message']);

        $this->call->view('student/profile', $data);
    }
}
?>
