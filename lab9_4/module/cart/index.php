<?php
require_once '../../config/config.php';
require_once ROOT . '/classes/Cart.class.php';

$cart = new Cart();
$action = getIndex('action', 'view');

switch ($action) {
    case 'add':
        $product_id = postIndex('product_id');
        $quantity = postIndex('quantity', 1);
        $cart->add($product_id, $quantity);
        break;

    case 'remove':
        $product_id = getIndex('product_id');
        $cart->remove($product_id);
        break;

    case 'edit':
        $product_id = postIndex('product_id');
        $quantity = postIndex('quantity');
        $cart->edit($product_id, $quantity);
        break;

    case 'view':
    default:
        $cart->show();
        break;
}
?>