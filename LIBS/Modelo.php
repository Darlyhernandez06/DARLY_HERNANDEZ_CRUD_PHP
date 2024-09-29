<?php

  class modelo{
    protected $id;
    protected $table;
    protected $db;

    public function __construct(
      $id,
      $table,
      PDO $connection
    )

    {
      $this->id = $id;
      $this->table = $table;
      $this->db = $connection;
    }

    public function getAll(){
      $stm = $this->db->prepare("select * from {$this->table}");
      $stm->execute();
      return $stm->fetchAll();
    }

    public function getById($id){
      $stm = $this->db->prepare("select * from {$this->table} where id = :id");
      $stm ->bindValue(":id", $id);
      $stm->execute();
      return $stm->fetch();
    }

    public function store($data)
    {
      $sql = "INSERT INTO users1 (";

      foreach ($data as $key => $value) {
        if($value != "" ){
          $sql .= "{$key}, ";
        }
      }
      $sql = trim($sql, ', ');
      $sql .= ") VALUES (";


      foreach ($data as $key => $value) {
        if($value != "" ){
          $sql .= ":{$key}, ";
        }
      }

      $sql = trim($sql, ', ');
      $sql .= ")";

      $stm = $this->db->prepare($sql);

      foreach ($data as $key => $value) {
        if($value != "" ){
          $stm -> bindValue (":{$key}", $value);
        }
      }

      $stm->execute(); 

      $variable = $this -> db -> lastInsertId();

      return $variable;
    }
    
    public function update($id, $data){

      $sql = "UPDATE users1 SET ";

      foreach ($data as $key => $value) {
        if($value != "" ){
          $sql .= "{$key} = :{$key},  ";
        }
      }

      $sql = trim($sql, ', ');

      $sql .= " WHERE id = :id ";

      // echo $sql;
      // die();

      $stm = $this->db->prepare($sql);

      foreach ($data as $key => $value) {
        if($value != "" ){
          $stm -> bindValue (":{$key}", $value);
        }
      }

      $stm -> bindValue (":id", $id);

      $stm->execute(); 

      // echo $sql ;
    }

    public function delete($id) {
      $sql = "delete from users1 where id = :id";
      $stm = $this -> db -> prepare($sql);
      $stm -> bindValue(":id", $id);
      $stm->execute();
    }
  }
  // echo $sql;

  // die();

  // $sql = "insert into users1 (first_name, lats_name, email, phone, dni) values ('Darly', 'Hernandez' , 'darly0624@gmail.com', '3152132954', '1097095963');";

  // echo $sql;

  // echo "<pre>";
  // print_r($data);
  // echo "</pre>";
?>

