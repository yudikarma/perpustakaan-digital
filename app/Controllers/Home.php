<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
    public function index(): string
    {
        $bookModel = new BookModel();
        
        // Get search query from URL parameter
        $search = $this->request->getVar('search');

        if (!empty($search)) {
            $bookModel->groupStart()
                      ->like('title', $search)
                      ->orLike('author', $search)
                      ->orLike('category', $search)
                      ->orLike('isbn', $search)
                      ->groupEnd();
        }

        // Paginate results (6 books per page)
        $books = $bookModel->orderBy('created_at', 'DESC')->paginate(6, 'default');
        $pager = $bookModel->pager;

        return view('public_home', [
            'title'   => 'Katalog Buku Digital',
            'books'   => $books,
            'pager'   => $pager,
            'search'  => $search
        ]);
    }

    public function detail($id): string
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Buku tidak ditemukan.");
        }

        return view('public_detail', [
            'title' => $book['title'],
            'book'  => $book
        ]);
    }
}
