<?php require_once 'head.php' ?>
<?php require_once 'header.php' ?>

<body>
    <h1>Done</h1>

    <?php
    $query = "SELECT titel, afdeling FROM taken WHERE status = 'done'";
    $statement = $conn->prepare($query);
    $statement->execute();
    
    $result = $statement->get_result();
    $taken = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Afdeling</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taken as $taak): ?>
                <tr>
                    <td><?php echo htmlspecialchars($taak['titel']); ?></td>
                    <td><?php echo htmlspecialchars($taak['afdeling']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require_once 'footer.php' ?>
</body>
</html>