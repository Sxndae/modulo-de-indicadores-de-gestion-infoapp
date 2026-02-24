<?php
/**
 * Modelo de Datos para Indicadores de Gestión
 * Consulta datos reales de la base de datos PostgreSQL y MySQL
 */

// No necesitamos require aquí porque el autoload ya carga las clases

class IndicadoresData
{
    /**
     * Obtener total de participantes formados por mes y región
     */
    public static function getParticipantesPorMes($mes = null, $anio = null, $region = null)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    COUNT(*) as total_participantes,
                    estate as region,
                    gender as genero,
                    COUNT(DISTINCT estate) as regiones_activas
                FROM participants_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio";
        
        if ($region != null && $region != '0') {
            $sql .= " AND estate = :region";
        }
        
        $sql .= " GROUP BY estate, gender";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        
        if ($region != null && $region != '0') {
            $stmt->bindParam(':region', $region);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener total de participantes formados (resumen general)
     */
    public static function getTotalParticipantes($mes = null, $anio = null)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    COUNT(*) as total,
                    COUNT(DISTINCT estate) as regiones,
                    COUNT(CASE WHEN gender = 'Femenino' OR gender = 'F' OR gender = 'Mujer' THEN 1 END) as mujeres,
                    COUNT(CASE WHEN gender = 'Masculino' OR gender = 'M' OR gender = 'Hombre' THEN 1 END) as hombres
                FROM participants_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener participantes por región (ranking)
     */
    public static function getParticipantesPorRegion($mes = null, $anio = null, $limit = 10)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    estate as region,
                    COUNT(*) as total_participantes,
                    COUNT(CASE WHEN gender = 'Femenino' OR gender = 'F' OR gender = 'Mujer' THEN 1 END) as mujeres,
                    COUNT(CASE WHEN gender = 'Masculino' OR gender = 'M' OR gender = 'Hombre' THEN 1 END) as hombres
                FROM participants_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio
                GROUP BY estate
                ORDER BY total_participantes DESC
                LIMIT :limit";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener evolución mensual de participantes
     */
    public static function getEvolucionMensual($anio = null, $meses = 12)
    {
        $conn = DatabasePg::connectPg();
        
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    TO_CHAR(date_reg, 'YYYY-MM') as mes,
                    COUNT(*) as total_participantes
                FROM participants_list 
                WHERE EXTRACT(YEAR FROM date_reg) = :anio
                GROUP BY TO_CHAR(date_reg, 'YYYY-MM')
                ORDER BY mes ASC";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':anio', $anio);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener estadísticas de Infocentros
     */
    public static function getEstadisticasInfocentros()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    COUNT(*) as total_infocentros,
                    COUNT(CASE WHEN LOWER(estatus) = 'abierto' THEN 1 END) as abiertos,
                    COUNT(CASE WHEN LOWER(estatus) = 'cerrado' THEN 1 END) as cerrados,
                    COUNT(CASE WHEN LOWER(estatus) = 'cierre definitivo' THEN 1 END) as cerrados_definitivo,
                    COUNT(DISTINCT estado) as estados_con_presencia
                FROM infocentros";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener Infocentros por región con su estatus
     */
    public static function getInfocentrosPorRegion()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    estado as region,
                    COUNT(*) as total,
                    COUNT(CASE WHEN LOWER(estatus) = 'abierto' THEN 1 END) as abiertos,
                    COUNT(CASE WHEN LOWER(estatus) = 'cerrado' THEN 1 END) as cerrados,
                    COUNT(CASE WHEN LOWER(estatus) = 'cierre definitivo' THEN 1 END) as cerrados_definitivo
                FROM infocentros
                GROUP BY estado
                ORDER BY total DESC";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener estadísticas de productos comunicacionales
     */
    public static function getEstadisticasProductos($mes = null, $anio = null)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    COUNT(*) as total_productos,
                    SUM(quantity_created) as cantidad_creada,
                    SUM(quantity_published) as cantidad_publicada,
                    COUNT(DISTINCT format) as tipos_formatos
                FROM products_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener productos por tipo de formato
     */
    public static function getProductosPorFormato($mes = null, $anio = null)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    format as formato,
                    COUNT(*) as total_productos,
                    SUM(quantity_created) as cantidad_creada
                FROM products_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio
                AND format IS NOT NULL
                GROUP BY format
                ORDER BY cantidad_creada DESC";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener productos por región
     */
    public static function getProductosPorRegion($mes = null, $anio = null, $limit = 10)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    estate as region,
                    COUNT(*) as total_productos,
                    SUM(quantity_created) as cantidad_creada,
                    SUM(quantity_published) as cantidad_publicada
                FROM products_list 
                WHERE EXTRACT(MONTH FROM date_reg) = :mes 
                AND EXTRACT(YEAR FROM date_reg) = :anio
                GROUP BY estate
                ORDER BY cantidad_creada DESC
                LIMIT :limit";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener total de facilitadores (MySQL)
     */
    public static function getTotalFacilitadores()
    {
        $con = Database::getCon();

        $sql = "SELECT 
                    COUNT(*) as total,
                    COUNT(CASE WHEN gender = 'Femenino' OR gender = 'F' THEN 1 END) as mujeres,
                    COUNT(CASE WHEN gender = 'Masculino' OR gender = 'M' THEN 1 END) as hombres,
                    COUNT(DISTINCT estate) as regiones
                FROM facilitators
                WHERE status_nom = 'Activo' OR status_nom = 'activo'";
        
        $result = $con->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * Obtener lista de regiones disponibles
     */
    public static function getRegiones()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT DISTINCT estado as region 
                FROM infocentros 
                WHERE estado IS NOT NULL AND estado != ''
                ORDER BY estado ASC";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Calcular puntuación de formación
     * @param int $personas_formadas - Total de personas formadas
     * @param int $meta - Meta establecida
     * @return int Puntuación de 0 a 100
     */
    public static function calcularPuntuacionFormacion($personas_formadas, $meta)
    {
        if ($meta == 0) return 0;
        
        $cumplimiento = ($personas_formadas / $meta) * 100;
        
        // Si cumple o supera la meta, puntuación 100
        if ($cumplimiento >= 100) {
            return 100;
        }
        
        // Si está en zona amarilla (70-99%), puntuación proporcional
        if ($cumplimiento >= 70) {
            return round($cumplimiento);
        }
        
        // Si está en zona roja (<70%), puntuación proporcional pero penalizada
        return round($cumplimiento * 0.8);
    }

    /**
     * Calcular puntuación de salud de red
     */
    public static function calcularPuntuacionSaludRed($stats)
    {
        $total = $stats['total_infocentros'];
        if ($total == 0) return 0;
        
        $operativos = $stats['abiertos'];
        $porcentaje = ($operativos / $total) * 100;
        
        return round($porcentaje);
    }

    /**
     * Calcular puntuación global ponderada
     */
    public static function calcularPuntuacionGlobal($puntuaciones, $pesos = null)
    {
        if ($pesos == null) {
            $pesos = [
                'formacion' => 0.40,
                'salud_red' => 0.30,
                'territorializacion' => 0.20,
                'produccion' => 0.10
            ];
        }
        
        $puntuacion_global = 
            ($puntuaciones['formacion'] * $pesos['formacion']) +
            ($puntuaciones['salud_red'] * $pesos['salud_red']) +
            ($puntuaciones['territorializacion'] * $pesos['territorializacion']) +
            ($puntuaciones['produccion'] * $pesos['produccion']);
        
        return round($puntuacion_global, 1);
    }

    /**
     * MEJORA 1: Obtener estadísticas de territorialización
     * Calcula cobertura geográfica basada en infocentros
     */
    public static function getEstadisticasTerritorializacion()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    COUNT(*) as total_infocentros,
                    COUNT(DISTINCT estado) as estados_con_cobertura,
                    COUNT(DISTINCT municipio) as municipios_cubiertos,
                    COUNT(CASE WHEN LOWER(estatus) = 'abierto' THEN 1 END) as infocentros_operativos,
                    COUNT(CASE WHEN tipo_zona = 'Rural' THEN 1 END) as infocentros_rurales,
                    COUNT(CASE WHEN tipo_zona = 'Urbana' THEN 1 END) as infocentros_urbanos
                FROM infocentros";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 1: Obtener cobertura por estado
     */
    public static function getCoberturaPorEstado()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    estado as region,
                    COUNT(*) as total_infocentros,
                    COUNT(CASE WHEN LOWER(estatus) = 'abierto' THEN 1 END) as abiertos,
                    COUNT(DISTINCT municipio) as municipios_cubiertos,
                    COUNT(CASE WHEN tipo_zona = 'Rural' THEN 1 END) as rurales,
                    COUNT(CASE WHEN tipo_zona = 'Urbana' THEN 1 END) as urbanos
                FROM infocentros
                WHERE estado IS NOT NULL AND estado != ''
                GROUP BY estado
                ORDER BY total_infocentros DESC";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 1: Calcular puntuación de territorialización (dinámica)
     */
    public static function calcularPuntuacionTerritorializacion()
    {
        $stats = self::getEstadisticasTerritorializacion();
        
        // Meta: cobertura en 24 estados
        $meta_estados = 24;
        $estados_alcanzados = $stats['estados_con_cobertura'] ?? 0;
        
        // Meta: infocentros operativos (90% del total)
        $total_infocentros = $stats['total_infocentros'] ?? 1;
        $operativos = $stats['infocentros_operativos'] ?? 0;
        $tasa_operatividad = ($operativos / $total_infocentros) * 100;
        
        // Cálculo ponderado:
        // 60% por cobertura de estados + 40% por operatividad
        $cobertura_porcentaje = ($estados_alcanzados / $meta_estados) * 100;
        $puntuacion = ($cobertura_porcentaje * 0.6) + ($tasa_operatividad * 0.4);
        
        return round(min($puntuacion, 100)); // Máximo 100
    }

    /**
     * MEJORA 2: Obtener participantes por ciudad
     */
    public static function getParticipantesPorCiudad($mes = null, $anio = null, $limit = 15)
    {
        $conn = DatabasePg::connectPg();
        
        if ($mes == null) {
            $mes = date('m');
        }
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    COALESCE(ic.ciudad, 'Sin registrar') as ciudad,
                    COALESCE(ic.estado, 'Sin registrar') as estado,
                    COUNT(pl.id) as total_participantes,
                    COUNT(CASE WHEN pl.gender IN ('Femenino', 'F', 'Mujer') THEN 1 END) as mujeres,
                    COUNT(CASE WHEN pl.gender IN ('Masculino', 'M', 'Hombre') THEN 1 END) as hombres
                FROM participants_list pl
                LEFT JOIN infocentros ic ON pl.info_id = ic.id
                WHERE EXTRACT(MONTH FROM pl.date_reg) = :mes 
                AND EXTRACT(YEAR FROM pl.date_reg) = :anio
                GROUP BY ic.ciudad, ic.estado
                ORDER BY total_participantes DESC
                LIMIT :limit";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 2: Obtener evolución de participantes por ciudad
     */
    public static function getEvolucionPorCiudad($ciudad = null, $anio = null)
    {
        $conn = DatabasePg::connectPg();
        
        if ($anio == null) {
            $anio = date('Y');
        }

        $sql = "SELECT 
                    TO_CHAR(pl.date_reg, 'YYYY-MM') as mes,
                    COUNT(*) as total_participantes,
                    COALESCE(ic.ciudad, 'Sin registrar') as ciudad
                FROM participants_list pl
                LEFT JOIN infocentros ic ON pl.info_id = ic.id
                WHERE EXTRACT(YEAR FROM pl.date_reg) = :anio";
        
        if ($ciudad != null && $ciudad != '0') {
            $sql .= " AND COALESCE(ic.ciudad, 'Sin registrar') = :ciudad";
        }
        
        $sql .= " GROUP BY TO_CHAR(pl.date_reg, 'YYYY-MM'), ic.ciudad
                 ORDER BY mes ASC";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':anio', $anio);
        
        if ($ciudad != null && $ciudad != '0') {
            $stmt->bindParam(':ciudad', $ciudad);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 3: Obtener facilitadores por región
     */
    public static function getFacilitadoresPorRegion()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    COALESCE(f.estate, 'Sin registrar') as region,
                    COUNT(DISTINCT f.id) as total_facilitadores,
                    COUNT(DISTINCT pl.id_user_final) as participantes_atendidos,
                    ROUND(AVG(CASE WHEN pl.id IS NOT NULL THEN 1 ELSE 0 END) * 100, 2) as porcentaje_actividad
                FROM facilitators f
                LEFT JOIN participants_list pl ON f.id = pl.uid_fac
                WHERE f.estate IS NOT NULL AND f.estate != ''
                GROUP BY f.estate
                ORDER BY total_facilitadores DESC";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 3: Obtener estadísticas generales de facilitadores
     */
    public static function getEstadisticasFacilitadores()
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    COUNT(DISTINCT f.id) as total_facilitadores,
                    COUNT(DISTINCT f.estate) as estados_cubiertos,
                    COUNT(DISTINCT pl.id) as participantes_total,
                    ROUND(AVG(CASE WHEN pl.id IS NOT NULL THEN 1 ELSE 0 END), 2) as promedio_participantes_por_facilitador
                FROM facilitators f
                LEFT JOIN participants_list pl ON f.id = pl.uid_fac";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * MEJORA 3: Obtener carga de trabajo por facilitador
     */
    public static function getCargaTrabajoPorFacilitador($limit = 15)
    {
        $conn = DatabasePg::connectPg();

        $sql = "SELECT 
                    f.id,
                    f.name as nombre_facilitador,
                    COALESCE(f.estate, 'Sin registrar') as region,
                    COUNT(DISTINCT pl.id) as participantes_atendidos,
                    COUNT(DISTINCT CASE WHEN EXTRACT(MONTH FROM pl.date_reg) = EXTRACT(MONTH FROM NOW()) 
                                        AND EXTRACT(YEAR FROM pl.date_reg) = EXTRACT(YEAR FROM NOW())
                                   THEN pl.id END) as participantes_mes_actual
                FROM facilitators f
                LEFT JOIN participants_list pl ON f.id = pl.uid_fac
                GROUP BY f.id, f.name, f.estate
                ORDER BY participantes_atendidos DESC
                LIMIT :limit";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
