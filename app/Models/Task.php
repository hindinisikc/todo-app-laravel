<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Add 'title' to the fillable property to allow mass assignment
    protected $fillable = ['title', 'day', 'time', 'completed']; // Add 'day' and 'time' here
}
