<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Auth;
  
class CalendarController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Activity::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end', 'description', 'image', 'name']);
  
             return response()->json($data);
        }
  
        return view('calendar');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(Request $request)
    {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            //  if($file == null) { return "Empty Image" ; }
            $format = $file->getClientOriginalExtension();
            //generate file name
            $fileName = time() . rand(1, 999999) . '.' . $format;
            // generate route name + $filename
            $path = $fileName;
            //store file
            $file->storeAs('public/posts', $fileName);
        }   
        $event = Activity::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->start,
            'description' => $request->description,
            'image' => $path,
            'user_id' => $request->user_id,
            'name' => $request->name,
        ]);
      return redirect()->back();
    }


    public function update(Request $request) {
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $format = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $format;
            $path = $fileName;
            $file->storeAs('public/posts', $fileName);
        } else {
            $path = $request->image;
        }
        $event = Activity::find($request->id)->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->start,
            'image' => $path,
            'description' => $request->description,
        ]);   
        return redirect()->back();
    }
 

    public function delete(Request $request) {
        $event = Activity::find($request->id)->delete();

        return redirect()->back();
    }

    public function activity() {
        $activities = Activity::all();

        return view('activity', compact('activities'));
    }

    public function findActivity(Request $request) {
        $activities = Activity::whereBetween('start', [$request->start, $request->end])->get();

        return view('activity', compact('activities'));

    }
  
}
