<?php
declare(strict_types=1);
namespace code\Models;
use config\Config;

require_once 'code/Entities/Order.php';

class Order
{
    public function store(string $firstname,string $lastname,string $email,string $phone,string $address,string $note)
    {
        if (isset($_SESSION['cart'])){
            foreach (getCart() as $cart){
                $user_id = auth()->getId();
                $product_id = $cart['id'];
                $type_id = $cart['type_id'];
                $color_id = $cart['color_id'];
                $qty = $cart['qty'];
                $conn = Config::gI()->connect();
                $sql = "INSERT INTO orders (user_id,product_id,product_type_id,product_color_id,quantity,firstname,lastname,email,phone,address,note) 
                            VALUES ('$user_id','$product_id','$type_id','$color_id','$qty','$firstname','$lastname','$email','$phone','$address','$note')";
                $query = $conn->prepare($sql);
                $query->execute();
                $key = $product_id.$type_id.$color_id;
                removeItemCart($key);
            }
            return true;
        }
        return false;
    }
}