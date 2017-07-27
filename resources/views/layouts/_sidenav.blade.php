<!-- Lateral menu of our dashboard -->

<div class="ui vertical secondary pointing fluid blue menu">
    <center><img class="ui medium image" src="/imagenes/logo.png"></center>
    <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard*') ? 'item active' : 'item' }}">Inicio</a>
    <a href="{{ route('condominio.index') }}" class="{{ Request::is('admin/condominio*') ? 'item active' : 'item' }}">Condominios</a>
    <a href="{{ route('tipo_unidad.index') }}" class="{{ Request::is('admin/tipo_unidad*') ? 'item active' : 'item' }}">Tipo de Unidades Privativas</a>
    <a href="{{ route('unidad.index') }}" class="{{ Request::is('admin/unidad*') ? 'item active' : 'item' }}">Unidades Privativas</a>
    <a href="{{ route('usuario.index') }}" class="{{ Request::is('admin/usuario*') ? 'item active' : 'item' }}">Usuarios</a>
</div>

