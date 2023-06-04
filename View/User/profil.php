<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="<?= htmlspecialchars($user->getPic(), ENT_QUOTES, 'UTF-8' ); ?>"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px;">
              <button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="white"><a class="" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8') ?>/ProfilUpdate">Edit profile</a>
              </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5><?= htmlspecialchars($user->getName(), ENT_QUOTES, 'UTF-8' ); ?> <?= htmlspecialchars($user->getLast_name(), ENT_QUOTES, 'UTF-8' ); ?></h5>
              <p><?= htmlspecialchars($user->getMail(), ENT_QUOTES, 'UTF-8' ); ?></p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5"></p>
                <p class="small text-muted mb-0">Articles</p>
              </div>
              <div class="px-3">
                <p class="mb-1 h5"></p>
                <p class="small text-muted mb-0">Comments</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1"><?= htmlspecialchars($user->getCatch_phrase(), ENT_QUOTES, 'UTF-8' ); ?></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>