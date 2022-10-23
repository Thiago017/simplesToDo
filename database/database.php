<?php

$db = new SQLite3('./database/simpletodolist.db');

$db->exec("CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY, name TEXT NOT NULL, description TEXT);");

$db->exec("INSERT INTO tasks (name, description) VALUES('teste 1', 'isso e o primeiro teste')");
$db->exec("INSERT INTO tasks (name, description) VALUES('teste 2', 'isso e o segundo teste')");

// $db->exec("CREATE TABLE IF NOT EXISTS tasks (
//   id INTEGER PRIMARY KEY AUTOINCREMENT,
//   name TEXT NOT NULL,
//   description TEXT);");