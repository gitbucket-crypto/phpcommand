<?php 
ini_set('display_startup_errors', 0);
date_default_timezone_set('America/Sao_Paulo');
require_once('database.php');
$_GET['csrf']='97423650645064305';
$_GET['whois']= 'OTU2NTgxY2Y0ODdmZTA3';
if(!isset($_GET['csrf']) && $_GET['csrf']=='' )
{
    echo json_encode(['error'=>404,'msg'=> 'token csrf não present']); exit;
}
if(isset($_GET['whois']) && $_GET['whois']=='')
{
    echo json_encode(['error'=>404,'msg'=> 'whois não present']); exit;
}

$conn = connect();
try
{
        $SQL="SELECT command FROM deployment WHERE artifcact ='".$_GET['whois']."'";
        $stmt = $conn->query($SQL);
        $stmt -> execute();
        $comm = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r(json_encode(['msg'=>200, 'data'=>$comm['command']])); exit;
}
catch(PDOException $e)
{
    var_dump($e);
}
?>