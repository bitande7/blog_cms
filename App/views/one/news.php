
<?php include ROOT . '/App/views/layouts/header.php';  var_dump($data);?>

<section class="main2 wrapper">
    <section class="content">



        <article>
            <div class="article_image">

                <img src="/uploads/img/<?php echo $data['post']->img; ?>" alt="" title="">

            </div>
            <div class="post">
                <h1 class="title">
                    <?php echo $data['post']->title; ?>
                </h1>
                <p><strong>Автор: </strong><?php echo $data['post']->name; ?></p>
                <p><?php echo $data['post']->text; ?></p>
                <p align="right"><em><?php echo $data['post']->date; ?></em></p>


            </div>
        </article>

        <hr>

        <div class="post">
            <h1 class="title">Комментарии</h1>
            <p><strong>Автор: </strong><?php echo $data->login; ?></p>
            <p><?php echo $data->text; ?></p>


        </div>


        <div class="post">

            <form action="" method="post">
                <p>
                    <label for="email">E-mail <span style="color: red">*</span></label>
                    <input id="email" name="email" type="email" value="" size="30" maxlength="100" required="required">
                </p>
                <p>
                    <label for="name">Name <span style="color: red">*</span></label>
                    <input id="name" name="name" type="text" value="" size="30" maxlength="100" required="required">
                </p>
                <p>
                    <label for="comment">Комментарий  <span style="color: red">*</span></label> <br>
                    <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                </p>

                <p>
                    <input type="submit" name="submit" value="Отправить">
                </p>

            </form>




        </div>



    </section><!-- Content End -->


    <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
