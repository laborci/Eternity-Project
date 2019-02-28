<?php


namespace Application\HTTP\Website\Page;


trait Cacheable {

	protected function cacheMe(int $interval){
		$this->getAttributesBag()->set('cache', true);
		$this->getAttributesBag()->set('cache-interval', $interval);
	}

}