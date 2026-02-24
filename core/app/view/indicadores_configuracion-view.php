<?php
/**
 * Vista de Configuración de Metas
 * Permite configurar las metas para cada dimensión e indicador
 */
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">settings</i>
        </div>
        <h4 class="card-title">Configuración de Metas</h4>
        <p class="card-category">Define y ajusta las metas para cada indicador de gestión</p>
      </div>
      <div class="card-body">

        <!-- Botón Volver -->
        <div class="row mb-3">
          <div class="col-md-12">
            <a href="./?view=indicadores_dashboard" class="btn btn-info">
              <i class="material-icons">arrow_back</i> Volver al Dashboard
            </a>
            <button class="btn btn-success float-right" onclick="guardarMetas()">
              <i class="material-icons">save</i> Guardar Configuración
            </button>
          </div>
        </div>

        <!-- Tabs para cada dimensión -->
        <ul class="nav nav-pills nav-pills-primary" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab_formacion" role="tablist">
              <i class="material-icons">school</i> Formación
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab_red" role="tablist">
              <i class="material-icons">router</i> Salud de Red
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab_territorializacion" role="tablist">
              <i class="material-icons">location_on</i> Territorialización
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab_produccion" role="tablist">
              <i class="material-icons">campaign</i> Producción
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab_ponderacion" role="tablist">
              <i class="material-icons">tune</i> Ponderación
            </a>
          </li>
        </ul>

        <div class="tab-content tab-space">
          
          <!-- Tab Formación -->
          <div class="tab-pane active" id="tab_formacion">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Metas de Formación</h4>
                <p class="card-category">Configura las metas de personas formadas</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Mensual Nacional (Personas Formadas)</label>
                      <input type="number" class="form-control" id="meta_formacion_mensual" value="3500" min="0">
                      <small class="form-text text-muted">Número de personas a formar por mes a nivel nacional</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Anual Nacional</label>
                      <input type="number" class="form-control" id="meta_formacion_anual" value="42000" min="0">
                      <small class="form-text text-muted">Meta anual calculada automáticamente (Mensual × 12)</small>
                    </div>
                  </div>
                </div>
                <hr>
                <h5>Umbrales de Puntuación</h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Zona Verde (Excelente)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">≥</span>
                        </div>
                        <input type="number" class="form-control" value="100" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                      <small class="form-text text-success">Cumplimiento ≥ 100% = 100 puntos</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Zona Amarilla (Aceptable)</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="70" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">% - 99%</span>
                        </div>
                      </div>
                      <small class="form-text text-warning">70-99% cumplimiento = 70-99 puntos</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Zona Roja (Crítico)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">&lt;</span>
                        </div>
                        <input type="number" class="form-control" value="70" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                      <small class="form-text text-danger">Cumplimiento &lt; 70% = proporcional</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab Salud de Red -->
          <div class="tab-pane" id="tab_red">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Metas de Salud de Red</h4>
                <p class="card-category">Configura objetivos de operatividad</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta: % Infocentros Operativos</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="85" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                      <small class="form-text text-muted">Objetivo: 85% de Infocentros operativos</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta: % PCs Operativas</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="80" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                      <small class="form-text text-muted">Objetivo: 80% de PCs en buen estado</small>
                    </div>
                  </div>
                </div>
                <hr>
                <h5>Criterios de Puntuación</h5>
                <div class="alert alert-info">
                  <p><strong>Fórmula de puntuación:</strong></p>
                  <code>Score = (% Infocentros Operativos × 0.6) + (% PCs Operativas × 0.4)</code>
                  <br><br>
                  <p class="mb-0">
                    <strong>Verde:</strong> Score ≥ 80 | 
                    <strong>Amarillo:</strong> 60 ≤ Score &lt; 80 | 
                    <strong>Rojo:</strong> Score &lt; 60
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab Territorialización -->
          <div class="tab-pane" id="tab_territorializacion">
            <div class="card">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Metas de Territorialización</h4>
                <p class="card-category">Objetivos de cobertura comunal</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Meta: % Cobertura Municipal</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="90" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Meta: % Cobertura Parroquial</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="70" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Meta: % Cobertura Comunal</label>
                      <div class="input-group">
                        <input type="number" class="form-control" value="25" min="0" max="100">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="alert alert-warning">
                  <p><strong>⚠️ Estado Actual:</strong></p>
                  <ul class="mb-0">
                    <li>Cobertura Municipal: <strong>82.9%</strong> (cerca de la meta)</li>
                    <li>Cobertura Parroquial: <strong>53.9%</strong> (por debajo de la meta)</li>
                    <li>Cobertura Comunal: <strong>0.91%</strong> (muy por debajo de la meta)</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab Producción -->
          <div class="tab-pane" id="tab_produccion">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Metas de Producción Comunicacional</h4>
                <p class="card-category">Objetivos de contenidos creados</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Mensual de Productos</label>
                      <input type="number" class="form-control" value="1660" min="0">
                      <small class="form-text text-muted">Productos comunicacionales a crear por mes</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Anual de Productos</label>
                      <input type="number" class="form-control" value="19920" min="0" readonly>
                      <small class="form-text text-muted">Calculado automáticamente</small>
                    </div>
                  </div>
                </div>
                <hr>
                <h5>Metas por Tipo de Producto (Opcional)</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Tipo de Producto</th>
                        <th>Meta Mensual</th>
                        <th>% del Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="material-icons text-info">photo</i> Imágenes</td>
                        <td><input type="number" class="form-control form-control-sm" value="600"></td>
                        <td>36%</td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-danger">videocam</i> Videos</td>
                        <td><input type="number" class="form-control form-control-sm" value="400"></td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-success">article</i> Artículos</td>
                        <td><input type="number" class="form-control form-control-sm" value="500"></td>
                        <td>30%</td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-warning">mic</i> Audios/Podcast</td>
                        <td><input type="number" class="form-control form-control-sm" value="100"></td>
                        <td>6%</td>
                      </tr>
                      <tr>
                        <td><i class="material-icons text-primary">apps</i> Infografías</td>
                        <td><input type="number" class="form-control form-control-sm" value="60"></td>
                        <td>4%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab Ponderación -->
          <div class="tab-pane" id="tab_ponderacion">
            <div class="card">
              <div class="card-header card-header-rose">
                <h4 class="card-title">Ponderación de Dimensiones</h4>
                <p class="card-category">Define el peso de cada dimensión en la puntuación global</p>
              </div>
              <div class="card-body">
                <div class="alert alert-info">
                  <strong>📊 Puntuación Global:</strong> Es el promedio ponderado de las 4 dimensiones. La suma de pesos debe ser 100%.
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>1. Efectividad Formativa</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="peso_formacion" value="40" min="0" max="100" onchange="validarPesos()">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>2. Salud de la Red</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="peso_red" value="30" min="0" max="100" onchange="validarPesos()">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>3. Territorialización</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="peso_territorializacion" value="20" min="0" max="100" onchange="validarPesos()">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>4. Producción Comunicacional</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="peso_produccion" value="10" min="0" max="100" onchange="validarPesos()">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="alert" id="alerta_pesos">
                      <h4>Total: <span id="total_pesos">100</span>%</h4>
                    </div>
                  </div>
                </div>

                <hr>
                <h5>Fórmula de Cálculo</h5>
                <div class="card">
                  <div class="card-body">
                    <code>
                      Puntuación Global = (Formación × 40%) + (Salud Red × 30%) + (Territorialización × 20%) + (Producción × 10%)
                    </code>
                    <br><br>
                    <p><strong>Ejemplo con datos actuales:</strong></p>
                    <code>
                      = (85 × 0.40) + (72 × 0.30) + (45 × 0.20) + (95 × 0.10)<br>
                      = 34 + 21.6 + 9 + 9.5<br>
                      = <strong>74.1 puntos</strong>
                    </code>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Botones de Acción -->
        <div class="row mt-4">
          <div class="col-md-12">
            <button class="btn btn-success btn-lg" onclick="guardarMetas()">
              <i class="material-icons">save</i> Guardar Configuración
            </button>
            <button class="btn btn-info btn-lg" onclick="restaurarDefecto()">
              <i class="material-icons">restore</i> Restaurar Valores por Defecto
            </button>
            <a href="./?view=indicadores_dashboard" class="btn btn-secondary btn-lg">
              <i class="material-icons">cancel</i> Cancelar
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  function validarPesos() {
    const formacion = parseFloat(document.getElementById('peso_formacion').value) || 0;
    const red = parseFloat(document.getElementById('peso_red').value) || 0;
    const territorializacion = parseFloat(document.getElementById('peso_territorializacion').value) || 0;
    const produccion = parseFloat(document.getElementById('peso_produccion').value) || 0;
    
    const total = formacion + red + territorializacion + produccion;
    document.getElementById('total_pesos').textContent = total.toFixed(0);
    
    const alerta = document.getElementById('alerta_pesos');
    if (total === 100) {
      alerta.className = 'alert alert-success';
    } else {
      alerta.className = 'alert alert-danger';
    }
  }

  function guardarMetas() {
    // Validar que la suma de pesos sea 100%
    const total = parseFloat(document.getElementById('total_pesos').textContent);
    if (total !== 100) {
      alert('Error: La suma de ponderaciones debe ser 100%. Actualmente es ' + total + '%');
      return;
    }

    // Aquí iría la lógica AJAX para guardar en la base de datos
    alert('Configuración guardada exitosamente.\n\nNOTA: En producción, esto guardaría los datos en la base de datos.');
    // TODO: Implementar guardado en BD
  }

  function restaurarDefecto() {
    if (confirm('¿Está seguro de restaurar los valores por defecto? Se perderán los cambios no guardados.')) {
      document.getElementById('peso_formacion').value = 40;
      document.getElementById('peso_red').value = 30;
      document.getElementById('peso_territorializacion').value = 20;
      document.getElementById('peso_produccion').value = 10;
      validarPesos();
    }
  }

  // Validar al cargar la página
  document.addEventListener('DOMContentLoaded', function() {
    validarPesos();
  });
</script>
