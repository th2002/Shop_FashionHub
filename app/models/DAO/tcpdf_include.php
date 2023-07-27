<?php
// tcpdf_include.php

// Đường dẫn tới thư mục chứa các tệp của thư viện TCPDF
$tcpdfPath = 'tcpdf/';

// Nạp các tệp của thư viện TCPDF
require_once $tcpdfPath . 'tcpdf.php';
require_once $tcpdfPath . 'include/tcpdf_fonts.php'; // Nạp tệp ngôn ngữ nếu cần
// ... Nạp các tệp khác của TCPDF nếu cần ...

?>