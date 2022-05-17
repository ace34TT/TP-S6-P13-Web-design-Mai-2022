<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewModel;

class NewController extends BaseController
{
    public function index()
    {
        //
    }

    public function insert()
    {
        if ($this->validate([
            'r' => [
                'uploaded[picture]',
                "max_size[picture,5000]",
            ]
        ])) {
            $newModel = new NewModel();
            $picture_file = $this->request->getFile('picture');
            $picture = $picture_file->getRandomName();

            $picture_file->move(FCPATH . 'public/uploads/images', $picture);
            $data =  [
                "title" => $this->request->getVar("title"),
                "description" => $this->request->getVar("description"),
                "content" => $this->request->getVar("content"),
                "image" => $picture,
                "created_at" => date("Y-m-d")
            ];
            // $newModel->insert($data);
        } else {
            echo '<pre>', var_dump($this->validator->listErrors()), '</pre>';
        }
        return redirect()->route('admin.news.all');
    }
}
