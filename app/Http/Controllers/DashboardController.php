<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalPrescription;
use App\Models\Medicine;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Pharmacist;
use App\Models\Poly;
use App\Models\Queue;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $getPolyCreatedDate = Queue::pluck('created_at');
        // $arr = explode('-', $getPolyCreatedDate);
        // $getDate = substr($arr[2], 0, 2);
        $queueCount = Queue::where('status', 0)->get()->count();

        if (auth()->user()->role === 'dokter') {
            $queueCount = Queue::where('id_poli', auth()->user()->doctor->id_poli)->count();
        }

        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
            'patientCount' => Patient::all()->count(),
            'doctorCount' => Doctor::all()->count(),
            'nurseCount' => Nurse::all()->count(),
            'queueCount' => $queueCount,
            'pharmacistCount' => Pharmacist::all()->count(),
            'medicineCount' => Medicine::all()->count(),
            'polyCount' => Poly::all()->count(),
            'prescriptionCount' => MedicalPrescription::where('status', 'menunggu')->get()->count(),

            'prescriptions' => MedicalPrescription::latest()->limit(5)->get(),
            'queues' => Queue::all()->filter(function ($todayQueue) {
                if (str_contains($todayQueue, now()->toDateString())) {
                    if (auth()->user()->role === 'dokter') {
                        return Queue::where('id_poli', auth()->user()->doctor->id_poli)->limit(5)->get();
                    }

                    return Queue::all();
                }
            })
        ]);
    }
}