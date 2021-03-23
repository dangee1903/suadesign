<?php get_header()?>
<main class="home">
    <section class="slide">
        <div class="slide__wrap container">
            <div class="bg">
                <img src="<?php echo SUA_THEME_IMG_URL?>/slide.jpg" alt="">
            </div>
            <div class="content">
                <h2>Xin chào <br> Mình là <span class="blue">SUA DESIGN</span></h2>
            </div>
        </div>
    </section>
    <section class="iam">
        <div class="iam__wrap container">
            <div class="iam__wrap-img">
                <img src="<?php echo SUA_THEME_IMG_URL?>/me.png" alt="">
            </div>
            <div class="iam__wrap-content">
                <h2>About Me </h2>
                <p>Mình tên là Đăng Nguyễn. Đang theo đuổi ux ui design và font end developer.</p>
                <p>Điểm mạnh lớn nhất của mình là quan tâm tới từng chi tiết. Tính năng này đã giúp mình rất nhiều trong lĩnh vực này.</p>
                <p>Mục tiêu ngắn hạn của mình là tìm một vị trí mà mình có thể sử dụng kiến ​​thức và thế mạnh mà mình có. Mình muốn cống hiến hết mình cho sự phát triển và thành công của công ty mà mình làm việc cho.</p>
            </div>
        </div>
    </section>
    <section class="skill">
        <div class="skill__wrap container">
            <h2>Skill</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="img"><img class="svg" src="<?php echo SUA_THEME_IMG_URL?>/code.svg" alt=""></div>
                        <h2>HTML, CSS, JS, PHP</h2>
                        <p>Mình có thể lập các trang web bán hàng, tin tức, chuẩn seo phục vụ cho marketting.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="img"><img class="svg" src="<?php echo SUA_THEME_IMG_URL?>/image.svg" alt=""></div>
                        <h2>Ux/Ui Design</h2>
                        <p>Thiết kế ux/ui cho app, website.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="img"><img class="svg" src="<?php echo SUA_THEME_IMG_URL?>/file.svg" alt=""></div>
                        <h2>Digital Marketting</h2>
                        <p>Có kiển thức cơ bản về Digital Marketting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog">
        <div class="blog__wrap container">
            <h2>Blog</h2>
            <div class="row">
                <div class="col-md-8">
                <?php
                    $args_my_query = array(
                        'post_type' => 'post',
                        'category_name'   => 'blog',
                        'posts_per_page'  => 4,
                    );
                    $my_query = new WP_Query( $args_my_query );
                    $i        = 0;
                    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
                        $i++;
                        if($i == 1){?>
                            <div class="col-md-12">
                                <div class="img">
                                    <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail( $post_id, '', array( 'class' =>'') ); ?></a>
                                </div>
                                <div class="content">
                                    <small><?php echo get_the_date('d - m -Y');?></small>
                                    <h2><a href="<?php the_permalink();?>"><?php echo the_title();?></a></h2>
                                    <p><a href="<?php the_permalink();?>"><?php echo the_excerpt();?></a></p>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                        <?php
                        }else{
                ?>
                            <div class="col-md-12">
                                <small><?php echo get_the_date('d - m -Y');?></small>
                                <h2><a href="<?php the_permalink();?>"><?php echo the_title();?></a></h2>
                            </div>
                <?php
                    }endwhile; endif;
                ?>      
                    
                    <!-- <div class="col-md-12">
                        <small>3 - 19 -2021</small>
                        <h2><a href="#">WORDPRESS 5.5 – BẢN CẬP NHẬT ĐÁNG ĐỂ MONG ĐỢI</a></h2>
                    </div>
                    <div class="col-md-12">
                        <small>3 - 19 -2021</small>
                        <h2><a href="#">WORDPRESS 5.5 – BẢN CẬP NHẬT ĐÁNG ĐỂ MONG ĐỢI</a></h2>
                    </div>
                    <div class="col-md-12">
                        <small>3 - 19 -2021</small>
                        <h2><a href="#">WORDPRESS 5.5 – BẢN CẬP NHẬT ĐÁNG ĐỂ MONG ĐỢI</a></h2>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer()?>