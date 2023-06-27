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


        /* h1 {
            font-size: 45px;
            font-family:;
            color: #333;
            margin: 1vh auto auto 1vw;
        } */
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
            color: #1a3470;
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
        a img{
            width: 4vw;
            height: 5vh;
        }
        .text-blinking span{
            color: white;
        }
    </style>
</head>

<body>
    <div class="text-blinking">
        <span>B</span>
        <span>L</span>
        <span>O</span>
        <span>G</span>
        <span>P</span>
        <span>R</span>
        <span>O</span>
        <span>J</span>
        <span>E</span>
        <span>T</span>
    </div>
    <div class="parent">
        @foreach ($admin_comment as $comment)
        <form id="delete-form-{{ $comment->id }}" method="POST" action="{{ route('admin_comment.destroy',$comment->id)}}">
            @csrf
            @method('DELETE')
        </form>
            <div class="divP">
                <h2>{{ $comment->nom }}</h2>
                <span>{{ $comment->commentaire }}</span>
                <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this post?')) { document.getElementById('delete-form-{{ $comment->id }}').submit(); }">delete</a>
            </div>
        @endforeach
    </div>  
</body>

</html>
