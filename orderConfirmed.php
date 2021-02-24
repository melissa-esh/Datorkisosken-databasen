<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('database.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //print_r($_POST);
    // Hämta data från post-arrayen

// filtrera det som ska in
$produktId = $_POST['produktId'];
$namn = filter_var($_POST['namn'],FILTER_SANITIZE_STRING);
$telefonnummer = filter_var($_POST['telefonnummer'],FILTER_SANITIZE_STRING);
$epost = filter_var($_POST['epost'],FILTER_SANITIZE_EMAIL);
$leveransAdress = filter_var($_POST['leveransAdress'],FILTER_SANITIZE_STRING);

// Förbered en SQL-sats and binda parametrar
$stmt = $conn->prepare("INSERT INTO `order` (produktId,namn,telefonnummer,epost,leveransAdress) VALUES (:produktId,:namn,:telefonnummer,:epost,:leveransAdress)");

$stmt->bindParam('produktId', $produktId);
$stmt->bindParam('namn', $namn);
$stmt->bindParam('telefonnummer', $telefonnummer);
$stmt->bindParam('epost', $epost);
$stmt->bindParam('leveransAdress', $leveransAdress);
// Kör SQL-satsen (infoga en rad)
$stmt->execute();
//Hämta sista id som infogats A_I
$last_id = $conn->lastInsertId();
#echo "<p>New record created successfully last inserted ID is=$last_id</p>";


}
?>

<!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">DatorKiosken</a>
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
              <a class="nav-link" href="kontaktlista.php">Kontaktlista
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class ="container">
    <div class="row" style="margin-top:100px;">
    
    <?php echo '<h2>Du har slutfört din beställning med ordernummer : '.$last_id.'</h2>' ?>
    </div>
    </div>
  </body>
  </html>