<?php
function insert_taikhoan($email,$user,$pass){
    $a = "INSERT INTO `taikhoan`(`email`, `user`, `pass`) VALUES ('$email','$user','$pass')";
    insert($a);
 }
function checkuser($user,$pass) {
    $sp=getdata("SELECT * FROM `taikhoan` WHERE `user`='".$user."' AND `pass`='".$pass."'");
    return $sp;
} 
function checkemail($email) {
    $sp=getdata("SELECT * FROM `taikhoan` WHERE `email`='".$email."'");
    return $sp;
} 
function update_taikhoan($id,$user,$pass,$email,$address,$tel){
        update("UPDATE `taikhoan` SET `user`='$user',`pass`='$pass',`email`='$email',`address`='$address',`tel`='$tel' WHERE `id`=".$id);
}
function loadall_taikhoan() {
    $listtaikhoan=getdata("SELECT * FROM `taikhoan` ORDER BY `id` DESC");
    return $listtaikhoan;
}
?>