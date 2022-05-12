<?php
	require_once 'connect.php';
	$mysqli = getDB();

	// SQL文の用意
	$select = "SELECT * FROM `ステータス` WHERE `ID`= {$_POST['ID']}";
    $select = mb_convert_encoding($select, "UTF-8");

	// データベースからデータを抽出
	$result = $mysqli->query($select);
	$row = mysqli_fetch_array($result);
	$ID = $_POST['ID'];
	$Password = $_POST['Password'];
	$participants = $row['参加団体ID'];

	// 入力されたIDおよび確認番号が両方とも正しい場合
	if ($ID == $row['ID'] && $Password == $row['確認番号']) {
		if ($row['回答'] == '0') {
			if ($row['ID'] < 4000) {
				include('./QNform_default.php');
			} else {
				include('./QNform_participants.php');
			}
		} else {
			include('./QNform_fin.html');
			echo "<script>alert('この番号のアンケートはすでに回答されています。');</script>";
		}
	}
	else{
		include('./index.php');
		echo '<script>document.getElementById("warning").style.display = "block";</script>';
	}

	// DB接続切断
	// $mysqli->close();
?>