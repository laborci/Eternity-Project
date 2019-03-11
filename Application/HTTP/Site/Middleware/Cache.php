<?php namespace Application\HTTP\Site\Middleware;


use Eternity\Cache\FileCache;
use Eternity\Response\Responder\Middleware;
use Eternity\Response\Responder\SmartPageResponderConfigInterface;
use Symfony\Component\HttpFoundation\Request;

class Cache extends Middleware {

	public function __construct(SmartPageResponderConfigInterface $config){
		$this->config = $config;
	}

	public function run(){
		if($this->getRequest()->getMethod() !== Request::METHOD_GET) $this->next();
		else{
			$cache = new FileCache($this->config::cache_path());
			$cachekey = crc32($this->getRequest()->getRequestUri());
			if($cache->isValid($cachekey)){
				$this->setResponse(unserialize($cache->get($cachekey)));
				$this->getResponse()->headers->set('x-cached-until', $cache->getAge($cachekey)*-1);
			}else {
				$this->next();
				if($this->getRequest()->attributes->getBoolean('cache', false)){
					$cacheInterval = $this->getRequest()->attributes->getInt('cache-interval', 60);
					$cache->set($cachekey, serialize($this->getResponse()), $cacheInterval);
					$this->getResponse()->headers->set('x-cache-interval', $cacheInterval);
				}
			}
		}
	}

}