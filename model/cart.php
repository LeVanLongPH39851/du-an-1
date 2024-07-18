<?php
function viewcart($del){
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th="<th>Thao tác</th>";
        $xoasp_td2="<td></td>";
    }else{
        $xoasp_th="";
        $xoasp_td2="";
    }
    echo'<tr>
    <th>Ảnh</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    '.$xoasp_th.'
   </tr>';
    foreach ($_SESSION['mycart'] as $cart){
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
        $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
        if($del==1){
            $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>'; 
        }else{
            $xoasp_td="";
        }
        echo '<tr>
         <td><img src="img/'.$cart[2].'" alt="" height=80px></td>
         <td>'.$cart[1].'</td>
         <td>'.$cart[3].'</td>
         <td>'.$cart[4].'</td>
         <td>'.$ttien.'</td>
         '.$xoasp_td.'
       </tr>';
       $i+=1;
    }
    echo'<tr>
          <td colspan="4">Tổng đơn hàng</td>
          <td>'.$tong.'</td>
          '.$xoasp_td2.'
        </tr>';
}
function tongdonhang(){
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart){
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
        
    }
    return $tong;
}
function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $a = "INSERT INTO `bill`(`iduser`,`bill_name`, `bill_email`, `bill_address`,`bill_tel`, `bill_pttt`,`ngaydathang`,`total`) VALUES ('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return insert_return_lastInsertId($a);
 }
 function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $a = "INSERT INTO `cart`(`iduser`, `idpro`, `img`, `name`,`price`,`soluong`,`thanhtien`,`idbill`) VALUES ('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return insert($a);
 } 
 function loadone_bill($id) {
    $bill=getdata("SELECT * FROM `bill` WHERE `id`=".$id);
    return $bill;
}
function loadall_cart($idbill) {
    $bill=getdata("SELECT * FROM `cart` WHERE `idbill`=".$idbill);
    return $bill;
}
function loadall_cart_count($idbill) {
    $bill=getdata("SELECT * FROM `cart` WHERE `idbill`=".$idbill);
    return sizeof($bill);
}
function bill_chi_tiet($listbill){
    $tong=0;
    $i=0;
    echo'<tr>
    <th>Ảnh</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
   </tr>';
    foreach ($listbill as $cart){
        $tong+=$cart['thanhtien'];
        echo '<tr>
         <td><img src="img/'.$cart['img'].'" alt="" height=80px></td>
         <td>'.$cart['name'].'</td>
         <td>'.$cart['price'].'</td>
         <td>'.$cart['soluong'].'</td>
         <td>'.$cart['thanhtien'].'</td>
       </tr>';
       $i+=1;
    }
    echo'<tr>
          <td colspan="4">Tổng đơn hàng</td>
          <td>'.$tong.'</td>
        </tr>';
}
function loadall_bill($kyw="",$iduser=0) {
    $sql = "SELECT * FROM `bill` WHERE 1";
    if($iduser>0){
        $sql.=" AND `iduser`=".$iduser;
    }if($kyw!=""){
        $sql.=" AND `id` like '%".$kyw."%'";
    }
    $sql.=" ORDER BY `id` DESC";
    $listbill=getdata($sql);
    return $listbill;
}
function get_ttdh($n){
    switch($n){
        case 0:
            $tt="Đơn hàng mới";
            break;
        case 1:
            $tt="Đang sử lý";
            break;
        case 2:
            $tt="Đang giao hàng";
            break;
        case 3:
            $tt="Đã giao hàng";
            break;  
        default:
           $tt="Đơn hàng mới";
           break;     
    }
    return $tt;
}
?>