-- 省份
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `province` VARCHAR(255) NOT NULL,
    `country_id` INTEGER NOT NULL,
    KEY (`province`),
    KEY `country_id` (`country_id`),
    CONSTRAINT `prvc_country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `province` (`id`,`province`,`country_id`) VALUES
(1,"北京市",1),
(2,"天津市",1),
(3,"河北省",1),
(4,"山西",1),
(5,"内蒙古自治区",1),
(6,"辽宁省",1),
(7,"吉林省",1),
(8,"黑龙江省",1),
(9,"上海市",1),
(10,"江苏省",1),
(11,"浙江省",1),
(12,"安徽省",1),
(13,"福建省",1),
(14,"江西省",1),
(15,"山东省",1),
(16,"河南省",1),
(17,"湖北省",1),
(18,"湖南省",1),
(19,"广东省",1),
(20,"广西壮族自治区",1),
(21,"海南省",1),
(22,"重庆市",1),
(23,"四川省",1),
(24,"贵州省",1),
(25,"云南省",1),
(26,"西藏自治区",1),
(27,"陕西省",1),
(28,"甘肃省",1),
(29,"青海省",1),
(30,"宁夏回族自治区",1),
(31,"新疆维吾尔自治区",1),
(32,"台湾省",1),
(33,"香港特别行政区",1),
(34,"澳门特别行政区",1);
