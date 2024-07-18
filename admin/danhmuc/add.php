<div class="row">
        <div class="row formtitle"><h1>THÊM MỚI LOẠI HÀNG HÓA</h1></div>
      </div>
      <div class="row formcontent">
        <form action="index.php?act=adddm" method="post">
          <div class="row mb10">
            Mã loại <br />
            <input
              type="text"
              name="maloai"
              disabled
              placeholder="auto number"
            />
          </div>
          <div class="mb10 row">
            Tên loại <br />
            <input type="text" name="tenloai" />
          </div>
          <div class="mb10 row">
            <input type="submit" name="themmoi" value="THÊM MỚI" />
            <input type="reset" value="NHẬP LẠI" />
            <a href="index.php?act=listdm"
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