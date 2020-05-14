<?php
namespace Model;
use DB\Connection;
use PDO;

class Empleados
{
    protected $table ='Empleados';

    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function register( array $datos):bool
    {
        $query = $this->conn->prepare("INSERT into $this->table (name,surname,position,salary) values(:name,:surname,:position,:salary)");
        $query->bindParam('name', $datos['name'], PDO::PARAM_STR);
        $query->bindParam('surname', $datos['surname'], PDO::PARAM_STR);
        $query->bindParam('position', $datos['position'], PDO::PARAM_STR);
        $query->bindParam('salary', $datos['salary'], PDO::PARAM_STR);
        return $query->execute();

    }

    public function update( array $datos):bool
    {
        if(!empty($datos['id'])) {
            $query = $this->conn->prepare("UPDATE $this->table SET name = :name, surname = :surname, position = :position,salary=:salary WHERE id = :id ");
            $query->bindParam('name', $datos['name'], PDO::PARAM_STR);
            $query->bindParam('surname', $datos['surname'], PDO::PARAM_STR);
            $query->bindParam('position', $datos['position'], PDO::PARAM_STR);
            $query->bindParam('salary', $datos['salary'], PDO::PARAM_STR);
            $query->bindParam('id',$datos['id'],PDO::PARAM_INT);
            return $query->execute();
        }
        return false;

    }

    public function  select():array
    {
        $query =$this->conn->prepare("Select * from $this->table");
        $query->execute();

        return  $query->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function  selectId(int $id):array
    {
        $query =$this->conn->prepare("Select * from $this->table where id=:id");
        $query->bindParam('id',$id,PDO::PARAM_INT);
        $query->execute();
        return  $query->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id):bool
    {
        $query = $this->conn->prepare("Delete from {$this->table} where id =:id");
        $query->bindParam('id',$id,PDO::PARAM_INT);
        return $query->execute();
    }


}