<?php
/* Smarty version 3.1.30, created on 2022-04-11 15:18:15
  from "D:\xampp\htdocs\kalk_kredytowy_role\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_62542a975f36f3_55830673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5be5d760e09806c808782fa9749204e6d9cd8b3a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kalk_kredytowy_role\\app\\views\\templates\\main.tpl',
      1 => 1649629032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62542a975f36f3_55830673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "brak tytulu" : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet"  type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css" />
</head>
<body>
	<div style="margin: 1em;">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143263140062542a975f3255_66459877', 'content');
?>

	</div>
</body>
</html><?php }
/* {block 'content'} */
class Block_143263140062542a975f3255_66459877 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyslna tresc zawartosci .... <?php
}
}
/* {/block 'content'} */
}
