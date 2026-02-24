# Estructura Detallada del Módulo

## Archivos del Modelo

### admin/core/app/model/IndicadoresData.php
Clase principal para gestionar datos de indicadores:
- Conexión a base de datos
- Métodos CRUD para indicadores
- Validación de datos
- Generación de reportes

## Vistas Administrativas

### admin/core/app/view/

1. **indicadores_dashboard-view.php**
   - Panel principal de control
   - Widget con métricas globales
   - Gráficos resumen

2. **indicadores_configuracion-view.php**
   - Formularios de configuración
   - Ajustes del sistema
   - Gestión de parámetros

3. **indicadores_ciudades-view.php**
   - Datos por ciudad/municipio
   - Mapas interactivos
   - Comparativas geográficas

4. **indicadores_formacion-view.php**
   - Métricas de capacitación
   - Análisis de participación
   - Reportes de formación

5. **indicadores_produccion-view.php**
   - Seguimiento de producción
   - Análisis de calidad
   - Métricas de eficiencia

6. **indicadores_red-view.php**
   - Análisis de conexiones
   - Visualización de redes
   - Métricas de relación

7. **indicadores_territorializacion-view.php**
   - Análisis territorial base
   - División administrativa
   - Datos por región

8. **indicadores_territorializacion_mejorada-view.php**
   - Versión avanzada con funciones mejoradas
   - Visualizaciones más detalladas
   - Análisis más profundo

## Vistas de Usuario

### core/app/view/

1. **indicadores_dashboard-view.php**
   - Panel de usuario
   - Sus indicadores personales
   - Gráficos interactivos

2. **indicadores_configuracion-view.php**
   - Preferencias de usuario
   - Filtros personalizados
   - Opciones de visualización

3. **indicadores_formacion-view.php**
   - Participación en formación
   - Certificados obtenidos
   - Progreso de aprendizaje

4. **indicadores_produccion-view.php**
   - Productos generados
   - Servicio prestado
   - Métricas individuales

5. **indicadores_red-view.php**
   - Red de contactos
   - Colaboraciones
   - Conexiones activas

6. **indicadores_territorializacion-view.php**
   - Datos de su territorio
   - Análisis local
   - Comparativas regionales

## Integración en InfoApp

Este módulo se integra con la arquitectura MVC de InfoApp:

```
InfoApp/
├── admin/
│   └── core/app/
│       ├── model/          ← IndicadoresData.php
│       └── view/           ← Vistas admin (8 archivos)
│
└── core/
    └── app/
        └── view/          ← Vistas usuario (6 archivos)
```

## Base de Datos

Las tablas necesarias se definen en:
- `infoapp_mysql-2026-02-05.sql` (para MySQL)
- `infoapp_pg-2026-02-05.sql` (para PostgreSQL)

Tablas principales:
- indicadores
- indicadores_valores
- indicadores_reportes
- indicadores_configuracion

