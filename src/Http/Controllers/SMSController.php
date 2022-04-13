<?php

namespace Undefined\Krayin\Twilio\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Undefined\Krayin\Twilio\DataGrids\SmsDataGrid;
use Undefined\Krayin\Twilio\Models\Sms;
use Undefined\Krayin\Twilio\Repositories\SmsRepository;
use Undefined\Krayin\Twilio\Services\TwilioService;

class SMSController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * SmsRepository object
     *
     * @var \Undefined\Krayin\Twilio\Repositories\SmsRepository
     */
    protected $smsRepository;

    /**
     * Create a new controller instance.
     *
     * @param \Undefined\Krayin\Twilio\Repositories\SmsRepository  $smsRepository
     *
     * @return void
     */
    public function __construct(
        SmsRepository $smsRepository
    )
    {
        $this->smsRepository = $smsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (! bouncer()->hasPermission('twilio.sms.index')) {
            abort(401, 'This action is unauthorized');
        }

        if (request()->ajax()) {
            return app(SmsDataGrid::class)->toJson();
        }

        return view('twilio::sms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (! bouncer()->hasPermission('twilio.sms.create')) {
            abort(401, 'This action is unauthorized');
        }

        return view('twilio::sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (! bouncer()->hasPermission('twilio.sms.create')) {
            abort(401, 'This action is unauthorized');
        }

        try {
            // Validate data
            $request->validate(
                [
                    'to' => 'required',
                    'body' => 'required|max:255',
                ]
            );

            $twilioService = new TwilioService();

            $sms_data = $request->only("to", "body");
            
            $msg = $twilioService->sendSms(
                $sms_data["to"], $sms_data["body"], route('admin.twilio.sms.statusCallback')
            );
            
            $sms_data["sid"] = $msg->sid;
            $sms_data["status"] = $msg->status;

            Sms::create($sms_data);

            session()->flash('success', __('twilio::package.sms.sms-created-success'));

            return redirect()->route('admin.twilio.sms.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            
            session()->flash('error', __('twilio::package.sms.sms-created-failed'));

            return back()->withInput();
        } 
    }  

    public function statusCallback(Request $request) {
        try {
            $request->validate([
                'SmsSid' => 'required',
                'SmsStatus' => 'required',
            ]);
    
            $sid = $request->input("SmsSid");
            $status = $request->input("SmsStatus");

            $sms = Sms::where("sid", $sid)->firstOrFail();
            $sms->status = $status;
            $sms->update();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
