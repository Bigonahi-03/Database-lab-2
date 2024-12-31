<?php 

    include 'config/db_connect.php';

    $email = $title = $ingredients = '';

    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['email']);
        // echo "<br>";
        // echo htmlspecialchars($_POST['title']);
        // echo "<br>";
        // echo htmlspecialchars($_POST['ingredients']);
        // echo '<br>';


        //Email Validation
        if(empty($_POST['email'])){
            $errors['email'] = 'Email not required <br>';
        }else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email is not valid <br>';
            }
        }

        //title Validation
        if(empty($_POST['title'])){
            $errors['title'] = 'Title Required <br>';
        }else {
            $title = $_POST ['title'];
            if(!preg_match('/^[a-zA-Zآ-ی\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only <br>';
            }
        }

        //ingredients Validation
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'ingredients requied <br>';
        } else {
            $ingredients = $_POST ['ingredients'];
            if(!preg_match('/^[a-zA-Zآ-ی\s]+(,\s?[a-zA-Zآ-ی\s]*)*$/', $ingredients)){   
                $errors['ingredients'] = 'Ingredients should be Separated by Comm <br>';
            }
        }

        if(!array_filter($errors)){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
            
            $sql = "INSERT INTO pizzas(email, title, Ingredients) VALUES ('$email', '$title', '$ingredients')";
            
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            }else{
                echo'Query error' . mysqli_error($conn);
            }
            
        }

    } 

?>

 
<!DOCTYPE html>
<html>
    <?php include 'template\header.php';?>

    <section class="">
        <form class="bg-form border" action="add.php" method="POST">
            <h4 class="mx-auto text-center"> سفارش پیتزا </h4>

            <label class="form-label">ایمیل</label>
            <input class="form-control border-0 border-bottom" type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
            <div class="text-danger"><?php echo $errors['email'];?></div>
            <br>

            <label class="form-label">نوع پیتزا</label>
            <input class="form-control border-0 border-bottom" type="text" name="title" value="<?php echo htmlspecialchars($title);?>">
            <div class="text-danger"><?php echo $errors['title'];?></div>
            <br>

            <label class="form-label">مخلفات</label>
            <input class="form-control border-0 border-bottom" type="text"name="ingredients" value="<?php echo htmlspecialchars($ingredients );?>">
            <div class="text-danger"><?php echo $errors['ingredients'];?></div>
            <br>

            <div class="center">
                <input type="submit" name="submit" value="سفارش"class="btn btn-form  z-depth-0">
            </div>
        </form>
    </section>

</html>