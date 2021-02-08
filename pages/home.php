<style>
	.progress.active .progress-bar {
    -webkit-transition: none !important;
    transition: none !important;
	}
</style>
<div class="container-fluid my-3">
	  <!-- Content Row : Slider -->
	  <div class="col-12 my-2 progress-container">
			<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-success" style="width:0%"></div>
			</div>
		</div>
  	<div class="row mb-4">
    	<div class="col">
      		<div id="carouselControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/slider/apprenant.jpg" class="d-block w-100" alt="Apprenant">
					</div>
					<div class="carousel-item">
						<img src="images/slider/apprenant2.jpg" class="d-block w-100" alt="Apprenante">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Précédent</span>
				</a>
				<a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Suivant</span>
				</a>
      		</div>
    	</div>
	</div>
	  

  	<!-- Content Row : Background-Video -->
  	<div class="row mb-4">
    	<div class="col">
    		<section class="background-video">
  				<div class="overlay-wcs"></div>
				<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
					<source src="medias/cover.mp4" type="video/mp4">
				</video>
				<div class="container h-100">
					<div class="d-flex h-100 text-center align-items-center">
					<div class="w-100 text-white">
						<h1>Doudhal</h1>
						<p class="lead mb-0">Apprenez vos cours n'importe où</p>
					</div>
					</div>
				</div>
			</section>
    	</div>
  	</div> 
 

  	<!-- Content Row : Cards Informations-->
  	<div class="row mb-4">
    	<div class="col-12 col-lg-4">
      		<div class="card mb-4 mb-lg-0 border-primary shadow">
        		<img src="images/home/certificate.png" alt="certificate" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Devenez diplômé</h5>
					<p class="card-text">De zéro à héros, obtenez des certificats valorisants.</p>
				</div>
      		</div>
    	</div>
		<div class="col-12 col-lg-4">
			<div class="card mb-4 mb-lg-0 border-primary shadow">
				<img src="images/home/instruction.png" alt="instructor" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Formateurs de qualités</h5>
					<p class="card-text">Tous nos cours sont réalisés par les meilleurs formateurs dans.</p>
				</div>
			</div>
		</div>
    	<div class="col-12 col-lg-4">
      		<div class="card mb-4 mb-lg-0 border-primary shadow">
				<img src="images/home/job.png" alt="job search" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Un travail graranti</h5>
					<p class="card-text">Nous vous garantissons un emploi à l'issue de votre formation.</p>
				</div>
      		</div>
    	</div>
	  </div>
	  <div class="row" id="hover-image">
		  <div class="col d-flex justif-content-center">
			<a href="#">
				<img src="images/background/fond_image1.jpg" 
				alt="Home" style="width:450px; height:300px"
				onmouseover="this.src='images/background/fond_image2.png'" 
				onmouseout="this.src='images/background/fond_image1.jpg'" />
			</a>
		  </div>
	  </div>
</div>