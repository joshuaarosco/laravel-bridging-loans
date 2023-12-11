<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IRegisterRepository
{
    public function fetch($id);
    
    public function findOrFail($id);
}
