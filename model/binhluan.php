<?php
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $a = "INSERT INTO `binhluan`(`noidung`,`iduser`,`idpro`,`ngaybinhluan`) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    insert($a);
 }
 function loadall_binhluan($idpro) {
    $a="SELECT * FROM `binhluan` WHERE 1";
    if($idpro>0){
        $a.=" AND idpro='".$idpro."'";
    }else{
        $a.=" ORDER BY `id` DESC";
    }
    $listbinhluan=getdata($a);
    return $listbinhluan;
}
function delete_binhluan($id) {
    delete("DELETE FROM `binhluan` WHERE `id`=".$id);
}
?>