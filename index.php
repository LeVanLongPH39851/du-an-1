<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css" />
    <title>Dự án mẫu</title>
  </head>
  <body>
    <div class="boxcenter">
        <?php
        session_start();
        include "model/function.php";
        include "model/danhmuc.php";
        include "model/sanpham.php";
        include "model/taikhoan.php";
        include "model/cart.php";
        include "view/header.php";
        if(!isset($_SESSION['mycart'])){
            $_SESSION['mycart']=[];
        }
        $spnew=loadall_sanpham_home();
        $dsdm=loadall_danhmuc();
        $dstop10=loadall_sanpham_top10();
        if(isset($_GET['act']) && $_GET['act']!=""){
            $act=$_GET['act'];
            switch($act){
                case "sanpham":
                    if(isset($_POST['kyw']) && $_POST['kyw']!=""){
                       $kyw = $_POST['kyw'];
                    }else{
                        $kyw="";
                    }
                    if(isset($_GET['iddm']) && $_GET['iddm']>0){
                        $iddm=$_GET['iddm'];
                    }else{
                        $iddm=0;
                    }
                    $dssp=loadall_sanpham($kyw,$iddm);
                    $tendm=load_ten_dm($iddm);
                    include "view/sanpham.php";
                    break;
                case "sanphamct":
                    if(isset($_GET['idsp']) && $_GET['idsp']>0){
                        $id=$_GET['idsp'];
                        $onesp=loadone_sanpham($id);
                        $sp_cung_loai=load_sanphamcungloai($id,$onesp[0]['iddm']);
                        include "view/sanphamct.php";
                    }else{
                        include "view/home.php";
                    }
                    break;
                case "dangky":
                    if(isset($_POST['dangky']) && $_POST['dangky']){
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        insert_taikhoan($email,$user,$pass);
                        $thongbao="Đã đăng ký thành công. Vui lòng đăng nhập";
                    }
                    include "view/taikhoan/dangky.php";
                    break;
                case "dangnhap":
                    if(isset($_POST['dangnhap']) && $_POST['dangnhap']){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $checkuser = checkuser($user,$pass);
                        $isTwoDimensionalArray = is_array($checkuser) && count($checkuser) > 0 && count(array_filter($checkuser, 'is_array')) === count($checkuser);
                    if($isTwoDimensionalArray){
                        $_SESSION['user']=$checkuser;
                        // $thongbao="Đã đăng đăng nhập thành công";
                        header("Location: index.php");                             
                    }else{
                        $thongbao="Tài khoản không tồn tại";
                        include "view/home.php";
                        }                            
                    }
                    break;
                case "edit_taikhoan":
                    if(isset($_POST['capnhat']) && $_POST['capnhat']){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_POST['id'];
                        update_taikhoan($id,$user,$pass,$email,$address,$tel);
                        $_SESSION['user'] = checkuser($user,$pass);
                        header("Location: index.php?act=edit_taikhoan");
                    }
                        include "view/taikhoan/edit_taikhoan.php";
                    break; 
                case "quenmk":
                    if(isset($_POST['guiemail']) && $_POST['guiemail']){
                        $email = $_POST['email'];
                        $checkemail=checkemail($email);
                        $isTwoDimensionalArray = is_array($checkemail) && count($checkemail) > 0 && count(array_filter($checkemail, 'is_array')) === count($checkemail);
                    if($isTwoDimensionalArray){
                        $thongbao = "Mật khẩu của bạn là: ".$checkemail[0]['pass'];                             
                    }else{
                        $thongbao = "Email này không tồn tại";
                        }
                    }
                    include "view/taikhoan/quenmk.php";
                    break; 
                case "thoat":
                    unset($_SESSION['user']);
                    header("Location: index.php");
                    break;      
                case "gioithieu":
                    include "view/gioithieu.php";
                    break;
                case "lienhe":
                    include "view/lienhe.php";
                    break;
                case "gopy":
                    include "view/gopy.php";
                    break;
                case "hoidap":
                    include "view/hoidap.php";
                    break;
                case "addtocart":
                    //add thông tin sp từ cái form add to cart đến session
                    if(isset($_POST['addtocart']) && $_POST['addtocart']){
                        $id=$_POST['id'];
                        $name=$_POST['name'];
                        $img=$_POST['img'];
                        $price=$_POST['price'];
                        $soluong=1;
                        $ttien = $soluong * $price;
                        $spadd=[$id,$name,$img,$price,$soluong,$ttien];
                        array_push($_SESSION['mycart'],$spadd);
                    }
                    include "view/cart/viewcart.php";
                    break;       
                case "delcart":
                    if(isset($_GET['idcart'])){
                      array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                    }else{
                        $_SESSION['mycart']=[];
                    }
                    header("Location: index.php?act=viewcart");
                    break;     
                case "viewcart":
                    include "view/cart/viewcart.php";
                    break;
                case "bill":
                    include "view/cart/bill.php";
                    break;    
                case "billcomfirm":
                    if(isset($_POST['dongydathang']) && $_POST['dongydathang']){
                        if(isset($_SESSION['user'])){
                            $iduser=$_SESSION['user'][0]['id'];
                        }else{
                            $iduser=0;
                        }
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $pttt = $_POST['pttt'];
                        $tel = $_POST['tel'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ngaydathang=date('h:i:sa d/m/Y');
                        $tongdonhang=tongdonhang();
                         //tạo bill
                        $idbill=insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                        //insert into cart : $_SESSION["mycart"] & idbill
                        foreach($_SESSION["mycart"] as $cart){
                            insert_cart($_SESSION['user'][0]['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                        }
                        //Xóa session
                       $_SESSION['mycart']=[];
                    }
                    $bill=loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    include "view/cart/billcomfirm.php";
                    break;  
                    case "mybill":
                        $listbill=loadall_bill("",$_SESSION['user'][0]['id']);
                        include "view/cart/mybill.php";
                        break;
            }
        }else{
            include "view/home.php";
        }
        include "view/footer.php";
        ?>
    </div>
  </body>
</html>