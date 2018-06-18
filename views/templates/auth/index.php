<?php $title = 'Login Form' ?>

<?php ob_start();?>
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Inscription</a></li>
        <li class="tab"><a href="#login">Connexion</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Inscrivez-vous gratuitement</h1>
          
          <form action="index.php?controller=auth&amp;action=signup" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Prénom<span class="req">*</span>
              </label>
              <input name="prenom" type="text"  autocomplete="off" />
            </div>
           

            <div class="field-wrap">
              <label>
                Nom<span class="req">*</span>
              </label>
              <input name="nom" type="text" autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Adresse mail<span class="req">*</span>
            </label>
            <input name="email" type="email"autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Mot de passe<span class="req">*</span>
            </label>
            <input name="mdp" type="password" autocomplete="off"/>
          </div>
          <select name="role" class="custom-select mb-4">
              <option selected value="2">Client</option>
              <option value="1">Admin </option>
            </select>

          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Vous nous manquiez!</h1>
          
          <form action="index.php?controller=auth&amp;action=login" method="post">
          
            <div class="field-wrap">
            <label>
              Adresse mail<span class="req">*</span>
            </label>
            <input name="email" type="email" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Mot de passe<span class="req">*</span>
            </label>
            <input name="mdp" type="password" autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Mot de passe oublié ?</a></p>
          
          <button class="button button-block"/>Se connecter</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<?php $content = ob_get_clean();?>

<?php require('../views/index.php'); ?>