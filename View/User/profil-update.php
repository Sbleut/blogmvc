<div class="container">
  <section class="bg-image">
    <div class="mask d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
            <div class="card gradient-custom-3">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-2">Modifier votre profil</h2>
                <form class="update-form " enctype="multipart/form-data" action="UserUpdate" method="post">
                  <label for="email" class="">Email</label>
                  <div class="form-outline mb-2">
                    <input name="login" type="email" id="email" class="form-control" value="<?= htmlspecialchars($user->getMail(), ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="inputFirstName" class="">Prénom</label>
                    <input type="text" name="name" class="form-control" placeholder="Prénom" value="<?= htmlspecialchars($user->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="inputLastName" class="">Nom</label>
                    <input type="text" name="last-name"class="form-control" placeholder="Nom" value="<?= htmlspecialchars($user->getLast_name(), ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="profil-pic">Photo de profil</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="profil-pic" name="profil-pic" accept="image/png, image/jpeg">
                      <label class="custom-file-label" for="profil-pic">Choisir un fichier</label>
                    </div>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="inputCatchPhrase" class="">Phrase d'accroche</label>
                    <input type="text" id="inputCatchPhrase" name="catch-phrase" class="form-control" placeholder="Phrase d'accroche" value="<?= htmlspecialchars($user->getCatch_phrase(), ENT_QUOTES, 'UTF-8'); ?>" required>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="inputPassword" class="">Mot de passe</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                  </div>
                  <div class="form-outline mb-2">
                    <label for="inputConfirmPassword" class="">Confirmation du mot de passe</label>
                    <input type="password" name="check-password" id="inputConfirmPassword" class="form-control" placeholder="Confirmation du mot de passe" required>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button class="btn btn-lg btn-secondary btn-block" id="edit-profile-btn">Modifier</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>