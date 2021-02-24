  <?php

  require_once('database.php');
  $result = null;
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("select * from produkt where id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
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
              <a class="nav-link" href="kontaktlista.php">Kontaktlista
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style=" margin-top:100px;">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            <h1>Din kundvagn</h1>
            <p> Skriv in dina uppgifter och tryck på köp knappen för att slutföra köpet!</p>
            <p> Du har valt artikeln nedan!</p>
          </div>
        </div>
      </div>
      <div class="row col-md-12">
        <?php for ($i = 0; $i <= count($result) - 1; $i++) {
          echo "<div class=\"col-lg-4 col-md-6 mb-4\">";
          echo "<div class=\"card h-100\">";
          echo "<a href><img  class=\"card-img-top\" src=\"" . $result[$i]['Bild'] . "\"></a>";
          echo "<div class=\"card-body\">";
          echo "<h4 class=\"card-title\">";
          echo "<a href=\"#\">" . $result[$i]['Namn'] . "</a>";
          echo "</h4>";
          echo "<h5>" . $result[$i]['Pris'] . "</h5>";
          echo "<p class=\"card-text\">" . $result[$i]['Beskrivning'] . "</p>";
          echo "</div>";
          echo "<div class=\"card-footer\">";
          echo "<small class=\"text-muted\"> Antal i lager : " . $result[$i]['LagerAntal'] . "</small>";
          echo  "</div>";
        } ?>
      </div>
    </div>
    <div class="col-md-6">
      <form form action="orderConfirmed.php" method="post" >
        <div class="form-group">
          <label for="Namn">Namn</label>
          <?php  echo '<input type="hidden" id="produktId" name="produktId" value="'.$result[0]['ID'].'">' ?>
          <input type="text" class="form-control" id="namn" name="namn" placeholder="Namn">
        </div>
        <div class="form-group">
          <label for="Telefonnummer">Telefonnummer</label>
          <input type="text" class="form-control" id="telefonnummer" name="telefonnummer" placeholder="Telefonnummer">
        </div>
        <div class="form-group">
          <label for="Epost">Epost</label>
          <input type="email" class="form-control" id="epost" name="epost" placeholder="Epost">
        </div>
        <div class="form-group">
          <label for="LeveransAdress">Leverans adress</label>
          <input type="text" class="form-control" id="leveransAdress" name="leveransAdress" placeholder="Leverans adress">
        </div>
        <button  type="submit" type="button" class="btn btn-primary">Slutför köp</button>
    </div>
    </form>
    </div>
  </body>