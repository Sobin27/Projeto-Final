<div class="container-fluid">
    <div classs="row">
        <div class=" my-3 col-sm-6 offset-sm-3">
            <div>
                <h3 class="text-center">Login</h3>


                <form action="/login" method="POST">
                    <div class="my-3">
                        <div clas="my-3">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" required class="form-control"><br>
                        </div>

                        <div class="my-3">
                            <label>Senha</label>
                            <input type="password" name="senha" placeholder="Senha " required class="form-control"><br>
                        </div>

                        <div>
                            <input type="submit" value="Entrar" class="btn btn-primary"><br>
                            <a href="/cadastro">Cadastro</a>
                        </div>

                    </div>
                </form>
            </div>


        </div>

    </div>

</div>