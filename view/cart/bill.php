<div class="row mb">
        <div class="boxtrai mr">
        <form action="index.php?act=billcomfirm" method="post">
        <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform">
                    <table>
                        <tr>
                            <?php
                            if(isset($_SESSION['user'])){
                                $name=$_SESSION['user'][0]['user'];
                                $address=$_SESSION['user'][0]['address'];
                                $email=$_SESSION['user'][0]['email'];
                                $tel=$_SESSION['user'][0]['tel'];
                            }else{
                                $name="";
                                $address="";
                                $email="";
                                $tel="";
                            }
                            ?>
                            <td>Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?=$name?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" value="<?=$address?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email"value="<?=$email?>"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="tel"value="<?=$tel?>"></td>
                        </tr>
                    </table>
            </div>
          </div>
          <div class="row mb">
            <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
            <div class="row boxcontent pttt">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt"> Trả tiền khi nhận hàng</td>
                        <td><input type="radio" name="pttt">Chuyển khoản ngân hàng</td>
                        <td><input type="radio" name="pttt">Thanh toán online</td>
                    </tr>
                </table>
        </div>
        </div>
        <div class="row mb">
            <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
            <div class="row boxcontent cart">
                <table>
                    <?php viewcart(0);?>
                </table>
                </div>
        </div>
        <div class="row mb bill">
             <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
        </div>
        </div>
        </form>
        <div class="boxphai">
        <?php 
        include "view/boxright.php";
        ?>
        </div>
      </div>
      