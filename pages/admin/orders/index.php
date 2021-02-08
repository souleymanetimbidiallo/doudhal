<?php

use App\Table\Order;
$orders = Order::getAll();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Commandes</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p><a href="?p=orders.add" class="btn btn-success">Ajouter</a></p>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>N<sup>o</sup> Bon</th>
                    <th>Apprenant</th>
                    <th>Cours</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($orders as $order):

                    ?>

                    <tr>
                        <td><?= $order->id ?></td>
                        <td><?= $order->student ?></td>
                        <td><?= $order->course ?></td>
                        <td><?= $order->date ?></td>
                        <td><?= ($order->amount==0)?"Gratuit":$order->amount." FG"; ?></td>
                        <td><?= $order->status ?></td>
                        <td >
                            <a href="?p=orders.edit&id=<?= $order->id ?>" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            <form action="?p=orders.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $order->id ?>">
                                <button type="submit" class="btn btn-danger"><span class="fa fa-trash-alt"></span></button>
                            </form>
                            <a href="?p=orders.show&id=<?= $order->id ?>" class="btn btn-purple"><span class="fa fa-eye"></span></a>

                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>