<?php
/**
 * Vista de Indicadores de Salud de Red
 * Dimensión 2: Salud de la Red (Peso 30%)
 */
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">router</i>
        </div>
        <h4 class="card-title">Indicadores de Salud de Red</h4>
        <p class="card-category">Dimensión 2: Operatividad de Infocentros - Peso 30%</p>
      </div>
      <div class="card-body">

        <!-- Botón Volver -->
        <div class="row mb-3">
          <div class="col-md-12">
            <a href="./?view=indicadores_dashboard" class="btn btn-info">
              <i class="material-icons">arrow_back</i> Volver al Dashboard
            </a>
          </div>
        </div>

        <!-- KPIs Principales -->
        <div class="row">
          <!-- Total Infocentros -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">business</i>
                </div>
                <p class="card-category">Total Infocentros</p>
                <h3 class="card-title">765</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">location_city</i>
                  A nivel nacional
                </div>
              </div>
            </div>
          </div>

          <!-- Infocentros Operativos -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">check_circle</i>
                </div>
                <p class="card-category">Operativos</p>
                <h3 class="card-title">606</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-success">thumb_up</i>
                  79.2% del total
                </div>
              </div>
            </div>
          </div>

          <!-- Infocentros Inoperativos -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">cancel</i>
                </div>
                <p class="card-category">Inoperativos</p>
                <h3 class="card-title">159</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  20.8% requiere atención
                </div>
              </div>
            </div>
          </div>

          <!-- Puntuación -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">star</i>
                </div>
                <p class="card-category">Puntuación</p>
                <h3 class="card-title">72/100</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-warning">warning</i>
                  Zona amarilla
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Estatus Técnico de PCs -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Estatus de Equipos (PCs)</h4>
                <p class="card-category">Equipos operativos vs asignados</p>
              </div>
              <div class="card-body">
                <canvas id="pcStatusChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Eficiencia Técnica</h4>
                <p class="card-category">Ratio de PCs operativas</p>
              </div>
              <div class="card-body">
                <div class="row text-center">
                  <div class="col-4">
                    <p class="text-muted">PC Asignadas</p>
                    <h3><strong>3,840</strong></h3>
                  </div>
                  <div class="col-4">
                    <p class="text-muted">PC Operativas</p>
                    <h3 class="text-success"><strong>2,912</strong></h3>
                  </div>
                  <div class="col-4">
                    <p class="text-muted">Eficiencia</p>
                    <h3 class="text-warning"><strong>75.8%</strong></h3>
                  </div>
                </div>
                <hr>
                <div class="alert alert-warning">
                  <strong>⚠️ Atención:</strong> 928 PCs están inoperativas o requieren mantenimiento.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabla de Regiones -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Operatividad por Región</h4>
                <p class="card-category">Estado actual de la red de Infocentros</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="tabla_salud_red">
                    <thead>
                      <tr>
                        <th>Región</th>
                        <th>Total</th>
                        <th>Operativos</th>
                        <th>Inoperativos</th>
                        <th>PC Asignadas</th>
                        <th>PC Operativas</th>
                        <th>% Eficiencia</th>
                        <th>Puntuación</th>
                        <th>Semáforo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Zulia</strong></td>
                        <td>102</td>
                        <td>85</td>
                        <td>17</td>
                        <td>392</td>
                        <td>297</td>
                        <td>75.8%</td>
                        <td><span class="badge badge-warning">75</span></td>
                        <td><span style="color: orange; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td><strong>Miranda</strong></td>
                        <td>89</td>
                        <td>75</td>
                        <td>14</td>
                        <td>356</td>
                        <td>280</td>
                        <td>78.7%</td>
                        <td><span class="badge badge-warning">78</span></td>
                        <td><span style="color: orange; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td><strong>Carabobo</strong></td>
                        <td>78</td>
                        <td>68</td>
                        <td>10</td>
                        <td>312</td>
                        <td>256</td>
                        <td>82.1%</td>
                        <td><span class="badge badge-success">82</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td><strong>Portuguesa</strong></td>
                        <td>65</td>
                        <td>48</td>
                        <td>17</td>
                        <td>278</td>
                        <td>203</td>
                        <td>73.0%</td>
                        <td><span class="badge badge-warning">73</span></td>
                        <td><span style="color: orange; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <!-- Más regiones... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recomendaciones IA -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-rose">
                <h4 class="card-title">
                  <i class="material-icons">psychology</i>
                  Recomendaciones Inteligentes
                </h4>
                <p class="card-category">Acciones prioritarias para mejorar la salud de la red</p>
              </div>
              <div class="card-body">
                <div class="alert alert-danger">
                  <strong>🚨 Urgente:</strong> 159 Infocentros están inoperativos (20.8% del total).
                  <br><strong>Acción requerida:</strong> Priorizar plan de reactivación en regiones con mayor número de Infocentros cerrados (Zulia: 17, Portuguesa: 17, Miranda: 14).
                </div>
                <div class="alert alert-warning">
                  <strong>⚠️ Mantenimiento:</strong> 928 PCs están inoperativas (24.2% del inventario).
                  <br><strong>Acción sugerida:</strong> Implementar plan de mantenimiento preventivo en las regiones con eficiencia menor al 75% (Portuguesa: 73%, Zulia: 75.8%).
                </div>
                <div class="alert alert-info">
                  <strong>📊 Oportunidad:</strong> Carabobo tiene la mejor eficiencia técnica (82.1%).
                  <br><strong>Recomendación:</strong> Documentar el proceso de mantenimiento de Carabobo y replicarlo en otras regiones.
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
  // Gráfico de Estatus de PCs
  const pcCtx = document.getElementById('pcStatusChart').getContext('2d');
  new Chart(pcCtx, {
    type: 'doughnut',
    data: {
      labels: ['PC Operativas', 'PC Inoperativas'],
      datasets: [{
        data: [2912, 928],
        backgroundColor: ['#4caf50', '#f44336'],
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
          text: 'Eficiencia: 75.8%'
        }
      }
    }
  });
</script>
