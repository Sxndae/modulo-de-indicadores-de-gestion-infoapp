# Módulo de Indicadores de Gestión - InfoApp

Módulo completo para gestión de indicadores en la plataforma InfoApp. Este módulo proporciona herramientas para seguimiento, análisis y reportes de indicadores de gestión.

## 📋 Descripción

Este módulo incluye funcionalidades para:

- **Dashboard de Indicadores**: Panel interactivo con visualización de métricas principales
- **Configuración**: Gestión de parámetros y ajustes del módulo
- **Reportes**: Generación de reportes por diferentes categorías
- **Territorializacion**: Análisis geográfico de indicadores
- **Análisis de Formación**: Indicadores relacionados con actividades de formación
- **Análisis de Producción**: Seguimiento de productos y servicios
- **Red de Gestión**: Análisis de redes y conexiones

## 📁 Estructura del Proyecto

```
modulo-de-indicadores-de-gestion-infoapp/
│
├── admin/core/app/
│   ├── model/
│   │   └── IndicadoresData.php                    # Modelo de datos para indicadores
│   │
│   └── view/
│       ├── indicadores_ciudades-view.php          # Vista de análisis por ciudades
│       ├── indicadores_configuracion-view.php     # Vista de configuración (admin)
│       ├── indicadores_dashboard-view.php         # Dashboard administrativo
│       ├── indicadores_formacion-view.php         # Análisis de formación (admin)
│       ├── indicadores_produccion-view.php        # Análisis de producción (admin)
│       ├── indicadores_red-view.php               # Análisis de red (admin)
│       ├── indicadores_territorializacion-view.php # Análisis territorial (admin)
│       └── indicadores_territorializacion_mejorada-view.php # Versión mejorada
│
└── core/app/view/
    ├── indicadores_configuracion-view.php         # Vista de configuración (usuario)
    ├── indicadores_dashboard-view.php             # Dashboard de usuario
    ├── indicadores_formacion-view.php             # Análisis de formación (usuario)
    ├── indicadores_produccion-view.php            # Análisis de producción (usuario)
    ├── indicadores_red-view.php                   # Análisis de red (usuario)
    └── indicadores_territorializacion-view.php    # Análisis territorial (usuario)
```

## 🎯 Características Principales

### 1. **Modelo de Datos (IndicadoresData.php)**
- Gestión centralizada de datos de indicadores
- Métodos para obtener, actualizar y analizar indicadores
- Integración con la base de datos

### 2. **Vistas Administrativas (8 archivos)**
- Panel de control completo para administradores
- Configuración avanzada de indicadores
- Monitoreo y análisis en tiempo real

### 3. **Vistas de Usuario (6 archivos)**
- Acceso a indicadores relevantes para usuarios finales
- Visualizaciones interactivas
- Reportes personalizados

## 🚀 Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/tu-usuario/modulo-de-indicadores-de-gestion-infoapp.git
```

2. Copiar los archivos a la estructura correcta del proyecto InfoApp:
```bash
# Copiar archivos admin
cp -r admin/core/app/* /ruta/a/infoapp/admin/core/app/

# Copiar archivos core
cp -r core/core/app/* /ruta/a/infoapp/core/app/
```

3. Ejecutar migraciones de base de datos (ver archivo infoapp_mysql-2026-02-05.sql o infoapp_pg-2026-02-05.sql)

## 📊 Funcionalidades por Vista

### Admin
- **Dashboard**: Resumen general de indicadores
- **Configuración**: Ajustes del módulo
- **Ciudades**: Análisis por ubicación geográfica
- **Formación**: Métricas de actividades de capacitación
- **Producción**: Seguimiento de productos/servicios
- **Red**: Análisis de conexiones y relaciones
- **Territorializacion**: Desglose territorial con opciones mejoradas

### Usuario
- **Dashboard**: Indicadores personales
- **Configuración**: Preferencias de visualización
- **Formación**: Su participación en formación
- **Producción**: Sus productos/servicios
- **Red**: Sus conexiones
- **Territorializacion**: Su análisis territorial

## 🔧 Tecnologías Utilizadas

- PHP (Backend)
- HTML5 / CSS3 (Frontend)
- JavaScript (Interactividad)
- Base de Datos (MySQL / PostgreSQL)

## 📝 Notas de Desarrollo

- Archivos creados: 15 archivos
- Modelos: 1
- Vistas Admin: 8
- Vistas Usuario: 6
- Versión: 1.0
- Fecha: Febrero 2026

## 📄 Licencia

Este módulo es parte del proyecto InfoApp.

---

**Última actualización**: 23 de Febrero de 2026
