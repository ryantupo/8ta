<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Colors\RandomColor;

class chartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('chart.addchart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("YOOOOOOOOOOOOOOOO");
        // return $request->input();
        // ddd($request);
        // echo($request);

        // $request->validate([
        //     'user_id' => 'required|string|min:3|max:255',
        //     'chartName' => 'required|string|min:3|max:255',
        //     'amountDataPoints' => 'required',
        // ]);

        // $query = DB::table('chart')->insert([
        //     'user_id'->$request->input(Auth::user()->id),
        //     'chart_name'->$request->input('chartName')
        // ]);

        // if($query){
        //     return back()->with('success','Chart has been successfully added');
        // }else{
        //     return back()->with('fail','Something went wrong');
        // }

        $labels = array();
        $data = array();
        $colours = array();
        $chartName = $request->input('chartName');
        $chartType = $request->input('chartType');


        for ($i = 0; $i < $request->input('amountDataPoints'); $i++) {
            array_push($labels, $request->input("dataTextAreaD1" . strval($i)));
            array_push($data , $request->input("dataTextAreaD2" . strval($i)));
            // Returns a hex code for a 'truly random' color
            array_push($colours, RandomColor::one(array(
                'luminosity' => 'random',
                'hue' => 'random',
                'format' => 'rgbCss',
            )));
        }

        // function generateChartJson(chartName, chartType, label, data, colours) {

        $config = json_encode(array(
            'type' => $chartType,
            'data' => json_encode(array(
                'labels' => $labels,
                'datasets' => array(json_encode(array(
                    'label' => $chartName,
                    'data' => $data,
                    'backgroundColor' => $colours,
                    'hoverOffset' => 4,
                ))))
            ))
        );

        // {{-- const config = {
        //     type: 'pie',
        //     data:{
        //         labels: [
        //           'Red',
        //           'Blue',
        //           'Yellow'
        //         ],
        //         datasets: [{
        //           label: 'My First Dataset',
        //           data: [300, 50, 100],
        //           backgroundColor: [
        //             'rgb(255, 99, 132)',
        //             'rgb(54, 162, 235)',
        //             'rgb(255, 205, 86)'
        //           ],
        //           hoverOffset: 4
        //         }]
        //       };,
        //   }; --}}

        // }

        $chart = new Chart();
        $chart->user_id = Auth::user()->id;
        $chart->chart_name = $chartName;
        $chart->chart_type = $chartType;
        $chart->config = $config;
        $chart->save();
        return redirect()->back()->with('status', 'Student Added Successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Iluminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
