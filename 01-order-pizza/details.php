<?php 

include 'config/db_connect.php';

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pizzas WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_array($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>


<!DOCTYPE html>
<html>

<?php include 'template\header.php';?>
 
    <div class="container center">
        <?php if($pizza){ ?>
            <h4> <?php echo $pizza['title'] ?> </h4>
            <p> سفارش: <?php echo $pizza['email'] ?> </p>
            <p> در تاریخ: <?php echo date($pizza['created_at']) ?> </p>
            <h5>مخلفات</h5>
            <p> <?php echo $pizza['ingredients'] ?> </p>
        <?php }else { ?>
            <h5>No such piza exists.</h5>
        <?php } ?>
    </div>


<?php include 'template\footer.php';?>

</html>