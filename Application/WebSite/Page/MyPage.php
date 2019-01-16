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
		echo $user->images->first->url;
		$user->save();

		$this->getDataBag()->set('user', $user);

		$articleString = <<<EOT
		
! Hello


ez itt egy új sor


!! vééége
EOT;

		$article = ArticleGMarkParser::Service()->parse($articleString);


		$this->getDataBag()->set('article', $article);


		dump(' én is futok');

		parent::prepare();
		$this->getDataBag()->set('boxcontent', 'Zsilett');
		$this->getDataBag()->set('box', "@website/box.twig");
		dump($this->getDataBag()->all());
		dump($this);
	}

}