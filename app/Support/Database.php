<?php
namespace App\Support;


use mysqli;

class Database{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $db   = 'ajax';
  private $connection;

  /**
   * Database Connection Method
   */

  private function way(){
    return $this -> connection = new mysqli($this -> host , $this -> user , $this -> pass , $this -> db);
  }

    /**
   * Insert data Method
   */

  protected function Insert($sql){
   $status =  $this -> way() -> query($sql);
   if($status){
     return true;
   }else{
     return false;
   }

  }

    /**
   * All Data Select Method
   */

   protected function SelectAll($tbl , $order = 'DESC'){
     return $this -> way() -> query("SELECT * FROM  $tbl  ORDER BY id = '$order'");
   }

    /**
   * Single Data Show Method
   */

   protected function SingleData($tbl , $id){
    return $this -> way() -> query("SELECT *  FROM  $tbl  WHERE id = '$id' ");
   }

    /**
   * Single Data Delete 
   */

  protected function DataDelete($tbl , $id){
     $status = $this -> way() -> query("DELETE FROM  $tbl  WHERE id = '$id' ");
     if($status){
      return true;
    }else{
      return false;
    }
  }

  /**
   * Single Data Update Method
   */

   protected function DataUpdate($sql){
    $status = $this -> way() -> query("$sql");
    if($status){
      return true;
    }else{
      return false;
    }
   }
  /**
   * custom query Method
   */

   protected function customquery($col, $tbl, $val){
     $sql = "SELECT $col FROM $tbl WHERE $col='$val'";
     $status = $this ->way() -> query($sql);

     $data = $status -> num_rows;

     if($data > 0){
      return false;
     }else{
      return true;
     }


   }


   /**
   * serach method
   */

   protected function serach($sql){
     return $status = $this -> way() -> query($sql);
   }
   

  
}