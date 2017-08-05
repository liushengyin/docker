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
$sql = "show databases";
$result = $mysqli->query($sql);
$databases = $result->fetch_all(MYSQLI_ASSOC);
var_dump($databases);
$mysqli->close();