<main class="content">
  <?php
  renderTitle(
    'Cadastro de usuário',
    'Crie e atualize o usuário',
    'icofont-user'
  );
  include(TEMPLATE_PATH . '/messages.php');
  ?>

  <form action="#" method="POST">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" placeholder="Informe o nome" class="form-control" value="<?= $user->name ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Informe o email" class="form-control" value="<?= $user->email ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Informe a senha" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="confirm_password">Confirmação de Senha</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme a senha" class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="start_date">Data de Admissão</label>
        <input type="date" id="start_date" name="start_date" class="form-control" value="<?= $user->start_date ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="end_date">Data de Desligamento</label>
        <input type="date" id="end_date" name="end_date" class="form-control" value="<?= $user->end_date ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="is_admin">Administrador?</label>
        <input type="checkbox" id="is_admin" name="is_admin" class="form-control " <?= $user->is_admin ? 'checked' : '' ?>>
      </div>
    </div>
    <div>
      <button class="btn btn-primary btn-lg">Salvar</button>
      <a href="/users.php" class="btn btn-secondary btn-lg">Cancelar</a>
    </div>
  </form>
</main>