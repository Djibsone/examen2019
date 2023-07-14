<?php include '../controllers/recherche.php' ?>

<!-- header start -->
<?php include './header.php' ?>
<!-- header end -->

  <div class="containe">
    <!-- menu start -->
    <div class="sidebar card">
        <h2>MENU</h2>
        <ul>
            <li><span>1.</span> <a href="../">Inscription</a></li>
            <li><span>2.</span> <a href="./recherche.php" class="list">Liste des candidats</a></li>
        </ul>
    </div>
    <!-- menu end -->

    <div class="content">
      <!-- info start -->
      <!-- <object data="./info.html" width="100%"></object> -->
      <?php include './info.php' ?>
      <!-- info end -->

      <div class="container-fluide m-3 mt-2">
        <fieldset>
            <legend><h2>Réchercher les candidats dans une option</h2></legend>
            <div class="form-group row my-2 mt-3">
                <div class="col-sm-10">
                    <?php include './msg_error_success.php' ?>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group row my-2">
                    <label class="col-sm-2 col-form-label col-form-label-lg">Dans l'option</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-lg" name="option">
                            <option value="">Select option</option>
                            <?php
                                require_once('../models/connexion.php'); 
                                $db = dbConnect();
                                $req = $db->query('SELECT * FROM filiere ORDER BY codefil DESC');
                                $filires = $req;
                                foreach($filires as $filire): 
                            ?>
                            <option value="<?= $filire['codefil'] ?>"><?= $filire['codefil'] ?></option>
                            <?php endforeach; ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg">Envoyer</label>
                    <div class="col-sm-2">
                        <!-- <input type="submit" name="ok" class="form-control form-control-lg btn btn-outline-primary fw-bold" value="OK">
                        <button type="submit" name="ok" class="form-control form-control-lg btn btn-outline-primary fw-bold" value="OK"> -->
                        <input type="submit" class="ok" name="ok" value="OK">
                    </div>
                </div>
            </form>
        </fieldset>
        
        <div class="form-group row my-4">
            <div class="panel-body">
                <h2>LISTE DES CANDIDATS (<span class="text-danger"><?= ($total_cadits) ? $total_cadits : 0 ?></span>)</h2>
                <table class="table table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
                            <th scope="col">NOM</th>
                            <th scope="col">PRENOM</th>
                            <th scope="col">SEXE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($candidats as $candidat): ?>

                            <tr>
                                <td><?= $candidat['nom'] ?></td>
                                <td><?= $candidat['prenom'] ?></td>
                                <td><?= $candidat['sexe'] ?></td>
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
  </div>

<!-- footer start -->
<?php include './views/footer.php' ?>
<!-- footer end -->

<style>
  table {
    border-collapse: collapse;
  }
  td {
    border: 1px solid black;
    padding: 10px;
  }
</style>

<!-- <table>
  <tr>
    <td>Colonne 1</td>
    <td>Colonne 2</td>
    <td>Colonne 3</td>
  </tr>
</table> -->
