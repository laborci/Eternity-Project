<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\RedFox\Entity\Attachment\AttachmentConfigInterface::class)
	->value([
		'attachments_path' => getenv('ROOT') . '/public/files/',
		'attachments_url'  => '/files/',
		'thumbnails_path'  => getenv('ROOT') . '/public/thumbnails/',
		'thumbnails_url'   => '/thumbnails/',
		'thumbnail_secret' => '0912539017253421',
	]);