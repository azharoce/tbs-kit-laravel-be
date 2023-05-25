<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = [
        'name',
        'code',
        'status',
        'parent'
    ];

    public static function data()
    {
        return Menu::select('id', 'name', 'code', 'status', 'parent')->where('parent', 0)
            ->get();
    }
    public static function dataChildMenu($parentid)
    {
        return Menu::select('id', 'name', 'code', 'status', 'parent')->where('parent', $parentid)->get();
    }
}
