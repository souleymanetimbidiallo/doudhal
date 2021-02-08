<?php
use App\Table\User;

require '../core/HTML/BootstrapForm.php';

$user = User::find($_GET['id']);
if($user === false){
    header("Location: index?p=404");
}
?>

<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-10">
            <h1><?=$user->fullName?></h1>
        </div>
    	<div class="col-2">
            <a href="images/avatars/profile.png" class="float-right">
                <?php if(is_null($user->avatar)): ?>
                    <img title="profile image" class="avatar rounded-circle img-fluid img-thumbnail" 
                    src="images/avatars/profile.png">
                <?php else: ?>
                    <img title="profile image" class="avatar rounded-circle img-fluid img-thumbnail" 
                    src="images/avatars/<?=$user->avatar?>">
                <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="row mt-2">
        <!--left col-->
  		<div class="col-12 col-md-3">
            <div class="list-group">
                <a href="/accounts/profile/" class="list-group-item list-group-item-action">
                    Mon compte
                </a>
                <a href="#" class="list-group-item list-group-item-action">Cours</a>
                <a href="#" class="list-group-item list-group-item-action">Quizzes</a>
                <a href="#" class="list-group-item list-group-item-action active">Editer profil</a>
            </div>

            <ul class="list-group mt-4">
                <li class="list-group-item bg-secondary text-white">Activités <i class="fas fa-user-graduate fa-1x"></i></li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Cours appris <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Quizzes effectués <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Autres <span class="badge badge-primary badge-pill">1</span>
                </li>
            </ul>
        </div><!--/col-3-->

    	<div class="col-12 col-md-9">
            <form method="post">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">  
                              <label for="first_name"><h4>Nom</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                        </div>
                        <div class="form-group">  
                              <label for="last_name"><h4>Prénom</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="first name" title="enter your first name if any.">
                        </div>
                        <div class="form-group">  
                              <label for="mail"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="mail" id="mail" placeholder="first name" title="enter your first name if any.">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">  
                              <label for="mail"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="mail" id="mail" placeholder="first name" title="enter your first name if any.">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-2">
                        <div class="text-center">
                            <?php if(is_null($user->avatar)): ?>
                                <img title="profile image" class="avatar-edit img-thumbnail" 
                                src="images/avatars/profile.png">
                            <?php else: ?>
                                <img title="profile image" class="avatar-edit img-thumbnail" 
                                src="images/avatars/<?=$user->avatar?>">
                            <?php endif; ?>
                            <h6>Upload a different photo...</h6>
                            <input type="file" class=" text-center center-block file-upload">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success mt-3" type="submit">Enregistrer les changements</button>
            </form> 
</div>
