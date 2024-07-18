<div class="row">
        <div class="row formtitle mb"><h1>DANH SÁCH SẢN PHẨM</h1></div>
        <form class="formadmin" action="index.php?act=listsp" method="post">
            <input type="text" placeholder="Tên sản phẩm" name="kyw">
            <select name="iddm" id="">
              <option value="0" selected>Tất cả</option>
              <?php
              foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
              }
              ?>
            </select>
            <input type="submit" name="listok" value="➻❥ Search">
          </form>
      </div>
      <div class="row formcontent">
        <div class="row mb10 formdsloai">
         
          <table>
            <tr>
              <th></th>
              <th>MÃ LOẠI</th>
              <th>TÊN SẢN PHẨM</th>
              <th>ẢNH</th>
              <th>GIÁ</th>
              <th>LƯỢT XEM</th>
              <th></th>
            </tr>
            
            <?php
            foreach($listsanpham as $sanpham){
               extract($sanpham);
               $suasp="index.php?act=suasp&id=$id";
               $xoasp="index.php?act=xoasp&id=$id";
                echo' <tr>
                <td><input type="checkbox" name="" id="" /></td>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td><img src="../img/'.$img.'" alt=""></td>
                <td>'.$price.'</td>
                <td>'.$luotxem.'</td>
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