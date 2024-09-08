<?php

namespace App\Models;

use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function completedTodos()
    {
        return Todo::where('status_id', 2)->get()->sortByDesc('id');
    }

    public static function pendingTodos()
    {
        return Todo::where('status_id', '!=', 2)->get()->sortByDesc('id');
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }
}
