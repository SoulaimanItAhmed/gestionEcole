<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            background: linear-gradient(to right, lightgrey, rgb(114, 165, 180));
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
        }

        .text-blinking {
            margin: 2vh auto auto 2vw;
            font-family: 'Norican', cursive;
            font-size: 50px;
            color: white;
        }

        .text-blinking span {
            animation: TextBlinking 3s;
            animation-iteration-count: infinite;
            animation-fill-mode: forwards;
        }

        .active {
            color: #0080ff;
            text-shadow: 0px 0px 20px white,
                0px 0px 30px white,
                0px 0px 40px white,
                0px 0px 50px white;
        }

        .text-blinking span:nth-child(1) {
            animation-delay: 0s;
        }

        .text-blinking span:nth-child(3) {
            animation-delay: 0.6s;
        }


        .text-blinking span:nth-child(5) {
            animation-delay: 1.2s;
        }


        .text-blinking span:nth-child(7) {
            animation-delay: 1.8s;
        }

        .text-blinking span:nth-child(9) {
            animation-delay: 2.4s;
        }


        @keyframes TextBlinking {
            0% {
                color: white;
                text-shadow: none;
            }

            4% {
                color: white;
                text-shadow: 0px 0px 20px white,
                    0px 0px 30px white,
                    0px 0px 40px white,
                    0px 0px 50px white;
            }

            5% {
                color: white;
                text-shadow: none;
            }

            100% {
                color: white;
                text-shadow: none;
            }

        }

        .divP {
            box-shadow: 2px 2px 4px 0px blue;
            width: 55vw;
            margin-bottom: 4vh;
            height: 60vh;
            padding: 1rem;
            position: relative;
        }

        .parent {
            margin: 3vh auto auto 1vw;
            width: 55vw;
        }

        .display {
            display: flex;
            justify-content: center;
        }

        .display span {
            width: 20vw;
            margin: 2.75vh auto auto 4vw;
        }

        .display img {
            width: 30vw;
            height: 45vh;
            margin: 1vh auto auto 1.5vw;
            box-shadow: 2px 2px 4px 0px white;
        }

        .text-blinking span {
            color: white;
        }

        h2 {
            font-size: 1.5em;
            margin: 0.5vh auto auto 1vw;
        }

        .divP span {
            font-size: 1.2em;
            margin: 0.5em 0;
        }

        .ParentComment {
            margin-top: 3vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 40vw;
        }
        .divpComment {
            background: rgb(243, 243, 250);
            box-shadow: 2px 2px 4px 0px white;
            width: 35vw;
            margin-bottom: 2.5vh;
            height: 15vh;
            padding: 1rem;
            position: relative;
            border-radius: 3vh;
        }

        .divpComment h2 {
            font-size: 1.5em;
            margin: -2.5vh auto auto 0vw;
        }

        .divpComment textarea {
            margin: 0.5vh auto auto 1vw;
            border: none;
            width: 90%;
            height: 70%;
            border-radius: 1.5vh;
            background: rgb(243, 243, 250);
        }

        .displayCommentPost {
            display: flex;
            justify-content: center;
        }
        .formStyle input{
            margin-top:0.5vh; 
            margin-left:4vw; 
            width: 45vw;
            height: 10vh;
            border: none;
            border-radius:1vh; 
        }
        .formStyle input::placeholder{
            text-align: center;
        }
        .formStyle button{
            display: block;
            margin:1.5vh auto auto 23vw; 
            width: 9vw;
            height: 5vh;
            border: none;
            border-radius:1vh;
            background: #8caed1; 
            cursor: pointer;
        }
        .formStyle button:hover{
            background: #0080ff;
        }
    </style>
</head>

<body>

    <div class="text-blinking">
        <span>B</span>
        <span>L</span>
        <span>O</span>
        <span>G</span>&nbsp;
        <span>P</span>
        <span>R</span>
        <span>O</span>
        <span>J</span>
        <span>E</span>
        <span>T</span>
    </div>

    <div class="displayCommentPost">
        <div class="parent">
            <div class="divP">
                <h2>{{ $post->titre }}</h2>
                <div class="display">
                    <img src="{{ asset('storage/images/' . $post->image) }}">
                    <span>{{ $post->contenu }}</span>
                </div>
            </div>
            <div class="formStyle">
                <form action="{{ route('posts.store', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <input type="text" name="content" placeholder="Add Comment">
                    <button type="submit">Ajouter</button>
                    <input type="hidden" name="id" value="{{ $post->id }}">
                </form>
            </div>
        </div>

        <div class="ParentComment">
            @foreach ($commentaires as $comment)
                <div class="divpComment">
                    <h2> {{ $comment->nom }} </h2>
                    <textarea disabled> {{ $comment->commentaire }} </textarea>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
