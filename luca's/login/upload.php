<?php
// 检查是否为POST请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取上传的文件信息
    $files = $_FILES['files'];

    // 检查文件类型是否为docx或pdf，并限制一次最多上传四个文件
    $allowedExtensions = array('docx', 'pdf');
    $maxFiles = 4;
    $uploadedFilesCount = count($files['name']);
    if ($uploadedFilesCount > $maxFiles) {
        echo 'You can only upload at most once' . $maxFiles . 'Files';
        exit;
    }

    // 遍历上传的文件并处理它们
    for ($i = 0; $i < $uploadedFilesCount; $i++) {
        $file = $files['name'][$i]; // 获取上传的文件名
        $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // 获取文件的扩展名
        if (in_array($fileExtension, $allowedExtensions)) { // 检查文件类型是否为docx或pdf
            // 确定保存文件的目录和文件名
            $uploadDir = 'assets/upload/'; // 替换为你的保存目录路径

            // 检查目录是否存在，如果不存在，则尝试创建
            if (!file_exists($uploadDir) && !mkdir($uploadDir, 0777, true)) {
                die('Unable to create directory');
            }

            $uploadFileName = $uploadDir . $file; // 拼接完整的文件名和路径

            // 将文件移动到目标目录
            if (move_uploaded_file($files['tmp_name'][$i], $uploadFileName)) {
                // 显示上传成功的消息和文件名
                echo 'File upload successful! file name：' . $file;
            } else {
                echo 'File upload failed';
            }
        } else {
            echo 'Only allow uploading docx or pdf files';
        }
    }
} else {
    echo 'illegal request';
}
?>