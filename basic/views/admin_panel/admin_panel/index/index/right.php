

<div id="right__index">
	<div id="right_con__index">
		<div id="right_h1__index">
			<h1>
				List tasks
			</h1>
		</div>
		

		<div class="options_menu__con">
		  	<div class="btn-group" role="group">
			    <button id="options_menu__BUT" type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
			      Options
			    </button>

			    <div class="dropdown-menu">
			      	<a id="done__BUT" class="dropdown-item btn-sm options_menu__A" href="#">Done</a>
			      	<a id="edit__BUT" class="dropdown-item btn-sm options_menu__A" href="#">Edit task</a>
			    </div>
		  	</div>
  		</div>

		<div id="right_con_table__index">
			<table id="right_table__index">
				<tr>
					<th style="width: 30px" class="right_table_th__index">
					</th>					
					<th class="right_table_th__index">
						<div class="right_table_con_header__index">
							<div class="right_table_header__index">
								Email
							</div>
							<div id="sort_email" class="sort_con">
								<div class="sort-by-asc"></div>
							</div>
						</div>
					</th>
					<th class="right_table_th__index">
						<div class="right_table_con_header__index">
							<div class="right_table_header__index">
								Username
							</div>
							<div id="sort_username" class="sort_con">
								<div class="sort-by-asc"></div>	
							</div>
						</div>						
					</th>
					<th style="width: 95px;">
						<div class="right_table_con_header__index">
							<div class="right_table_header__index">
								Status
							</div>
							<div id="sort_status" class="sort_con">
								<div class="sort-by-asc"></div>
							</div>
						</div>							
					</th>
					<th>
						Description							
					</th>					
				</tr>
				<!--
				<tr>
					<td>
						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						</div>						
					</td>
					<td>Pe@mail.ru12345</td>
					<td>Pe@mail.ru12345</td>
					<td>In process</td>
					<td>112345678912</td>
				</tr>
				-->
				
			</table>
		</div>
		

		<nav>
			<ul class="pagination justify-content-center pagination_user-select">
			    <li id="pagination_left__LI" class="page-item disabled pagination_disabled__index" data-page="1">
			        <a class="page-link" href="#" aria-label="Previous">
			            <span aria-hidden="true">&laquo;</span>
			        </a>
			    </li>

			    <li id="pagination_1__LI" class="page-item pagination_hidden paginator_active" data-page="1">
			    	<a class="page-link" href="#">1</a>
			    </li>

			    <li id="pagination_2__LI" class="page-item pagination_hidden">
			    	<a class="page-link" href="#">2</a>
			    </li>

			    <li id="pagination_3__LI" class="page-item pagination_hidden">
			    	<a class="page-link" href="#">3</a>
			    </li>

			    <li id="pagination_right__LI" class="page-item disabled pagination_disabled__index">
				    <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				    </a>
			    </li>
			</ul>
		</nav>



		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
			    <div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Task</h5>
					</div>

						<div class="modal-body">
							<div>
								Email: <span id="modal__email"></span>
							</div>
							<div>
								Username: <span id="modal__Username"></span>
							</div>
							<div>
								Status: <span id="modal__Status"></span>
							</div>
							<div>
								Description: <span id="modal__Description"></span>
							</div>
						</div>

					<div class="modal-footer">
						<div style="width: 100%;">
							<span style="font-size: 11px; color: orange; float: left; display: none; " id="modal__edit_status">
								Edited Administration
							</span>
						</div>						
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
			    </div>
		  	</div>
		</div>


	</div>
</div>