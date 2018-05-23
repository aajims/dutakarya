<?php
/* Smarty version 3.1.29, created on 2017-02-28 08:59:14
  from "/home/sukastu/public_html/paypro.id/postfix/templates/users_main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b53be20d8404_57010117',
  'file_dependency' => 
  array (
    '6f65fed22b7c37d639620be367fec890985e462a' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/users_main.tpl',
      1 => 1384170210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b53be20d8404_57010117 ($_smarty_tpl) {
?>
<div id="main_menu">
<table>
<?php if ($_smarty_tpl->tpl_vars['CONF']->value['vacation'] === 'YES') {?>
	<tr>
		<td nowrap="nowrap"><a target="_top" href="vacation.php"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMenu_vacation'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['tummVacationtext']->value;?>
</td>
	</tr>
<?php }?>
	<tr>
		<td nowrap="nowrap"><a target="_top" href="edit-alias.php"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMenu_edit_alias'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMain_edit_alias'];?>
</td>
	</tr>
	<tr>
		<td nowrap="nowrap"><a target="_top" href="password.php"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['change_password'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMain_password'];?>
</td>
	</tr>
	<tr>
		<td nowrap="nowrap"><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_logout');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pMenu_logout'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pMain_logout'];?>
</td>
	</tr>
</table>
</div>
<?php }
}
