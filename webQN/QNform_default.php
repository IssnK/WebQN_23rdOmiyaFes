<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/QNdef.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>第23回大宮祭来場者アンケート</title>
</head>
<body>
	<?php
		require_once 'connect.php';
		$mysqli = getDB();
		include 'form.php';
		if ($ID == "") {
			//警告出してhomeに戻る
		}
	?>
	<div id="frame">
		<div id="title">第23回大宮祭<br>来場者アンケート</div>
		<div id="subtitle">大抽選会抽選券付き</div>
		<div id="form">
			<form action="./submit.php" method="POST" onsubmit="return checkForm();" id="QNform">
				<input type="hidden" name="ID" value=<?php echo "$ID"; ?>>
				<p>アンケート番号：<?php echo "$ID"; ?></p>
				<p>
					ご年齢：
					<select name="age" id="age">
						<option selected></option>
						<option value="10歳未満">10歳未満</option>
						<option value="10代">10代</option>
						<option value="20代">20代</option>
						<option value="30代">30代</option>
						<option value="40代">40代</option>
						<option value="50代">50代</option>
						<option value="60代">60代</option>
						<option value="70代">70歳以上</option>
					</select>
				</p>
				<p>
					性別：
					<input type="radio" name="gender" value="男性">男性
					<input type="radio" name="gender" value="女性">女性
				</p>
				<p>
					ご職業：
					<select name="job" id="job">
						<option selected></option>
						<option value="小学生位か">小学生以下</option>
						<option value="中学生">中学生</option>
						<option value="高校生">高校生</option>
						<option value="本学学生">本学学生</option>
						<option value="他大学・短大・専門学校学生">他大学・短大・専門学校学生</option>
						<option value="本学教員・職員">本学教員・職員</option>
						<option value="会社員">会社員</option>
						<option value="主婦・主夫">主婦・主夫</option>
						<option value="自営業">自営業</option>
						<option value="公務員">公務員</option>
						<option value="その他">その他</option>
					</select>
				</p>
				<p>
					お住まいの地域：
					<select name="address" id="address">
						<option selected></option>
						<option value="埼玉県さいたま市">埼玉県さいたま市</option>
						<option value="埼玉県（さいたま市以外）">埼玉県（さいたま市以外）</option>
						<option value="東京都">東京都</option>
						<option value="神奈川県">神奈川県</option>
						<option value="千葉県">千葉県</option>
						<option value="栃木県">栃木県</option>
						<option value="群馬県">群馬県</option>
						<option value="茨城県">茨城県</option>
						<option value="その他の地域">その他の地域</option>
					</select>
				</p>
				<p>
					どのようにして大宮祭を知りましたか：<br>（複数選択可）<br>
					<span class='multiSelection'>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="大学のホームページ">大学のホームページ<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="大宮祭のホームページ">大宮祭のホームページ<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="大宮祭のTwitter">大宮祭のTwitter
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="ビラ">ビラ<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="ポスター">ポスター
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="リーフレット">リーフレット<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="小学生絵画コンクールのチラシ">小学生絵画コンクールのチラシ<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="知人から聞いた">知人から聞いた<br>
						&emsp;&emsp;<input type="checkbox" name="kouhou[]" value="その他" onclick="show_textarea('else',this.checked)">その他
						<span id="else"><br>&emsp;&emsp;&emsp;<textarea name="その他" cols="35" rows="1" id="sonota" placeholder="どのようにして大宮祭を知りましたか？" maxlength="120"></textarea></span>
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
				<p>
					教室企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"教室企画",$placeholder); ?>
				</p>
				<p>
					屋台企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"屋台企画",$placeholder); ?>
				</p>
				<p>
					ステージ企画において一番良かったものをお選びください：<br>
					<?php getTable($mysqli,"ステージ企画",$placeholder); ?>
				</p>
				<p>
					その他の企画において良かったと思うものをお選びください：（複数選択可）<br>
					<span class='multiSelection'>
						<?php getSelection($mysqli,"その他企画"); ?>
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
	<!-- <?php $mysqli->close();?> -->
</body>
</html>
