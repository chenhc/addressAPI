-- 国家
CREATE TABLE `country` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `country` VARCHAR(255) NOT NULL,
    KEY (`country`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 省份
CREATE TABLE `province` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `province` VARCHAR(255) NOT NULL,
    `code` INTEGER NOT NULL ,
    `country_id` INTEGER NOT NULL,
    KEY (`province`),
    KEY `country_id` (`country_id`),
    CONSTRAINT `prvc_country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 城市
CREATE TABLE `city` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `city` VARCHAR(255) NOT NULL,
    `code` INTEGER NOT NULL ,
    `province_id` INTEGER NOT NULL,
    KEY (`city`),
    KEY `province_id` (`province_id`),
    CONSTRAINT `ct_province_id_fk` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 区
CREATE TABLE `district` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `district` VARCHAR(255) NOT NULL,
    `code` INTEGER NOT NULL ,
    `city_id` INTEGER NOT NULL,
    KEY (`district`),
    KEY `city_id` (`city_id`),
    CONSTRAINT `dst_city_id_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 街道
CREATE TABLE `street` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `street` VARCHAR(255) NOT NULL,
    `code` INTEGER NOT NULL ,
    `district_id` INTEGER NOT NULL,
    KEY (`street`),
    KEY `district_id` (`district_id`),
    CONSTRAINT `st_district_id_fk` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;