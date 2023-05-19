<main class="content">
  <?php
  renderTitle(
    'Relatório Gerencial',
    'Resumo das horas trabalhadas dos funcionários',
    'icofont-chart-histogram'
  );
  ?>
  <div class="summary-boxes">
    <div class="summary-box bg-primary">
      <i class="icofont-users"></i>
      <p class="title">Qtde de Funcionários</p>
      <h3 class="value"><?= $activeUsersCount ?></h3>
    </div>
    <div class="summary-box bg-danger">
      <i class="icofont-patient-bed"></i>
      <p class="title">Faltas</p>
      <h3 class="value"><?= count($absentUsers) ?></h3>
    </div>
    <div class="summary-box bg-success">
      <i class="icofont-sand-clock"></i>
      <p class="title">Horas Trabalhadas no mês</p>
      <h3 class="value"><?= $hoursInMonth ?></h3>
    </div>
  </div>
</main>