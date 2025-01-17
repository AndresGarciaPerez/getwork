<?php

namespace App\Policies;

use App\Models\Candidato;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CandidatoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Candidato $candidato): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Candidato $candidato): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Candidato $candidato): bool
    {
        //Accedemos primero a candidato de ahi a vacante y de ahi a user_id, que es el que creo la vacanate 
        $candidato_id = $candidato->vacante->user_id; //Gracias a la relacion en el modelo

        //comparamos si el usuario actual es el mismo que el usuario que creo la vacante 
        return $user->id === $candidato_id; 

        //si el mismo entonces tiene el permiso del policy
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Candidato $candidato): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Candidato $candidato): bool
    {
        return false;
    }
}
