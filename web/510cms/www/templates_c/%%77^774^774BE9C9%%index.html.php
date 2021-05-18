<?php /* Smarty version 2.6.18, created on 2010-04-23 14:53:42
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index.html', 148, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE><?php echo $this->_tpl_vars['sm_config']['webname']; ?>
</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gbk">
<meta name="description" content="<?php echo $this->_tpl_vars['sm_config']['webdes']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['sm_config']['webkw']; ?>
" />
<LINK href="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/style.css" type=text/css rel=stylesheet>
<SCRIPT src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/sohuflash_1.js" type=text/javascript></SCRIPT>
<?php echo '
<SCRIPT type=text/javascript>
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
    function test()
    {
    var keyword = document.getElementById("search");
        if(keyword.value==\'请输入关键字\' || keyword.value==\'\'){
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
                  test();
            }
        }

</SCRIPT>
'; ?>

<META content="MSHTML 6.00.2900.3252" name=GENERATOR></HEAD>
<BODY>
<DIV class=wrap>
<DIV class=" header1">
<DIV class=" header">
<DIV class="logo left"><A href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
"><IMG height=24
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/logo.jpg" width=168></A></DIV>
<DIV class="search right">
<DIV class="search_l left"><INPUT class=search_k name=search><INPUT class=search_s onclick=test(); type=submit name=input value=""> </DIV>
<DIV class="language left"><A href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
/en/">English</A> 　<A
onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
');"
href="<?php echo $this->_tpl_vars['sm_config']['weburl']; ?>
#">设定首页</A> </DIV></DIV></DIV></DIV>
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
	
	</UL>
  </LI>
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
 </UL>
  </LI>
  
  <LI><A href="message.php">在线留言</A>
  <UL>
  </UL>
  </LI>
   <LI><A href="contact.php">联系我们</A> </LI>
  <LI><A href="index.php">公司社区</A> </LI>
  <LI 
  style="WIDTH: 110px; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none"><A 
  href="index.php" target=_blank>网上商城</A> </LI></UL></DIV>
<DIV class=banner>
<DIV id=flashcontent01></DIV>
<SCRIPT type=text/javascript>
					var speed = 4000;
					var pics='<?php echo $this->_tpl_vars['xm_dir']; ?>
img/01.jpg|<?php echo $this->_tpl_vars['xm_dir']; ?>
img/02.jpg|<?php echo $this->_tpl_vars['xm_dir']; ?>
img/03.jpg|<?php echo $this->_tpl_vars['xm_dir']; ?>
img/04.jpg';
					var mylinks='||||';
					var texts='||||';
					var sohuFlash2 = new sohuFlash("<?php echo $this->_tpl_vars['xm_dir']; ?>
focus0414a.swf","flashcontent01","966","353","8","#ffffff");



sohuFlash2.addParam("quality", "medium");

sohuFlash2.addParam("wmode", "opaque");						sohuFlash2.addVariable("speed",speed);
						sohuFlash2.addVariable("p",pics);
						sohuFlash2.addVariable("l",mylinks);
						sohuFlash2.addVariable("icon",texts);
						sohuFlash2.write("flashcontent01");
					</SCRIPT>
</DIV></DIV>
<DIV class="line clear"></DIV>
<DIV class="content clear">
<DIV class="content_r right">
<DIV class=" content_rt"><IMG height=37 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_32.jpg"
width=283 useMap=#Map border=0> <MAP id=Map name=Map><AREA shape=RECT
  target=_self coords=224,10,279,26
href="http://www.giec.cn/News/index.aspx"></MAP></DIV>
<DIV class=content_rz>
<UL>
  <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['sm_news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
  <LI><A
  href="news.php?newsid=<?php echo $this->_tpl_vars['sm_news'][$this->_sections['n']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sm_news'][$this->_sections['n']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : smarty_modifier_truncate($_tmp, 40, "...")); ?>
</A>
  </LI>
  <?php endfor; endif; ?>
  
  </UL></DIV>
<DIV class=content_rb><IMG height=9 src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/news_57.jpg"
width=283></DIV>
<DIV class=shop><A href="http://www.giec.cn/#"><IMG height=68
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_40.jpg" width=260></A></DIV></DIV>
<DIV class="content_lt left"><IMG height=31
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_30.jpg" width=669></DIV>
<DIV class=content_lz
style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 12px">

<?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['sm_procid']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<DL>
  <DT><A href="product.php?cidid=<?php echo $this->_tpl_vars['sm_procid'][$this->_sections['l']['index']]['id']; ?>
"><IMG
  src="<?php echo $this->_tpl_vars['sm_procid'][$this->_sections['l']['index']]['cidpic']; ?>
"></A> </DT>
  <DD><SPAN><?php echo $this->_tpl_vars['sm_procid'][$this->_sections['l']['index']]['name']; ?>
</SPAN><BR>
  </DD><?php echo $this->_tpl_vars['sm_procid'][$this->_sections['l']['index']]['remark']; ?>
</DL>
<?php endfor; endif; ?>
</DIV>
<DIV class="content_lb left"><IMG height=9
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_42.jpg" width=669></DIV>
<DIV class="copyright clear ">
<DIV class=" copyright_l left"><IMG height=80
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_45.jpg" width=20></DIV>
<DIV class=copyright_z>
<?php echo $this->_tpl_vars['sm_config']['copyright']; ?>

</DIV>
<DIV class=" copyright_r right"><IMG height=80
src="<?php echo $this->_tpl_vars['xm_dir']; ?>
img/content_50.jpg"
width=15></DIV></DIV></DIV></DIV></BODY></HTML>