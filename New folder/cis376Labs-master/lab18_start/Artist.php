<?php

include_once("Art.php");
function is_earlier($current, $newDate){
	 $oldSecs = strtotime($current);
	 $newSecs = strtotime($newDate);
	 if($newSecs<$oldSecs){
		return true;
	 }
	 return false;
}

class Artist implements Serializable{
      static private $earliestDate="Sep 15, 2013";
      private $FirstName;
      private $LastName;
      private $BirthDate;
      private $DeathDate;
      private $BirthCity;
      private $artworks = array();
     function __construct($first,$last,$city, $birth, $death=nil){
      	     $this->FirstName = $first;
	     $this->LastName = $last;
	     $this->BirthCity = $city;
	     $this->BirthDate = $birth;
	     $this->DeathDate = $death;
	     if(is_earlier(self::$earliestDate, $birth))
	     	     self::$earliestDate=$birth;
      }
     public function serialize() {
      	    return serialize(
	   	array("earliest" => self::$earliestDate,
			"first" => $this->FirstName,
		"last" => $this->LastName,
	   "bdate" => $this->BirthDate,
   	         "ddate" => $this->DeathDate,
 	       "bcity" => $this->BirthCity,
	       "works" => $this->artworks
       	       	    )   
    	 );
    }
    public function unserialize($data) {
       $data = unserialize($data);
          self::$earliestDate = $data['earliest'];
	  $this->FirstName = $data['first'];
  	$this->LastName = $data['last'];
     	$this->BirthDate = $data['bdate'];
     	$this->DeathDate = $data['ddate'];
	 $this->BirthCity = $data['bcity'];
	 $this->artworks = $data['works'];
    }

      public function printNice(){
      	     $table = "<table>";
	     $table .="<tr><th colspan='2'>".$this->FirstName." ".$this->LastName."</th></tr>";
	     $table .="<tr><td>Birth:</td><td>".$this->BirthDate."(".$this->BirthCity.")</td></tr>";
	     $table .="<tr><td>Death:</td><td>".$this->DeathDate."</td></tr>";
	     $table.="<tr><td colspan='2'>Art works<br/><table>";
	     foreach($this->artworks as $art){
	   	     $table.="<tr><td colspan='2'>".$art->__toString()."</td></tr>";
	     }
	     $table.="</table></td></tr></table>";

	     return $table;
      }
      public function __toString(){
      	     return $this->printNice();
      }
      public static function earliestDate(){return self::$earliestDate;}	
       public function getFirstName(){return $this->FirstName;}
       public function getLastName(){return $this->LastName;}
       public function getBirthCity(){return $this->BirthCity;}
       public function getBirthDate(){return $this->BirthDate;}
       public function getDeathDate(){return $this->DeathDate;}
       public function setLastName($LastName){$this->LastName = $LastName;}
       public function setFirstName($FirstName){$this->FirstName = $FirstName;}
       public function setDeathDate($deathdate){
                   if(is_earlier($deathdate,$this->BirthDate)){
				 $this->DeathDate=$deathdate;
 				      }
 				           else{
						echo "Death can't occur before birth";
 						     }	         
 						     		 
       }
       public function addWork($art){
       	      $this->artworks[]= $art;
       }
       public function numArtworks(){ return count($this->artworks);}

}

?>