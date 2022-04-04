{extends file="main.tpl"}
{* przy zdefiniowanych folderach nie trzeba ju¿ podawaæ pe³nej œcie¿ki *}

{block name=footer}stopka dla kalkulatora kredytowego{/block}

{block name=content}

<h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
	<fieldset>
		
		<label for="kwota">Kwota:</label>
		<input id="kwota" type="text" placeholder="kwota" name="kwota" value="{$form->kwota}">
		
		<label for="ile_lat">Czas splaty w latach:</label>
		<input id="ile_lat" type="text" placeholder="czas splaty" name="ile_lat" value="{$form->ile_lat}">
			
		<label for="opr">Oprocentowanie:</label>
		<input id="opr" type="text" placeholder="oprocentowanie" name="opr" value="{$form->opr}">
		
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<!-- <div class="l-box-lrg pure-u-1 pure-u-med-3-5"> -->
<div class="messages">

{* wyœwieltenie listy b³êdów, jeœli istniej¹ *}
{if $msgs->isError()}
	<h4>Wystapily bledy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyœwieltenie listy informacji, jeœli istniej¹ *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Miesieczna rata</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>

{/block}