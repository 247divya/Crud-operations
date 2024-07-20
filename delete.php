<?php 
include 'connection.php';
function renumberIDs($conn) {
    $selectQuery = "SELECT id FROM crud ORDER BY id";
    $delresult = mysqli_query($conn, $selectQuery);
    
    if ($delresult) {
        $counter = 1;
        while ($row = mysqli_fetch_assoc($delresult)) {
            $id = $row['id'];
            $updateQuery = "UPDATE crud SET id = $counter WHERE id = $id";
            mysqli_query($conn, $updateQuery);
            $counter++;
        }

        $nextAutoIncrement = $counter;
        $resetAutoIncrementQuery = "ALTER TABLE crud AUTO_INCREMENT = $nextAutoIncrement";
        mysqli_query($conn, $resetAutoIncrementQuery);
    }
}

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM crud WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:display.php');
        renumberIDs($conn);

      
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
 