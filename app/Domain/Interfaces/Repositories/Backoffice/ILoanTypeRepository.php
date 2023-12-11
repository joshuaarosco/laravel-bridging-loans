<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface ILoanTypeRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
