<?php

namespace App\Controllers;

// use Codeigniter\RESTful\ResourceController;
use CodeIgniter\RESTful\ResourceController;

class UploadController extends ResourceController
{
    public function uploadGambar()
    {
        $file = $this->request->getFile('file');

        //check if afile was uploaded and is valid
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); //generate a new unique name
            // $file->move(WRITEPATH . 'uploads', $newName); // save file to writeable/uploads
            $file->move(WRITEPATH . '../public/images', $newName); // save file to writeable/uploads

            return $this->respond([
                'status' => 200,
                'message' => 'file uploaded successfully',
                'file_name' => $newName
            ]);

            return $this->fail('file upload failed', 400);
        }

        // $image = $_FILES['image'];
        // $targetDirectory = "uploads/";
        // $targetFile = $targetDirectory . basename($image['name']);
        // if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        //     echo json_encode(["message" => "Image uploaded successfully"]);
        // } else {
        //     echo json_encode(["message" => "Failed to upload image"]);
        // }

        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
    }
}
