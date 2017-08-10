<?php
echo "hello world";
echo "<br/>";
$mysql_conf = array(
    'host'    => 'db', 
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
echo "<br/>";

$sql = "update hh set id =".($visit+1);

if ($res = $mysqli->query($sql)) { 
    echo "success";
    echo "<br/>";
}

// $sql2 = "show databases";
// $result = $mysqli->query($sql2);
// $databases = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($databases);

$mysqli->close();

//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect("redis", 6379);
echo "Connection to server sucessfully";
echo "<br/>";
//设置 redis 字符串数据
$redis->set("test", "Redis tutorial");
// 获取存储的数据并输出
echo "Stored string in redis:: " . $redis->get("test");
$redis->close();

$manager = new MongoDB\Driver\Manager("mongodb://mongo:27017"); 

// 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
$manager->executeBulkWrite('test.sites', $bulk);

$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);

foreach ($cursor as $document) {
    print_r($document);
}