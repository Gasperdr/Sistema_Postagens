<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Facades\Auth;

class Post extends Model
{
//     /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $table = 'posts';
    
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'slug',
        'id_user',

    ];
    public function autor()
{
    return $this->belongsTo(User::class, 'id_user');
}
}
