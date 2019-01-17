<?php namespace Application\WebSite\Middleware;


use Eternity\Cache\FileCache;
use Eternity\Response\Responder\Middleware;
use Symfony\Component\HttpFoundation\Request;

class Cache extends Middleware {


	public function run(){
		if($this->getRequest()->getMethod() !== Request::METHOD_GET) $this->next();
		else{
			$cache = new FileCache(getenv('ROOT').'/var/cache/output/');
			$cachekey = crc32($this->getRequest()->getRequestUri());
			if($cache->exists($cachekey) && $cache->getAge($cachekey)<60){
				$this->getResponse()->setContent($cache->get($cachekey));
			}else {
				$this->next();
				if($this->getRequest()->attributes->getBoolean('cache', false)){
					$cache->set($cachekey, $this->getResponse()->getContent());
				}
			}
		}
	}

}