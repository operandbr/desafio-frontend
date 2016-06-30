<?php
class ScheduleDatabase
{
    private function __construct() {
        $sqlitedb = $this->config['sqlitedb'];

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->db = new PDO('sqlite:{' . $sqlitedb . '}');
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    private function filter($schedule) {
        if (false !== ($list = $this->run('PRAGMA table_info(\'schedule\');'))) {
            $fields = [];

            foreach($list as $record) {
                $fields[] = $record['name'];
            }

            return array_values(array_intersect($fields, array_keys($schedule)));
        }

        return [];
    }

    public function run($sql, $bind = []) {
        $sql = trim($sql);

        try {
            $result = $this->db->prepare($sql);
            $result->execute($bind);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    public function insert($schedule) {
        $fields = $this->filter('schedule', $schedule);
        $sql = 'INSERT INTO ' . 'schedule' . ' (' . implode($fields, ', ') . ') VALUES (:' . implode($fields, ', :') . ');';
        $bind = [];

        foreach($fields as $field) {
            $bind[':$field'] = $schedule[$field];
        }

        $result = $this->run($sql, $bind);
        return $this->db->lastInsertId();
    }

    public function fetch($schedule = []) {
        $sql = 'SELECT * FROM schedule WHERE 1 = 1 ';

        if (!empty($schedule['sTitle'])) {
            $sql .= ' AND sTitle LIKE "%' . $schedule['sTitle'] . '%"';
        }

        if (!empty($schedule['sDescription'])) {
            $sql .= ' AND sDescription LIKE "%' . $schedule['sDescription'] . '%"';
        }

        if (!empty($schedule['dtScheduleStart']) && !empty($schedule['dtScheduleEnd'])) {
            $sql .= ' AND dtSchedule BETWEEN "' . $schedule['dtScheduleStart'] . '" AND "' . $schedule['dtScheduleEnd'] . '"';
        } else if (!empty($schedule['dtScheduleStart'])) {
            $sql .= ' AND dtSchedule > "' . $schedule['dtScheduleStart'] . '"';
        } else if (!empty($schedule['dtScheduleEnd'])) {
            $sql .= ' AND dtSchedule < "' . $schedule['dtScheduleEnd'] . '"';
        }

        $sql .= ';';

        $result = $this->run($sql, []);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = [];

        while ($row = $result->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function fetchOne($iSchedule) {
        // $result = $this->run('SELECT * FROM schedule WHERE iSchedule = ' . $iSchedule . ';', []);
        // $result->setFetchMode(PDO::FETCH_ASSOC);

        // return $result->fetchOne();
        return $this->fetch(['iSchedule' => $iSchedule])[0];
    }

    public function update($iSchedule, $schedule) {
        $sql = 'UPDATE schedule SET ';
        $bind = [];

        $fields = $this->filter('schedule', $schedule);
        $fieldSize = sizeof($fields);

        for ($f = 0; $f < $fieldSize; ++$f) {
            if ($f > 0) {
                $sql .= ', ';
            }

            $sql .= $fields[$f] . ' = :update_' . $fields[$f];
        }

        $sql .= ' WHERE $iSchedule = ' . $iSchedule . ';';

        foreach ($fields as $field) {
            $bind[':update_$field'] = $schedule[$field];
        }

        $result = $this->run($sql, $bind);
        return $result->rowCount();
    }

    public function delete($iSchedule) {
        $sql = 'DELETE FROM schedule WHERE iSchedule = ' . $iSchedule . ';';
        $result = $this->run($sql);
        return $result->rowCount();
    }
}
