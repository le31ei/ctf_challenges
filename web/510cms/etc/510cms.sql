-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 年 04 月 01 日 08:22
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `510cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `510_admin`
--

CREATE TABLE IF NOT EXISTS `510_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `mid` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `remark` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `510_admin`
--

INSERT INTO `510_admin` (`id`, `mid`, `name`, `passwd`, `remark`) VALUES
(1, 1, 'admin', '8dbdf8221fcf4bd6ac5a48317baa948c', '超级管理员'),
(3, 2, 'lwphp', '0a7aacdfc4588232bd0beccf9408853f', 'fjdkjfdk');

-- --------------------------------------------------------

--
-- 表的结构 `510_config`
--

CREATE TABLE IF NOT EXISTS `510_config` (
  `name` varchar(20) NOT NULL,
  `values` text NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `510_config`
--

INSERT INTO `510_config` (`name`, `values`, `remark`) VALUES
('webname', '510企业网站系统源码', ''),
('webdes', 'elinstudio工作室', ''),
('webkw', '企业建站专家', ''),
('copyright', '<P><A href="#">法律声明</A> | <A\r\nhref="#">网站地图</A> | <A\r\nhref="#">个人隐私</A> |\r\n粤ICP备05147401号<BR></P>\r\n<P class=en>elinstudio工作室，厦门F1电脑网络</P>', ''),
('cpname', '厦门F1网络', ''),
('cptel', '6311350', ''),
('cpfox', '6311350', ''),
('cpmail', 'info98@163.com', ''),
('cpadd', '厦门', ''),
('weburl', 'http://www.xmf1.com', '');

-- --------------------------------------------------------

--
-- 表的结构 `510_messages`
--

CREATE TABLE IF NOT EXISTS `510_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(20) NOT NULL,
  `c_phone` varchar(15) NOT NULL,
  `c_mail` varchar(60) NOT NULL,
  `c_title` varchar(80) NOT NULL,
  `c_content` text NOT NULL,
  `c_date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `510_messages`
--

INSERT INTO `510_messages` (`id`, `c_name`, `c_phone`, `c_mail`, `c_title`, `c_content`, `c_date`) VALUES
(8, '林大祯', '6311350', 'ldz9836@163.com', '我测试一下我的留言', '看一下我的内容留言成功没有。', 1271949182);

-- --------------------------------------------------------

--
-- 表的结构 `510_newbase`
--

CREATE TABLE IF NOT EXISTS `510_newbase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(25) DEFAULT NULL,
  `date_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `510_newbase`
--

INSERT INTO `510_newbase` (`id`, `cid`, `title`, `author`, `date_time`) VALUES
(24, 1, 'php上传图片得到路径传给表单字段的方法', 'elinstudio', 1271596020),
(25, 5, 'fdfd', 'ffdfdfd', 1271779873),
(26, 4, 'sssssssssssssss', 'ssdsssssssssssssss', 1271783571),
(27, 6, '测一下，我的新增新闻看一下可不可以', '林大祯', 1271858437),
(18, 1, '我的爱12', '林大祯1222', 1271085657),
(23, 1, 'PHP时间小时不正确-相关8小时的解决方法。', 'elinstudio', 1271595978),
(22, 1, 'smarty截取中文乱码问题解决办法', 'elinstudio', 1271595913);

-- --------------------------------------------------------

--
-- 表的结构 `510_newsclass`
--

CREATE TABLE IF NOT EXISTS `510_newsclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `f_id` int(11) NOT NULL COMMENT '父ID',
  `name` varchar(25) NOT NULL COMMENT '分类名称',
  `sort` int(11) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `510_newsclass`
--

INSERT INTO `510_newsclass` (`id`, `f_id`, `name`, `sort`) VALUES
(1, 0, '测试一下第一分类', 0),
(2, 0, '厦门F1网络', 0),
(3, 0, '网络工作室', 0),
(4, 3, '林大祯', 0),
(5, 2, 'elinstudio', 0),
(6, 1, 'lindazhen', 0),
(7, 0, '我的第一个', 0),
(8, 1, '再来一个看一啊', 0);

-- --------------------------------------------------------

--
-- 表的结构 `510_newscontent`
--

CREATE TABLE IF NOT EXISTS `510_newscontent` (
  `nid` int(11) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `remark` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `510_newscontent`
--

INSERT INTO `510_newscontent` (`nid`, `keyword`, `content`, `remark`) VALUES
(5, 'vbvb', '<p>vbvbvbvbvbvbvbv</p>', ''),
(11, '', '<div class="tags">Tag: <a href="/s94/">工作需要</a></div>\r\n<div class="date">2006-07-30</div>\r\n<div class="entryBody">\r\n<p><font color="#ff0000" size="1" face="Verdana">admin 888&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;469e80d32c0559f8</font></p>\r\n<p><font size="1" face="Verdana">admin 　　　　　　16位：7a57a5a743894a0e&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></p>\r\n<p><font size="1" face="Verdana">　　　　　　　　　　32位：21232f297a57a5a743894a0e4a801fc3</font></p>\r\n</div>', ''),
(2, '大幅度', '<p><strong>510CMS企业管理系统 免费版 (Free Edition)</strong></p>', ''),
(3, '春1', '11', ''),
(22, '', '<p>网站的页面在展现时，为了美观，经常需要对一些标题的长度进行控制。在整个程序中，到处都是那忙碌的字符串截取函数，而且还可能出现中文乱码。用mb_substr（）可以比较好的截取中文，但是它把中文和英文都按一个字符处理，截取的效果感觉不是太好。</p>\r\n<p>如果你是用Smarty做表现层的话，可以用smarty的变量调节器<u><strong>truncate</strong></u>方法来控制字符串的长度，当然利用Smarty自己的<u><strong>truncate截取中文</strong></u>时，会<u><strong>出现乱码</strong></u>。我们可以改写它的truncate调节器，让它来帮我们截取字符串，达到一劳永逸的效果。</p>\r\n<p>找到你的Smarty安装目录，打开plugins/modifier.truncate.php文件。你可以用下面的函数替换掉smarty自己的函数。</p>\r\n<p>function smarty_modifier_truncate($string, $length = 80, $etc = ''...'',<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $break_words = false, $middle = false)<br />\r\n{<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; if ($length == 0)<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; return '''';</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if (strlen($string) &gt; $length) {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $length -= min($length, strlen($etc));<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for($i = 0; $i &lt; $length ; $i++) {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; $strcut .= ord($string[$i]) &gt; 127 ? $string[$i].$string[++$i] : $string[$i];<br />\r\n&nbsp;&nbsp;&nbsp; }<br />\r\n&nbsp;&nbsp;&nbsp; return $strcut.$etc;&nbsp; <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } else {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; return $string;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }<br />\r\n}</p>\r\n<p>参数$length:为截取字符串的最大长度，默认为80字符，一个中文按2个字符计算;$etc:截取字符串时，自动附加在后面的符号。默认为（...）；$break_words 本指为是否可以打断一个单词，在中文环境下，作用不大，在改写的方法中，后面两个参数不起什么作用。</p>\r\n<p>最后说下使用<u><strong>，{$title|truncate:30:&quot;...&quot;} </strong></u>，很简单不是？当然这30个字符的长度还包括（...），如果你不喜欢，可以自己修改上面代码中的一行。</p>', ''),
(18, '', '<p>真的想看一下2 +64+6gfgffffffffffffffffffffffffffffffff可不可以。</p>', ''),
(17, '', '<p>磊</p>', ''),
(23, '', '<p>只要在面页增加这一句：date_default_timezone_set(&quot;Etc/GMT-8&quot;);</p>\r\n<p>ok就这样一句就决解了！</p>\r\n<p>[责任编辑]：<a href="http://www.xmf1.com/">厦门电脑维修</a><br />\r\n<script type="text/javascript"><!--\r\ngoogle_ad_client = "pub-0404978635986780";\r\n/* 468x15, 创建于 10-2-20 */\r\ngoogle_ad_slot = "2398765864";\r\ngoogle_ad_width = 468;\r\ngoogle_ad_height = 15;\r\n//-->\r\n</script>\r\n<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js" type="text/javascript">\r\n</script>\r\n<script type="text/javascript">google_protectAndRun("ads_core.google_render_ad", google_handleError, google_render_ad);</script>\r\n</p>', ''),
(24, '', '<p>1. 调用方法例子:<br />\r\n<br />\r\n大图路径：&lt;input type=&quot;text&quot; name=&quot;bigImageURL&quot; id=&quot;bigImageURL&quot;&nbsp;&nbsp;value=&quot;&quot;&gt;<br />\r\n<br />\r\n&lt;iframe src=&quot;uppic.<b style="color: black; background-color: #ffff66">php</b>?id=bigImageURL&quot; width=&quot;600&quot; height=&quot;25&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot;&gt;&lt;/iframe&gt;<br />\r\n<br />\r\n小图路径：<br />\r\n<br />\r\n&lt;input type=&quot;text&quot; name=&quot;smallImageURL&quot; id=&quot;smallImageURL&quot; value=&quot;&quot;&gt;<br />\r\n<br />\r\n&lt;iframe src=&quot;uppic.<b style="color: black; background-color: #ffff66">php</b>?id=smallImageURL&quot; width=&quot;600&quot; height=&quot;25&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot;&gt;&lt;/iframe&gt;<br />\r\n<br />\r\n2. uppic.<b style="color: black; background-color: #ffff66">php</b> <br />\r\n<br />\r\n&lt;?<b style="color: black; background-color: #ffff66">php</b><br />\r\nheader(&quot;Content-Type:text/html;charset=GB2312&quot;);<br />\r\n<br />\r\n?&gt;<br />\r\n&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot; &quot;<a href="http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd" target="_blank" rel="external">http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd</a>&quot;&gt;<br />\r\n&lt;HTML xmlns=&quot;<a href="http://www.w3.org/1999/xhtml" target="_blank" rel="external">http://www.w3.org/1999/xhtml</a>&quot;&gt;<br />\r\n&lt;HEAD&gt;<br />\r\n&lt;TITLE&gt;<b style="color: black; background-color: #a0ffff">图片</b><b style="color: black; background-color: #ff66ff">上传</b>&lt;/TITLE&gt;<br />\r\n&lt;META http-equiv=Content-Type content=&quot;text/html; charset=gb2312&quot;&gt;<br />\r\n&lt;META content=&quot;MSHTML 6.00.3790.4275&quot; name=GENERATOR&gt;<br />\r\n&lt;style type=&quot;text/css&quot;&gt;<br />\r\n&lt;!--<br />\r\ninput{border-width:1px;border:1px solid #bdbcbd;padding:3px 0 3px 5px;}<br />\r\n.inputbut{padding-left:3px;padding-right:2px;border:1px solid #bdbcbd;background:#FFF url(../images/inputbut_bg.gif) left center repeat-x;font-size:12px;height:24px;}<br />\r\n--&gt;<br />\r\n&lt;/style&gt;<br />\r\n&lt;/HEAD&gt;<br />\r\n&lt;BODY leftmargin=0 topmargin=0 style=&quot;font-size:12px&quot;&gt;<br />\r\n&lt;?<b style="color: black; background-color: #ffff66">php</b><br />\r\n<br />\r\n$id=$_GET[&quot;id&quot;];<br />\r\n//echo &quot;id==&quot;.$id;<br />\r\nswitch($_GET[&quot;action&quot;])<br />\r\n{<br />\r\ncase &quot;up&quot;:<br />\r\nupmovie($id);<br />\r\nbreak;<br />\r\ndefault:<br />\r\nupinput($id);<br />\r\nbreak;<br />\r\n}<br />\r\n<br />\r\nfunction upinput($id){<br />\r\n?&gt;<br />\r\n&lt;SCRIPT language=javascript&gt;<br />\r\nfunction check() <br />\r\n{<br />\r\nvar strFileName=document.form.strPhoto.value;<br />\r\nif (strFileName==&quot;&quot;)<br />\r\n{<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; alert(&quot;请选择要<b style="color: black; background-color: #ff66ff">上传</b>的文件&quot;);<br />\r\n&nbsp;&nbsp;document.form.strPhoto.focus();<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; return false;<br />\r\n&nbsp;&nbsp; }<br />\r\nreturn true;<br />\r\n}<br />\r\n&lt;/SCRIPT&gt;<br />\r\n&lt;form action=&quot;uppic.<b style="color: black; background-color: #ffff66">php</b>?action=up&amp;id=&lt;?=$id?&gt;&quot; enctype=&quot;multipart/form-data&quot; name=&quot;form&quot; method=&quot;post&quot; onsubmit=&quot;if (!check()) return false;&quot;&gt;<br />\r\n&lt;input name=&quot;strPhoto&quot; type=&quot;file&quot; id=&quot;strPhoto&quot; size=&quot;40&quot;&gt;<br />\r\n&lt;input type=&quot;submit&quot; name=&quot;Submit&quot; value=&quot;上 传&quot; class=inputbut /&gt;<br />\r\n&lt;/form&gt;<br />\r\n&lt;/BODY&gt;<br />\r\n&lt;?<b style="color: black; background-color: #ffff66">php</b><br />\r\n}<br />\r\n<br />\r\nfunction upmovie($id){<br />\r\nglobal $web_picdir;<br />\r\n$savePath=dirname(__FILE__).&quot;/&quot;.$web_picdir;<br />\r\n$str = date(''YmdHis'');<br />\r\nif($_FILES[''strPhoto''][''name'']!='''')<br />\r\n{<br />\r\n&nbsp;&nbsp; $tmp_file=$_FILES[''strPhoto''][''tmp_name''];<br />\r\n&nbsp;&nbsp; $file_types=explode(&quot;.&quot;,$_FILES[''strPhoto''][''name'']);<br />\r\n&nbsp;&nbsp; $file_type=$file_types[count($file_types)-1];<br />\r\n&nbsp;&nbsp; if(strtolower($file_type)!=&quot;jpg&quot;&amp;strtolower($file_type)!=&quot;gif&quot;&amp;strtolower($file_type)!=&quot;bmp&quot;&amp;strtolower($file_type)!=&quot;png&quot;){<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo &quot;&lt;span style=\\&quot;color:red;line-height: 25px;\\&quot;&gt;格式错误请重新<b style="color: black; background-color: #ff66ff">上传</b>&lt;a href=# onclick=history.go(-1);&gt;[返回]&lt;/a&gt;&lt;/span&gt;&quot;;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit;<br />\r\n&nbsp;&nbsp; }<br />\r\n&nbsp;&nbsp; $file_name=$str.&quot;.&quot;.$file_type;<br />\r\n&nbsp;&nbsp; if(!copy($tmp_file,$savePath.$file_name)){<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;echo &quot;&lt;span style=\\&quot;color:red;line-height: 25px;\\&quot;&gt;<b style="color: black; background-color: #ff66ff">上传</b>错误请重试！！&lt;a href=# onclick=history.go(-1);&gt;[返回]&lt;/a&gt;&lt;/span&gt;&quot;;<br />\r\n&nbsp;&nbsp; }else{<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//echo &quot;&lt;span style=\\&quot;olor:red;line-height: 25px;\\&quot;&gt;<b style="color: black; background-color: #ff66ff">上传</b>成功&lt;/span&gt;&lt;script&gt;parent.document.getElementById(\\&quot;bigImageURL\\&quot;).value=\\&quot;&quot;.$file_name.&quot;\\&quot;&lt;/script&gt;&quot;;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;echo &quot;&lt;span style=\\&quot;olor:red;line-height: 25px;\\&quot;&gt;<b style="color: black; background-color: #ff66ff">上传</b>成功&lt;/span&gt;&lt;script&gt;parent.document.getElementById(\\&quot;{$id}\\&quot;).value=\\&quot;&quot;.$file_name.&quot;\\&quot;&lt;/script&gt;&quot;;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;echo &quot;&lt;a href=# onclick=history.go(-1);&gt;,若需要修改,请重新<b style="color: black; background-color: #ff66ff">上传</b>&lt;/a&gt;&quot;;<br />\r\n&nbsp;&nbsp; }<br />\r\n}else{<br />\r\n&nbsp;&nbsp;echo &quot;&lt;span style=\\&quot;color:red;line-height: 25px;\\&quot;&gt;请选择需要<b style="color: black; background-color: #ff66ff">上传</b>的文件&lt;a href=# onclick=history.go(-1);&gt;[返回]&lt;/a&gt;&lt;/span&gt;&quot;;<br />\r\n}<br />\r\n}<br />\r\n<br />\r\n<br />\r\n?&gt;<br />\r\n<br />\r\n<a href="http://www.xmf1.com/" target="_blank">注意: 不同的<b style="color: black; background-color: #ff9999">文本</b>框 需要定义id,&nbsp;&nbsp;iframe url :&nbsp;&nbsp; uppic.<b style="color: black; background-color: #ffff66">php</b>?id=<b style="color: black; background-color: #ff9999">文本</b>框id </a><br />\r\n&nbsp;</p>\r\n<p>[责任编辑]：<a href="http://www.xmf1.com/">厦门电脑维修</a><br />\r\n&nbsp;</p>', ''),
(25, '', '<p>fdfdfdfdfdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</p>', ''),
(26, '', '<p>include(''./fckeditor/fckeditor.php'') ;<br />\r\n$db-&gt;user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);<br />\r\nif(isset($_POST[''newsadd''])){<br />\r\n&nbsp;if($_POST[f_id]!=0){<br />\r\n$db-&gt;query(&quot;INSERT INTO `510_newbase` (`id`, `cid`, `title`, `author`, `date_time`)&quot; .<br />\r\n&nbsp;&nbsp;&nbsp;&quot; VALUES (NULL, ''$_POST[f_id]'', ''$_POST[title]'', ''$_POST[author]'', ''&quot;.mktime().&quot;'')&quot;);<br />\r\n&nbsp;&nbsp;&nbsp;$lastID=$db-&gt;insert_id();<br />\r\n$db-&gt;query(&quot;INSERT INTO `510_newscontent` (`nid`, `keyword`, `content`, `remark`) &quot; .<br />\r\n&nbsp;&nbsp;&quot;VALUES (''$lastID'', '''', ''$_POST[con]'', '''');&quot;);<br />\r\n$db-&gt;get_admin_msg(&quot;news_add.php&quot;,&quot;成功添加信息&quot;);<br />\r\n&nbsp;}<br />\r\n&nbsp;else $db-&gt;get_admin_msg(&quot;news_add.php&quot;,&quot;请选择分类&quot;);<br />\r\n}</p>', ''),
(27, '', '<p>&lt;tr align=&quot;center&quot;&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;3%&quot;&gt;&lt;?php echo $row[id] ?&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;49%&quot; height=&quot;26&quot;&gt;&lt;?php echo $row[title] ?&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;13%&quot; height=&quot;&quot;&gt;&lt;?php echo $news_class_arr[$row[cid]] ?&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;9%&quot; height=&quot;26&quot;&gt;&lt;?php echo $row[author] ?&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;11%&quot; height=&quot;&quot;&gt;&lt;?php echo date(&quot;Y-m-d&quot;,$row[date_time]) ?&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;12%&quot;&gt;&lt;a href=&quot;news_edit.php?id=&lt;?php echo $row[id] ?&gt;&quot;&gt;编辑&lt;/a&gt; &lt;a href=&quot;?del=&lt;?php echo $row[id] ?&gt;&quot;&gt;删除&lt;/a&gt;&lt;/td&gt;<br />\r\n&lt;td class=&quot;td_bg&quot; width=&quot;3%&quot; height=&quot;&quot;&gt;&lt;input type=checkbox value=&lt;?php echo $row[id] ?&gt; name=&quot;lin[]&quot; onClick=Checked(form)&gt;&lt;/td&gt;<br />\r\n&lt;/tr&gt;<br />\r\n&lt;?php</p>', '');

-- --------------------------------------------------------

--
-- 表的结构 `510_proclass`
--

CREATE TABLE IF NOT EXISTS `510_proclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `sort` int(11) NOT NULL,
  `cidpic` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `510_proclass`
--

INSERT INTO `510_proclass` (`id`, `f_id`, `name`, `sort`, `cidpic`, `remark`) VALUES
(1, 0, '港澳产品专区', 0, 'http://www.giec.cn/upfile/Images/2009/20091209155255.jpg', '新生活1'),
(2, 0, 'DVD系列', 0, 'http://www.giec.cn/upfile/Images/2009/20090916213613.jpg', '新生活2'),
(3, 0, '数字音响', 0, 'http://www.giec.cn/upfile/Images/2009/20090916213613.jpg', '新生活3'),
(4, 0, '多媒体系列', 0, 'http://www.giec.cn/upfile/Images/2009/20090916213613.jpg', '新生活4'),
(5, 4, 'RM播放器', 0, '', ''),
(6, 4, '网络电影播放机', 0, '', ''),
(7, 4, '高清媒体播放器 ', 0, '', ''),
(8, 3, '家庭影院 ', 0, '', ''),
(9, 3, '2.0有源对箱', 0, '', ''),
(10, 3, '低音炮系列', 0, '', ''),
(11, 3, '功放系列', 0, '', ''),
(12, 2, '高清互联网DVD ', 0, '', ''),
(13, 2, '移动 DVD ', 0, '', ''),
(14, 2, 'RMVB DVD ', 0, 'sdsdsdsds', 'ddsd  rr23frf f 中'),
(15, 1, '低漏磁环形变压器', 0, '', ''),
(16, 0, '测试一下', 0, '', ''),
(18, 0, '夺城震', 0, '在 地地 ', '大幅度'),
(19, 0, '夺城震城霏霏', 0, '夺地', ''),
(20, 0, 'fffffffffff', 0, 'dfffff', 'ffffffffff');

-- --------------------------------------------------------

--
-- 表的结构 `510_procut`
--

CREATE TABLE IF NOT EXISTS `510_procut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `model` text NOT NULL,
  `introduction` text NOT NULL,
  `parameter` text NOT NULL,
  `pic_1` varchar(100) NOT NULL,
  `pic_2` varchar(100) NOT NULL,
  `pic_3` varchar(100) NOT NULL,
  `date_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `510_procut`
--

INSERT INTO `510_procut` (`id`, `cid`, `name`, `model`, `introduction`, `parameter`, `pic_1`, `pic_2`, `pic_3`, `date_time`) VALUES
(1, 7, '高清媒体播放器', 'GK-HD200', '■支持互联网上流行的1080p全高清无损提取的蓝光REMUX片源；\r\n\r\n■ 广泛支持H.264(AVC HD)、VC-1(WMV-HD)、MPEG-2 HD、MPEG-1、MPEG-4、Xvid编码；\r\n\r\n■ 完全解码RM、RMVB编码的网络电影，支持RMVB 720p高清片源播放；\r\n\r\n■ 完美支持mkv、ts、m2ts、tp、trp、avi、wmv、rm、rmvb、mpeg、mpg、mp4、vob、mov、\r\n\r\n   iso、dat、asf等封装格式；\r\n\r\n■ 支持DTS、Dolby杜比音频解码；\r\n\r\n■ 可内置3.5寸硬盘，SATA接口，拆卸方便\r\n\r\n■ HDMI 1.3版本高清全数字多媒体接口，完美支持1920x1080p全高清输出；\r\n\r\n■ 支持MP3、WMA、AAC、WAV、OGG、FLAC、REAL audio、Alac等音频格式；\r\n\r\n■ 有线LAN接口，支持局域网多媒体文件浏览以及可扩展的广义互联网功能；\r\n\r\n■ 支持USB外置光驱以及无线网卡功能；\r\n\r\n■ 具备光纤、同轴双数字音频源码输出，完美配备数字功放设备；\r\n\r\n■ 支持JPEG、BMP、GIF、PNG、TIFF格式，支持8000*8000分辨率高清数码照片；\r\n\r\n■ 支持FAT16、FAT32、NTFS、EXT3格式系统；\r\n\r\n■ 双路USB 2.0 High Speed 高速接口，保证数据传输快速稳定；\r\n\r\n■ SD/MMC/MS三合一读卡器，方便使用各种存储卡；\r\n\r\n■ 支持简体中文、英语、繁体中文、西班牙语、法语、德语、意大利语、荷兰语等多语言操作；\r\n\r\n■ 支持1080p、1080i、720p、576p、480p等多种分辨率输出，完美匹配各种显示设备。\r\n', '<div class="xx">\r\n<table cellspacing="0" cellpadding="0" align="center" border="1">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品规格</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">DC 12V/3A</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品颜色</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">黑色</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品尺寸</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">288*188*43(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">包装尺寸</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">318*80*310(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">毛重/净重</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">1.6/0.87kg</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p align="center"><img style="width: 463px; height: 97px" height="197" alt="" width="979" border="0" src="http://www.giec.cn//upFile/20091211135406.jpg" /></p>\r\n</div>', 'upload/day_100417/20100417132243.jpg', 'upload/day_100422/20100422131327.jpg', 'upload/day_100422/20100422131341.jpg', 1271510594),
(2, 8, '家庭影院', '天翔三号', '■低漏磁环形变压器\r\n\r\n■四路模拟音频信号输入\r\n\r\n■进口优质大功率功放管\r\n\r\n■彩色VFD荧光屏显示\r\n\r\n■高低可调，平衡独立调节\r\n\r\n■完善的过流，过压，短路保护电路\r\n\r\n■简单的操作模式\r\n\r\n■优质卡拉OK效果\r\n\r\n■翻盖式防尘设计\r\n\r\n\r\n\r\n■典雅黑色，完美融入现代家居风格 \r\n\r\n■三分频四单元\r\n\r\n■侧8寸低音单元在播放大动态节目时游刃有余\r\n\r\n■双4’’中音单元选用高档纸盆，令中频再现更完美\r\n', '', 'upload/day_100417/20100417132505.jpg', '', '', 1271510737),
(3, 12, '高清互联网DVD', 'GK-908', '■支持1080p全高清无损蓝光REMUX片源；\r\n\r\n■支持天气信息、新闻、股票和视频在线浏览（信息内容由内容提供商提供）\r\n\r\n■支持在线影视观看（节目内容由内容提供商提供）\r\n\r\n■广泛支持H.264(AVC HD)、VC-1(WMV-HD)、MPEG-2 HD、MPEG-1、MPEG-4、Xvid编码；\r\n\r\n■完全解码RM、RMVB编码的网络电影，支持RMVB 720p高清片源播放；\r\n\r\n■HDMI 1.3版本高清全数字多媒体接口，完美支持1920x1080p全高清输出；\r\n\r\n■兼容播放XVID、DVD、VCD、CD、CD-G、PictureCD、MP3、HDCD、SVCD、CD-R/RW、DVD-R/RW、DVD+R/RW、JPEG等格式的碟片\r\n\r\n■完美支持mkv、ts、m2ts、tp、trp、avi、wmv、rm、rmvb、mpeg、mpg、mp4、vob、mov、iso、dat、asf等封装格式；\r\n\r\n■支持DTS、Dolby杜比音频解码；\r\n\r\n■支持MP3、WMA、AAC、WAV、OGG、FLAC、REAL audio、Alac等音频格式；\r\n\r\n■有线LAN接口，支持局域网多媒体文件浏览以及可扩展的广义互联网功能；\r\n\r\n■支持USB外置光驱以及无线网卡功能；\r\n\r\n■具备光纤、同轴双数字音频源码输出，完美配备数字功放设备；\r\n\r\n■支持JPEG、BMP、GIF、PNG、TIFF格式，支持8000*8000分辨率高清数码照片；\r\n\r\n■支持FAT16、FAT32、NTFS、EXT3格式系统；\r\n\r\n■USB 2.0 High Speed 高速接口，保证数据传输快速稳定；\r\n\r\n■SD/MMC/MS三合一读卡器，方便使用各种存储卡\r\n', '<p>\r\n<table cellspacing="0" cellpadding="0" align="center" border="1">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品规格</p>\r\n            </td>\r\n            <td valign="top" width="263">\r\n            <p align="left">~90V&mdash;240V&nbsp; 50Hz/60 Hz&nbsp;15w</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品颜色</p>\r\n            </td>\r\n            <td valign="top" width="263">\r\n            <p align="left">黑色</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品尺寸</p>\r\n            </td>\r\n            <td valign="top" width="263">\r\n            <p align="left">360&times;252&times;43(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">包装尺寸</p>\r\n            </td>\r\n            <td valign="top" width="263">\r\n            <p align="left">400&times;310&times;92(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">毛重/净重</p>\r\n            </td>\r\n            <td valign="top" width="263">\r\n            <p align="left">2.5/1.5kg</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>', 'upload/day_100417/20100417132639.jpg', '', '', 1271510821),
(4, 15, '高清媒体播放器', 'GK-HD100 ', '■支持互联网上流行的1080p全高清无损提取的蓝光REMUX片源；\r\n\r\n■广泛支持H.264(AVC HD)、VC-1（WMV-HD）、MPEG-2 HD、MPEG-1、MPEG-4、Xvid/DivX3/4/5/6；\r\n\r\n■完全解码RM、RMVB编码的网络电影，支持RMVB 720p高清片源播放；\r\n\r\n■HDMI 1.3版本高清全数字多媒体接口，完美支持1920x1080p全高清输出，完美支持次世代音频源码输出；\r\n\r\n■完美支持mkv、ts、m2ts、tp、trp、avi、wmv、rm、rmvb、mpeg、mpg、mp4、vob、mov、iso、dat、asf等封装格式；\r\n\r\n■支持MP3、WMA、AAC、WAV、OGG、FLAC、REAL audio、Alac等音频格式；\r\n\r\n■具备光纤、同轴双数字音频源码输出，完美配备数字功放设备；\r\n\r\n■支持JPEG、BMP、GIF、PNG、TIFF格式，支持8000*8000分辨率高清数码照片；\r\n\r\n■支持FAT16、FAT32、NTFS、EXT3格式化设备；\r\n\r\n■双路USB 2.0 Hihg Speed 高速接口，保证数据传输快速稳定；\r\n\r\n■SD/MMC/MS三个一读卡器，方便使用各种存储卡；\r\n\r\n■支持简体中文、英语、繁体中文、西班牙语、法语、德语、意大利语、荷兰语等多语言操作；\r\n\r\n■支持1080p、1080i、720p、576p、480p等多种分辨率输出，完美匹配各种显示设备。\r\n', '<div class="xx">\r\n<div align="center">\r\n<table cellspacing="0" cellpadding="0" align="center" border="1">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品规格</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">DC 5V/2A</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品颜色</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">黑色</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">产品尺寸</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">140*90*22(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">包装尺寸</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">182*270*112(mm)</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td valign="top" width="113">\r\n            <p align="center">毛重/净重</p>\r\n            </td>\r\n            <td valign="top" width="171">\r\n            <p align="left">0.8/0.26kg</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<div align="center">&nbsp;</div>\r\n<p align="center"><img style="width: 374px; height: 145px" height="370" src="http://www.giec.cn//upFile/20091211139828.jpg" width="826" border="0" alt="" /></p>\r\n</div>', 'upload/day_100417/20100417132756.jpg', '', '', 1271510888),
(5, 20, '22222222222', '2222222', '', '<p>\r\n<table id="5" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779317EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':5,''y'':''FAB5F7EE''})" href="http://tieba.baidu.com/f?kz=29214897" target="_blank"><font size="3">百度_md5吧_<font color="#cc0000">MD5在线</font>转换，这个网站太牛了，MD5都破解了，晕！！</font></a><br />\r\n            <font size="-1">7 回复：MD5在线转换，这个网站太牛了，MD5都破解了，晕！！ 个人最新作品。<font color="#cc0000">MD5在线解密</font>加密http://qq.10000do.com 还提供联盟。有自己主页的可以试试加盟。 ...<br />\r\n            <font color="#008000">tieba.baidu.com/f?kz=29214897 2009-11-11 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece76310508c31490797634b87834e29938448e435061e5a32f4ba537b5813d2b37c6c01ac4f56e1f522376a4376b8c49e8f5ddccb855e299f5147676df25664a70eaebb5155b737e75afede18f0cc81&amp;p=836ec54ad0c85ffc57ec8c624a0a&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="6" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779717EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':6,''y'':''A7A7FDCB''})" href="http://www.520hack.com/Soft/Soft2/200805/10031.html" target="_blank"><font size="3"><font color="#cc0000">MD5在线解密</font>小助手</font></a><br />\r\n            <font size="-1">软件名称:<font color="#cc0000">MD5在线解密</font>小助手 软件大小：0 K 软件语言：简体中文 软件类型：国产软件 运行环境：Win9x/NT/2000/XP/2003 软件等级：★★★ 授权方式：免费...<br />\r\n            <font color="#008000">www.520hack.com/Soft/Soft2/200805/10031.html 2008-6-12 </font>- <a class="m" href="http://cache.baidu.com/c?m=9d78d513d99c17a84fece4697b10c0106a43f1172ba1a4027ea48438e5732c415017e2ac51530443939b733d47e90b4beb832b6f724665a09bbf8f4adfe1c179769f27432141d95c738e4de9d6277895669047e9ad1bedb8f72f90acd0d2dc4353bd094325de&amp;p=977bc715d9c541f911be9b7e4754&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="7" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779717EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':7,''y'':''FFD7FBFB''})" href="http://www.hx95.com/Soft/Crack/200805/904.htm" target="_blank"><font size="3"><font color="#cc0000">MD5在线解密</font>小助手 V1.0</font></a><br />\r\n            <font size="-1"><font color="#cc0000">MD5在线解密</font>小助手 V1.0 下载地址1 -- 相关软件: 没有相关下载 最新推荐 终结者下载器[去后门]生成器 指令函数查询工具FunSearche 网页反限制工具 1.0 ...<br />\r\n            <font color="#008000">www.hx95.com/Soft/Crack/200805/904.htm 2008-6-29 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece763105392230e54f73976dcd7027fa3c215cc793a1c1320feca6771415dcec57e650bad4e41e1f2306537747af1c4dccd179ded9d77798f3035000bf04705a56ab8ba3232b754875b99b86991ad873284dfd3c4a925&amp;p=85738916d9c219b408e2947c5000&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="8" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779717EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':8,''y'':''D6D97FF7''})" href="http://www.anqn.com/md5/2007-12-01/a0990410.shtml" target="_blank"><font size="3"><font color="#cc0000">Md5在线解密</font>工具:Md5 Searche 1.7(图)_安全中国 - www.anqn.co...</font></a><br />\r\n            <font size="-1">详细介绍:<font color="#cc0000">Md5在线解密</font>工具：Md5 Searche 1.7，整理大量<font color="#cc0000">MD5在线解密</font>网站，数据库非常大，可以更快的破译出MD5值。 安全中国特别提醒：在本站下载的软件均已通过...<br />\r\n            <font color="#008000">www.anqn.com/<b>md5</b>/2007-12-01/a0990410.shtml 2010-2-15 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece763105392230e54f73060948c027fa3c215cc790417407be3b925270704a5c67c7001d94b5ff7a334793c0126b499df883d9ce1d477719c6269304a891e44d40eaebb5153c737e629fede6df0cc842592dec5a3a94324ca44747b9786fa&amp;p=9934cf13c5904eae08e2937c5a41&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="9" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779717EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':9,''y'':''F77E5FF0''})" href="http://www.heibai.net/article/info/info.php?infoid=47908" target="_blank"><font size="3">教你如何轻松<font color="#cc0000">解密Md5</font>密码（图） - 黑白网络</font></a><br />\r\n            <font size="-1">(二)<font color="#cc0000">在线</font>破解<font color="#cc0000">md5</font>密码值 1.通过cmd5网站破解<font color="#cc0000">md5</font>密码 在cmd5网站的输入框中输入刚才加密后的<font color="#cc0000">md5</font> 32值&ldquo;d5a8e0b115259023faa219f5b53ca522&rdquo;，然后单击&ldquo;<font color="#cc0000">md5</font>加密或<font color="#cc0000">解密</font>...<br />\r\n            <font color="#008000">www.heibai.net/article/info/info.php?info ... 2010-4-12 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece763105392230e54f7396b8c804624c3933fcf331d5c1426a5e0767c47198899283a1cf41508b7e73605755962a09abcd31689e6c97e388951327517844b069644ef9d497a9727875b99b86fe1ad864184dfa6c4a92044cb23120af6e7fc5a1765cb788665&amp;p=c2759a44dd8a0af30be294316164&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="10" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779717EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272107262'',''title'':this.innerHTML,''url'':this.href,''p1'':10,''y'':''7BEF67FD''})" href="http://www.7747.net/Article/200905/38300.html" target="_blank"><font size="3">教你如何轻松<font color="#cc0000">解密Md5</font>密码-学院 技术文摘-红黑联盟</font></a><br />\r\n            <font size="-1">(二)<font color="#cc0000">在线</font>破解<font color="#cc0000">md5</font>密码值 1.通过cmd5网站破解<font color="#cc0000">md5</font>密码 在cmd5网站的输入框中输入刚才加密后的<font color="#cc0000">md5</font> 32值&ldquo;d5a8e0b115259023faa219f5b53ca522&rdquo;，然后单击&ldquo;<font color="#cc0000">md5</font>加密或<font color="#cc0000">解密</font>&rdquo;...<br />\r\n            <font color="#008000">www.7747.net/Article/200905/38300.html 2009-12-13 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece763105392230e54f76639d1d5027fa3cf1fd5792801013db2e5703f1006d1ce7e601cae435de8f22172405966e8c5dccd179ded9d77798f3035000bf04705a56ab8ba3232b754875b99b86991ad873284dfd3c4a925&amp;p=89769a4592db33ff57e98f3e4e&amp;user=baidu" target="_blank"><font color="#666666">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>', 'upload/day_100424/20100424114534.jpg', 'upload/day_100424/20100424114538.jpg', 'upload/day_100424/20100424114519.jpg', 1272109573),
(6, 5, '', '', '', '', '', '', '', 1272109697),
(7, 19, 'dfdfd', 'fdfdf', '', '', '', '', '', 1272110082),
(8, 19, 'eeee', 'eeeee', 'dfdf - 视频豆单合集 - 土豆网\r\ndfdf http://www.tudou.com/playlist/id5674911.html复制链接 | 收藏本页 创建新豆单编辑豆单删除 豆单简介编辑标题与简介管理视频批量下载订阅该豆单播放豆单 ...\r\nwww.tudou.com/playlist/id/5674911/ 2010-4-13 - 百度快照 \r\n \r\n\r\ndfdf吧 百度贴吧\r\ndfdf吧共有主题190个，贴子697篇。\r\n※dfdf\r\n※dfdf\r\ntieba.baidu.com/dfdf 2010-4-24  \r\n\r\ndfdf_百度视频\r\n约有3,951个dfdf相关的视频 打，打个大西瓜 分类:dfdf v.youku.com 1994年度翡翠歌星?台... 分类:dfdf www.tudou.com dfdf 分类:音乐 you.video.sin...\r\nvideo.baidu.com/v?word=dfdf 2010-4-24\r\n \r\n\r\n', '<p>\r\n<table id="2" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''as'',''F'':''779317EA'',''F1'':''9D73F1E4'',''F2'':''4CA6DF6A'',''F3'':''54E5243F'',''T'':''1272110242'',''title'':this.innerHTML,''url'':this.href,''p1'':2,''y'':''FBE6EBDA''})" href="http://www.tudou.com/playlist/id/5674911/" target="_blank"><font size="3"><font color="#cc0000">dfdf</font> - 视频豆单合集 - 土豆网</font></a><br />\r\n            <font size="-1"><font color="#cc0000">dfdf</font> http://www.tudou.com/playlist/id5674911.html复制链接 | 收藏本页 创建新豆单编辑豆单删除 豆单简介编辑标题与简介管理视频批量下载订阅该豆单播放豆单 ...<br />\r\n            <font color="#008000">www.tudou.com/playlist/id/5674911/ 2010-4-13 </font>- <a class="m" href="http://cache.baidu.com/c?m=9f65cb4a8c8507ed4fece763105392230e54f7257b818d5268d4e419ce3b46031935a8e57c6356198893616005aa4f57e9f32b66725e60e1949edc1c89&amp;p=9a769a439cd91fe808e2977e154a&amp;user=baidu" target="_blank"><font color="#666666" size="5">百度快照</font></a> <br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="3" cellspacing="0" cellpadding="0" mu="http://tieba.baidu.com/f?kw=dfdf&amp;fr=ala0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onmousedown="return c({''fm'':''altb'',''title'':this.innerHTML,''url'':this.href,''p1'':al_c(this)})" href="http://tieba.baidu.com/f?kw=dfdf&amp;fr=ala0" target="_blank"><font size="3"><font color="#c60a00">dfdf</font>吧 百度贴吧</font></a><br />\r\n            <font size="-1"><font color="#c60a00">dfdf</font>吧共有主题190个，贴子697篇。<br />\r\n            ※<font color="#cc0000">dfdf<br />\r\n            </font>※<font color="#cc0000">dfdf<br />\r\n            </font><font color="#008000">tieba.baidu.com/dfdf 2010-4-24 </font></font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n<table id="4" cellspacing="0" cellpadding="0" mu="http://video.baidu.com/v?ct=301989888&amp;rn=20&amp;pn=0&amp;db=0&amp;s=8&amp;word=dfdf&amp;fr=ala0">\r\n    <tbody>\r\n        <tr>\r\n            <td class="f"><a onclick="c({''fm'':''alvd'',''title'':this.innerHTML,''url'':this.href,''p1'':al_c(this)});" href="http://video.baidu.com/v?ct=301989888&amp;rn=20&amp;pn=0&amp;db=0&amp;s=8&amp;word=dfdf&amp;fr=ala0" target="_blank"><font size="3"><font color="#cc0000">dfdf</font>_百度视频</font></a><br />\r\n            <font size="-1">约有3,951个<font color="#cc0000">dfdf</font>相关的视频 打，打个大西瓜 分类:<font color="#cc0000">dfdf</font> v.youku.com 1994年度翡翠歌星?台... 分类:<font color="#cc0000">dfdf</font> www.tudou.com <font color="#cc0000">dfdf</font> 分类:音乐 you.video.sin...<br />\r\n            <font color="#008000">video.baidu.com/v?word=dfdf 2010-4-24</font><br />\r\n            </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n&nbsp;</p>', '', '', '', 1272110243),
(9, 15, '', '', '', '', '', 'upload/day_100424/20100424120528.jpg', '', 1272110732);

-- --------------------------------------------------------

--
-- 表的结构 `510_single`
--

CREATE TABLE IF NOT EXISTS `510_single` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `remark` text NOT NULL,
  `sort` int(11) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `510_single`
--

INSERT INTO `510_single` (`id`, `type_id`, `title`, `content`, `remark`, `sort`, `date`) VALUES
(5, 2, '企文介绍', '<p>\r\n<table height="435" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top">\r\n            <table cellspacing="0" cellpadding="0" width="95%" align="left" border="0">\r\n                <tbody>\r\n                    <tr>\r\n                        <td>\r\n                        <p>　　<img style="padding-right: 15px; padding-left: 0px; float: left; padding-bottom: 0px; padding-top: 0px" height="147" alt="" width="217" align="left" src="http://www.giec.cn/images/about_17.jpg" /><br />\r\n                        深圳市杰科电子有限公司成立于1999年，是集数码视听产品、信息化家电的生产、销售于一体的高新科技企业，杰科公司坚持自主创新，在与世界科技同步发展时，更注重将相关技术优化组合，转化为适应市场需求的社会化产品，并以&ldquo;创建国际化、专业化的一流家电品牌&rdquo;为目标，致力于为全球客户提供一流的数码视听产品和服务。<br />\r\n                        <br />\r\n                        杰科公司历经十余年的发展，现有近两千余名员工、现代化的生产基地及拥有100多名工程师的研发团队，研发实力雄厚,已荣获多项实用型技术专利证书。杰科产品涵盖数字高清机顶盒、高清媒体播放器、蓝光高清播放机及家庭影院等。在新产品的研发技术和研发速度上，杰科公司均领先于国内同行业企业，成为行业发展先锋。<br />\r\n                        <br />\r\n                        杰科产品以品质和信誉赢得了国内外市场的美誉度和知名度，产品营销网络遍布全国各级城乡市场，并建立了完善的售后服务体系，产品大量出口到欧洲、中东、美洲、亚洲、非洲等地区，杰科公司时刻以敏锐的眼光洞察国际市场的变化，确保产品不断推陈出新，引领市场潮流，&ldquo;GIEC&rdquo;品牌已跻身国际数码视听知名品牌行列。<br />\r\n                        <br />\r\n                        杰科公司推行建立在高新科技、卓越品质和完善服务之上的&ldquo;品牌战略&rdquo;，以优质的产品，优异的服务、优越的产品性价比满足客户，服务社会。杰科在自主发展的核心技术上保持开放合作精神，力争在数字视听领域乃至信息产业界创造出完美数字境界。</p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>', '', 2, 1271424252),
(6, 1, '企业文化', '<p><span style="font-weight: bold; color: #ff6600">企业目标：</span>成为信息家电和数字影音产品行业的国内一流3Cjhjkhkjhjkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh企业</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业宗旨：</span>诚信赢得客户，专业服务大众，品牌创造价值</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业精神：</span>绝对真本色</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业使命：</span>数字生活，影.响世界</p>', '企业类模块', 3, 1271599823),
(7, 2, '企业', '<p><span style="font-weight: bold; color: #ff6600">企业目标：</span>成为信息家电和数字影音产品行业的国内一流3C企业</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业宗旨：</span>诚信赢得客户，专业服务大众，品牌创造价值</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业精神：</span>绝对真本色</p>\r\n<p><span style="font-weight: bold; color: #ff6600">企业使命：</span>数字生活，影.响世界</p>', '企来啊', 0, 1271599866),
(8, 1, '人才招聘', '<p>这里可以自定义类型标示符如1、2、3或A、B、C，所添加的相同类型的模块为一个目录。</p>', '服务与持持', 6, 1271944916);

-- --------------------------------------------------------

--
-- 表的结构 `510_weblink`
--

CREATE TABLE IF NOT EXISTS `510_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_name` varchar(50) NOT NULL,
  `w_url` varchar(50) NOT NULL,
  `w_introduction` varchar(80) NOT NULL,
  `w_logo` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
