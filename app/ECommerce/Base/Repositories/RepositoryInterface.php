<?php

namespace ECommerce\Base\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function edit(array $data, $id);
    public function search($search);
    public function delete($id);
}
