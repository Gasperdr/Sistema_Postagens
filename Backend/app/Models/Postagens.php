<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagens extends Model
{
    /** @use HasFactory<\Database\Factories\PostagensFactory> */
    use HasFactory;

    protected $tabel = 'postagens';
}
