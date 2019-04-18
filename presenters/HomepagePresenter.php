<?php

declare(strict_types=1);

namespace App2h\FrontModule\Presenters;


final class HomepagePresenter extends BasePresenter
{
	public function renderDefault(): void
	{
		$this->template->anyVariable = 'any value';
	}
}
