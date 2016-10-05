<?php
ini_set('error_reporing', E_ALL);
ini_set('display_errors', 1);
require_once 'Product.php';

Product::initSQLConnection();

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $idForDelete = (int)$_GET['id'];
    Product::delete($idForDelete);
}
if (isset($_POST['action']) && $_POST['action'] == 'add_new') {
    $title = htmlspecialchars(trim($_POST['title']));
    $price = (int)htmlspecialchars(trim($_POST['price']));
    $discount = (int)htmlspecialchars(trim($_POST['discount']));
    $description = htmlspecialchars(trim($_POST['description']));
    $newProduct = Product::newEmptyInstance();
    $newProduct->setTitle($title);
    $newProduct->setPrice($price);
    $newProduct->setDiscount($discount);
    $newProduct->setDescription($description);
    $newProduct->save();
}

$product_page = 1;
$products_on_page = 5;
$total_products_count = Product::count();

session_start();
if (isset($_GET['p']) && $_GET['p'] > 0) {
    $product_page = (int)$_GET['p'];
}

$products = Product::find($products_on_page, ($product_page - 1) * $products_on_page);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>������� ���������� ActiveRecord</title>
</head>
<body>
<p>����� ���������� ��������� � �������: <?=$total_products_count;?></p>
<table style="border:1px solid black;">
    <tr>
        <th>��������</th>
        <th>����</th>
        <th>������</th>
        <th>��������</th>
    </tr>
    <? if ($products !== false && count($products) > 0) { ?>
        <? foreach ($products as $product) { ?>
            <tr>
                <td><?=$product->getTitle(); ?></td>
                <td><?=$product->getPrice(); ?></td>
                <td><?=$product->getDiscount(); ?></td>
                <td><?=$product->getDescription(); ?></td>
                <td>
                    <a href="/update.php?id=<?=$product->getId(); ?>">�������������</a>
                    <a href="/?action=delete&id=<?=$product->getId(); ?>">�������</a>
                </td>
            </tr>
        <? } ?>
    <? } else { ?>
        <tr>
            <td colspan="4">������ ��������� ����</td>
        </tr>
    <? } ?>
</table>
<?
if ($products_on_page < $total_products_count) {
    $pagesCount = ceil($total_products_count / $products_on_page);
    for ($i = 1; $i <= $pagesCount; $i++) {
        ?><a href="/public/index.php?p=<?=$i;?>"> <?=$i;?> </a><?
    }
} ?>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    <input type="hidden" name="action" value="add_new" /><br/>
    ��������: <input type="text" name="title" id="title" /><br/>
    ����: <input type="text" name="price" id="price" /><br/>
    ������: <input type="text" name="discount" id="discount" /><br/>
    ��������: <input type="text" name="description" id="description" /><br/>
    <button type="submit">��������</button>
</form>
</body>
</html>