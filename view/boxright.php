<div class="row mb">
            <div class="boxtitle">TÀI KHOẢN</div>
            <div class="boxcontent formtaikhoan">
              <?php
              if(isset($_SESSION['user'])){
              ?>
                <div class="row mb10">
                Xin chào <b><?=$_SESSION['user'][0]['user']?></b>
              </div>
              <div class="row mb10">
                <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                <?php
                if($_SESSION['user'][0]['role']==1){
                ?>
                <li><a href="admin/index.php">Đăng nhập Admin</a></li>
              <?php }?>
              <li><a href="index.php?act=thoat">Thoát</a></li>
              </div>
              <?php
               }else{
              ?>
              <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                  Tên đăng nhập <br /><input type="text" name="user" />
                </div>
                <div class="row mb10">
                  Mật khẩu <br /><input type="password" name="pass" />
                </div>
                <div class="row mb10">
                  <input type="checkbox" name="" id="" /> Ghi nhớ tài khoản?
                </div>
                <div class="row mb10">
                  <input type="submit" value="Đăng nhập" name="dangnhap"/>
                </div>
                <p class="thongbao">
            <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
            ?>
            </p>
              </form>
              <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
              <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
              <?php }?>
            </div>
          </div>
          <div class="row mb">
            <div class="boxtitle">DANH MỤC</div>
            <div class="boxcontent2 menudoc">
              <ul>
                <?php
                foreach($dsdm as $dm){
                  extract($dm);
                  $linkdm="index.php?act=sanpham&iddm=".$id;
                  echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                }
                ?>
                <!-- <li><a href="#">Áo thun</a></li>
                <li><a href="#">Áo polo</a></li>
                <li><a href="#">Áo khoác</a></li>
                <li><a href="#">Áo dài tay</a></li>
                <li><a href="#">Quần short</a></li>
                <li><a href="#">Quần jeans</a></li>
                <li><a href="#">Mũ</a></li> -->
              </ul>
            </div>
            <div class="boxfooter searchbox">
              <form action="index.php?act=sanpham" method="post">
                <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm" />
              </form>
            </div>
          </div>
          <div class="row">
            <div class="boxtitle">TOP 10 YÊU THÍCH</div>
            <div class="row boxcontent top10">
            <?php
            foreach($dstop10 as $sp){
              extract($sp);
              $linksp="index.php?act=sanphamct&idsp=".$id;
              echo ' <div class="row mb10 top10">
              <a href="'.$linksp.'"> <img src="img/'.$img.'" alt="" /></a>
              <a href="'.$linksp.'">'.$name.'</a>
            </div>';
            }
            ?>
            <!-- 
              <div class="row mb10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div>
              <div class="row mb10 top10">
                <img src="img/sp1.jpg" alt="" />
                <a href="#">Áo thun oversize vịt Donald Disney</a>
              </div> -->
            </div>
          </div>