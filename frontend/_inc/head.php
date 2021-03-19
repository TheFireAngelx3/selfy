<?php
use backend\services\ConfigService;
?>
<!DOCTYPE html>
<html lang="<?php echo ConfigService::LOCALE ?>">
<head>
    <meta charset="UTF-8">
    <title><?php get('seoTitle'); ?></title>
    <meta name="description" content="<?php get('seoDescription'); ?>" />
    <link rel="stylesheet" href="css/all.css" />
</head>
