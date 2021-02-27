@section('head')
@show

@section('header')
@show

@section('aside')
@show

    <div class="content-wrapper">
        <p>Usuário: {{ Auth::user()->nome }}</p>
        <p>Perfil: {{ '$perm' }}</p>

    </div>



@section('footer')
@show

@section('javascript')
@show



