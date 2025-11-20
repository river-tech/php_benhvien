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
            'id' => $_POST['id'] ?? '',
            'fullname' => $_POST['fullname'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'address' => $_POST['address'] ?? '',
            'dob' => $_POST['dob'] ?? null,
            'gender' => $_POST['gender'] ?? null,
        ]);
        $this->redirect('/customers/register');
    }
}
