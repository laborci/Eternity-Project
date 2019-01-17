# Eternity-Project

Create the project:

- ```composer create-project laborci/eternity-project yourproject```

After the project creation process Eternity creates the two main configuration files. Check the contents of these files!

- ```config/local/config.php```
- ```config/local/virtualhost.conf```

Dont forget to include the virtualhost file into your httpd.conf!

Install the required node packages:

- ```npm install```

Make the first less build:

- ```gulp build```

Make the first webpack build:

- ```npm run build```

(use ```gulp```and ```npm run work``` for active file watcher)

Create your starter database
```SQL
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL COMMENT 'password',
  `created` datetime DEFAULT NULL,
  `permissions` set('admin') DEFAULT NULL,
  `status` enum('active','deleted') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

CREATE TABLE `user_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `userId` int(11) unsigned NOT NULL,
  `event` varchar(32) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `description` text COLLATE utf8_hungarian_ci COMMENT 'json',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created`, `permissions`, `status`)
VALUES (1, 'Admin', 'admin@eternity', '$2y$10$iSr05yuqV07/VqGq10NmQezwLrvpkTo0SrramL/7bSrQdAD64trrO', '2019-01-16 13:24:00', 'admin', 'active');
```

Your project will be available at:

- **http://yourproject.test**
- **http://admin.yourproject.test**

User credentials for the administration site: admin@eternity / admin123

Happy coding!
