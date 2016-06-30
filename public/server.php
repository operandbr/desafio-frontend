<?php
require('../Schedule.php');
$db = new Schedule();

function insert($db)
{
    // $db->insert([]);
}

function delete($db)
{
    // $db->delete(1);
}

function update($db)
{
    // $db->update([]);
}

function get($db)
{
    // $db->getAll([]);
}

function getOne($db)
{
    // $db->getFirst(1);
}

$action = $_REQUEST['action'];

if (isset($action)) {
    switch ($action) {
        case 'insert':
            echo insert($db);
            break;
        case 'delete':
            echo delete($db);
            break;
        case 'update':
            echo update($db);
            break;
        case 'get':
            echo get($db);
            break;
        case 'getOne':
            echo getOne($db);
            break;
        default:
            echo '';
    }
}
