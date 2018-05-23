<?php
/* Smarty version 3.1.29, created on 2017-02-28 08:59:14
  from "/home/sukastu/public_html/paypro.id/postfix/templates/users_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b53be20b6709_94674252',
  'file_dependency' => 
  array (
    '9d8d54f3122bd4d1038350eddf327196526220ac' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/users_menu.tpl',
      1 => 1375089688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b53be20b6709_94674252 ($_smarty_tpl) {
?>
<div id="menu">
<ul>
	<li><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_main');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pMenu_main'];?>
</a></li>
<?php if ($_smarty_tpl->tpl_vars['CONF']->value['vacation'] === 'YES') {?>
	<li><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_vacation');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMenu_vacation'];?>
</a></li>
<?php }?>
	<li><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_edit_alias');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pUsersMenu_edit_alias'];?>
</a></li>
	<li><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_password');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['change_password'];?>
</a></li>
	<li class="logout"><a target="_top" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'url_user_logout');?>
"><?php echo $_smarty_tpl->tpl_vars['PALANG']->value['pMenu_logout'];?>
</a></li>
</ul>
</div>
<?php }
}
