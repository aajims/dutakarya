<?php
/* Smarty version 3.1.29, created on 2017-02-28 08:59:27
  from "/home/sukastu/public_html/paypro.id/postfix/templates/users_edit-alias.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b53bef68ab93_59540531',
  'file_dependency' => 
  array (
    'beca591e03deb01cb01c738f4dd20636bbc1bfaf' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/users_edit-alias.tpl',
      1 => 1463814724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b53bef68ab93_59540531 ($_smarty_tpl) {
?>
<div id="edit_form">
<form name="alias" method="post" action="">
<input class="flat" type="hidden" name="token" value="<?php echo rawurlencode($_SESSION['PFA_token']);?>
" />
<table>
	<tr>
		<th colspan="3"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pEdit_alias_welcome'];?>
<br /><em><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pEdit_alias_help'];?>
</em></th>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['alias'];?>
:</label></td>
		<td><em><?php echo $_smarty_tpl->tpl_vars['USERID_USERNAME']->value;?>
</em></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="label"><label><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['to'];?>
:</label></td>
		<td><textarea class="flat" rows="4" cols="50" name="fGoto">
<?php
$_from = $_smarty_tpl->tpl_vars['tGotoArray']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_address_0_saved_item = isset($_smarty_tpl->tpl_vars['address']) ? $_smarty_tpl->tpl_vars['address'] : false;
$_smarty_tpl->tpl_vars['address'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['address']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
$__foreach_address_0_saved_local_item = $_smarty_tpl->tpl_vars['address'];
echo $_smarty_tpl->tpl_vars['address']->value;?>

<?php
$_smarty_tpl->tpl_vars['address'] = $__foreach_address_0_saved_local_item;
}
if ($__foreach_address_0_saved_item) {
$_smarty_tpl->tpl_vars['address'] = $__foreach_address_0_saved_item;
}
?>
</textarea>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">
		<input class="flat" type="radio" name="fForward_and_store" value="1"<?php echo $_smarty_tpl->tpl_vars['forward_and_store']->value;?>
/>
		<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pEdit_alias_forward_and_store'];?>
<br />
		<input class="flat" type="radio" name="fForward_and_store" value="0" <?php echo $_smarty_tpl->tpl_vars['forward_only']->value;?>
/>
		<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pEdit_alias_forward_only'];?>

		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['save'];?>
" />
			<input class="button" type="submit" name="fCancel" value="<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['exit'];?>
" />
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
</form>
</div>
<?php }
}
