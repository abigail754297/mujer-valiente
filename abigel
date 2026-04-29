<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C y A ∞ - La Más Bella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { 
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        /* Capa inicial para activar el audio (Obligatorio por el navegador) */
        #capa-inicio {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .contenedor-principal {
            text-align: center;
            padding: 40px 20px;
            max-width: 1000px;
            width: 100%;
        }

        .titulo-valor {
            font-weight: 900;
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            color: #2c3e50;
            letter-spacing: 5px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .frase-hermosa {
            font-size: 1.3rem;
            color: #7f8c8d;
            font-style: italic;
            margin-bottom: 50px;
        }

        /* Diseño de Columnas */
        .card-valor {
            border: none;
            border-radius: 20px;
            padding: 35px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            height: 100%;
            transition: transform 0.3s ease;
        }

        .card-valor:hover { transform: translateY(-10px); }
        .b-azul { border-top: 8px solid #3498db; }
        .b-verde { border-top: 8px solid #2ecc71; }
        .b-rosa { border-top: 8px solid #e91e63; }

        /* Contenedor del Video */
        .video-box {
            margin: 50px auto 0;
            max-width: 400px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            background: #000;
        }

        /* Corazones flotantes */
        .heart {
            position: fixed;
            bottom: -10vh;
            color: #ff4d6d;
            z-index: 999;
            animation: moveUp 4s linear forwards;
        }

        @keyframes moveUp {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-110vh) rotate(360deg); opacity: 0; }
        }
    </style>
</head>
<body>

    <div id="capa-inicio">
        <button class="btn btn-danger btn-lg shadow-lg px-5 py-3 fw-bold" onclick="iniciar()" style="border-radius: 50px;">
            <i class="bi bi-heart-fill me-2"></i> CLIC PARA EMPEZAR
        </button>
        <p class="mt-4 text-muted">Sube el volumen para escuchar "La Más Bella"</p>
    </div>

    <div class="contenedor-principal d-none" id="contenido">
        <h1 class="titulo-valor">La Más Bella</h1>
        <p class="frase-hermosa">"Eres un ángel que vive en la tierra... dejas huella por donde vas."</p>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card-valor b-azul">
                    <i class="bi bi-gem fs-1 text-primary"></i>
                    <h3 class="mt-3 fw-bold">Esencia</h3>
                    <p class="text-muted">No hay en el mundo nadie como ella, tu luz es única.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-valor b-verde">
                    <i class="bi bi-flower1 fs-1 text-success"></i>
                    <h3 class="mt-3 fw-bold">Fortaleza</h3>
                    <p class="text-muted">Vuela muy alto como los cometas, libre y valiente.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-valor b-rosa">
                    <i class="bi bi-stars fs-1 text-danger"></i>
                    <h3 class="mt-3 fw-bold">Brillo</h3>
                    <p class="text-muted">Enciendes el fuego al pasar, iluminando cada rincón.</p>
                </div>
            </div>
        </div>

        <div class="video-box">
            <div id="reproductor"></div>
        </div>
        <p class="mt-3 text-secondary italic small">Música: Afrodisiaco - La Más Bella</p>
    </div>

    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        let player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('reproductor', {
                height: '230',
                width: '100%',
                videoId: 'GGysLKbY8v0', // ID de "La Más Bella"
                playerVars: {
                    'autoplay': 0,
                    'controls': 1,
                    'rel': 0,
                    'modestbranding': 1
                }
            });
        }

        function iniciar() {
            document.getElementById('capa-inicio').classList.add('d-none');
            document.getElementById('contenido').classList.remove('d-none');

            if (player && player.playVideo) {
                player.playVideo();
            }

            lluviaDeCorazones();
        }

        function lluviaDeCorazones() {
            setInterval(() => {
                const heart = document.createElement('div');
                heart.innerHTML = '<i class="bi bi-heart-fill"></i>';
                heart.className = 'heart';
                heart.style.left = Math.random() * 100 + 'vw';
                heart.style.fontSize = Math.random() * 20 + 15 + 'px';
                document.body.appendChild(heart);
                setTimeout(() => heart.remove(), 4000);
            }, 300);
        }
    </script>
</body>
</html>
