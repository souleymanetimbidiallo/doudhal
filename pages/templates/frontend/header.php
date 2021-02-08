<?php 
use App\App;
use Core\Auth\DatabaseAuth;
$auth = new DatabaseAuth(App::getDatabase());
if($auth->logged()){
    $user_name = $_SESSION['user_name'];
}else{
    $user_name = "Non connecté";
}
?>

<!-- Frontend Topbar -->
<nav class="front-topbar navbar navbar-expand-xl navbar-dark bg-dark mb-4">            
	<a href="index.php?p=home" class="navbar-brand">
        <img src="images/logo/doudhal.png" class="" alt="">
        Doudhal
    </a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Rechercher ici...">
				<span class="input-group-addon"><i class="fas fa-search"></i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="index.php?p=home"  data-toggle="tooltip" data-placement="bottom" title="Accueil" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Accueil</span></a>
			<a href="index.php?p=courses" data-toggle="tooltip" data-placement="bottom" title="Cours" class="nav-item nav-link"><i class="fa fa-book"></i><span>Cours</span></a>
			<a href="index.php?p=contact" data-toggle="tooltip" data-placement="bottom" title="Contact" class="nav-item nav-link"><i class="fa fa-id-card"></i><span>Contact</span></a>		
			<a href="index.php?p=about" data-toggle="tooltip" data-placement="bottom" title="A propos" class="nav-item nav-link"><i class="fa fa-users"></i><span>A propos</span></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">
                    <img src="images/avatars/profile.png" class="avatar" alt="Avatar">
                    <?= ($auth->logged())?$_SESSION['user_name']:"Compte"; ?><b class="caret"></b>
                </a>
				<div class="dropdown-menu">
                    <?php if($auth->logged()) : ?>
                        <a href="index.php?p=profile&id=<?=$_SESSION['auth']?>" class="dropdown-item"><i class="fa fa-user"></i> Profil</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cogs"></i> Activités</a>
					    <div class="divider dropdown-divider"></div>
					    <a href="index.php?p=logout" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Déconnexion</a>
                    <?php else: ?>
                        <a href="index.php?p=login" class="dropdown-item"><i class="fa fa-sign-in-alt"></i> Connexion</a>
                        <a href="index.php?p=register" class="dropdown-item"><i class="fas fa-user-plus"></i> Inscription</a>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- End of Frontend Topbar -->
