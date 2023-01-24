<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link Estilos CSS-->
    <link rel="stylesheet" href="http://localhost/pin-chat/resources/css/Styles.css">

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7483adbd94.js" crossorigin="anonymous"></script>

    <title>Pin-chat</title>
</head>
<body>
    <header id="header">
    <img src="http://localhost/pin-chat/resources/assets/img/Logo.png" id="logo" alt="logo" style="width: 20rem;">

        <h1>Bienvenido, {{ Auth::user()->username }}</h1>

        <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a aria-current="page" href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
        </form>
    <!-- </header><i class="fas fa-paper-plane"></i> -->
    </header>


    <section id="screen">
        <div class="screen-msg">
            @foreach($messages as $message)
                @if($message->user_id == Auth::user()->id)
                    <div class="content-msg-my">
                        <div class="my-message"> 
                            <h4>{{ $message->user_id }}</h4>
                            <h4>{{ $message->created_at }}</h4>
                            <h2>{{ $message->content }}</h2>
                        </div>
                    </div>
                    
                @else
                    <div class="content-msg-theirs">
                        <div class="theirs-message">
                            <h4>{{ $message->user_id }}</h4>
                            <h4>{{ $message->created_at }}</h4>
                            <h2>{{ $message->content }}</h2>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        


        <div class="div-form">
            <form action="{{ route('store') }}" method="post">
                @csrf
                <input type="text" name="content" class="ipt_message" placeholder="Escriba su mensaje acá..." autocomplete="off"/>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
        
        
    </section>


</body>
</html>