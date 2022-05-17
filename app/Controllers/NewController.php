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
            $picture_file->move(FCPATH . 'uploads/images', $picture);

            //connection to the database, replace with your own credentials
            $image = $_FILES['product_image']['name'];
            $file_tmp = $_FILES['product_image']['tmp_name'];
            //location to save image once uploaded
            $dir = "images/";
            //create a new image name
            $newName = time() . ".webp";
            //upload image to server
            if (move_uploaded_file($file_tmp, $dir . $image)) {
                //Create a png object can either be jpg png or gif
                $img = imagecreatefrompng($dir . $image);
                //Quality can be a value between 1-100.
                $quality = 100;
                //Create the webp image.
                imagewebp($img, $dir . $newName, $quality);
                imagedestroy($img);
                //delete initial uploaded png image
                unlink($dir . $image);
            } else {
                echo "error";
            }
            $data =  [
                "title" => $this->request->getVar("title"),
                "description" => $this->request->getVar("description"),
                "content" => $this->request->getVar("content"),
                "image" => $picture,
                "created_at" => date("Y-m-d")
            ];
            $newModel->insert($data);
        } else {
            echo '<pre>', var_dump($this->validator->listErrors()), '</pre>';
        }
        return redirect()->route('admin.news.all');
    }
}
