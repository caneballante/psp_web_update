<?php
class MyPDO extends PDO {
  public function __construct() {
$host='localhost';
$db='psppress';
$user='press';
$pw='InF0rM3r9229';
  try {
      parent::__construct('mysql:host='.$host.';dbname='.$db.'',$user,$pw,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}
