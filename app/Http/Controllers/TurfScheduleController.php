<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TurfScheduleController extends Controller
{
    public function index()
    {
        $turf_schedule = DB::table('turf_schedules')
                            ->select('turf_schedules.id', 'turf_schedules.turf_category_id', 'turf_schedules.shift_name', 'turf_schedules.start_time', 'turf_schedules.end_time', 'turf_schedules.price', 'turf_schedules.booking_price', 'turf_categories.category_name', 'turf_schedules.status')
                            ->leftJoin('turf_categories', 'turf_schedules.turf_category_id' , '=', 'turf_categories.id')
                            ->where('turf_schedules.deleted_at', Null)
                            ->where('turf_schedules.deleted', 'No')
                            ->orderBy('turf_schedules.id')->get();

        return view('schedule.index', [
            'turf_schedules' => $turf_schedule,
        ]);
    }

    public function create()
    {
        $turf_categories = DB::table('turf_categories')
                                ->select('id', 'category_name')
                                ->where([
                                    ['status', '=', 'Active'],
                                    ['deleted_at', '=', null],
                                    ['deleted', '=', 'No'],
                                ])->get();

        return view('schedule.create', ['turf_categories' => $turf_categories]);
    }

    public function store(Request $request)
    {
        $request ->validate([
            'turf_category_id'   => 'required',
            'shift_name'    => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'booking_price' => 'required',
            'price'         => 'required',
            
        ]);

        $schedule = DB::table('turf_schedules')->insert(
            [
                'turf_category_id'     => $request->turf_category_id,
                'shift_name'           => $request->shift_name,
                'start_time'           => $request->start_time,
                'end_time'             => $request->end_time,
                'booking_price'        => $request->booking_price,
                'price'                => $request->price,
                'created_by'           => Auth::user()->id,
                'created_at'           => Now(),
                
            ]
        );

        //return $schedule;
        
        flash()->addSuccess('Schedule Create Successfully.');
        return redirect()->route('turf_schedule.index');
    }

    public function edit($id)
    {
        $turf_categories = DB::table('turf_categories')
                                ->select('id', 'category_name')
                                ->where([
                                    ['status', '=', 'Active'],
                                    ['deleted_at', '=', null],
                                    ['deleted', '=', 'No'],
                                ])->get();

        $turf_schedule = DB::table('turf_schedules')
                        ->select('turf_schedules.id', 'turf_schedules.turf_category_id', 'turf_schedules.shift_name', 'turf_schedules.start_time', 'turf_schedules.end_time', 'turf_schedules.price', 'turf_schedules.booking_price', 'turf_categories.category_name', 'turf_schedules.status')
                        ->leftJoin('turf_categories', 'turf_schedules.turf_category_id' , '=', 'turf_categories.id')
                        ->where('turf_schedules.id', $id)->first();;

        //return $turf_schedule;

        return view('schedule.edit', [
            'turf_categories' => $turf_categories,
            'turf_schedule' => $turf_schedule,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'turf_category_id'   => 'required',
            'shift_name'    => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'booking_price' => 'required',
            'price'         => 'required',
            'status'         => 'required',
            
        ]);

        DB::table('turf_schedules')
        ->where('id', $id)
        ->update([
            'turf_category_id'  => $request->turf_category_id,
            'shift_name'        => $request->shift_name,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
            'booking_price'     => $request->booking_price,
            'price'             => $request->price,
            'status'            => $request->status,
            'update_by'         => Auth::user()->id,
            'updated_at'         => Now(),
        ]);

        flash()->addSuccess('Schedule Update Successfully.');
        return redirect()->route('turf_schedule.index');
    }

    public function destroy($id)
    {
        $schedule = DB::table('turf_schedules')
        ->where('id', $id)
        ->update([
            'deleted' => 'Yes',
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Now(),
            'status'  => 'Inactive',
        ]);

        //return $schedule;
        flash()->addSuccess('Schedule Delete Successfully.');
        return redirect()->route('turf_schedule.index');
    }
}
