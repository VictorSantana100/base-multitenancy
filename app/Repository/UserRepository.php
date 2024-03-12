<?php

namespace App\Repository;

use App\Models\User;

class UserRepository{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(){
        return $this->user->get();
    }

    public function show($id){
        return $this->user->with('profile', 'company')->findOrFail($id);
    }

    public function store($data){
        return $this->user->create($data);
    }

    public function update($data, $id){
        return $this->show($id)->update($data);
    }

    public function destroy($id){
        return $this->show($id)->delete();
    }
}