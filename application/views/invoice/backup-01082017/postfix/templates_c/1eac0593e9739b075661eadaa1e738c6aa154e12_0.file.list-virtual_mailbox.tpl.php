<?php
/* Smarty version 3.1.29, created on 2017-02-28 05:08:26
  from "/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual_mailbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b505ca4cb6c7_82844171',
  'file_dependency' => 
  array (
    '1eac0593e9739b075661eadaa1e738c6aa154e12' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual_mailbox.tpl',
      1 => 1428367644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b505ca4cb6c7_82844171 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/sukastu/public_html/paypro.id/postfix/smarty/libs/plugins/modifier.replace.php';
if (isset($_smarty_tpl->tpl_vars['search']->value['_'])) {?>
    <?php $_smarty_tpl->tpl_vars["search"] = new Smarty_Variable($_smarty_tpl->tpl_vars['search']->value['_'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "search", 0);
} else { ?>
    <?php $_smarty_tpl->tpl_vars["search"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "search", 0);
}?>

	<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tr_header');?>

		<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_status'] === 'YES') {?><td></td><?php }?>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_mailbox_username'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['display_mailbox_aliases']->value == true) {?>
			<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['to'];?>
</td>
		<?php }?>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['name'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['CONF']->value['quota'] === 'YES') {?><td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_mailbox_quota'];?>
</td><?php }?>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['last_modified'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['active'];?>
</td>
		<?php $_smarty_tpl->tpl_vars["colspan"] = new Smarty_Variable(((string)$_smarty_tpl->tpl_vars['colspan']->value-6), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "colspan", 0);?>
		<td colspan="<?php echo $_smarty_tpl->tpl_vars['colspan']->value;?>
">&nbsp;</td>
	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['tMailbox']->value;
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
		<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tr_hilightoff');?>

			<?php if ($_smarty_tpl->tpl_vars['CONF']->value['show_status'] === 'YES') {?>
				<td><?php echo $_smarty_tpl->tpl_vars['gen_show_status_mailbox']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</td>
			<?php }?>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['search']->value == '') {?>
					<?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>

				<?php } else { ?>
					<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['username'],$_smarty_tpl->tpl_vars['search']->value,"<span class='searchresult'>".((string)$_smarty_tpl->tpl_vars['search']->value)."</span>");?>

				<?php }?>
			</td>
			<?php if ($_smarty_tpl->tpl_vars['display_mailbox_aliases']->value == true) {?>
				<td>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['goto_mailbox'] == 1) {?>
					Mailbox<br/>
				<?php } else { ?>
					Forward only<br/>
				<?php }?>
				<?php
$_from = $_smarty_tpl->tpl_vars['item']->value['goto_other'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item2_1_saved_item = isset($_smarty_tpl->tpl_vars['item2']) ? $_smarty_tpl->tpl_vars['item2'] : false;
$__foreach_item2_1_saved_key = isset($_smarty_tpl->tpl_vars['j']) ? $_smarty_tpl->tpl_vars['j'] : false;
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$__foreach_item2_1_saved_local_item = $_smarty_tpl->tpl_vars['item2'];
?>
					<?php if ($_smarty_tpl->tpl_vars['search']->value == '') {?>
						<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>

					<?php } else { ?>
						<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item2']->value,$_smarty_tpl->tpl_vars['search']->value,"<span class='searchresult'>".((string)$_smarty_tpl->tpl_vars['search']->value)."</span>");?>

					<?php }?>
					<br/>
				<?php
$_smarty_tpl->tpl_vars['item2'] = $__foreach_item2_1_saved_local_item;
}
if ($__foreach_item2_1_saved_item) {
$_smarty_tpl->tpl_vars['item2'] = $__foreach_item2_1_saved_item;
}
if ($__foreach_item2_1_saved_key) {
$_smarty_tpl->tpl_vars['j'] = $__foreach_item2_1_saved_key;
}
?>
				</td>
			<?php }?>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['CONF']->value['quota'] === 'YES') {?>
				<td>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['quota'] == 0) {?>
					<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_unlimited'];?>

				<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['quota'] < 0) {?>
					<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pOverview_disabled'];?>

				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['boolconf_used_quotas']->value) {?>

						
						<?php if ($_smarty_tpl->tpl_vars['divide_quota']->value['quota_width'][$_smarty_tpl->tpl_vars['i']->value] > 90) {?>
							<?php $_smarty_tpl->tpl_vars["quota_level"] = new Smarty_Variable("high", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "quota_level", 0);?>
						<?php } elseif ($_smarty_tpl->tpl_vars['divide_quota']->value['quota_width'][$_smarty_tpl->tpl_vars['i']->value] > 55) {?>
							<?php $_smarty_tpl->tpl_vars["quota_level"] = new Smarty_Variable("mid", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "quota_level", 0);?>
						<?php } else { ?> 
							<?php $_smarty_tpl->tpl_vars["quota_level"] = new Smarty_Variable("low", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "quota_level", 0);?>
						<?php }?>
						<div class="quota quota_<?php echo $_smarty_tpl->tpl_vars['quota_level']->value;?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['divide_quota']->value['quota_width'][$_smarty_tpl->tpl_vars['i']->value];?>
px;"></div>
						<div class="quota_bg"></div></div>
						<div class="quota_text quota_text_<?php echo $_smarty_tpl->tpl_vars['quota_level']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['divide_quota']->value['current'][$_smarty_tpl->tpl_vars['i']->value];?>
 / <?php echo $_smarty_tpl->tpl_vars['divide_quota']->value['quota'][$_smarty_tpl->tpl_vars['i']->value];?>
</div>
					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['divide_quota']->value['quota'][$_smarty_tpl->tpl_vars['i']->value];?>

					<?php }?>
				<?php }?>
				</td>
			<?php }?>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modified'];?>
</td>
			<td><a href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_editactive');?>
mailbox&amp;id=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['username']);?>
&amp;active=<?php if (($_smarty_tpl->tpl_vars['item']->value['active'] == 0)) {?>1<?php } else { ?>0<?php }?>&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"
				><?php if ($_smarty_tpl->tpl_vars['item']->value['active'] == 1) {
echo $_smarty_tpl->tpl_vars['PALANG']->value['YES'];
} else {
echo $_smarty_tpl->tpl_vars['PALANG']->value['NO'];
}?></a></td>
			<?php if ($_smarty_tpl->tpl_vars['CONF']->value['vacation_control_admin'] === 'YES' && $_smarty_tpl->tpl_vars['CONF']->value['vacation'] === 'YES') {?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['v_active'] !== -1) {?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['v_active'] == 1) {?>
						<?php $_smarty_tpl->tpl_vars["v_active"] = new Smarty_Variable($_smarty_tpl->tpl_vars['PALANG']->value['pOverview_vacation_edit'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "v_active", 0);?>
					<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars["v_active"] = new Smarty_Variable($_smarty_tpl->tpl_vars['PALANG']->value['pOverview_vacation_option'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "v_active", 0);?>
					<?php }?>
					<td><a href="vacation.php?username=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['username']);?>
"><?php echo $_smarty_tpl->tpl_vars['v_active']->value;?>
</a></td>
				<?php }?>
			<?php } else { ?>
					<td>&nbsp;</td>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars["edit_aliases"] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "edit_aliases", 0);?>
			<?php if ($_smarty_tpl->tpl_vars['authentication_has_role']->value['global_admin'] !== true && $_smarty_tpl->tpl_vars['CONF']->value['alias_control_admin'] === 'YES') {
$_smarty_tpl->tpl_vars["edit_aliases"] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "edit_aliases", 0);
}?>
			<?php if ($_smarty_tpl->tpl_vars['authentication_has_role']->value['global_admin'] == true && $_smarty_tpl->tpl_vars['CONF']->value['alias_control'] === 'YES') {
$_smarty_tpl->tpl_vars["edit_aliases"] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "edit_aliases", 0);
}?>
			<?php if ($_smarty_tpl->tpl_vars['edit_aliases']->value == 1) {?>
				<td><a href="edit.php?table=alias&amp;edit=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['username']);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['alias'];?>
</a></td>
			<?php }?>
			<td><a href="edit.php?table=mailbox&amp;edit=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['username']);?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['edit'];?>
</a></td>
			<td><a href="delete.php?table=mailbox&amp;delete=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['username']);?>
&amp;token=<?php echo rawurlencode($_SESSION['PFA_token']);?>
"
				onclick="return confirm ('<?php echo $_smarty_tpl->tpl_vars['PALANG']->value['confirm'];
echo $_smarty_tpl->tpl_vars['PALANG']->value['mailboxes'];?>
: <?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
');"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['del'];?>
</a></td>
		</tr>
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
</table>
<?php }
}
