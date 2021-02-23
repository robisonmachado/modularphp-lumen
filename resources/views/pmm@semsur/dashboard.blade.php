<html>
    <body>
        <h1>DASHBOARD</h1>

        <p>Bem vindo usuário: {{ auth('session_token')->user()->nome }}  | check: {{ Auth::check() ? 'OK' : 'NOT OK' }}</p>

        <br>

        <form action="/modulos/pmm/semsur/teste" method="GET">
            <button type="submit">PÁGINA TESTE</button>
        </form>

        <br><br>
        <a href="/modulos/pmm/semsur/formulario_login">LOGIN</a>
        <br><br>
        <a href="/modulos/pmm/semsur/logout">SAIR</a>



        <p>DADOS: {{ dd([
            'SESSÃO' => session()->all(),
            'AUTH USER' => Auth::user()
            ]) }}</p>

    </body>
</html>
