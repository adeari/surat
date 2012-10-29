<?
class userlistmodel extends CI_Model {    
    function __construct()
    {
        parent::__construct();
    }
    function getTotalData()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(userid) as jumlah from master_user;";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    
    function getKondisiIsiData()
    {
        $balik=" where nip is not null ";
        $db=$this->db;
        if (strlen($this->input->post('textcari'))>0)
        {
        if (
            strcmp($this->input->post('pilihcari'),"nama")==0
            ||strcmp($this->input->post('pilihcari'),"userid")==0
            ||strcmp($this->input->post('pilihcari'),"nip")==0
            ||strcmp($this->input->post('pilihcari'),"alamat")==0
            ||strcmp($this->input->post('pilihcari'),"tempat_lahir")==0
            ||strcmp($this->input->post('pilihcari'),"agama")==0
            ||strcmp($this->input->post('pilihcari'),"status_sipil")==0
            ||strcmp($this->input->post('pilihcari'),"telepon")==0
            )
            $balik.=" and ".$this->input->post('pilihcari')."=".$db->escape($this->input->post('textcari'))." ";
        else if (strcmp($this->input->post('pilihcari'),"aktif")==0
                 ||strcmp($this->input->post('pilihcari'),"master")==0
                 ||strcmp($this->input->post('pilihcari'),"transaksi")==0
                 ||strcmp($this->input->post('pilihcari'),"laporan")==0
                 ||strcmp($this->input->post('pilihcari'),"utility")==0
                 )
            $balik.=" and aktif like '".substr($this->input->post('textcari'),0,1)."' ";
        else if (strcmp($this->input->post('pilihcari'),"tanggal_lahir")==0
                 ||strcmp($this->input->post('pilihcari'),"tanggal_masuk")==0
                 )
            $balik.=" and date(".$this->input->post('pilihcari').") = STR_TO_DATE('".$this->input->post('textcari')."','%d/%m/%Y') ";
        }            
        return $balik;
    }
    
    function getIsidata()
    {
        $balik="";
        $db=$this->db;
        $limit="50";
        if ($this->input->post('pilihjmlhalaman'))
            $limit=$this->input->post('pilihjmlhalaman');
        $offset="0";
        if ($this->input->post('halaman'))
            $offset=$this->input->post('halaman');
        $limit=" limit ".$offset." , ".$limit;
        $ordernya=" nip asc";
        if ($this->input->post('ordernya'))
            $ordernya=" ".$this->input->post('ordernya');
        if ($this->input->post('ascnya'))
            $ordernya.=" ".$this->input->post('ascnya')." ";
        $qry="select nama,userid,aktif,telepon,nip from master_user ".$this->getKondisiIsiData()." order by ".$ordernya." ".$limit.";";
        $hasil =$db->query($qry);
        $baris=0;$ckitung=0;
        $ganti=true;
        foreach ($hasil->result() as $row)
        {
            $baris++;
            if ($ganti) {
                $balik.="<tr class=\"alternate\" valign=\"top\">";
                $ganti=false;
            } else {
                $balik.="<tr class=\"author-self\" valign=\"top\">";
                $ganti=true;
            }
	    $balik.="<th scope=\"row\" class=\"check-column\">";
            if (strcmp($row->userid,$this->session->userdata('yangmasuk'))==0)
                $balik.="&nbsp;";
            else
            {
                $ckitung++;
                $balik.="<input name=\"ck".$ckitung."\" id=\"ck".$ckitung."\" value=\"".$row->nip."\" type=\"checkbox\">";
            }
            $balik.="</th>";
            $balik.="<td><a href=\"#\" class=\"row-title\" onClick=\"detail('".$row->nip."')\">".$row->nip."</a><div class=\"row-actions\">
            <span class=\"edit\"><a href=\"#\" onClick=\"detail('".$row->nip."')\">Detail</a> | <a href=\"#\" onClick=\"ubah('".$row->nip.
            "',$('ck".$baris."'));\">Ubah</a>";
            if (strcmp($row->userid,$this->session->userdata('yangmasuk'))!=0)
                $balik.="| <a href=\"#\" onClick=\"hapus1('".$row->nip."');\">Hapus</a>";
            $balik.="</span></div></td>";
            $balik.="<td>".$row->nama."&nbsp;</td>";
	    $balik.="<td>".$row->userid."&nbsp;</td>";
            if (strcmp($row->aktif,"Y")==0)
                $balik.="<td>Ya</td>";
            else
                $balik.="<td>Tidak</td>";
	    $balik.="<td>".$row->telepon."&nbsp;</td>";
	    $balik.="</tr>";
        }
        return $balik;
    }
    
    function getOptionCari()
    {
        $options = array(
                  'userid'  => 'User ID',
                  'nama'    => 'Nama',
                  'nip' => 'N I P',
                  'aktif' => 'Aktif',
                  'alamat' => 'Alamat',
                  'telepon' => 'Telepon',
                  'tempat_lahir' => 'Tempat Lahir',
                  'tanggal_lahir' => 'Tanggal Lahir',
                  'tanggal_masuk' => 'Tanggal Masuk',
                  'agama' => 'Agama',
                  'status_sipil' => 'Status Sipil',
                  'master' => 'Menu Master',
                  'transaksi' => 'Menu Transaksi',
                  'laporan' => 'Menu Laporan',
                  'utility' => 'Menu Utility'
                );
        $pilih="nama";
        if ($this->input->post('pilihcari'))
            $pilih=$this->input->post('pilihcari');
        return form_dropdown('pilihcari', $options, $pilih);
    }
    
    function getOptionJmlHalaman()
    {
        $options = array(
                  '50'    => '50',
                  '100' => '100',
                  '300' => '300',
                  '500' => '500'
                );
        $pilih="50";
        if ($this->input->post('pilihjmlhalaman'))
            $pilih=$this->input->post('pilihjmlhalaman');
        $extranya=" id=\"pilihjmlhalaman\" onChange=\"pilihBarisHalaman()\" ";
        return form_dropdown('pilihjmlhalaman',$options, $pilih, $extranya);
    }
    
    function getTextCari()
    {
        $pilih="";
        if ($this->input->post('textcari'))
            $pilih=$this->input->post('textcari');
        $data = array(
              'name'        => 'textcari',
              'id'          => 'textcari',
              'value'       => $pilih,
              'size'        => '70'
            );

        return form_input($data);
    }
    function buttonCari()
    {
        $data = array(
            'name' => 'btcari',
            'id' => 'btcari',
            'value' => 'Cari',
            'type' => 'button',
            'content' => 'Cari',
            'onClick' => 'cari()'
        );

        return form_button($data);
    }
    function getHalamanSkr()
    {
        $balik="1";
        if ($this->input->post('halaman'))
        {
            $angka=((int)$this->input->post('halaman')/(int)$this->input->post('pilihjmlhalaman'))+1;
            $balik=$angka;
        }
        return $balik;
    }
    
    function getViewHalaman()
    {
        $baris=50;
        if ($this->input->post('pilihjmlhalaman'))
            $baris=(int)$this->input->post('pilihjmlhalaman');
        $config['base_url'] = 'userlist?';
        $db=$this->db;
        $qry="select count(*) as jumlah from master_user ".$this->getKondisiIsiData().";";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $totalBaris=(int)$row->jumlah;
        $config['total_rows'] = $totalBaris;
        $config['per_page'] = $baris;
        $config['uri_segment'] = 3;
        $config['num_links'] = 10;
        $config['page_query_string'] = TRUE;
        $config['first_link'] = '<< Pertama';
        $config['last_link'] = 'Terakhir >>';
        $config['cur_page']='1';
        if ($this->input->post('halaman'))
            $config['cur_page']=$this->input->post('halaman');
        $config['cur_tag_open']='&nbsp;&nbsp;[&nbsp;<font color="#790000"><strong>';
        $config['cur_tag_close']='</strong></font>&nbsp;]&nbsp;&nbsp;';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    function hiddenpilihan()
    {
        $valuenya="0";
        if ($this->input->post('halaman'))
            $valuenya=$this->input->post('halaman');
        $balik=form_hidden('halaman', $valuenya);
        $valuenya="asc";
        if ($this->input->post('ascnya'))
            $valuenya=$this->input->post('ascnya');
        $balik.=form_hidden('ascnya', $valuenya);
        $valuenya="nip";
        if ($this->input->post('ordernya'))
            $valuenya=$this->input->post('ordernya');
        $balik.=form_hidden('ordernya', $valuenya);
        $balik.=form_hidden('pilihankita', "");
        $balik.=form_hidden('bthapus1', "");
        return $balik;
    }
    
    function buttonAtas()
    {
        $data = array(
            'name' => 'bthapus',
            'id' => 'bthapus',
            'value' => 'Hapus',
            'type' => 'button',
            'content' => 'Hapus',
            'onClick' => 'hapusklik()'
        );
        $data2 = array(
            'name' => 'btTambah',
            'id' => 'btTambah',
            'value' => 'Tambah',
            'type' => 'button',
            'content' => 'Tambah',
            'onClick' => 'tambahuserlist()'
        );
        $balik=form_button($data)."&nbsp;&nbsp;&nbsp;&nbsp;".form_button($data2);
        return $balik;
    }
    
    function hapusklik()
    {
        $db=$this->db;
        $qry=" delete from master_user ";
        $qry1="";
        $jmlData=(int)$this->input->post('pilihjmlhalaman');
        $kondisihapus="";
        $awal=true;
        for ($i=1;$i<=$jmlData;$i++)
        {
            if (strlen($this->input->post("ck".$i))>0)
            {
                $qry1="insert into tracking1 (tanggal,keterangan,nama_user) 
                values (now(),'Hapus Data User ,Nip : ".$this->input->post("ck".$i)."','".$this->session->userdata('yangmasuk')."');";
                $db->query($qry1);
                if ($awal)
                {
                    $kondisihapus.=" where nip=".$db->escape($this->input->post("ck".$i))." ";
                    $awal=false;
                }
                else
                    $kondisihapus.=" or nip=".$db->escape($this->input->post("ck".$i))." ";
            }
        }
        
        $qry.=$kondisihapus;
        $db->query($qry);
    }
}
?>