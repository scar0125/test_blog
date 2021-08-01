<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="text/javascript">
        function check(){
	        if(window.confirm('削除しますか？')){ // 確認ダイアログを表示
		        return true;
	        }
	        else{ // 「キャンセル」時の処理
		        return false;
	        }
        }
        </script>
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='create'>[<a href='/posts/create'>create</a>]</p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                    <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" onSubmit="return check()" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>