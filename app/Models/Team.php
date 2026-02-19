<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users(): BelongsToMany
    {
        // TÂCHE : complétez cette relation en ajoutant les champs supplémentaires du pivot (pivot table)
        // Indice : utilisez withPivot() pour récupérer les colonnes 'position' et 'created_at' du pivot
        return $this->belongsToMany(User::class);
    }
}
