<?php
require_once ('../database.php');
$result = $conn->query("select * from kontakt")->fetchAll();
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alla meddelanden</title>
</head>

<body class="container">

    <table class="table table-sm">
        <tr class="table-dark">
            <th>Namn</th>
            <th>E-post</th>
            <th>Meddelande</th>
            <th></th>
        </tr>
        <?php
        for ($i = 0; $i<= count($result)-1; $i++) {
        echo '<tr>'.'<td>'. $result[$i]['namn'] .'</td>'.'<td>'. $result[$i]['email'] .'</td>'.'<td>'.'<pre>' .$result[$i]['meddelande'] .'</pre>'.
         '</td>' . '<td class=\'text-center\'>' . '<a href=\'delete.php?id=' . $result[$i]['ID'] . '\'class=\'btn btn-sm btn-outline-danger\'>'.
        'Ta bort'.'</a>'.'</td>'. '</tr>';
         }
        ?>
    </table>

    <a href='delete.php?id=0' class='btn btn-sm btn-outline-danger'>
        Ta bort alla meddelanden
    </a>

</body>

</html>