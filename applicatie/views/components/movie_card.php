<?php

function main_page_card($id, $title, $publication_year)
{
    $html = <<<"EOT"
    <a href="/detail.php?id=$id" class="card-link">
            <article class="card">
                <div class="card-image">
                    <img src="/images/batman.jpg" alt="batman" />
                </div>
                <div class="card-title">
                    <h3>$title</h3><span class="fs-300">($publication_year)</span>
                </div>
            </article>
        </a>
EOT;

    return $html;
}
