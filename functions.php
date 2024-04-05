<?php 
// $date là biến có giá trị là ngày chuẩn quốc tế. E.g: 2021-05-13
//Hàm này sẽ đổi sang ngày theo định dạng của việt nam. E.g: 13/05/2021
function convertDateToVNFormat($date)
{
    $timestamp=strtotime($date);//hàm này dổi sang ngày sang đơn vị giây tính từ ngày 01/01/1970
    $vnFormatDate=date("d/m/Y",$timestamp);
    return $vnFormatDate;
}

//$gender là số
// $gender là số 0, 1 hoặc 2
function getGenderName($gender) {
    $genderMap = ["M" => "Nam", "F" => "Nữ", "K" => "Khác"];
    $genderName = $genderMap[$gender];
    return $genderName;
}


// Sử dụng hàm addslashes để thêm ký tự escape vào trước các ký tự đặc biệt
function filter_injection($input) {
    $filtered_input = addslashes($input);
    return $filtered_input;
}

?>
