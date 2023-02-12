<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach($posts as $post): ?>
        <article>
            <h1>
                <a href="/post/<?= $post->slug; ?>">
                    <?=$post->title?></h1>
                </a>
            <div>
                <?=$post->excerpt?>
            </div>    
        </article>
    <?php endforeach; ?>
</body>
