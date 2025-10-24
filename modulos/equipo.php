<body>
    <style>

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            content:center;

        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center; /* Centrar texto */
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            width: 50%;
            margin-left: 25%;
        }

        .image-container img {
            width: 70%;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white; /* Borde blanco */
        }

        .image-container1 img {
            width: 27%;
            height: 95px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white; /* Borde blanco */
        }

        h3 {
            margin: 15px 0;
            font-size: 1.5rem;
        }

        p {
            margin: 0 15px 15px;
            font-size: 1rem;
            line-height: 1.6;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            padding-bottom: 15px;
        }

        .star-rating i {
            color: gold;
            margin: 0 2px;
            font-size: 1.2rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            h3 {
                font-size: 1.2rem;
            }
            p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .card {
                margin-bottom: 15px;
            }
            .star-rating i {
                font-size: 1rem;
            }
        }

    </style>

<div class="section-title" id="Software">
        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Equipo De</h4>
        <h1 class="display-4">Software</h1>
    </div>

    
    <div class="container">
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Jeffrey Suárez Cataño</h3>
            <p>El equipo de software realiza varias funciones clave que incluyen el análisis de requisitos para definir las necesidades del cliente, el diseño de arquitecturas y sistemas, el desarrollo de código y pruebas para garantizar su funcionamiento.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Emmanuel Ossa Zuluaga</h3>
            <p>El equipo de software realiza varias funciones clave que incluyen el análisis de requisitos para definir las necesidades del cliente, el diseño de arquitecturas y sistemas, el desarrollo de código y pruebas para garantizar su funcionamiento.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Gabriel Quevedo</h3>
            <p>El equipo de software realiza varias funciones clave que incluyen el análisis de requisitos para definir las necesidades del cliente, el diseño de arquitecturas y sistemas, el desarrollo de código y pruebas para garantizar su funcionamiento.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Santiago Londoño Londoño</h3>
            <p>El equipo de software realiza varias funciones clave que incluyen el análisis de requisitos para definir las necesidades del cliente, el diseño de arquitecturas y sistemas, el desarrollo de código y pruebas para garantizar su funcionamiento.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>

    <br><br>

    <div class="section-title" id="gestion">
        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Equipo De</h4>
        <h1 class="display-4">Gestión Humana</h1>
    </div>

    
    <div class="container">
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Yilvelis Lievano</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Daison Hernandez</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Neythan Roa</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Sebastian Cano</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Miguel Rivera</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Isabella Baena</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Laura Vasquez</h3>
            <p>La gestión humana, también conocida como gestión del talento humano, se refiere a las prácticas y estrategias que optimizan la administración del personal en una organización. Incluye el reclutamiento y selección de candidatos adecuados, la formación y desarrollo profesional de los empleados, y la evaluación del desempeño para identificar áreas de mejora.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>

    


    <br><br>

    <div class="section-title" id="logistica">
        <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Equipo De</h4>
        <h1 class="display-4">Logística Empresarial</h1>
    </div>

    
    <div class="container">
        <div class="card">
            <div class="image-container1">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Eimy Cañas</h3>
            <p>La logística se refiere a la planificación, implementación y control del flujo de bienes, servicios e información a lo largo de la cadena de suministro. Su objetivo principal es garantizar que los productos lleguen al lugar correcto, en el momento adecuado y en las condiciones deseadas.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container1">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Melissa Florez</h3>
            <p>La logística se refiere a la planificación, implementación y control del flujo de bienes, servicios e información a lo largo de la cadena de suministro. Su objetivo principal es garantizar que los productos lleguen al lugar correcto, en el momento adecuado y en las condiciones deseadas.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="card">
            <div class="image-container1">
                <img src="img/user.png" alt="Imagen 1">
            </div>
            <h3>Stiwark Mosquera</h3>
            <p>La logística se refiere a la planificación, implementación y control del flujo de bienes, servicios e información a lo largo de la cadena de suministro. Su objetivo principal es garantizar que los productos lleguen al lugar correcto, en el momento adecuado y en las condiciones deseadas.</p>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>




</body>