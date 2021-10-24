<?php

/**
 * Template name: Homepage v1
 * @package NetPing
 */

use function PHPSTORM_META\type;

get_header(); ?>

<div id="main-section" class="main-section">
    <div class="col-full">
        <h2>Мониторинг температурного режима работы серверного обрудования с NetPing</h2>
        <div class="main-section__container row">
            <div class="image-container column">
                <p>Вы получите уведомление о перегреве раньше, чем это приведет к отказу оборудования</p>
                <img src="<?php echo  get_stylesheet_directory_uri() ?>/images/graph.png" alt="">
            </div>
            <div class="image-container">
                <img src="<?php echo  get_stylesheet_directory_uri() ?>/images/serv.png" alt="">
            </div>
        </div>
        <div class="button-wrapper">
            <!-- <a href="#open_callback_modal">
                <button>Подбор решения</button>
            </a> -->

            <a href="#open_callback_modal" class="button">Подбор решения</a>

        </div>
    </div>
    <div class="circle"></div>
</div>

<div class="who_needs-section">
    <div class="col-full">
        <div class="column">
            <h2 class="h-line">Кому нужны устройства NetPing?</h2>
            <div class="who_needs-block row hideContent">
                <div class="who_needs-block__trigger">...</div>
                <div class="image-circles-container">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_1.png" alt="">
                    <div class="circle-inner"></div>
                </div>
                <div class="who_needs-block__text hideContent">
                    <div class="heading-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_1.png" alt="">
                        <h3>Компаниям, эксплуатирующим IT-оборудование</h3>
                    </div>
                    <ul>
                        <li>Постоянный мониторинг условий работы IT-устройств сокращает простои из-за неожиданных отказов оборудования</li>
                        <li>Удалённое управление электропитанием экономит деньги компании на выезд инженеров и увеличивает скорость решения проблем</li>
                        <li>Увеличение срока службы IT-оборудования в режиме постоянного мониторинга безопасных условий эксплуатации</li>
                        <li>Незамедлительное уведомление ответственных сотрудников о происшествиях с IT-оборудованием позволяет сократить время реакции и ускорить решение проблемы</li>                        
                    </ul>
                </div>
            </div>
            <div class="who_needs-block row hideContent">
                <div class="who_needs-block__trigger">...</div>
                <div class="image-circles-container">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_3.png" alt="">
                    <div class="circle-inner"></div>
                </div>
                <div class="who_needs-block__text">
                    <div class="heading-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_3.png" alt="">
                        <h3>Инженерам, эксплуатирующим IT-оборудование и системным администраторам</h3>
                    </div>
                    <ul>
                        <li>Возможность удаленно и автоматизировано управлять электропитанием устройств</li>
                        <li>Постоянный мониторинг условий работы оборудования помогает в выяснении причин инцидентов</li>
                        <li>Аппаратное устройство мониторинга и управления электропитанием даёт возможность обеспечить дополнительную надёжность удалённых узлов</li>
                        <li>Открытые протоколы и большое число примеров интеграции позволяет сделать устройства NetPing органичной частью сетевой инфраструктуры</li>
                    </ul>
                </div>
            </div>
            <div class="who_needs-block row hideContent">
                <div class="who_needs-block__trigger">...</div>
                <div class="image-circles-container">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_2.png" alt="">
                    <div class="circle-inner"></div>
                </div>
                <div class="who_needs-block__text">
                    <div class="heading-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_2.png" alt="">
                        <h3>Сервисным компаниям, обслуживающим банкоматы, вендинговые машины, а также провайдерам и телеком-компаниям</h3>
                    </div>
                    <ul>
                        <li>Мониторинг среды работы IT-оборудования сокращает риски прерывания сервиса для клиентов</li>
                        <li>Сокращение расходов на выезд технических специалистов для перезагрузки удалённого оборудования</li>
                        <li>Увеличение срока службы IT-оборудования (постоянный мониторинг обеспечивает эксплуатацию оборудования в наилучших условиях)</li>
                        <li>Уведомления ответственных лиц о нештатных ситуациях (e-mail, SMS-уведомления, локальные уведомления) позволяют предотвратить остановку сервиса</li>
                    </ul>
                </div>
            </div>
            <div class="who_needs-block row hideContent">
                <div class="who_needs-block__trigger">...</div>
                <div class="image-circles-container">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_4.png" alt="">
                    <div class="circle-inner"></div>
                </div>
                <div class="who_needs-block__text">
                    <div class="heading-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/_who_needs_icon_4.png" alt="">
                        <h3>Компаниям-интеграторам, разрабатывающим проекты IT-инфраструктуры</h3>
                    </div>
                    <ul>
                        <li>Участие инженеров NetPing в процессе проектирования сокращает срок подготовки проектной документации и повышает её качество</li>
                        <li>Наличие сертификатов и разрешительных документов на устройства NetPing упрощает подготовку документации проекта</li>
                        <li>Открытые протоколы интеграции и большое количество примеров интеграции облегчают совместное использование устройств NetPing в одном проекте с устройствами других производителей</li>
                        <li>Регистрация проекта, сопровождение и поддержка до его завершения позволяют быть уверенным, что оборудование NetPing не станет причиной нарушения календарного плана или бюджета проекта</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="circle"></div>
</div>

<div class="demo-section">
    <div class="col-full">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/demo_image.png" alt="">
    </div>
    <div class="button-wrapper">
        <a href="#open_callback_modal" class="button">Подбор решения</a>
    </div>
</div>

<div class="devices-section">
    <div class="col-full">
        <h2 class="h-line">Наши устройства</h2>
        <div class="devices-blocks__container row">
        <?php
        $args = array(
        'post_type' => 'product',
        'meta_query' => array(
            array('key' => 'for_home',
                'value' => true, 
                'compare' => '=',
            )
        ),  
        'posts_per_page' => 4 
        );
        $wc_query = new WP_Query($args);

        if( $wc_query->have_posts() ) {

            while( $wc_query->have_posts() ) {

                $wc_query->the_post();
                // echo '<pre>';
                // print_r($wc_query);
                ?>
                <div class="devices-block">
                    <a class="devices-loop-link row" href="<?php the_permalink() ?>">
                        <div class="image-container">
                            <?php the_post_thumbnail('product_thumb'); ?>
                        </div>
                        <div class="text-container column">
                            <h3><?php the_title() ?></h3>
                            <p>
                                <?php
                                $first_desc = explode(PHP_EOL, wp_strip_all_tags(get_the_excerpt())); 
                                echo $first_desc[0];
                                ?>
                            </p>
                            <div class="more-link">Подробнее <span class="arrow">⟶</span></div>
                        </div>
                    </a>
                </div>
                <?php
                // wc_get_template_part( 'content', 'product' );

            }
            ?>
            </ul>
            <?php
        } else {
            echo "";
        }

        wp_reset_postdata();
        ?>
        </div>
       
    </div>
    <div class="circle"></div>
</div>

<div class="clients-section">
    <div class="col-full">
        <h2 class="h-line">Наши клиенты</h2>
        <div class="clients-container row">
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_yandex.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_rostel.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_sber.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_rozahutor.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_perviy.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_avangard.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_domoded.png" alt="">
            </div>
            <div class="clients-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_gazprom.png" alt="">
            </div>
        </div>
    </div>
</div>

<div class="news-section">
    <div class="circle"></div>
    <div class="col-full">
        <h2 class="h-line">Наш блог</h2>
        <div class="news-blocks row">
            <?php
            $news_loop = new WP_Query([
                'post_type'=> 'netping_news',
                'posts_per_page' => 4
            ]);
            ?>

            <?php if ($news_loop->have_posts()) : ?>
                <?php while ($news_loop->have_posts()) : $news_loop->the_post(); ?>
                <?php $img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>
                    <div class="news-block">
                        <div class="row">
                            <?php if ( $img_url ): ?>
                            <div class="news-block-image">
                                <img src="<?php echo $img_url; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="column">
                                <small><?php the_time('F jS, Y') ?></small>
                                <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                        <div class="entry">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="more-link-container"><a class="more-link" href="<?php the_permalink(); ?>">Подробнее</a> <span class="arrow">⟶</span></div>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                    <p>Пока y нас нет новостей.</p>
            <?php endif ?>

            <?php wp_reset_postdata(); ?>

        </div>
    </div>
</div>

<div class="contacts-section">
    <div class="circle"></div>
    <div class="col-full">
        <h2 class="h-line h-line__centered">Наши контакты</h2>
        <div class="contacts-container row">
            <div class="contact-block">
                <div class="big-text"><a href="mailto:sales@netping.ru">sales@netping.ru</a></div>
                <span>Отдел продаж</span>
            </div>
            <div class="contact-block">
            <div class="big-text"><a href="mailto:support@netping.ru">support@netping.ru</a></div>
                <span>Техподдержка</span>
            </div>
            <div class="contact-block">
                <div>111524, г. Москва,<br>
                ул. Электродная, дом 2, строение 12,<br>
                подъезд 1, этаж 4</div>
            </div>
            <div class="contact-block button-wrapper">
                <a href="#open_callback_modal" class="button">Свяжитесь с нами</a>
            </div>
            <div class="contact-block">
            <div class="big-text"><a href="tel:84956468537">8 (495) 646-85-37</a></div>
                <span>Консультация по продуктам</span>
            </div>
            <div class="contact-block">
                <span><a href="/o-kompanii/kontakty/">Реквизиты →</a></span>
            </div>
        </div>
    </div>
</div>

<div class="map-section">
    <div id="map">

    </div>
</div>



<?php get_footer();