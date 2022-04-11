<?php
/* Smarty version 3.1.30, created on 2022-04-11 16:27:03
  from "D:\xampp\htdocs\kalk_kredytowy_routing\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_62543ab7d57a68_06998569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74fb575696b3009d537be45a511f24a822ae5423' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kalk_kredytowy_routing\\app\\views\\CalcView.tpl',
      1 => 1649683441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_62543ab7d57a68_06998569 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210901465962543ab7d57439_70141666', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_210901465962543ab7d57439_70141666 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">uzytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<div class="pure-control-group">
			<label for="kwota">Kwota:</label>
			<input id="kwota" type="text" placeholder="Kwota" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
" />
		</div>
		<?php if ($_smarty_tpl->tpl_vars['form']->value->kwota > 1000 && $_smarty_tpl->tpl_vars['user']->value->role == "user") {?>
		<p><b>Tylko admin moze uzywac kalkulatora dla kwot powyzej 1000 !</b></p>
		<?php }?>
		<div class="pure-control-group">
			<label for="ile_lat">Czas splaty w latach:</label>
			<input id="ile_lat" type="text" placeholder="Czas splaty" name="ile_lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ile_lat;?>
" />
		</div>
		<div class="pure-control-group">
			<label for="opr">Oprocentowanie:</label>
			<input id="opr" type="text" placeholder="Oprocentowanie" name="opr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->opr;?>
" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
		</div>
	</fieldset>
</form>

<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin" || $_smarty_tpl->tpl_vars['form']->value->kwota <= 1000 && $_smarty_tpl->tpl_vars['user']->value->role == "user") {?>

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
<div class="messages info">
	Miesieczna rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }
}?>

<?php
}
}
/* {/block 'content'} */
}
