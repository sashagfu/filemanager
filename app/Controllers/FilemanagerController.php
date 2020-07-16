<?php

class FilemanagerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show folder content.
     */
    public function show()
    {
        $path = Config::get('main_path');

        $routerParams = App::getRouter()->getParams();

        if ($routerParams && $routerParams[0]) {
            $path = base64_decode($routerParams[0]);
        }

        $folder = new Folder($path);

        $items = scandir($path);

        $folders = [];
        $files = [];

        for ($i = 2; $i < count($items); $i++) {
            if (is_file($path.DS.$items[$i])) {
                $files[] = new File($path.DS.$items[$i]);
            } else {
                $folders[] = new Folder($path.DS.$items[$i]);
            }
        }

        $data['tz'] = $this->tz;
        $data['current_folder'] = $folder;
        $data['folders'] = $folders;
        $data['files'] = $files;

        $this->view('filemanager.show', $data);
    }

    /**
     * Show file content.
     */
    public function file()
    {
        $routerParams = App::getRouter()->getParams();

        if ($routerParams) {
            $folder_slug = $routerParams[0];
            $path = base64_decode($routerParams[1]);
        }

        $data['folder_slug'] = $folder_slug;
        $data['file'] = new File($path);

        $this->view('filemanager.file', $data);
    }
}
