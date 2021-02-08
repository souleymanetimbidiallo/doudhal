<?php

use App\Table\User;

$users = User::getAll();
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Utilisateurs</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p>
                <a href="?p=users.add" class="btn btn-success">Ajouter</a>
            </p>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Login</th>
                    <th>Prénom et Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Avatar</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->getFullname() ?></td>
                        <td><?= $user->mail ?></td>
                        <td><?= $user->status ?></td>
                        <td>
                            <?php $image = (!is_null($user->avatar))?$user->avatar:"profile.png"; ?>
                            <img class="img-fluid img-avatar-min" src="images/avatars/<?= $image ?>" alt="">
                        </td>
                        <td class="d-flex flex-row justify-content-around">
                            <a href="?p=users.edit&id=<?= $user->id ?>" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                            <form action="?p=users.delete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <button type="submit" class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 
