<?php
//database
class MyDB extends SQLite3
{
  function __construct()
  {
    $this->open('./database/simpletodolist.db', SQLITE3_OPEN_READWRITE);
  }
}
$db = new MyDB();
// $db->exec("CREATE TABLE tasks (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT);");

