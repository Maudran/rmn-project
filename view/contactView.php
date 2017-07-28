<header id="contact-header">
	<div class="contact-title">
		<h1 class="titlestyle">Contact</h1>
	</div>
</header>

<div id="form-wrapper">

	<?php if ( isset($validMsg) ) : ?>
		<div class="return">
            <div class="line-return">Formulaire envoyé! </div>
		    <div class="line-return"><a href="/rmn-project/homeView.php" title="Retour à la page d'accueil">Retourner à la page d'accueil</a></div>
        </div>
    <?php else: ?>

	<form id="contact-form" method="POST" action="/rmn-project/contact.htm" name="contacForm">

		<?php if (isset($errorMsg) ): ?>
			<span class="error"><?php echo $errorMsg ?></span>
		<?php endif; ?>

		<div>
            <label for="civ-input" class="civi-input">Civilité : </label>
			<div class="div-input">
			<select name="contact[civility]" class="civi-input">
				<option value="Monsieur">M.</option>
				<option value="Madame">Mme</option>
				<option value="Mex">Mx</option>
				<option value="Doctor">Dr</option>
			</select>

			<?php if (isset($errors) && isset($errors['civility']) ): ?>
				<span class="error"><?php echo $errors['civility'] ?></span>
			<?php endif; ?>	
			</div><br>

			<div class="div-input"><input type="text" name="contact[surname]" class="contact-input" placeholder="Nom" maxlength="50" required> *
				<?php if (isset($errors) && isset($errors['surname']) ): ?>
				<span class="error"><?php echo $errors['surname'] ?></span>
			<?php endif; ?>	
			</div><br>

			<div class="div-input"><input type="text" name="contact[firstname]" class="contact-input" placeholder="Prénom" maxlength="50" required> *
			<?php if (isset($errors) && isset($errors['firstname']) ): ?>
				<span class="error"><?php echo $errors['firstname'] ?></span>
			<?php endif; ?>	
			</div><br>

			<div class="div-input"><input type="text" name="contact[company]" class="contact-input" placeholder="Entreprise" maxlength="50"></div><br>

			<div class="div-input"><input type="email" name="contact[email]" class="contact-input" placeholder="Adresse mail" maxlength="50" required> *
				<?php if (isset($errors) && isset($errors['email']) ): ?>
				<span class="error"><?php echo $errors['email'] ?></span>
			<?php endif; ?>	
			</div><br>

			<div class="div-input"><input type="tel" name="contact[phone_number]" class="contact-input" placeholder="Numéro de téléphone"></div><br>

			<div class="div-input"><textarea name="contact[message]" class="contact-input" placeholder="Votre message" rows="10" cols="50" required></textarea> *

            <div class="form-note">*Champs obligatoires</div>

			<?php if (isset($errors) && isset($errors['message']) ): ?>
				<span class="error"><?php echo $errors['message'] ?></span>
			<?php endif; ?>	
			</div><br>

			<div class="submit-input"><input type="submit" name="submitBtn" value="Envoyer" class="submit-button"></div>
		</div>
		
	</form>
	<?php
	endif;
	?>
</div>

<div class="table-return">
    <a href="/rmn-project/homeView.php" class="txtstyle" title="Retour à la page d'accueil">Retourner à la page d'accueil</a>
</div>
