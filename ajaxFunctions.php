<?php

//ajax
require_once('./database/database.php');

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'createTask':
      createTask($_POST['name'], $_POST['description'], $db);
      break;
    case 'select':
      select();
      break;
  }
}

function createTask($name, $description, $db)
{
  $db->exec("INSERT INTO tasks (name, description) VALUES ('{$name}', '{$description}');");
}

function insert()
{
  echo "The insert function is called.";
  exit;
}