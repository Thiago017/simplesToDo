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

if (!$db) {
  echo $db->lastErrorMsg();
} else {
  echo "Opened database successfully\n";
}
