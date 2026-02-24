<?php
/**
 * Vista de Indicadores de Territorialización
 * Dimensión 3: Cobertura Comunal (Peso 20%)
 */
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">location_on</i>
        </div>
        <h4 class="card-title">Indicadores de Territorialización</h4>
        <p class="card-category">Dimensión 3: Vinculación Comunal - Peso 20%</p>
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
          <!-- Total Circuitos Comunales -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">map</i>
                </div>
                <p class="card-category">Circuitos Comunales</p>
                <h3 class="card-title">5,165</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">public</i>
                  A nivel nacional
                </div>
              </div>
            </div>
          </div>

          <!-- Circuitos con Actividades -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">place</i>
                </div>
                <p class="card-category">Con Actividades</p>
                <h3 class="card-title">47</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-warning">warning</i>
                  Cobertura muy baja
                </div>
              </div>
            </div>
          </div>

          <!-- % Cobertura -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">pie_chart</i>
                </div>
                <p class="card-category">% Cobertura</p>
                <h3 class="card-title">0.91%</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">trending_down</i>
                  Requiere mejora urgente
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
                <h3 class="card-title">45/100</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">priority_high</i>
                  Zona roja
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Cobertura Municipal y Parroquial -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Niveles de Cobertura Territorial</h4>
                <p class="card-category">Municipal, Parroquial y Comunal</p>
              </div>
              <div class="card-body">
                <canvas id="coberturaChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Estadísticas de Vinculación</h4>
                <p class="card-category">Resumen nacional</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><strong>Municipios con presencia:</strong></td>
                        <td class="text-right">278 / 335</td>
                        <td class="text-right">82.9%</td>
                      </tr>
                      <tr>
                        <td><strong>Parroquias con presencia:</strong></td>
                        <td class="text-right">612 / 1,136</td>
                        <td class="text-right">53.9%</td>
                      </tr>
                      <tr>
                        <td><strong>Circuitos atendidos:</strong></td>
                        <td class="text-right">47 / 5,165</td>
                        <td class="text-right text-danger">0.91%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="alert alert-danger">
                  <strong>⚠️ Alerta Crítica:</strong> Solo el 0.91% de los circuitos comunales tienen cobertura.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tabla de Regiones -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Cobertura Comunal por Región</h4>
                <p class="card-category">Regiones priorizadas para expansión</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="tabla_territorializacion">
                    <thead>
                      <tr>
                        <th>Región</th>
                        <th>Circuitos Totales</th>
                        <th>Circuitos Atendidos</th>
                        <th>% Cobertura</th>
                        <th>Municipios (%)</th>
                        <th>Parroquias (%)</th>
                        <th>Puntuación</th>
                        <th>Prioridad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="table-danger">
                        <td><strong>Zulia</strong></td>
                        <td>892</td>
                        <td>0</td>
                        <td>0.00%</td>
                        <td>85.2%</td>
                        <td>48.3%</td>
                        <td><span class="badge badge-danger">35</span></td>
                        <td><span class="badge badge-danger">ALTA</span></td>
                      </tr>
                      <tr class="table-danger">
                        <td><strong>Miranda</strong></td>
                        <td>645</td>
                        <td>3</td>
                        <td>0.47%</td>
                        <td>90.5%</td>
                        <td>52.1%</td>
                        <td><span class="badge badge-danger">38</span></td>
                        <td><span class="badge badge-danger">ALTA</span></td>
                      </tr>
                      <tr class="table-warning">
                        <td><strong>Carabobo</strong></td>
                        <td>512</td>
                        <td>8</td>
                        <td>1.56%</td>
                        <td>88.7%</td>
                        <td>60.2%</td>
                        <td><span class="badge badge-warning">48</span></td>
                        <td><span class="badge badge-warning">MEDIA</span></td>
                      </tr>
                      <tr class="table-warning">
                        <td><strong>Lara</strong></td>
                        <td>478</td>
                        <td>12</td>
                        <td>2.51%</td>
                        <td>82.3%</td>
                        <td>58.9%</td>
                        <td><span class="badge badge-warning">52</span></td>
                        <td><span class="badge badge-warning">MEDIA</span></td>
                      </tr>
                      <tr>
                        <td><strong>Aragua</strong></td>
                        <td>356</td>
                        <td>15</td>
                        <td>4.21%</td>
                        <td>86.1%</td>
                        <td>65.4%</td>
                        <td><span class="badge badge-success">58</span></td>
                        <td><span class="badge badge-success">BAJA</span></td>
                      </tr>
                      <!-- Más regiones... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Mapa de Calor (simulado) -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Análisis de Brecha Territorial</h4>
                <p class="card-category">Identificación de zonas sin cobertura</p>
              </div>
              <div class="card-body">
                <div class="alert alert-info">
                  <strong>📍 Zonas identificadas sin cobertura:</strong>
                  <ul>
                    <li><strong>Zulia:</strong> 892 circuitos sin atender (0% cobertura)</li>
                    <li><strong>Miranda:</strong> 642 circuitos sin atender (0.47% cobertura)</li>
                    <li><strong>Carabobo:</strong> 504 circuitos sin atender (1.56% cobertura)</li>
                  </ul>
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
                  Plan de Acción Recomendado
                </h4>
                <p class="card-category">Estrategias para mejorar la territorialización</p>
              </div>
              <div class="card-body">
                <div class="alert alert-danger">
                  <strong>🚨 Crítico:</strong> Solo el 0.91% de circuitos comunales tiene cobertura.
                  <br><strong>Acción inmediata:</strong> Diseñar plan de territorialización agresivo para alcanzar al menos 10% en los próximos 3 meses.
                </div>
                <div class="alert alert-warning">
                  <strong>📊 Priorización Estratégica:</strong>
                  <ul class="mb-0">
                    <li><strong>Fase 1 (Febrero-Marzo):</strong> Concentrar esfuerzos en Zulia, Miranda y Carabobo (alta densidad poblacional).</li>
                    <li><strong>Fase 2 (Abril-Mayo):</strong> Expandir a Lara, Aragua y Portuguesa.</li>
                    <li><strong>Fase 3 (Junio+):</strong> Cobertura de regiones restantes.</li>
                  </ul>
                </div>
                <div class="alert alert-success">
                  <strong>✅ Buena Práctica:</strong> Aragua tiene la mejor cobertura comunal (4.21%).
                  <br><strong>Recomendación:</strong> Entrevistar al equipo de Aragua para documentar su estrategia de vinculación comunal.
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
  // Gráfico de Cobertura
  const coberturaCtx = document.getElementById('coberturaChart').getContext('2d');
  new Chart(coberturaCtx, {
    type: 'bar',
    data: {
      labels: ['Municipal', 'Parroquial', 'Comunal'],
      datasets: [{
        label: '% Cobertura',
        data: [82.9, 53.9, 0.91],
        backgroundColor: ['#4caf50', '#ff9800', '#f44336'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          max: 100,
          ticks: {
            callback: function(value) {
              return value + '%';
            }
          }
        }
      }
    }
  });
</script>
