<?php
require_once 'funciones/verificarUsuarioLogueado.php';

require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

//LLAMO AL SCRIPT CON LA FUNCION QUE GENERA EL LISTADO DE PAISES
require_once 'funciones/seleccion_paises.php';

/*NO MUESTRO NINGUN MENSAJE SI NO TIENE ACCESO, SOLO LO REDIRECCIONA AL INDEX*/
if(!empty($_SESSION['Usuario_Rol']) && $_SESSION['Usuario_Rol']==2){ 
    header('Location: index.php');
    exit;
}

//lISTO L NECESARIO PARA TRABAJAR CON ESE SCRIPT
$ListadoPaises = Listar_Paises($MiConexion);
$CantidadPaises = count($ListadoPaises);

?>
<?php
 
 require_once 'secciones/head.php';
 require_once 'secciones/lateral.php';
 require_once 'secciones/encabezado.php';



?>
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong>Paises con que trabajamos.</strong> Listado general. </h1>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h4 class="text-info">Visualizando 4 registros</h4>
                                    <hr />
                                    <!--                                        <h4 class="text-success">Mensaje al usuario</h4>
                                        <h4 class="text-warning">Mensaje al usuario</h4>
                                        <h4 class="text-danger">Mensaje al usuario</h4>
                                        -->
                                </div>

                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Denominación</th>
                                            <th class="d-none d-md-table-cell">Pais</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $CantidadPaises; $i++) 
                                        { ?>  
                                        
                                                                                    <tr>
                                                <td><?php echo $ListadoPaises[$i]['ID']; 
                                                ?></td>
                                                <td><?php echo $ListadoPaises[$i]['DENOMINACION']; 
                                                ?></td>
                                                <td>
                                                    <img src="<?php echo $ListadoPaises[$i]['IMAGEN_PAIS']; 
                                                ?>" width="36" height="36" class="rounded-circle me-2" alt="<?php echo $ListadoPaises[$i]['IMAGEN_PAIS']; 
                                                ?>" >
                                                </td>

                                                 <?php
                                                      if(!empty($_SESSION['Usuario_Rol']) && $_SESSION['Usuario_Rol']!=2){ ?>
                                                <td>
                                                    <a class="btn btn-primary btn-sm success" href="listado_paises.php?EDITAR_ID=<?php echo ($ListadoPaises[$i]['ID']); ?>&DENOMINACION=<?php echo ($ListadoPaises[$i]['DENOMINACION']); ?>&IMAGEN_PAIS=<?php echo ($ListadoPaises[$i]['IMAGEN_PAIS']);  ?>"><span data-feather="edit"></span> Editar</a>

                                                    <a class="btn btn-danger btn-sm" href="listado_paises.php?BORRAR_ID=<?php echo ($ListadoPaises[$i]['ID']); ?>&DENOMINACION=<?php echo ($ListadoPaises[$i]['DENOMINACION']); ?>&IMAGEN_PAIS=<?php echo ($ListadoPaises[$i]['IMAGEN_PAIS']);  ?>"><span data-feather="delete"></span> Borrar</a>
                                                </td>
                                                <?php }?>

                                            </tr>
                                            <?php } ?>          
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </main>


<?php require_once 'secciones/footer.php';?>

    <script src="js/app.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    coords: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>

</body>

</html>