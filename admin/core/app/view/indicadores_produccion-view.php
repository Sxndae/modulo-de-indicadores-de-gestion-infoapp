<?php
/**
 * Vista de Indicadores de Producción Comunicacional
 * Dimensión 4: Producción de Contenidos (Peso 10%)
 */
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">campaign</i>
        </div>
        <h4 class="card-title">Indicadores de Producción Comunicacional</h4>
        <p class="card-category">Dimensión 4: Producción de Contenidos - Peso 10%</p>
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
          <!-- Productos Creados -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">create</i>
                </div>
                <p class="card-category">Productos Creados</p>
                <h3 class="card-title">6,007</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  Enero 2026
                </div>
              </div>
            </div>
          </div>

          <!-- Meta Mensual -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">flag</i>
                </div>
                <p class="card-category">Meta Mensual</p>
                <h3 class="card-title">1,660</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">settings</i>
                  Configurada
                </div>
              </div>
            </div>
          </div>

          <!-- % Cumplimiento -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">trending_up</i>
                </div>
                <p class="card-category">Cumplimiento</p>
                <h3 class="card-title">361%</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-success">emoji_events</i>
                  Meta superada ampliamente
                </div>
              </div>
            </div>
          </div>

          <!-- Puntuación -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">star</i>
                </div>
                <p class="card-category">Puntuación</p>
                <h3 class="card-title">100/100</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-success">stars</i>
                  Excelente
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráficos de Producción -->
        <div class="row mt-4">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Productos Comunicacionales por Tipo</h4>
                <p class="card-category">Distribución de contenidos - Enero 2026</p>
              </div>
              <div class="card-body">
                <canvas id="productosTipoChart" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Resumen de Producción</h4>
                <p class="card-category">Enero 2026</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><i class="material-icons text-info">photo</i> Imágenes</td>
                        <td class="text-right"><strong>2,456</strong></td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-danger">videocam</i> Videos</td>
                        <td class="text-right"><strong>1,234</strong></td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-success">article</i> Artículos</td>
                        <td class="text-right"><strong>1,587</strong></td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-warning">mic</i> Audios/Podcast</td>
                        <td class="text-right"><strong>456</strong></td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-primary">apps</i> Infografías</td>
                        <td class="text-right"><strong>274</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <h4 class="text-center text-success">Total: 6,007</h4>
              </div>
            </div>
          </div>
        </div>

        <!-- Ranking de Regiones -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Producción por Región - Top 10</h4>
                <p class="card-category">Regiones más productivas en contenidos</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="tabla_produccion">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Región</th>
                        <th>Productos</th>
                        <th>Meta Regional</th>
                        <th>% Cumplimiento</th>
                        <th>Tipo Principal</th>
                        <th>Puntuación</th>
                        <th>Reconocimiento</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="table-success">
                        <td>🥇</td>
                        <td><strong>Yaracuy</strong></td>
                        <td>1,234</td>
                        <td>180</td>
                        <td>685%</td>
                        <td>Videos</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span class="badge badge-warning">⭐ DESTACADO</span></td>
                      </tr>
                      <tr class="table-success">
                        <td>🥈</td>
                        <td><strong>La Guaira</strong></td>
                        <td>987</td>
                        <td>150</td>
                        <td>658%</td>
                        <td>Artículos</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span class="badge badge-warning">⭐ DESTACADO</span></td>
                      </tr>
                      <tr class="table-success">
                        <td>🥉</td>
                        <td><strong>Lara</strong></td>
                        <td>854</td>
                        <td>140</td>
                        <td>610%</td>
                        <td>Imágenes</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span class="badge badge-warning">⭐ DESTACADO</span></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><strong>Miranda</strong></td>
                        <td>723</td>
                        <td>160</td>
                        <td>452%</td>
                        <td>Videos</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><strong>Carabobo</strong></td>
                        <td>645</td>
                        <td>150</td>
                        <td>430%</td>
                        <td>Artículos</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td></td>
                      </tr>
                      <!-- Más regiones... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tendencia Mensual -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Evolución de Producción Comunicacional</h4>
                <p class="card-category">Últimos 6 meses</p>
              </div>
              <div class="card-body">
                <canvas id="tendenciaProduccionChart" style="height: 250px;"></canvas>
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
                  Análisis y Recomendaciones
                </h4>
                <p class="card-category">Insights sobre producción comunicacional</p>
              </div>
              <div class="card-body">
                <div class="alert alert-success">
                  <strong>🎉 Logro Sobresaliente:</strong> Se alcanzó el 361% de la meta mensual con 6,007 productos.
                  <br><strong>Reconocimiento especial:</strong> Felicitar públicamente a Yaracuy (1,234 productos), La Guaira (987) y Lara (854).
                </div>
                <div class="alert alert-info">
                  <strong>📊 Análisis de Diversidad:</strong> Los videos (1,234) y artículos (1,587) son los tipos más producidos.
                  <br><strong>Recomendación:</strong> Incentivar la producción de infografías y podcasts para diversificar el portafolio comunicacional.
                </div>
                <div class="alert alert-warning">
                  <strong>⚠️ Oportunidad:</strong> Algunas regiones pequeñas producen pocos contenidos.
                  <br><strong>Acción sugerida:</strong> Ofrecer talleres de creación de contenidos a las regiones con menos de 50 productos mensuales.
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
  // Gráfico por Tipo de Producto
  const tipoCtx = document.getElementById('productosTipoChart').getContext('2d');
  new Chart(tipoCtx, {
    type: 'doughnut',
    data: {
      labels: ['Imágenes', 'Videos', 'Artículos', 'Audios/Podcast', 'Infografías'],
      datasets: [{
        data: [2456, 1234, 1587, 456, 274],
        backgroundColor: ['#2196f3', '#f44336', '#4caf50', '#ff9800', '#9c27b0'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'right'
        }
      }
    }
  });

  // Gráfico de Tendencia
  const tendenciaCtx = document.getElementById('tendenciaProduccionChart').getContext('2d');
  new Chart(tendenciaCtx, {
    type: 'line',
    data: {
      labels: ['Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Enero'],
      datasets: [{
        label: 'Productos Creados',
        data: [3200, 3800, 4400, 5100, 5600, 6007],
        borderColor: '#4caf50',
        backgroundColor: 'rgba(76, 175, 80, 0.1)',
        tension: 0.4,
        fill: true
      },
      {
        label: 'Meta Mensual',
        data: [1660, 1660, 1660, 1660, 1660, 1660],
        borderColor: '#ff9800',
        borderDash: [5, 5],
        tension: 0,
        fill: false
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
