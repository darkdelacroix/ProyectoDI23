// CALCULO NUM ALUMNOS
$sql = "select count(*) from alumno where true"; // se le añade el true para que siempre lleve where y poder añadri filtros de forma cómoda
$sql_filters = ""; // Se crea la sql de filtros para reutilizarla
$filters = array();
if (!empty($dni)){
    $sql_filters .= " and dni like :dni";
    $filters[":dni"] = "%".$dni."%";
}
if (!empty($nombre)) {
    $sql_filters .= " and nombre like :nombre";
    $filters[":nombre"] = "%".$nombre."%";
}
if (!empty($localidad)) {
    $sql_filters .= " and localidad like :localidad";
    $filters[":localidad"] = "%".$localidad."%";
}
if (!empty($fecha_nacimiento)) {
    $sql_filters .= " and fecha_nacimiento like :fecha_nacimiento";
    $filters[":fecha_nacimiento"] = "%".$fecha_nacimiento."%";
}
$sql .= $sql_filters;
$stmt = $con->prepare($sql);
$stmt->execute($filters);
$result = $stmt->fetch();
$total_registros = $result[0];
// Cálculo de Acciones
$paginas = ceil($total_registros/$num_registros);
if ($primero) $pagina = 1;
if ($ultimo) $pagina = $paginas;
if ($siguiente && $pagina<$paginas) $pagina++;
if ($anterior && $pagina>1) $pagina--;
if ($mostrar) $pagina = 1;
// OBTENCIÓN ALUMNOS
$sql = 'SELECT * FROM alumno where true'; // se le añade el true para que siempre lleve where y poder añadri filtros de forma cómoda
$sql .= $sql_filters;
if ($num_registros != "todos")
    $sql .= " limit ".($num_registros*($pagina-1)) .",". $num_registros;
//echo $sql;exit();
$stmt = $con->prepare($sql);
$stmt->execute($filters);
// Devuelve un array multidimensional con todos los datos de la query
$arrAlumnos = array();
$arrAlumnos = $stmt->fetchAll();
$stmt = null;
$con = null;
