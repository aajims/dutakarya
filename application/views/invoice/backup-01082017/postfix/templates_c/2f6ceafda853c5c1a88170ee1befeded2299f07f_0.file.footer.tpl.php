<?php
/* Smarty version 3.1.29, created on 2017-02-28 05:02:56
  from "/home/sukastu/public_html/paypro.id/postfix/templates/footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b50480739cf0_39890497',
  'file_dependency' => 
  array (
    '2f6ceafda853c5c1a88170ee1befeded2299f07f' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/footer.tpl',
      1 => 1388903520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b50480739cf0_39890497 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/modifier.replace.php';
?>
<!-- <?php echo basename($_smarty_tpl->source->filepath);?>
 -->
<div id="footer">
	<a target="_blank" href="http://postfixadmin.sf.net/">Postfix Admin <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</a>
	&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	<a target="_blank" href="http://postfixadmin.sf.net/update-check.php?version=<?php echo rawurlencode($_smarty_tpl->tpl_vars['version']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['check_update'];?>
</a>
    <?php if (isset($_SESSION['sessid'])) {?>
        <?php if ($_SESSION['sessid']['username']) {?>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;	
            <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['PALANG']->value['pFooter_logged_as'],"%s",$_SESSION['sessid']['username']);?>

        <?php }?>
    <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_footer_text'] == 'YES' && $_smarty_tpl->tpl_vars['CONF']->value['footer_link']) {?>
		&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['CONF']->value['footer_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['CONF']->value['footer_text'];?>
</a>
	<?php }?>
</div>
</div>
</body>
</html>
<?php }
}
