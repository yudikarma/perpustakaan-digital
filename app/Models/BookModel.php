<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'author', 'publisher', 'year', 'category', 'isbn', 'synopsis', 'cover'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'title'     => 'required|min_length[3]|max_length[255]',
        'author'    => 'required|min_length[3]|max_length[150]',
        'publisher' => 'required|min_length[3]|max_length[150]',
        'year'      => 'required|numeric|exact_length[4]',
        'category'  => 'required|min_length[3]|max_length[100]',
        'isbn'      => 'required|min_length[10]|max_length[50]',
    ];
    protected $validationMessages   = [
        'title' => [
            'required'   => 'Judul buku wajib diisi.',
            'min_length' => 'Judul buku minimal harus 3 karakter.',
        ],
        'author' => [
            'required'   => 'Nama penulis/pengarang wajib diisi.',
            'min_length' => 'Nama penulis minimal harus 3 karakter.',
        ],
        'publisher' => [
            'required'   => 'Nama penerbit wajib diisi.',
            'min_length' => 'Nama penerbit minimal harus 3 karakter.',
        ],
        'year' => [
            'required'     => 'Tahun terbit wajib diisi.',
            'numeric'      => 'Tahun terbit harus berupa angka.',
            'exact_length' => 'Tahun terbit harus berupa 4 digit angka.',
        ],
        'category' => [
            'required'   => 'Kategori buku wajib diisi.',
            'min_length' => 'Kategori minimal harus 3 karakter.',
        ],
        'isbn' => [
            'required'   => 'Nomor ISBN wajib diisi.',
            'min_length' => 'ISBN minimal harus 10 karakter.',
        ],
    ];
    protected $skipValidation       = false;
}
