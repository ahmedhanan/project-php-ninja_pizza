<?php
    include ('config/db_connect.php');
    //sql query
    $query = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    //query the db
    $result = mysqli_query($conn, $query);

    //fetch and create an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free results
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container">
    <?php if($pizzas): ?>
        <h4 class="center grey-text">
            Pizzas!
        </h4>
<div class="row">
    <?php foreach($pizzas as $pizza) { ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <img src="image/pizza.svg" class="pizza">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                    <ul>
                        <?php foreach (explode(",", $pizza["ingredients"]) as $ing) { ?>
                            <li><?php echo htmlspecialchars($ing); ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">More info</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    <?php else: ?>
    <div class="col lg12 center">
        <h4>We currently have no recipes, <a href="add.php">
                why not add one?
            </a>
        </h4>
            <br>
        <h6>
            Your recipe will be publicly available 😁
            <br>
            You can delete your recipe 😃
        </h6>

    </div>
    <?php endif; ?>
</div>
<?php include('templates/footer.php'); ?>

</html>