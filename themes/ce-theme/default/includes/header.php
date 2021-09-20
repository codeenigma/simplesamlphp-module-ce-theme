<?php
/**
 * Support the htmlinject hook, which allows modules to change header, pre and post body on all pages.
 */
$this->data['htmlinject'] = [
    'htmlContentPre' => [],
    'htmlContentPost' => [],
    'htmlContentHead' => [],
];

$jquery = [];
if (array_key_exists('jquery', $this->data)) {
    $jquery = $this->data['jquery'];
}

if (array_key_exists('pageid', $this->data)) {
    $hookinfo = [
        'pre' => &$this->data['htmlinject']['htmlContentPre'],
        'post' => &$this->data['htmlinject']['htmlContentPost'],
        'head' => &$this->data['htmlinject']['htmlContentHead'],
        'jquery' => &$jquery,
        'page' => $this->data['pageid']
    ];
        
    SimpleSAML\Module::callHooks('htmlinject', $hookinfo);
}
// - o - o - o - o - o - o - o - o - o - o - o - o -

/**
 * Do not allow to frame SimpleSAMLphp pages from another location.
 * This prevents clickjacking attacks in modern browsers.
 *
 * If you don't want any framing at all you can even change this to
 * 'DENY', or comment it out if you actually want to allow foreign
 * sites to put SimpleSAMLphp in a frame. The latter is however
 * probably not a good security practice.
 */
header('X-Frame-Options: SAMEORIGIN');

$onLoad = '';
if (array_key_exists('autofocus', $this->data)) {
    $onLoad .= 'SimpleSAML_focus(\'' . $this->data['autofocus'] . '\');';
}
if (isset($this->data['onLoad'])) {
    $onLoad .= $this->data['onLoad'];
}

if ($onLoad !== '') {
    $onLoad = ' onload="' . $onLoad . '"';
}

?><!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
  <head>
    <meta charset="utf-8" />
    <link rel="shortlink" href="https://login.codeenigma.net" />
    <link rel="canonical" href="https://login.codeenigma.net" />
    <meta name="description" content="Single Sign-On services for Code Enigma" />
    <meta name="theme-color" content="#ffffff" />
    <meta name="MobileOptimized" content="width" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Login to Code Enigma</title>

    <link rel="shortcut icon" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/favicon.ico"); ?>" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/style.css"); ?>" />
    <link rel="stylesheet" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.typekit.net/zlk0buq.css">

    <link rel="shortcut icon" type="image/icon" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/favicon.ico"); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/apple-touch-icon.png"); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/favicon-32x32.png"); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/favicon-16x16.png"); ?>">
    <link rel="mask-icon" href="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/safari-pinned-tab.svg"); ?>" color="#5bbad5">    
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="<?php echo SimpleSAML\Module::getModuleURL("ce-theme/icons/browserconfig.xml"); ?>">

     <script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/script.js"></script>

    <!-- Always load in jQuery -->
    <script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/jquery-1.8.js"></script>
    <script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/jquery-ui-1.8.js"></script>
    <link rel="stylesheet" media="screen" type="text/css" href="/<?php echo $this->data['baseurlpath']; ?>resources/uitheme1.8/jquery-ui.css" />
<?php
if (isset($this->data['clipboard.js'])) {
    echo '<script type="text/javascript" src="/' . $this->data['baseurlpath'] . 'resources/clipboard.min.js"></script>' . "\n";
}

if (!empty($this->data['htmlinject']['htmlContentHead'])) {
    foreach ($this->data['htmlinject']['htmlContentHead'] as $c) {
        echo $c;
    }
}
?>
  </head>

  <body<?php echo $onLoad; ?>>
    <div id="page-wrapper">
        <div id="page">
            <header id="header" class="header" role="banner">
                <div class="section layout-container clearfix">
                    <div class="region region--header-top">
                        <div id="navbar-main" class="navbar-main">
                            <nav role="navigation" aria-labelledby="block-enigma-corporate-main-menu-menu" id="block-enigma-corporate-main-menu" class="block block-menu navigation menu--main">

                                <h2 class="visually-hidden" id="block-enigma-corporate-main-menu-menu">Main navigation</h2>
                                <div class="logo--wrapper">
                                    <a href="/" data-log-event="home" class="logo__link">
                                        <svg class="logo" title="Code Engima logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 673.89 148.28"><defs><style>.cls-1,.cls-4{fill:none;}.cls-2{fill:#fff;}.cls-3{clip-path:url(#clip-path);}.cls-4{stroke:#fff;stroke-miterlimit:10;stroke-width:6px;}.cls-5{clip-path:url(#clip-path-2);}.cls-6{clip-path:url(#clip-path-3);}</style><clipPath id="clip-path" transform="translate(0 -7.32)"><rect class="cls-1" x="502.14" y="0.32" width="43" height="39"></rect></clipPath><clipPath id="clip-path-2" transform="translate(0 -7.32)"><rect class="cls-1" x="558.76" width="42.52" height="39.1"></rect></clipPath><clipPath id="clip-path-3" transform="translate(0 -7.32)"><rect class="cls-1" x="614.89" y="0.32" width="43" height="39"></rect></clipPath></defs><title>Code Enigma logo</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-2" d="M47.06,77.38a24.73,24.73,0,0,0-6.82-5.14,19.19,19.19,0,0,0-8.52-1.75,18.85,18.85,0,0,0-8.39,1.75,17.12,17.12,0,0,0-6,4.81,21.5,21.5,0,0,0-3.64,7,27.45,27.45,0,0,0-1.24,8.26,23.09,23.09,0,0,0,1.43,8.12,20.49,20.49,0,0,0,4,6.7,18.51,18.51,0,0,0,6.24,4.48,19.8,19.8,0,0,0,8.19,1.63,18.73,18.73,0,0,0,8.45-1.76,21.64,21.64,0,0,0,6.5-5.13l8.32,8.32A26.18,26.18,0,0,1,45,122a37,37,0,0,1-12.8,2.21,35.17,35.17,0,0,1-13.06-2.34A30.09,30.09,0,0,1,9,115.27a28.89,28.89,0,0,1-6.63-10.14A35.17,35.17,0,0,1,0,92.07,35.7,35.7,0,0,1,2.34,78.94,29.37,29.37,0,0,1,19,62a34.87,34.87,0,0,1,13.2-2.4A35.42,35.42,0,0,1,45.18,62,28.58,28.58,0,0,1,55.9,69.32Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M56.68,91.81A31.53,31.53,0,0,1,59.21,79.2a33,33,0,0,1,7-10.27,33.09,33.09,0,0,1,46.54,0,33,33,0,0,1,7,10.27,31.35,31.35,0,0,1,2.53,12.61,32,32,0,0,1-9.49,22.94,33,33,0,0,1-10.4,6.89,33.31,33.31,0,0,1-36.14-6.89,32,32,0,0,1-9.49-22.94Zm12.48,0a25.34,25.34,0,0,0,1.43,8.64,19.4,19.4,0,0,0,4,6.76A18.52,18.52,0,0,0,81,111.63a22.72,22.72,0,0,0,16.9,0,18.52,18.52,0,0,0,6.37-4.42,19.56,19.56,0,0,0,4-6.76,26.85,26.85,0,0,0,0-17.29,19.74,19.74,0,0,0-4-6.76A18.8,18.8,0,0,0,97.89,72,22.85,22.85,0,0,0,81,72a18.8,18.8,0,0,0-6.37,4.42,19.59,19.59,0,0,0-4,6.76A25.44,25.44,0,0,0,69.16,91.81Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M193.14,122.11h-12v-8h-.26a22.27,22.27,0,0,1-9.3,7.68,28.81,28.81,0,0,1-12.18,2.73,32.64,32.64,0,0,1-13-2.47,28.62,28.62,0,0,1-9.89-6.9,31.19,31.19,0,0,1-6.32-10.28A36,36,0,0,1,128,92.11a36.46,36.46,0,0,1,2.21-12.82A30.34,30.34,0,0,1,136.56,69a29.13,29.13,0,0,1,9.89-6.83,32.64,32.64,0,0,1,13-2.47,28.55,28.55,0,0,1,12.5,2.8,21.26,21.26,0,0,1,9,7.61h.26v-46h12Zm-32.46-8.85a21.05,21.05,0,0,0,8.45-1.63,18.62,18.62,0,0,0,6.37-4.42,19.56,19.56,0,0,0,4-6.76,26.85,26.85,0,0,0,0-17.29,19.74,19.74,0,0,0-4-6.76A18.89,18.89,0,0,0,169.13,72a22.85,22.85,0,0,0-16.9,0,18.7,18.7,0,0,0-6.37,4.42,19.43,19.43,0,0,0-4,6.76,26.85,26.85,0,0,0,0,17.29,19.25,19.25,0,0,0,4,6.76,18.43,18.43,0,0,0,6.37,4.42A21,21,0,0,0,160.68,113.26Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M212.74,96.11a15.47,15.47,0,0,0,1.76,7.35,18.33,18.33,0,0,0,4.61,5.65,21.29,21.29,0,0,0,6.63,3.64,23.73,23.73,0,0,0,7.8,1.3,17.43,17.43,0,0,0,9.49-2.53,30.32,30.32,0,0,0,7.41-6.7l8.84,6.76q-9.75,12.61-27.3,12.61a33.85,33.85,0,0,1-13.19-2.47,28.75,28.75,0,0,1-10-6.82,30.48,30.48,0,0,1-6.31-10.27,36.4,36.4,0,0,1-2.21-12.81A33.52,33.52,0,0,1,202.67,79a31.53,31.53,0,0,1,6.63-10.27,30.13,30.13,0,0,1,10.07-6.83,32.55,32.55,0,0,1,12.74-2.47A30.55,30.55,0,0,1,246,62.31a27.29,27.29,0,0,1,9.29,7.48,29.48,29.48,0,0,1,5.27,10.4A43.39,43.39,0,0,1,262.14,92v4.16Zm37.38-9A24.7,24.7,0,0,0,248.88,80a15.68,15.68,0,0,0-3.31-5.65A15.27,15.27,0,0,0,240,70.54a20.21,20.21,0,0,0-7.73-1.37,18.73,18.73,0,0,0-7.87,1.63,19.09,19.09,0,0,0-6,4.22,19.49,19.49,0,0,0-3.84,5.79,15.87,15.87,0,0,0-1.36,6.3Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M279.74,96.11a15.47,15.47,0,0,0,1.76,7.35,18.33,18.33,0,0,0,4.61,5.65,21.29,21.29,0,0,0,6.63,3.64,23.73,23.73,0,0,0,7.8,1.3,17.43,17.43,0,0,0,9.49-2.53,30.32,30.32,0,0,0,7.41-6.7l8.84,6.76q-9.75,12.61-27.3,12.61a33.85,33.85,0,0,1-13.19-2.47,28.75,28.75,0,0,1-10-6.82,30.48,30.48,0,0,1-6.31-10.27,36.4,36.4,0,0,1-2.21-12.81A33.52,33.52,0,0,1,269.67,79a31.53,31.53,0,0,1,6.63-10.27,30.13,30.13,0,0,1,10.07-6.83,32.55,32.55,0,0,1,12.74-2.47A30.55,30.55,0,0,1,313,62.31a27.29,27.29,0,0,1,9.29,7.48,29.48,29.48,0,0,1,5.27,10.4A43.39,43.39,0,0,1,329.14,92v4.16Zm36.68-9A24.7,24.7,0,0,0,315.18,80a15.68,15.68,0,0,0-3.31-5.65,15.27,15.27,0,0,0-5.53-3.77,20.21,20.21,0,0,0-7.73-1.37,18.73,18.73,0,0,0-7.87,1.63,19.09,19.09,0,0,0-6,4.22,19.49,19.49,0,0,0-3.84,5.79,15.87,15.87,0,0,0-1.36,6.3Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M337.14,61.11h11v9h.26a17.26,17.26,0,0,1,7.69-8,25.57,25.57,0,0,1,12.64-3,26.93,26.93,0,0,1,8.54,1.36,19.34,19.34,0,0,1,7.16,4.21A20.5,20.5,0,0,1,389.32,72a28,28,0,0,1,1.82,10.57v39.55h-11V85.71A20.52,20.52,0,0,0,379,78.37a13.31,13.31,0,0,0-3.1-4.94,11.53,11.53,0,0,0-4.46-2.73,16.1,16.1,0,0,0-5.23-.85A18.81,18.81,0,0,0,359.48,71a14,14,0,0,0-5.43,3.71,17.33,17.33,0,0,0-3.61,6.43,29.2,29.2,0,0,0-1.3,9.23l-1,32.72h-11Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M404.14,61.11h12v62h-12Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M490.14,123.31a33.52,33.52,0,0,1-2.46,13,29.78,29.78,0,0,1-7,10.19,31.83,31.83,0,0,1-10.94,6.69,40.36,40.36,0,0,1-14.13,2.38,52.08,52.08,0,0,1-16.6-2.52,40.08,40.08,0,0,1-14.33-8.73l8.13-10.06a33.27,33.27,0,0,0,10.13,7.61,28.74,28.74,0,0,0,12.4,2.58,27.75,27.75,0,0,0,11.07-1.92,19,19,0,0,0,7-5,18,18,0,0,0,3.67-7,29.8,29.8,0,0,0,1.06-7.88v-9.67h-.39a20.72,20.72,0,0,1-9.24,8.33,29,29,0,0,1-12.26,2.68,32.58,32.58,0,0,1-12.65-2.42A29.81,29.81,0,0,1,427,104.92a33.3,33.3,0,0,1-2.36-12.65,36.39,36.39,0,0,1,2.22-12.79,31.41,31.41,0,0,1,6.36-10.42,29.06,29.06,0,0,1,10-7,32.85,32.85,0,0,1,13-2.49,28.9,28.9,0,0,1,12.26,2.76,22.45,22.45,0,0,1,9.37,7.73h.26v-9h12ZM458.25,70.36A21.19,21.19,0,0,0,449.8,72a18.7,18.7,0,0,0-6.37,4.42,19.43,19.43,0,0,0-4,6.76A25.2,25.2,0,0,0,438,91.81q0,9.36,5.46,15t14.82,5.66q9.36,0,14.82-5.66t5.46-15a25.44,25.44,0,0,0-1.43-8.65,19.74,19.74,0,0,0-4-6.76A18.89,18.89,0,0,0,466.7,72,21.22,21.22,0,0,0,458.25,70.36Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M502.14,61.11h11v10h.26a10.28,10.28,0,0,1,2-3.25,20.6,20.6,0,0,1,4.16-3.7,25.34,25.34,0,0,1,6-3,22.23,22.23,0,0,1,7.6-1.24,21.77,21.77,0,0,1,11.54,2.86,21.27,21.27,0,0,1,7.66,8.58,19.75,19.75,0,0,1,8.43-8.58,23.58,23.58,0,0,1,11-2.86q7.14,0,11.68,2.34a18.83,18.83,0,0,1,7.13,6.18,23.58,23.58,0,0,1,3.57,8.71,51.26,51.26,0,0,1,1,10.07v35.88h-12V88.79a49.3,49.3,0,0,0-.45-6.76,15.69,15.69,0,0,0-1.89-5.72,10.65,10.65,0,0,0-4-4,13.72,13.72,0,0,0-6.89-1.5q-8.46,0-12.1,5.2t-3.64,13.39v33.67h-12V90.87a66.16,66.16,0,0,0-.45-8.06,19,19,0,0,0-1.82-6.3,10,10,0,0,0-3.9-4.16,13.38,13.38,0,0,0-6.83-1.5,15.31,15.31,0,0,0-6,1.24,14.4,14.4,0,0,0-5.14,3.7,18.11,18.11,0,0,0-3.51,6.31,28.35,28.35,0,0,0-1.3,9v32h-11Z" transform="translate(0 -7.32)"></path><path class="cls-2" d="M606.59,68.17a32.87,32.87,0,0,1,11.53-6.85A39.33,39.33,0,0,1,631.21,59a36,36,0,0,1,11.72,1.7A22.88,22.88,0,0,1,651,65.3a18.16,18.16,0,0,1,4.65,6.6,20.59,20.59,0,0,1,1.5,7.77v31.69c0,2.09,0,4,.13,5.75s.21,3.42.37,5h-10q-.37-4.5-.37-9h-.73a22.5,22.5,0,0,1-9.3,8.49,29.29,29.29,0,0,1-12.44,2.48,28.76,28.76,0,0,1-8.25-1.17,20.12,20.12,0,0,1-6.88-3.53,17,17,0,0,1-4.65-5.81,18.09,18.09,0,0,1-1.7-8,17.8,17.8,0,0,1,2.69-10,20.23,20.23,0,0,1,7.33-6.6,35.39,35.39,0,0,1,10.87-3.66,75.62,75.62,0,0,1,13.29-1.11h8.64V81.5a12.94,12.94,0,0,0-3.66-9,13.17,13.17,0,0,0-4.59-3,17.41,17.41,0,0,0-6.54-1.11,23.94,23.94,0,0,0-6,.65,26.94,26.94,0,0,0-4.65,1.63,20.07,20.07,0,0,0-3.8,2.29l-3.27,2.48ZM639.9,93.11a80.07,80.07,0,0,0-8.51.46,33.33,33.33,0,0,0-7.93,1.75A15.23,15.23,0,0,0,617.61,99a8.22,8.22,0,0,0-2.28,6c0,3.56,1.19,6.11,3.58,7.67s5.61,2.34,9.68,2.34a18.81,18.81,0,0,0,8.19-1.62,15.29,15.29,0,0,0,5.46-4.23,16.19,16.19,0,0,0,3-5.78,22.81,22.81,0,0,0,.91-6.31v-3.9Z" transform="translate(0 -7.32)"></path><g class="cls-3"><polyline class="cls-4" points="500.81 13.32 524.48 27.83 548.16 13.32"></polyline><line class="cls-4" x1="496.98" y1="3" x2="551.98" y2="3"></line></g><g class="cls-5"><line class="cls-4" x1="553" y1="3" x2="608" y2="3"></line><line class="cls-4" x1="553" y1="29" x2="608" y2="29"></line><line class="cls-4" x1="553" y1="16" x2="608" y2="16"></line></g><g class="cls-6"><line class="cls-4" x1="623.89" y1="29" x2="647.89" y2="29"></line><ellipse class="cls-4" cx="635.89" cy="36.5" rx="35" ry="33.5"></ellipse></g></g></g></svg>
                                    </a>
                                </div>
                                <input type="checkbox" id="menu-toggle">
                                <label for="menu-toggle" class="menu-toggle">
                                    <span class="open">Menu</span>
                                    <span class="closed">Close menu</span>
                                </label>
                                <div class="content-overlay"></div>

                                <div class="region--navigation">
                                    <div class="content">
                                        <ul class="menu--main-nav">
                                            <li class="menu-item menu--main-nav__menu-item">
                                                <a href="https://www.codeenigma.com/our-services" title="See our services" data-drupal-link-system-path="node/343">Our services</a>
                                            </li>

                                            <li class="menu-item menu--main-nav__menu-item">
                                                <a href="https://www.codeenigma.com/work" data-drupal-link-system-path="node/24">Who we work with</a>
                                            </li>

                                            <li class="menu-item menu--main-nav__menu-item">
                                                <a href="https://www.codeenigma.com/about-us" data-drupal-link-system-path="node/129">About us</a>
                                            </li>

                                            <li class="menu-item menu--main-nav__menu-item">
                                                <a href="https://www.codeenigma.com/blog" data-drupal-link-system-path="node/318">Blog</a>
                                            </li>

                                            <li class="menu-item menu--main-nav__menu-item">
                                                <a href="https://www.codeenigma.com/contact-us">Contact us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <span class="header-line"></span>

                    <div class="region region-header-lower">
                        <div id="block-enigma-corporate-page-title" class="block block-enigma-corporate-page-title">
                            <h1 class="page-title">Log into Code Enigma</h1>
                        </div>
                    </div>
                </div>
            </header>

<!-- commenting out the SimpleSAMLphp language bar for now
    <?php

    $includeLanguageBar = true;
    if (!empty($_POST)) {
        $includeLanguageBar = false;
    }
    if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === true) {
        $includeLanguageBar = false;
    }

    if ($includeLanguageBar) {
        $languages = $this->getLanguageList();
        ksort($languages);
        if (count($languages) > 1) {
            echo '<div id="languagebar">';
            $langnames = [
                'no' => 'Bokmål', // Norwegian Bokmål
                'nn' => 'Nynorsk', // Norwegian Nynorsk
                'se' => 'Sámegiella', // Northern Sami
                'da' => 'Dansk', // Danish
                'en' => 'English',
                'de' => 'Deutsch', // German
                'sv' => 'Svenska', // Swedish
                'fi' => 'Suomeksi', // Finnish
                'es' => 'Español', // Spanish
                'ca' => 'Català', // Catalan
                'fr' => 'Français', // French
                'it' => 'Italiano', // Italian
                'nl' => 'Nederlands', // Dutch
                'lb' => 'Lëtzebuergesch', // Luxembourgish
                'cs' => 'Čeština', // Czech
                'sl' => 'Slovenščina', // Slovensk
                'lt' => 'Lietuvių kalba', // Lithuanian
                'hr' => 'Hrvatski', // Croatian
                'hu' => 'Magyar', // Hungarian
                'pl' => 'Język polski', // Polish
                'pt' => 'Português', // Portuguese
                'pt-br' => 'Português brasileiro', // Portuguese
                'ru' => 'русский язык', // Russian
                'et' => 'eesti keel', // Estonian
                'tr' => 'Türkçe', // Turkish
                'el' => 'ελληνικά', // Greek
                'ja' => '日本語', // Japanese
                'zh' => '简体中文', // Chinese (simplified)
                'zh-tw' => '繁體中文', // Chinese (traditional)
                'ar' => 'العربية', // Arabic
                'he' => 'עִבְרִית', // Hebrew
                'id' => 'Bahasa Indonesia', // Indonesian
                'sr' => 'Srpski', // Serbian
                'lv' => 'Latviešu', // Latvian
                'ro' => 'Românește', // Romanian
                'eu' => 'Euskara', // Basque
                'af' => 'Afrikaans', // Afrikaans
            ];

            $textarray = [];
            foreach ($languages as $lang => $current) {
                $lang = strtolower($lang);
                if ($current) {
                    $textarray[] = $langnames[$lang];
                } else {
                    $textarray[] = '<a href="' . htmlspecialchars(
                        \SimpleSAML\Utils\HTTP::addURLParameters(
                            \SimpleSAML\Utils\HTTP::getSelfURL(),
                            [$this->getTranslator()->getLanguage()->getLanguageParameterName() => $lang]
                        )
                    ) . '">' .
                        $langnames[$lang] . '</a>';
                }
            }
            echo join(' | ', $textarray);
            echo '</div>';
        }
    }
?>
-->
    <div id="main-wrapper" class="layout-main-wrapper layout-container clearfix">
        <div id="main" class="clearfix layout-main">
            <main id="content" class="column main-content" role="main">

<?php
if (!empty($this->data['htmlinject']['htmlContentPre'])) {
    foreach ($this->data['htmlinject']['htmlContentPre'] as $c) {
        echo $c;
    }
}
