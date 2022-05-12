<?php
	require_once 'connect.php';
	$mysqli = getDB();

	$contents1 = array(
	    'ID','age','gender','job','address'
    );

	$contents2 = array(
		'manzokudo','教室企画','屋台企画','ステージ企画'
    );    
	    
	$ID = $_POST['ID'];

	$select = "SELECT * FROM `ステータス` WHERE `ID`= {$ID}";
    $select = mb_convert_encoding($select, "UTF-8");
	$result = $mysqli->query($select);
	$row = mysqli_fetch_array($result);

	if ($row['回答'] == '1') {
		include('./QNform_fin.html');
		echo "<script>alert('この番号のアンケートはすでに回答されていますので、今の回答内容は記録されませんでした。');</script>";
	} else {
	    foreach ($contents1 as $key) {
	 	    $stack = $stack."'{$_POST[$key]}',";
		}
		
		$substack = "'";
		//var_dump($_POST['kouhou']);
		foreach ($_POST['kouhou'] as $value) {
			$substack = $substack."{$value},";
		}
		$substack = $substack.$_POST['その他'];
		$substack = $substack."',";
		$stack = $stack.$substack;

		foreach ($contents2 as $key) {
	 	    $stack = $stack."'{$_POST[$key]}',";
		}

		$substack = "'";
		//var_dump($_POST['bestsonota']);
		foreach ($_POST['bestsonota'] as $value) {
			$substack = $substack."{$value},";
		}
		$substack = $substack."',";
		$stack = $stack.$substack;

	 	$stack = $stack."'{$_POST['kansou']}'";

		//var_dump($stack);

		$insert = "INSERT INTO `アンケート内容`(`ID`, `年齢`, `性別`, `職業`, `居住地域`,
								`どのようにして大宮祭を知ったか`, `満足度`, `教室企画において一番良かったもの`, `屋台企画において一番良かったもの`,
								`ステージ企画におて一番良かったもの`, `その他の企画において一番良かったもの`, `意見`) VALUES ({$stack});";

	    $insert = mb_convert_encoding($insert, "UTF-8");
		$test = $mysqli->query($insert);
	    //var_dump($test);

	    if(!$test){
	    	echo "<script>alert('何らかの原因で回答は格納できませんでした。お手数ですが、実行委員におしらせください。');</script>";
	    } else {
	    	$update = "UPDATE `ステータス` SET `回答`= 1 WHERE `ID`= {$ID}";
    		$update = mb_convert_encoding($update, "UTF-8");

			$test = $mysqli->query($update);
			//var_dump($test);
	    }

		include('./thanks.html');
	}

	$mysqli->close();
 ?>	
