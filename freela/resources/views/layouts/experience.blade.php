    <!-- Experiência -->
<div class="col-md-12 mt-2 conhecimentos">
    <div class="text-center mb-4">
        <h4>Experiência profissional</h4>
    </div>
    <div class="row hover-tec">
    @foreach ($experiencia as $item)
        <div class="col-md-10 mb-4">
            <h5>{{ $item->empresa }}</h5>
            <strong>Função: </strong>{{ $item->function }}<br>
            De: {{ $item->time_fst }} Até: {{ $item->time_scd }}
        </div>
        <div class="col-md-2 mb-4">
            <a href="/delete/experiencia/{{ $item->id }}">
                <i class="fa fa-trash delete-icon"></i>
            </a>
        </div>
    @endforeach
    </div>
    <div class="col-md-12 text-center mt-3">
        <a data-toggle="modal" data-target="#modalExp">
            <i class="fa fa-plus edit-courses"></i>
        </a>
    </div>
</div>
<div class="col-md-12 mt-2 conhecimentos">

    <!-- Idiomas -->
    <div class="text-center mb-4">
        <h4>Idiomas</h4>
    </div>
    <div class="row hover-course">
        @foreach($idioma as $item)
        <div class="col-md-10">
            {{ $item->idioma }} {{ $item->idioma_lv }}
        </div>
        <div class="col-md-2">
            <a href="/delete/idioma/{{ $item->id }}">
                <i class="fa fa-trash delete-icon-i"></i>
            </a>
        </div>
        @endforeach
    </div>
    <div class="col-md-12 text-center mt-3">
        <a data-toggle="modal" data-target="#modalIdioma">
            <i class="fa fa-plus edit-courses"></i>
        </a>
    </div>
</div>

        <!-- Modal experiencia profissional -->
            <div class="modal fade" id="modalExp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Experiência Profissional</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('addExp') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group tec-form">
                            <input type="text" name="empresa" placeholder="Nome da empresa" class="form-control" required>
                        </div>
                        
                        <div class="form-group tec-form">
                            <input type="text" name="function" placeholder="Função" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group tec-form">
                                    <input type="text" id="txtDate" name="time_fst" placeholder="De" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group tec-form">
                                    <input type="text" id="txtDate2" name="time_scd" placeholder="Até" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-modal">Adicionar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>


            <!-- Modal idioma -->
            <div class="modal fade" id="modalIdioma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Idiomas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('addIdiomas') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group tec-form">
                            <select class="ml-2" name="idioma" id="idioma" required>
                                <option disabled selected value> -- Idioma -- </option>
                                <option value="Inglês">Inglês</option>
                                <option value="Espanhol">Espanhol</option>
                                <option value="Italiano">Italiano</option>
                                <option value="Francês">Francês</option>
                                <option value="Mandarim">Mandarim</option>
                            </select>
                        </div>
                        <div class="form-group tec-form">
                            <select class="ml-2" name="idioma_lv" id="idioma_lv" required>
                                <option disabled selected value> -- Nível de domínio -- </option>
                                <option value="Básico">Básico</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-modal">Adicionar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
				$(document).ready(function(){
					$('#txtDate').mask('00/00/0000'); //data
					$('#txtDate2').mask('00/00/0000'); //data
				});
			</script>