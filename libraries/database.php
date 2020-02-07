<?php

class Database {
  public $host = DB_HOST;
  public $user = DB_USER;
  public $pass = DB_PASS;
  public $db_name = DB_NAME;

  public $link;
  public $error;


  public function __construct(){
    $this->connect();
  }

  private function connect(){
    $this->link = new mysqli($this->host,$this->user,
    $this->pass, $this->db_name);

    if(!$this->link){
      $this->error = "connection fail".
      $this->link->connect_error();
      return false;

    }
  }

    public function select($sql){
      $result = $this->link->query($sql)
      or die($this->link->error.__LINE__);
      if($result->num_rows > 0){
        return $result;
      }else{
        return false;
      }
    }

    public function insert($sql){
      $insert_row = $this->link->query($sql);
      if($insert_row){
        header("location: index.php?msg="
        .urldecode('record added'));
        exit();
      }else{
        die($this->link->error.__LINE__);
      }
    }

    public function update($sql){
      $update_row = $this->link->query($sql);
      if($update_row){
        header("location: index.php?msg="
        .urldecode('record updated'));
        exit();
      }else{
        die($this->link->error.__LINE__);
      }
    }


    public function delete($sql){
      $delete_row = $this->link->query($sql);
      if($delete_row){
        header("location: index.php?msg="
        .urldecode('record deleted'));
        exit();
      }else{
        die($this->link->error.__LINE__);
      }
    }

}

 ?>
