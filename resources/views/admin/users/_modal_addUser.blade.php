<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.users.store') }}" class="modal-dialog modal-dialog-centered">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-6">
                <label for="name" class="mb-3">Nome</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="col-6">
                <label for="email" class="mb-3">E-mail</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>
              <div class="col-6">
                <label for="password" class="mb-3">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="col-6">
                <label for="name" class="mb-3">Perfil</label>
                <select name="id" class="form-select" id="id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
                </select>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Criar</button>
      </div>
    </div>
  </form>
</div>
