<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email','username','password_hash','role','created_at','updated_at'];
    protected $useTimestamps = true;
    protected $returnType = 'array';
}
