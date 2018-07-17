<?php
namespace App\Blogs\Repositories;
 interface BlogRepositoryInterface{
    public function all();

    public function save(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}