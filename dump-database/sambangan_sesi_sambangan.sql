DROP TABLE IF EXISTS `sesi_sambangan`;
CREATE TABLE `sesi_sambangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `nama_santri` varchar(200) NOT NULL,
  `nama_walisantri` varchar(200) NOT NULL,
  `kelas_santri` varchar(200) NOT NULL,
  `status` char(1) NOT NULL,
  `sesi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
