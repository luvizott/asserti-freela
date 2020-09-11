            <div class="col-md-8 curriculo">
                <div class="col-md-12">
                    <h4>Endereço</h4>
                </div>
                <div class="row address-div">
                    @foreach($address as $item)
                    <div class="col-md-8 mt-3">
                        <strong>Logradouro:</strong> 
                            {{ $item->rua }}
                    </div>
                    <div class="col-md-4 mt-3">
                        <strong>Número:</strong> 
                            {{ $item->number }}

                    </div>
                    <div class="col-md-6 mt-3">
                        <strong>Complemento:</strong>  
                            {{ $item->complemento }}
                    </div>
                    <div class="col-md-6 mt-3">
                        <strong>Bairro:</strong>  
                            {{ $item->bairro }}
                    </div>
                    <div class="col-md-5 mt-3">
                        <strong>CEP:</strong> 
                                {{ $item->cep }}
                    </div>
                    <div class="col-md-5 mt-3">
                        <strong>Cidade:</strong>  
                            {{ $item->cidade }}
                    </div>
                    <div class="col-md-2 mt-3">
                        <strong>UF:</strong>  
                            {{ $item->uf }}
                    </div>
                    <div class="col-md-12 mt-3">
                        <a class="btn-add-address" href="/delete/address/{{ $item->id }}">
                            Deletar
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-12 mt-3 text-center">
                    <a class="add-address-btn" data-toggle="modal" data-target="#exampleModalLong">
                        Adicionar endereço
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Endereço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('attAddress') }}" method="POST" enctype="multipart/form-data">
                    
                            @csrf
                            <div class="form-group">
                                <input type="text" name="rua" placeholder="Rua" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="number" placeholder="Número" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="complemento" placeholder="complemento (opcional)" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="bairro" placeholder="Bairro" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="cep" placeholder="CEP" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="cidade" placeholder="Cidade" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <select id="estado" name="uf">
                                <option disabled selected> -- Estado -- </option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
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
                <!-- FIM MODAL -->
            </div>