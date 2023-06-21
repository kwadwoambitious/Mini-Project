<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home_page.css">
  <title>Web Talk - New Post</title>
</head>
<body>
      <header>
          <h1><span>Web</span>Talk</h1>
          <nav>
            <ul>
              <li><a href="home.php" class="active">Forum</a></li>
              <li><a href="new-post.php">New</a></li>
              <li><a href="">Your Posts</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
      </header>
      <main>
        <h3>Create New Topic</h3>
        <hr>

        <h4>Topic Title</h4>
        <input type="text" name="topic_title" placeholder="Subject of your topic" id="topic_title" />
        <p>Describe your topic well, while keeping the subject as short as possible.</p>

        <h4>Topic Body</h4>
        <textarea name="topic_body" placeholder="Type message..." id="topic_body"></textarea>
        <input type="submit" name="create_post" value="Create Post" id="create_post" />
      </main>
</body>
</html>