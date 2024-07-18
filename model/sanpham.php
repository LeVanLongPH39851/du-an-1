<?php
function insert_sanpham($tensp,$giasp,$anh,$mota,$iddm){
   $a = "INSERT INTO `sanpham`(`name`, `price`, `img`, `mota`,`iddm`) VALUES ('$tensp','$giasp','$anh','$mota','$iddm')";
   insert($a);
}
function delete_sanpham($id) {
    delete("DELETE FROM `sanpham` WHERE `id`=".$id);
}
function loadall_sanpham($kyw,$iddm) {
    $a = "SELECT * FROM `sanpham` WHERE 1";
    if($kyw!=""){
        $a.=" AND `name` LIKE '%".$kyw."%'";
    }
    if($iddm>0){
        $a.=" AND `iddm` = '".$iddm."'";
    }
    $a.=" ORDER BY id desc";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function loadall_sanpham_home() {
    $a = "SELECT * FROM `sanpham` ORDER BY `id` DESC LIMIT 0,9";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function loadall_sanpham_top10() {
    $a = "SELECT * FROM `sanpham` ORDER BY `luotxem` DESC LIMIT 0,10";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function load_ten_dm($iddm) {
    if($iddm>0){
    $dm=getdata("SELECT * FROM `danhmuc` WHERE `id`=".$iddm);
    return $dm;
    }else{
    return "";
}
}
function loadone_sanpham($id) {
    $sp=getdata("SELECT * FROM `sanpham` WHERE `id`=".$id);
    return $sp;
}
function load_sanphamcungloai($id,$iddm) {
    $listsanpham=getdata("SELECT * FROM `sanpham` WHERE `iddm`=".$iddm." AND `id` <> ".$id." ORDER BY `id` DESC");
    return $listsanpham;
}
function update_sanpham($id,$tensp,$giasp,$anh,$mota,$iddm){
    if($anh!=""){
        update("UPDATE `sanpham` SET `name`='$tensp',`img`='$anh',`price`='$giasp',`mota`='$mota',`iddm`='$iddm' WHERE `id`=".$id);
    }else{
        update("UPDATE `sanpham` SET `name`='$tensp',`price`='$giasp',`mota`='$mota',`iddm`='$iddm' WHERE `id`=".$id);
    }
}
?>