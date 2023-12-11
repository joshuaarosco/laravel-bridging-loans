<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IUserRepository
{
    public function fetch();

    public function saveData($request);

    public function findOrFail($id);

    public function deleteData($id);
}
