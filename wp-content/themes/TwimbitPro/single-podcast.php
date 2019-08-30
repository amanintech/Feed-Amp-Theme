<?php
/*
     * The template for displaying all audio template
     *
     *
     * */

get_header();
$post_args = array(
    'numberposts' => 0,
    'category' => 0,
    'orderby' => 'date',
    'order' => 'ASC', // the 1st array element will be 1st story(oldest story)
    'include' => array(),
    'exclude' => array(get_the_ID()),
    'meta_key' => '',
    'meta_value' => '',
    'post_type' => array('podcast'),
    'suppress_filters' => true,
);

the_post();
$post_img   = get_the_post_thumbnail_url($val, 'medium_large');
$post_url   = get_permalink();
$post_title = get_the_title();
$author = get_the_author();
$category = get_the_category();

$audio = get_field('audio');

?>
<style>
    @media only screen and (max-width: 320px) {
        .icon {
            transform: translate(18px, -70px);
        }
    }

    @media (min-width:300px) and (max-width:375px) {
        .detail1 {
            /*line-height: 1.2;*/
            width: 14em;
            font-size: 12px
        }
    }

    @media (min-width:375px) and (max-width:425px) {
        .detail1 {
            font-size: 13px;
            width: 16em
        }

        .icon {
            transform: translate(28px, -75px);
        }
    }

    @media (min-width: 425px) and (max-width: 520px) {
        .detail1 {
            width: 18em;
            font-size: 14px
        }
    }

    @media (min-width: 520px) and (max-width: 640px) {
        .detail1 {
            width: 25em;
            font-size: 15px
        }
    }

    @media (min-width: 640px) and (max-width:726px) {
        .detail1 {
            width: 13em;
            font-size: 11px
        }
    }

    @media (min-width: 726px) and (max-width:767px) {
        .detail1 {
            width: 14em;
            font-size: 10px
        }
    }

    @media (min-width: 768px) and (max-width:1024px) {
        .detail1 {
            width: 14em;
            font-size: 10px
        }
    }
</style>
<div class="container-fluid">
    <div class="row podcast">
        <!--Main div    -->
        <div class="lg-col-7 md-col-7 sm-col-7 xs-col-12 podcast-cover">
            <!-- 1st div divided into 66%size of the page-->
            <div class="feed-card podcast-card">
                <div class="single-thumbnail">
                    <amp-img layout="fill" src="<?php echo $post_img; ?>"></amp-img>
                    <div class="audio-fade"></div>
                    <div class="feed-link">
                        <div class="feed-title" style="text-decoration: none;">
                            <p class="feed-subtitle"><?php echo $post_title; ?></p>
                            <span>By <?php echo $author; ?></span>
                            <span></span>
                            <span style="text-decoration: none;">
                                <a href="<?php echo get_category_link($category[0]->term_id); ?>" style="font-size:0.76rem">#<?php echo $category[0]->name; ?>
                                </a>
                            </span>
                        </div>
                        <div class="audio" oncontextmenu="return false;">
                            <amp-audio controls height="auto" width="auto" class="player" artwork="<?php echo $post_img; ?>" controlsList="nodownload" autoplay>
                                <source src="<?php echo $audio['url']; ?>">
                                <!-- podcast playlist-->
                            </amp-audio>
                        </div>
                    </div>
                </div>
            </div>

            <!-- lightbox container for description and share icon -->

            <amp-lightbox id="description-lightbox" layout="nodisplay" scrollable>
                <div class="overlay content" on="tap:description-lightbox.close" role="button" tabindex="0">
                    <div class="description-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982; position: absolute;" xml:space="preserve">
                            <g id="Close">
                                <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312   c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312   l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937   c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z" />
                            </g>
                        </svg>
                        <div style="margin-top:20px; overflow:auto; word-break: break-word;">
                            <?php
                            echo  $post->post_content; //contents saved in a variable
                            ?>
                        </div>
                    </div>
                </div>
                <p on="tap:description-lightbox.close">
                </p>
            </amp-lightbox>


            <amp-lightbox id="share-lightbox" layout="nodisplay">
                <div class="overlay content" on="tap:share-lightbox.close" role="button" tabindex="0">
                    <div class="share-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve">
                            <g id="Close">
                                <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312   c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312   l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937   c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z" />
                            </g>
                        </svg>
                        <div class="share-icon-container">
                            <amp-social-share class="social1" style="margin-right:0.5em;" height="30px" width="30px" type="facebook"></amp-social-share>
                            <amp-social-share class="social1" style="margin-right:0.5em;" height="30px" width="30px" type="linkedin"></amp-social-share>
                            <amp-social-share class="social1" style="margin-right:0.5em;" height="30px" width="30px" type="twitter"></amp-social-share>
                            <amp-social-share class="social1" style="margin-right:0.5em;" height="30px" width="30px" type="whatsapp"></amp-social-share>
                        </div>
                    </div>
                </div>
            </amp-lightbox>

            <div class="light2">
                <div>
                    <div class="menu">
                        <ul>
                            <li class="menu-item">
                                <button class="tablinks" on="tap:description-lightbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41.817" height="37.171" viewBox="0 0 41.817 37.171">
                                        <path class="a" d="M19,19H5V5h7V3H5A2,2,0,0,0,3,5V19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V12H19ZM14,3V5h3.59L7.76,14.83l1.41,1.41L19,6.41V10h2V3Z" transform="translate(0 0) scale(1.6)" />
                                    </svg><br>DESCRIPTION</button>
                            </li>
                            <li class="menu-item">
                                <button class="tablinks" on="tap:share-lightbox">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41.817" height="37.171" viewBox="0 0 41.817 37.171">
                                        <path class="a" d="M18,16.08a2.912,2.912,0,0,0-1.96.77L8.91,12.7A3.274,3.274,0,0,0,9,12a3.274,3.274,0,0,0-.09-.7l7.05-4.11A2.993,2.993,0,1,0,15,5a3.274,3.274,0,0,0,.09.7L8.04,9.81a3,3,0,1,0,0,4.38l7.12,4.16a2.821,2.821,0,0,0-.08.65A2.92,2.92,0,1,0,18,16.08Z" transform="translate(0 0) scale(1.6)" />
                                    </svg><br>SHARE</button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <div class="lg-col-4 md-col-5 sm-col-5 xs-col-12">
            <!-- main div divded into 33% of the page -->
            <div class="right-side">
                <div class="head">
                    <a href="<?php echo $next_post_url = get_permalink(get_adjacent_post(false, '', false)->ID); ?>" class="next">
                        up next
                        <!-- next option-->
                    </a>
                </div>
                <hr>
                <!--hr tag-->

                <!--dynamic containers-->
                <?php

                $get_post = get_posts($post_args);

                foreach ($get_post as $val) {
                    $post_img = get_the_post_thumbnail_url($val, 'thumbnail');
                    $post_url = get_permalink($val);
                    $post_title = get_the_title($val);
                    $author = get_the_author($val);
                    $category_post = get_the_category($val);
                    ?>

                    <a href="<?php echo $post_url; ?>" style="text-decoration:none;">
                        <div class="short-card">
                            <!-- podcast option -->
                            <div class="short-image">
                                <!-- podcast image-->
                                <img class="short-image" src="<?php print $post_img; ?>">
                                <!--svg play icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="85.658" height="85.658" viewBox="0 0 85.658 85.658" class="icon" <defs>
                                    <style>
                                        .a {
                                            fill: rgba(0, 0, 0, 0.55);
                                        }

                                        .b {
                                            fill: #fafafa;

                                            .c {
                                                filter: url(#a);
                                            }
                                    </style>
                                    <filter id="a" x="0" y="0" width="85.658" height="85.658" filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha" />
                                        <feGaussianBlur stdDeviation="3" result="b" />
                                        <feFlood flood-opacity="0.161" />
                                        <feComposite operator="in" in2="b" />
                                        <feComposite in="SourceGraphic" />
                                    </filter>
                                    </defs>
                                    <g transform="translate(-44.057 -33.003)">
                                        <g class="c" transform="matrix(1, 0, 0, 1, 44.06, 33)">
                                            <ellipse class="a" cx="33.829" cy="33.829" rx="33.829" ry="33.829" transform="translate(9 6)" />
                                        </g>
                                        <path class="b" d="M30.863,22.324l-7.989-6V39.9l7.989-6,7.727-5.789Zm0,0-7.989-6V39.9l7.989-6,7.727-5.789Zm0,0-7.989-6V39.9l7.989-6,7.727-5.789ZM25.493,7.341V2.05A26.059,26.059,0,0,0,11.558,7.839l3.719,3.746A20.8,20.8,0,0,1,25.493,7.341ZM11.584,15.278,7.839,11.558A26.059,26.059,0,0,0,2.05,25.493H7.341A20.8,20.8,0,0,1,11.584,15.278ZM7.341,30.732H2.05A26.059,26.059,0,0,0,7.839,44.667l3.746-3.746A20.609,20.609,0,0,1,7.341,30.732Zm4.217,17.654a26.145,26.145,0,0,0,13.935,5.789V48.884A20.8,20.8,0,0,1,15.278,44.64l-3.719,3.746ZM54.306,28.112A26.233,26.233,0,0,1,30.863,54.175V48.884a20.952,20.952,0,0,0,0-41.543V2.05A26.233,26.233,0,0,1,54.306,28.112Z" transform="translate(58.967 44.912)" />
                                    </g>
                                </svg>
                            </div>
                            <div class="details">
                                <!--podcast details -->
                                <p class="detail1">
                                    <?php echo $post_title ?>
                                </p>
                                <div class="sub1">
                                    <span>By <?php echo $author; ?></span>
                                    <span></span>
                                    <span>#<?php echo esc_html($category_post[0]->name); ?></span>
                                </div>
                            </div>

                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>