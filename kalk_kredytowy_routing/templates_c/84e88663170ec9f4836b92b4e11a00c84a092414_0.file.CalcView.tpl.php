<?php
/* Smarty version 3.1.30, created on 2022-04-11 11:33:04
  from "D:\xampp\htdocs\kalk_kredytowy_ochrona_dostepu\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6253f5d0036ca9_66461993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84e88663170ec9f4836b92b4e11a00c84a092414' => 
    array (
      0 => 'D:\\xampp\\htdocs\\kalk_kredytowy_ochrona_dostepu\\app\\views\\CalcView.tpl',
      1 => 1649669578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6253f5d0036ca9_66461993 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<!-- <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10955579716253f5d002ae18_04662976', 'footer');
?>
 -->

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1870046706253f5d00367d8_64322178', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_10955579716253f5d002ae18_04662976 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
stopka dla kalkulatora kredytowego<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1870046706253f5d00367d8_64322178 extends Smarty_Internal_Block
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
		<p><b>Tylko admin moze uzywac kalkulatora dla kwot powyzej 1000</b></p>
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
<div class="messages inf">
	Miesieczna rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }
}?>

<?php
}
}
/* {/block 'content'} */
}
