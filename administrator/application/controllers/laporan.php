<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
		function __construct() {
		parent::__construct();
		$this->load->model('validasi_m');
		}
		function index()
	{
    
	}		

    function laprec($no)
    {
     

        $data = $this->validasi_m->get_cetak($no);
        
        if($data != 'NO_DATA_QUERY'){
            $NIK = $data[0]['NIK'];
            $no_pengantar = $data[0]['no_pengantar'];
            $RT = $data[0]['RT'];
            $RW = $data[0]['RW'];
            $keperluan = $data[0]['keperluan'];
            $nama = $data[0]['nama'];
            $jenis_kel = $data[0]['jenis_kel'];
            $tempat_lahir = $data[0]['tempat_lahir'];
            $tgl_lahir = $data[0]['tgl_lahir'];
            $kewarganegaraan = $data[0]['kewarganegaraan'];
            $agama = $data[0]['agama'];
            $pekerjaan = $data[0]['pekerjaan'];
            $alamat = $data[0]['alamat'];
            $kelurahan = $data[0]['kelurahan'];
            $kecamatan = $data[0]['kecamatan'];
            $this->load->library('pdf');
        
        
            $pdf = new FPDF('P','mm','A4');
            $pdf->SetMargins(10, 20);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/bekasilogo1.png",18,14,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA BEKASI ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN MEDAN SATRIA ',0,0,'C');
        $pdf->Ln(7);
        $pdf->SetFont('Arial','B',25);
        $pdf->Cell(0,0,'KELURAHAN PEJUANG ',0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,0,'Jl. Raya Pejuang No.1 - 17131 Bekasi',0,0,'C');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(1);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(4);

        // kop surat 2

        $pdf->SetFont('Arial','BU',14);
        $pdf->Ln(9);
        $pdf->Cell(200, 4,'Surat Keterangan '.$keperluan, 0, 0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(200, 4, 'Nomor : ' .$no_pengantar, 0, 0, 'C');
        $pdf->Ln(9);


        //konten isi:
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30, 4, 'Yang bertandatangan di bawah ini Lurah Pejuang Kecamatan Medan Satria dengan ini menerangkan bahwa :', 0, 0, 'L');
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'Nama Lengkap', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L',);
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tempat Lahir', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tempat_lahir, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tgl_lahir, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Jenis Kelamin', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$jenis_kel, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Kewarganegaraan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kewarganegaraan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Agama', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$agama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Pekerjaan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pekerjaan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Kelurahan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kelurahan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Kecamatan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kecamatan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'RT/RW', 0, 0, 'L');
        $pdf->Cell(5, 4,'  : '.$RT, 0, 0, 'L');
        $pdf->Cell(35, 4,'  / '.$RW, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'NIK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$NIK, 0, 0, 'L');
        $pdf->Ln(5);
        
        $pdf->Ln(9);

        $pdf->MultiCell(190, 5, '       Adalah salah seorang warga di wilayah Kelurahan Pejuang telah memohon Keterangan '.$keperluan.'. Surat keterangan ini kami berikan kepada yang bersangkutan dengan berdasarkan pengakuannya serta surat pengantar RT Nomor : '.$no_pengantar.' tertanggal'.date(" d F Y").' dan data-data yang dimiliki. Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.', 35, 'J',false);
        
        $pdf->Ln(20);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50, 4, 'Mengetahui,', 0, 0, 'C');
        $pdf->Cell(138, 4, 'Bekasi,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(50, 4, 'Tanda Tangan Ybs, ', 0, 0, 'C');

        $pdf->Cell(131, 4, 'Lurah Pejuang ', 0, 0, 'R');
        $pdf->Ln(9);
        $pdf->Image(base_url(). "assets/img/qrcodelurah.png",165,201,'C');
        $pdf->Ln(24);
        $pdf->Cell(52, 4,''.$nama, 0, 0, 'C',);
        $pdf->Ln(2);
        $pdf->Cell(54, 4,'__________________  ', 0, 0, 'C');
        $pdf->Cell(131, 4,'H. ISNAINI, SIP., MMSi', 0, 0, 'R',);
        $pdf->Ln(1);
        $pdf->Cell(334, 4,'_______________________  ', 0, 0, 'C');
        $pdf->Ln(4);
        $pdf->Cell(333, 4, 'NIP : 198103162008011003', 0, 0, 'C');
        
        $pdf->Output();
        
        }
    }

    function cetak($no)
    {
        $data = $this->validasi_m->get_cetak($no);

        if($data != 'NO_DATA_QUERY'){
            $NIK = $data[0]['NIK'];
            $no_pengantar = $data[0]['no_pengantar'];
            $tanggal_berlaku = $data[0]['tanggal_berlaku'];
            
            $keperluan = $data[0]['keperluan'];
           
            $nama = $data[0]['nama'];
            
            $tempat_lahir = $data[0]['tempat_lahir'];
            $tgl_lahir = $data[0]['tgl_lahir'];
            $kewarganegaraan = $data[0]['kewarganegaraan'];
            $agama = $data[0]['agama'];
            
            $pekerjaan = $data[0]['pekerjaan'];
            $alamat = $data[0]['alamat'];
            $RT = $data[0]['RT'];
            $RW = $data[0]['RW'];
            $RW = $data[0]['RW'];
            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(200, 4,'RUKUN TETANGGA '.$RT ,0,0,'C');
        
        $pdf->Ln(5);
        $pdf->Cell(200, 4,'RUKUN WARGA '.$RW ,0,0,'C');
        
        $pdf->Ln(5);
        $pdf->Cell(200, 4,'KELURAHAN PEJUANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(200, 4,'KECAMATAN MEDAN SATRIA ',0,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','BU',12);
        $pdf->Cell(200, 4,'KOTA BEKASI ',0,0,'C');
        $pdf->Ln(9);

        //Kop Surat 2
        
        $pdf->SetFont('Arial','BU',14);
        $pdf->Ln(9);
        $pdf->Cell(200, 4,'SURAT PENGANTAR ', 0, 0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(200, 4, 'No. ' .$no_pengantar, 0, 0, 'C');
        


        //konten isi:
        $pdf->Ln(9);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(35, 4, 'Yang bertandatangan di bawah ini menerangkan bahwa :', 0, 0, 'L');
        $pdf->Ln(9); 
        $pdf->Cell(40, 4, 'Nama', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'Tempat/Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(17, 4,'  : '.$tempat_lahir, 0, 0, 'L');
        $pdf->Cell(17, 4,', '.$tgl_lahir, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'Kewarganegaraan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kewarganegaraan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'Agama', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$agama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'Pekerjaan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pekerjaan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat .$RT .$RW, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(40, 4, 'NIK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$NIK, 0, 0, 'L');

        $pdf->SetFont('Arial','BIU',12);
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'Bermaksud untuk mengurus/membuat surat', 0, 0, 'L');
        $pdf->Cell(90, 4,' : '.$keperluan, 0, 0, 'R');
        
        
        $pdf->SetFont('Arial','',12);
        $pdf->Ln(15);
        $pdf->Cell(35, 4, 'Demikian agar yang berwajib maklum dan dapat memberikan bantuan seperlunya kepada yang', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'bersangkutan.', 0, 0, 'L');
        $pdf->Ln(4);
        $pdf->SetFont('Arial','',10);
        $pdf->Ln(4);
        $pdf->Cell(35, 4, 'No                       : '.$no_pengantar, 0, 0, 'L'); 
        
        

        $pdf->Ln(20);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(50, 4, 'Mengetahui,', 0, 0, 'C');
        $pdf->Cell(135, 4, 'Bekasi,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(50, 4, 'Ketua RW. '.$RW, 0, 0, 'C');
        
        $pdf->Cell(120, 4, 'Ketua RT. '.$RT, 0, 0, 'R');
        
        $pdf->Ln(25);
        $pdf->Cell(54, 4,'(..........................................)', 0, 0, 'C');
        $pdf->Cell(131, 4,'(..........................................)', 0, 0, 'R');
        
        $pdf->Output();
        
        }
    }


}

