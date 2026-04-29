<?php
session_start();

/**
 * 🏛️ 1. ESTRUCTURA DE PROGRAMACIÓN ORIENTADA A OBJETOS
 */

// Clase Base: Usuario (Aplica Concepto de Clases y Atributos)
class Usuario {
    public $dni;
    public $nombre;
    public $carrera;

    // Aplicación de Constructor
    public function __construct($dni, $nom, $car) {
        $this->dni = $dni;
        $this->nombre = $nom;
        $this->carrera = $car;
    }
}

// Aplicación de HERENCIA: Estudiante hereda de Usuario
class Estudiante extends Usuario {
    public function __construct($dni, $nom, $car) {
        // Llama al constructor del padre
        parent::__construct($dni, $nom, $car);
    }
    
    // Ejemplo de un Método (Comportamiento)
    public function presentarse() {
        return "Hola, soy " . $this->nombre . " de la carrera " . $this->carrera;
    }
}

// Clase Libro (Aplica Concepto de Clases y Atributos)
class Libro {
    public $codigo, $titulo, $autor, $categoria, $disponible;

    public function __construct($cod, $tit, $aut, $cat) {
        $this->codigo = $cod;
        $this->titulo = $tit;
        $this->autor = $aut;
        $this->categoria = $cat;
        $this->disponible = true;
    }
}

/**
 * ⚙️ 2. LÓGICA DE CONTROLADOR Y PERSISTENCIA (SESSION)
 */

if (!isset($_SESSION['inventario'])) {
    $_SESSION['inventario'] = [];
}

$mostrar_gracias = false;

// Registro de Libro (Instanciación de Objetos)
if (isset($_POST['btn_registrar'])) {
    $cod = $_POST['codigo'];
    $tit = $_POST['titulo'];
    $aut = $_POST['autor'];
    $cat = $_POST['categoria'];
    
    // Se instancian los Objetos
    $usuario = new Estudiante("75428708", "Abigel Rojas", "Ciencias de la Comunicación");
    $libro = new Libro($cod, $tit, $aut, $cat);

    // Guardar los datos en el inventario de la sesión
    $_SESSION['inventario'][] = [
        'cod' => $libro->codigo,
        'tit' => $libro->titulo,
        'aut' => $libro->autor,
        'cat' => $libro->categoria,
        'usr' => $usuario->nombre,
        'car' => $usuario->carrera
    ];
    $mostrar_gracias = true;
}

// Limpiar historial
if (isset($_POST['limpiar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SISTEMA DE GESTIÓN BIBLIOTECARIA</title>
    <style>
        :root { --primary: #2563eb; --secondary: #1e40af; --success: #10b981; --dark: #1e293b; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; margin: 0; padding: 20px; color: #334155; }
        .container { max-width: 900px; margin: auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h2 { color: var(--dark); text-align: center; border-bottom: 4px solid var(--primary); padding-bottom: 10px; }
        .form-card { background: #f8fafc; padding: 25px; border-radius: 15px; border: 1px dashed #cbd5e1; margin-bottom: 30px; }
        .grid-inputs { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        input, select { padding: 12px; border: 1px solid #ddd; border-radius: 8px; }
        .btn-reg { background: var(--primary); color: white; border: none; padding: 15px; border-radius: 8px; cursor: pointer; width: 100%; font-weight: bold; margin-top: 15px; transition: 0.3s; }
        .btn-reg:hover { background: var(--secondary); }
        .gracias-card { background: var(--success); color: white; padding: 20px; border-radius: 12px; text-align: center; margin-bottom: 20px; animation: slideIn 0.5s ease-out; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th { background: var(--dark); color: white; padding: 15px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; }
        .badge { background: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 6px; font-size: 12px; font-weight: bold; }
        @keyframes slideIn { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
</head>
<body>

<div class="container">
    <h2>🚀 SISTEMA DE GESTIÓN BIBLIOTECARIA</h2>

    <?php if ($mostrar_gracias): ?>
        <div class="gracias-card">
            <h3 style="margin:0;">🎉 ¡Registro Exitoso!</h3>
            <p style="margin:5px 0 0;">Gracias, <b>Abigel Rojas</b>. El libro ha sido añadido al inventario.</p>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <h3 style="margin-top:0; color:var(--primary);">📖 Registrar Nuevo Libro</h3>
        <form method="POST">
            <div class="grid-inputs">
                <input type="text" name="codigo" placeholder="ID Código (ej: 001)" required>
                <input type="text" name="titulo" placeholder="Título del Libro" required>
                <input type="text" name="autor" placeholder="Autor del Libro" required>
                <select name="categoria">
                    <option value="Drama">Drama</option>
                    <option value="Cuento">Cuento</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Investigación">Investigación</option>
                </select>
            </div>
            <button type="submit" name="btn_registrar" class="btn-reg">✅ Registrar Libro y Generar Préstamo</button>
        </form>
    </div>

    <h3>📋 INVENTARIO Y PRÉSTAMOS ACTIVOS</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Libro / Autor</th>
                <th>Usuario</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($_SESSION['inventario'])): ?>
                <tr><td colspan="4" style="text-align:center; color:#94a3b8;">El inventario está vacío.</td></tr>
            <?php else: ?>
                <?php foreach (array_reverse($_SESSION['inventario']) as $i): ?>
                    <tr>
                        <td><b>#<?php echo $i['cod']; ?></b></td>
                        <td>
                            <b><?php echo $i['tit']; ?></b><br>
                            <small style="color: #64748b;"><?php echo $i['aut']; ?> (<?php echo $i['cat']; ?>)</small>
                        </td>
                        <td>
                            👤 <?php echo $i['usr']; ?><br>
                            <span style="color:var(--primary); font-size:12px;">🎓 <?php echo $i['car']; ?></span>
                        </td>
                        <td><span class="badge">🤝 PRESTADO</span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <form method="POST" style="margin-top: 20px; text-align: center;">
        <button type="submit" name="limpiar" style="background:none; border:none; color:#ef4444; cursor:pointer; text-decoration:underline;">🗑️ Reiniciar sistema</button>
    </form>
</div>

</body>
</html>