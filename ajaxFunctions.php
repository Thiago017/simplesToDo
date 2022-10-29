<?php

//ajax
require_once('./database/database.php');

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'createTask':
      if ($_POST['name'] != null && $_POST['description']!= null ) {
        createTask($_POST['name'], $_POST['description'], $db);
      }
      break;
    case 'select':
      select();
      break;
    case 'deleteTask':
      deleteTask($_POST['id'], $db);
      break;
    case 'generateTable':
      generateTable($db);
      break;
  }
}

function createTask($name, $description, $db)
{
  $db->exec("INSERT INTO tasks (name, description) VALUES ('{$name}', '{$description}');");
}


function deleteTask($id, $db)
{
  $db->exec("DELETE FROM tasks WHERE id = {$id};");

  echo json_encode(['status' => 201]);
}

function generateTable($db)
{

  $results = $db->query("SELECT * FROM tasks;");

  $data = array();

  while ($res = $results->fetchArray(1)) {
    array_push($data, $res);
  }

  echo json_encode($data);
}
