<?php
// Kiểm tra xem đã có tệp tin được tải lên hay chưa
if ($_FILES['fileToScan']['error'] === UPLOAD_ERR_OK) {
    // Lấy đường dẫn tạm của tệp tin đã tải lên
    $tmpFilePath = $_FILES['fileToScan']['tmp_name'];

    // Kiểm tra tệp tin bằng ClamAV
    $clamAV = new ClamAV();
    $result = $clamAV->scanFile($tmpFilePath);

    // Kiểm tra kết quả của ClamAV
    if ($result === ClamAV::VIRUS_FOUND) {
        echo "Tệp tin đáng nghi.";
    } elseif ($result === ClamAV::NO_VIRUS_FOUND) {
        echo "Tệp tin không đáng nghi.";
    } else {
        echo "Lỗi khi kiểm tra tệp tin.";
    }

    // Xóa tệp tin tạm sau khi đã kiểm tra
    unlink($tmpFilePath);
} else {
    echo "Lỗi khi tải lên tệp tin.";
}
?>