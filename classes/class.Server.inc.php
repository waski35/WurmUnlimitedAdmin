<?php
namespace WurmUnlimitedAdmin;

use PDO;
use PDOException;
use Exception;

class SERVER
{

	private $_serverDB;

  function __construct()
  {
  	try
  	{
      global $dbConfig;
      global $rmiConfig;
      require(dirname(__FILE__) . "/../includes/config.php");
      require(dirname(__FILE__) . "/../includes/functions.php");
      require(dirname(__FILE__) . "/class.Database.inc.php");

      if(!empty($dbConfig["wurmLoginDB"]))
      {
  	  	$this->_serverDB = new \WurmUnlimitedAdmin\DATABASE($dbConfig["wurmLoginDB"]);
      }
      else
      {
        throw new PDOException("Missing database");
      }

	  }
    catch(PDOException $ex)
    {
      echo json_encode(array(
        "error" => array(
          "message" => $ex->getMessage()
        )
      ));
      exit();
    }
    catch(Exception $ex)
    {
      echo json_encode(array(
        "error" => array(
          "message" => $ex->getMessage()
        )
      ));
      exit();
    }

  }

  function GetServers($serverID = "")
  {
    $result = array();

    if(!empty($serverID))
    {
      $sql = $this->_serverDB->QueryWithBinds("SELECT * FROM SERVERS WHERE SERVER = ?", array($serverID));
      $server = $sql->fetch(PDO::FETCH_ASSOC);
      $server["success"] = true;

      $result = $server;

    }
    else
    {
      $sql = $this->_serverDB->QueryWithOutBinds("SELECT SERVER, NAME, MAXPLAYERS FROM SERVERS");
      while($servers = $sql->fetch(PDO::FETCH_ASSOC))
      {
        $servers["COUNT"] = $this->GetPlayerCount();
        array_push($result, $servers);
      }

    }

    return $result;

  }

  function GetPlayerCount()
  {
    $result = 0;
    try
    {
      exec("java -jar " . $rmiConfig["wuaClientLocation"] ." \"" . $rmiConfig["ip"] . "\" \"" . $rmiConfig["port"] . "\" \"" . $rmiConfig["password"] . "\" \"playerCount\" \"\" 2>&1", $output);
      $result = $output;
    }
    catch(Exception $ex)
    {
      $result = 0;
    }

  }

  function __destruct()
  {
  	$this->_serverDB = null;
  }

}
?>