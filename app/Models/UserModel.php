<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'name'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username,id,{id}]',
        'password' => 'required|min_length[6]',
        'name'     => 'required|min_length[3]|max_length[100]',
    ];
    protected $validationMessages   = [
        'username' => [
            'required'  => 'Username wajib diisi.',
            'is_unique' => 'Username ini sudah terdaftar.',
            'min_length' => 'Username minimal harus 3 karakter.'
        ],
        'password' => [
            'required'  => 'Password wajib diisi.',
            'min_length' => 'Password minimal harus 6 karakter.'
        ],
        'name' => [
            'required'  => 'Nama lengkap wajib diisi.'
        ]
    ];
    protected $skipValidation       = false;
}
