<?php

use Latte\Runtime as LR;

/** source: D:\Programy\xampp\htdocs\nette\testovani-nette\app\Presenters/templates/Home/default.latte */
final class Template5645f5a7b0 extends Latte\Runtime\Template
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
';
		$form = $this->global->formsStack[] = $this->global->uiControl['searchForm'] /* line 3 */;
		echo '		<form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), [], false) /* line 3 */;
		echo '>
			<input id="ico"';
		echo ($ʟ_input = Nette\Bridges\FormsLatte\Runtime::item('id', $this->global))->getControlPart()->addAttributes(['id' => null, 'onkeydown' => null])->attributes() /* line 4 */;
		echo ' onkeydown="return event.key !== \'+\' && event.key !== \'-\' && event.key !== \',\' && event.key !== \'.\' && event.key !== \'e\' && event.key !== \'E\'"><br>
			<input id="sub_btn"';
		echo ($ʟ_input = Nette\Bridges\FormsLatte\Runtime::item('submit', $this->global))->getControlPart()->addAttributes(['id' => null])->attributes() /* line 5 */;
		echo '>
		';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 3 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
		echo '	</div>
';
	}
}
