<?php

/*
* filename：mysql数据库连接类
* Author：     甘元芳
* qq：                406851733
* email：        shandianqixia555@163.com
* 赠言：           无论做什么都要无私，只有大家好才是真的好，如果使用有任何问题请联系告知本人，交流就是相互促进的大舞台。
*/

class mysql{

	private $db_host;  //数据库主机
	private $db_user;  //数据库用户名
	private $db_pwd;   //数据库用户名密码
	private $db_database;    //数据库名
	private $conn;           //数据库连接标识;
	private $result;         //执行query命令的结果资源标识
	private $sql;	  //sql执行语句
	private $row;     //返回的条目数
	private $coding;  //数据库编码，GBK,UTF8,gb2312
	private $bulletin = true;    //是否开启错误记录
	private $show_error = false;	 //测试阶段，显示所有错误,具有安全隐患,默认关闭
	private $is_error = false;   //发现错误是否立即终止,默认true,建议不启用，因为当有问题时用户什么也看不到是很苦恼的


	/*构造函数*/
	public function __construct($db_host,$db_user,$db_pwd,$db_database,$conn,$coding){
     	$this->db_host=$db_host;
     	$this->db_user=$db_user;
     	$this->db_pwd = $db_pwd;
     	$this->db_database=$db_database;
     	$this->conn=$conn;
     	$this->coding=$coding;
     	$this->connect();
    }

	/*数据库连接*/
	public function connect()
	{
		if($this->conn=="pconn"){
			//永久链接
    		$this->conn=mysql_pconnect($this->db_host,$this->db_user,$this->db_pwd);
		}else{
			//即使链接
			$this->conn=mysql_connect($this->db_host,$this->db_user,$this->db_pwd);
		}

		if(!mysql_select_db($this->db_database,$this->conn)){
			if($this->show_error){
				$this->show_error("数据库不可用：",$this->db_database);
			}
		}
		mysql_query("SET NAMES $this->coding");
	}

	/*数据库执行语句，可执行查询添加修改删除等任何sql语句*/
	public function query($sql)
	{
		if($sql == ""){
		$this->show_error("sql语句错误：","sql查询语句为空");}
    	$this->sql = $sql;

    	$result = mysql_query($this->sql,$this->conn);

		if(!$result){
			//调试中使用，sql语句出错时会自动打印出来
			if($this->show_error){
				$this->show_error("错误sql语句：",$this->sql);
			}
		}else{
			$this->result = $result;
		}
    	return $this->result;
	}


	/*创建添加新的数据库*/
	public function create_database($database_name){
		$database=$database_name;
		$sqlDatabase = 'create database '.$database;
		$this->query($sqlDatabase);
	}

	/*查询服务器所有数据库*/
	//将系统数据库与用户数据库分开，更直观的显示？
	public function show_databases(){
		$this->query("show databases");
		echo "现有数据库：".$amount =$this->db_num_rows($rs);
		echo "<br />";
		$i=1;
		while($row = $this->fetch_array($rs)){
			echo "$i $row[Database]";
			echo "<br />";
			$i++;
		}
	}

	//以数组形式返回主机中所有数据库名
	public function databases()
	{
		$rsPtr=mysql_list_dbs($this->conn);
		$i=0;
		$cnt=mysql_num_rows($rsPtr);
		while($i<$cnt)
		{
		  $rs[]=mysql_db_name($rsPtr,$i);
		  $i++;
		}
		return $rs;
	}


	/*查询数据库下所有的表*/
	function show_tables($database_name){
		$this->query("show tables");
		echo "现有数据库：".$amount = $this->db_num_rows($rs);
		echo "<br />";
		$i=1;
		while($row = $this->fetch_array($rs)){
			$columnName="Tables_in_".$database_name;
			echo "$i $row[$columnName]";
			echo "<br />";
			$i++;
		}
	}

	/*
	mysql_fetch_row()    array  $row[0],$row[1],$row[2]
	mysql_fetch_array()  array  $row[0] 或 $row[id]
	mysql_fetch_assoc()  array  用$row->content 字段大小写敏感
	mysql_fetch_object() object 用$row[id],$row[content] 字段大小写敏感
	*/

	/*取得结果数据*/
	public function mysql_result_li()
	{
		return mysql_result($str);
	}

	/*取得记录集,获取数组-索引和关联,使用$row['content'] */
	public function fetch_array()
	{
		return mysql_fetch_array($this->result);
	}


	//获取关联数组,使用$row['字段名']
	public function fetch_assoc()
	{
		return mysql_fetch_assoc($this->result);
	}

	//获取数字索引数组,使用$row[0],$row[1],$row[2]
	public function fetch_row()
	{
		return mysql_fetch_row($this->result);
	}

	//获取对象数组,使用$row->content
	public function fetch_Object()
	{
		return mysql_fetch_object($this->result);
	}



	//简化查询select
	public function findall($table)
	{
		$this->query("SELECT * FROM $table");
	}


	//简化查询select
	public function select($table,$columnName,$condition)
	{
		if($columnName==""){
			$columnName="*";
		}

		$this->query("SELECT $columnName FROM $table $condition");

	}




	//简化删除del
	public function delete($table,$condition){
		$this->query("DELETE FROM $table WHERE $condition");
	}

	//简化插入insert
	public function insert($table,$columnName,$value){
		$this->query("INSERT INTO $table ($columnName) VALUES ($value)");
	}

	//简化修改update
	public function update($table,$mod_content,$condition){
		$this->query("UPDATE $table SET $mod_content WHERE $condition");
	}


	/*取得上一步 INSERT 操作产生的 ID*/
	public function insert_id(){
		return mysql_insert_id();
    }



	//指向确定的一条数据记录
	public function db_data_seek($id){
		if($id>0){
			$id=$id-1;
		}
		if(!@mysql_data_seek($this->result,$id)){
			$this->show_error("sql语句有误：", "指定的数据为空");
		}
		return $this->result;
	}


	// 根据select查询结果计算结果集条数
	public function db_num_rows(){
		 if($this->result==null){
		 	if($this->show_error){
		 		$this->show_error("sql语句错误","暂时为空，没有任何内容！");
			}
		 }else{
		 	return  mysql_num_rows($this->result);
		 }
	}

	// 根据insert,update,delete执行结果取得影响行数
	public function db_affected_rows(){
		 return mysql_affected_rows();
	}


	//输出显示sql语句
	public function show_error($message="",$sql=""){
		if(!$sql){
			echo "<font color='red'>".$message."</font>";
			echo "<br />";
		}else{
			echo "<fieldset>";
			echo "<legend>错误信息提示:</legend><br />";
			echo "<div style='font-size:14px; clear:both; font-family:Verdana, Arial, Helvetica, sans-serif;'>";
			echo "<div style='height:20px; background:#000000; border:1px #000000 solid'>";
			echo "<font color='white'>错误号：12142</font>";
			echo "</div><br />";
			echo "错误原因：".mysql_error()."<br /><br />";
			echo "<div style='height:20px; background:#FF0000; border:1px #FF0000 solid'>";
			echo "<font color='white'>".$message."</font>";
			echo "</div>";
			echo "<font color='red'><pre>".$sql."</pre></font>";
				$ip=$this->getip();
				if($this->bulletin){
					$time = date("Y-m-d H:i:s");
					$message=$message."\r\n$this->sql"."\r\n客户IP:$ip"."\r\n时间 :$time"."\r\n\r\n";

					$server_date=date("Y-m-d");
					$filename=$server_date.".txt";
					$file_path="error/".$filename;
					$error_content=$message;
					//$error_content="错误的数据库，不可以链接";
					$file = "error"; //设置文件保存目录

					//建立文件夹
					if(!file_exists($file)){
						if(!mkdir($file,0777)){
						//默认的 mode 是 0777，意味着最大可能的访问权
							die("upload files directory does not exist and creation failed");
						}
					}

					//建立txt日期文件
					if(!file_exists($file_path)){

						//echo "建立日期文件";
						fopen($file_path,"w+");

						//首先要确定文件存在并且可写
						if (is_writable($file_path))
						{
							//使用添加模式打开$filename，文件指针将会在文件的开头
							if (!$handle = fopen($file_path, 'a'))
							{
								echo "不能打开文件 $filename";
								exit;
							}

								//将$somecontent写入到我们打开的文件中。
							if (!fwrite($handle, $error_content))
							{
								echo "不能写入到文件 $filename";
								exit;
							}

							//echo "文件 $filename 写入成功";

							echo "——错误记录被保存!";


							//关闭文件
							fclose($handle);
						} else {
							echo "文件 $filename 不可写";
						}

					}else{
						//首先要确定文件存在并且可写
						if (is_writable($file_path))
						{
							//使用添加模式打开$filename，文件指针将会在文件的开头
							if (!$handle = fopen($file_path, 'a'))
							{
								echo "不能打开文件 $filename";
								exit;
							}

								//将$somecontent写入到我们打开的文件中。
							if (!fwrite($handle, $error_content))
							{
								echo "不能写入到文件 $filename";
								exit;
							}

							//echo "文件 $filename 写入成功";
							echo "——错误记录被保存!";

							//关闭文件
							fclose($handle);
						} else {
							echo "文件 $filename 不可写";
						}
					}

				}
				echo "<br />";
				if($this->is_error){
					exit;
				}
			}
			echo "</div>";
			echo "</fieldset>";



		echo "<br />";
	}


	//释放结果集
	public function free(){
		@mysql_free_result($this->result);
	}

	//数据库选择
	public function select_db($db_database){
		return mysql_select_db($db_database);
	}

	//查询字段数量
	public function num_fields($table_name){
		//return mysql_num_fields($this->result);
		$this->query("select * from $table_name");
		echo "<br />";
		echo "字段数：".$total = mysql_num_fields($this->result);
		echo "<pre>";
		for ($i=0; $i<$total; $i++){
			print_r(mysql_fetch_field($this->result,$i) );
		}
		echo "</pre>";
		echo "<br />";
	}

	//取得 MySQL 服务器信息
	public function mysql_server($num=''){
		switch ($num){
			case 1 :
			return mysql_get_server_info(); //MySQL 服务器信息
			break;

			case 2 :
			return mysql_get_host_info();   //取得 MySQL 主机信息
			break;

			case 3 :
			return mysql_get_client_info(); //取得 MySQL 客户端信息
			break;

			case 4 :
			return mysql_get_proto_info();  //取得 MySQL 协议信息
			break;

			default:
			return mysql_get_client_info(); //默认取得mysql版本信息
		}
	}

	//析构函数，自动关闭数据库,垃圾回收机制
	public function __destruct()
	{
		if(!empty($this->result)){
			$this->free();
		}
		mysql_close($this->conn);
	}//function __destruct();



	/*获得客户端真实的IP地址*/
	function getip(){
		if(getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		{
			$ip = getenv("HTTP_CLIENT_IP");
		}
		else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		}
		else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		{
			$ip = getenv("REMOTE_ADDR");
		}
		else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
		$ip = $_SERVER['REMOTE_ADDR'];
		}
		else{
			$ip = "unknown";
		}
		return($ip);
	}


}
?>