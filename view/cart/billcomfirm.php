<div class="row mb">
        <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">CẢM ƠN</div>
            <div class="row boxcontent thankyou" style="text-align:center">
            <h2>Cảm ơn quý khách đã đặt hàng!</h2>
            </div>
          </div>
          <?php
          if(isset($bill)&&(is_array($bill))){
            // extract($bill);
          }
          ?>
          <div class="row mb">
            <div class="boxtitle">MÃ ĐƠN HÀNG</div>
            <div class="row boxcontent mdh" style="text-align:center">
              <li>- Mã đơn hàng: DAM-<?=$bill[0]['id'];?></li>
              <li>- Ngày đặt hàng hàng: <?=$bill[0]['ngaydathang'];?></li>
              <li>- Tổng đơn hàng: <?=$bill[0]['total'];?></li>
              <li>- Phương thức thanh toán: <?=$bill[0]['bill_pttt'];?></li>
        </div>
        </div>
        <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform">
                <table>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td><?=$bill[0]['bill_name'];?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?=$bill[0]['bill_address'];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$bill[0]['bill_email'];?></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><?=$bill[0]['bill_tel'];?></td>
                    </tr>
                </table>
                </div>
        </div>
        <div class="row mb">
            <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
            <div class="row boxcontent cart">
            <table>
                <?php
                bill_chi_tiet($billct);
                ?>
            </table>
            </div>
        </div>
        </div>
        <div class="boxphai">
        <?php 
        include "view/boxright.php";
        ?>
        </div>
      </div>