<?php
class Database extends Mongo {

    private $db  = '';
    private $col = '';
 
    public function __construct($DB_TYPE,$DB_HOST,$DB_PORT,$DB_DATABASE,$DB_COLLECTION){
        parent::__construct($DB_TYPE."://".$DB_HOST.":".$DB_PORT);

        $this->db = $DB_DATABASE;
        $this->col = $DB_COLLECTION;
    }
    
    public function __destruct(){}
    
    public function Query($filter){
   
     $manager = $this->selectDB($this->db);

     $collection = $manager->selectCollection($this->col);

     $cursor = $collection->find($filter);
    
     $this->close();
        
     return $cursor;        
    }


    public function Group($keys,$initial,$reduce){
        //$m = new Mongo('mongodb://127.0.0.1:27017');

        //$collection= $m->selectDB('siriraj')->selectCollection('test');

        
        $manager = $this->selectDB($this->db);

        $collection = $manager->selectCollection($this->col);
        
        return $collection->group($keys, $initial, $reduce);
    }
    
    
    
    public function Insert($packet){
        $manager = $this->selectDB($this->db);
        $collection = $manager->selectCollection($this->col);
        
        $count = (int)count($packet);
        
        try {
        
            for($i=0;$i<$count;$i++){
				$collection->insert($packet[$i]);
		    }
		    
		    $ck = true;
            
        } 
        catch(MongoCursorException $e) {
            
            $ck =false;
        }
      
            $this->close();
        
        return $ck;
        
    }
    
    public function Update($setData,$newData){
        $manager = $this->selectDB($this->db);
        $collection = $manager->selectCollection($this->col);  
        
        try{
            
            $collection->update($setData,$newData);
            
            $ck = true;
            
        }
        catch(MongoCursorException $e) {
            
            $ck =false;
        }
        
        $this->close();
        
        return $ck;
    }

     public function Count($where){
        $manager = $this->selectDB($this->db);
        $collection = $manager->selectCollection($this->col); 
        
        return $collection->count($where);
    }
    
    public function getObjectID($id){
        return new MongoID($id);
    }
    
    public function getISODate(){
        return new MongoDate();
    }
    public function getISODateID($date){
        return new MongoDate(strtotime($date));
    }
    
    public function listDatabase(){
        return $this->listDBs();
    }
    
}
?>