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
			->where('projects.project_name', 'LIKE' ,"%$filter%")
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
}