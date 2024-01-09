<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\DepartementTask;
use App\Models\DepartementKpi;
use App\Models\DepartementManager;
use App\Models\DepartementEmployee;
use App\Models\Manager;
use App\Models\Employee;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        //$this->middleware(['permission:departements']);
    }

    public function index()
    {
        $departements = Departement::orderBy('id','DESC')->get();
        return view('admin.departements.departements',compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.departements.addDepartement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $add = new Departement();
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->code = $request->code;
        $add->color = $request->color;
        $add->status = $request->status;
        ($add->logo)?$add->logo = Helper::uploadImage('departements',$request->logo):NULL;
        $add->save();

        ////// save tasks //////
        $tasks=$request->task;
        $taskTypes =$request->task_type; 
        foreach($tasks as $key=>$task){
            if($task && $taskTypes[$key]){
                $depTask=new DepartementTask();
                $depTask->departement_id = $add->id;
                $depTask->task=$task;
                $depTask->task_type=$taskTypes[$key];
                $depTask->save();
            }
        }
        
        ////// save Kpis //////
        $kpis=$request->kpi;
        $kpiValues =$request->kpi_value; 
        foreach($kpis as $key=>$kpi){
            if($kpi && $kpiValues[$key]){
                $depKpi=new DepartementTask();
                $depKpi->departement_id = $add->id;
                $depKpi->kpi=$kpi;
                $depKpi->kpi_value=$kpiValues[$key];
                $depKpi->save();
            }
        }

        toastr()->success(trans('home.your_item_saved_successfully') , trans('home.saved'));

        return redirect('admin/departements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departement=Departement::find($id);
        if($departement){
            $departementTasks = DepartementTask::where('departement_id',$id)->get();
            $departementKpis = DepartementKpi::where('departement_id',$id)->get();
            $departementManagerIds = DepartementManager::where('departement_id',$id)->pluck('manager_id')->toArray();
            $departementManagers = Manager::whereIn('manager_id',$departementManagerIds)->get();
            $departementEmployeeIds = DepartementManager::where('departement_id',$id)->pluck('employee_id')->toArray();
            $departementEmployees = Employee::whereIn('employee_id',$departementEmployeeIds)->get();
            return view('admin.departements.editDepartement',compact('departement','departementTasks','departementKpis','departementManagers','departementEmployees'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $add = Departement::find($id);
        $add->name_en = $request->name_en;
        $add->name_ar = $request->name_ar;
        $add->code = $request->code;
        $add->color = $request->color;
        $add->status = $request->status;
        ($add->logo)?$add->logo = Helper::updateUploadedImage('departements',$request->logo ,$add->logo):NULL;
        $add->save();

        ////// save tasks //////
        $tasks=$request->task;
        $taskTypes =$request->task_type; 
        foreach($tasks as $key=>$task){
            if($task && $taskTypes[$key]){
                $depTask=new DepartementTask();
                $depTask->departement_id = $add->id;
                $depTask->task=$task;
                $depTask->task_type=$taskTypes[$key];
                $depTask->save();
            }
        }
        
        ////// save Kpis //////
        $kpis=$request->kpi;
        $kpiValues =$request->kpi_value; 
        foreach($kpis as $key=>$kpi){
            if($kpi && $kpiValues[$key]){
                $depKpi=new DepartementTask();
                $depKpi->departement_id = $add->id;
                $depKpi->kpi=$kpi;
                $depKpi->kpi_value=$kpiValues[$key];
                $depKpi->save();
            }
        }

        toastr()->success(trans('home.your_item_updated_successfully') , trans('home.updated'));

        return redirect('admin/departements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $ids = explode(',', $ids);
        if ($ids[0] == 'on') {
            unset($ids[0]);
        }
        $img_path = base_path() . '/uploads/departements/';
        foreach ($ids as $id) {
            $departement = Departement::findOrFail($id);
            if ($departement->logo != null) {
                unlink(sprintf($img_path . '%s', $departement->logo));
            }
           $departement->delete();
        }
    }
}
