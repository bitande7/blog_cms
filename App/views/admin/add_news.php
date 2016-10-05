<?php include ROOT . '/App/views/admin_layouts/header.php'; var_dump($data); ?>


<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin
                    <small>All news</small>
                </h1>




                <form method="post" action="" enctype="multipart/form-data">

                <div class="col-lg-10">

                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input name="title" class="form-control" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label for="text">текст новости</label>
                        <textarea name="text" class="form-control" rows="3"></textarea>
                    </div>

                    <input type="text" name="date" hidden value="<?php echo date("Y-m-d");?>">
                    <input type="text" name="author_id" hidden value="1">

                </div>

                <div class="col-lg-2">

                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select name="category_id" class="form-control">

                            <?php

                            foreach ($data as $category ) {
                                echo '<option value="'.$category->id.'">'.$category->title.'</option>';
                            }


                            ?>

                        </select>
                    </div>


                    <img class="img-thumbnail" src="http://placehold.it/250x250" alt="">
                    <div class="form-group">
                        <label>Загрузить картинку</label>
                        <input type="file" name="img">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-lg btn-success">Добавить</button>

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
