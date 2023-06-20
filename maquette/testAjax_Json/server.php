<?php
$groupe=$_POST['cgr'];
//$groupe='202';
$response['message']= "Hello TDM";
$list=array();
if($groupe=='201')
{
    $response['message'].=' 201';
$stag1['nom']='stagiaire 1 TDM 201';
$stag1['ville']='tanger';
$stag2['nom']='stagiaire 2 TDM 201';
$stag2['ville']='rabat';
array_push($list, $stag1);
array_push($list, $stag2); 
}
if($groupe=='202')
{
     $response['message'].= ' 202';
 $stag1['nom']='stagiaire 1 TDM 202';
$stag1['ville']='tanger';
$stag2['nom']='stagiaire 2 TDM 202';
$stag2['ville']='rabat';
array_push($list, $stag1);
array_push($list, $stag2); 
}




$response['list']= $list;
echo json_encode($response);
