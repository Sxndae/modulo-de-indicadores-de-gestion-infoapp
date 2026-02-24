<?php
/**
 * Vista del Dashboard General de Indicadores de Gestión
 * Muestra un resumen ejecutivo de las 4 dimensiones principales
 */

// Obtener datos reales de la base de datos
$mes_actual = 9; // Septiembre (último mes con datos)
$anio_actual = 2024;

// Obtener estadísticas de participantes (Formación)
$stats_participantes = IndicadoresData::getTotalParticipantes($mes_actual, $anio_actual);
$total_formados = $stats_participantes['total'] ?? 0;
$meta_formacion = 3500; // Meta mensual

// Calcular puntuación de formación
$puntuacion_formacion = IndicadoresData::calcularPuntuacionFormacion($total_formados, $meta_formacion);
$cumplimiento_formacion = $meta_formacion > 0 ? round(($total_formados / $meta_formacion) * 100, 1) : 0;

// Obtener estadísticas de Infocentros (Salud de Red)
$stats_infocentros = IndicadoresData::getEstadisticasInfocentros();
$total_infocentros = $stats_infocentros['total_infocentros'] ?? 0;
$infocentros_abiertos = $stats_infocentros['abiertos'] ?? 0;
$puntuacion_red = IndicadoresData::calcularPuntuacionSaludRed($stats_infocentros);

// Obtener estadísticas de productos (Producción)
$stats_productos = IndicadoresData::getEstadisticasProductos($mes_actual, $anio_actual);
$total_productos = $stats_productos['cantidad_creada'] ?? 0;
$meta_productos = 1660;
$puntuacion_produccion = IndicadoresData::calcularPuntuacionFormacion($total_productos, $meta_productos);
$cumplimiento_produccion = $meta_productos > 0 ? round(($total_productos / $meta_productos) * 100, 1) : 0;

// Territorialización (datos dinámicos basados en cobertura de infocentros)
$puntuacion_territorializacion = IndicadoresData::calcularPuntuacionTerritorializacion();

// Calcular puntuación global
$puntuaciones = [
    'formacion' => $puntuacion_formacion,
    'salud_red' => $puntuacion_red,
    'territorializacion' => $puntuacion_territorializacion,
    'produccion' => $puntuacion_produccion
];
$puntuacion_global = IndicadoresData::calcularPuntuacionGlobal($puntuaciones);

// Determinar color del semáforo
function getSemaforoColor($puntuacion) {
    if ($puntuacion >= 80) return 'success';
    if ($puntuacion >= 60) return 'warning';
    return 'danger';
}

function getSemaforoTexto($puntuacion) {
    if ($puntuacion >= 80) return 'trending_up';
    if ($puntuacion >= 60) return 'warning';
    return 'trending_down';
}
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">dashboard</i>
        </div>
        <h4 class="card-title">Indicadores de Gestión - Dashboard General</h4>
        <p class="card-category">Sistema de evaluación y puntuación automática de gestión</p>
      </div>
      <div class="card-body">
        
        <!-- Tarjetas de Resumen de Dimensiones -->
        <div class="row">
          
          <!-- Dimensión 1: Efectividad Formativa -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-<?php echo getSemaforoColor($puntuacion_formacion); ?> card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">school</i>
                </div>
                <p class="card-category">Efectividad Formativa</p>
                <h3 class="card-title"><?php echo $puntuacion_formacion; ?>/100
                  <small>pts</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-<?php echo getSemaforoColor($puntuacion_formacion); ?>"><?php echo getSemaforoTexto($puntuacion_formacion); ?></i>
                  <a href="./?view=indicadores_formacion">Ver detalles</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Dimensión 2: Salud de la Red -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-<?php echo getSemaforoColor($puntuacion_red); ?> card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">router</i>
                </div>
                <p class="card-category">Salud de la Red</p>
                <h3 class="card-title"><?php echo $puntuacion_red; ?>/100
                  <small>pts</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-<?php echo getSemaforoColor($puntuacion_red); ?>"><?php echo getSemaforoTexto($puntuacion_red); ?></i>
                  <a href="./?view=indicadores_red">Ver detalles</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Dimensión 3: Territorialización -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-<?php echo getSemaforoColor($puntuacion_territorializacion); ?> card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">location_on</i>
                </div>
                <p class="card-category">Territorialización</p>
                <h3 class="card-title"><?php echo $puntuacion_territorializacion; ?>/100
                  <small>pts</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-<?php echo getSemaforoColor($puntuacion_territorializacion); ?>"><?php echo getSemaforoTexto($puntuacion_territorializacion); ?></i>
                  <a href="./?view=indicadores_territorializacion_mejorada">Ver detalles</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Dimensión 4: Producción Comunicacional -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-<?php echo getSemaforoColor($puntuacion_produccion); ?> card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">campaign</i>
                </div>
                <p class="card-category">Producción Comunicacional</p>
                <h3 class="card-title"><?php echo $puntuacion_produccion; ?>/100
                  <small>pts</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-<?php echo getSemaforoColor($puntuacion_produccion); ?>"><?php echo getSemaforoTexto($puntuacion_produccion); ?></i>
                  <a href="./?view=indicadores_produccion">Ver detalles</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Puntuación Global -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Puntuación Global de Gestión</h4>
                <p class="card-category">Ponderación: Formación 40% | Red 30% | Territorialización 20% | Producción 10%</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="text-center">
                      <span class="badge badge-<?php echo getSemaforoColor($puntuacion_global); ?>" style="font-size: 3rem; padding: 1rem 2rem;">
                        <?php echo $puntuacion_global; ?> / 100
                      </span>
                    </h2>
                    <p class="text-center text-muted">Calificación General - Septiembre 2024</p>
                    <p class="text-center"><small>Formados: <?php echo number_format($total_formados); ?> | Infocentros: <?php echo $infocentros_abiertos; ?>/<?php echo $total_infocentros; ?> | Productos: <?php echo number_format($total_productos); ?></small></p>
                  </div>
                  <div class="col-md-6">
                    <canvas id="globalScoreChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráfico de Tendencias -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Evolución Mensual de Indicadores</h4>
                <p class="card-category">Comparativa de las 4 dimensiones</p>
              </div>
              <div class="card-body">
                <canvas id="trendChart" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Alertas y Recomendaciones IA -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-rose">
                <h4 class="card-title">
                  <i class="material-icons">psychology</i>
                  Recomendaciones Inteligentes
                </h4>
                <p class="card-category">Propuestas de mejora generadas automáticamente</p>
              </div>
              <div class="card-body">
                <div class="alert alert-warning">
                  <strong>⚠️ Territorialización Baja:</strong> Solo se ha cubierto el 0.9% de los circuitos comunales.
                  <br><strong>Acción sugerida:</strong> Priorizar actividades en Zulia, Miranda y Carabobo que tienen alta densidad poblacional pero baja cobertura.
                </div>
                <div class="alert alert-info">
                  <strong>📊 Salud de Red en Zona Amarilla:</strong> 79% de operatividad de Infocentros.
                  <br><strong>Acción sugerida:</strong> Revisar los 159 Infocentros inactivos. Asignar equipo de mantenimiento a las regiones con menor ratio PC Operativas/Asignadas.
                </div>
                <?php if ($cumplimiento_produccion >= 100): ?>
                <div class="alert alert-success">
                  <strong>🎯 Producción Comunicacional <?php echo $cumplimiento_produccion >= 150 ? 'Sobresaliente' : 'Excelente'; ?>:</strong> Se alcanzó el <?php echo $cumplimiento_produccion; ?>% de la meta mensual (<?php echo number_format($total_productos); ?> productos).
                  <br><strong>Reconocimiento:</strong> Felicitar a las regiones con mayor producción en el mes de septiembre 2024.
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Nuevas Mejoras del Módulo -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">
                  <i class="material-icons">new_releases</i>
                  Análisis Avanzados - Nuevas Vistas
                </h4>
                <p class="card-category">Accede a reportes detallados y análisis granulares</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-stats">
                      <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">public</i>
                        </div>
                        <p class="card-category">Territorialización Mejorada</p>
                        <h4>Cobertura Geográfica</h4>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">info_outline</i>
                          <a href="./?view=indicadores_territorializacion_mejorada" class="btn btn-sm btn-info">Ver Análisis</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card card-stats">
                      <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">location_city</i>
                        </div>
                        <p class="card-category">Participantes por Ciudad</p>
                        <h4>Análisis por Municipio</h4>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">info_outline</i>
                          <a href="./?view=indicadores_ciudades" class="btn btn-sm btn-info">Ver Análisis</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card card-stats">
                      <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">people</i>
                        </div>
                        <p class="card-category">Facilitadores</p>
                        <h4>Carga de Trabajo</h4>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">info_outline</i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Ranking de Regiones -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Ranking de Regiones por Desempeño Global</h4>
                <p class="card-category">Top 3 regiones - Enero 2026</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Región</th>
                        <th>Formación</th>
                        <th>Salud Red</th>
                        <th>Territorializacion</th>
                        <th>Producción</th>
                        <th class="text-center">Score Global</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><strong>Yaracuy</strong></td>
                        <td><span class="badge badge-success">92</span></td>
                        <td><span class="badge badge-success">85</span></td>
                        <td><span class="badge badge-warning">68</span></td>
                        <td><span class="badge badge-success">98</span></td>
                        <td class="text-center"><strong>87.8</strong></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><strong>La Guaira</strong></td>
                        <td><span class="badge badge-success">88</span></td>
                        <td><span class="badge badge-success">82</span></td>
                        <td><span class="badge badge-warning">65</span></td>
                        <td><span class="badge badge-success">95</span></td>
                        <td class="text-center"><strong>84.5</strong></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><strong>Lara</strong></td>
                        <td><span class="badge badge-success">85</span></td>
                        <td><span class="badge badge-success">80</span></td>
                        <td><span class="badge badge-warning">70</span></td>
                        <td><span class="badge badge-success">90</span></td>
                        <td class="text-center"><strong>82.0</strong></td>
                      </tr>
                      <!-- Más regiones aquí (datos de ejemplo) -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Scripts para gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Gráfico de Score Global (Radial)
  const globalCtx = document.getElementById('globalScoreChart').getContext('2d');
  new Chart(globalCtx, {
    type: 'doughnut',
    data: {
      labels: ['Formación', 'Salud Red', 'Territorialización', 'Producción'],
      datasets: [{
        data: [<?php echo $puntuacion_formacion; ?>, <?php echo $puntuacion_red; ?>, <?php echo $puntuacion_territorializacion; ?>, <?php echo $puntuacion_produccion; ?>],
        backgroundColor: ['#4caf50', '#ff9800', '#f44336', '#00bcd4'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom'
        },
        title: {
          display: true,
          text: 'Distribución por Dimensión'
        }
      }
    }
  });

  // Gráfico de Tendencias
  const trendCtx = document.getElementById('trendChart').getContext('2d');
  new Chart(trendCtx, {
    type: 'line',
    data: {
      labels: ['Sep 2025', 'Oct 2025', 'Nov 2025', 'Dic 2025', 'Ene 2026'],
      datasets: [
        {
          label: 'Formación',
          data: [78, 80, 82, 84, 85],
          borderColor: '#4caf50',
          backgroundColor: 'rgba(76, 175, 80, 0.1)',
          tension: 0.4
        },
        {
          label: 'Salud Red',
          data: [65, 68, 70, 71, 72],
          borderColor: '#ff9800',
          backgroundColor: 'rgba(255, 152, 0, 0.1)',
          tension: 0.4
        },
        {
          label: 'Territorialización',
          data: [42, 43, 44, 44, 45],
          borderColor: '#f44336',
          backgroundColor: 'rgba(244, 67, 54, 0.1)',
          tension: 0.4
        },
        {
          label: 'Producción',
          data: [88, 90, 92, 94, 95],
          borderColor: '#00bcd4',
          backgroundColor: 'rgba(0, 188, 212, 0.1)',
          tension: 0.4
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top'
        },
        title: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          max: 100
        }
      }
    }
  });
</script>
