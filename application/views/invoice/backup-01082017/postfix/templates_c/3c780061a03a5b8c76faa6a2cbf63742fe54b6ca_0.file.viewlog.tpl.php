<?php
/* Smarty version 3.1.29, created on 2017-02-28 05:39:23
  from "/home/sukastu/public_html/paypro.id/postfix/templates/viewlog.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b50d0baf62a6_55350793',
  'file_dependency' => 
  array (
    '3c780061a03a5b8c76faa6a2cbf63742fe54b6ca' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/viewlog.tpl',
      1 => 1449485864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b50d0baf62a6_55350793 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_truncate')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/modifier.replace.php';
?>
<div id="overview">
<form name="frmOverview" method="post" action="">
	<?php echo smarty_function_html_options(array('name'=>'fDomain','output'=>$_smarty_tpl->tpl_vars['domain_list']->value,'values'=>$_smarty_tpl->tpl_vars['domain_list']->value,'selected'=>$_smarty_tpl->tpl_vars['domain_selected']->value,'onchange'=>"this.form.submit();"),$_smarty_tpl);?>

	<noscript><input class="button" type="submit" name="go" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['go'];?>
" /></noscript>
</form>
</div>
<?php if ($_smarty_tpl->tpl_vars['tLog']->value) {?>
<table id="log_table">
	<tr>
		<th colspan="5"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['fDomain']->value;?>
</th>
	</tr>
	<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tr_header');?>

		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_timestamp'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['admin'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['domain'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_action'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_data'];?>
</td>
	</tr>
	<?php $_smarty_tpl->tpl_vars["PALANG_pViewlog_data"] = new Smarty_Variable($_smarty_tpl->tpl_vars['PALANG']->value['pViewlog_data'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "PALANG_pViewlog_data", 0);?>

	<?php
$_from = $_smarty_tpl->tpl_vars['tLog']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
		<?php $_smarty_tpl->tpl_vars['log_data'] = new Smarty_Variable(smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['data'],35,"...",true), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'log_data', 0);?>
		<?php $_smarty_tpl->tpl_vars['item_data'] = new Smarty_Variable($_smarty_tpl->tpl_vars['item']->value['data'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'item_data', 0);?>
		<?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'tr_hilightoff'),'>'," style=\"cursor:pointer;\" onclick=\"alert('".((string)$_smarty_tpl->tpl_vars['PALANG_pViewlog_data']->value)." = ".((string)$_smarty_tpl->tpl_vars['item_data']->value)."')\">");?>

		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['timestamp'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['domain'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</td>
		<td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['log_data']->value;?>
</td>
		</tr>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
</table>
<?php }
}
}
