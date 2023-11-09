<?php
declare(strict_types=1);
namespace code\Controllers;
require_once 'code/Models/Order.php';
use code\Models\Order;

class CheckoutController
{
    private static ?CheckoutController $checkoutController= null;
    private function __construct()
    {

    }
    public static function gI(): CheckoutController
    {
        if (self::$checkoutController == null) {
            self::$checkoutController = new CheckoutController();
        }
        return self::$checkoutController;
    }

    public function index()
    {
        return require_once 'resources/views/frontend/checkout.php';
    }

    public function store()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];

        $orderModel = new Order();
        $result = $orderModel->store($firstname,$lastname,$email,$phone,$address,$note);
        redirect('/');
    }
}