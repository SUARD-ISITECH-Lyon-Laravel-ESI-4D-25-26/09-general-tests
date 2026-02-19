<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function check_update(string $name, string $email)
    {
        // TÂCHE : trouvez un utilisateur (User) par son $name et mettez à jour son $email
        //   si aucun utilisateur n'est trouvé, créez-en un avec $name, $email et un mot de passe aléatoire
        // Indice : utilisez la méthode updateOrCreate() d'Eloquent
        // Votre code ici

        return $user->name;
    }
}
