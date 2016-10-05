
<?php include ROOT . '/App/views/layouts/header.php';  ?>

<section class="main2 wrapper">
    <section class="content">



        <article>
            <div class="article_image">

                <img src="/uploads/img/<?php echo $data->img; ?>" alt="" title="">

            </div>
            <div class="post">
                <h1 class="title">
                    <a href="#"><?php echo $data->title; ?></a>
                </h1>

                <p><?php echo $data->text; ?></p>



            </div>
        </article>






    </section><!-- Content End -->


    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
