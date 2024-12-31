<?php

    include'config\db_connect.php';


    $sql = 'SELECT * FROM pizzas';

    $result = mysqli_query($conn, $sql);

    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn); 

    // print_r($pizzas);

?>

<!DOCTYPE html>
<html dir="rtl" lang="en">

    <?php include 'template\header.php';?>

    <h2 class="text-center mt-4 mb-2">!pizzas</h2>

    <div class="container text-center">
        <div class="row">
        
        <?php foreach($pizzas as $pizza){ ?>
            
            <div class="col-sm-6  col-md-4 col-lg-3">
                <div class="card text-bg-warning bg-opacity-75 mb-3" style="height: 11rem;"  ">
                    <div class="card-body overflow-auto">
                        <h6 class="card-title"><?php echo htmlspecialchars($pizza['title'])?></h6>
                        <ul class="card-text list-unstyled ">
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
                               <li><?php echo htmlspecialchars($ing);?></li> 
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-footer text-start">
                        <a class="btn brand text-dark" href="./details.php?id=<?php echo $pizza['id']?>">جزئیات</a>
                    </div>                
                </div>
            </div>
        <?php } ?></div>
    </div>




<?php include 'template\footer.php';?>




</html>