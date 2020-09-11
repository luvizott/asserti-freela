           <div class="col-md-4 dash-contact">
                <div class="row">
                <div class="ml-3 mb-3" style="width: 100%;">
                    <h4 >Contato:</h4>
                </div>
                    
                    @foreach($contact as $item)
                    <div class="col-md-10 mb-1">
                        <strong>{{ $item->type }}</strong> {{ $item->cell }}
                    </div>
                    <div class="col-md-2 mb-1">
                            <a href="/delete/contact/{{ $item->id }}">
                                <i class="fa fa-trash delete-cont"></i>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-12 mt-3">
                        <a class="btn-add-tel ml-2" data-toggle="modal" data-target="#modalTelefone">Adicionar Telefone</a>
                    </div>
                </div>
            </div>

            <!-- Modal Telefone-->
            <div class="modal fade" id="modalTelefone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content-contact">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Contato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('attContato') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="ml-1" type="radio" name="type" value="Telefone" id="telefone" checked> Telefone Fixo
                            <input class="ml-5" type="radio" name="type" value="Celular" id="celular"> Celular
                        </div>
                        <div class="form-group">
                            <input name="cell" type="text" class="displaytrue" placeholder="Numero" id="txtTelefone" class="form-control" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-info">Adicionar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#txtTelefone').on('keyup',function(){
                            $('#txtTelefone').mask('(00) 00000-0000');
                            var a = $(this).val();
                            a = a.toString();
                            var length = a.length;
                            if (length < 14){
                                $('#txtTelefone').mask('(00) 0000-0000');
                            } else if (length == 14) {
                                $('#txtTelefone').mask('(00) 00000-0000');
                            }
                            else {
                                $('#txtTelefone').mask('(00) 00000-0000');
                            }
                        });
                    });

                    

                    function change(){
                        var x = document.getElementById("type").value;

                    }
                </script>