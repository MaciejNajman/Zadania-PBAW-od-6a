<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyslny"}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>
<body>

<div class="header">
	<h1>{$page_title|default:"Tytul domyslny"}</h1>
	<h2>{$page_header|default:"Tytul domyslny"}</h1>
	<p>
		{$page_description|default:"Opis domyslny"}
	</p>
</div>

<div class="content">
{block name=content} Domyslna tresc zawartosci .... {/block}
</div><!-- content -->

<div class="footer">
	<p>
{block name=footer} Domyslna tresc stopki .... {/block}
	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. (autor przykładu: Maciej Najman)
	</p>
</div>

</body>
</html>