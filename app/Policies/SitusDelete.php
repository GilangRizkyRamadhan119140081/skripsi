<?php

namespace App\Policies;

use App\Models\SitusBersejarah;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SitusDelete
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SitusBersejarah $situsBersejarah)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SitusBersejarah $situsBersejarah)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SitusBersejarah $situs)
    {
        return $user->id === $situs->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SitusBersejarah $situsBersejarah)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SitusBersejarah $situsBersejarah)
    {
        //
    }
}
