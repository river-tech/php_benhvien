<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function showForm(): void
    {
        $this->render('customer/register');
    }

    public function register(): void
    {
        Customer::create($this->config, [
            'fullname' => $_POST['fullname'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? '',
            'address' => $_POST['address'] ?? '',
            'dob' => $_POST['dob'] ?? null,
        ]);
        $this->redirect('/customers/register');
    }
}
