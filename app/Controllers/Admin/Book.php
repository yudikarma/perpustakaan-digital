<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookModel;

class Book extends BaseController
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function dashboard()
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $totalBooks = $this->bookModel->countAllResults();
        
        // Count distinct categories
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(DISTINCT category) as total FROM books");
        $row = $query->getRow();
        $totalCategories = $row ? $row->total : 0;

        return view('admin/dashboard', [
            'title'           => 'Dashboard Admin',
            'totalBooks'      => $totalBooks,
            'totalCategories' => $totalCategories
        ]);
    }

    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $search = $this->request->getVar('search');

        if (!empty($search)) {
            $this->bookModel->groupStart()
                            ->like('title', $search)
                            ->orLike('author', $search)
                            ->orLike('category', $search)
                            ->orLike('isbn', $search)
                            ->groupEnd();
        }

        $books = $this->bookModel->orderBy('created_at', 'DESC')->paginate(10, 'default');
        $pager = $this->bookModel->pager;

        return view('admin/books_list', [
            'title'  => 'Kelola Perpustakaan',
            'books'  => $books,
            'pager'  => $pager,
            'search' => $search
        ]);
    }

    public function create()
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        return view('admin/book_form', [
            'title'      => 'Tambah Buku Baru',
            'validation' => session()->getFlashdata('validation') ?? []
        ]);
    }

    public function store()
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $data = [
            'title'     => $this->request->getPost('title'),
            'author'    => $this->request->getPost('author'),
            'publisher' => $this->request->getPost('publisher'),
            'year'      => $this->request->getPost('year'),
            'category'  => $this->request->getPost('category'),
            'isbn'      => $this->request->getPost('isbn'),
            'synopsis'  => $this->request->getPost('synopsis'),
        ];

        // Validate first
        if (!$this->validate($this->bookModel->getValidationRules(), $this->bookModel->getValidationMessages())) {
            return redirect()->back()
                             ->withInput()
                             ->with('validation', $this->validator->getErrors())
                             ->with('error', 'Gagal menyimpan data. Silakan periksa formulir Anda.');
        }

        // Handle Image Upload
        $img = $this->request->getFile('cover');
        $coverName = 'default-cover.jpg'; // default cover

        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Check size & file type
            if ($img->getSizeByUnit('mb') > 2) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Ukuran file cover tidak boleh melebihi 2MB.');
            }
            if (!in_array($img->getMimeType(), ['image/jpg', 'image/jpeg', 'image/png'])) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Format file cover harus JPG, JPEG, atau PNG.');
            }

            // Create dir if not exists
            $uploadDir = FCPATH . 'uploads/covers/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $coverName = $img->getRandomName();
            $img->move($uploadDir, $coverName);
        }

        $data['cover'] = $coverName;

        $this->bookModel->insert($data);

        return redirect()->to(base_url('admin/book'))
                         ->with('success', 'Buku baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $book = $this->bookModel->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Buku tidak ditemukan.");
        }

        return view('admin/book_form', [
            'title'      => 'Edit Buku',
            'book'       => $book,
            'validation' => session()->getFlashdata('validation') ?? []
        ]);
    }

    public function update($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $book = $this->bookModel->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Buku tidak ditemukan.");
        }

        $data = [
            'title'     => $this->request->getPost('title'),
            'author'    => $this->request->getPost('author'),
            'publisher' => $this->request->getPost('publisher'),
            'year'      => $this->request->getPost('year'),
            'category'  => $this->request->getPost('category'),
            'isbn'      => $this->request->getPost('isbn'),
            'synopsis'  => $this->request->getPost('synopsis'),
        ];

        // Validate
        if (!$this->validate($this->bookModel->getValidationRules(), $this->bookModel->getValidationMessages())) {
            return redirect()->back()
                             ->withInput()
                             ->with('validation', $this->validator->getErrors())
                             ->with('error', 'Gagal memperbarui data. Silakan periksa formulir Anda.');
        }

        // Handle Image Upload
        $img = $this->request->getFile('cover');

        if ($img && $img->isValid() && !$img->hasMoved()) {
            if ($img->getSizeByUnit('mb') > 2) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Ukuran file cover tidak boleh melebihi 2MB.');
            }
            if (!in_array($img->getMimeType(), ['image/jpg', 'image/jpeg', 'image/png'])) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Format file cover harus JPG, JPEG, atau PNG.');
            }

            $uploadDir = FCPATH . 'uploads/covers/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Remove old image if not default
            if ($book['cover'] && $book['cover'] !== 'default-cover.jpg' && file_exists($uploadDir . $book['cover'])) {
                unlink($uploadDir . $book['cover']);
            }

            $coverName = $img->getRandomName();
            $img->move($uploadDir, $coverName);
            $data['cover'] = $coverName;
        }

        $this->bookModel->update($id, $data);

        return redirect()->to(base_url('admin/book'))
                         ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'))->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        $book = $this->bookModel->find($id);

        if (!$book) {
            return redirect()->to(base_url('admin/book'))->with('error', 'Buku tidak ditemukan.');
        }

        // Delete cover file if it exists and is not default
        $uploadDir = FCPATH . 'uploads/covers/';
        if ($book['cover'] && $book['cover'] !== 'default-cover.jpg' && file_exists($uploadDir . $book['cover'])) {
            unlink($uploadDir . $book['cover']);
        }

        $this->bookModel->delete($id);

        return redirect()->to(base_url('admin/book'))->with('success', 'Buku berhasil dihapus.');
    }
}
