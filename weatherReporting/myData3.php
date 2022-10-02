<?
//header('Content-Type: application/json');
$link = mysqli_connect("aluna.com.mx","telemetria","","telemetria");

$SQL ="SELECT * FROM ( SELECT * FROM telemetria ORDER BY id DESC LIMIT 40 ) sub ORDER BY id ASC";
$query = mysqli_query ($link,$SQL);

$dataArray = array();
while ($row = mysqli_fetch_array($query) )

{
  $dateArray = explode(" ",$row["date_time"]);
  $timeArray = explode(":",$dateArray[1]);
  $dateArray = explode("-",$dateArray[0]);

  //$date = date_create($row["date_time"], timezone_open('America/Mexico_City'));
  //$data["year"]=date("Y-m-d H:i:s",mktime($timeArray[0],$timeArray[1],$timeArray[2],$dateArray[1],$dateArray[2],$dateArray[0]));
  //$data["year"] = date_format($date, 'Y-m-d H:i:s');
  $data["year"] = $row["date_time"];
  $data["temperatura"]=floatval($row["tem"])-1.5;
  $data["presion"]=(floatval($row["pre"])-900)/2;
  $data["humedad"]=$row["hum"];
  $data["vol"]=$row["vol"];
  $data["vel_viento"]=$row["vel_viento"];
  $data["lluvia"]=$row["lluvia"];

  $dataArray[]=$data;

}
  echo json_encode($dataArray);

?>
