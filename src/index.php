<?php
echo "hello world";
$mysql_conf = array(
    'host'    => 'mysql', 
    'db'      => 'app', 
    'db_user' => 'root', 
    'db_pwd'  => 'root', 
    );

$mysqli = new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd'], $mysql_conf['db']);

if(mysqli_connect_errno())
{
    echo mysqli_connect_error();
}

//结果集示例
$sql = "select * from hh";
if ($res = $mysqli->query($sql)) { 
    // $data = $res->fetch_all(MYSQLI_ASSOC);
    $data = $res->fetch_row();
    $visit = $data[0];    
}

echo $visit;

$sql = "update hh set id =".($visit+1);
echo $sql;

if ($res = $mysqli->query($sql)) { 
    echo "success";
}

// $sql2 = "show databases";
// $result = $mysqli->query($sql2);
// $databases = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($databases);


$mysqli->close();