<?php

$category = App\Models\Db::getInstance()->query('SELECT * FROM category');

?>
<aside class="sidebar">
			<section class="widget">
				<h3 class="widget-title">Catefories</h3>
				<div class="textwidget">
					<ul class="category">

						<?php

						foreach ($category as $menu_item) {
							echo '<li><a href="" >'.$menu_item->title.'</a></li>';
						}

						?>


					</ul>
				</div>
			</section>

			<section class="widget">
				<h3 class="widget-title">Search.</h3>
				<form class="search_widget">
					<input type="text" id="search-field" class="search-field" placeholder="What are you looking for?"/>
				</form>
			</section>

			<section class="widget">
				<a href="#">
					<img src="/template/img/ads.jpg" alt="" title="">
				</a>
			</section>
		</aside><!-- aside(sidebar) End -->

		<nav class="pagination">
			<a href="#" class="previous"><i></i>Previous</a>
			<a href="#" class="next">Next<i></i></a>
		</nav><!-- pagination End -->
	</section><!-- Main2 End -->