
<form class="sign-up-form" enctype="multipart/form-data" action="Signup" method="post">
	<label>Email</label>
	<input type="text" name="login" />
	<label>Prénom</label>
	<input type="text" name="name" />
	<label>Nom</label>
	<input type="text" name="last-name" />
	<label>Phrase d'accorche</label>
	<input type="text" name="catch-phrase" />

	<label for="profil-pic">Choisissez votre photo de profil:</label>
	<input type="file" id="profil-pic" name="profil-pic" accept="image/png, image/jpeg">
	
	<label>Mot de passe</label>
	<input type="password" name="password" />
	<label>Confirmation du mot de passe</label>
	<input type="password" name="check-password" />
	<input type="submit" value="S'inscrire'" />
</form>