<?php


namespace App\Controllers;

use App\Models\FileModel;
use App\Models\View;
use Exception;

class FilesController
{
    public function showUploadForm()
    {
        $render = new View();
        $fileForm = $render->render('loadFile.phtml', [

        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $fileForm
        ]);

        print ($layoutContent);
    }

    /**
     * @return int
     * @throws Exception
     */
    public function addNewFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $about = $_POST['file']['about'] ?? 'Аватар';
            $file = $_FILES['jpg_img'];
        }

        if(isset($file) && isset($about)) {
        $model = new FileModel();
        $ret = $model->addFile($file, $about);

        }
        if(!isset($ret)) {
            throw new Exception('Загрузка не удалась.');
        }
        header('Location: /file_list');
    }

    public function showFiles()
    {
        $model = new FileModel();
        $listf = $model->getFileList();

        $render = new View();
        $fileList = $render->render('fileList.phtml', [
            'listf' => $listf
        ]);
        $layoutContent = $render->render('layout.phtml', [
            'content' => $fileList
        ]);

        print ($layoutContent);
    }
}