<div class="row mb">
        <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div class="row boxcontent formtaikhoan">
            <form action="index.php?act=edit_taikhoan" method="post">
                <div class="row mb10">
                Email  
                <input type="email" name="email" value="<?=$_SESSION['user'][0]['email']?>">
                </div>
                <div class="row mb10">
                Tên đăng nhập
                <input type="text" name="user" value="<?=$_SESSION['user'][0]['user']?>">
                </div>
                <div class="row mb10">
                Mật khẩu
                <input type="password" name="pass" value="<?=$_SESSION['user'][0]['pass']?>">
                </div>
                <div class="row mb10">
                Địa chỉ
                <input type="text" name="address" value="<?=$_SESSION['user'][0]['address']?>">
                </div>
                <div class="row mb10">
                Điện thoại
                <input type="password" name="tel" value="<?=$_SESSION['user'][0]['tel']?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$_SESSION['user'][0]['id']?>">
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
                </div>
            </form>
            <h2 class="thongbao">
            <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
            ?>
            </h2>
            </div>
          </div>
 
        </div>
        <div class="boxphai">
        <?php 
        include "view/boxright.php";
        ?>
        </div>
      </div>