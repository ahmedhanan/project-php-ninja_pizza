<?php
    include ('config/db_connect.php');
    $pizza = [] ;
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM pizzas WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $pizza = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id";
        if(mysqli_query($conn, $sql)){
            header("location: index.php");
        } else {
            echo "Couldn't delete that recipe" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container center">
    <?php if($pizza): ?>
    <h4>
        <?php echo htmlspecialchars($pizza['title']); ?>
    </h4>
    <p> Created by:
        <?php echo htmlspecialchars($pizza['email']) ?>
    </p>
    <p>
        <?php echo date($pizza['created_at']); ?>
    </p>
    <h5>
        Ingredients:
    </h5>
    <ul>
        <?php foreach (explode(",",$pizza['ingredients']) as $ing) : ?>
            <li>
                <?php echo htmlspecialchars($ing); ?>
            </li>
        <?php endforeach;  ?>
    </ul>
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
        <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
    </form>
    <?php else: ?>
        <div class="row">
            <div class="col s12 md12 lg12">
                <div class="card-panel red">
                    <span class="white-text">Must be a really delicious pizza, but we don't have the recipe :(</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include('templates/footer.php'); ?>

</html>
