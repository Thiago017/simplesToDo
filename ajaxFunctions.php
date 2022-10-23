<?php

require_once('./database/database.php');

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'createTask':
      createTask($_POST['name'], $_POST['description']);
      break;
    case 'select':
      select();
      break;
  }
}

function createTask()
{
  $db->exec("INSERT INTO tasks (name, description) VALUES ('teste', 'isso é um teste'");
}

function insert()
{
  echo "The insert function is called.";
  exit;
}
