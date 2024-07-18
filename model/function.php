<?php
include "connect.php";
function getdata($a){ // lấy dữ liệu về 
    $conn=connectdb();
    $sql= $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
    $sql->execute(); // câu lệnh thực thi
    $sql->setFetchMode(PDO::FETCH_ASSOC); // câu lệnh trả về dữ liệu dạng mảng
    $kq=$sql->fetchAll(); // tạo biến chứa tất cả dữ liệu trả về
    return $kq;
 }
 function insert($a){
  $conn=connectdb();
  $sql= $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
  $sql->execute(); // câu lệnh thực thi
 }
 function insert_return_lastInsertId($a){
    $conn=connectdb();
    $sql= $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
    $sql->execute(); // câu lệnh thực thi
    return $conn->lastInsertId();
   }
 function update($a){
  $conn=connectdb();
  $sql= $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
  $sql->execute(); // câu lệnh thực thi
 }
 function delete($a){
  $conn=connectdb();
  $sql= $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
  $sql->execute(); // câu lệnh thực thi
 }
?>