CREATE TABLE IF NOT EXISTS `agendask` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`noagenda`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendaskbackup`
--

CREATE TABLE IF NOT EXISTS `agendaskbackup` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`noagenda`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendaspt`
--

CREATE TABLE IF NOT EXISTS `agendaspt` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`noagenda`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendasptbackup`
--

CREATE TABLE IF NOT EXISTS `agendasptbackup` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`noagenda`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE IF NOT EXISTS `keluar` (
  `nosurat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nosurat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarbackup`
--

CREATE TABLE IF NOT EXISTS `keluarbackup` (
  `nosurat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `dari` varchar(100) DEFAULT NULL,
  `no_kendali` varchar(25) DEFAULT NULL,
  `no_berkas` varchar(25) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nosurat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE IF NOT EXISTS `master_user` (
  `userid` varchar(15) NOT NULL DEFAULT '',
  `nama` varchar(30) DEFAULT NULL,
  `passwd` varchar(15) DEFAULT NULL,
  `nip` varchar(15) NOT NULL,
  `aktif` varchar(1) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(35) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `status_sipil` varchar(15) DEFAULT NULL,
  `master` varchar(1) DEFAULT NULL,
  `transaksi` varchar(1) DEFAULT NULL,
  `laporan` varchar(1) DEFAULT NULL,
  `utility` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`userid`,`nip`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE IF NOT EXISTS `masuk` (
  `nosurat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `disposisi` varchar(100) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `no_kendali` varchar(45) DEFAULT NULL,
  `tindak_lanjut` varchar(75) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `no_berkas` varchar(25) DEFAULT NULL,
  `sifat_surat` varchar(25) DEFAULT NULL,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nosurat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masukbackup`
--

CREATE TABLE IF NOT EXISTS `masukbackup` (
  `nosurat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `disposisi` varchar(100) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `no_kendali` varchar(45) DEFAULT NULL,
  `tindak_lanjut` varchar(75) DEFAULT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `no_berkas` varchar(25) DEFAULT NULL,
  `sifat_surat` varchar(25) DEFAULT NULL,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nosurat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_keluar`
--

CREATE TABLE IF NOT EXISTS `nota_keluar` (
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `nonota` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `sifat` varchar(25) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` longblob,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_keluarbackup`
--

CREATE TABLE IF NOT EXISTS `nota_keluarbackup` (
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `nonota` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `sifat` varchar(25) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` longblob,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_masuk`
--

CREATE TABLE IF NOT EXISTS `nota_masuk` (
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `nonota` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `sifat` varchar(25) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `tindak_lanjut` varchar(75) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_masukbackup`
--

CREATE TABLE IF NOT EXISTS `nota_masukbackup` (
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `nonota` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `sifat` varchar(25) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `tindak_lanjut` varchar(75) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` longblob,
  `gambar2` longblob,
  `gambar3` longblob,
  PRIMARY KEY (`no_urut`,`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `nama_persh` varchar(30) NOT NULL DEFAULT '',
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`nama_persh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_umum`
--

CREATE TABLE IF NOT EXISTS `setting_umum` (
  `kode_setting` varchar(3) NOT NULL,
  `keterangan` varchar(75) DEFAULT NULL,
  `fungsi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kode_setting`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------



--
-- Struktur dari tabel `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nama_user` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


































--
-- Struktur dari tabel `suratextra`
--

CREATE TABLE IF NOT EXISTS `suratextra` (
  `nosurat` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluarextra`
--

CREATE TABLE IF NOT EXISTS `suratkeluarextra` (
  `nosurat` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking1`
--

CREATE TABLE IF NOT EXISTS `tracking1` (
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nama_user` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `notamasukextra` (
  `nonota` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS `notakeluarextra` (
  `nonota` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `agendasptextra` (
  `noagenda` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
);

ALTER TABLE `agendaspt` CHANGE `isi` `isi` VARCHAR( 100 ) NULL DEFAULT NULL ,
CHANGE `keterangan` `keterangan` VARCHAR( 255 ) NULL DEFAULT NULL ;
ALTER TABLE `agendask` CHANGE `isi` `isi` VARCHAR( 100 ) NULL DEFAULT NULL ,
CHANGE `keterangan` `keterangan` VARCHAR( 255 ) NULL DEFAULT NULL ;

CREATE TABLE IF NOT EXISTS `masuk_dari` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  PRIMARY KEY (`nosurat`)
);

CREATE TABLE IF NOT EXISTS `masuk_ke` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS `masuk_komentar` (
  `nosurat` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
);



CREATE TABLE IF NOT EXISTS `nota_masuk_dari` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  PRIMARY KEY (`nonota`)
);

CREATE TABLE IF NOT EXISTS `nota_masuk_ke` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS `nota_masuk_komentar` (
  `nonota` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
);

CREATE TABLE IF NOT EXISTS `tb_pesan` (
  `userid` varchar(15) NOT NULL,
  `pesan` text NOT NULL
);

ALTER TABLE `masuk_dari` ADD `no_rak` INT NULL DEFAULT NULL  ,
ADD `no_baris` INT NULL DEFAULT NULL  ;
ALTER TABLE `nota_masuk_dari` ADD `no_rak` INT NULL DEFAULT NULL ,
ADD `no_baris` INT NULL DEFAULT NULL ;

CREATE TABLE `surat`.`agendaspt_dari` (
`noagenda` VARCHAR( 50 ) NOT NULL ,
`no_rak` INT NULL ,
`no_baris` INT NULL ,
PRIMARY KEY ( `noagenda` )
);

CREATE TABLE `surat`.`agendask_dari` (
`noagenda` VARCHAR( 50 ) NOT NULL ,
`no_rak` INT NULL ,
`no_baris` INT NULL ,
PRIMARY KEY ( `noagenda` )
);

CREATE TABLE `surat`.`tb_user` (
`userid` VARCHAR( 15 ) NOT NULL ,
`hak_akses` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `keluar_dari` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nosurat`)
);

CREATE TABLE IF NOT EXISTS `keluar_ke` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS `keluar_komentar` (
  `nosurat` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
);

CREATE TABLE IF NOT EXISTS `nota_keluar_dari` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nonota`)
);

CREATE TABLE IF NOT EXISTS `nota_keluar_ke` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
);
CREATE TABLE IF NOT EXISTS `nota_keluar_komentar` (
  `nonota` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
);


INSERT INTO `setting_umum` (`kode_setting`, `keterangan`, `fungsi`) VALUES
('1', 'C:\\Program Files\\Microsoft Office\\OFFICE11\\EXCEL.EXE', 'setting file excel');
INSERT INTO `perusahaan` (`nama_persh`, `alamat`, `telp`) VALUES
('Dinas Pariwisata  Jawa Timur', 'Jln. Wisata Menanggal Surabaya', '031-8531814');
INSERT INTO `master_user` (`userid`, `nama`, `passwd`, `nip`, `aktif`, `alamat`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`, `agama`, `status_sipil`, `master`, `transaksi`, `laporan`, `utility`) VALUES
('33423', 'ADE ART', '33423', '006', 'Y', 's s ', '3434', 'fsf', '2011-12-13', '2011-12-12', 'DF DSF DS', 'Nikah', 'Y', 'Y', 'T', 'T'),
('BON', 'BON', 'BON', '007', 'Y', 'sdsa das d', '3423', 'sds s', '1985-12-11', '2001-09-11', 'SD SAD SAD S', 'Nikah', 'Y', 'Y', 'Y', 'Y'),
('DAMA', 'SUDAMA', 'DAMA', '001', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'Y', 'Y'),
('IZUL', 'IZUL', '123', '002', 'Y', '', NULL, NULL, NULL, '2008-06-24', NULL, 'Belum Nikah', 'Y', 'Y', 'Y', 'Y'),
('SDADA', 'SFSFS', 'SDADA', '004', 'Y', '', '', '', NULL, NULL, '', NULL, 'Y', 'Y', 'Y', 'Y'),
('TITIN', 'TITIN', 'TITIN', '003', 'Y', NULL, NULL, NULL, NULL, '2011-05-05', NULL, NULL, 'Y', 'Y', 'Y', 'Y');
