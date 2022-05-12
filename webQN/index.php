<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/QNhome.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>第23回大宮祭来場者アンケート</title>
</head>
<body>
	<div id="form">
		<div id="title">第23回大宮祭<br>来場者アンケート</div>
		<div id="subtitle">大抽選会抽選券付き</div>
		<div id="comment">
			<p>
				&emsp;この度は第23回大宮祭にご来場いただき、誠にありがとうございます。<br>
				&emsp;これからの大宮祭をより良くするためにアンケートのご協力をお願いいたします。<br>
			</p>
			<p>
				&emsp;また、本アンケートを回答した上、<span class="imp">「回答完了画面」および紙のアンケート</span>を校門受付、または2号館1階アンケート回収場所のスタッフにお見せいただければ、17:20頃から始まる<span class="imp">大抽選会の抽選券</span>がもらえます。<br>
				&emsp;ぜひご参加ください！<br>
			</p>
			<p id="info">（参加団体の方もこのページからご回答できます。）</p>
		</div>
		<form action="./login.php" method="post" onsubmit="return checkIDPass(this)">
			<!-- アンケート番号入力欄 -->
			<div class="inputbox">
				<div class="tag">アンケート番号<br></div>
				<div class="hint">アンケートに記載されている<span class="imp">4桁の番号</span>を入力してください。<br></div>
				<input type="text" placeholder="4桁のアンケート番号" name="ID" value="<?php echo $_GET['ID']; ?>">
			</div>
			<!-- 確認番号入力欄 -->
			<div class="inputbox">
				<div class="tag">確認番号<br></div>
				<div class="hint">アンケートに記載されている<span class="imp">6桁の確認番号</span>を入力してください。<br></div>
				<input type="password" placeholder="6桁の確認番号" name="Password" value="<?php echo $_GET['Password']; ?>">
				<!-- 不正入力の警告 -->
				<div id="warning">アンケート番号が見つかりません、もしくは確認番号が間違えています。</div>
			</div>
			<div id="startbtn"><input type="submit" value="回答を開始する"></div>
		</form>
	</div>

	<script>
		// 正規表現による入力の検査 不正入力の場合は警告出して次に進まんしようにする
		function checkIDPass(thisform) {
			var regexpForID = new RegExp(/^\d{4}$/);
			var regexpForPass = new RegExp(/^\d{6}$/);
			with(thisform){
				if (regexpForID.test(ID['value']) && regexpForPass.test(Password['value'])) {
					return true;
				} else {
					alert("4桁のアンケート番号および6桁の確認番号を入力してください。");
					return false;
				}
			}		
		}
	</script>

</body>
</html>
