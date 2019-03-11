<?php namespace Application\HTTP\Site\Page;


use Eternity\Response\Responder\SmartPageResponder;

/**
 * @template "@website/MyPage.twig"
 * @title "MY AWESOME PAGE"
 * @bodyclass "mypage"
 * @js "/dist/www/app.js"
 * @css "/dist/www/app.css"
 */
class MyPage extends SmartPageResponder {

	protected function prepare() {
	}

}