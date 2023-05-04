<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/App.css" rel="stylesheet">
</head>
<body style="background-image: url('assets/Images/background-formation.jpg'); background-repeat: no-repeat; background-size: 100% 100vh;">

<!--<div class="d-flex justify-content-center align-items-center p-2" style="margin-top: 33vh;">-->
  <div class="centerdiv">
<form method="POST" action="/AlyfPlaning/connexion">
  <div class="mb-3">
  <center><img src="https://www.alyfpro.fr/wp-content/uploads/2022/04/unnamed-1-1-320x171.png" height="100px" width="180px"></center>
  </div>
  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" class="form-control" id="login" name="login">
  </div>
  <div class="mb-3">
    <label for="mdp" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="mdp" name ="mdp">
  </div>
  
 <center> <button type="submit" class="btn btn-primary">Connexion</button></center>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

