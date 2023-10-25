<?php

use Latte\Runtime as LR;

/** source: D:\Programy\xampp\htdocs\nette\testovani-nette\app\Presenters/templates/Result/default.latte */
final class Templatec8f87626c5 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '	<div id="container">
		<table>
			<tr>
				<td class="info">Název subjektu:</td>
				<th colspan="2" class="info">';
		echo LR\Filters::escapeHtmlText($info['name']) /* line 6 */;
		echo '</th>
			</tr>
			<tr>
				<td class="info">Sídlo firmy:</td>
				<td colspan="2" class="info">';
		echo LR\Filters::escapeHtmlText($info['address']) /* line 10 */;
		echo ' ';
		echo LR\Filters::escapeHtmlText($info['address_number']) /* line 10 */;
		echo ', ';
		echo LR\Filters::escapeHtmlText($info['address_city']) /* line 10 */;
		echo ' ';
		echo LR\Filters::escapeHtmlText($info['address_city_number']) /* line 10 */;
		echo '</td>
			</tr>
			<tr>
				<td class="info">Identifikační číslo (IČO):</td>
				<td colspan="2" class="info">';
		echo LR\Filters::escapeHtmlText($info['ico']) /* line 14 */;
		echo '</td>
			</tr>
			<tr>
				<td class="info">Daňové identifikační číslo (DIČ):</td>
				<td class="info">';
		echo LR\Filters::escapeHtmlText($info['dic']) /* line 18 */;
		echo '</td>
			</tr>
		</table>
	</div>
	<div id="back_btn" colspan="2">
		<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:'));
		echo '" id="back_text">&#8592; Zpět</a>
	</div>
	<style>
		table {
			padding: 60px 0;
		}
		td, th {
			padding: 0 40px;
			font-size: 25px;
		}
	</style>
';
	}
}
