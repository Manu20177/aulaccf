<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Reporte de Educacion Financiera</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-body">

                    <!-- Botón de imprimir -->
                     <div class="row">
                        <div class="col-xs-12 text-right">
                            <button onclick="imprimirReporte()" class="btn btn-primary btn-raised btn-sm no-print">
                                <i class="zmdi zmdi-print"></i> Imprimir Reporte
                            </button>
                        </div>
                    </div>

                    <!-- Fecha de generación -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="text-muted">
                                    <i class="zmdi zmdi-chart"></i> FECHA DE GENERACIÓN: 
                                    <strong><?= date("Y-m-d") ?></strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Total de participantes -->
                    <div id="total-participantes" class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3><i class="zmdi zmdi-account-box"></i> Total de Participantes</h3>
                                <p><strong>Total:</strong> <span id="total-count">Cargando...</span></p>
                            </div>
                        </div>
                    </div>

                <!-- Gráfico de Género -->
<div class="chart-page">
    <h2><i class="zmdi zmdi-male-female"></i> Distribución por Género</h2>
    <canvas id="genderChart" style="max-width: 600px;"></canvas>
    <div class="chart-description" id="genderDescription"></div>
</div>

<!-- Gráfico nivel educativo -->
                    <div class="chart-page">
                        <h2><i class="zmdi zmdi-graduation-cap"></i> Nivel Educativo por Género</h2>
                        <canvas id="nivelChart" style="max-width: 600px;"></canvas>
                        <div class="chart-description" id="nivelDescription"></div>
                    </div>

                    <!-- Gráfico provincia -->
                    <div class="chart-page">
                        <h2><i class="zmdi zmdi-pin-drop"></i> Provincia por Género</h2>
                        <canvas id="provinciaChart" style="max-width: 600px;"></canvas>
                        <div class="chart-description" id="provinciaDescription"></div>
                    </div>

                    <!-- Gráfico actividad económica -->
                    <div class="chart-page">
                        <h2><i class="zmdi zmdi-money-box"></i> Actividad Económica por Género</h2>
                        <canvas id="actividadChart" style="max-width: 600px;"></canvas>
                        <div class="chart-description" id="actividadDescription"></div>
                    </div>

                    <!-- Gráfico grupo étnico -->
                    <div class="chart-page">
                        <h2><i class="zmdi zmdi-accounts-alt"></i> Grupo Étnico por Género</h2>
                        <canvas id="etniaChart" style="max-width: 600px;"></canvas>
                        <div class="chart-description" id="etniaDescription"></div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para imprimir -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    fetch('../controllers/reporteController.php') // Asegúrate de que esta ruta sea correcta
        .then(res => res.json())
        .then(data => {
            window.reportData = data;

            // Mostrar total
            document.getElementById("total-count").textContent = data.total?.total || 0;

            // Gráfico de género
            // Gráfico de género
            if (data.genero && data.genero.length > 0) {
                const genderCtx = document.getElementById('genderChart');
                new Chart(genderCtx, {
                    type: 'bar',
                    data: {
                        labels: data.genero.map(g => g.Genero),
                        datasets: [{
                            label: 'Participantes',
                            data: data.genero.map(g => g.total),
                            backgroundColor: ['#36A2EB', '#FF6384']
                        }]
                    }
                });

                // Generar descripción
                const total = parseInt(data.total?.total || 0);
                const femenino = data.genero.find(g => g.Genero === "Femenino")?.total || 0;
                const masculino = data.genero.find(g => g.Genero === "Masculino")?.total || 0;

                const desc = `
                    <p><strong>Total:</strong> ${total} participantes</p>
                    <ul>
                        <li>Femenino: ${femenino} (${getPorcentaje(femenino, total)}%)</li>
                        <li>Masculino: ${masculino} (${getPorcentaje(masculino, total)}%)</li>
                    </ul>
                    <p>Este gráfico muestra la distribución por género de los estudiantes.</p>
                `;
                document.getElementById("genderDescription").innerHTML = desc;
            }

            // Gráfico nivel educativo
          // Gráfico nivel educativo
            if (data.nivel && data.nivel.length > 0) {
                const nivelMap = {};
                data.nivel.forEach(row => {
                    if (!nivelMap[row.Nivel]) {
                        nivelMap[row.Nivel] = { Masculino: 0, Femenino: 0 };
                    }
                    nivelMap[row.Nivel][row.Genero] = row.total;
                });

                const labels = Object.keys(nivelMap);
                const hombres = labels.map(k => nivelMap[k].Masculino || 0);
                const mujeres = labels.map(k => nivelMap[k].Femenino || 0);

                const nivelCtx = document.getElementById('nivelChart');
                new Chart(nivelCtx, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [
                            { label: 'Hombres', data: hombres, backgroundColor: '#36A2EB' },
                            { label: 'Mujeres', data: mujeres, backgroundColor: '#FF6384' }
                        ]
                    }
                });

                // Generar descripción
                let desc = "<ul>";
                labels.forEach(label => {
                    const h = nivelMap[label].Masculino || 0;
                    const m = nivelMap[label].Femenino || 0;
                    const t = h + m;
                    desc += `<li><strong>${label}</strong>: ${t} participantes (Hombres: ${h}, Mujeres: ${m})</li>`;
                });
                desc += "</ul>";
                desc += "<p>Este gráfico muestra la distribución por nivel educativo según el género.</p>";

                document.getElementById("nivelDescription").innerHTML = desc;
            }

            // Gráfico provincia
           // Gráfico provincia
            if (data.provincia && data.provincia.length > 0) {
                const provMap = {};
                data.provincia.forEach(row => {
                    if (!provMap[row.Provincia]) {
                        provMap[row.Provincia] = { Masculino: 0, Femenino: 0 };
                    }
                    provMap[row.Provincia][row.Genero] = row.total;
                });

                const provLabels = Object.keys(provMap);
                const hombres = provLabels.map(k => provMap[k].Masculino || 0);
                const mujeres = provLabels.map(k => provMap[k].Femenino || 0);

                const provCtx = document.getElementById('provinciaChart');
                new Chart(provCtx, {
                    type: 'bar',
                    data: {
                        labels: provLabels,
                        datasets: [
                            { label: 'Hombres', data: hombres, backgroundColor: '#36A2EB' },
                            { label: 'Mujeres', data: mujeres, backgroundColor: '#FF6384' }
                        ]
                    }
                });

                // Generar descripción
                let desc = "<ul>";
                provLabels.forEach(label => {
                    const h = provMap[label].Masculino || 0;
                    const m = provMap[label].Femenino || 0;
                    const t = h + m;
                    desc += `<li><strong>${label}</strong>: ${t} participantes (Hombres: ${h}, Mujeres: ${m})</li>`;
                });
                desc += "</ul>";
                desc += "<p>Este gráfico muestra cuántos hombres y mujeres hay por provincia.</p>";

                document.getElementById("provinciaDescription").innerHTML = desc;
            }

            // Gráfico actividad económica
            // Gráfico actividad económica
            if (data.actividad && data.actividad.length > 0) {
                const actMap = {};
                data.actividad.forEach(row => {
                    if (!actMap[row.Actividad]) {
                        actMap[row.Actividad] = { Masculino: 0, Femenino: 0 };
                    }
                    actMap[row.Actividad][row.Genero] = row.total;
                });

                const actLabels = Object.keys(actMap);
                const hombres = actLabels.map(k => actMap[k].Masculino || 0);
                const mujeres = actLabels.map(k => actMap[k].Femenino || 0);

                const actCtx = document.getElementById('actividadChart');
                new Chart(actCtx, {
                    type: 'bar',
                    data: {
                        labels: actLabels,
                        datasets: [
                            { label: 'Hombres', data: hombres, backgroundColor: '#36A2EB' },
                            { label: 'Mujeres', data: mujeres, backgroundColor: '#FF6384' }
                        ]
                    }
                });

                // Generar descripción
                let desc = "<ul>";
                actLabels.forEach(label => {
                    const h = actMap[label].Masculino || 0;
                    const m = actMap[label].Femenino || 0;
                    const t = h + m;
                    desc += `<li><strong>${label}</strong>: ${t} participantes (Hombres: ${h}, Mujeres: ${m})</li>`;
                });
                desc += "</ul>";
                desc += "<p>Este gráfico muestra la distribución por actividad económica según el género.</p>";

                document.getElementById("actividadDescription").innerHTML = desc;
            }

            // Gráfico grupo étnico
            // Gráfico grupo étnico
            if (data.etnia && data.etnia.length > 0) {
                const etniaMap = {};
                data.etnia.forEach(row => {
                    if (!etniaMap[row.Etnia]) {
                        etniaMap[row.Etnia] = { Masculino: 0, Femenino: 0 };
                    }
                    etniaMap[row.Etnia][row.Genero] = row.total;
                });

                const etniaLabels = Object.keys(etniaMap);
                const hombres = etniaLabels.map(k => etniaMap[k].Masculino || 0);
                const mujeres = etniaLabels.map(k => etniaMap[k].Femenino || 0);

                const etniaCtx = document.getElementById('etniaChart');
                new Chart(etniaCtx, {
                    type: 'bar',
                    data: {
                        labels: etniaLabels,
                        datasets: [
                            { label: 'Hombres', data: hombres, backgroundColor: '#36A2EB' },
                            { label: 'Mujeres', data: mujeres, backgroundColor: '#FF6384' }
                        ]
                    }
                });

                // Generar descripción
                let desc = "<ul>";
                etniaLabels.forEach(label => {
                    const h = etniaMap[label].Masculino || 0;
                    const m = etniaMap[label].Femenino || 0;
                    const t = h + m;
                    desc += `<li><strong>${label}</strong>: ${t} participantes (Hombres: ${h}, Mujeres: ${m})</li>`;
                });
                desc += "</ul>";
                desc += "<p>Este gráfico muestra la distribución por grupo étnico según el género.</p>";

                document.getElementById("etniaDescription").innerHTML = desc;
            }

        })
        .catch(err => {
            console.error("Error al cargar los datos:", err);
            alert("No se pudieron cargar los datos del reporte");
        });
        function getPorcentaje(valor, total) {
            return ((valor / total) * 100).toFixed(1);
        }
});
</script>
<!-- Estilos para impresión -->
<style>
   @media print {
        body * {
            visibility: hidden;
        }
        .panel, .panel * {
            visibility: visible;
        }
        .panel {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        canvas {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .btn {
            display: none !important;
        }
        h1, h2, p, table, thead, tbody, tfoot, tr, th, td {
            color: #000 !important;
        }
    } 
    .chart-description {
        margin-top: -20px;
        margin-bottom: 40px;
        padding: 10px;
        background-color: #f1f1f1;
        border-left: 4px solid #ccc;
        font-size: 14px;
        color: #555;
    }

    .chart-description ul {
        margin: 5px 0;
        padding-left: 20px;
    }

    @media print {
        .chart-description {
            page-break-inside: avoid;
            break-inside: avoid;
        }
    }
</style>

<script>
function imprimirReporte() {
    const canvases = document.querySelectorAll("canvas");

    const clonedContent = document.querySelector(".panel-body").cloneNode(true);

    // Forzar saltos de página en cada .chart-page
    clonedContent.querySelectorAll(".chart-page").forEach(el => {
        el.style.pageBreakAfter = "always";
    });

    // Convertir cada canvas en imagen
    const canvasList = clonedContent.querySelectorAll("canvas");

    canvasList.forEach((canvas, index) => {
        const originalCanvas = canvases[index];
        const img = document.createElement("img");
        img.src = originalCanvas.toDataURL("image/png");
        img.style.maxWidth = "100%";
        img.style.pageBreakInside = "avoid";

        canvas.parentNode.insertBefore(img, canvas.nextSibling);
        canvas.remove(); // Elimina el canvas del clon
    });

    // Crear ventana nueva
    const printWindow = window.open("", "_blank");
    printWindow.document.write(`
        <html>
        <head>
            <title>Reporte para Imprimir</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }
                h1, h2, h3, p {
                    color: #000;
                }
                img {
                    max-width: 100%;
                    page-break-inside: avoid;
                    break-inside: avoid;
                }
                .chart-description {
                    page-break-inside: avoid;
                    break-inside: avoid;
                }
            </style>
        </head>
        <body>${clonedContent.innerHTML}</body>
        </html>
    `);
    printWindow.document.close();

    // Esperar a que se cargue todo antes de imprimir
    printWindow.onload = () => {
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 500);
    };
}
</script>
<!-- Encabezado oculto para impresión -->
<div id="print-header" style="text-align:center; display:none;">
    <h2>Reporte de Educación Financiera</h2>
    <p><strong>Fecha:</strong> <?= date("Y-m-d") ?></p>
    <hr>
</div>