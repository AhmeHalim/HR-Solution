<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DepartementEmployee;
use App\Models\Employee;
use App\Models\Departement;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        //$this->middleware(['permission:employees']);
    }

    public function index()
    {
        $employees = Employee::orderBy('id','DESC')->get();
        return view('admin.employees.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::get();
        return view('admin.employees.addEmployee',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        ///// add user informations/////
        $token = Str::random(80);

        $user = new User();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = $token;
        $user->verification_code = rand(111111, 999999);
        $user->is_admin = 0;
        $user->user_type = 'employee';
        $user->device_type = 'web';
        $user->status = $request->status;
        $user->save();

        ////// add employee informations////
        $add = new Employee();
        $add->user_id = $user->id;
        $add->ssn = $request->ssn;
        $add->gender = $request->gender;
        $add->position = $request->position;
        $add->finger_print_id = $request->finger_print_id;
        $add->join_date = $request->join_date;
        $add->termination_date = $request->termination_date;
        ($add->image)?$add->image = Helper::uploadImage('employees',$request->image):NULL;
        ($add->contract_file)?$add->contract_file = Helper::uploadFile('employees',$request->contract_file):NULL;
        $add->save();

        //// assign employee to departements////
        if($request->departement_id){
            $departementIds=$request->departement_id;
            foreach($departementIds as $departementId){
                $depEmployee=new DepartementEmployee();
                $depEmployee->departement_id = $departementId;
                $depEmployee->employee_id=$add->id;
                $depEmployee->save();
            }
        }

        toastr()->success(trans('home.your_item_saved_successfully') , trans('home.saved'));

        return redirect('admin/employees');
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
        $employee=Employee::find($id);
        if($employee){
            $departements = Departement::get();
            $departementIds = DepartementEmployee::where('employee_id',$id)->pluck('departement_id')->toArray();
            return view('admin.employees.editEmployee',compact('departementIds','employee','departements'));
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
        
        $add = Employee::find($id);

        ///// update user informations/////
        $user = User::find($add->user_id);
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();

        ////// add employee informations////
        $add->ssn = $request->ssn;
        $add->gender = $request->gender;
        $add->position = $request->position;
        $add->finger_print_id = $request->finger_print_id;
        $add->join_date = $request->join_date;
        $add->termination_date = $request->termination_date;

        if($add->image && $request->image){
            $add->image = Helper::updateUploadedImage('employees',$request->image ,$add->image);
        }else{
            $add->image = Helper::uploadImage('employees',$request->image);
        } 

        if($add->contract_file && $request->contract_file){
            $add->contract_file = Helper::updateUploadFile('employees',$request->contract_file ,$add->contract_file);
        }else{
            $add->contract_file = Helper::uploadFile('employees',$request->contract_file);
        }

        $add->save();

        //// assign employee to departements////
        if($request->departement_id){
            DepartementEmployee::where('employee_id',$add->id)->delete();
            $departementIds=$request->departement_id;
            foreach($departementIds as $departementId){
                $depEmployee=new DepartementEmployee();
                $depEmployee->departement_id = $departementId;
                $depEmployee->employee_id=$add->id;
                $depEmployee->save();
            }
        }

        toastr()->success(trans('home.your_item_updated_successfully') , trans('home.updated'));

        return redirect('admin/employees');
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
