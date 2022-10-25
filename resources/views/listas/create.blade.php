@extends ('base.index')
@extends('components.darkmode')


<nav class="navbar fixed-top" style="background-color: #b1c99b;">
    <div class="container-fluid">
        <div class="divlistagem">

            <button class="btn btn-outline-dark" type="button" class="btnmostrar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
                    </button>

            <div class="offcanvas offcanvas-start show" style="background-color: #dbeccb;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Minhas listas</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Pesquise por lista ou tarefa" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </button>
                      </form>

                      <!-- Button trigger modal -->
                <button type="button" id="novalista"  class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Adicionar nova lista <b>+</b>
                </button>


                      <hr>
                  <p>Lista dkdvvfdf.</p>
                  <p>Lista cvvvvvvvv.</p>
                </div>
              </div>

            </div>

      <a class="navbar-brand" href="#"></a>
      <div class="btn-group dropstart">
        <a class="btn btn-outline-dark dropdown-toggle" class="btnmostrar" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Funcionalidades</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Adicione uma nova lista</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="form-floating mb-3">
                <input type="text" name="nomelista" class="form-control" id="nomelista" value="">
                <label for="floatingInput">Nome da lista</label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>


      <h3 id="teste">Exemplo de lista</h3>

      <button type="button" id="btnmodalitem" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal2">
        Adicionar atividade <b>+</b>
    </button>

      <div class="modal" id="modal2" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Adicione um novo item a sua lista</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-floating mb-3">
                    <input type="text" name="nomeitem" class="form-control" id="nomeitem" value="">
                    <label for="floatingInput">Nome da atividade</label>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>





