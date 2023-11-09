<?php
require_once 'config/Config.php';
require_once 'code/Entities/User.php';
require_once 'code/Models/Category.php';
/**
 * get base url in config
 * @return string
 */
if (!function_exists('getBaseUrl')) {
    function getBaseUrl(): string
    {
        return \config\Config::gI()->getBaseUrl();
    }
}

/**
 * redirect page
 * @param string $to
 * @return void
 */
if (!function_exists('redirect')) {
    function redirect(string $to)
    {
        echo "<script type='text/javascript'>
           window.location = '{$to}';
            </script>";
    }
}
/**
 * redirect before page
 * @param string $to
 * @return void
 */
if (!function_exists('redirectBack')) {
    function redirectBack()
    {
        echo "<script type='text/javascript'>
           history.go(-1);
            </script>";
    }
}
/**
 * get data user login
 * @return mixed
 */
if (!function_exists('auth')) {
    function auth()
    {
        return $_SESSION['user'] ?? false;
    }
}

/**
 * set data user login
 *
 * @param \code\Models\User $user
 * @return \code\Models\User
 */
if (!function_exists('setAuth')) {
    function setAuth($user)
    {
        return $_SESSION['user'] = $user;
    }
}

/**
 * check login and redirect
 * @return void
 */
if (!function_exists('routeCheckAuth')) {
    function routeCheckAuth()
    {
        if (auth()) {
            redirect('/');
        }
    }
}
/**
 * check login admin and redirect
 * @return void
 */
if (!function_exists('routeCheckLoginAuthAdmin')) {
    function routeCheckLoginAuthAdmin()
    {
        if (auth() && auth()->getPermission() === 1) {
            redirect('/admin');
        }
    }
}
/**
 * check login admin and redirect
 * @return void
 */
if (!function_exists('routeCheckAuthAdmin')) {
    function routeCheckAuthAdmin()
    {
        if (auth() && auth()->getPermission() === 0) {
            redirect('/admin/login');
        }
    }
}
/**
 * check logout and redirect to login page
 * @return void
 */
if (!function_exists('routeCheckAuthAdminOut')) {
    function routeCheckAuthAdminOut()
    {
        if (!auth()) {
            redirect('/admin/login');
        }
    }
}
/**
 * check logout and redirect to login page
 * @return void
 */
if (!function_exists('routeCheckAuthOut')) {
    function routeCheckAuthOut()
    {
        if (!auth()) {
            redirect('/login');
        }
    }
}

/**
 * remove session has key name is user
 * @return true
 */
if (!function_exists('logout')) {
    function logout(): bool
    {
        unset($_SESSION['user']);
        return true;
    }
}

/**
 * add files assets
 */
if (!function_exists('asset')) {
    function asset(string $path)
    {
        echo getBaseUrl() . 'resources/' . $path;
    }
}

/**
 * get array object categories
 * @return array|false
 */
if (!function_exists('getCategories')) {
    function getCategories()
    {
        $categoryModel = new \code\Models\Category();
        return $categoryModel->all();
    }
}

/**
 * @param $product
 * @return mixed
 */
if (!function_exists('addToCart')) {
    function addToCart($product,$data)
    {
        $id = $data['id'];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += $data['qty'];
            return $_SESSION['cart'][$id];
        }

        $_SESSION['cart'][$id] = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'type_id' => $product->getTypeId(),
            'type' => $product->getType(),
            'color_id' => $product->getColorId(),
            'color' => $product->getColorName(),
            'price' => $product->getPrice(),
            'price_discount' => $product->getPriceDiscount(),
            'qty' => $data['qty'],
        ];
        return $_SESSION['cart'][$id];
    }
}
/**
 * delete a item in cart by key
 * @param $key
 */
if (!function_exists('updateQtyCart')) {
    function updateQtyCart($key,$qty)
    {
        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['qty'] = $qty;
        }
        redirectBack();
    }
}
/**
 * delete a item in cart by key
 * @param $key
 */
if (!function_exists('removeItemCart')) {
    function removeItemCart($key)
    {
        var_dump($key);
        if (isset($_SESSION['cart'][$key])) {
            unset($_SESSION['cart'][$key]);
        }
        redirectBack();
    }
}
/**
 * get total price cart
 * @return mixed
 */
if (!function_exists('getTotalCart')) {
    function getTotalCart()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $sum = $cart['qty'] * ($cart['price_discount'] > 0? $cart['price_discount'] : $cart['price']);
            $total = $total + $sum;
        }
        return $total;
    }
}
/**
 * get count cart
 *
 * @return int|mixed
 */
if (!function_exists('getCountCart')) {
    function getCountCart()
    {
        $count = 0;
        if (is_array($_SESSION['cart'] ?? null)){
            foreach ($_SESSION['cart'] as $cart) {
                $count += $cart['qty'];
            }
        }
        return $count;
    }
}

/**
 * get data cart
 * @return mixed
 */
if (!function_exists('getCart')) {
    function getCart()
    {
        return $_SESSION['cart'];
    }
}

