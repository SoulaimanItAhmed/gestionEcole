<html>
    <head>
        <style>
            body {
                background: linear-gradient(to right, lightgrey, rgb(114, 165, 180));
                font-family: Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                margin: 0;
                padding: 0;
            }
            h2 {
            font-size: 1.5em;
            margin: 0.5vh auto auto 1vw;
            }

            .divP span {
                font-size: 1.2em;
                margin: 0.5em 0;
            }

            a {
                color: white;
                text-decoration: none;
                font-weight: bold;
                display: block;
                position: absolute;
                bottom: 5vh;
                right: 2vw;
            }

            a:hover {
                text-decoration: underline;
            }

            .divP{
                box-shadow: 2px 2px 4px 0px blue;
                width: 75vw;
                margin-bottom: 4vh;
                height: 50vh;
                padding: 1rem;
                position: relative;
            }
            
            .parent {
                margin-top: 3vh;
                display: flex;
                align-items: center;
                flex-direction: column;
            }
            .display{
                display: flex;
                justify-content: center;
            }
            .display span{
                width: 20vw;
                margin: 2.75vh auto auto 4vw;
            }
            .display img{
                width: 40vw;
                height: 36vh;
                margin: 1vh auto auto 1.5vw;
            }

        </style>
    </head>
    <h1>Résultats de la recherche pour "{{ $query }}"</h1>
    
        <div class="parent">
            @foreach($articles as $article)
            <a href="{{ route('post.show', $article->id) }}">
                <div class="divP">
                    <h2>{{ $article->titre }}</h2>
                    <div class="display">
                        <img src="{{ asset('storage/images/'.$article->image)}}" >
                        <span>{{ $article->contenu }}</span>
                    </div>
                    </div>
            </a>
            @endforeach
        </div>
    
        @foreach($comments as $comment)
        <a href="{{ route('post.show', $comment->post_id) }}">{{ $comment->commentaire }}</a>
        @endforeach
</html>