<?php  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $name = $_POST['name'];  
    $email = $_POST['email'];  
    $file = $_FILES['file'];  
  
    // 指定保存文件的目录（请确保该目录具有写入权限）  
    $dir = 'uploads/';  
  
    // 检查目录是否存在，不存在则创建目录  
    if (!is_dir($dir)) {  
        mkdir($dir, 0777, true);  
    }  
  
    // 检查上传的文件类型  
    $allowed_ext = array('docx', 'pdf'); // 允许上传的扩展名  
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);  
    if (!in_array($file_extension, $allowed_ext)) {  
        echo '只允许上传docx和PDF文件！';  
        exit;  
    }  
  
    // 获取文件信息和生成唯一的文件名  
    $fileinfo = pathinfo($file['name']);  
    $filename = $fileinfo['filename'];  
    $extension = $fileinfo['extension'];  
    $unique_filename = uniqid() . '_' . $filename . '.' . $extension;  
    $saved_file = $dir . $unique_filename;  
  
    // 将文件移动到指定目录  
    if (move_uploaded_file($file['tmp_name'], $saved_file)) {  
        echo '文件上传成功！保存路径：' . $saved_file;  
    } else {  
        echo '文件上传失败！';  
    }  
} else {  
    echo '无效的请求！';  
}  
?>