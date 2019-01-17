<?php namespace Application\WebSite\Page;


use Application\WebSite\Service\ArticleGMarkParser;
use Entity\User\User;
use Eternity\Response\Responder\SmartPageResponder;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @template "@website/MyPage.twig"
 * @title "MY AWESOME PAGE"
 * @bodyclass "mypage"
 * @js "/dist/www/app.js"
 * @css "/dist/www/app.css"
 */
class MyPage extends SmartPageResponder {

	protected function prepare() {
		$user = User::repository()->pick(1);
		$user->getAttachmentManager('images');
		$this->getDataBag()->set('user', $user);
		$article = ArticleGMarkParser::Service()->parse("! Hello\n\nNew block\n\n!! End of article!");
		$this->getDataBag()->set('article', $article);
		$this->getDataBag()->set('boxcontent', 'Zsilett');
		$this->getDataBag()->set('box', "@website/box.twig");
	}

}