<?php

$dsn='�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
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
$name='�D��';
$comment='���͂悤';
$sql->execute();

$sql='SELECT*FROM tbtest';
$results=$pdo->query($sql);
foreach($results as $row){
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].'<br>';
}

$id=1;
$nm="���Y";
$kome="���͂�";
$sql="update tbtest set name='$num',comment='$kome' where id=$id";
$result=$pdo->query($sql);

$id=2;
$sql="delete from tbtest where id=$id";

?>