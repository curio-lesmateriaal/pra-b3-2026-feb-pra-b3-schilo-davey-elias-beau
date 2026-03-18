
<!doctype html>
<html lang="nl">

<head>
    <title>taakverdeling</title>
    <?php require_once __DIR__.'/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'//header.php'; ?>

    <div class="container">
        <h1>Taken</h1>
        <a href="create.php">Nieuwe taak &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>
        <?php 
        require_once __DIR__.'/backend/config.php'; 
        require_once __DIR__. '/backend/conn.php';
        ?>
        

        
        
        
        <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">
        <table class="meldingen-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Beschrijving</th>
                    <th>Afdeling</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Naam</th>
                    <th>aanpassen</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    require_once __DIR__. '/backend/conn.php';
                    $query = "SELECT * FROM taken";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $taaken = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($taaken as $item):?>
                <tr>
                    <td><?php echo $item['title'];?></td>
                    <td><?php echo $item['beschrijving'];?></td>
                    <td><?php echo $item['afdeling'];?></td>
                    <td><?php echo $item['status'];?></td>
                    <td><?php echo $item['deadline'];?></td>
                    <td><?php echo $item['user'];?></td>
                    <td><a href="edit.php?id=<?php echo $item['id']; ?>">aanpassen</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
=======
    <?php require_once 'header.php' ?>
    <div class="container">
        
    </div>

</body>

</html>