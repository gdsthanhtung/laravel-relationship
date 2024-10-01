<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($posts as $post)
        <p>
            {{ $post->name }} | {{ $post->user->name }} | {{ isset($post->user->image->url) ? $post->user->image->url : 'no-image' }} |

            @foreach ($post->categories as $item)
                {{ $item->name.', ' }}
            @endforeach
        </p>
    @endforeach
</body>
</html>
