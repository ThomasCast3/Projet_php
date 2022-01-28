
<!-- ****************   TABLEAU OPERATIONS   **************** -->

<br><br><br><br><br><br>
    <div class="tableau">
      <?php
        foreach( ListOperation( 137 ) as $Operation ): ?>   <!--creer une boucle for sur la fonction listCompte pour l'utilisateur 3 -->
          <div data-full='<?=
              json_encode($Operation)?>'
              value="<?= $Operation['IdOperation'] ?>">
              Nom d'operation : <?= $Operation['NomOperation']; ?> |
              Montant d'operation : <?= $Operation['MontantOperation'];?> $ |   
              Date d'operation : <?= $Operation['DateOperation']; ?></div>  <!-- creer un option dans select avec l'id du compte et afficher son nom -->
        <?php endforeach; ?> 
    </div>