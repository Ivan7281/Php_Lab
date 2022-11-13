<?php
include "Model/Tourney.php";

$tourney1 = new Tourney();

if (isset($_POST['add_person'])) {
    $tourney1->addPerson($_POST);
}

if (isset($_POST['edit_person'])) {
    $tourney1->editPerson($_POST);
}

$tourney1->Table();
?>

<h2>Форма для додавання нового об'єкту до масиву</h2>
<form method="post">
    <label>Код: <input type="number" name="code"><br></label>
    <label>Ім'я: <input type="text" name="name"><br></label>
    <label>Стать: <input type="text" name="sex"><br></label>
    <label>Вік: <input type="number" name="age"><br></label>
    <label>Країна: <input type="text" name="country"><br></label>
    <label>Перша оцінка: <input type="number" name="rating1"><br></label>
    <label>Друга оцінка: <input type="number" name="rating2"><br></label>
    <label>Третя оцінка: <input type="number" name="rating3"><br></label>
    <input name="add_person" type="submit">
</form>
<h2>Форма для зміни об'єкта масиву</h2>
<form method="post">
    <label>Код: <input type="number" name="code"><br></label>
    <label>Ім'я: <input type="text" name="name"><br></label>
    <label>Стать: <input type="text" name="sex"><br></label>
    <label>Вік: <input type="number" name="age"><br></label>
    <label>Країна: <input type="text" name="country"><br></label>
    <label>Перша оцінка: <input type="number" name="rating1"><br></label>
    <label>Друга оцінка: <input type="number" name="rating2"><br></label>
    <label>Третя оцінка: <input type="number" name="rating3"><br></label>
    <input name='edit_person' type="submit">
</form>

