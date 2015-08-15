-- 国家
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `country` VARCHAR(255) NOT NULL,
    KEY (`country`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `country` (`id`,`country`) VALUES
(NULL,"中国");

