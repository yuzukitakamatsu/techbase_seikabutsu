<?php

$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);

$sql="CREATE TABLE tbtest"
."("
."id INT,"
."name char(32),"
."comment TEXT"
.");";
$stmt=$pdo->query($sql);

$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach ($result as $row){
echo $row[0];
echo '<br>';
}
echo "<hr>";

$sql='SHOW CREATE TABLE tbtest';
$result=$pdo->query($sql);
foreach ($result as $row){
print_r($row);
}
echo "<hr>";

$sql=$pdo->prepare("INSERT INTO tbtest(id,name,comment) VALUES('1',:name,:comment)");
$sql->bindParam (':name',$name,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$name='優月';
$comment='おはよう';
$sql->execute();

$sql='SELECT*FROM tbtest';
$results=$pdo->query($sql);
foreach($results as $row){
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].'<br>';
}

$id=1;
$nm="太郎";
$kome="おはよ";
$sql="update tbtest set name='$num',comment='$kome' where id=$id";
$result=$pdo->query($sql);

$id=2;
$sql="delete from tbtest where id=$id";

?>