<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('penduduk_m');
		$this->load->model('validasi_m');
		$this->load->model('M_admin');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['jml_pegawai'] 	= $this->M_admin->get_all();
		$data['jml_pengantar'] 	= $this->validasi_m->get_daspeng();
		$data['jml_penduduk'] 		= $this->penduduk_m->get_pen();
		$data['content'] 	= 'admin/home';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function impform()
	{
		$data['content'] = 'import/home_imp';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tampil()
	{	$data['data']=$this->penduduk_m->get_all();
		$data['content'] = 'penduduk/list';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function delete($params = '') {
        $this->penduduk_m->del($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/tampil');
    }

    function edit() {
        
        $NIK = $this->input->post('NIK');
        $nama = $this->input->post('nama');
        $jenis_kel = $this->input->post('jenis_kel');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $agama = $this->input->post('agama');
        $status = $this->input->post('status');
        $pendidikan_ter = $this->input->post('pendidikan_ter');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        $RT = $this->input->post('RT');
		$RW = $this->input->post('RW');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');

        $troop_ = array(
         'NIK' =>  $NIK,
         'nama'  => $nama,
         'jenis_kel' => $jenis_kel,
         'tempat_lahir' => $tempat_lahir,
         'tgl_lahir' =>  $tgl_lahir,
         'kewarganegaraan'  => $kewarganegaraan,
         'agama' => $agama,
         'status' => $status,
         'pendidikan_ter' =>  $pendidikan_ter,
         'alamat'  => $alamat,
         'pekerjaan' => $pekerjaan,
         'RT' => $RT,
		 'RW' => $RW,
		 'kelurahan' => $kelurahan,
		 'kecamatan' => $kecamatan,

         
      );
    
        
         $this->penduduk_m->ubah($NIK, $troop_);
         $this->session->set_flashdata('sukses',"Berhasil Diubah");
         return redirect('admin/tampil');
    }

	

	function simpan()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('admin/impform');
		}else{
				$NIK=$this->input->post('NIK');
				$nama=$this->input->post('nama');
				$jenis_kel=$this->input->post('jenis_kel');
				$tempat_lahir=$this->input->post('tempat_lahir');
				$tgl_lahir=$this->input->post('tgl_lahir');
				$kewarganegaraan=$this->input->post('kewarganegaraan');
				$agama=$this->input->post('agama');
				$status=$this->input->post('status');
				$pendidikan_ter=$this->input->post('pendidikan_ter');
				$pekerjaan=$this->input->post('pekerjaan');
				$alamat=$this->input->post('alamat');
				$RT=$this->input->post('RT');
				$RW=$this->input->post('RW');
				$kelurahan=$this->input->post('kelurahan');
				$kecamatan=$this->input->post('kecamatan');
			}
		$this->penduduk_m->kirim($NIK,$nama,$jenis_kel,$tempat_lahir,$tgl_lahir,$kewarganegaraan,$agama,$status,$pendidikan_ter,$pekerjaan,$alamat,$RT,$RW,$kelurahan,$kecamatan);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('admin/tampil');	
	}
	
	function validasi(){
		$data['detail']=$this->penduduk_m->get_all();
		$data['pengantar']=$this->validasi_m->get_validasi();
		$data['userdata'] 	= $this->userdata;
		$data['content'] = 'penduduk/validasi';
        $this->load->view($this->template, $data);

	}
	function validasi_RW(){
		$data['detail']=$this->penduduk_m->get_all();
		$data['pengantar']=$this->validasi_m->get_validasiR();
		$data['userdata'] 	= $this->userdata;
		$data['content'] = 'penduduk/validasi_RW';
        $this->load->view($this->template, $data);

	}
	function validasi_kel(){
		$data['detail']=$this->penduduk_m->get_all();
		$data['pengantar']=$this->validasi_m->get_validasiKEL();
		$data['userdata'] 	= $this->userdata;
		$data['content'] = 'penduduk/validasi_kel';
        $this->load->view($this->template, $data);

	}
	function validasi_kel2(){
		$data['detail']=$this->penduduk_m->get_all();
		$data['pengantar']=$this->validasi_m->get_valiKEL();
		$data['userdata']=$this->userdata;
		$data['content'] = 'penduduk/validasi_kel';
        $this->load->view($this->template, $data);

	}

	function data_pemohon(){
		$data['detail']=$this->penduduk_m->get_all();
		$data['pengantar']=$this->validasi_m->get_valiKEL();
		$data['userdata'] 	= $this->userdata;
		$data['content'] = 'penduduk/data_pemohon';
        $this->load->view($this->template, $data);

	}
	function hapus_peng($params = '') {
        $this->validasi_m->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/data_pemohon');
    }

	
	function hapus_kel($params = '') {
        $this->validasi_m->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/validasi_kel');
    }

    function hapus_rt($params = '') {
        $this->validasi_m->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/validasi');
    }

    function hapus_rw($params = '') {
        $this->validasi_m->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/validasi_RW');
    }

    function valsim()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Validasi Anda Gagal");
			redirect('admin/validasi');
		}else{
			$NIK=$this->input->post('NIK');
			$tanggal_berlaku = $this->input->post('tanggal_berlaku');
        	$keterangan = $this->input->post('keterangan');
        	$status_rt = $this->input->post('status_rt');
        	

        $troop_ = array(
         'NIK' =>  $NIK,
         'keterangan'  => $keterangan,
         'status_rt' => $status_rt,
         

      );
        $this->validasi_m->validat($NIK, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Validasi");
		redirect('admin/validasi');
	}
	}

	function valrw()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Validasi Anda Gagal");
			redirect('admin/validasi_RW');
		}else{
			$NIK=$this->input->post('NIK');
        	$keterangan = $this->input->post('keterangan');
        	$status_rw = $this->input->post('status_rw');
        	

        $troop_ = array(
         'NIK' =>  $NIK,
         'keterangan'  => $keterangan,
         'status_rw' => $status_rw,
         

      );
        $this->validasi_m->validat($NIK, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Validasi");
		redirect('admin/validasi_RW');
	}
	}

	function valkel()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Validasi Anda Gagal");
			redirect('admin/validasi_kel');
		}else{
			$NIK=$this->input->post('NIK');
        	$keterangan = $this->input->post('keterangan');
        	$status_kel = $this->input->post('status_kel');
        	

        $troop_ = array(
         'NIK' =>  $NIK,
         'keterangan'  => $keterangan,
         'status_kel' => $status_kel,
         

      );
        $this->validasi_m->validat($NIK, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Validasi");
		redirect('admin/validasi_kel');
	}
	}

}
