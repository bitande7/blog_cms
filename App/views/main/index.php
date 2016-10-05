


<?php include __DIR__.'/../layouts/header.php'; var_dump($data); ?>

<section class="main2 wrapper">
    <section class="content">


        <?php foreach ($data as $post ) : ?>

        <article>
            <div class="article_image">

                    <img src="/uploads/img/<?php echo $post->img; ?>" alt="" title="">

            </div>
            <div class="post">
                <h1 class="title">
                    <a href="/news/<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
                </h1>
                <p><strong>Автор: </strong><?php echo $post->login; ?></p>
                <p><?php echo $post->text; ?></p>
                <p><em><?php echo $post->date; ?></em></p>
                <a class="read_more" href="/news/<?php echo $post->id; ?>">Continue Reading <i class="read_more_arrow"></i> </a>

            </div>
        </article>


        <?php endforeach; ?>



    </section><!-- Content End -->


<?php include __DIR__.'/../layouts/sidebar.php'; ?>

<?php include __DIR__.'/../layouts/footer.php'; ?>
