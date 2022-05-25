<?php

function echoFooter()
{
    $html = <<<EOT
        <footer>
            <p>
                <a href="/privacy.php">Privacy Statement</a>
            </p>
        </footer>
    EOT;

    echo $html;
}
