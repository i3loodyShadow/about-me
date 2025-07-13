<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About me - Eryk Tyndel</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo PAGE_THEME_URL ?>css/reset.css" />
    <link rel="stylesheet" href="<?php echo PAGE_THEME_URL ?>css/style.css" />

    <script src="https://kit.fontawesome.com/ff727108bd.js" crossorigin="anonymous"></script>
    <script src="<?php echo PAGE_THEME_URL ?>js/scripts.js"></script>
</head>

<body class="--txt-light">
    <div class="side-wrapper">
        <div class="header">
            <?php

            $header_loop = new WP_Query(array(
                'post_type' => 'page-settings',
                'order' => 'ASC',
                'posts_per_page' => 1
            ));

            while ($header_loop->have_posts()):
                $header_loop->the_post();
            ?>
                <div class="header__content">
                    <div class="header__info">
                        <div class="header__personal-data">
                            <h1 class="heading--1 --is-bold"><?php the_field('name'); ?></h1>
                            <h2 class="heading--2 --txt-grey"><?php the_field('position'); ?></h2>
                        </div>

                        <div class="header__links">
                            <a class="header__link" href="<?php the_field("github_url"); ?>" target="_blank">
                                <i class="fa-brands fa-square-github"></i>
                            </a>
                            <a class="header__link" href="<?php the_field("linkedin_url"); ?>" target="_blank">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a class="header__link" href="maito:<?php the_field("email_address"); ?>" target="_blank"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                    </div>

                    <div class="header__photo-wrapper">
                        <?php
                        $image = get_field('photo');

                        if (!empty($image)): ?>
                            <img class="header__photo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>