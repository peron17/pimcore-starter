<?php

/** 
 * PT. Ako Media Asia (https://salt.co.id)
 * Copyright 2020
 *
 * Licensed Under MIT Lisence
 * Redistributions of files must retain the above copyright notice.
 *
 * @ Author: Tommy Priambodo
 * @ Create Time: 2020-07-30 16:48:04
 * @ Modified by: Tommy Priambodo
 * @ Modified time: 2020-07-30 16:48:15
 * @ Description:
 */
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_segments = explode('/', $uri_path);
// dd($url_segments);
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <?php 
            $jml = count($url_segments);
            ?>
            <?php if ($jml > 0): ?>
                <?php foreach($url_segments as $segment): ?>
                    <?php if (!$segment) continue; ?>
                    <li class="breadcrumb-item">
                        <a href="#">
                            <?= ucwords(str_replace('-', ' ', $segment)) ?>
                        </a>
                    </li>

                <?php endforeach ?>
            <?php endif ?>
        </ol>
    </nav>