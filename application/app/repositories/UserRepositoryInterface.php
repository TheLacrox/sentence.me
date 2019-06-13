<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Return all the users.
     *
     * @return User list
     **/
    public function list();

    /**
     * Store a newly created User in storage.
     *
     * @param  array fill with everything (include role)
     *
     * @return User Created
     **/
    public function save($userdata);

    /**
     * Find the specific User.
     *
     * @param  int id
     *
     * @return \App\Models\User $user
     **/
    public function find($id);

    /**
     * Update the specified resource in storage.
     *
     * @param array $formdata
     * @param int   $id
     *
     * @return User $user Updated user
     **/
    public function update($formdata, $id);

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return bool
     **/
    public function destroy($id);
}
