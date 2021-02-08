<main class="container my-3 shadow p-4">
    <form action="../pages/users/register-db.php" method="post" class="text-gray-800" id="register">
        <h3 class="text-center"><span class="fas fa-user-circle"></span> Création du compte</h3>
        <small class="text-success">Merci de renseigner vos informations</small>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="last_name">Nom</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Entrer votre nom" required>
                </div>
                <div class="col-md-6">
                    <label for="first_name">Prénom</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Entrer votre prénom">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="mail">Mail</label>
                    <input type="email" id="mail" name="mail" class="form-control" placeholder="contact@example.com" required>
                    <small class="error-mail">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
                </div>
                <div class="col-md-6">
                    <label for="login">Pseudo</label>
                    <input type="text" id="login" name="login" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="tel">Téléphone</label>
                    <input type="tel" id="tel" name="tel" class="form-control" placeholder="Entrer votre numéro">
                    <small class="error-tel"></small>

                </div>
                <div class="col-md-6">
                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="pass">Mot de passe</label>
                    <input type="text" id="pass" name="password" class="form-control">
                    <small class="error-pass"></small>
                </div>
                <div class="col-md-6">
                    <label for="conf-pass">Confirmation du mot de passe</label>
                    <input type="text" id="conf-pass" name="conf_password" class="form-control">
                    <small class="error-conf-pass"></small>
                </div>
            </div>

            <div class="form-check mt-3">
                <label class="form-check-label">
                    <input type="checkbox" name="newsletter" class="form-check-input">Je souhaite recevoir la newsletter de <strong>Doudhal</strong>  avec les meilleures offres de formations.
                </label>
            </div>
            <div class="form-check mt-3">
                <label class="form-check-label">
                    <input type="checkbox" name="cgu" class="form-check-input">J'ai lu et j'accepte les <a href="#">conditions générales d'utilisation</a>.
                </label>
            </div>

            <div class="form-group mt-3">
                <button type="submit" name="register" class="btn btn-block btn-primary">Créer un compte</button>
                <p class="text-center w-100">Vous possédez déjà un compte? <a href="index.php?p=login">Se connecter</a> </p>
            </div>
        </div>
    </form>
    <p class="mt-4">
        <a href="#" class="btn btn-block btn-facebook"><i class="fab fa-facebook-f"></i> Connexion via facebook</a>
        <a href="#" class="btn btn-block btn-google"><i class="fab fa-google"></i> Connexion via Google</a>
    </p>
</main>

<script src="js/index.js"></script>
<script>
    var register = document.querySelector("#register");
    var mail = document.getElementById("mail");
    var tel = document.getElementById("tel");
    var password = document.getElementById("pass");
    var conf_pass = document.getElementById("conf-pass");
    var error_mail = document.querySelector(".error-mail");
    var error_tel = document.querySelector(".error-tel");
    var error_pass = document.querySelector(".error-pass");
    var error_conf_pass = document.querySelector(".error-conf-pass");
    
    //Vérification de l'adresse mail
    mail.addEventListener("blur", function () {
    error_mail.innerHTML = "";
    if (!inputValidate("mail", this)) {
        error_mail.classList.add("text-danger");
        error_mail.innerHTML += " Cet e-mail n'est pas valide !";
    } else {
        error_mail.innerHTML = "";
    }
    });

    //Verification du téléphone
    tel.addEventListener("blur", function () {
        error_tel.innerHTML = "";
        if (!inputValidate("tel", this)) {
            error_tel.classList.add("text-danger");
            error_tel.innerHTML += " Format de téléphone incorrect";
        } else {
            error_tel.innerHTML = "";
        }
    });

    //Vérification du format de mot de passe
    password.addEventListener("blur", function(){
        error_pass.innerHTML = "";
        if (!inputValidate("password", this)) {
            error_pass.classList.add("text-danger");
            error_pass.innerHTML += " Format de mot de passe incorrect";
        } else {
            error_pass.innerHTML = "";
        }
    });

    //Mot de passe identique:
    conf_pass.addEventListener("blur", function(){
        error_conf_pass.innerHTML = "";
        if (password.value != this.value) {
            error_conf_pass.classList.add("text-danger");
            error_conf_pass.innerHTML += "Les mots de passe ne sont pas identiques";
        } else {
            error_conf_pass.innerHTML = "";
        }
    });
    //Vérification et envoi du formulaire
    register.addEventListener("submit", function (event) {
        if (!inputValidate("tel", tel) || 
            !inputValidate("mail", mail) || !inputValidate("password", password)) {
            event.preventDefault();
        }
    },false);
</script>