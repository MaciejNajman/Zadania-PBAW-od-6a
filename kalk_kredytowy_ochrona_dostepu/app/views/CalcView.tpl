{extends file="main.tpl"}
{* przy zdefiniowanych folderach nie trzeba ju¿ podawaæ pe³nej œcie¿ki *}

<!-- {block name=footer}stopka dla kalkulatora kredytowego{/block} -->

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">uzytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<div class="pure-control-group">
			<label for="kwota">Kwota:</label>
			<input id="kwota" type="text" placeholder="Kwota" name="kwota" value="{$form->kwota}" />
		</div>
		{if $form->kwota > 1000 && $user->role == "user"}
		<p><b>Tylko admin moze uzywac kalkulatora dla kwot powyzej 1000 !</b></p>
		{/if}
		<div class="pure-control-group">
			<label for="ile_lat">Czas splaty w latach:</label>
			<input id="ile_lat" type="text" placeholder="Czas splaty" name="ile_lat" value="{$form->ile_lat}" />
		</div>
		<div class="pure-control-group">
			<label for="opr">Oprocentowanie:</label>
			<input id="opr" type="text" placeholder="Oprocentowanie" name="opr" value="{$form->opr}" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
		</div>
	</fieldset>
</form>

{if $user->role == "admin" || $form->kwota <= 1000 && $user->role == "user" }

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages inf">
	Miesieczna rata: {$res->result}
</div>
{/if}
{/if}

{/block}