<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    protected $pengguna;
    protected $validation;

    public function __construct()
    {
        $this->pengguna = new PenggunaModel();
        $this->validation = service('validation');
    }

    public function index()
    {
        $data['pengguna'] = $this->pengguna->findAll();

        return view('pengguna/index', $data);
    }

    public function tambah()
    {
        if ($this->request->is('post')) {
            $this->validation->setRules([
                'nama_lengkap' => ['label' => 'Nama Lengkap', 'rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
                'username' => ['label' => 'Username', 'rules' => 'required|is_unique[pengguna.username]', 'errors' => ['required' => '{field} harus diisi', 'is_unique' => '{field} sudah terdaftar']],
                'password' => ['label' => 'Password', 'rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
                'level' => ['label' => 'Level', 'rules' => 'required', 'errors' => ['required' => '{field} harus dipilih']],
                'aktif' => ['label' => 'Status', 'rules' => 'required', 'errors' => ['required' => '{field} harus dipilih']],
            ]);

            if ($this->validation->withRequest($this->request)->run() == false) {
                return redirect()->back()->withInput();
            }

            $params = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
                'aktif' => $this->request->getPost('aktif')
            ];

            $result = $this->pengguna->insert($params);

            if ($result) {
                session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">Data berhasil disimpan<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Data gagal disimpan<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            return redirect('pengguna');
        }

        return view('pengguna/tambah');
    }

    public function ubah($id)
    {
        $data['pengguna'] = $this->pengguna->find($id);

        if ($this->request->is('post')) {
            $this->validation->setRules([
                'nama_lengkap' => ['label' => 'Nama Lengkap', 'rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
                'username' => ['label' => 'Username', 'rules' => 'required|is_unique[pengguna.username,id,' . $id . ']', 'errors' => ['required' => '{field} harus diisi', 'is_unique' => '{field} sudah terdaftar']],
                'level' => ['label' => 'Level', 'rules' => 'required', 'errors' => ['required' => '{field} harus dipilih']],
                'aktif' => ['label' => 'Status', 'rules' => 'required', 'errors' => ['required' => '{field} harus dipilih']],
            ]);

            if ($this->validation->withRequest($this->request)->run() == false) {
                return redirect()->back()->withInput();
            }

            $params = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'level' => $this->request->getPost('level'),
                'aktif' => $this->request->getPost('aktif')
            ];

            $result = $this->pengguna->update($id, $params);

            if ($result) {
                session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">Data berhasil diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Data gagal diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            return redirect('pengguna');
        }

        return view('pengguna/ubah', $data);
    }

    public function hapus($id)
    {
        $result = $this->pengguna->delete($id);

        if ($result) {
            session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">Data berhasil dihapus<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Data gagal dihapus<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        return redirect('pengguna');
    }

    public function password()
    {
        if ($this->request->is('post')) {
            $this->validation->setRules([
                'password_lama' => ['label' => 'Password Lama', 'rules' => 'required|passlama', 'errors' => ['required' => '{field} harus diisi', 'passlama' => '{field} salah']],
                'password_baru' => ['label' => 'Password Baru', 'rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
                'password_konfirmasi' => ['label' => 'Konfirmasi Password', 'rules' => 'required|matches[password_baru]', 'errors' => ['required' => '{field} harus diisi', 'matches' => '{field} tidak sama dengan Password Baru']],
            ]);

            if ($this->validation->withRequest($this->request)->run() == false) {
                return redirect()->back()->withInput();
            }

            $params = [
                'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT)
            ];

            $result = $this->pengguna->update(session()->get('id'), $params);

            if ($result) {
                session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">Password berhasil diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Password gagal diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }

            return redirect('password');
        }

        return view('password');
    }
}
