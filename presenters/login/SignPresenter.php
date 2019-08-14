<?php

declare(strict_types=1);

namespace App2h\FrontModule\Presenters;

use App2h\CoreModule\Forms;
use Nette\Application\UI\Form;


final class SignPresenter extends BasePresenter
{


	/** @persistent */
	public $backlink = '';

	/** @var Forms\SignInFormFactory */
	private $signInFactory;

	/** @var Forms\SignUpFormFactory */
	private $signUpFactory;


	public function __construct(Forms\SignInFormFactory $signInFactory, Forms\SignUpFormFactory $signUpFactory)
	{
		$this->signInFactory = $signInFactory;
		$this->signUpFactory = $signUpFactory;
	}


	/**
	 * Sign-in form factory.
	 */
	protected function createComponentSignInForm(): Form
	{
		return $this->signInFactory->create(function (): void{
			$this->restoreRequest($this->backlink);
			$this->redirect(':Admin:Dashboard:');
		});
	}


	/**
	 * Sign-up form factory.
	 */
	protected function createComponentSignUpForm(): Form
	{
		return $this->signUpFactory->create(function (): void{
			$this->redirect(':Front:Homepage:');
		});
	}


	public function actionOut(): void
	{
		$this->getUser()->logout();
		$this->redirect(':Front:Homepage:');
	}
}
