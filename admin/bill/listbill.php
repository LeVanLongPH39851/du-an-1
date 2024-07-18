<div class="row">
        <div class="row formtitle mb"><h1>DANH SÁCH SẢN PHẨM</h1></div>
        <form class="formadmin" action="index.php?act=listbill" method="post">
            <input type="text" placeholder="Nhập mã đơn hàng" name="kyw">
            <input type="submit" name="listok" value="➻❥ Search">
          </form>
      </div>
      <div class="row formcontent">
        <div class="row mb10 formdsloai">
         
          <table>
            <tr>
              <th></th>
              <th>MÃ ĐƠN HÀNG</th>
              <th>KHÁCH HÀNG</th>
              <th>SỐ LƯỢNG HÀNG</th>
              <th>GÍA TRỊ ĐƠN HÀNG</th>
              <th>TÌNH TRẠNG ĐƠN HÀNG</th>
              <th>NGÀY ĐẶT HÀNG</th>
              <th>THAO TÁC</th>
            </tr>
            
            <?php
            foreach($listbill as $bill){
               extract($bill);
               $kh=$bill["bill_name"].'
               <br>'.$bill["bill_email"].'
               <br>'.$bill["bill_address"].'
               <br>'.$bill['bill_tel'];
               $ttdh=get_ttdh($bill['bill_status']);
               $countsp=loadall_cart_count($bill['id']);
               $suasp="index.php?act=suasp&id=$id";
               $xoasp="index.php?act=xoasp&id=$id";
                echo' <tr>
                <td><input type="checkbox" name="" id="" /></td>
                <td>DAM-'.$bill['id'].'</td>
                <td>'.$kh.'</td>
                <td>'.$countsp.'</td>
                <td><strong>'.$bill['total'].'</strong></td>
                <td>'.$ttdh.'</td>
                <td>'.$bill['ngaydathang'].'</td>
                <td>
                <a href="'.$suasp.'"><input type="button" value="sửa" /></a>
                <a href="'.$xoasp.'"><input type="button" value="xóa" /></a>
                </td>
              </tr>';
            }
            ?>
          </table>
          
        </div>
        <div class="row mb10">
          <input type="button" value="Chọn tất cả" />
          <input type="button" value="Bỏ chọn tất cả" />
          <input type="button" value="Xóa các mục đã chọn" />
          <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" /></a>
        </div>
      </div>