<?php include ROOT . '/App/views/admin_layouts/header.php'; var_dump($data); ?>


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin
                    <small>All news</small>
                </h1>


                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th>Автор</th>
                            <th>Комментариев</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($data as $post) :  ?>
                        <tr>
                            <td>
                                <?php echo $post->title; ?>
                                <div class="admin_news">
                                    <span><a href="/admin/edit_post/<?php echo $post->id; ?>">Редактировать</a></span>
                                    <span><a class="delete" href="/admin/delete_post/<?php echo $post->id; ?>">Удалить</a></span>
                                    <span><a href="/news/<?php echo $post->id; ?>" target="_blank">Перейти</a></span>
                                </div>
                            </td>
                            <td><?php echo $post->category; ?></td>
                            <td><?php echo $post->login; ?></td>
                            <td><span class="glyphicon glyphicon-comment glyphicon-align-left" aria-hidden="true"></span> <b><?php echo $post->comments; ?></b></td>
                            <td><?php echo $post->date; ?></td>
                        </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            <?php

                            \App\Components\Paginator::generate('news');

                            ?>


                    </nav>

                    <?php

                    var_dump(App\Core\Router::$params);


                    ?>
                </div>
            </div>
        </div>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<?php include ROOT . '/App/views/admin_layouts/footer.php';  ?>
