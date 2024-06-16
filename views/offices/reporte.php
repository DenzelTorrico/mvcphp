<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Oficinas</title>
</head>
<body>
    <table border="1px" width="100%">
        <tr>
            <th>ID</th>
            <th>CITY</th>
            <th>PHONE</th>
        </tr>
        <?php
        foreach($reporte as $oficina):
    ?>

                <tr>
                    <td><?php echo $oficina["officeCode"] ?></td>
                    <td><?php echo $oficina["city"] ?></td>
                    <td><?php echo $oficina["phone"] ?></td>
                </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>