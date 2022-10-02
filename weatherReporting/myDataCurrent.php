<?
//header('Content-Type: application/json');
$link = mysql_connect("aluna.com.mx","telemetria","");
mysql_select_db ( "telemetria", $link);

if($_GET["a"]=="")
{

  $SQL ="SELECT * FROM ( SELECT * FROM telemetria ORDER BY id DESC LIMIT 4000 ) sub ORDER BY id ASC";
  $query = mysql_query ($SQL,$link);

  $dataArray = array();
  while ($row = mysql_fetch_array($query) )
  {
    $dateArray = split(" ",$row["date_time"]);
    $timeArray = split(":",$dateArray[1]);
    $dateArray = split("-",$dateArray[0]);
  
    //$date = date_create($row["date_time"], timezone_open('America/Mexico_City'));
    //$data["year"]=date("Y-m-d H:i:s",mktime($timeArray[0],$timeArray[1],$timeArray[2],$dateArray[1],$dateArray[2],$dateArray[0]));
    //$data["year"] = date_format($date, 'Y-m-d H:i:s');
    $data["year"] = $row["date_time"];
    $data["temperatura"]=$row["tem"]-1.5;
    $data["presion"]=($row["pre"]-900)/2;
    $data["humedad"]=$row["hum"];
    $data["vol"]=$row["vol"];
    $data["vel_viento"]=$row["vel_viento"];
    $data["lluvia"]=$row["lluvia"];

    $dataArray[]=$data;
	
  }
    echo json_encode($dataArray);
}
if($_GET["a"]=="current")
{
  $SQL ="SELECT * FROM telemetria ORDER BY id DESC LIMIT 1 ";
  $query = mysql_query ($SQL,$link);

  $dataArray = array();
  while ($row = mysql_fetch_array($query) )
  {
    $dateArray = split(" ",$row["date_time"]);
    $timeArray = split(":",$dateArray[1]);
    $dateArray = split("-",$dateArray[0]);

    //$date = date_create($row["date_time"], timezone_open('America/Mexico_City'));
    //$data["year"]=date("Y-m-d H:i:s",mktime($timeArray[0],$timeArray[1],$timeArray[2],$dateArray[1],$dateArray[2],$dateArray[0]));
    //$data["year"] = date_format($date, 'Y-m-d H:i:s');
    $data["year"] = $row["date_time"];
    $data["temperatura"]=$row["tem"]-1.5;
    $data["presion"]=($row["pre"]-900)/2;
    $data["humedad"]=$row["hum"];
    $data["vol"]=$row["vol"];
    $data["vel_viento"]=$row["vel_viento"];
    $data["lluvia"]=$row["lluvia"];

    $dataArray[]=$data;

  }
    echo json_encode($dataArray);
}

?>


