<?php
/**
 * Vista de Indicadores por Ciudad
 * Muestra desglose de participantes formados por ciudad
 * MEJORA 2: Análisis granular por ciudad
 */

$mes_actual = 9; // Septiembre
$anio_actual = 2024;

// Obtener participantes por ciudad
$participantes_ciudades = IndicadoresData::getParticipantesPorCiudad($mes_actual, $anio_actual, 20);
$total_ciudades = count($participantes_ciudades);

// Calcular totales
$total_participantes_ciudades = 0;
$total_mujeres_ciudades = 0;
$total_hombres_ciudades = 0;

foreach ($participantes_ciudades as $ciudad) {
    $total_participantes_ciudades += $ciudad['total_participantes'];
    $total_mujeres_ciudades += $ciudad['mujeres'];
    $total_hombres_ciudades += $ciudad['hombres'];
}

// Obtener lista de ciudades para selector
$todas_ciudades = [];
foreach ($participantes_ciudades as $ciudad) {
    $todas_ciudades[$ciudad['ciudad']] = $ciudad['estado'];
}
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">location_city</i>
        </div>
        <h4 class="card-title">Indicadores de Gestión - Participantes por Ciudad</h4>
        <p class="card-category">Análisis granular de cobertura territorial por ciudad (Mes: <?php echo date('F Y', mktime(0, 0, 0, $mes_actual, 1, $anio_actual)); ?>)</p>
      </div>
      <div class="card-body">
        
        <!-- Resumen de Estadísticas -->
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">location_city</i>
                </div>
                <p class="card-category">Ciudades Cubiertas</p>
                <h3 class="card-title"><?php echo $total_ciudades; ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  Municipios con presencia de participantes
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">people</i>
                </div>
                <p class="card-category">Total Participantes</p>
                <h3 class="card-title"><?php echo number_format($total_participantes_ciudades); ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">trending_up</i>
                  Personas formadas
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">wc</i>
                </div>
                <p class="card-category">Mujeres</p>
                <h3 class="card-title"><?php echo number_format($total_mujeres_ciudades); ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  Participación femenina
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">wc</i>
                </div>
                <p class="card-category">Hombres</p>
                <h3 class="card-title"><?php echo number_format($total_hombres_ciudades); ?></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">info_outline</i>
                  Participación masculina
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabla de Ciudades -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Ranking de Ciudades por Participantes</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead class="text-primary">
                      <tr>
                        <th>Posición</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Total Participantes</th>
                        <th>Mujeres</th>
                        <th>Hombres</th>
                        <th>% Femenino</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $posicion = 1;
                      foreach ($participantes_ciudades as $ciudad):
                        $porcentaje_mujeres = $ciudad['total_participantes'] > 0 ? round(($ciudad['mujeres'] / $ciudad['total_participantes']) * 100, 1) : 0;
                      ?>
                      <tr>
                        <td><strong><?php echo $posicion; ?></strong></td>
                        <td><?php echo htmlspecialchars($ciudad['ciudad']); ?></td>
                        <td><span class="badge badge-info"><?php echo htmlspecialchars($ciudad['estado']); ?></span></td>
                        <td><strong><?php echo number_format($ciudad['total_participantes']); ?></strong></td>
                        <td><span class="text-success"><?php echo number_format($ciudad['mujeres']); ?></span></td>
                        <td><span class="text-info"><?php echo number_format($ciudad['hombres']); ?></span></td>
                        <td>
                          <div class="progress" style="width: 100%;">
                            <div class="progress-bar progress-bar-warning" role="progressbar" 
                                 style="width: <?php echo $porcentaje_mujeres; ?>%;" 
                                 aria-valuenow="<?php echo $porcentaje_mujeres; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                              <?php echo $porcentaje_mujeres; ?>%
                            </div>
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-info" onclick="verEvolucionCiudad('<?php echo htmlspecialchars($ciudad['ciudad']); ?>')">
                            <i class="material-icons">visibility</i>
                          </button>
                        </td>
                      </tr>
                      <?php
                      $posicion++;
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráfico de Distribución por Ciudad (Top 10) -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Distribución de Participantes - Top 10 Ciudades</h4>
              </div>
              <div class="card-body">
                <canvas id="chartCiudades" style="max-height: 400px;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráfico de Género por Cidade (Top 5) -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Distribución por Género - Top 5 Ciudades</h4>
              </div>
              <div class="card-body">
                <canvas id="chartGenero" style="max-height: 300px;"></canvas>
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
// Datos para gráfico de ciudades (Top 10)
<?php
$top_10_ciudades = array_slice($participantes_ciudades, 0, 10);
$ciudades_labels = json_encode(array_map(function($c) { return $c['ciudad']; }, $top_10_ciudades));
$ciudades_data = json_encode(array_map(function($c) { return $c['total_participantes']; }, $top_10_ciudades));
?>

const ctxCiudades = document.getElementById('chartCiudades').getContext('2d');
const chartCiudades = new Chart(ctxCiudades, {
    type: 'bar',
    data: {
        labels: <?php echo $ciudades_labels; ?>,
        datasets: [{
            label: 'Participantes',
            data: <?php echo $ciudades_data; ?>,
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

// Datos para gráfico de género (Top 5)
<?php
$top_5_ciudades = array_slice($participantes_ciudades, 0, 5);
$ciudades_labels_top5 = json_encode(array_map(function($c) { return $c['ciudad']; }, $top_5_ciudades));
$mujeres_data = json_encode(array_map(function($c) { return $c['mujeres']; }, $top_5_ciudades));
$hombres_data = json_encode(array_map(function($c) { return $c['hombres']; }, $top_5_ciudades));
?>

const ctxGenero = document.getElementById('chartGenero').getContext('2d');
const chartGenero = new Chart(ctxGenero, {
    type: 'bar',
    data: {
        labels: <?php echo $ciudades_labels_top5; ?>,
        datasets: [
            {
                label: 'Mujeres',
                data: <?php echo $mujeres_data; ?>,
                backgroundColor: 'rgba(240, 128, 170, 0.7)',
                borderColor: 'rgba(240, 128, 170, 1)',
                borderWidth: 1
            },
            {
                label: 'Hombres',
                data: <?php echo $hombres_data; ?>,
                backgroundColor: 'rgba(66, 180, 244, 0.7)',
                borderColor: 'rgba(66, 180, 244, 1)',
                borderWidth: 1
            }
        ]
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

function verEvolucionCiudad(ciudad) {
    alert('Evolución de ' + ciudad + ' - Esta funcionalidad se agregará próximamente');
}
</script>
