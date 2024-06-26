<?php
namespace App\Http\Controllers;
use View;
use Validator;
use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
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
            $company     = Company::create($request->all());
    
            $request->session()->put('session_msg', 'Record successfully added.');
        } else {
            $company     = Company::where('id', $id)->first();
            if(!$company ) {
                $request->session()->put('session_msg', 'Record not found!');
                return redirect(route('company.index'));
            }
            $company->update($request->all());

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