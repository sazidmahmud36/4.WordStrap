<?php get_header();?>
	<div class="container index">
		<div class="row">
			<div class="col-md-8 border border-secondary">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Blog Post</h3>
					</div>
					<div class="panel-body">
						<?php if (have_posts()): ?>
							<?php while (have_posts()): the_post(); ?>
								<article class="post">
								<div class="row">
									<div class="col-md-12">
										<h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title();?></a></h2>
											<!-- check for thumbnail -->
										<?php if (has_post_thumbnail()): ?>
											<div class="post-thumbnail">
												<?php the_post_thumbnail(); ?>
											</div>
										<?php endif; ?>
										<p class="meta">Posted at <?php the_time();?> on <?php the_date();?> by <a href=""><?php the_author();?></a></p>
										<div class="content"><?php the_content(); ?></div>
										<br>
									</div>
								</div>
								</article>
							<?php endwhile;?>
						<?php endif ?>
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<?php if (is_active_sidebar('sidebar')): ?>
					<?php dynamic_sidebar('sidebar');?>
				<?php endif ?>
			</div>
		</div>
	</div>
	<?php get_footer();?>