<?php namespace Application\WebSite\Service;

use Eternity\ServiceManager\Service;
use Eternity\ServiceManager\SharedService;
use GMark\GMark;

class ArticleGMarkParser extends GMark implements SharedService {

	use Service;

	/** @var  callable */
	protected $imgSrcParser;

	/** @var  callable */
	protected $getGallery;

	public function setImgSrcParser(callable $parser) { $this->imgSrcParser = $parser; }
	public function setGalleryGetter(callable $getter) { $this->getGallery = $getter; }

	/** @GMark @default */
	protected function paragraph($body) {
		return '<p>' . $body . '</p>';
	}

	/**
	 * @GMark @command "@intro"
	 */
	protected function intro(string $body, string $attr, string $command) {
		return '<p class="intro">' . $body . '</p>';
	}

	/**
	 * @GMark @command "@quote"
	 */
	protected function quote(string $body, string $attr, string $command) {
		return '<cite>' . $body . '</cite>';
	}


	/**
	 * @GMark @command "@video"
	 */
	protected function video(string $body, string $attr, string $command) {
		return '<div class="video">' . $body . ($attr ? '<div>' . $attr . '</div>' : '') . '</div>';
	}

	/**
	 * @GMark @command "@youtube"
	 * @required-attributes "id"
	 */
	protected function youtube(string $body, array $attr, string $command) {
		$height = $attr['height'] ? $attr['height'] : 400;
		return '<div class="video"><iframe width="620" height="' . $height . '" src="https://www.youtube-nocookie.com/embed/' . $attr['id'] . '" frameborder="0" allowfullscreen></iframe>' . ($body ? '<div>' . $body . '</div>' : '') . '</div>';
	}

	/**
	 * @GMark @command "@color"
	 * @required-attributes ["color", "bgcolor"]
	 */
	protected function color(string $body, array $attr, string $command) {
		return '<p class="color" style="background-color: ' . $attr['bgcolor'] . ';color:' . $attr['color'] . '">' . $body . '</p>';
	}

	/** @GMark @command "!!" */
	protected function h3(string $body, string $attr, string $command) {
		return '<h3>' . $attr .'</h3>';
	}

	/** @GMark @command "!" */
	protected function h2(string $body, string $attr, string $command) {
		return '<h2>' . $attr . '</h2>';
	}

	/**
	 * @GMark
	 * @command "@list as list"
	 * @command "@list-abc as abc"
	 * @command "@list-ABC as ABC"
	 * @command "@list-123 as num"
	 */
	protected function list(string $body, string $attr, string $command) {
		$types = [
			'list' => ['<ul>', '</ul>'],
			'abc'  => ['<ol type="a">', '</ol>'],
			'ABC'  => ['<ol type="A">', '</ol>'],
			'num'  => ['<ol>', '</ol>'],
		];
		$content = explode("\n", $body);
		$line = $types[$command][0];
		foreach ($content as $contentLine)
			$line .= '<li>' . $contentLine . '</li>';
		$line .= $types[$command][1];
		return $line;
	}

	/**
	 * @GMark
	 * @command ".img as inline"
	 * @command ".img-left as left"
	 * @command ".img-right as right"
	 * @command ".img-full as full"
	 */
	protected function img(string $body, string $attr, string $command) {
		return '<img class="' . $command . '" src="' . ($this->imgSrcParser)($attr, $command) . '" alt="' . $body . '" title="' . $body . '">';
	}

	/** @GMark @command ".gallery" */
	protected function gallery(string $body, string $attr, string $command) {
		$gallery = ($this->getGallery)();
		$data = [];
		foreach ($gallery['items'] as $galleryItem) $data[] = $galleryItem->__toString();
		return '<div is="gmr-gallery" class="gallery" data-title="' . $gallery['title'] . '" data-image="' . ($this->imgSrcParser)($attr, 'inline') . '" data-alt="' . $body . '">' .
			'<template role="data" data-type="json" data-field="images">' . json_encode($data) . '</template>' .
			'</div>';

	}


}