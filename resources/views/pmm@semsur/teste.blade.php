<html>
    <body>
        <h1>TESTE</h1>

        <p>Bem vindo usuário: | check: {{ Auth::check() ? 'OK' : 'NOT OK' }}</p>

        <br>
        <a href="/modulos/pmm/semsur/dashboard">DASHBOARD</a>
        <br><br>
        <a href="/modulos/pmm/semsur/formulario_login">LOGIN</a>
        <br><br>
        <a href="/modulos/pmm/semsur/logout">SAIR</a>

        <p>DADOS: {{ dd([
            'SESSÃO' => session()->all(),
            'REQUEST USER' => request()->user(),
            'AUTH USER' => Auth::user(),
            'AUTH USER (guard session_token)' => Auth::guard('session_token')->user()
            ])
        }}</p>

    </body>
</html>
