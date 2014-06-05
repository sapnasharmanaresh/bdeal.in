<?php

class Database extends PDO {
    function __construct($dbbase, $dbhost, $dbname, $dbuser, $dbpass) {
        try {
            require 'application/config/database.php';
            $db = parent::__construct($dbbase . ':host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * insert
     * @param string $table name of table in which data is to be inserted
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode(',', array_keys($data));
        //print_r($fieldNames);
        $fieldValues = ':' . implode(',:', array_keys($data));
        // print_r($fieldValues);
        $sth = $this->prepare("INSERT INTO $table($fieldNames) VALUES ($fieldValues)");
   //   echo  'INSERT INTO $table($fieldNames) VALUES ($fieldValues)';
        foreach ($data as $key => $value) {
            $sth->bindValue("$key", $value);
           //echo $value;
        }
        $sth->execute();
        
    }

    /**
     * update
     * @param string $table name of table in which data is to be inserted
     * @param string $data An associative array
     */
    public function update($table,$data,$where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach($data as $key=>$value){
            $fieldDetails .= "`$key`=:$key,";  
        }
        $fieldDetail = rtrim($fieldDetails,',');
        
        $sth = $this->prepare("UPDATE `$table` SET $fieldDetail WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
     // echo "UPDATE `$table` SET $fieldDetail WHERE $where<br/>$key<br/>$value";
        $sth->execute();
        //print_r($sth->execute());
        /**
         * put your content in where clause in quotes 
         *  quotes are not required for field names
         */
        
    }
    /**
     * 
     * @param mixed $sql mysql_query to execute
     * @param array $data the data passed in order to bind to the query
     * @param $fetchmode this decides the mode in which data is fetched
     * @return array 
     *      
     */
    public function select($sql,$data=array(),$fetchmode = PDO::FETCH_ASSOC){
       // echo Hash::create('sha256', 'admin', HASH_PASSWORD_KEY)."<br/>";
       // echo Hash::create('sha256', 'sapna', HASH_PASSWORD_KEY);
       // echo "hey";
        $res = $this->prepare($sql);
       //print_r($data);
        foreach($data as $key=>$value){
            $res->bindValue("$key","$value");
        }
       
        $res->execute();
        
        return $res->fetchAll($fetchmode);
    }
    
    public function delete($table,$where,$limit = 1){
       $this->exec("DELETE FROM $table WHERE $where");
    }

}
