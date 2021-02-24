<?php

$server = "localhost";
$dbName = "kontaktlista";
$dbUser = "root";
$dbPass = "root";
$db_DSN = "mysql:host=$server;dbname=$dbName;charset=UTF8;port=8889";

try {

    $conn = new PDO($db_DSN, $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
   echo "<p>Connection failed: " . $e->getMessage() . "</p>";
   exit(1);
}

?>

<!doctype html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Craigs list</title>
</head>

<body class="container">
    <h1>Kontaktlista</h1>
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

</body>

</html>