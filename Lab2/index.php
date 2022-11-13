<?php
$tourney = [
    [
            'code' => 12,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    [
        'code' => 13,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 19,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    [
        'code' => 14,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    [
        'code' => 15,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'USA',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    [
        'code' => 16,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 19,
        'country' => 'USA',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ]
];
function searchForCountry($country, $array) {
    foreach ($array as $val) {
        if ($val['country'] === $country and $val['age'] > 18) {
            $array_country[] = $val;
        }
    }
    return $array_country;
}

function searchCountry($country, $array) {
    foreach ($array as $val) {
        if ($val['country'] === $country['c']) {
            $array_country[] = $val;
        }
    }
    return $array_country;
}

function addNewPerson() {
    return [
            'code' => $_POST['code'],
        'name' => $_POST['name'],
        'sex' => $_POST['sex'],
        'age' => $_POST['age'],
        'country' => $_POST['country'],
        'rating1' => $_POST['rating1'],
        'rating2' => $_POST['rating2'],
        'rating3' => $_POST['rating3']
    ];
}

function editPerson($tourney) {
    foreach ($tourney as $person) {
        if ($person['code'] == $_POST['code']){
            $person = array_replace($person, $_POST);
        }
        $tourney2[] = $person;
    }
    return $tourney2;
}

function personValidation() {
    if (
            empty($_POST['name']) ||
            empty($_POST['sex']) ||
            $_POST['age'] < 0 ||
            empty($_POST['country']) ||
            $_POST['rating1'] < 0 ||
            $_POST['rating2'] < 0 ||
            $_POST['rating3'] < 0 )
        $person = false;
    else
        $person = true;
    return $person;
}

$array_country2 = searchForCountry('USA', $tourney);

$array_country3 = searchCountry($_GET, $tourney);

$tourney3 = unserialize(file_get_contents("tourneyFile.TXT"));

if (isset($_POST['add_person'])) {
    $person = addNewPerson();
    if (personValidation()) {
        $tourney3[] = $person;
        $fd = fopen("tourneyFile.TXT", 'w') or die("файл не відкривається");
        fwrite($fd, serialize($tourney3));
        fclose($fd);
        $tourney3 = unserialize(file_get_contents("tourneyFile.TXT"));
    }
}

if (isset($_POST['edit_person'])) {
    if (personValidation()) {
        $fd = fopen("tourneyFile.TXT", 'w') or die("файл не відкривається");
        fwrite($fd, serialize(editPerson($tourney3)));
        fclose($fd);
        $tourney3 = unserialize(file_get_contents("tourneyFile.TXT"));
    }
}

?>
<h1>Турнір</h1>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php foreach ($tourney as $person): ?>
        <tr>
            <td><?=$person['code']?></td>
            <td><?=$person['name']?></td>
            <td><?=$person['sex']?></td>
            <td><?=$person['age']?></td>
            <td><?=$person['country']?></td>
            <td><?=$person['rating1']?></td>
            <td><?=$person['rating2']?></td>
            <td><?=$person['rating3']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<h1>Запит</h1>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php foreach ($array_country2 as $person): ?>
    <tr>
        <td><?=$person['code']?></td>
        <td><?=$person['name']?></td>
        <td><?=$person['sex']?></td>
        <td><?=$person['age']?></td>
        <td><?=$person['country']?></td>
        <td><?=$person['rating1']?></td>
        <td><?=$person['rating2']?></td>
        <td><?=$person['rating3']?></td>
    </tr>
    <?php endforeach; ?>
</table>
<h1>Запит через рядок стану</h1>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php foreach ($array_country3 as $person): ?>
        <tr>
            <td><?=$person['code']?></td>
            <td><?=$person['name']?></td>
            <td><?=$person['sex']?></td>
            <td><?=$person['age']?></td>
            <td><?=$person['country']?></td>
            <td><?=$person['rating1']?></td>
            <td><?=$person['rating2']?></td>
            <td><?=$person['rating3']?></td>
        </tr>
    <?php endforeach; ?>
</table>
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
<?php if (isset($tourney3)):?>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php foreach ($tourney3 as $person): ?>
        <tr>
            <td><?=$person['code']?></td>
            <td><?=$person['name']?></td>
            <td><?=$person['sex']?></td>
            <td><?=$person['age']?></td>
            <td><?=$person['country']?></td>
            <td><?=$person['rating1']?></td>
            <td><?=$person['rating2']?></td>
            <td><?=$person['rating3']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif;?>


