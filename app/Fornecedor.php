<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;  // trait (herança vertical)
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
