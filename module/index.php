<?php
$connect =mysqli_connect('localhost', 'root', '', 'list1');
$students_list = mysqli_query($connect, "SELECT * FROM `students`");
$students_list = mysqli_fetch_all($students_list);
?>

<table>
        <tr> <th>id</th> <th>name</th> <th>course</th> <th>specialty</th> </tr>
        <?php foreach ($students_list as $student): ?>
            <tr>
                <td><?=$student[0]?> </td>
                <td><?=$student[1]?> </td>
                <td><?=$student[2]?> </td>
                <td><?=$student[3]?> </td>
                <td><a href="Model/delete.php?id=<?= $student[0] ?>">Вилучити</a></td>
            </tr>
        <?php endforeach; ?>
</table>