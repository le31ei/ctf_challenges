<?php /* Smarty version 2.6.18, created on 2010-04-23 14:08:25
         compiled from about.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD 
id=Head1><TITLE><?php echo $this->_tpl_vars['sm_config']['webname']; ?>
</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gbk">
<meta name="description" content="<?php echo $this->_tpl_vars['sm_config']['webdes']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['sm_config']['webkw']; ?>
" />
<LINK href="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/style.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.3252" name=GENERATOR></HEAD>
<BODY>

<DIV class=wrap>
<?php echo '
<SCRIPT language=javascript>	
	function ResumeError() { return true; } window.onerror = ResumeError;
	
	function menuFix() { 
var sfEls = document.getElementById("nav").getElementsByTagName("li"); 
for (var i=0; i <sfEls.length; i++) { 
sfEls[i].onmouseover=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onMouseDown=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onMouseUp=function() { 
this.className+=(this.className.length>0? " ": "") + "sfhover"; 
} 
sfEls[i].onmouseout=function() { 
this.className=this.className.replace(new RegExp("( ? |^)sfhover\\\\b"), 
""); 
} 
} 
} 
window.onload=menuFix; 
	
</SCRIPT>

<SCRIPT type=text/javascript>
    function test1()
    {   // alert("keyword.value");
    var keyword = document.getElementById("search");   
        if(keyword.value==\'\'){
            alert(\'请输入关键字\');
            keyword.focus();
            return false;
        }
		else
		{		
        var keyword=document.getElementById("search").value;
        var url="../Search/search.aspx?type=0&search="+escape(keyword)
        window.open(url)
		}      
     
    } 
    
     function UpSerrch()
        {
            var sk=event.keyCode;
            if(sk==13)
            {   
                  test1();
                    // document.getElementById ("IbtnLogin").click(); 
            } 
        }

</SCRIPT>
'; ?>

<DIV class=" header1">
<DIV class=" header">
<DIV class="logo left"><A href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
"><IMG height=24 
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/logo.jpg" width=168></A></DIV>
<DIV class="search right">
<DIV class="search_l left"><INPUT class=search_k id=search name=search><INPUT class=search_s onclick=test1(); type=submit name=input value=""> 
</DIV>
<DIV class="language left"><A 
href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
/en">English</A>&nbsp;&nbsp;&nbsp;<A 
onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
');" 
href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
#">设定首页</A> </DIV></DIV></DIV></DIV>
<DIV class=head id=nav>
<DIV class=nav>
<UL>
  <LI><A href="index.php">首　页 </A></LI>
  <LI class=qq><A href="about.php">企业介绍</A> 
  <UL>

<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['sm_comp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
    <LI><A href="about.php?listid=<?php echo $this->_tpl_vars['sm_comp'][$this->_sections['c']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_comp'][$this->_sections['c']['index']]['title']; ?>
</A>  </LI>
<?php endfor; endif; ?>	
   
   
   </UL>
   </LI>
  <LI><A href="news.php">新闻中心</A> 
  <UL>
  <?php unset($this->_sections['nc']);
$this->_sections['nc']['name'] = 'nc';
$this->_sections['nc']['loop'] = is_array($_loop=$this->_tpl_vars['sm_newclass']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nc']['show'] = true;
$this->_sections['nc']['max'] = $this->_sections['nc']['loop'];
$this->_sections['nc']['step'] = 1;
$this->_sections['nc']['start'] = $this->_sections['nc']['step'] > 0 ? 0 : $this->_sections['nc']['loop']-1;
if ($this->_sections['nc']['show']) {
    $this->_sections['nc']['total'] = $this->_sections['nc']['loop'];
    if ($this->_sections['nc']['total'] == 0)
        $this->_sections['nc']['show'] = false;
} else
    $this->_sections['nc']['total'] = 0;
if ($this->_sections['nc']['show']):

            for ($this->_sections['nc']['index'] = $this->_sections['nc']['start'], $this->_sections['nc']['iteration'] = 1;
                 $this->_sections['nc']['iteration'] <= $this->_sections['nc']['total'];
                 $this->_sections['nc']['index'] += $this->_sections['nc']['step'], $this->_sections['nc']['iteration']++):
$this->_sections['nc']['rownum'] = $this->_sections['nc']['iteration'];
$this->_sections['nc']['index_prev'] = $this->_sections['nc']['index'] - $this->_sections['nc']['step'];
$this->_sections['nc']['index_next'] = $this->_sections['nc']['index'] + $this->_sections['nc']['step'];
$this->_sections['nc']['first']      = ($this->_sections['nc']['iteration'] == 1);
$this->_sections['nc']['last']       = ($this->_sections['nc']['iteration'] == $this->_sections['nc']['total']);
?>
    <LI><A href="news.php?cid=<?php echo $this->_tpl_vars['sm_newclass'][$this->_sections['nc']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_newclass'][$this->_sections['nc']['index']]['name']; ?>
</A>  </LI>
	<?php endfor; endif; ?>  
</UL></LI>
  <LI><A href="product.php">产品中心</A> 
  <UL>
  <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['sm_procut']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
    <LI><A href="product.php?cid=<?php echo $this->_tpl_vars['sm_procut'][$this->_sections['p']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_procut'][$this->_sections['p']['index']]['name']; ?>
</A>  </LI>
	<?php endfor; endif; ?>  
	
</UL>
</LI>
  <LI><A href="service.php">服务与支持</A> 
  <UL>
<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['sm_ser']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
    <LI><A href="service.php?listid=<?php echo $this->_tpl_vars['sm_ser'][$this->_sections['c']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_ser'][$this->_sections['c']['index']]['title']; ?>
</A>  </LI>
<?php endfor; endif; ?>
</UL></LI>
  <LI><A href="message.php">在线留言</A> 
  <UL>
  </UL>
  </LI>
   <LI><A href="contact.php">联系我们</A> </LI>
  <LI><A href="index.php">公司社区</A> </LI>
  <LI 
  style="WIDTH: 110px; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none"><A 
  href="index.php" target=_blank>网上商城</A> </LI></UL></DIV>
<DIV class="nbanner "><IMG height=247 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/20090915214846.jpg" 
width=966></DIV></DIV>
<DIV class="line clear"></DIV>
<DIV class="ncontent clear">
<?php echo '
<SCRIPT type=text/javascript>
    function test()
    {   
    var keyword = document.getElementById("keyword");
        if(keyword.value==\'请输入关键字\' || keyword.value==\'\'){
            alert(\'请输入关键字\');
            keyword.focus();
            return false;
        }
		else
		{		
        var keyword=document.getElementById("keyword").value;
           var seltype=document.getElementById("seltype").value;
        var url="../Product/Search.aspx?KeyWords="+escape(keyword)+"&stype="+escape(seltype)
        window.open(url)
		}      
     
    } 
    
     function UpSerrch()
        {
            var sk=event.keyCode;
            if(sk==13)
            {   
                  test();
                    // document.getElementById ("IbtnLogin").click(); 
            } 
        }

</SCRIPT>
'; ?>

<DIV class="ncontent_l left">
<DIV class=" ncontent_lt"><A style="COLOR: white; TEXT-DECORATION: none" 
href="about.php">企业介绍</A></DIV>
<DIV class=ncontent_lm>
<UL>

<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['sm_comp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
    <LI><A href="?listid=<?php echo $this->_tpl_vars['sm_comp'][$this->_sections['c']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_comp'][$this->_sections['c']['index']]['title']; ?>
</A>  </LI>
<?php endfor; endif; ?>	

  </UL>
<DIV class=" ncontent_ls ">
<DL>
  <DT>产品搜索 </DT>
  <DD style="MARGIN-TOP: 5px"><SELECT name=seltype> <OPTION value=1 
    selected>产品名称</OPTION> <OPTION value=0>产品型号</OPTION></SELECT> </DD>
  <DD style="MARGIN-TOP: 10px"><A onclick=test(); href="javascript:void();"><IMG 
  class=right height=20 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/about_22.jpg" width=30></A><INPUT 
  class=left size=5 name=keyword> </DD></DL></DIV>
<DIV class="ncontent_lp left"><IMG height=119 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/map_03.jpg" 
width=162></DIV></DIV>
<DIV class=ncontent_lb><IMG height=9 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/k_03.jpg" 
width=209></DIV></DIV>
<DIV class="ncontent_r right">
<DIV class=" ncontent_rt">
<DIV class="ncontent_rtl left"><IMG height=28 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/about_08.jpg" 
width=19></DIV>
<DIV class="ncontent_rtr right"><IMG height=28 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/about_12.jpg" 
width=8></DIV>
<H1 class=left><SPAN class=" left">企业概况</SPAN><SPAN class=right 
style="FONT-WEIGHT: normal"><A class=black 
href="index.php">首页</A> &gt; <A class=black 
href="about.php">企业介绍</A> &gt; <A 
class=black href="?listid=<?php echo $this->_tpl_vars['sm_content']['id']; ?>
"><?php echo $this->_tpl_vars['sm_content']['title']; ?>
</A> 
</SPAN></H1></DIV>
<DIV class=ncontent_rz>
<?php echo $this->_tpl_vars['sm_content']['content']; ?>

</DIV>
<DIV class=ncontent_rb><IMG height=13 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/about_31.jpg" 
width=743></DIV></DIV></DIV>
<?php echo '
<SCRIPT type=text/javascript>
    function tourl(value)
    {
       window.open(value);
    }
</SCRIPT>
'; ?>

<DIV class="copyright clear ">
<DIV class=" copyright_l left"><IMG height=80 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_45.jpg" 
width=20></DIV>
<DIV class=copyright_z>

<?php echo $this->_tpl_vars['sm_config']['copyright']; ?>

</DIV>
<DIV class=" copyright_r right"><IMG height=80 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_50.jpg" 
width=15></DIV></DIV></DIV></FORM></BODY></HTML>