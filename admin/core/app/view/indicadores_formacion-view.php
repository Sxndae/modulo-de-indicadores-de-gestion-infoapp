<?php
/**
 * Vista de Indicadores de Formación
 * Dimensión 1: Efectividad Formativa (Peso 40%)
 */
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">school</i>
        </div>
        <h4 class="card-title">Indicadores de Formación</h4>
        <p class="card-category">Dimensión 1: Efectividad Formativa - Peso 40%</p>
      </div>
      <div class="card-body">

        <!-- Filtros de Fecha y Región -->
        <div class="row mb-4">
          <div class="col-md-3">
            <div class="form-group">
              <label>Mes de Análisis</label>
              <select class="form-control" id="mes_analisis">
                <option value="2026-01" selected>Enero 2026</option>
                <option value="2025-12">Diciembre 2025</option>
                <option value="2025-11">Noviembre 2025</option>
                <option value="2025-10">Octubre 2025</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Región</label>
              <select class="form-control" id="region_filter">
                <option value="0" selected>Nacional (Todas)</option>
                <option value="1">Zulia</option>
                <option value="2">Miranda</option>
                <option value="3">Carabobo</option>
                <!-- Agregar todas las regiones -->
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>&nbsp;</label>
              <button class="btn btn-primary btn-block" onclick="aplicarFiltros()">
                <i class="material-icons">filter_list</i> Filtrar
              </button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>&nbsp;</label>
              <a href="./?view=indicadores_dashboard" class="btn btn-info btn-block">
                <i class="material-icons">arrow_back</i> Volver al Dashboard
              </a>
            </div>
          </div>
        </div>

        <!-- KPIs Principales -->
        <div class="row">
          <!-- Personas Formadas -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">people</i>
                </div>
                <p class="card-category">Personas Formadas</p>
                <h3 class="card-title">19,921</h3>
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
                <h3 class="card-title">3,500</h3>
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
                <h3 class="card-title">569%</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-success">check_circle</i>
                  Meta superada
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

        <!-- Gráfico de Cumplimiento Mensual -->
        <div class="row mt-4">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Evolución de Personas Formadas</h4>
                <p class="card-category">Comparativa 2024 vs 2025 vs 2026</p>
              </div>
              <div class="card-body">
                <canvas id="formacionTrendChart" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Variación Interanual</h4>
                <p class="card-category">2025 vs 2024</p>
              </div>
              <div class="card-body text-center">
                <h1 class="text-success">
                  <i class="material-icons" style="font-size: 3rem;">trending_up</i>
                  <br>
                  <strong>+86%</strong>
                </h1>
                <p class="text-muted">Crecimiento significativo en formación</p>
                <hr>
                <p><strong>2024:</strong> 56,847 personas</p>
                <p><strong>2025:</strong> 105,713 personas</p>
                <p><strong>2026 (ene):</strong> 19,921 personas</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Desglose por Región -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Personas Formadas por Región - Enero 2026</h4>
                <p class="card-category">Top 5 regiones con mejor desempeño</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="tabla_formacion_region">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Región</th>
                        <th>Personas Formadas</th>
                        <th>Meta Regional</th>
                        <th>% Cumplimiento</th>
                        <th>Puntuación</th>
                        <th>Semáforo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><strong>Zulia</strong></td>
                        <td>3,245</td>
                        <td>500</td>
                        <td>649%</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><strong>Miranda</strong></td>
                        <td>2,890</td>
                        <td>480</td>
                        <td>602%</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td><strong>Carabobo</strong></td>
                        <td>2,156</td>
                        <td>420</td>
                        <td>513%</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td><strong>Lara</strong></td>
                        <td>1,987</td>
                        <td>400</td>
                        <td>497%</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td><strong>Aragua</strong></td>
                        <td>1,654</td>
                        <td>350</td>
                        <td>473%</td>
                        <td><span class="badge badge-success">100</span></td>
                        <td><span style="color: green; font-size: 1.5rem;">●</span></td>
                      </tr>
                      <!-- Más regiones... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Análisis de Género -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-rose">
                <h4 class="card-title">Distribución por Género</h4>
                <p class="card-category">Equidad en la formación</p>
              </div>
              <div class="card-body">
                <canvas id="generoChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Razón de Género</h4>
                <p class="card-category">Facilitadoras / Facilitadores</p>
              </div>
              <div class="card-body text-center">
                <h1 class="text-info">
                  <strong>2.2</strong>
                </h1>
                <p class="text-muted">Hay 2.2 facilitadoras por cada facilitador</p>
                <hr>
                <div class="row">
                  <div class="col-6">
                    <p><i class="material-icons text-danger">person</i> <strong>Facilitadoras:</strong> 687</p>
                  </div>
                  <div class="col-6">
                    <p><i class="material-icons text-primary">person</i> <strong>Facilitadores:</strong> 312</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recomendaciones IA -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <i class="material-icons">psychology</i>
                  Recomendaciones Inteligentes
                </h4>
                <p class="card-category">Propuestas de mejora basadas en análisis de datos</p>
              </div>
              <div class="card-body">
                <div class="alert alert-success">
                  <strong>✅ Desempeño Sobresaliente:</strong> Se superó la meta mensual en un 469%.
                  <br><strong>Recomendación:</strong> Documentar las mejores prácticas de las regiones con mayor cumplimiento (Zulia, Miranda, Carabobo) y replicarlas en regiones con menor desempeño.
                </div>
                <div class="alert alert-info">
                  <strong>📊 Oportunidad de Crecimiento:</strong> La razón de género de facilitadores es 2.2 (favorable para mujeres).
                  <br><strong>Recomendación:</strong> Mantener este indicador de equidad y promover programas de formación inclusivos.
                </div>
                <div class="alert alert-warning">
                  <strong>⚠️ Atención:</strong> Algunas regiones pequeñas pueden estar subreportando datos.
                  <br><strong>Acción sugerida:</strong> Verificar la carga de datos en las regiones con 0 personas formadas en el mes.
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
  // Gráfico de Tendencia de Formación
  const trendCtx = document.getElementById('formacionTrendChart').getContext('2d');
  new Chart(trendCtx, {
    type: 'bar',
    data: {
      labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      datasets: [
        {
          label: '2024',
          data: [3200, 3800, 4200, 4500, 4800, 5100, 5400, 5200, 5000, 4800, 4600, 4400],
          backgroundColor: 'rgba(156, 39, 176, 0.5)',
          borderColor: 'rgba(156, 39, 176, 1)',
          borderWidth: 1
        },
        {
          label: '2025',
          data: [6500, 7200, 7800, 8400, 9100, 9500, 9800, 10200, 9800, 9400, 9000, 8800],
          backgroundColor: 'rgba(33, 150, 243, 0.5)',
          borderColor: 'rgba(33, 150, 243, 1)',
          borderWidth: 1
        },
        {
          label: '2026',
          data: [19921, null, null, null, null, null, null, null, null, null, null, null],
          backgroundColor: 'rgba(76, 175, 80, 0.8)',
          borderColor: 'rgba(76, 175, 80, 1)',
          borderWidth: 2
        }
      ]
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

  // Gráfico de Género
  const generoCtx = document.getElementById('generoChart').getContext('2d');
  new Chart(generoCtx, {
    type: 'pie',
    data: {
      labels: ['Mujeres Formadas', 'Hombres Formados'],
      datasets: [{
        data: [11500, 8421],  // Datos de ejemplo
        backgroundColor: ['#e91e63', '#2196f3'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });

  // Función para aplicar filtros
  function aplicarFiltros() {
    const mes = document.getElementById('mes_analisis').value;
    const region = document.getElementById('region_filter').value;
    
    // Aquí iría la lógica AJAX para recargar los datos filtrados
    alert('Filtros aplicados: Mes=' + mes + ', Región=' + region);
    // TODO: Implementar llamada AJAX a endpoint que devuelva datos filtrados
  }
</script>
