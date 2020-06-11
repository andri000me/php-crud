<?php
require_once('entities/product.class.php');
?>
<?php
$prods = Product::list_product();
?>
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li class="active">Danh mục sản phẩm</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Quản lý sản phẩm</h4>
                <div class="widget-toolbar no-border"></div>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div class="search-active-form">
                        <div class="form-search pull-left">
                            <form class="form-inline">
                                <input type="text" placeholder="Search ..." class="nav-search-input" />
                                <input class="btn btn-xs" type="button" value="Tìm kiếm" />
                            </form>
                        </div>
                    </div>
                    <!-- search-form -->
                    <table id="simple-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="25%">Tên</th>
                                <th width="15%">Ảnh</th>
                                <th width="15%">Giá</th>
                                <th width="10%">Số lượng</th>
                                <th width="25%">Nội dung</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($prods as $item) { ?>
                                <tr>
                                    <td><?php echo $item['ProductName']; ?></td>
                                    <td><img src="<?php echo $item['Picture']; ?>" alt="iamge" style="width:100px;"></td>
                                    <td><?php echo $item['Price']; ?></td>
                                    <td><?php echo $item['Quantity']; ?></td>
                                    <td><?php echo $item['Description']; ?></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a tag="button" class="btn btn-xs btn-success" href="/">
                                                <i class="ace-icon fa fa-eye bigger-120"></i>
                                            </a>
                                            <a tag="button" class="btn btn-xs btn-info" href="/">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>