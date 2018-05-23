<?php
/* Smarty version 3.1.29, created on 2017-02-28 08:59:24
  from "/home/sukastu/public_html/paypro.id/postfix/templates/password.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b53bec2d3f80_75017884',
  'file_dependency' => 
  array (
    '1f6bc40978325909791e70e1592de89378240051' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/password.tpl',
      1 => 1463814724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b53bec2d3f80_75017884 ($_smarty_tpl) {
?>
<div id="edit_form">
<form name="password" method="post" action="">
<input class="flat" type="hidden" name="token" value="<?php echo rawurlencode($_SESSION['PFA_token']);?>
" />
<table>
	<tr>
		<th colspan="3"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pPassword_welcome'];?>
</th>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pPassword_admin'];?>
:</label></td>
		<td><em><?php echo $_smarty_tpl->tpl_vars['SESSID_USERNAME']->value;?>
</em></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pPassword_password_current'];?>
:</label></td>
		<td><input class="flat" type="password" name="fPassword_current" /></td>
		<td class="error_msg"><?php echo $_smarty_tpl->tpl_vars['pPassword_password_current_text']->value;?>
</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pPassword_password'];?>
:</label></td>
		<td><input class="flat" type="password" name="fPassword" /></td>
		<td class="error_msg"><?php echo $_smarty_tpl->tpl_vars['pPassword_password_text']->value;?>
</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pPassword_password2'];?>
:</label></td>
		<td><input class="flat" type="password" name="fPassword2" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label">&nbsp;</td>
		<td>
			<input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['change_password'];?>
" />
			<?php if ($_smarty_tpl->tpl_vars['authentication_has_role']->value['user']) {?>
				<input class="button" type="submit" name="fCancel" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['exit'];?>
" />
			<?php }?>
		<td>&nbsp;</td>
	</tr>
</table>
</form>
</div>
<?php }
}
