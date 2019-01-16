<?php
putenv('ROOT=' . realpath(__DIR__ . '/../../'));
putenv('CONTEXT=' . (http_response_code() ? 'WEB' : 'CLI'));
putenv('CONFIG=' . (getenv('ROOT') . '/config/config-loader.php'));
putenv('LANGUAGE=' . 'hu');
putenv('TIMEZONE=' . 'Europe/Budapest');
putenv('ERROR_LOG=' . (getenv('ROOT') . '/var/log/app.log'));
putenv('SERVICE_REGISTRY='.(getenv('ROOT').'/Application/service_registry.php'));
