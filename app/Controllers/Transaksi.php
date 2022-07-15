<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WisataModel;
use App\Models\TransaksiModel;
use \Dompdf\dompdf;
class Transaksi extends BaseController
{
    protected $wisata;
    protected $transaksi;
    public function __construct()
    {
        $this->wisata    = new WisataModel;
        $this->transaksi = new TransaksiModel;
    }

    public function index()
    {
        $transaksi = $this->transaksi->getAll();
        
        $data = [
            'transaksi' => $transaksi
        ];
        return view ('transaksi/index', $data);
    }

    public function tambah()
    {
        $wisata = $this->wisata->findAll();
        $data = [
            'wisata' => $wisata,
            'validation' => \Config\Services::validation()
        ];
        return view ('transaksi/tambah', $data);
    }

    public function simpan()
    {
        if(!$this->validate([
            'nofak' => [
                'rules'  => 'required|is_unique[transaksi.nofak]',
                'errors' => [
                    'required'  => 'Nomor faktur harus diisi',
                    'is_unique' => 'Nomor faktur sudah ada',
                ]
            ],
            'jumlah_anak' => [
                'rules'  => 'required[transaksi.jumlah_anak]',
                'errors' => [
                    'required' => 'Harga jumlah harus diisi',
                ]
            ],
            'jumlah_dewasa' => [
                'rules'  => 'required[transaksi.jumlah_dewasa]',
                'errors' => [
                    'required' => 'Harga jumlah harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('transaksi/tambah')->withInput();
        }

        $data = $this->request->getPost();
        $this->transaksi->insert($data);     
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('transaksi');
    }

    public function cetak()
    {
        $dompdf = new Dompdf();
        $transaksi = $this->transaksi->getAll();
        $data = [
            'transaksi' => $transaksi
        ];
        $html = view ('transaksi/cetak', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'lanscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('Laporan Pendapatan Wisata.pdf', array(
            "Attachment" => false
        ));
    }
}
