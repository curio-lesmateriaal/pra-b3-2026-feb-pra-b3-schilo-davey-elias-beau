<?php require_once 'head.php' ?>
<?php require_once 'header.php' ?>

<body>
    <h1>Done</h1>

    <?php
    // Haal ook de ID op, anders kun je niet linken naar edit.php of delete
    $query = "SELECT id, titel, afdeling FROM taken WHERE status = 'done'";
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
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taken as $taak): ?>
                <tr>
                    <td><?= htmlspecialchars($taak['titel']) ?></td>
                    <td><?= htmlspecialchars($taak['afdeling']) ?></td>
                    <td>
                        <form action="backend/tasksController.php?action=delete" 
                              method="POST"
                              onsubmit="return confirm('Weet u zeker dat u deze taak wilt verwijderen?');">
                            
                            <input type="hidden" name="id" value="<?= $taak['id'] ?>">
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require_once 'footer.php' ?>
</body>
</html>