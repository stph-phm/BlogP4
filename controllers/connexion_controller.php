<?php
$helper = null;

  if (isset($_POST['connexion'])) {
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
          $user = new User($_POST['username']);
          if (password_verify($_POST['password'], $user->password)) {
              $_SESSION['id'] = $user->id;
              $_SESSION['username'] = $user->username;
              $_SESSION['password'] = $user->password;
              header('Location: admin');
          } else {
              $helper = "Mot de passe ou indentifiant incorrect";
          }
      } else {
          $helper = "Veuillez saisir vos identifiants pour vous connecter";
      }
  }
