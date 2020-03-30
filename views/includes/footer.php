<footer class="w-100 d-flex flex-column justify-content-around align-items-center bg-light border-top p-4 ">
  <p>Site réalisé par Stéphanie Pham dans le cadre de la formation Openclassrooms</p>

  <?php if (!$_SESSION) { ?>
    <a href="connexion">Connexion admin</a>
  <?php } ?>
</footer>
