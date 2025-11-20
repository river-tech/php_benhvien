<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        if (!empty($_SESSION['user'])) {
            $this->redirect('/vaccination/create');
        }
        $error = $_SESSION['auth_error'] ?? null;
        unset($_SESSION['auth_error']);
        $this->render('auth/login', compact('error'));
    }

    public function login(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = Admin::findByCredentials($this->config, $username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            $this->redirect('/vaccination/create');
        } else {
            $_SESSION['auth_error'] = 'Invalid username and password';
            $this->redirect('/login');
        }
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/login');
    }
}
