<?php

class Tourney
{
    public $tourney = [];

    public function personValidation($person) {
        if (
            empty($person['name']) ||
            empty($person['sex']) ||
            $person['age'] < 0 ||
            empty($person['country']) ||
            $person['rating1'] < 0 ||
            $person['rating2'] < 0 ||
            $person['rating3'] < 0 )
            $validation = false;
        else
            $validation = true;
        return $validation;
    }

    public function addPerson($person)
    {
        if ($this->personValidation($person) === true) {
            $this->tourney = unserialize(file_get_contents("tourneyFile.TXT"));
            $this->tourney[] = $person;
            $fd = fopen("tourneyFile.TXT", 'w');
            fwrite($fd, serialize($this->tourney));
            fclose($fd);
            $this->tourney = unserialize(file_get_contents("tourneyFile.TXT"));
        }
    }
    public function editPerson($person) {
        if ($this->personValidation($person) === true) {
            $this->tourney = unserialize(file_get_contents("tourneyFile.TXT"));
            foreach ($this->tourney as $person1) {
                if ($person1['code'] == $person['code']) {
                    $person1 = array_replace($person1, $person);
                }
                $tourney2[] = $person1;
            }
            $fd = fopen("tourneyFile.TXT", 'w');
            fwrite($fd, serialize($tourney2));
            fclose($fd);
            $this->tourney = unserialize(file_get_contents("tourneyFile.TXT"));
        }
    }
    public function Table(){
        $table = "<table>";
        $table .= "<tr>
                <th>code</th>
                <th>name</th>
                <th>sex</th>
                <th>age</th>
                <th>country</th>
                <th>rating1</th>
                <th>rating2</th>
                <th>rating3</th>
            </tr>";

        foreach ($this->tourney as $person){
            $table .= "<tr></tr>";
            foreach ($person as $value){
                $table .= "<td>$value</td>";
            }
        }

        echo $table;
    }
}