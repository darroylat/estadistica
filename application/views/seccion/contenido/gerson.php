<div id="page-wrapper">
            <div id="page-inner">
              <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Bienvenido</h1>
                        <p><?=$holamundo?></p>
                    </div>
                </div>
              </div>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Actividades <small>Resumen de sistema</small></small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?=$cantidadaeventos?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Eventos disponibles

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3><?=$cantidaddepositos?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Nuevos depositos

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?=$cantidadusuarios?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Usuarios Disponibles

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">


                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Inscritos por eventos
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart">
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resumen de usuarios
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de salidas y pack
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
										<?php foreach ($listaservicios->result() as $servicios){?>
                    					
                    
                							
                                     <a href="#" class="list-group-item">
                                        <i class="fa fa-fw fa-comment"></i> <?= $servicios->eventos; ?>
                                    </a>       
                                       
                    					<?php } ?>
                                    
                                   
                                </div>
                                <div class="text-right">
                                    <a href="#">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de usuarios
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NOMBRES </th>
                                                <th>APELLIDOS</th>
                                                <th>TELEFONOS</th>
                                                <th>NIVEL</th>
                                                <th>CORREO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    	<?php foreach ($listausuarios->result() as $usuarios){?>
                    					<tr>
                    
                							<td><?= $usuarios->NOMBRE; ?></td>
                                            <td><?= $usuarios->APELLIDO; ?></td>
                                            <td><?= $usuarios->TELEFONO; ?></td>
                                            <td><?= $usuarios->NIVEL; ?></td>
                                            <td><?= $usuarios->EMAIL; ?></td>
                                        </tr>
                    					<?php } ?>
                                            
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->
				<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
