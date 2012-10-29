-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2012 at 12:38 AM
-- Server version: 5.1.61
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendask`
--

CREATE TABLE IF NOT EXISTS `agendask` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
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
-- Table structure for table `agendaskbackup`
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
-- Table structure for table `agendaskextra`
--

CREATE TABLE IF NOT EXISTS `agendaskextra` (
  `noagenda` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendask_dari`
--

CREATE TABLE IF NOT EXISTS `agendask_dari` (
  `noagenda` varchar(50) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`noagenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaspt`
--

CREATE TABLE IF NOT EXISTS `agendaspt` (
  `noagenda` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `isi` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
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
-- Table structure for table `agendasptbackup`
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
-- Table structure for table `agendasptextra`
--

CREATE TABLE IF NOT EXISTS `agendasptextra` (
  `noagenda` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaspt_dari`
--

CREATE TABLE IF NOT EXISTS `agendaspt_dari` (
  `noagenda` varchar(50) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`noagenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
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
-- Table structure for table `keluarbackup`
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
-- Table structure for table `keluar_dari`
--

CREATE TABLE IF NOT EXISTS `keluar_dari` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nosurat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluar_ke`
--

CREATE TABLE IF NOT EXISTS `keluar_ke` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluar_komentar`
--

CREATE TABLE IF NOT EXISTS `keluar_komentar` (
  `nosurat` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
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
-- Table structure for table `masuk`
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
-- Table structure for table `masukbackup`
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
-- Table structure for table `masuk_dari`
--

CREATE TABLE IF NOT EXISTS `masuk_dari` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nosurat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_ke`
--

CREATE TABLE IF NOT EXISTS `masuk_ke` (
  `nosurat` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_komentar`
--

CREATE TABLE IF NOT EXISTS `masuk_komentar` (
  `nosurat` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notakeluarextra`
--

CREATE TABLE IF NOT EXISTS `notakeluarextra` (
  `nonota` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notamasukextra`
--

CREATE TABLE IF NOT EXISTS `notamasukextra` (
  `nonota` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `namafile` text NOT NULL,
  `ukuuran` double NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_keluar`
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
-- Table structure for table `nota_keluarbackup`
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
-- Table structure for table `nota_keluar_dari`
--

CREATE TABLE IF NOT EXISTS `nota_keluar_dari` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_keluar_ke`
--

CREATE TABLE IF NOT EXISTS `nota_keluar_ke` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_keluar_komentar`
--

CREATE TABLE IF NOT EXISTS `nota_keluar_komentar` (
  `nonota` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_masuk`
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
-- Table structure for table `nota_masukbackup`
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
-- Table structure for table `nota_masuk_dari`
--

CREATE TABLE IF NOT EXISTS `nota_masuk_dari` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_baris` int(11) DEFAULT NULL,
  PRIMARY KEY (`nonota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_masuk_ke`
--

CREATE TABLE IF NOT EXISTS `nota_masuk_ke` (
  `nonota` varchar(50) NOT NULL,
  `userid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_masuk_komentar`
--

CREATE TABLE IF NOT EXISTS `nota_masuk_komentar` (
  `nonota` varchar(50) NOT NULL,
  `nourut` int(11) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `nama_persh` varchar(30) NOT NULL DEFAULT '',
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`nama_persh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_umum`
--

CREATE TABLE IF NOT EXISTS `setting_umum` (
  `kode_setting` varchar(3) NOT NULL,
  `keterangan` varchar(75) DEFAULT NULL,
  `fungsi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kode_setting`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratextra`
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
-- Table structure for table `suratkeluarextra`
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
-- Table structure for table `tb_pesan`
--

CREATE TABLE IF NOT EXISTS `tb_pesan` (
  `userid` varchar(15) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `userid` varchar(15) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nama_user` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking1`
--

CREATE TABLE IF NOT EXISTS `tracking1` (
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nama_user` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
