<div class="container">
 
<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-3">
                            <div class="text-center">
                                <span class="fas fa-user-lock fa-2x d-block mx-auto"></span>
                                <h1 class="h4 text-gray-900 mb-4">Authentification!</h1>
                            </div>
                            <form action="" method="POST" class="user">
                                <div class="form-group">
                                    <label for="username" class="h6 text-gray-900">Nom d'utilisateur 
                                        <abbr title="Ce champ est obligatoire">*</abbr>
                                    </label>
                                    <input type="text" class="form-control form-control-user"
                                        id="login" name="login" aria-describedby="loginHelp" required autocomplete="none"
                                        placeholder="Entrer votre pseudonyme">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="h6 text-gray-900">Mot de passe 
                                        <abbr title="Ce champ est obligatoire">*</abbr>
                                    </label>
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="Mot de passe" required minlength="4" maxlength="15" autocomplete="none">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="connexion" class="btn btn-primary btn-user btn-block">
                                    Connexion
                                </button>
                                
                                <p id="resultats" class='text-danger mt-2'></p>
                                <div id="resultat">
                                </div>
                            </form>
                            <hr> 
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script>

$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();
        $.post(
            'login-db.php', //Le fichier contrôlant la connexion
            {
                // Nous récupérons la valeur de nos input que l'on fait passer à login-db.php
                login : $("#login").val(),
                password : $("#password").val()
            },
            function(data){
                if(data == 'success'){
                     // Le membre est connecté et on lui rédirige vers la page admin.php
                     window.location.href = "../../public/admin.php";
                }else{
                     // L'utilisateur n'a pas pu se connecter'. (data vaut ici "failed")
                     $("#resultat").addClass("alert alert-danger p-0");
                     $("#resultat").html('<p class="text-center">Erreur lors de la connexion...</p>');
                }
            },
            'text'
         );
    });
});
</script>