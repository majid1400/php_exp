<?php
include "config.php";
include "data.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php echo ENCODING; ?>">
    <title><?php echo SITE_TITLE; ?> </title>
    <?php echo $style_and_scripts; ?>

</head>
<body>
<div class="continer">
    <div class="row header">
        <h1>اولین سایت من</h1>
    </div>

    <div class="row">
        <div class="column column-25 sidebar">
            <div class="column widget">
                <?php if (!user_logged_in()): ?>
                    <a href="login.php" class="button">ورود </a>
                    <a href="register.php" class="button">عضویت </a>
                <?php else: ?>
                    <div class="wgtTitle">
                        <?php
                        $user_info = get_user_info($_SESSION['login']);
                        echo 'خوش آمدید ' . $user_info['display_name'];
                        ?>
                    </div>
                    <a href="login.php?action=logout" class="button">خروج </a>
                <?php endif; ?>

            </div>
            <?php foreach ($widgets as $widget): ?>
                <div class="column widget">
                    <div class="wgtTitle"><?php echo $widget[0] ?></div>
                    <div class="wgtBody"><?php echo $widget[1] ?></div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="column column-72 column-offset-3 content">
            <?php // foreach ($posts as $post): ?>
            <?php for ($i = $startIndex; $i < $startIndex + PAGE_SIZE; $i++): ?>
                <?php if (!empty($posts[$i])): ?>
                    <div class="column postBox">
                        <div class="postTitle"><?php echo $posts[$i][0]; ?> </div>
                        <div class="postBody"><?php echo $posts[$i][1]; ?> </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            <?php // endforeach; ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $pageCount; $i++): ?>
                    <a class="button" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>