<?php
/**
 * Vista Mejorada de Indicadores de Territorialización
 * Muestra cobertura geográfica basada en datos reales de infocentros
 * MEJORA 1: Territorialización dinámica
 */

// Obtener estadísticas de territorialización
$stats_territorializacion = IndicadoresData::getEstadisticasTerritorializacion();
$cobertura_por_estado = IndicadoresData::getCoberturaPorEstado();
$puntuacion_territorializacion = IndicadoresData::calcularPuntuacionTerritorializacion();

// Extraer datos
$total_infocentros = $stats_territorializacion['total_infocentros'] ?? 0;
$estados_con_cobertura = $stats_territorializacion['estados_con_cobertura'] ?? 0;
$municipios_cubiertos = $stats_territorializacion['municipios_cubiertos'] ?? 0;
$infocentros_operativos = $stats_territorializacion['infocentros_operativos'] ?? 0;
$infocentros_rurales = $stats_territorializacion['infocentros_rurales'] ?? 0;
$infocentros_urbanos = $stats_territorializacion['infocentros_urbanos'] ?? 0;

// Calcular porcentajes
$meta_estados = 24;
$porcentaje_cobertura_estados = ($estados_con_cobertura / $meta_estados) * 100;
$porcentaje_operatividad = ($infocentros_operativos / $total_infocentros) * 100;
$porcentaje_rurales = ($infocentros_rurales / $total_infocentros) * 100;
$porcentaje_urbanos = ($infocentros_urbanos / $total_infocentros) * 100;
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">public</i>
        </div>
        <h4 class="card-title">Indicadores de Gestión - Territorialización</h4>
        <p class="card-category">Cobertura geográfica y operatividad de infocentros a nivel territorial</p>
      </div>
      <div class="card-body">
        
        <!-- Tarjetas de Resumen -->
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">location_on</i>
                </div>
                <p class="card-category">Estados Cubiertos</p>
                <h3 class="card-title"><?php echo $estados_con_cobertura; ?>/<?php echo $meta_estados; ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons"><?php echo $porcentaje_cobertura_estados >= 90 ? 'trending_up' : 'trending_down'; ?></i>
                  <?php echo round($porcentaje_cobertura_estados, 1); ?>% de cobertura
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">domain</i>
                </div>
                <p class="card-category">Infocentros Operativos</p>
                <h3 class="card-title"><?php echo $infocentros_operativos; ?>/<?php echo $total_infocentros; ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  <?php echo round($porcentaje_operatividad, 1); ?>% operativos
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">location_city</i>
                </div>
                <p class="card-category">Municipios Cubiertos</p>
                <h3 class="card-title"><?php echo $municipios_cubiertos; ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  Cobertura municipal
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assessment</i>
                </div>
                <p class="card-category">Puntuación</p>
                <h3 class="card-title"><?php echo $puntuacion_territorializacion; ?>/100</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  Evaluación general
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Indicadores de Desempeño -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Métricas Clave de Territorialización</h4>
              </div>
              <div class="card-body">
                <!-- Cobertura de Estados -->
                <div class="metric-item mb-4">
                  <div class="d-flex justify-content-between mb-2">
                    <span>Cobertura de Estados (Meta: <?php echo $meta_estados; ?>)</span>
                    <strong><?php echo $estados_con_cobertura; ?>/<?php echo $meta_estados; ?> (<?php echo round($porcentaje_cobertura_estados, 1); ?>%)</strong>
                  </div>
                  <div class="progress">
                    <div class="progress-bar <?php echo $porcentaje_cobertura_estados >= 90 ? 'bg-success' : ($porcentaje_cobertura_estados >= 75 ? 'bg-warning' : 'bg-danger'); ?>" 
                         role="progressbar" 
                         style="width: <?php echo $porcentaje_cobertura_estados; ?>%;" 
                         aria-valuenow="<?php echo $porcentaje_cobertura_estados; ?>" 
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>

                <!-- Operatividad de Infocentros -->
                <div class="metric-item mb-4">
                  <div class="d-flex justify-content-between mb-2">
                    <span>Operatividad de Infocentros (Meta: 90%)</span>
                    <strong><?php echo $infocentros_operativos; ?>/<?php echo $total_infocentros; ?> (<?php echo round($porcentaje_operatividad, 1); ?>%)</strong>
                  </div>
                  <div class="progress">
                    <div class="progress-bar <?php echo $porcentaje_operatividad >= 90 ? 'bg-success' : ($porcentaje_operatividad >= 75 ? 'bg-warning' : 'bg-danger'); ?>" 
                         role="progressbar" 
                         style="width: <?php echo $porcentaje_operatividad; ?>%;" 
                         aria-valuenow="<?php echo $porcentaje_operatividad; ?>" 
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>

                <!-- Distribución Rural/Urbana -->
                <div class="metric-item">
                  <div class="d-flex justify-content-between mb-2">
                    <span>Distribución Territorial</span>
                    <span>Rural: <?php echo $infocentros_rurales; ?> (<?php echo round($porcentaje_rurales, 1); ?>%) | Urbano: <?php echo $infocentros_urbanos; ?> (<?php echo round($porcentaje_urbanos, 1); ?>%)</span>
                  </div>
                  <div class="progress" style="height: 25px;">
                    <div class="progress-bar bg-success" role="progressbar" 
                         style="width: <?php echo $porcentaje_rurales; ?>%;" 
                         aria-valuenow="<?php echo $porcentaje_rurales; ?>" 
                         aria-valuemin="0" aria-valuemax="100">
                      Rural <?php echo round($porcentaje_rurales, 1); ?>%
                    </div>
                    <div class="progress-bar bg-info" role="progressbar" 
                         style="width: <?php echo $porcentaje_urbanos; ?>%;" 
                         aria-valuenow="<?php echo $porcentaje_urbanos; ?>" 
                         aria-valuemin="0" aria-valuemax="100">
                      Urbano <?php echo round($porcentaje_urbanos, 1); ?>%
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Cobertura por Estado -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Cobertura por Estado</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead class="text-primary">
                      <tr>
                        <th>Estado</th>
                        <th>Total Infocentros</th>
                        <th>Operativos</th>
                        <th>Municipios</th>
                        <th>Rurales</th>
                        <th>Urbanos</th>
                        <th>% Operatividad</th>
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($cobertura_por_estado as $estado):
                        $total = $estado['total_infocentros'];
                        $operativos = $estado['abiertos'];
                        $porcentaje_op = $total > 0 ? round(($operativos / $total) * 100, 1) : 0;
                        $estado_badge = $porcentaje_op >= 90 ? 'badge-success' : 
                                       ($porcentaje_op >= 75 ? 'badge-warning' : 'badge-danger');
                      ?>
                      <tr>
                        <td><strong><?php echo htmlspecialchars($estado['region']); ?></strong></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $operativos; ?></td>
                        <td><?php echo $estado['municipios_cubiertos']; ?></td>
                        <td><?php echo $estado['rurales']; ?></td>
                        <td><?php echo $estado['urbanos']; ?></td>
                        <td>
                          <div class="progress" style="width: 100%;">
                            <div class="progress-bar" role="progressbar" 
                                 style="width: <?php echo $porcentaje_op; ?>%;" 
                                 aria-valuenow="<?php echo $porcentaje_op; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                              <?php echo $porcentaje_op; ?>%
                            </div>
                          </div>
                        </td>
                        <td><span class="badge <?php echo $estado_badge; ?>"><?php echo $porcentaje_op >= 90 ? 'Excelente' : ($porcentaje_op >= 75 ? 'Bueno' : 'Bajo'); ?></span></td>
                      </tr>
                      <?php
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráfico de Cobertura por Estado -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Distribución de Infocentros por Estado</h4>
              </div>
              <div class="card-body">
                <canvas id="chartCobertura" style="max-height: 400px;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráfico de Operatividad -->
        <div class="row mt-4">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Estado Operativo General</h4>
              </div>
              <div class="card-body">
                <canvas id="chartOperatividad" style="max-height: 300px;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Distribución Rural vs Urbano</h4>
              </div>
              <div class="card-body">
                <canvas id="chartRuralUrbano" style="max-height: 300px;"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
// Datos para gráfico de cobertura por estado
<?php
$estados_labels = json_encode(array_map(function($e) { return $e['region']; }, $cobertura_por_estado));
$estados_data = json_encode(array_map(function($e) { return $e['total_infocentros']; }, $cobertura_por_estado));
?>

const ctxCobertura = document.getElementById('chartCobertura').getContext('2d');
const chartCobertura = new Chart(ctxCobertura, {
    type: 'bar',
    data: {
        labels: <?php echo $estados_labels; ?>,
        datasets: [{
            label: 'Infocentros',
            data: <?php echo $estados_data; ?>,
            backgroundColor: 'rgba(66, 134, 244, 0.5)',
            borderColor: 'rgba(66, 134, 244, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Gráfico de Operatividad
const ctxOperatividad = document.getElementById('chartOperatividad').getContext('2d');
const chartOperatividad = new Chart(ctxOperatividad, {
    type: 'doughnut',
    data: {
        labels: ['Operativos', 'Cerrados', 'Cierre Definitivo'],
        datasets: [{
            data: [
                <?php echo $infocentros_operativos; ?>,
                <?php echo ($total_infocentros - $infocentros_operativos); ?>,
                0
            ],
            backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            borderColor: ['#fff', '#fff', '#fff'],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// Gráfico de Rural vs Urbano
const ctxRuralUrbano = document.getElementById('chartRuralUrbano').getContext('2d');
const chartRuralUrbano = new Chart(ctxRuralUrbano, {
    type: 'pie',
    data: {
        labels: ['Rural', 'Urbano'],
        datasets: [{
            data: [<?php echo $infocentros_rurales; ?>, <?php echo $infocentros_urbanos; ?>],
            backgroundColor: ['#28a745', '#007bff'],
            borderColor: ['#fff', '#fff'],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
