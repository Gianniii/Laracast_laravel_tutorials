<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1><?= $post->title?></h1>
        <div>
            <p><?= $post->body ?></p>
        </div>
    </article>

    <a href="/">Go back</a>
</body>
