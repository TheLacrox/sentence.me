<?php

namespace App\Repositories;

use App\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Return all the users
     *
     * @return User list
     **/
    public function list()
    {
        return User::all();
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  Array fill with everything (include role)
     * @return User Created
     **/
    public function save($userdata)
    {
        $user = new User;
        $user->fill($userdata)->save();
        $user->assignRole($userdata['role']);
        return $user;
    }

    /**
     * Find the specific User
     *
     * @param  id
     * @return \App\Models\User  $user
     **/
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $formdata
     * @param  Int $id
     * @return User $user Updated user
     **/
    public function update($formdata, $id)
    {
        $user = $this->find($id);
        $user->fill($formdata);
        $user->status_id = $formdata['status'];
        $user->save();
        return $user;
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  Int $id
     * @return Boolean
     **/
    public function destroy($id)
    {
        $user = $this->find($id);
        $user->delete();
        return true;
    }
}
