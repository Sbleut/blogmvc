<div class="container">
  <form class="form-signin ">
    <h2 class="form-signin-heading">Profil utilisateur</h2>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?= htmlspecialchars($user->getMail(), ENT_QUOTES, 'UTF-8' ); ?>" required autofocus>
    <label for="inputFirstName" class="sr-only">Prénom</label>
    <input type="text" id="inputFirstName" class="form-control" placeholder="Prénom" value="<?= htmlspecialchars($user->getName(), ENT_QUOTES, 'UTF-8' ); ?>" required>
    <label for="inputLastName" class="sr-only">Nom</label>
    <input type="text" id="inputLastName" class="form-control" placeholder="Nom"
    value="<?= htmlspecialchars($user->getLast_name(), ENT_QUOTES, 'UTF-8' ); ?>" required>
    <label for="inputCatchPhrase" class="sr-only">Phrase d'accroche</label>
    <input type="text" id="inputCatchPhrase" class="form-control" placeholder="Phrase d'accroche" value="<?= htmlspecialchars($user->getCatch_phrase(), ENT_QUOTES, 'UTF-8' ); ?>" required>
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