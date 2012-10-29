<?
class restoremodel extends CI_Model {
    function formRestore()
    {
	$balik="";
	$attributes = array('id' => 'formrestore','name' => 'formrestore');
	$balik.=form_open_multipart('restore/doupload', $attributes);
	$data = array(
		  'name'        => "filerestore",
		  'id'          => "filerestore",
		  'size'       => 30,
		  'text'	=> "Pilih Gambar"
	    );
	    
	$balik.="File Backup : ".form_upload($data)."<br/><br/>";
	$data = array(
		'name' => 'btrestore',
		'id' => 'btrestore',
		'value' => 'O K',
		'type' => 'submit',
		'content' => 'O K'
	    );
	$balik.=form_hidden('jadi', "ya");
	$balik.=form_button($data);
	$balik.=form_close();
	return $balik;
    }
 
    function bisanambah($str)
    {
	$db=$this->db;
	$balik=true;
	$hasil =$db->query($str);
	$row=$hasil->row();
	if ($row->jumlah>0)
	{
	    $balik=false;
	}
	return $balik;
    }
    function restoreitu()
    {
	exec("rmdir /s/q bakup");
	//bikin folder backup
	if (!is_dir("bakup"))
	    mkdir("bakup");
	//upload file
	$awalfolder=substr($_FILES["filerestore"]['name'],0,(strlen($_FILES["filerestore"]['name'])-4));
	$namafileini=$_FILES["filerestore"]['name'];
	move_uploaded_file($_FILES["filerestore"]['tmp_name'], "bakup/".$namafileini);
	
	
	//extract zip file
	$zip = new ZipArchive;
	$zip->open("bakup/".$namafileini);
	$zip->extractTo("bakup/");
	$zip->close();
	
	$db=$this->db;
	
	//delete zip nya
	exec("del /Q "."\"bakup\\".$namafileini."\"");
	
	//masukkan datanya
	$handle = @fopen("bakup/".$awalfolder."/isidata.sql", "r");
	if ($handle) {
	    while (!feof($handle)) {
		$cek = fgets($handle);
		if (!feof($handle)) {
		    $jalanisi = fgets($handle);
		    if ($this->bisanambah($cek))
		    {
			$db->query($jalanisi);
		    }
		}
	    }
	    fclose($handle);
	}
	
	//copy gambarnya
	exec("del /Q "."\"bakup\\".$awalfolder."\\isidata.sql\"");
	exec("move \"bakup\\".$awalfolder."\\*.*\" gambaruplod");
	exec("rmdir /s/q \"bakup\\".$awalfolder."\"");
    }
}
?>