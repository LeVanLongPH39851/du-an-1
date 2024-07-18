<div class="row">
        <div class="row formtitle"><h1>DANH SÁCH BÌNH LUẬN</h1></div>
      </div>
      <div class="row formcontent">
        <div class="row mb10 formdsloai">
          <table>
            <tr>
              <th></th>
              <th>ID</th>
              <th>NỘI DUNG</th>
              <th>ID USER</th>
              <th>ID PRO</th>
              <th>NGÀY BÌNH LUẬN</th>
              <th></th>
            </tr>
            <?php
            foreach($listbinhluan as $binhluan){
               extract($binhluan);
               $xoabl="index.php?act=xoabl&id=$id";
                echo' <tr>
                <td><input type="checkbox" name="" id="" /></td>
                <td>'.$id.'</td>
                <td>'.$noidung.'</td>
                <td>'.$iduser.'</td>
                <td>'.$idpro.'</td>
                <td>'.$ngaybinhluan.'</td>
                <td>
                <a href="'.$xoabl.'"><input type="button" value="xóa" /></a>
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