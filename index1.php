<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
  display: flex;
  flex-direction: column;
  max-width: 400px;
  margin: 0 auto;
}

.form-group {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

label {
  width: 120px;
  text-align: right;
  margin-right: 10px;
}

input {
  flex: 1;
  padding: 5px;
  border: 1px solid #ccc;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: transparent;
  color: #000;
  border: 1px solid #000;
  cursor: pointer;
}

button:hover[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

    </style>
</head>
<body>

<form>
  <div class="form-group">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom">
  </div>
  
  <div class="form-group">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom">
  </div>
  
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email">
  </div>
  
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password">
  </div>
  
  <div class="form-group">
    <label for="confirm-password">Confirmer le mot de passe :</label>
    <input type="password" id="confirm-password" name="confirm-password">
  </div>
  
  <button type="submit">S'inscrire</button>
</form>
</body>
</html>
