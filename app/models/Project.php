<?php

class Project extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
		'project_name' => 'required',
		'city_id' => 'required'
	);

	public static function myDraftedProject($user_id,$state_id,$filter){
		return DB::table('projects')
			->select('projects.*','cities.city','provinces.province')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('created_by', $user_id)
			->where(function($query) use ($state_id){
				if($state_id ==  0){
					$query->where('projects.state_id','>',2);
				}else{
					$query->where('projects.state_id',$state_id);
				}
			})
			->where(function($query) use ($filter){
				$query->where('projects.project_name', 'LIKE' ,"%$filter%")
					->orwhere('projects.lot', 'LIKE' ,"%$filter%")
					->orwhere('projects.street', 'LIKE' ,"%$filter%")
					->orwhere('projects.brgy', 'LIKE' ,"%$filter%")
					->orwhere('cities.city', 'LIKE' ,"%$filter%")
					->orwhere('provinces.province', 'LIKE' ,"%$filter%");
			})
			->get();
	}

	public static function details($id){
		return DB::table('projects')
			->select('projects.*','cities.city','provinces.province')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->where('projects.id', $id)
			->first();
	}

	public static function forApproval($filter){
		return DB::table('projects')
			->select('projects.*','cities.city','provinces.province','users.first_name', 'users.middle_name','users.last_name')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->join('users', 'users.id', '=', 'projects.created_by')
			->where('projects.state_id',2)
			->where('projects.project_name', 'LIKE' ,"%$filter%")
			->get();
	}

	public static function approved($project)
	{
		return DB::table('projects')
			->select('projects.*','cities.city','provinces.province', 'users.first_name', 'users.middle_name','users.last_name')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->join('users', 'users.id', '=', 'projects.assigned_to')
			->where('projects.state_id', 3)
			->where(function($query) use ($project){
				$name_keys = explode(" ",$project->project_name);
				$lot_keys = explode(" ",$project->lot);
				$street_keys = explode(" ",$project->street);
				$brgy_keys = explode(" ",$project->brgy);

				$query->where(function($subquery) use ($name_keys){
					for( $i=0; $i<count($name_keys); $i++){
						if($name_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('project_name','LIKE', "%$name_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('project_name', 'LIKE', "%$name_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($lot_keys){
					for( $i=0; $i<count($lot_keys); $i++){
					   	if($lot_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('lot','LIKE', "%$lot_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('lot', 'LIKE', "%$lot_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($street_keys){
					for( $i=0; $i<count($street_keys); $i++){
					   	if($street_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('street','LIKE', "%$street_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('street', 'LIKE', "%$street_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere(function($subquery) use ($brgy_keys){
					for( $i=0; $i<count($brgy_keys); $i++){
					   	if($brgy_keys[$i] != ''){
							if($i==0){
						  		$subquery->where('brgy','LIKE', "%$brgy_keys[$i]%");
					   		}else{
						  		$subquery->orWhere('brgy', 'LIKE', "%$brgy_keys[$i]%");
					   		}
						}
					}
				})
				->orwhere('city_id',$project->city_id);
			})
			->get();
	}

	public static function publicProjects($filter){
		return DB::table('projects')
			->select('projects.*','cities.city','provinces.province','users.first_name', 'users.middle_name','users.last_name')
			->join('cities', 'cities.id', '=', 'projects.city_id')
			->join('provinces', 'provinces.id', '=', 'cities.province_id')
			->join('users', 'users.id', '=', 'projects.assigned_to')
			->where('projects.state_id',3)
			->where(function($query) use ($filter){
				$query->where('projects.project_name', 'LIKE' ,"%$filter%")
					->orwhere('projects.lot', 'LIKE' ,"%$filter%")
					->orwhere('projects.street', 'LIKE' ,"%$filter%")
					->orwhere('projects.brgy', 'LIKE' ,"%$filter%")
					->orwhere('cities.city', 'LIKE' ,"%$filter%")
					->orwhere('provinces.province', 'LIKE' ,"%$filter%")
					->orwhere('users.first_name', 'LIKE' ,"%$filter%")
					->orwhere('users.middle_name', 'LIKE' ,"%$filter%")
					->orwhere('users.last_name', 'LIKE' ,"%$filter%");
			})
			->get();
	}
}