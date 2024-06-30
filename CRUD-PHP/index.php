<?php include('connection.php') ?>
<?php include('header.php') ?>

<a href="http://localhost/crud/insert.php" class="add">Add Posts</a>
<div class="posts">
    <?php
    $query = "SELECT * FROM `person`";
    $result = mysqli_query($conn, $query);
    $a = 1;
    while ($row = mysqli_fetch_array($result)) { ?>
        <div class="post">
            <h2>Post # <?php echo $row['pID']; ?></h2>
            <h3>@<?php echo $row['name']; ?></h3>
            <h4><?php echo $row['email']; ?></h4>
            <h5><?php echo $row['age']; ?></h5>
            <div class="btn">
                <a href="view.php?pID=<?php echo $row['pID']; ?>">View</a>
                <a href="update.php?pID=<?php echo $row['pID']; ?>">Update</a>
                <a href="delete.php?pID=<?php echo $row['pID']; ?>">Delete</a>
            </div>
        </div>
    <?php $a++;
    } ?>
</div>
</body>

</html>