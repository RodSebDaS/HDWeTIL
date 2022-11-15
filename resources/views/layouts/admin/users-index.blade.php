  <div>
      <div class="card">
          {{--   <div class="card-header">
              <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o el email">
          </div>
         --}}
          @if ($users->count())
              <div class="card-body">
                  <table class="table table-striped shadow-lg mt-0 hover {{-- cell-border --}}" style="width:100%" id="users">
                      <thead class="bg-primary text-white">
                          <tr style="cursor: pointer">
                              <th {{-- wire:click="orden('id')" --}}>
                                  ID
                                  {{--  @if ($ordenar == 'id')
                                      @if ($direccion == 'asc')
                                          <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                      @else
                                          <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                      @endif
                                  @else
                                      <i class="fas fa-sort float-right mt-1"></i>
                                  @endif --}}
                              </th>
                              <th {{-- wire:click="orden('name')" --}}>
                                  Nombre
                                  {{--  @if ($ordenar == 'name')
                                      @if ($direccion == 'asc')
                                          <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                      @else
                                          <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                      @endif
                                  @else
                                      <i class="fas fa-sort float-right mt-1"></i>
                                  @endif --}}
                              </th>
                              <th {{-- wire:click="orden('email')" --}}>
                                  Email
                                  {{--  @if ($ordenar == 'email')
                                      @if ($direccion == 'asc')
                                          <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                      @else
                                          <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                      @endif
                                  @else
                                      <i class="fas fa-sort float-right mt-1"></i>
                                  @endif --}}
                              </th>
                              <th>Acciones</th>
                          </tr>
                      </thead>

                      <tbody>
                     {{--     @foreach ($users as $user)
                              <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td width="10px">
                                      <a class="btn btn-sm btn-primary"
                                          href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                  </td>
                              </tr>
                          @endforeach --}}
                      </tbody>
                      {{-- <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot> --}}
                  </table>
              </div>

              {{-- <div class="card-footer">
                  {{ $users->links() }}
              </div> --}}
          @else
              <div>
                  <div class="card-body">
                      <strong>No hay registros</strong>
                  </div>
              </div>
          @endif
      </div>
  </div>
