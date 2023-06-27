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
            height: 75vh;
            padding: 1rem;
            position: relative;
        }

        .parent {
            margin-top: 3vh;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .divP span{
            margin: 1.5vh auto auto 1.5vw;
            display: block;
            color: white;
            box-shadow:blue;
            font-size: large;
            font-weight: bold;
        }
        .divP input{
            margin:1vh auto auto 3vw;
            border-radius: 1vh;
            border: none; 
            box-shadow: 2px 2px 4px 0px lightblue;
        }
        .divP textarea{
            margin:1vh auto auto 3vw;
            border-radius: 1vh;
            border: none; 
            box-shadow: 2px 2px 4px 0px lightblue;
        }
        .second input{
            height: 8vh;
            text-align: center;
        }
        .thurd textarea{
            height: 20vh;
            width: 45vw;
            padding-top: 5vh;
            padding-left: 3vw;
        }
        .fourth input{
            height: 7vh;
            width: 11vw;
            text-align: center;
        }
        .divP button{
            bottom: 4vh;
            right: 4vw;
            position: absolute;
            width: 8.5vw;
            height: 6vh;
            border-radius: 1vh;
            border: none;
            color: white;
            background: rgb(132, 132, 255);
            box-shadow: 2px 2px 4px 0px rgb(109, 107, 230);
        }
        .divP button:hover{
            background:rgb(101, 101, 170);
            box-shadow: 2px 2px 4px 0px blue;
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
    <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="parent">
            <div class="divP">
                <div class="fourth"><span>User ID:</span><input type="text" name="user_id" value="{{ $admin->user_id }}"><div>
                <div class="second"><span>Titre:</span><input type="text" name="titre" value="{{ $admin->titre }}"><br></div>
                <div class="thurd"><span>Contenu:</span> <textarea name="contenu" rows="4" cols="50 ">{{ $admin->contenu }}</textarea><br></div>
                <div class="first"><span>Image:</span><input type="file" name="image" value="{{ $admin->image }}"><br></div>
                <input type="hidden" name="hidden_id" value="{{ $admin->id }}">
                <input type="hidden" name="hidden_image" value="{{ $admin->image }}">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>
</body>

</html>
