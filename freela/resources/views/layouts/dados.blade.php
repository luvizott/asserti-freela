                <div class="col-md-12 mb-5">
                    <!-- Nome e foto -->
                    <div class="dados-pessoais"> 
                        <a data-toggle="modal" data-target="#modalDados">
                            <i class="fa fa-pencil edit-dp"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center perfil-img">
                                @if ((auth()->user()->provider) != NULL)
                                    <img src="{{ Auth::user()->image}}" alt="{{Auth::user()->name}}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
                                @else
                                    <img alt="{{Auth::user()->name}}" src="{{ env('APP_URL') }}/users/{{ Auth::user()->image}}"/> 
                                @endif
                            </div>
                            <div class="row text-center">
                                 <div class="col-md-12 mt-3">
                                    <a href="mailto:{{ Auth::user()->email }}"><i class="fa fa-envelope"></i></a>
    
                                    <a href="{{ Auth::user()->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a> 
                                
                                    <a href="{{ Auth::user()->github }}" target="_blank"><i class="fa fa-github"></i></a>
                                </div>
                                <div class="mt-3 ml-3" style="padding: 0;">
                                    <strong>Atualizado em:</strong> {{ auth()->user()->updated_at->format('d/m/20y') }}
                            </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="mt-3">
                                    <h3>Olá, {{ auth()->user()->name }}</h3>
                                </div>
                                <div class="mt-3 col-md-12">
                                    <strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse(auth()->user()->birth)->format('d/m/20y') }}
                                </div>
                                <div class="mt-3 col-md-12">
                                    <strong>Sexo:</strong> {{ auth()->user()->sexo }}
                                </div>
                                <div class="mt-3 col-md-12">
                                    <strong>Status:</strong> {{ auth()->user()->status }}
                                </div>
                                <div class="mt-3 col-md-12">
                                    <strong>Horário:</strong> {{ auth()->user()->dispon }}
                                </div>
                                <div class="mt-3">
                                    <a data-toggle="modal" class="btn-senha" data-target="#modalSenha">
                                        Alterar senha
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Modal senha -->
            <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Alterar senha</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('attSenha') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group tec-form">
                            <input type="password" placeholder="Nova senha" name="password" id="myInput">
                        </div>
                        <input type="checkbox" onclick="myFunction()"> Mostrar senha
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-modal">Atualizar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->

                <script>
                    function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    }
                </script>

                <!-- Modal -->
                <div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Dados Pessoais</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="text-center modal-img">
                                @if ((auth()->user()->provider) != NULL)
                                    <img src="{{ Auth::user()->image}}" alt="{{Auth::user()->name}}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
                                @else
                                    <img alt="{{Auth::user()->name}}" src="{{ env('APP_URL') }}/users/{{ Auth::user()->image}}"/> 
                                @endif
                                <input type="file" name="image" placeholder="Imagem" class="mt-2">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ auth()->user()->name }}" name="name" placeholder="Nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" value="{{ auth()->user()->email }}" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ auth()->user()->linkedin }}" name="linkedin" placeholder="Link do Linkedin" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ auth()->user()->github }}" name="github" placeholder="Link do Github" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="date" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{auth()->user()->birth }}" placeholder="Data de Nascimento" name="birth" class="form-control">
                        </div>

                        <div class="form-group">
                            <select class="ml-2 mb-3" name="sexo" id="sexo">
                                <option selected value="{{ auth()->user()->sexo }}"> -- Sexo -- </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <select class="ml-2 mb-3" value="{{ auth()->user()->status }}" name="status" id="status">
                                <option selected value="{{ auth()->user()->status }}"> -- Status -- </option>
                                <option value="disponivel para projetos">Disponível para projetos</option>
                                <option value="inidisponivel">Indisponível</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="dispon" value="{{ auth()->user()->dispon }}" placeholder="Descreva sua disponibilidade de Horário" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-modal">Atualizar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>