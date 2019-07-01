@extends('layout.app', ["current" => "imoveis" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Imoveis</h5>

        <table class="table table-ordered table-hover" id="tabelaImoveis">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onClick="novoImovel()">Novo imovel</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgImoveis">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formImovel">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Imovel</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nomeImovel" class="control-label">Nome do Imovel</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeImovel" placeholder="Nome do Imovel">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="precoImovel" class="control-label">Preço</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precoImovel" placeholder="Preço do Imovel">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantidadeImovel" class="control-label">Quantidade</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantidadeImovel" placeholder="Quantidade do Imovel">
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label for="categoriaImovel" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoriaImovel" >
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
     
     
     
@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    function novoImovel() {
        $('#id').val('');
        $('#nomeImovel').val('');
        $('#precoImovel').val('');
        $('#quantidadeImovel').val('');
        $('#dlgImoveis').modal('show');
    }
    
    function carregarCategorias() {
        $.getJSON('/api/categorias', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].nome + '</option>';
                $('#categoriaImovel').append(opcao);
            }
        });
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.estoque + "</td>" +
            "<td>" + p.preco + "</td>" +
            "<td>" + p.categoria_id + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
              '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
    
    function editar(id) {
        $.getJSON('/api/imoveis/'+id, function(data) { 
            console.log(data);
            $('#id').val(data.id);
            $('#nomeImovel').val(data.nome);
            $('#precoImovel').val(data.preco);
            $('#quantidadeImovel').val(data.estoque);
            $('#categoriaImovel').val(data.categoria_id);
            $('#dlgImoveis').modal('show');            
        });        
    }
    
    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "/api/imoveis/" + id,
            context: this,
            success: function() {
                console.log('Apagou OK');
                linhas = $("#tabelaImoveis>tbody>tr");
                e = linhas.filter( function(i, elemento) { 
                    return elemento.cells[0].textContent == id; 
                });
                if (e)
                    e.remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    function carregarImoveis() {
        $.getJSON('/api/imoveis', function(Imoveis) { 
            for(i=0;i<Imoveis.length;i++) {
                linha = montarLinha(Imoveis[i]);
                $('#tabelaImoveis>tbody').append(linha);
            }
        });        
    }
    
    function criarImovel() {
        imov = { 
            nome: $("#nomeImovel").val(), 
            preco: $("#precoImovel").val(), 
            estoque: $("#quantidadeImovel").val(), 
            categoria_id: $("#categoriaImovel").val() 
        };
        $.post("/api/imoveis", imov, function(data) {
            Imovel = JSON.parse(data);
            linha = montarLinha(Imovel);
            $('#tabelaImoveis>tbody').append(linha);            
        });
    }
    
    function salvarImovel() {
        imov = { 
            id : $("#id").val(), 
            nome: $("#nomeImovel").val(), 
            preco: $("#precoImovel").val(), 
            estoque: $("#quantidadeImovel").val(), 
            categoria_id: $("#categoriaImovel").val() 
        };
        $.ajax({
            type: "PUT",
            url: "/api/imoveis/" + imov.id,
            context: this,
            data: imov,
            success: function(data) {
                imov = JSON.parse(data);
                linhas = $("#tabelaImoveis>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == imov.id );
                });
                if (e) {
                    e[0].cells[0].textContent = imov.id;
                    e[0].cells[1].textContent = imov.nome;
                    e[0].cells[2].textContent = imov.estoque;
                    e[0].cells[3].textContent = imov.preco;
                    e[0].cells[4].textContent = imov.categoria_id;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });        
    }
    
    $("#formImovel").submit( function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '')
            salvarImovel();
        else
            criarImovel();
            
        $("#dlgImoveis").modal('hide');
    });
    
    $(function(){
        carregarCategorias();
        carregarImoveis();
    })
    
</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     