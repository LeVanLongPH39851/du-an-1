<?php
function insert_danhmuc($tenloai){
   $a = "INSERT INTO `danhmuc`(`name`) VALUES ('$tenloai')";
   insert($a);
}
function delete_danhmuc($id) {
    delete("DELETE FROM `danhmuc` WHERE `id`=".$id);
}
function loadall_danhmuc() {
    $listdanhmuc=getdata("SELECT * FROM `danhmuc` ORDER BY `id` DESC");
    return $listdanhmuc;
}
function loadone_danhmuc($id) {
    $dm=getdata("SELECT * FROM `danhmuc` WHERE `id`=".$id);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    update("UPDATE `danhmuc` SET `name`= '$tenloai' WHERE `id`= $id");
}
?>