<?php
    include('../models/fonction.php');

    connexion($bdd);
?>
<main id="connexionF">
<div class="parent">
         <div class="title-text">
            <div class="title login">
               Connexion
            </div>
            <div class="title signup">
               Inscription
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Connexion</label>
               <label for="signup" class="slide signup">Inscription</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login">
                  <div class="field">
                     <input type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Connexion">
                  </div>
                  <div class="signup-link">
                     Pas encore un membre? <a href="">Inscris toi maintenant</a>
                  </div>
               </form>
               <form action="#" class="signup">
                  <div class="field">
                     <input type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                    <input type="text" placeholder="Email Address" required>
                 </div>
                 <div class="field">
                    <input type="text" placeholder="Email Address" required>
                 </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Inscription">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
</main>



</html>