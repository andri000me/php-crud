<?php
require_once("entities/product.class.php");
require_once('entities/category.class.php');
if (isset($_POST["btnsubmit"])) {
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];
    $newProduct = new  Product($productName, $cateID, $price, $quantity, $description, $picture);
    $loi = array();
    $loi_str = "";
    $result = $newProduct->save($loi);
    if (!$result) {
        header("Location: create.php?failed");
        foreach ($loi as $item) $loi_str = $loi_str . $item . "<br/>";
    } else {
        header("Location: create.php?inserted");
    }
}
?>
<?php
if (isset($_GET["status"])) {
    if ($_GET["status"] == 'inserted') {
        echo "<h2>Thêm sản phẩm thành công.</h2>";
    } else {
        echo "<h2>Thêm sản phẩm thất bại.</h2>";
    }
}
?>
<?php if ($loi_str = "") { ?>
    <div class="alert alert-danger"><?php echo $loi_str ?></div>
<?php } ?>
<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">
            <h1>
                Thêm mới sản phẩm
            </h1>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtName" placeholder="Tên" class="col-xs-10 col-sm-7" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nội dung</label>
                                <div class="col-sm-10">
                                    <input name="txtdesc" type="text" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?>" placeholder="Nội dung" class="col-xs-10 col-sm-7" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nội dung</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="txtCateID">
                                        <option value="" selected>-- Chọn loại --</option>
                                        <?php $cates = Category::list_category() ?>
                                        <?php foreach ($cates as $item) { ?>
                                            <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 form-actions">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Giá tiền</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>" placeholder="Giá tiền" class="col-xs-10 col-sm-7" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Số lượng</label>
                                <div class="col-sm-10">
                                    <input name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>" type="number" placeholder="Số lượng" class="col-xs-10 col-sm-7" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" id="txtpic" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" name="btnsubmit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Thêm mới
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>