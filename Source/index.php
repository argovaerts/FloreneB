<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Personal website of Arne Govaerts</title>

    <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css" media="screen">
    <link rel="stylesheet" href="terminal.css" media="screen">
    <link rel="stylesheet" href="print.css" media="print"/>
    <link rel="icon" href="Arne.jpg"/>

    <link rel="authorization_endpoint" href="https://indieauth.com/auth"/>
    <link rel="token_endpoint" href="https://tokens.indieauth.com/token"/>

    <link rel="alternate" type="application/atom+xml" title="Atom feed" href="https://granary.io/url?input=html&output=atom&url=https://q4.re" />
    <link rel="alternate" type="application/rss+xml" title="RSS feed" href="https://granary.io/url?input=html&output=rss&url=https://q4.re" />
    <link rel="alternate" type="application/json" title="JSON feed" href="https://granary.io/url?input=html&output=jsonfeed&url=https://q4.re" />

    <link rel="webmention" href="https://webmention.io/q4.re/webmention" />
    <link rel="pingback" href="https://webmention.io/q4.re/xmlrpc" />

    <meta name="author" content="Arne Govaerts (arne@q4.re)" />
    <link rel="canonical" href="https://q4.re/">
    <meta property="og:title" content="Personal website of Arne Govaerts"/>
    <meta property="og:site_name" content="Arne Govaerts"/>
    <meta property="og:url" content="https://q4.re"/>
    <meta property="og:description" name="description" content="Hi! Welcome on my personal website. I'm a CS student, indiehacker and indieweb enthousiast."/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://q4.re/Arne.jpg"/>
    <meta name="twitter:card" content="Hi! Welcome on my personal website. I'm a CS student, indiehacker and indieweb enthousiast."/>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Person",
            "name": "Arne Govaerts",
            "url": "https://q4.re",
            "image": "https://q4.re/Arne.JPG",
            "sameAs": [
                "https://www.facebook.com/argovaerts",
                "https://www.linkedin.com/in/argovaerts/"
            ],
            "jobTitle": "Founder",
            "worksFor": {
                "@type": "Organization",
                "name": "Arnold Analytics"
            }  
        }
    </script>
</head>
<body class="h-feed">
    <header>
        <nav>
            <div><a class="navbar-item u-url" href="https://q4.re">Arne Govaerts</a></div>
            <div><a href="mailto:arne@q4.re" class="navbar-item" rel="me">arne@q4.re</a></div>
        </nav>
    </header>

    <main>
        <section>
            <h1 class="p-name">Arne Govaerts</h1>
            <p>
                Hi! Welcome on my personal website. I'm a CS student, <a href="https://indiemetrics.net">indiehacker</a> and indieweb enthousiast.
            </p>
            <ul>
                <li>Personal email: <a href="mailto:arne@q4.re">arne@q4.re</a></li>
                <li>Work email: <a href="mailto:arne@indiemetrics.net">arne@indiemetrics.net</a></li>
                <li>LinkedIn: <a href="https://www.linkedin.com/in/argovaerts/">argovaerts</a></li>
                <li>
                    License: Source code is licensed
                    <a href="https://blueoakcouncil.org/license/1.0.0">Blue Oak Model License 1.0.0</a>. Website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                </li>
            </ul>
        </section>

        <section>
            <?php
            require '../vendor/autoload.php';

            use Symfony\Component\Yaml\Yaml;
            use DivineOmega\PHPSummary\SummaryTool;

            $Parsedown = new Parsedown();

            $files = glob(__DIR__ . '/Posts/*.md');
            $files = array_reverse($files);
            foreach($files as $file) {
                $id = basename($file);
                $id = str_replace('.md', '', $id);

                $file = file_get_contents($file);
                $yaml = get_string_between($file, '---', '---');

                $content = str_replace($yaml, '' , $file);
                $content = str_replace('------', '', $content);
                $content = $Parsedown->text($content);
                $summary = strip_tags($content);
                $summary = (new SummaryTool($content))->getSummary();

                if(strlen($summary) > 10) {
                    $summary = '<p class="p-summary box">' . strip_tags($summary) . '</p>';
                }
                else {
                    $summary = '';
                }

                $yaml = Yaml::parse($yaml);

                $article = '<article class="h-entry" id="' . $id . '" lang="' . $yaml['lang'] . '">
                        <h2 class="p-name">' . $yaml['name'] . '</h2>
                        <p>
                            Published by <a class="p-author h-card" href="https://q4.re">Arne Govaerts</a>
                            on <a class="u-url" href="#' . $id . '"><time class="dt-published" datetime="' . $yaml['date'] . '">' . $yaml['date'] . '</time></a>
                        </p>
                        ' . $summary . '
                        <div class="e-content">
                        ' . $content . '
                        </div>
                    </article>';

                echo $article;
            }
            ?>
        </section>
    </main>

    <script src="https://app.indiemetrics.net/hello.js"></script>
    <script src="stats.js"></script>
    <noscript><img src="https://app.indiemetrics.net/event/add?create=q4_re_1587111381873&type=pageview" alt="Indiemetrics"></noscript> 
</body>
</html>

<?php

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>