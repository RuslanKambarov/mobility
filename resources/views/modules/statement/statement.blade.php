@extends('layouts.appnav')

@section('content')
<div id="content_of_module" class="container h-100">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div id="statement" class="card">
                <div class="card-header h4">{{ __('vocabulary.statement') }}</div>

                <div class="card-body">

                    <form action="">

                        <div class="form-block">
                            <label for="academi_year_1">{{ __('vocabulary.academi_year') }}:</label>

                            <select name="academi_year_1" id="" placeholder=''>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            </select>

                            <label for="academi_year_2">/</label>

                            <select name="academi_year_2" id="" placeholder=''>
                                <option value="">2020</option>
                                <option value="">2021</option>
                            </select> 
                            
                            <label for="training_direction">{{ __('vocabulary.training_direction') }}:</label>
                            <span>{{ Auth::user()->codeProfession() }} - {{ Auth::user()->nameProfession() }}</span>
                        </div>
                        <div class="form-block highlight-block">
                            <span><strong>{{ __('vocabulary.sending_university') }}</strong></span>
                            <br>
                            <span>{{ __('vocabulary.name_university_lbl') }}: {{ __('vocabulary.name_university') }}</span>
                            <br>
                            <span>{{ __('vocabulary.name_coord_dep_lbl') }}: </span>
                            <br>
                            <span>{{ __('vocabulary.name_coord_uni_lbl') }}: </span>

                        </div>

                        <div class="form-block highlight-block">
                            <span><strong>{{ __('vocabulary.person_data') }}</strong></span>
                            <br>
                            <span>{{ __('vocabulary.lastname_lbl') }}: {{ Auth::user()->lastname }}</span>
                            &nbsp;&nbsp;
                            <span>{{ __('vocabulary.firstname_lbl') }}: {{ Auth::user()->firstname }}</span>
                            <br>
                            <span>{{ __('vocabulary.birthdate_lbl') }}: {{ date('d.m.Y', strtotime(Auth::user()->BirthDate)) }}</span>                            
                            <br>
                            <span>{{ __('vocabulary.sex_lbl') }}: {{ Auth::user()->Sex() }}</span>
                            <br>
                            <span>{{ __('vocabulary.citizenship_lbl') }}: {{ Auth::user()->Сitizenship() }}</span>
                            <br>
                            <span>{{ __('vocabulary.birthplace_lbl') }}: {{ Auth::user()->birthplace }}</span>
                            <br>
                            <span>{{ __('vocabulary.living_adress_lbl') }}: {{ Auth::user()->living_adress }}</span>
                            <br>
                            <span>{{ __('vocabulary.phone_lbl') }}: {{ Auth::user()->phone }}</span>
                            <br>
                            <span>{{ __('vocabulary.adress_lbl') }}: {{ Auth::user()->adress }}</span>
                            <br>
                            <span>{{ __('vocabulary.phone_lbl') }}: {{ Auth::user()->phone }}</span>
                        </div>

                        <div class="table-wrapper">			
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <h5>{{ __('vocabulary.list_universities') }}</h5>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#addEmployeeModal" class="btn btn-none" data-toggle="modal"><i class="material-icons">&#xE147;</i></a>						
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th style="width: 22%;">{{ __('vocabulary.UNI') }}</th>
                                        <th style="width: 22%;">{{ __('vocabulary.country') }}</th>
                                        <th>{{ __('vocabulary.onfrom') }}</th>
                                        <th>{{ __('vocabulary.until') }}</th>
                                        <th>{{ __('vocabulary.count_month') }}</th>
                                        <th>{{ __('vocabulary.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="№">1</td>
                                        <td data-label="{{ __('vocabulary.UNI') }}">Thomas Hardy</td>
                                        <td data-label="{{ __('vocabulary.country') }}">89 Chiaroscuro Rd.</td>
                                        <td data-label="{{ __('vocabulary.onfrom') }}">Portland</td>
                                        <td data-label="{{ __('vocabulary.until') }}">Portland</td>
                                        <td data-label="{{ __('vocabulary.count_month') }}">97219</td>
                                        <td data-label="{{ __('vocabulary.action') }}">
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="№">2</td>
                                        <td data-label="{{ __('vocabulary.UNI') }}">Thomas Hardy</td>
                                        <td data-label="{{ __('vocabulary.country') }}">89 Chiaroscuro Rd.</td>
                                        <td data-label="{{ __('vocabulary.onfrom') }}">Portland</td>
                                        <td data-label="{{ __('vocabulary.until') }}">Portland</td>
                                        <td data-label="{{ __('vocabulary.count_month') }}">97219</td>
                                        <td data-label="{{ __('vocabulary.action') }}">
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>

                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection