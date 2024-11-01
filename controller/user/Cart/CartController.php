<?php 


// class CartController {


//   public function add(){

//   }


//   public function remove(){

//   }
// }



class Cart {
    private $items = [];

    public function __construct() {
        $this->loadCart();
    }

    private function loadCart() {
        $this->items = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    }

    public function addProduct($product) {
        $exists = false;
        foreach ($this->items as &$item) {
            if ($item['id'] === $product['id']) {
                $item['quantity'] += $product['quantity'];
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $this->items[] = $product;
        }

        $this->saveCart();
    }

    public function removeProduct($index) {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
            $this->saveCart();
        }
    }

    private function saveCart() {
        setcookie('cart', json_encode($this->items), time() + (86400 * 30), "/");
    }

    public function getItems() {
        return $this->items;
    }
}



// $cart = new Cart();

// // Handle adding a product to the cart
// if (isset($_POST['add_to_cart'])) {
//     $product = [
//         'name' => $_POST['product_name'],
//         'price' => $_POST['product_price'],
//         'image' => $_POST['product_image'],
//         'quantity' => $_POST['product_quantity']
//     ];
//     $cart->addProduct($product);
//     // header("Location: /");
//     // exit();
// }

// // Handle removing a product from the cart
// if (isset($_GET['remove'])) {
//     $cart->removeProduct($_GET['remove']);

// }



// require "./views/pages/user/cart.php";