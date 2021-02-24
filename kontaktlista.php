<?php

require_once ('database.php');

?>

<!doctype html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/shop-homepage.css" rel="stylesheet">

</head>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Datorkiosken</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Index.php">Webbshop
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/admin/Index.php">Admin
              <span class="sr-only"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<body class="container">
<div class="row"><h1>Kontakt</h1></div>
<div class="row">
    <form action="#" method="post" class="row">
        <div class="col-md-4 form-group">
            <input name="name" type="text" required class="form-control" placeholder="Namn">
        </div>
        <div class="col-md-4 form-group">
            <input name="email" type="email" required class="form-control" placeholder="email">
        </div>
        <div class="col-md-10 form-group">
            <textarea name="message" cols="30" rows="5" required class="form-control"
                placeholder="Skriv ett meddelande"></textarea>
        </div>
        <div class="col-md-4 form-group">
            <input type="submit" value="Lägg till" class="btn btn-success form-control">
        </div>
    </form>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
          //print_r($_POST);
          // Hämta data från post-arrayen

    // filtrera det som ska in
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

    // Förbered en SQL-sats and binda parametrar
    $stmt = $conn->prepare("INSERT INTO kontakt (namn, email,meddelande)
                            VALUES (:namn , :email , :meddelande)");
    $stmt->bindParam(':namn', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':meddelande', $message);
    // Kör SQL-satsen (infoga en rad)
    $stmt->execute();
    //Hämta sista id som infogats A_I
    $last_id = $conn->lastInsertId();
    echo "<p>New record created successfully last inserted ID is=$last_id</p>";


}
?>
</div>
</body>

</html>