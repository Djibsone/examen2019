<?php include './controllers/getFiliere.php' ?>

<fieldset>
  <legend><h2>Renseignements</h2></legend>
  <div class="form-group">
    <?php include './views/msg_error_success.php' ?>
  </div>
  <form action="./controllers/saisie.php" method="post">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" name="nom">
    </div>
    
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input type="text" name="prenom">
    </div>
    
    <div class="form-group">
      <label for="datnais">Date de naissance</label>
      <input type="date" name="datnais">
    </div>
    
    <div class="form-group">
      <label for="ville">Ville</label>
      <input type="text" name="ville">
    </div>
    
    <div class="form-group">
      <label for="sexe">Sexe</label>
      <input type="text" name="sexe">
    </div>

    <div class="form-group">
      <label for="">Option</label>
      <select name="option">
        <option>Select option</option>
        <?php foreach($filieres as $filiere): ?>
          <option value="<?= $filiere['codefil'] ?>"><?= $filiere['codefil'] ?></option>
        <?php endforeach; ?> 
      </select>
    </div>
    
    <div class="form-group">
      <!-- <input type="reset" value="Effacer"> -->
      <button type="reset">Effacer</button>
      <button type="submit" name="enregistrer">Enregistrer</button>
  </div>
  </form>

</fieldset>