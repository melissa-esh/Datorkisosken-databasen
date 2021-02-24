<?php
require_once ('../database.php');

if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ))
    if($_GET['id'] == 0){
        echo "removing all";
        $result = $conn->query("select * from kontakt")->fetchAll();
        for ($x = 0; $x <= count($result)-1; $x++) {
        $id = $result[$x]["ID"];
        $stmt = $conn->prepare( "DELETE FROM kontakt WHERE id =:id" );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        }
    }
    else
        {
            $id = $_GET['id'];
            $stmt = $conn->prepare( "DELETE FROM kontakt WHERE id =:id" );
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);

?>