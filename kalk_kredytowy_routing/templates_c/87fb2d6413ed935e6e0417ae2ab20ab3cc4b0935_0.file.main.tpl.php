<?php
/* Smarty version 3.1.30, created on 2022-04-11 15:22:30
  from "D:\xampp\htdocs\kalk_kredytowy_routing\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_62542b9640f8b2_30083158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87fb2d6413ed935e6e0417ae2ab20ab3cc4b0935' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kalk_kredytowy_routing\\app\\views\\templates\\main.tpl',
      1 => 1649629032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62542b9640f8b2_30083158 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162490062862542b9640f400_31680527', 'content');
?>

	</div>
</body>
</html><?php }
/* {block 'content'} */
class Block_162490062862542b9640f400_31680527 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyslna tresc zawartosci .... <?php
}
}
/* {/block 'content'} */
}
