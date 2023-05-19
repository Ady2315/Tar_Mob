<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        require('mysql.php');
        $cale = "./Images/produse/";
        $select = "SELECT imagine FROM produse WHERE id_produs=$id;";
        $result = $conn->query($select);
        $row = $result->fetch_array();
        $imagine = $row['imagine'];
        // $conn->close();
        unlink($cale . $imagine);
        
        
        // require('mysql.php');
        $delete = "DELETE FROM produse WHERE id_produs=$id;";
        
        if ($conn->query($delete) === TRUE) {
            echo "Record deleted successfully";
        } 
        else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    echo "<meta http-equiv=\"refresh\" content=\"2; URL='edit.php'\" >";
?>