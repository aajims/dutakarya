<?php
/* Smarty version 3.1.29, created on 2017-02-28 05:08:26
  from "/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual_alias_domain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b505ca388d33_43560749',
  'file_dependency' => 
  array (
    '7852a4a49cc55ea69780c49aad9886141e5e011a' => 
    array (
      0 => '/home/sukastu/public_html/paypro.id/postfix/templates/list-virtual_alias_domain.tpl',
      1 => 1443849736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:list.tpl' => 1,
  ),
),false)) {
function content_58b505ca388d33_43560749 ($_smarty_tpl) {
?>


<?php $_smarty_tpl->tpl_vars["table"] = new Smarty_Variable('aliasdomain', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "table", 0);
$_smarty_tpl->tpl_vars["struct"] = new Smarty_Variable($_smarty_tpl->tpl_vars['aliasdomain_data']->value['struct'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "struct", 0);
$_smarty_tpl->tpl_vars["msg"] = new Smarty_Variable($_smarty_tpl->tpl_vars['aliasdomain_data']->value['msg'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "msg", 0);
$_smarty_tpl->tpl_vars["id_field"] = new Smarty_Variable($_smarty_tpl->tpl_vars['msg']->value['id_field'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "id_field", 0);
$_smarty_tpl->tpl_vars["formconf"] = new Smarty_Variable($_smarty_tpl->tpl_vars['aliasdomain_data']->value['formconf'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "formconf", 0);
$_smarty_tpl->tpl_vars["items"] = new Smarty_Variable($_smarty_tpl->tpl_vars['tAliasDomains']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "items", 0);
$_smarty_tpl->tpl_vars["RAW_items"] = new Smarty_Variable($_smarty_tpl->tpl_vars['RAW_tAliasDomains']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "RAW_items", 0);?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
