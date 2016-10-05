<?php include ROOT . '/App/views/admin_layouts/header.php'; var_dump($data);  ?>


<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin
                    <small>Edit Post. <a href="/news/<?php echo $data['post']->id ?>">Посмотреть на сайте</a> </small>
                </h1>




                <form method="post" action="" enctype="multipart/form-data">

                    <div class="col-lg-10">

                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" class="form-control" type="text" value="<?php echo $data['post']->title; ?>">
                        </div>

                        <div class="form-group">
                            <label for="text">текст новости</label>
                            <textarea name="text" class="form-control" rows="15"><?php echo $data['post']->text; ?></textarea>
                        </div>

                        <input type="text" name="date" hidden value="<?php echo date("Y-m-d");?>">
                        <input type="text" name="author_id" hidden value="<?php echo $data['post']->author_id; ?>">

                    </div>

                    <div class="col-lg-2">

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" class="form-control">

                                <?php

                                foreach ($data['categories'] as $category ) {
                                    if($category->id == $data['post']->category_id) {
                                        echo '<option selected value="'.$category->id.' ">'.$category->title.'</option>';
                                    } else {
                                        echo '<option value="'.$category->id.'">'.$category->title.'</option>';
                                    }

                                }


                                ?>

                            </select>
                        </div>


                        <img class="img-thumbnail" width="200px" height="200px" src="/uploads/img/<?php echo $data['post']->img; ?>" alt="">
                        <div class="form-group">
                            <label>Загрузить картинку</label>
                            <input type="file" name="img">
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-lg btn-success">Обновить</button>
                        <a href="/admin/delete_post/<?php echo $data['post']->id; ?>" type="button" class="btn btn-lg btn-danger">Удалить</a>



                    </div>

                </form>

            </div>


        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<?php include ROOT . '/App/views/admin_layouts/footer.php';  ?>
