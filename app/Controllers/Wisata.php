<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WisataModel;
class Wisata extends BaseController
{
    protected $wisata;
    public function __construct()
    {
        $this->wisata = new WisataModel;
    }

    public function index()
    {
        $wisata = $this->wisata->findAll();
        $data = [
                'wisata' => $this->wisata->getWisata()
        ];
        return view ('wisata/index', $data);
    }

    public function tambah()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view ('wisata/tambah', $data);
    }
    
    public function simpan()
    {
        if(!$this->validate([
            'kode' => [
                'rules'  => 'required|is_unique[wisata.kode]',
                'errors' => [
                    'required'  => 'Kode harus diisi',
                    'is_unique' => 'Kode sudah ada',
                ]
            ],
            'nama' => [
                'rules'  => 'required[wisata.nama]',
                'errors' => [
                    'required' => 'Nama Objek Wisata harus diisi',
                ]
            ],
            'gambar' => [
                'rules'  => 'max_size[gambar,5024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda masukkan bukan gambar',
                    'max_size' => 'Ukuran gambar maximal 5 MB',
                    'mime_in'  => 'Yang anda masukkan bukan gambar',
                ]
            ],
            'tiket_anak' => [
                'rules'  => 'required[wisata.tiket_anak]',
                'errors' => [
                    'required' => 'Harga Tiket harus diisi',
                ]
            ],
            'tiket_dewasa' => [
                'rules'  => 'required[wisata.tiket_dewasa]',
                'errors' => [
                    'required' => 'Harga Tiket harus diisi',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('wisata/tambah')->withInput();
        }

            //ambil foto
            $fileGambar = $this->request->getFile('gambar');
            //jika tidak ada gambara diupload
            if($fileGambar->getError() == 4) {
                $namaGambar = 'wonderful.png';
            }else{
                //nama random
                $namaGambar = $fileGambar->getRandomName();
                //pindahkan ke folder img
                $fileGambar->move('img', $namaGambar);
                //ambil nama file sampul
                // $namaGambar = $fileGambar->getName();
            }

        $data = [
                'kode'         => $this->request->getVar('kode'),
                'nama'         => $this->request->getVar('nama'),
                'tiket_anak'   => $this->request->getVar('tiket_anak'),
                'tiket_dewasa' => $this->request->getVar('tiket_dewasa'),
                'gambar'       => $namaGambar,
        ];
        $this->wisata->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('wisata');
    }
    
    public function edit($kode)
    {
        // $wisata = $this->find($kode);
        $data = [
            'wisata'     => $this->wisata->find($kode),
            'validation' => \Config\Services::validation()
        ];

        return view('wisata/edit', $data);
    }
    public function ubah($kode)
    {
        
        $fileGambar = $this->request->getFile('gambar');
        
        //cek gambar tetap yang lama
        if($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');        
        }else{
            //generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan gambar ke folder img
            $fileGambar->move('img', $namaGambar);
            //hapus file yang lama
            unlink('img/' . $this->request->getVar('gambarLama'));
            
        }
        $this->wisata->update($kode,[
 
            'kode'          => $this->request->getVar('kode'),
            'nama'          => $this->request->getVar('nama'),
            'tiket_anak'    => $this->request->getVar('tiket_anak'),
            'tiket_dewasa'  => $this->request->getVar('tiket_dewasa'),
            'gambar'        => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('wisata');
    }

    public function detail($kode)
    {
        $wisata = $this->wisata->find($kode);
        $data = [
            'wisata' => $this->wisata->getWisata($kode)
        ];
        return view('wisata/detail', $data);
    }
    
    public function hapus($kode)
    {
        //cari gambar berdasarkan kode
        $wisata = $this->wisata->find($kode);
        //jika file gambar wondeful.png
        if ($wisata['gambar'] != 'wonderful.png') {   
            //hapus gambar
            unlink('img/' . $wisata['gambar']);
        }   

        $this->wisata->delete($kode);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus');
        return redirect()->to('wisata');
    }
    
   

}
