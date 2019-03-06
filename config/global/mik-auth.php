<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\MikAuthEternity\Interfaces\MikAuthConfigInterface::class)
	->env([
		'auth_return_url' => 'DOMAIN',
	])->value([
		'auth-page-title'     => 'Teremfoglalás',
		'auth_redirect_class' => \MikAuthEternity\MikAuthRedirect::class,
		'auth-result-url'     => 'http://api.' . getenv('MIK_AUTH_BASEURL') . '/get-result',
		'auth-token-url'      => 'http://api.' . getenv('MIK_AUTH_BASEURL') . '/get-token',
		'auth-login-page'     => 'http://auth.' . getenv('MIK_AUTH_BASEURL') . '/login?token=',
		'user-api-url'        => 'http://api.' . getenv('MIK_AUTH_BASEURL') . '',
	]);

