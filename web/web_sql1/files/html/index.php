<?php
	$dao = mysqli_connect('db', 'sqli', 'sqli', 'sqli');
	if(isset($_POST['id'])){	
		$uid = @$_POST['id'];
		$sql = "SELECT * FROM userinfo WHERE `Id` = '$uid'";
		if($result = mysqli_query($dao, $sql)){
			echo "sql语句执行情况：success";
			echo "<br />";
			$ans = mysqli_fetch_assoc($result);
		}
		else{
			echo "sql语句执行情况：wrong";
		}
		
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>简单的sql注入</title>
		<h3>请输入要查询的ID号</h3>
	</head>
	<body>
		<form action="" method="POST">
			<input type="text" style="width: 400;height: 30" name="id" value="" />
			<input type ="submit" value="查询" />
		</form>
		<p><?php echo "your sql is :" . @$sql . "<br />"; ?></p>
		<p>
		<table border="1">
		<tr style="color:red">
			<th>id</th>
			<th>姓名</th>
			<th>邮箱</th>
			<th>号码</th>
		</tr>
		<tr>
			<th><?php echo @$ans["Id"];?></th>
			<th><?php echo @$ans["username"]; ?></th>
			<th><?php echo @$ans["usermail"]; ?></th>
			<th><?php echo @$ans["callnumber"]; ?></th>
		</tr>
		</table>
		</p>
	</body>
</html>
