<?php

$filename="mission_2-5_yuzukitakamatsu.txt";				//�t�@�C�������w��
$fp_a=fopen($filename,"a");						//�t�@�C�����J��
$name=$_POST["name"];							//���O
$comment=$_POST["comment"];						//�R�����g
$del_number=$_POST["del_number"];					//�폜
$edit_number=$_POST["edit_number"];					//�ҏW
$edit=$_POST["edit"];							//�ҏW
$pswd=$_POST["pswd"];							//�p�X���[�h
$del_pswd=$_POST["del_pswd"];						//�폜�p�X���[�h
$edit_pswd=$_POST["edit_pswd"];						//�ҏW�p�X���[�h
$ret_array=file($filename);						//�t�@�C����z��ɓ����
$count=count($ret_array)+1;						//�t�@�C���̃f�[�^�𐔂���
$date=date("Y/m/d H:i:s");						//���t
$DATA=$count."<>".$name."<>".$comment."<>".$date."<>".$pswd;		//���e�ԍ��A���O�A�R�����g�A���t

	if(!empty($edit_number)){					//�ҏW�ԍ��ɏ������݂�����ꍇ
		$ret_array=file($filename);				//�t�@�C����z��ɓ����
		foreach($ret_array as $data){				
		$data1=explode("<>",$data);				//���e�ԍ������o��
	if($data1[0]==$edit_number && $data1[4]==$edit_pswd){		//���e�ԍ����ҏW�ԍ��@�p�X���[�h����v����Ƃ�
		$new_num=$data1[0];					//�ԍ����
		$new_name=$data1[1];					//���O����
		$new_comment=$data1[2];					//�R�����g����
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
	���O</br>
	<input type="text" name="name" placeholder="���O" value="<?php echo $new_name; ?>"><br/>
	�R�����g<br/>
	<input type="text" name="comment" placeholder="�R�����g" value="<?php echo $new_comment; ?>"><br/>
	<input type="hidden" name="edit" value="<?php echo $new_num; ?>">
	<input type="text" name="pswd" placeholder="�p�X���[�h">
	<input type="submit" value="���M"><br/>


	�폜�Ώ۔ԍ�<br/>
	<input type="text" name="del_number" placeholder="�폜�Ώ۔ԍ�"><br/>
	<input type="text" name="del_pswd" placeholder="�p�X���[�h">
	<input type="submit" value="�폜"><br/>
	�ҏW�Ώ۔ԍ�<br/>
	<input type="text" name="edit_number" placeholder="�ҏW�Ώ۔ԍ�"><br/>
	<input type="text" name="edit_pswd" placeholder="�p�X���[�h">
	<input type="submit" value="�ҏW">
</form>

<?php
	//�ҏW		
	if(!empty($name) && !empty($comment) && !empty($pswd) && empty($edit)){//���A�R���A�p�X�������ݗL�A�ҏW��
		
		$ret_array=file($filename);					//�t�@�C����z��ɓ����
		$fp_a=fopen($filename,"a");					//�t�@�C�����J��
		$DATA=$count."<>".$name."<>".$comment."<>".$date."<>".$pswd."<>";//���e�ԍ��A���O�A�R�����g�A���t
		fwrite($fp_a,$DATA."\n");
		fclose($fp_a);
		foreach($ret_array as $data){
		$data1=explode("<>",$data);
		//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";//�f�[�^��\������
		}
		//�ҏW�ɏ������݂�����Ƃ�
		}elseif(!empty($name) && !empty($comment) && !empty($edit)){
		$ret_array=file($filename,FILE_IGNORE_NEW_LINES);		//�z��ɓ����
		$fp_w=fopen($filename,"w");					//�t�@�C�����J��
		foreach($ret_array as $data){				
		$data2=explode("<>",$data);					//�f�[�^�����o��
			if($edit==$data2[0] && $pswd==$data2[4]){		//�ҏW�ԍ��ƃp�X���[�h���C�R�[���̎�
			$data3=explode("<>",$data);
			$data3[1]=$name;
			$data3[2]=$comment;
			$data3[3]=$date;
			$DATA=$data3[0]."<>".$data3[1]."<>".$data3[2]."<>".$data3[3]."<>".$data3[4]."<>";
			}else{//�C�R�[������Ȃ��Ƃ�
			$DATA=$data2[0]."<>".$data2[1]."<>".$data2[2]."<>".$data2[3]."<>".$data2[4]."<>";
			}
			fwrite($fp_w,$DATA."\n");
			}
			fclose($fp_w);
			}
//�폜
	
//�폜�ԍ��ɏ������݂���
	if(!empty($del_number)){
	$ret_array=file($filename);
	$fp_w=fopen($filename,"w");
	fwrite($fp_w,"");
	fclose($fp_w);
	foreach($ret_array as $data){
	$data1=explode("<>",$data);
//�p�X���[�h����v����
		if($data1[4]==$del_pswd){
//�ԍ�����v���Ȃ�
			if($data1[0]!=$del_number){
				$fp_a=fopen($filename,"a");
				fwrite($fp_a,$data);
				fclose($fp_a);
				//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
			}
//�p�X���[�h����v���Ȃ�
			}elseif($data1[4]!=$del_pswd){
				$fp_a=fopen($filename,"a");
				fwrite($fp_a,$data);
				fclose($fp_a);
				//echo $data1[0]." ".$data1[1]." ".$data1[2]." ".$data1[3]."<br>";
			
//�폜�ԍ��ɏ������݂��Ȃ�
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


/*//�폜�ƃp�X���[�h�ɏ������݂��Ȃ�
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