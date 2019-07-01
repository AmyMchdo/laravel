<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-0 py-md-0">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-start" id="navbar">
    <ul class="navbar-nav">
      <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/">Home </a>
      </li>
      <li @if($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>
      <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias </a>
      </li> 
      <li @if($current=="imoveis") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/imoveis">Imóveis</a>
      </li>  
      <li @if($current=="veiculos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/veiculos">Veículos</a>
      </li> 
      <li @if($current=="agro") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/agro">Agro</a>
      </li>  
    </ul>
  </div>

</nav>

