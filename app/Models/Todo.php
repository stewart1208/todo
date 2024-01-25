<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'difficulty', 'status', 'user_id'];

    // Enumerations possibles pour le champ 'difficulty'
    public const DIFFICULTY_EASY = 'easy';
    public const DIFFICULTY_HARD = 'hard';

    // Méthodes d'assesseur pour le champ 'difficulty'
    public function getDifficultyAttribute($value)
    {
        return ucfirst($value);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
