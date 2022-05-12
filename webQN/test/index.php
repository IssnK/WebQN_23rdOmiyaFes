<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/QNform_home.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>第23回大宮祭来場者アンケート</title>
</head>
<body>
	<div id="form">
		<div id="title">第23回大宮祭<br>来場者アンケート</div>
		<div id="subtitle">チェックフォーム</div>
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
			<div id="startbtn"><input type="submit" value="Check"></div>
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
