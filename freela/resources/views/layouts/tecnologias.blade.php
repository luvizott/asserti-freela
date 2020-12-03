<div class="col-md-12 mt-2 conhecimentos">
    <div class="text-center mb-4">
            <h4>Conhecimentos</h4>
        </div>
        <div class="row hover-tec">
            @foreach($tecnology as $item)
            <div class="col-md-10">
                <div class="col-md-12">
                    <strong>{{ $item->type }}:</strong> {{ $item->tecnology }}
                </div>
                <div class="col-md-12 mb-4">
                    <strong>Nível de domínio:</strong> {{ $item->nivel }}
                </div>
                
            </div>
            <div class="col-md-2">
                <a href="/delete/tecnology/{{ $item->id }}">
                    <i class="fa fa-trash delete-icon"></i>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12 text-center mt-3">
            <a data-toggle="modal" data-target="#modalTecnologias">
                <i class="fa fa-plus edit-courses"></i>
            </a>
        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTecnologias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tecnologias</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('addTecnology') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group tec-form">
                            <select class="ml-2" name="type" id="tipo_tec">
                                <option disabled selected value> -- Selecione o Tipo -- </option>
                                <option value="Front-End">Front-End</option>
                                <option value="Back-End">Back-End</option>
                                <option value="Outras Tecnologias">Outras Tecnologias</option>
                            </select>
                        </div>
                        
                        <div class="form-group tec-form">
                            <input type="text" name="tecnology" placeholder="Nome da tecnologia" class="form-control">
                        </div>
                        <div class="form-group tec-form">
                            <select class="ml-2" name="nivel" id="">
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