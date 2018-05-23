<?php
/* Smarty version 3.1.29, created on 2017-02-28 05:08:26
  from "/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b505ca35eef4_40533954',
  'file_dependency' => 
  array (
    '1184f3729816c1ef980df02f8b429766b8ee0f35' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual.tpl',
      1 => 1478066500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:list-virtual_alias_domain.tpl' => 1,
    'file:list-virtual_alias.tpl' => 1,
    'file:list-virtual_mailbox.tpl' => 1,
  ),
),false)) {
function content_58b505ca35eef4_40533954 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/function.html_options.php';
$_smarty_tpl->tpl_vars["file"] = new Smarty_Variable($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'url_list_virtual'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "file", 0);?>
<div id="overview">
<form name="frmOverview" method="get" action="<?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'url_list_virtual');?>
">
	<?php echo smarty_function_html_options(array('name'=>'domain','output'=>$_smarty_tpl->tpl_vars['domain_list']->value,'values'=>$_smarty_tpl->tpl_vars['domain_list']->value,'selected'=>$_smarty_tpl->tpl_vars['domain_selected']->value,'onchange'=>"this.form.submit();"),$_smarty_tpl);?>

	<input type="hidden" name="limit" value="0" />
	<noscript><input class="button" type="submit" name="go" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['go'];?>
" /></noscript>
</form>
<?php if (isset($_smarty_tpl->tpl_vars['search']->value['_'])) {?>
	<h4><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pSearch_welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['search']->value['_'];?>
</h4>
<?php } else { ?>
	<h4><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_welcome'];
echo $_smarty_tpl->tpl_vars['fDomain']->value;?>
</h4>
	<p><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['aliases'];?>
: <?php echo $_smarty_tpl->tpl_vars['limit']->value['alias_count'];?>
 / <?php echo $_smarty_tpl->tpl_vars['limit']->value['aliases'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['mailboxes'];?>
: <?php echo $_smarty_tpl->tpl_vars['limit']->value['mailbox_count'];?>
 / <?php echo $_smarty_tpl->tpl_vars['limit']->value['mailboxes'];?>
</p>
<?php }
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'form_search');?>

</div>
<div class='subnav'><p><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['show'];?>

	<?php if (isset($_smarty_tpl->tpl_vars['search']->value['_'])) {?>
		<?php $_smarty_tpl->tpl_vars["searchsuffix"] = new Smarty_Variable("&search[_]=".((string)$_smarty_tpl->tpl_vars['search']->value['_']), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "searchsuffix", 0);?>
	<?php } else { ?>
		<?php $_smarty_tpl->tpl_vars["searchsuffix"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "searchsuffix", 0);?>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'all') {?><span class='active'><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['all'];?>
</span>
	<?php } else { ?><a href="?domain=<?php echo $_GET['domain'];?>
&amp;tab=all<?php echo $_smarty_tpl->tpl_vars['searchsuffix']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['all'];?>
</a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'mailbox') {?><span class='active'><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_mailbox_title'];?>
</span>
	<?php } else { ?><a href="?domain=<?php echo $_GET['domain'];?>
&amp;tab=mailbox<?php echo $_smarty_tpl->tpl_vars['searchsuffix']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_mailbox_title'];?>
</a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alias') {?><span class='active'><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_title'];?>
</span>
	<?php } else { ?><a href="?domain=<?php echo $_GET['domain'];?>
&amp;tab=alias<?php echo $_smarty_tpl->tpl_vars['searchsuffix']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_title'];?>
</a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['boolconf_alias_domain']->value) {?>
		<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alias_domain') {?><span class='active'><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_domain_title'];?>
</span>
		<?php } else { ?><a href="?domain=<?php echo $_GET['domain'];?>
&amp;tab=alias_domain<?php echo $_smarty_tpl->tpl_vars['searchsuffix']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_alias_domain_title'];?>
</a><?php }?>
	<?php }?>
</p></div>
<br clear="all"/><br/>

<?php if ($_smarty_tpl->tpl_vars['boolconf_alias_domain']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alias_domain' || $_smarty_tpl->tpl_vars['tab']->value == 'all') {?>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:list-virtual_alias_domain.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php }
}
if ($_smarty_tpl->tpl_vars['tab']->value == 'all') {?><br /><?php }?>

<?php if ($_smarty_tpl->tpl_vars['tab']->value == 'alias' || $_smarty_tpl->tpl_vars['tab']->value == 'all') {?>
	<?php echo $_smarty_tpl->tpl_vars['nav_bar_alias']->value['top'];?>

	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:list-virtual_alias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo $_smarty_tpl->tpl_vars['nav_bar_alias']->value['bottom'];?>

<?php }
if ($_smarty_tpl->tpl_vars['tab']->value == 'all') {?><br /><?php }
if ($_smarty_tpl->tpl_vars['tab']->value == 'mailbox' || $_smarty_tpl->tpl_vars['tab']->value == 'all') {?>
	<?php echo $_smarty_tpl->tpl_vars['nav_bar_mailbox']->value['top'];?>

	<?php $_smarty_tpl->tpl_vars["colspan"] = new Smarty_Variable(9, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "colspan", 0);?>
	<?php if ($_smarty_tpl->tpl_vars['CONF']->value['vacation_control_admin'] === 'YES') {
$_smarty_tpl->tpl_vars["colspan"] = new Smarty_Variable(((string)$_smarty_tpl->tpl_vars['colspan']->value+1), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "colspan", 0);
}?>
	<?php if ($_smarty_tpl->tpl_vars['CONF']->value['alias_control_admin'] === 'YES') {
$_smarty_tpl->tpl_vars["colspan"] = new Smarty_Variable(((string)$_smarty_tpl->tpl_vars['colspan']->value+1), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "colspan", 0);
}?>
	<table id="mailbox_table">
		<tr>
			<th colspan="<?php echo $_smarty_tpl->tpl_vars['colspan']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_mailbox_title'];?>
</th>
		</tr>
	<?php if ($_smarty_tpl->tpl_vars['tMailbox']->value) {?>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:list-virtual_mailbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php } else { ?></table>
	<?php }?>
	<?php echo $_smarty_tpl->tpl_vars['nav_bar_mailbox']->value['bottom'];?>

	<?php if ($_smarty_tpl->tpl_vars['tCanAddMailbox']->value) {?>
		<br /><a href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_create_mailbox');?>
&amp;domain=<?php echo rawurlencode($_smarty_tpl->tpl_vars['fDomain']->value);?>
" class="button"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['add_mailbox'];?>
</a><br />
	<?php }?>
	<br /><br /><a href="list.php?table=mailbox&amp;output=csv"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['download_csv'];?>
</a>
<?php }
if ($_smarty_tpl->tpl_vars['CONF']->value['show_status'] === 'YES' && $_smarty_tpl->tpl_vars['CONF']->value['show_status_key'] === 'YES') {?>
	<br/><br/>
	<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_undeliverable'] === 'YES') {?>
		&nbsp;<span style='background-color:<?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_undeliverable_color'];?>
;'><?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_status_text'];?>
</span>=<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pStatus_undeliverable'];?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_popimap'] === 'YES') {?>
		&nbsp;<span style='background-color:<?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_popimap_color'];?>
;'><?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_status_text'];?>
</span>=<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pStatus_popimap'];?>

	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['CONF']->value['show_custom_domains']) > 0) {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['CONF']->value['show_custom_domains'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
			&nbsp;<span style='background-color:<?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_custom_colors'][$_smarty_tpl->tpl_vars['i']->value];?>
;'><?php echo $_smarty_tpl->tpl_vars['CONF']->value['show_status_text'];?>
</span>=<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pStatus_custom'];
echo $_smarty_tpl->tpl_vars['item']->value;?>

		<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_item_0_saved_key;
}
?>
	<?php }
}
}
}
