<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IProductRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
