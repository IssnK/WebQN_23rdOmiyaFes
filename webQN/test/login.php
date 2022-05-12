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

	if ($row['ID'] == "") {
		echo "【このアンケート番号は存在しない。】";
	} else {
		// 入力されたIDおよび確認番号が両方とも正しい場合
		echo "入力--><br>&emsp;&emsp;アンケート番号: ".$ID."<br>&emsp;&emsp;確認番号: ".$Password."<br>";
		echo "データベース--><br>&emsp;&emsp;アンケート番号: ".$row['ID']."<br>&emsp;&emsp;確認番号: ".$row['確認番号']."<br>";
		if ($Password == $row['確認番号']) {
			echo "【データベースと一致】";
		}
		else{
			echo "【確認番号不一致】";
		}

		// SQL文の用意
		$select = "SELECT * FROM `参加団体ID` WHERE `ID`= $participants";
	    $select = mb_convert_encoding($select, "UTF-8");	

		$result = $mysqli->query($select);
		$row = mysqli_fetch_array($result);
		echo "<br><br>参加団体ID: ".$participants."  【{$row['団体名']}】";
	}

	// DB接続切断
	$mysqli->close();
?>