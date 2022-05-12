<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/QNdef.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>第23回大宮祭参加団体アンケート</title>
</head>
<body>
	<?php
		require_once 'connect.php';
		$mysqli = getDB();
		include 'form.php';
	?>
	<div id="frame">
		<div id="title">第23回大宮祭<br>参加団体アンケート</div>
		<div id="subtitle">大抽選会抽選券付き</div>
		<div id="form">
			<form action="./submit_forParticipants.php" method="POST" onsubmit="return checkForm();" id="QNform">
				<input type="hidden" name="ID" value=<?php echo "$ID"; ?>>
				<p>アンケート番号：<?php echo "$ID"; ?></p>
				<p>
					性別：
					<input type="radio" name="gender" value="男性">男性
					<input type="radio" name="gender" value="女性">女性
				</p>
				<p>
					参加団体説明会の開催情報についてどのように知りましたか：（複数選択可）<br>
					<span class='multiSelection'>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="告知メール">告知メール<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="第2クラブハウス棟の壁面告知">第2クラブハウス棟の壁面告知<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="ポスター">ポスター<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="大宮祭のTwitter">大宮祭のTwitter<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="大宮祭のホームページ">大宮祭のホームページ<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="その他" onclick="show_textarea('else',this.checked)">その他
						<span id="else"><br>&emsp;&emsp;&emsp;<textarea name="その他" cols="35" rows="1" id="sonota" placeholder="参加団体説明会の開催情報はどのように知りましたか？" maxlength="120"></textarea></span>
					</span>
				</p>
				<p>
					今回の大宮祭はどうでしたか：<br>
					<select name="manzokudo" id="manzokudo">
						<option selected></option>
						<option value="4">楽しかった</option>
						<option value="3">どちらかといえば楽しかった</option>
						<option value="2">どちらかといえばつまらなかった</option>
						<option value="1">つまらなかった</option>
					</select>
				</p>
				<div class="kugiri">- - - - - - - - - - - - - - - - - - - - - - -</div>
				<p>【<span class="imp">自団体の企画以外で</span>一番良かったと思った企画を教えてください】</p>
				<p>
					教室企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"教室企画",$participants); ?>
				</p>
				<p>
					屋台企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"屋台企画",$participants); ?>
				</p>
				<p>
					ステージ企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"ステージ企画",$participants); ?>
				</p>
				<div class="kugiri">- - - - - - - - - - - - - - - - - - - - - - -</div>
				<p>
					その他の企画において良かったと思うものをお選びください：（複数選択可）<br>
					<span class='multiSelection'>
						<?php getSelection($mysqli,"その他企画"); ?>
					</span>
				</p>
				<p>
					来年度以降の大宮祭に参加される場合、どの企画に参加したいですか：（複数選択可）<br>
					<span class='multiSelection'>
						&emsp;<input type="checkbox" name="rainen[]" value="教室企画">教室企画<br>
						&emsp;<input type="checkbox" name="rainen[]" value="フリーマーケット企画">フリーマーケット企画<br>
						&emsp;<input type="checkbox" name="rainen[]" value="屋台企画">屋台企画<br>
						&emsp;<input type="checkbox" name="rainen[]" value="ステージ企画">ステージ企画<br>	
					</span>
				</p>
				<p>
					ご意見やご感想等がございましたら、ご記入ください：<br>
					<textarea name="kansou" id="kansou" cols="45" rows="5" maxlength="250"></textarea>
				</p>
				<div id="submitbtn"><input type="submit" value="送信"></div>
			</form>
		</div>
	</div>
	<script src="./form.js"></script>
	<?php echo "<script>var target = document.getElementsByClassName('p{$participants}');
						for (var i = target.length - 1; i >= 0; i--) {
									target[i].disabled = true;
						}</script>"; ?>
	<!-- <?php $mysqli->close();?> -->
</body>
</html>
