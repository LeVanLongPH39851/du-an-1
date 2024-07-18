<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Admin</title>
</head>
<body>
    <div class="boxcenter">
    <?php
    include "../model/function.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "../model/cart.php";
    include "header.php";
    //controller
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                //kiểm tra xem người dùng có click nút add hay không
                if(isset($_POST['themmoi'])&&$_POST['themmoi']){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&$_GET['id']>0){
                  delete_danhmuc($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':        
            if(isset($_GET['id']) && $_GET['id']>0){
                $dm=loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
            case 'updatedm': 
                if(isset($_POST['capnhat'])&&$_POST['capnhat']){
                    $tenloai=$_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                //controller sản phẩm
                case 'addsp':
                    //kiểm tra xem người dùng có click nút add hay không
                    if(isset($_POST['themmoi'])&&$_POST['themmoi']){
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $giasp=$_POST['giasp'];
                        $anh=$_FILES['anh']['name'];
                        $mota=$_POST['mota'];
                        $tmp=$_FILES['anh']['tmp_name'];
                        $move="../img/".$anh;
                        move_uploaded_file($tmp,$move);
                        insert_sanpham($tensp,$giasp,$anh,$mota,$iddm);
                        $thongbao = "Thêm thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                case 'listsp':
                    if(isset($_POST['listok'])&&$_POST['listok']){
                        $kyw =$_POST['kyw'];
                        $iddm=$_POST['iddm'];
                    }else{
                        $kyw="";
                        $iddm=0;
                    }
                    $listdanhmuc=loadall_danhmuc();
                    $listsanpham=loadall_sanpham($kyw,$iddm);
                    include "sanpham/list.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&$_GET['id']>0){
                      delete_sanpham($_GET['id']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
                case 'suasp':        
                if(isset($_GET['id']) && $_GET['id']>0){
                    $sanpham=loadone_sanpham($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break;
                case 'updatesp': 
                    if(isset($_POST['capnhat'])&&$_POST['capnhat']){
                        $id=$_POST['id'];
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $giasp=$_POST['giasp'];
                        $anh=$_POST['anh'];
                        $mota=$_POST['mota'];
                        $file=$_FILES['anh']['name'];
                        $tmp=$_FILES['anh']['tmp_name'];
                        $move="../img/".$file;
                        move_uploaded_file($tmp,$move);
                        update_sanpham($id,$tensp,$giasp,$file,$mota,$iddm);
                        $thongbao = "Cập nhật thành công";
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;
                case 'dskh':
                        $listtaikhoan=loadall_taikhoan();
                        include "taikhoan/list.php";
                    break;
                case 'dsbl':
                        $listbinhluan=loadall_binhluan(0);
                        include "binhluan/list.php";
                    break;           
                    case 'xoabl':
                        if(isset($_GET['id'])&&$_GET['id']>0){
                          delete_binhluan($_GET['id']);
                        }
                        $listbinhluan=loadall_binhluan(0);
                        include "binhluan/list.php";
                        break;
                    case 'thongke':
                           $listthongke=loadall_thongke();
                        include "thongke/list.php";
                        break;
                    case 'bieudo':
                            $listthongke=loadall_thongke();
                         include "thongke/bieudo.php";
                         break;         
                    case 'listbill':
                        if(isset($_POST['kyw'])&&$_POST['kyw']!=""){
                            $kyw = $_POST['kyw'];
                        }else{
                            $kyw ="";
                        }
                        $listbill=loadall_bill($kyw,0);
                        include "bill/listbill.php";
                        break;     
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    ?>
    </div>
</body>
</html>
