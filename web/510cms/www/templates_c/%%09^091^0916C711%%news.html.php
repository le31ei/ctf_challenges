<?php /* Smarty version 2.6.18, created on 2010-04-23 14:53:47
         compiled from news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news.html', 273, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD 
id=Head1><TITLE><?php echo $this->_tpl_vars['sm_config']['webname']; ?>
</TITLE>
<meta name="description" content="<?php echo $this->_tpl_vars['sm_config']['webdes']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['sm_config']['webkw']; ?>
" />
<LINK href="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/style.css" type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=gbk">
<META content="MSHTML 6.00.2900.3252" name=GENERATOR></HEAD>
<BODY>
<?php echo '
<DIV class=wrap>
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
function hideAll() { 
  for(i=0;i<odiv.length;i++) { 
    odiv[i].style.display="none"; 
  } 
}  
function showObj(num,yn,mid)  
{ 

//alert(num)
if(num==0)
{
   // window.open(\'default.aspx\')
 window.location.href=\'news.php?cid=\'+mid;

 }
 else
 {    
     //window.open(\'default.aspx?listid=\'+mid)
      window.location.href=\'news.php?cid=\'+mid;
    
 }
 
  if (odiv[num].style.display=="none"&&yn=="0")  
  {  
 // alert(yn); 
    hideAll();
    odiv[num].style.display="block";
 
  } 
  else { 

    odiv[num].style.display="none"; 
  } 
    
} 
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
href="http://www.giec.cn/news/index.aspx#">English</A>&nbsp;&nbsp;&nbsp;<A 
onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.giec.cn');" 
href="http://www.giec.cn/news/index.aspx#">设定首页</A> </DIV></DIV></DIV></DIV>
<DIV class=head id=nav>
<DIV class=nav>
<UL>
  <LI><A href="index.php">首　页 </A></LI>
  <LI><A href="about.php">企业介绍</A> 
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
  <LI class=qq><A href="news.php">新闻中心</A> 
  <UL>
  <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['sm_newsc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
    <LI><A href="?cid=<?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['name']; ?>
</A></LI>
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
img/20090915214934.jpg" 
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
href="news.php">新闻中心 </A></DIV>
<DIV class=ncontent_lm>

<UL>

<?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['sm_newsc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
<LI onClick="showObj(<?php echo $this->_sections['l']['index']; ?>
,0,'<?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id']; ?>
')"><A 
  href="news.php?cid=<?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['name']; ?>
</A> 
<?php if ($this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id'] == $this->_tpl_vars['sm_ncid']): ?>
<UL id=odiv style="DISPLAY: block">
<?php else: ?>
<UL id=odiv style="DISPLAY: none">
<?php endif; ?>

<?php unset($this->_sections['son']);
$this->_sections['son']['name'] = 'son';
$this->_sections['son']['loop'] = is_array($_loop=$this->_tpl_vars['sm_newsson']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['son']['show'] = true;
$this->_sections['son']['max'] = $this->_sections['son']['loop'];
$this->_sections['son']['step'] = 1;
$this->_sections['son']['start'] = $this->_sections['son']['step'] > 0 ? 0 : $this->_sections['son']['loop']-1;
if ($this->_sections['son']['show']) {
    $this->_sections['son']['total'] = $this->_sections['son']['loop'];
    if ($this->_sections['son']['total'] == 0)
        $this->_sections['son']['show'] = false;
} else
    $this->_sections['son']['total'] = 0;
if ($this->_sections['son']['show']):

            for ($this->_sections['son']['index'] = $this->_sections['son']['start'], $this->_sections['son']['iteration'] = 1;
                 $this->_sections['son']['iteration'] <= $this->_sections['son']['total'];
                 $this->_sections['son']['index'] += $this->_sections['son']['step'], $this->_sections['son']['iteration']++):
$this->_sections['son']['rownum'] = $this->_sections['son']['iteration'];
$this->_sections['son']['index_prev'] = $this->_sections['son']['index'] - $this->_sections['son']['step'];
$this->_sections['son']['index_next'] = $this->_sections['son']['index'] + $this->_sections['son']['step'];
$this->_sections['son']['first']      = ($this->_sections['son']['iteration'] == 1);
$this->_sections['son']['last']       = ($this->_sections['son']['iteration'] == $this->_sections['son']['total']);
?>
<?php if ($this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id'] == $this->_tpl_vars['sm_newsson'][$this->_sections['son']['index']]['f_id']): ?>
    <LI><A title=<?php echo $this->_tpl_vars['sm_newsson'][$this->_sections['son']['index']]['name']; ?>
 
    href="?cid=<?php echo $this->_tpl_vars['sm_newsc'][$this->_sections['l']['index']]['id']; ?>
&amp;listid=<?php echo $this->_tpl_vars['sm_newsson'][$this->_sections['son']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_newsson'][$this->_sections['son']['index']]['name']; ?>
</A> 
    </LI>
<?php endif; ?>
<?php endfor; endif; ?>
	</UL>
</LI>
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
width=8> </DIV>
<H1 class=left><SPAN class=" left">公司动态</SPAN><SPAN class=right 
style="FONT-WEIGHT: normal"><A class=black 
href="index.php">首页</A> &gt; <A class=black 
href="news.php">新闻中心 </A>
<?php echo $this->_tpl_vars['new_nav']; ?>
 


</SPAN></H1></DIV>
<DIV class=ncontent_rz>
<?php if ($this->_tpl_vars['newstid'] == ""): ?>
<TABLE height=437 cellSpacing=0 cellPadding=0 border=0>
  <TBODY>
  <TR>
    <TD vAlign=top>
      <UL>
	  <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['sm_newslist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
        <LI><A 
        href="?cid=<?php echo $this->_tpl_vars['sm_ncid']; ?>
&amp;listid=<?php echo $this->_tpl_vars['sm_listid']; ?>
&amp;newsid=<?php echo $this->_tpl_vars['sm_newslist'][$this->_sections['l']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_newslist'][$this->_sections['l']['index']]['title']; ?>
</A> 
        <SPAN><?php echo $this->_tpl_vars['sm_newslist'][$this->_sections['l']['index']]['date_time']; ?>
</SPAN> </LI>
       <?php endfor; endif; ?> 
     </UL>
      <DIV class=pages id=NewsList1_divDemo>
	  <?php echo $this->_tpl_vars['pagenav']; ?>

      </DIV></TD></TR></TBODY></TABLE>
	   
<?php elseif ($this->_tpl_vars['newstid'] == 'err'): ?>
对不起！你要查看的文章不存在！

<?php else: ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td valign="top">
                <h3><?php echo $this->_tpl_vars['sm_rowtitle']['title']; ?>
</h3>
    <h4>责任编辑：<span id="lblCickNum"><?php echo $this->_tpl_vars['sm_rowtitle']['author']; ?>
&nbsp;&nbsp;&nbsp;</span>发布日期：<span id="lblDate"><?php echo ((is_array($_tmp=$this->_tpl_vars['sm_rowtitle']['date_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>  </h4>
    <h2>
 <?php echo $this->_tpl_vars['sm_rowcontent']['content']; ?>

   
    <p align="center"><a href="javascript:history.back();">返回</a></p>
    </h2>  　
            </td>
        </tr>
    </table>
<?php endif; ?> 
	  </DIV>
<DIV class="ncontent_rb clear"><IMG height=13 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
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