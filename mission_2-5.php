<?php

$filename="mission_2-5_yuzukitakamatsu.txt";				//ファイル名を指定
$fp_a=fopen($filename,"a");						//ファイルを開く
$name=$_POST["name"];							//名前
$comment=$_POST["comment"];						//コメント
$del_number=$_POST["del_number"];					//削除
$edit_number=$_POST["edit_number"];					//編集
$edit=$_POST["edit"];							//編集
$pswd=$_POST["pswd"];							//パスワード
$del_pswd=$_POST["del_pswd"];						//削除パスワード
$edit_pswd=$_POST["edit_pswd"];						//編集パスワード
$ret_array=file($filename);						//ファイルを配列に入れる
$count=count($ret_array)+1;						//ファイルのデータを数える
$date=date("Y/m/d H:i:s");						//日付
$DATA=$count."<>".$name."<>".$comment."<>".$date."<>".$pswd;		//投稿番号、名前、コメント、日付

	if(!empty($edit_number)){					//編集番号に書き込みがある場合
		$ret_array=file($filename);				//ファイルを配列に入れる
		foreach($ret_array as $data){				
		$data1=explode("<>",$data);				//投稿番号を取り出す
	if($data1[0]==$edit_number && $data1[4]==$edit_pswd){		//投稿番号＝編集番号　パスワードが一致するとき
		$new_num=$data1[0];					//番号代入
		$new_name=$data1[1];					//名前を代入
		$new_comment=$data1[2];					//コメントを代入
	}
	}
	}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UFT-8">
<title>
</title>
</head>
<body>
<form action="mission_2-5.php "method="post">
	名前</br>
	<input type="text" name="name" placeholder="名前" value="<?php echo $new_name; ?>"><br/>
	コメント<br/>
	<input type="text" name="comment" placeholder="コメント" value="<?php echo $new_comment; ?>"><br/>
	<input type="hidden" name="edit" value="<?php echo $new_num; ?>">
	<input type="text" name="pswd" placeholder="パスワード">
	<input type="submit" value="送信"><br/>


	削除対象番号<br/>
	<input type="text" name="del_number" placeholder="削除対象番号"><br/>
	<input type="text" name="del_pswd" placeholder="パスワード">
	<input type="submit" value="削除"><br/>
	編集対象番号<br/>
	<input type="text" name="edit_number" placeholder="編集対象番号"><br/>
	<input type="text" name="edit_pswd" placeholder="パスワード">
	<input type="submit" value="編集">
</form>

<?php
	//編集		
	if(!empty($name) && !empty($comment) && !empty($pswd) && empty($edit)){//名、コメ、パス書き込み有、編集空
		
		$ret_array=file($filename);					//ファイルを配列に入れる
		$fp_a=fopen($filename,"a");					//ファイルを開く
		$DATA=$count."<>".$name."<>".$comment."<>".$date."<>".$pswd."<>";//投稿番号、名前、コメント、日付
		fwrite($fp_a,$DATA."\n");
		fclose($fp_a);
		foreach($ret_array as $data){
		$data1=explode("<>",$data);
		//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";//データを表示する
		}
		//編集に書き込みがあるとき
		}elseif(!empty($name) && !empty($comment) && !empty($edit)){
		$ret_array=file($filename,FILE_IGNORE_NEW_LINES);		//配列に入れる
		$fp_w=fopen($filename,"w");					//ファイルを開く
		foreach($ret_array as $data){				
		$data2=explode("<>",$data);					//データを取り出す
			if($edit==$data2[0] && $pswd==$data2[4]){		//編集番号とパスワードがイコールの時
			$data3=explode("<>",$data);
			$data3[1]=$name;
			$data3[2]=$comment;
			$data3[3]=$date;
			$DATA=$data3[0]."<>".$data3[1]."<>".$data3[2]."<>".$data3[3]."<>".$data3[4]."<>";
			}else{//イコールじゃないとき
			$DATA=$data2[0]."<>".$data2[1]."<>".$data2[2]."<>".$data2[3]."<>".$data2[4]."<>";
			}
			fwrite($fp_w,$DATA."\n");
			}
			fclose($fp_w);
			}
//削除
	
//削除番号に書き込みあり
	if(!empty($del_number)){
	$ret_array=file($filename);
	$fp_w=fopen($filename,"w");
	fwrite($fp_w,"");
	fclose($fp_w);
	foreach($ret_array as $data){
	$data1=explode("<>",$data);
//パスワードが一致する
		if($data1[4]==$del_pswd){
//番号が一致しない
			if($data1[0]!=$del_number){
				$fp_a=fopen($filename,"a");
				fwrite($fp_a,$data);
				fclose($fp_a);
				//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
			}
//パスワードが一致しない
			}elseif($data1[4]!=$del_pswd){
				$fp_a=fopen($filename,"a");
				fwrite($fp_a,$data);
				fclose($fp_a);
				//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
			
//削除番号に書き込みがない
		}
		}
		}elseif(empty($del_number)){
		$ret_array=file($filename);
		$fp_r=fopen($filename,"r");
		fwrite($fp_r,$data);
			//foreach($ret_array as $data){
				//$data1=explode("<>",$data);
				//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
		fclose($fp_r);
		//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
		}
		$ret_array=file($filename);
		foreach($ret_array as $data){
		$data1=explode("<>",$data);
		echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
		}


/*//削除とパスワードに書き込みがない
	}elseif(empty($del_number) && empty($del_number)){
	$ret_array=file($filename);
	$fp_a=fopen($filename,"a");
	foreach($ret_array as $data){
	$data1=explode("<>",$data);
	echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
	}
	fclose($fp_a);
	}
*/
	



?>

</body>
</html>