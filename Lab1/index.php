
<?php
$tourney = [
    1 => [
            'code' => 12,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    2 => [
        'code' => 13,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 19,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    3 => [
        'code' => 14,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'Ukraine',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    4 => [
        'code' => 15,
        'name' => 'Ivan',
        'sex' => 'M',
        'age' => 17,
        'country' => 'USA',
        'rating1' => 3,
        'rating2' => 3,
        'rating3' => 3
    ],
    5 => [
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

$arraycountry = [];
function searchForCountry($country, $array) {
    foreach ($array as $val) {
        if ($val['country'] === $country and $val['age'] > 18) {
            $arraycountry[] = $val;
        }
    }
    return $arraycountry;
}
function searchCountry($country, $array) {
    foreach ($array as $val) {
        if ($val['country'] === $country['c']) {
            $arraycountry[] = $val;
        }
    }
    return $arraycountry;
}
$arraycountry2 = searchForCountry('USA', $tourney);
echo '<br>';
$arraycountry3 = searchCountry($_GET, $tourney);
var_dump($_GET);
?>
<h1>Турнір</h1>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php for ($row=1; $row<6; $row++): ?>
        <tr>
        <?php foreach ($tourney[$row] as $person): ?>
            <td> <?=$person?></td>
        <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
</table>
<h1>Запит</h1>
<table>
    <tr> <th>Code</th> <th>name</th> <th>sex</th> <th>age</th>
        <th>country</th> <th>rating1</th> <th>rating2</th> <th>rating3</th> </tr>
    <?php foreach ($arraycountry2 as $person): ?>
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
    <?php foreach ($arraycountry3 as $person): ?>
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
<form action="index.php" method="post">
    Ваше ім'я: <input type="text" name="name"><br>
    <input type="submit">
</form>
<?php
var_dump($_POST);
$tourney = $_POST["code"]
?>

