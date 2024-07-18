<div class="row">
        <div class="row formtitle"><h1>THÊM MỚI SẢN PHẨM</h1></div>
      </div>
      <div class="row formcontent">
        <form action="index.php?act=addsp" enctype="multipart/form-data" method="post">
          <div class="row mb10">
            Danh mục <br />
            <select name="iddm" id="">
              <?php
              foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
              }
              ?>
            </select>
          </div>
          <div class="mb10 row">
            Tên sản phẩm <br />
            <input type="text" name="tensp" />
          </div>
          <div class="mb10 row">
            Giá <br />
            <input type="text" name="giasp">
          </div>
          <div class="mb10 row">
            Ảnh <br />
            <input type="file" name="anh" />
          </div>
          <div class="mb10 row">
            Mô tả <br />
            <textarea name="mota" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="mb10 row">
            <input type="submit" name="themmoi" value="THÊM MỚI" />
            <input type="reset" value="NHẬP LẠI" />
            <a href="index.php?act=listsp"
              ><input type="button" value="DANH SÁCH"
            /></a>
          </div>
          <?php
          if(isset($thongbao)&&!empty($thongbao)){
            echo $thongbao;
          }
          ?>
        </form>
      </div>