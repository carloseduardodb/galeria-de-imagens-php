<?php

$folder = __DIR__."/uploads";

if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder, 0755);
}

var_dump([
    "filesize" => ini_get("upload_max_filesize"),
    "postsize" => ini_get("post_max_size")
]);

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if($_FILES && !empty($_FILES['file']['name']))
{
    $fileUpload = $_FILES["file"];

    $allowedTypes = [
        "image/jpg",
        "image/png",
        "image/jpeg"
    ];

    $newFilename = time() . mb_strstr($fileUpload['name'], '.');

    if(in_array($fileUpload['type'], $allowedTypes)){
        if(move_uploaded_file($fileUpload['tmp_name'], __DIR__."/uploads/{$newFilename}")){
            header("Location:"."index.php?success=1");
        }else{
            header("Location:"."index.php?success=0");
        }
    }else{
        header("Location:"."index.php?permission=0");
    }

}
else if($getPost)
{
    header("Location:"."index.php?size=0");
}
else
{
    if($_FILES){
        header("Location:"."index.php?arquive=0");
    }
}