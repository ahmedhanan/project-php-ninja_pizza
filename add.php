<?php
    include ('config/db_connect.php');
    $email = "";
    $title = "";
    $ingredients = "";
    $error = ["email" => '', "title" => '', "ingredients" => ''];
    if(isset($_POST["submit"])) {
        if (empty($_POST["email"])) {
            $error["email"] = "A valid email address is required.";
        } else {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["email"] = "Email must be a valid email address.";
            }
        }
        if (empty($_POST["title"])) {
            $error["title"] = "A title is required.";
        } else {
            $title = $_POST["title"];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $error["title"] = "Title must be letters and spaces only.";
            }
        }
        if (empty($_POST["ingredients"])) {
            $error["ingredients"] = "At least one ingredient is required.";
        } else {
            $ingredients = $_POST["ingredients"];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $error["ingredients"] = "Ingredients must be a comma separated list.";
            }
        }

        if (array_filter($error)) {

        } else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else {
                echo 'Error in saving to DB'.mysqli_error($conn);
            }
            header('Location: index.php');
        }
    }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">
        <label>Your Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
        <div class="red-text"><?php echo $error["email"]?></div>
        <label>Pizza Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div class="red-text"><?php echo $error["title"]?></div>
        <label>Ingredients (comma separated)</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <div class="red-text"><?php echo $error["ingredients"]?></div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php'); ?>

</html>