<!-- views/index.php -->
<h1 class="">Users</h1>
<a href="reporte" class="ml-2 mt-2 p-2 bg-green-700 shadow text-md border rounded-md text-white">Reporte PDF</a>

<a href="index.php?page=office&action=create">Create New Offices</a>
<table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

<tr>
        <th>ID</th>
        <th>City</th>
        <th>Phone</th>
        <th>Eliminar</th>
        <th>Actualizar</th>
    </tr>
</thead>
    <?php
        foreach($offices as $oficina):
    ?>

                <tr>
                    <td><?php echo $oficina["officeCode"] ?></td>
                    <td><?php echo $oficina["city"] ?></td>
                    <td><?php echo $oficina["phone"] ?></td>
                    <td><a href="index.php?page=office&action=delete&id=<?php echo $oficina["officeCode"] ?>">Eliminar</a></td>
                    <td>Actualizar</td>
                </tr>
    <?php endforeach; ?>
   
</table>

