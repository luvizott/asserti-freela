<html>
<head>
<title>Perfil</title>
</head>
<body>
    @include('parts/header')
    <section class="content">
    <div class="container dash-pg">
        <div class="row">
            <div class="col-md-8 perfil-img"> 
                    @include('layouts.dados')
                <div class="row">
                    @include('layouts.contato')

                    @include('layouts.address')
                </div>
            </div>
            <div class="col-md-4">
                    @include('layouts.cursos')

                    @include('layouts.experience')
                    
                    @include('layouts.tecnologias') 
            </div>
        </div>


        </div>
    </div>
</section>
    @include('parts/footer')
    
</body>
</html>