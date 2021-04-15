DROP TABLE IF EXISTS `list_sesi`;
CREATE TABLE `list_sesi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kuota` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` varchar(6) NOT NULL,
  `jam_selesai` varchar(6) NOT NULL,
  `gender` char(1) NOT NULL,
  `jadwal_mulai` datetime NOT NULL,
  `jadwal_selesai` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
