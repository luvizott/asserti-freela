
            <div class="col-md-12 courses">
                
                    <div class="col-md-12 text-center">
                        <h4>Formação acadêmica</h4>
                    </div>
                    <div class="row hover-tec">
                        @foreach($curso as $item)
                        <div class="col-md-10">
                            <div class="col-md-12">
                                <strong>{{ $item->type }}</strong>
                            </div>
                            <div class="col-md-12">
                                <strong>Curso:</strong> {{ $item->curso }}
                                <strong>Instituição:</strong> {{ $item->institute }}
                            </div>
                            <div class="col-md-12 mb-4">
                                <strong>Ano de Conclusão:</strong> {{ $item->year }}
                            </div>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/delete/course/{{ $item->id }}">
                                <i class="fa fa-trash delete-icon"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <a data-toggle="modal" data-target="#modalCursos">
                            <i class="fa fa-plus edit-courses"></i>
                        </a>
                    </div>

                <!-- Modal -->
                <div class="modal fade" id="modalCursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Formação academica</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addCourse') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <select class="mb-3" name="type" id="course_type">
                                <option disabled selected value> -- Tipo de formação -- </option>
                                <option value="Curso técnico">Curso técnico</option>
                                <option value="Curso superior">Curso superior</option>
                                <option value="Especialização/MBA">Especialização/MBA</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Outros cursos">Outros cursos</option>
                            </select>
                            <div class="form-group">
                                <input type="text" name="curso" placeholder="Curso" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="institute" placeholder="Instituição" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="year" placeholder="Ano de Conclusão" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-modal">Adicionar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- FIM MODAL -->
</div>