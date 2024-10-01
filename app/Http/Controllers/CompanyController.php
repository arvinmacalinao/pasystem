<?php
namespace App\Http\Controllers;
use View;
use Validator;
use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UtilityFunction;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct() 
    {
		$data = [ 'page' => 'Company' ];
		View::share('data', $data);

        $this->middleware(function ($request, $next) {  
            if(!Auth::user()) {
                abort(404);
            }

            // app('App\Http\Controllers\RecordLogController')->recordLog();
            
            return $next($request);
        });
	}
    
    public function index(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');

        $rows       = Company::paginate(20);

        return view('pages.company.index', compact('rows', 'msg'));
    }

    public function create(Request $request)
    {
        $msg        = $request->session()->pull('session_msg', '');
    
        $id         = 0;
        $company    = new Company;

        return view('pages.company.form', compact('id', 'company', 'msg'));
    }

    public function store(Request $request, $id)
    {
        if($id == 0) {
            $company     = Company::create($request->except(['orgchart_file']));
            $company_up  = Company::where('id', $company->id)->first();
            if($request->hasFile('orgchart_file')) {
                $file                   = $request->file('orgchart_file');
                $extension              = $file->getClientOriginalExtension();
                $name                   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $new_filename           = UtilityFunction::sanitize_filename($name).'_'.Str::random(32).'.'.$extension;
                $file->storeAs('public/company_docs', $new_filename);
                $company_up->orgchart_filename    = $file->getClientOriginalName();
                $company_up->orgchart_file        = $new_filename;
            }
            $company_up->update($request->except(['orgchart_file']));
            $request->session()->put('session_msg', 'Record added.');
        } else {
            $company = Company::where('id', $id)->first();
            if(!$company) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('company.index'));
            } else {
                if($request->hasFile('orgchart_file')) {
                    $file               = $request->file('orgchart_file');
                    $extension          = $file->getClientOriginalExtension();
                    $name               = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $new_filename       = UtilityFunction::sanitize_filename($name).'_'.Str::random(32).'.'.$extension;
                    $file->storeAs('public/company_docs', $new_filename);
                    $company->orgchart_filename   = $file->getClientOriginalName();
                    $company->orgchart_file       = $new_filename;
                }
                
                $request->request->add(['updated_by' => Auth::id(), 'updated_at' => Carbon::now()]);                
                $company->update($request->except(['orgchart_file']));
            }
            $request->session()->put('session_msg', 'Record updated.');
        }  

        return redirect(route('company.index'));
    }
    
    public function edit(Request $request, $id)
    {
        $msg        = $request->session()->pull('session_msg', '');
        $company       = Company::where('id', $id)->first();

        if(!$company) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('company.index'));
        }
        return view('pages.company.form', compact('id', 'msg', 'company'));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        $company = Company::where('id', $id)->first();
        if(!$company) {
            $request->session()->put('session_msg', 'Record not found!');
            return redirect(route('company.index'));
        } else {
            $company->deleted_at = Carbon::now();
            $company->update();
            
            $request->session()->put('session_msg', 'Record deleted!');
            return redirect(route('company.index'));
        }        
    }
}