<?php

class walautil{
    protected $database_type = 'mysql';

    protected $server = 'localhost';

    protected $username = 'root';

    protected $password = 'iwala9898';
    

    // Optional
    protected $port = 3306;

    protected $charset = 'utf8';

    protected $database_name = 'walatao';

    protected $conn = null;


    public function __construct($dbname){
        $this->database_name = $dbname;
    }
    public function __destruct(){
        if($this->conn != null){
            mysql_close($this->conn);
        }
    }

    public function connect(){
         $this->conn=mysql_connect($this->server, $this->username, $this->password);
    }

    public function query($dbname, $sql, $need_result = false){
         $result = mysql_db_query($dbname, $sql, $this->conn);
        
         $row= mysql_fetch_row($result);
         mysql_data_seek($result, 0);

         if( $need_result ){
              $retval = array();
              while ($row=mysql_fetch_row($result))
              {      
                  $retval[] = $row;
              }     
              mysql_free_result($result);
              return $retval;
         }else{
              mysql_free_result($result);
              return null;
         }
    }



    public function get_amazon_id($v){
            preg_match_all('/(B[A-Z0-9]+)/', $v, $m);
            for($i = 0 ; $i < count($m[1]); $i++){
                    if(strlen($m[1][$i]) == 10)
                       return $m[1][$i];
            }
            return '';
    }


    public function get_time_stamp($datestr){
        $sql = "select unix_timestamp('".$datestr."')";
        $conn=mysql_connect($this->server, $this->username, $this->password);
        $result = mysql_db_query('walatao', $sql, $conn);
        $row= mysql_fetch_row($result);
        mysql_data_seek($result, 0);
        $ts = 0;
        while ($row=mysql_fetch_row($result))
        {
           $ts = $row[0];
        }
        mysql_free_result($result);
        mysql_close($conn);
        return $ts;
}


}

class WlMemcache{
  protected $has_connect = false;
  protected $m = null;
  public function __construct($ip, $port){
      $this->m =  new Memcache;
      if($this->m && $this->m->connect($ip, $port)){
          $this->has_connect = true;
      }else{
 
      }
  }

  public function get($key){
      if($this->has_connect){
          return $this->m->get($key);
      }
      return null;
  }

  public function set($key, $val, $sec){
      if($this->has_connect){
          return $this->m->set($key, $val, false, $sec);
      }
      return null;      
  }
  public function close(){
      if($this->has_connect){
        $this->m->close();
        $this->has_connect = false;
      }
  }
  public function __destruct(){
      if($this->has_connect){
          $this->m->close();
          $this->has_connect = false;
      }
  }
  public function delete($key){
      if($this->has_connect){
          $this->m->delete($key);
      }
  }
}

function object2array(&$cgi,$type=0) {
      if(is_object($cgi)) {
      $cgi = get_object_vars($cgi);
  }
  if(!is_array($cgi)) {
      $cgi = array();
  }
  foreach($cgi as $kk=>$vv) {
      if(is_object($vv)) {
          $cgi[$kk] = get_object_vars($vv);

          object2array($cgi[$kk],$type);
      }
      else if(is_array($vv)) {
          object2array($cgi[$kk],$type);
      } else {
          $v = $vv;
          $k = $kk;
          $cgi["$k"] = $v;
      }
  }
  return $cgi;
}


?>

