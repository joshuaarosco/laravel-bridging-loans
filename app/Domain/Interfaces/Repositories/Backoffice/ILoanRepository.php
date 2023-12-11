<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface ILoanRepository
{
    public function fetch($id);
    
    public function findOrFail($id);
}
