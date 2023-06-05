<main>
    <section class="intro p-3 p-md-5 text-white  d-flex flex-column bg-dark align-items-center">
        <div>
            <h1 class="display-4 font-italic">Web dev Blog</h1>
            <p class="lead my-3 text-center">Comment devenir web dev ? </p>
        </div>
    </section>
    <section>
        <div class="container">
            
        </div>
    </section>
    <div class=" d-flex container">
        <section class="container">
            <h2>Thomas Sbleut</h2>
            <img src="uploads/faux_frer.jpg"/>
            <p>Pour un apprentissage en douceur</p>
            <a href="uploads/cv_thomas.pdf" target="_blank">Ouvrir le CV</a>
        </section>
        <section class="container">
            <div class="flex-md-row m-4 border-none">
                <div class="card-body d-flex flex-column align-items-center mt-5">
                    <i class="fas fa-atom"></i>
                    <h3 class="m-3">Bien débuter</h3>
                    <p class="card-text text-center">Découvrez les bases du développement web et construisez votre présence en ligne en toute confiance.</p>
                </diV>
                <div class="card-body d-flex flex-column align-items-center mt-5">
                    <i class="fas fa-skiing"></i>
                    <h3 class="m-3">Méthodes</h3>
                    <p class="card-text text-center">Explorez des méthodes d'apprentissage efficaces pour maîtriser le développement web à votre rythme.</p>
                </diV>
                <div class="card-body d-flex flex-column align-items-center mt-5">
                    <i class="fas fa-ethernet"></i>
                    <h3 class="m-3">Sujet avancé</h3>
                    <p class="card-text text-center">Explorez les techniques et technologies de pointe dans le monde du développement web.</p>
                </diV>
            </div>
        </section>
    </div>
    <section class="container">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div id="apropos" class="card-body d-flex flex-column align-items-start">
                <h2>A propos</h2>
                <p>Bienvenue sur notre blog dédié à l'apprentissage du développement web ! Ici, nous vous proposons une multitude de ressources, de conseils et de tutoriels pour vous aider à vous initier ou à approfondir vos connaissances en matière de développement web. Rejoignez notre communauté d'apprenants passionnés et plongez dans le monde fascinant du développement web !</p>
            </div>
            <div class="card-img"><img class="img-fluid" src="assets\media\img\adult-gde8461d3d_1280.jpg" alt="" /></div>
        </div>
    </section>
    <section>
        <div class="container py-4">
            <h2>Contactez-moi</h2>
            <form id="contactform" enctype="multipart/form-data" action="MailCreate" method="post">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" name="name" type="text" placeholder="Name" data-sb-validations="required" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailAddress">Email Address</label>
                    <input class="form-control" name="email" type="email" placeholder="Email Address" data-sb-validations="required, email" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea class="form-control" name="message" type="text" placeholder="Message" data-sb-validations="required"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
</main>