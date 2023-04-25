<div class="container">
  <form class="form-signin ">
    <h2 class="form-signin-heading">Profil utilisateur</h2>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?= $_SESSION['user']->getEmail() ?>" required autofocus>
    <label for="inputFirstName" class="sr-only">Prénom</label>
    <input type="text" id="inputFirstName" class="form-control" placeholder="Prénom" required>
    <label for="inputLastName" class="sr-only">Nom</label>
    <input type="text" id="inputLastName" class="form-control" placeholder="Nom" required>
    <label for="inputCatchPhrase" class="sr-only">Phrase d'accroche</label>
    <input type="text" id="inputCatchPhrase" class="form-control" placeholder="Phrase d'accroche" required>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
    <label for="inputConfirmPassword" class="sr-only">Confirmation du mot de passe</label>
    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirmation du mot de passe" required>

    <div class="form-group">
        <label for="profil-pic">Photo de profil</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="profil-pic" name="profil-pic" accept="image/png, image/jpeg">
            <label class="custom-file-label" for="profil-pic">Choisir un fichier</label>
        </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
    <button class="btn btn-lg btn-secondary btn-block" id="edit-profile-btn">Modifier</button>
  </form>
</div>


<script>
    const editBtn = document.querySelector('.edit-btn');
    const submitBtn = document.querySelector('.submit-btn');

    function toggleFormEditable() {
        const form = document.querySelector('.sign-up-form');
        const inputs = form.querySelectorAll('input[type="text"], input[type="password"]');
        inputs.forEach(input => {
            input.readOnly = !input.readOnly;
        });
        submitBtn.disabled = !submitBtn.disabled;
    }

    editBtn.addEventListener('click', toggleFormEditable);
</script>
