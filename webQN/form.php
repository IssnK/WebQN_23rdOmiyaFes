<?php
	function getTable($mysqli,$tableName,$participants){
		// SQL文の用意
		$select = "SELECT * FROM `{$tableName}`";
		// データベースからデータを抽出
		$result = $mysqli->query($select);
		echo "<select name='{$tableName}' id='{$tableName}'><option selected></option>";

		foreach ($result as $row) {
			echo "<option class=p{$row['参加団体ID']} value={$row['番号']}>{$row['番号']}．{$row['企画内容']}</option>";
		}
		echo "<optgroup label=''></optgroup></select>";
	}

	function getSelection($mysqli,$tableName){
		// SQL文の用意
		$select = "SELECT * FROM `{$tableName}`";
		// データベースからデータを抽出
		$result = $mysqli->query($select);

		foreach ($result as $row) {
			echo "&emsp;<input type='checkbox' name='bestsonota[]' value={$row['番号']}>{$row['企画内容']}<br>";
		}
	}
?>