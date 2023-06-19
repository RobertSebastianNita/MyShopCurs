<?php
namespace Classes;

abstract class Base
{
    protected $id;
    /**
     * @param $id
     */
    /**
     * @param $id
     */
    public function __construct($id=null)
    {
        if ($id) {
            $tableName = static::getTableName();
            $sql = "SELECT * FROM $tableName WHERE id = '$id' LIMIT 1;";
            $data = query($sql);
            if (count($data)>0){
                $this->fromArray($data[0]);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function fromArray($data)
    {
        foreach ($data as $attrName=>$attrValue){
            $this->$attrName = $attrValue;
        }
    }

    private function insert(){
        $tableName = $this->getTableName();
        $data = get_object_vars($this);
        unset($data['id']);
        $columns = [];
        $values = [];
        foreach ($data as $key=>$value){
            if (!is_null($value)) {
                $columns[] = $key;
                $values[] = $value;
            }
        }
        $columnsStr = implode('`, `',$columns);
        $valuesStr = implode("', '",$values);

        $sql = "INSERT INTO $tableName (`$columnsStr`) VALUES ('$valuesStr');";

        global $connection;
        $query = mysqli_query($connection,$sql);

        if ($query===false){
            die('Error on:'.$sql);
        }

        $this->id = mysqli_insert_id($connection);
    }

    public function save()
    {
        if ($this->id>0){
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete(){
        $id = $this->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName WHERE id=$id;";
        return query($sql);
    }

    private function update(){
        $id = $this->id;
        $tableName = $this->getTableName();
        $data = get_object_vars($this);
        unset($data['id']);
        $sets=[];
        foreach ($data as $key=>$value){
            if (!is_null($value)) {
                $sets[] = "`$key`='$value'";
            }
        }
        $setsStr = implode(', ',$sets);

        $sql = "UPDATE $tableName SET $setsStr WHERE id=$id;";
        global $connection;
        $query=mysqli_query($connection,$sql);
        if ($query===false){
            die('Error on:'.$sql);
        }
    }

    /**
     * @return static[]
     */
    public static function findBy($column, $columnValue)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE $column = '$columnValue';";
        $data = query($sql);
        $objList=[];
        foreach ($data as $item){
            $objList[]=static::objFromArray($item);
        }
        return $objList;
    }

    /**
     * @return static
     */
    public static function  findOneBy($column, $columnValue){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE $column = '$columnValue' LIMIT 1;";
        $result = query($sql);
        if (isset($result[0])){
            return static::objFromArray($result[0]);
        } else {
            return false;
        }
    }

    private static function objFromArray($array){
        $className = static::class;
        $object = new $className();
        $object->fromArray($array);
        return $object;
    }

    /**
     * @return static
     */
    public static function find($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE id = '$id' LIMIT 1;";
        $result = query($sql);
        if (isset($result[0])){
            return static::objFromArray($result[0]);
        } else {
            return false;
        }
    }


    /**
     * @return static[]
     */
    public static function findAll()
    {
        $tableName = static::getTableName();
        $connection = mysqli_connect('45.15.23.59','root', 'Sco@l@it123','national-04-robert-property');;
        $sql = "SELECT * FROM $tableName;";
      //  var_dump(mysqli_connect('45.15.23.59','root', 'Sco@l@it123','national-04-robert-property'));
        $query = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $objList=[];
        foreach ($data as $item){
            $objList[]=static::objFromArray($item);
        }
        return $objList;

    }

    public static abstract function getTableName();

//    public static function findBy($tableName, $column,$columnValue) {
//        global $connection;
//        $sql = "SELECT * FROM $tableName WHERE $column= '$columnValue';";
//        return query($sql);
//    }

}