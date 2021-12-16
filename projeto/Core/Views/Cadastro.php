<div class="container">
    <div classs="row">
        <div class="col-sm-6 offset-sm-3 my-5 ">
            <h3 class="text-center">Registro de novo cliente</h3>

            <form action="/criar_cliente" method="post">

                <div class="my-3">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Idade</label>
                    <input type="text" name="idade" placeholder="Digite sua Idade" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Nome Completo</label>
                    <input type="text" name="nome" placeholder="Nome Completo" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">CPF</label>
                    <input type="text" name="cpf" placeholder="CPF" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Telefone</label>
                    <input type="text" name="telefone" placeholder="Telefone" class="form-control">
                </div>

                <div class="my-3">
                    <label for="">Profissão</label>
                    <input type="text" name="profissao" placeholder="Profissão" class="form-control">
                </div>

                <div class="my-4">
                    <input type="submit" value="Criar conta" class="btn btn-primary">
                </div>

                <br>
                <br>
            </form>

        </div>

    </div>

</div>