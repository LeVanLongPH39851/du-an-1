<div class="row">
        <div class="row formtitle"><h1>DANH SÁCH TÀI KHOẢN</h1></div>
      </div>
      <div class="row formcontent">
        <div class="row mb10 formdsloai">
          <table>
            <tr>
              <th></th>
              <th>MÃ TK</th>
              <th>TÊN ĐĂNG NHẬP</th>
              <th>MẬT KHẨU</th>
              <th>EMAIL</th>
              <th>ĐỊA CHỈ</th>
              <th>ĐIỆN THOẠI</th>
              <th>VAI TRÒ</th>
              <th></th>
            </tr>
            <?php
            foreach($listtaikhoan as $taikhoan){
               extract($taikhoan);
               $xoatk="index.php?act=xoatk&id=$id";
                echo' <tr>
                <td><input type="checkbox" name="" id="" /></td>
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$tel.'</td>
                <td>'.$role.'</td>
                <td>
                <a href="'.$xoatk.'"><input type="button" value="xóa" /></a>
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
        </div>
      </div>