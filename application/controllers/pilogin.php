<?
class pilogin extends CI_Controller {

	function index()
	{
		$a=$this->input->post('a');
		$b=$this->input->post('b');
		$balik="";
		$qry="select count(*) as jumlah from master_user where userid like binary '".$a."' and passwd like binary '".$b."' and aktif='Y'";
		$hasil = $this->db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0){
			$this->session->set_userdata('yangmasuk', $a);
			$balik = $row->jumlah;
		}
		else
		{
			$qry="select count(*) as jumlah from master_user where userid like binary '".$a."' and passwd like binary '".$b."'";
			$hasil = $this->db->query($qry);
			$row = $hasil->row();
			if ($row->jumlah>0){
				$balik = "User ini Tidak Aktif";
			} else {
				$balik = "User atau Password salah";
			}
			$this->session->unset_userdata('yangmasuk');
		}
		
		$data['lihat'] = $balik;
		$this->load->view('pilogin',$data);
		$this->db->close();
	}
}
?>