<?php

use App\Table\Order;

require '../core/HTML/BootstrapForm.php';

if(!empty($_POST)){
    $result = Order::delete($_POST['id']);
    header('Location: admin.php?p=orders.index');
}