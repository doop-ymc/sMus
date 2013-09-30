<?php
class DbConn
{
    private $_host = "";
    private $_user = "";
    private $_pwd = "";
    private $_dbname = "";
    private $_result = NULL;
    private $_conn = NULL;
    private $_aMaxTry = array('query'=>1, 'connect'=>1);

    function __construct($dbhost, $dbuser, $dbpwd, $dbname)
    {
        $this->_host = $dbhost;
        $this->_user = $dbuser;
        $this->_pwd = $dbpwd;
        $this->_dbname = $dbname;
    }
    
    public function setMaxTry($sType, $iTimes)
    {
        $this->aMaxTry[$sType] = (int)$iTimes;
    }

    public function connect($charset = "utf8")
    {
        for($i = 0; $i < $this->aMaxTry['connect']; $i++)
        {
            $this->_conn = mysqli_connect($this->_host, $this->_user, $this->_pwd, $this->_dbname);
            if($this->_conn->connect_error == NULL){
                mysqli_query("set names $charset", $this->_conn);
                break;
            }
        }
        return $this->_conn?true:false;
    }

    public function query($sql)
    {
        $result = mysqli_query($sql, $this->_conn);
        return $result;
    }

    public function getResults($sql, $type = MYSQL_ASSOC)
    {
        if($result = query($sql))
        {
            while($row = @ mysqli_fetch_array($result, $type))
            {
                $this->_result[] = $row;
            }
            return $this->_result;
        }
        else 
            return NULL;
    }

}
?>
