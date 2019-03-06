<?php namespace Application\HTTP\Site\Page;


trait Cacheable {

	protected function cacheMe(int $interval){
		$this->getAttributesBag()->set('cache', true);
		$this->getAttributesBag()->set('cache-interval', $interval);
	}

}